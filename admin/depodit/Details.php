<?php
include "../partials/header.php";
include "../../controller/Depodit.php";
$con = new Dipodit();
?> 
<button onclick="window.print();" id="print" class="btn btn-success"> <i class="fa fa-print"></i> Print </button>
<div class="card m-5">
  <div class="card-header"> 
  <h2 class='text-center'>Deposit  of Mithu Sorkar </h2>
  <div class="card-body">
    <h5 class="card-title"> Deposit Amoutn of Mithu Sorkar </h5>
    <p class="card-text"></p>
        <table class="table table-bordered text-center">
            <thead>
            <tr>
                <th>id</th>
                <th>ShareHolder Name</th>
                <th>Creadit Amount</th>
                <th>Debit Amount </th>
                <th>Due Amount </th>
                <th>Update Date</th> 
            </tr>
            </thead>
            <tbody> 
            <?php
                if ($_REQUEST['id']) {
                $name = $_REQUEST['id'];  
                $results = $con->details('depodit_history', $name);
                foreach ($results as $key => $result) {  

            ?>
            <tr>
                <td><?php echo $key+1 ?></td>
                <td><?php echo str_replace('_',' ',$result['s_name']) ;?></td>
                <td><?php echo $result['creadit'];?></td>
                <td><?php echo $result['debit'];?></td>
                <td><?php echo $result['due'];?></td> 
                <td><?php echo $result['update_date'];?></td> 
            <tr/> 
            <?php } } ?>  
            </tbody>
        </table>
        <a href="Index.php" class="btn bg-primary text-white"> <i class="fa fa-arrow-left"> Back</i></a>
  </div>
</div>
     
            