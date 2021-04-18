<?php
include "../partials/header.php";
include "../../controller/Media.php";
$con = new Media();
 ?> <title> edit </title>
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
                        $results = $con->edit('media', $id); 
                        foreach ($results as $result) { 
                    ?>
                    <h4 class="card-title">Media</h4>
                    <p class="card-description"> Edit Media</p>
                    <form class="user" action="" method="POST">
                            <input type="text" name="id" value="<?php echo $result['id'] ?>" hidden>
                            <div class="form-group">
                                <label for="exampleInputName1">Media Name</label>
                                <input type="text" class="form-control"
                                                value="<?php echo str_replace("_", " ", $result['m_name']) ?>" name="mname"
                                                placeholder="Enter Media Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Occupation</label>
                                    <input type="text" class="form-control"
                                                    value="<?php echo str_replace("_", " ", $result['occupation']) ?>" name="occupation">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Phone</label>
                                    <input type="text" class="form-control"
                                                    value="<?php echo str_replace("_", " ", $result['m_phone']) ?>" name="m_phone">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Address</label>
                                    <textarea name="m_address" id="" cols="100%" rows="3"> <?php echo str_replace("_", " ", $result['m_address']) ?>
                                    </textarea>
                                </div> 
                            <input type="submit" class="btn  btn-info btn-block text-light " name="update" value="Media Updated"/>
                            </form>
                        </div>
                        </div>
                        <?php }
                        } ?> 
                       <button class="btn btn-primary"><a href="Index.php" class="text-white"> <i class="fa fa-arrow-left"></i> Go Back</a></button>
                </div>
         </div>
        <!-- content-wrapper ends -->
        </div>
          <!-- partial:partials/_footer.html -->
          <?php include "../partials/footer.php"?>

    