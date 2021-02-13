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

            <div class="card text-center">
                  <div class="card-body">
                    <h4 class="card-title"><strong>User Information</strong></h4>
                    <?php
                        if (isset($_REQUEST['submit'])) {
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') { ?>
                                <div class="alert alert-success"><?php echo $con->create($_POST); ?>
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
                                </div>
                            <?php } else { ?>
                                <div class="alert alert-danger">Request Method Invalid!</div>
                            <?php }
                        } 
                    ?>
                    <form class="user" action="" method="POST">
                      <p class="card-description"> For login  </p>
                       <div class="row">
                          <div class="col-lg-3"></div>
                          <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Full Name </label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="fullname" placeholder="fullname " require>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Username </label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="username" placeholder="username name" require>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">email </label>
                                <div class="col-sm-9">
                                  <input type="email" class="form-control" name="email" placeholder="email name" require>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Phone </label>
                                <div class="col-sm-9">
                                  <input type="number" class="form-control" name="phone" placeholder="phone Number" require>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Password </label>
                                <div class="col-sm-9">
                                  <input type="password" class="form-control" name="password" placeholder="password " require>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block" name="submit" > <i class="fa fa-check"></i> Save </button> 
                            </div> 
                          </div>
                          <div class="col-lg-3"></div>
                       </div> 
                    </form>
                  </div>
                </div> 
        <!-- content-wrapper ends -->
        </div>
<!-- partial:partials/_footer.html -->
<?php include "../partials/footer.php"?>         