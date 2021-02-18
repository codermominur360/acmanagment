 <?php 
include "../partials/header.php";
include "../../controller/Media.php";
$con = new Media(); 
?>
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
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" required name="mname" id="exampleFirstName"
                                           placeholder="Enter Media Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <label for="">occupation</label>
                                    <input type="text" class="form-control" required name="occupation" id="exampleFirstName"
                                           placeholder="Enter occupation Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <label for="">address</label>
                                    <input type="text" class="form-control" required name="address" id="exampleFirstName"
                                           placeholder="Enter address Name">
                                </div>
                            </div>

                            <input type="submit" class="btn btn-primary btn-user" name="submit" value="Add Media"/>
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
                                            <th>Name</th>
                                            <th>occupation</th>
                                            <th>address</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        <?php
                                        $results = $con->index("media");
                                        $i = 1;
                                        //  print_r($getData);   //array show table
                                        foreach ($results as $result) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i++ ?></td>
                                                <td><?php echo str_replace("_", " ", $result['m_name']) ?></td>
                                                <td><?php echo str_replace("_", " ", $result['occupation']) ?></td>
                                                <td><?php echo str_replace("_", " ", $result['m_address']) ?></td> 
                                                <td>
                                                    <a href="Edit.php?id=<?php echo $result['id'] ?>"  class="text-warning "> <i class="fa fa-pencil-square-o"></i> </a>
                                                    <a href="Details.php?id=<?php echo $result['id']?>" class="text-info"><i class="fa fa-eye"></i></a>
                                                    <a href=" ?del=delete&id=<?php echo $result['id']?>" class="text-danger" onclick=deleteData(); id="delData"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
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