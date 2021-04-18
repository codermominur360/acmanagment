<?php
include "../partials/header.php"; 
include "../../controller/Category.php";
$con = new Category();
?>
 <title> create </title>
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
           <!--  content-wrapper start -->
            <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Default form</h4>
                        <p class="card-description"> Basic form layout </p>
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
                        <form class="forms-sample">
                          <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" class="form-control" required name="category" id="exampleFirstName"
                                           placeholder="Enter Category Name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <select class="form-control" required name="status" id="">
                                        <option value="">Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">De-Active</option>
                                    </select>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-primary btn-user" name="submit" value="Add Category"/>
                        </form>
                    </div>
            </div>
            <!-- content-wrapper ends -->          
        </div>  
        <!-- partial:partials/_footer.html -->
          <?php include "../partials/footer.php"?>
