<?php
    include "../../database/DBconnection.php";
    include "../../controller/Media.php";
    $con = new Media();
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
            <?php
                if ($_REQUEST['id']) {
                $id = $_REQUEST['id'];
                $results = $con->details('person',$id ); 
                foreach ($results as $result) {
                    print_r($result);
            ?>
                        <div class="panel-body card">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Candidate Name</th>
                                        <th>Father</th>
                                        <th>Media Name</th>
                                        <th>Category</th>
                                        <th>Address</th>
                                        <th>Unvercity</th>
                                        <th>Department</th>
                                        <th>Semester</th>
                                        <th>Total Amount</th>
                                        <th>Pay Amount</th>
                                        <th>Due Amount</th>  
                                    </tr> 
                                    </thead>
                                    <tbody>
                                    <tr >
                                    <td><?php echo $result['id']?></td>
                                        <td><?php echo $result['p_name']?></td>
                                        <td><?php echo $result['father']?></td>
                                        <td><?php echo $result['m_name']?></td> 
                                        <td><?php echo $result['category']?></td> 
                                        <td><?php echo $result['p_address']?></td> 
                                        <td><?php echo $result['univercity']?></td> 
                                        <td><?php echo $result['department']?></td> 
                                        <td><?php echo $result['semester']?></td> 
                                        <td><?php echo $result['total_amt']?></td> 
                                        <td><?php echo $result['pay_amt']?></td> 
                                        <td><?php echo $result['due_amt']?></td>  
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

