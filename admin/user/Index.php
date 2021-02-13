<?php
    include "../../database/DBconnection.php";
    include "../../controller/User.php";
    $con = new User();
    
?>
<?php include "../partials/header.php"?>
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
            <!-- content-wrapper start -->
            <div class="card">
            <a href="http://localhost/acManagment/admin/user/Create.php" class="btn btn-primary"> Create User <i class="fa fa-arrow-right"></i></a>

            <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered S" >
                                    <thead >
                                        <tr >
                                            <th>Sl</th> 
                                            <th>Full Name</th> 
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Phone</th> 
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $results = $con->index('users');
                                        $i = 1;
                                        //  print_r($getData);   //array show table
                                        foreach ($results as $result) {
                                            ?>
                                            
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo str_replace("_", " ", $result['fullname']) ?></td> 
                                            <td><?php echo str_replace("_", " ", $result['username']) ?></td>
                                            <td><?php echo str_replace("_", " ", $result['email']) ?></td>
                                            <td><?php echo str_replace("_", " ", $result['phone']) ?></td> 
                                            <td>
                                                  <a href=" ?del=delete&id=<?php echo $result['id']?>" class="text-danger" ><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                            </table>
                         </div>
                    </div>
            </div>

             <!-- content-wrapper ends -->
        </div>
<!-- partial:partials/_footer.html -->
<?php include "../partials/footer.php"?>