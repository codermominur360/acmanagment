<?php
include "../partials/header.php";
include "../../controller/Person.php";
$con = new Person();
?> 
<title> details </title>
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
            ?>
                        <div class="card-header">
                        <h3> <i class="fa fa-user-circle"></i> <b><?php echo $result['p_name']?> </b> Details Information</h3>
                            <span>University : <b><?php echo $result['univercity']?></b></span>
                            <span> Depatment: <b><?php echo $result['department']?></b> ( <?php echo $result['semester']?>)</span>
                        </div>
                        <div class="card-body  ">                 
                            <div class="table-responsive">
                                <table class="table table-borderless">  
                                    <tbody> 
                                    <tr>
                                        <td  > Father Name : <?php echo $result['father']?></td>
                                    </tr>
                                    <tr>
                                        <td> Address : <?php echo $result['p_address']?></td>
                                    </tr>  
                                    <tr>
                                        <td> Mobile Number : <?php echo $result['p_phone']?></td>
                                    </tr>  
                                    <tr > 
                                         <td> Media Name: <?php echo $result['m_name']?></td> 
                                        <td>Category Name : <?php echo $result['category']?></td>  
                                    </tr>
                                    <tr>
                                        <td> Total Amount : <?php echo $result['total_amt']?></td> 
                                        <td> Payment Amount : <?php echo $result['pay_amt']?></td> 
                                    </tr>
                                    <tr>
                                        <td> Due Amount : <?php echo $result['due_amt']?></td>  
                                    </tr>
                                    </tbody> 
                                </table>
                                <div class="card-footer">
                                        <p> <i class="fa fa-user"></i> Candidate All Information About Here ...</p>
                                    </div>
                                <a href="Index.php" class="btn bg-primary text-white"> <i class="fa fa-arrow-left"> Back</i></a>
                            </div>
                        </div>
                        <?php } } ?>   
        </div>
          <!-- content-wrapper ends -->
     <!-- partial:partials/_footer.html -->
     <?php include "../partials/footer.php"?>

