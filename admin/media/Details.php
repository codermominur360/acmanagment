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
            <?php
                if ($_REQUEST['id']) {
                $id = $_REQUEST['id'];
                $results = $con->details('media', $id);
                foreach ($results as $result) {
            ?>
                        <div class="panel-body card">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Occupation</th>
                                        <th>Address</th>
                                        <th>Create At</th> 
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr >
                                        <td><?php echo $result['id']?></td>
                                        <td><?php echo $result['m_name']?></td>
                                        <td><?php echo $result['occupation']?></td>
                                        <td><?php echo $result['m_address']?></td> 
                                        <td><?php echo $result['create_at']?></td> 
                                    </tr>
                                    </tbody>
                                </table>
                                <a href="Index.php" class="btn bg-primary text-white"> <i class="fa fa-arrow-left"> Back</i></a>
                            </div>
                        </div>
                        <?php } } ?>   
        </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <?php include "../partials/footer.php"?>
