<?php 
include "../partials/header.php";
include "../../controller/Expenselists.php";
$con = new Expenselists(); 
?>
<title> Expense List </title>
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
              <div class="col-lg-12">
                    <label >  Expensive Create </label>
                    <a href="http://localhost/row/acManagment/admin/expense/expensive.php" class="btn btn-primary"> Expensive </a> 
                    <p style="font-size:12px; font-weight:600; font-familly:arial"> Create New Expensive </p>
              </div>
              <div class="col-lg-12">
                  <h4 class="bg-white p-3">
                   <i class="fa fa-list"></i> Expense List
                   <a href="http://localhost/row/acManagment/admin/expense/Create.php" class="btn btn-success pull-right"> <i class="fa fa-plus-square"></i> Expense </a> 
                  </h4>
                        <div class="table-responsive">
                        <table class="table table-bordered"  id="example" class="display nowrap" width="auto">
                            <thead >  
                                <tr>
                                    <th>Sl</th> 
                                    <th>Exp Name</th>
                                    <th>Exp Position</th>
                                    <th>Expense of Name</th>
                                    <th>Expense of Sector</th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                    <th>Data</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                $results = $con->index("expenselists");
                                $i = 1;
                                //  print_r($getData);   //array show table
                                foreach ($results as $result) {    ?>
                                
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo str_replace("_", " ", $result['expensive_name']) ?></td>
                                    <td><?php echo str_replace("_", " ", $result['position']) ?></td>
                                    <td><?php echo str_replace("_", " ", $result['name_of_expense']) ?></td> 
                                    <td><?php echo str_replace("_", " ", $result['name_of_sector']) ?></td> 
                                    <td><?php echo str_replace("_", " ", $result['amount']) ?></td> 
                                    <td><?php echo str_replace("_", " ", $result['description']) ?></td>  
                                    <!-- <td><?php echo str_replace("_", " ", $result['date']) ?></td>   -->
                                    <td>
                                        <!-- <a href="Edit.php?id=<?php echo $result['id'] ?>"  class="text-warning "> <i class="fa fa-pencil-square-o"></i> </a> -->
                                        <a href="Details.php?id=<?php echo $result['exp_name']?>" class="text-info"><i class="fa fa-eye"></i></a>
                                        <a href=" ?del=delete&id=<?php echo $result['id']?>" class="text-danger" onclick=deleteData(); id="delData"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="card-header total-value">
                            <ul class="total-col" >
                                <?php 
                                    $amount =0; 
                                        foreach($results as $result){
                                            $amount += $result['amount']; 
                                            $result['amount']; 
                                        }  
                                ?> 
                                 <li class="total-list due"> Total Expense : <b> <?php echo $amount; ?></b> </li> 
                            </ul>
                        </div>
                         <!-- end Calculation Area footer  -->
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
                        'excel', 'pdf'
                        // 'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                } );
            } );
        </script>

        <script> 
           function deleteData(){
               alert('Media is Delete ');
           }
        </script>