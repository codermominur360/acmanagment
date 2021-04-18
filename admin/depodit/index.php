 <?php 
include "../partials/header.php";
include "../../controller/Depodit.php";
include "../../controller/ShareHolder.php";
$con = new Dipodit(); 
$shareHolder = new ShareHolder(); 
?>
 
<title> deposit list</title>

<style>
    ul.total-col {
        display: flex;
        flex-direction: row;
        place-content: flex-end;
    }

    li.total-list {
        list-style: none;
        padding: 10px;
    }
    li.total-list.total {
        background: #1c45ef;
        color: #fff;
        font-size: 17px;
    }

    li.total-list.pay {
        background: #18c718;
        color: #fff;
        font-size: 17px;
    }

    li.total-list.due {
        background: #cc0f0f;
        color: #fff;
        font-size: 17px;
    }
</style>

    <div class="container-scroller">

      <!-- partial:partials/_navbar.html -->
      <?php include "../partials/navbar.php"; ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include "../partials/sidebar.php"?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

          <div class="row">
         <!-- Start Form Insert Database  -->
              <div class="col-lg-12 ">
                  <div class="card-body"> 
                   <label for="">Share Holder List </label>
                   <a href="http://localhost/row/acManagment/admin/shareHolder/" class="btn btn-primary"> Share Holder </a> 
                        <p class="card-description"> <b>Depodit Create</b> </p>
                        <?php
                        if (isset($_REQUEST['submit'])) {
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') { ?>
                                <div class="alert alert-success"><?php echo $con->create($_POST); ?>
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
                                </div>
                            <?php } else { ?>
                                <div class="alert alert-danger">Request Method Invalid!</div>
                            <?php }
                        } ?>

                        <form class="user" action="" method="POST">
                            <div class="form-group row">
                                <div class="col-lg-3 col-sm-12 ">
                                    <?php $results = $shareHolder->index("shareholders");   ?>
                                    <select class="form-control" name="sharename" id="" required>
                                        <option value="">Select Share Holder Name </option>
                                        <?php foreach ($results as $result) { ?>
                                            <option value="<?php echo $result['id']; ?>"><?php echo str_replace('_',' ',$result['s_name']); ?></option>
                                        <?php } ?>
                                    </select>
                                    <span style="font-size:11px"><i>Need a new shareholder <strong>ShareHolder </strong></i>  </span>
                                </div>
                                <div class="col-lg-3 col-sm-12"> 
                                    <input type="text" class="form-control" required name="creadit" placeholder="Creadit" id="creadit" onkeyup=calu() >
                                </div>
                                <div class="col-lg-2 col-sm-12"> 
                                    <input type="text" class="form-control" required name="debit"  placeholder=" Debits" id="debit" onkeyup=calu() >
                                </div> 
                                <div class="col-lg-2 col-sm-12">
                                    <input type="date" class="form-control" required name="date" > 
                                    <input type="text" class="form-control d-none" required name="due" placeholder="Due" id="due" onkeyup=calu() hidden>
                                </div>
                                <div class="col-lg-2 col-sm-12">
                                <input type="submit" class="btn btn-primary " name="submit" value="Depodit"/> 
       
                                </div> 

                            </div>
                        </form>
                    </div>
              </div>
              <div class="col-lg-12">
                  <h4 class="bg-white p-3"> <i class="fa fa-list"></i> Depodit List</h4>
                        <div class="table-responsive">
                        <table class="table table-bordered"  id="example" class="display nowrap" width="auto">
                                        <thead >
                                        <tr>
                                            <th>Sl</th> 
                                            <th>Name</th>
                                            <th>Share No</th>
                                            <th>Total Value</th>
                                            <th>Create</th>
                                            <th>Debit</th>
                                            <th>Net Amount</th>
                                            <th>Action</th>
                                            <th>Delete </th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        <?php
                                            if(isset($_GET['del'])){
                                                $id= $_GET['id']; 
                                                $results = $con->delete($id,'dipodites');
                                            }
                                        $results = $con->index("dipodites");

                                        $i = 1; 
                                        foreach ($results as $result) {
                                            // print_r($result);
                                            // die();
                                            ?>
                                            <tr>
                                                <td><?php echo $i++ ?></td>
                                                <td>
                                                    <a href="Details.php?id=<?php echo $result['name']?>" class="text-info">
                                                        <?php echo str_replace("_", " ", $result['s_name']) ?>
                                                    </a>
                                                </td>
                                                <td><?php echo str_replace("_", " ", $result['sharevalue']) ?></td>
                                                <td><?php echo str_replace("_", " ", $result['sharevalue']*500000) ?></td>
                                                <td><?php echo str_replace("_", " ", $result['creadit']) ?></td>
                                                <td><?php echo str_replace("_", " ", $result['debit']) ?></td> 
                                                <td><?php echo str_replace("_", " ", $result['due']) ?></td> 
                                                <td>
                                                    <a href="Edit.php?id=<?php echo $result['name'] ?>"  class=" btn btn-success "> Re-deposit </a>
                                                     </a>
                                                </td>
                                                <td>
                                                <a href=" ?del=delete&id=<?php echo $result['id']?>" class="btn btn-danger" onclick=deleteData(); id="delData"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                        <div class="card-header total-value">
                            <ul class="total-col" >
                                <?php 
                                    $creadit =0;
                                    $debit =0;
                                    $due =0;
                                        foreach($results as $result){
                                        $creadit += $result['creadit'];
                                        $debit += $result['debit'];
                                        $due += $result['due'];
                                            $result['creadit'];
                                            $result['debit'];
                                            $result['due'];
                                        }  
                                ?> 
                                <li class="total-list total"> Creadit : <b> <?php echo $creadit; ?></b> </li>
                                <li class="total-list pay"> Debit : <b><?php echo $debit; ?></b> </li>
                                <li class="total-list due"> Due : <b><?php echo $due; ?></b> </li>
                            </ul>
                        </div>
                        </div>  
              </div>
          </div>    
        </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <?php include "../partials/footer.php"?>
 

        <script>
            $(document).ready(function() {
                $('#example').DataTable( {
                    dom: 'Bfrtip', 
                    buttons: [
                        'excel', 'pdf','print'
                        // 'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                } );
            } );
        </script>
        <script>
            function calu(){
                var totalcreadit = document.getElementById('creadit').value 
                var paidDebit = document.getElementById('debit').value
                var dueAmount= document.getElementById('due').value = totalcreadit - paidDebit
            }
        </script>
        <script> 
        // Row data Delete to database
           function deleteData(){
               alert('Media is Delete ');
           }
        </script>