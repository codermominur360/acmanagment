 <?php 
include "../partials/header.php";
include "../../controller/ShareHolder.php";
$con = new ShareHolder(); 
?>
<title> shareholder </title>
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
              <div class="col-lg-4">
                  <div class="card-body"> 
                        <p class="card-description"> <b>Media Create</b> </p>
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
                                <div class="col-sm-12 mb-3 mb-sm-0"> 
                                    <input type="text" class="form-control" required name="s_name"placeholder="Share Holder Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0"> 
                                    <input type="number" class="form-control" required name="sharevalue" placeholder="Share Value">
                                </div>
                            </div> 
                            <input type="submit" class="btn btn-primary btn-user" name="submit" value="Add "/>
                        </form>
                    </div>
              </div>
              <div class="col-lg-8">
                  <h4 class="bg-white p-3"> <i class="fa fa-list"></i> Media List</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered"  id="example" class="display nowrap" width="auto">
                            <thead >
                                <tr>
                                    <th>Sl</th> 
                                    <th>Share Holder Name</th>
                                    <th>Share Value</th> 
                                    <th>Action</th>
                                </tr>
                            </thead>
                                <tbody class="text-center">
                                    <?php
                                        if(isset($_GET['del'])){
                                            $id= $_GET['id']; 
                                            $results = $con->delete($id,'shareholders');
                                        }
                                            $results = $con->index("shareholders");
                                            $i = 1;
                                            //  print_r($getData);   //array show table
                                            foreach ($results as $result) {
                                        ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo str_replace("_", " ", $result['s_name']) ?></td>
                                        <td><?php echo str_replace("_", " ", $result['sharevalue']) ?></td> 
                                        <td> <a href=" ?del=delete&id=<?php echo $result['id']?>" class="text-danger" onclick=deleteData(); id="delData"><i class="fa fa-trash-o"></i></a> </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                        </table>
                  </div>         
              </div>
              <a href="http://localhost/row/acManagment/admin/depodit/" class="btn btn-primary "> <i class="fa fa-arrow-circle-left"></i> Back Dipodit</a>
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