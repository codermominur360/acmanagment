<?php
include "../partials/header.php";
include "../../controller/Expenselists.php";
$con = new Expenselists();
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
            
            <div class="panel-body card">
                 <div class="card-header bg-primary t-white">
                    <?php
                        if ($_REQUEST['id']) {
                        $id = $_REQUEST['id'];
                        $results = $con->details('expenselists', $id);
                        foreach ($results as $key=> $result) { 
                    ?>
                    <h4 class="text-center p-2 text-white ">
                        Expense Details By <b>
                        <?php 
                            if($result['expensive_name'] < 2 && $result['position'] < 2) 
                            echo str_replace('_',' ',$result['expensive_name']." "); 
                            echo " (".str_replace('_',' ',$result['position'].")"); 
                            break  
                        ?> </b> 
                    </h4>
                    <?php }} ?>
                 </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead> 
                            <tr>
                                <th>id</th> 
                                <th>Expense Name</th>
                                <th>Expense Sector</th>
                                <th>Amount</th>  
                                <th>Description</th>
                                <th>Date</th> 
                            </tr> 
                        </thead>
                        
                        <tbody>
                            <?php
                                if ($_REQUEST['id']) {
                                $id = $_REQUEST['id'];
                                $results = $con->details('expenselists', $id);
                                foreach ($results as $key=> $result) { 
                            ?>
                            <tr >
                                <td><?php echo $key+1 ?></td> 
                                <td><?php echo $result['name_of_expense']?></td>
                                <td><?php echo $result['name_of_sector']?></td>
                                <td><?php echo $result['amount']?></td>
                                <td><?php echo $result['description']?></td> 
                                <td><?php echo $result['date']?></td>  
                            </tr> 
                            <?php } } ?>
                        </tbody>  
                        <tfoot> 
                            <tr>
                                <th> </th> 
                                <th> </th>
                                <th class="bg-info text-white">Total </th>
                                <th class="bg-info text-white ">
                                  <?php 
                                    $total =0; 
                                    foreach($results as $result){
                                    $total += $result['amount'];  
                                        $result['amount']; 
                                    }  
                                  ?> 
                                <li class="total-list total "> <?php echo $total; ?> </li></th>  
                                <th> </th>
                                <th> </th> 
                            </tr> 
                        </tfoot>
                         
                    </table>
                    <a href="Index.php" class="btn bg-primary text-white"> <i class="fa fa-arrow-left"> Back</i></a>
                </div>
            </div>
             
        </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <?php include "../partials/footer.php"?>
