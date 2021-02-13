<?php
    include "../../database/DBconnection.php";
    include "../../controller/Category.php";
    $con = new Category();
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
                <div class="card-body">
                <?php
                        if (isset($_REQUEST['update'])) {
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') { ?>
                                <div class="alert alert-success"><?php echo $con->update($_POST); ?>
                                    <button type="button" class="close" data-dismiss="alert"><span
                                                aria-hidden="true">×</span></button>
                                </div>


                            <?php } else { ?>
                                <div class="alert alert-danger">Request Method Invalid!</div>
                            <?php }
                        }
                        if ($_REQUEST['id']) {
                        $id = $_REQUEST['id'];
                        $results = $con->edit('categories', $id);
                        foreach ($results

                        as $result) {
                    ?>

                    <form class="user" action="Index.php" method="POST">
                            <input type="text" name="id" value="<?php echo $result['id'] ?>" hidden>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" class="form-control"
                                           value="<?php echo str_replace("_", " ", $result['category']) ?>" name="category"
                                           id="exampleFirstName"
                                           placeholder="Enter Category Name">
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <select class="form-control" name="status" id="">
                                        <option value="<?php echo $result['status']; ?>"><?php echo ($result['status'] == 1) ? 'Active' : 'De-Active' ?></option>
                                        <option value="1">Active</option>
                                        <option value="0">De-Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-8">
                                    <input type="submit" class="btn btn-primary text-light btn-user" name="update"
                                           value="Category Updated"/>
                                </div>
                                <div class="col-sm-4">
                                    <a href="Index.php" class="btn bg-gradient-info text-light btn-user" >Go Back</a>
                                </div>
                            </div>
                            <?php }
                            } ?>
                    </form>
                </div>
         </div>
        <!-- content-wrapper ends -->
        </div>
          <!-- partial:partials/_footer.html -->
          <?php include "../partials/footer.php"?>

                