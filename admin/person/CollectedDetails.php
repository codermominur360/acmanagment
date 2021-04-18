<?php 
include "../partials/header.php";
include "../../controller/Collected.php";
$collected = new Collected();  
?>  
<style>
 @page{
     size:A4;
 }
</style>
<button onclick="window.print();" id="print" class="btn btn-success"> <i class="fa fa-print"></i> Print </button>
<div class="card m-5">
    <div class="card-heder">
    <?php
                if ($_REQUEST['id']) {
                $id = $_REQUEST['id'];  
                $results = $collected->details('collecteds', $id);
                foreach ($results as $result) { ?>
                <p class="  bg-primary text-center p-3" style="color:#fff; font-size:18px; font-weight:500;  ">
                    <?php 
                        if($result['m_name'] <2)
                        echo strtoupper($result['m_name']);
                        break;
                    ?>
                </p> 
            <?php } } ?>
    </div>
    <div class="card-body">
    <table class="table table-bordered "  >
                        <thead>
                        <tr>
                            <th>id</th> 
                            <th>Cause Name</th>
                            <th>Collect Amount</th>
                            <th>Description </th>
                            <th>Category </th>
                            <th>Date</th> 
                        </tr>
                        </thead>
                        <tbody>  
                        <?php
                            if ($_REQUEST['id']) {
                            $id = $_REQUEST['id'];  
                            $results = $collected->details('collecteds', $id);
                            foreach ($results as $result) {   
                        ?>
                        <tr>
                            <td><?php echo $key+1 ?></td> 
                            <td><?php echo str_replace('_',' ',$result['cause']) ;?></td>
                            <td><?php echo $result['collect_amt'];?></td>
                            <td><?php echo $result['description'];?></td> 
                            <td><?php echo $result['category'];?></td> 
                            <td><?php echo $result['date'];?></td>
                        <tr/> 
                        <?php } } ?>  
                        </tbody>
                        <thead>
                        <tr>
                            <th> </th>
                            <th> </th>
                            <th> Total Amount  </th>
                            <th class="bg-info">
                                <?php
                                    $collect=0;  
                                   foreach($results as $result){
                                    $collect+=$result['collect_amt']; 
                                    //  $result['collect_amt'];   
                                   }  
                                   echo $collect;  
                                ?> 
                            </th>
                            <th>  </th>
                            <th>  </th> 
                        </tr>
                        </thead>
                    </table>
    </div>
    <div class="card-footer">
    <a href="Index.php" class="btn btn-primary d-block"> <i class="fa fa-arrow-left">  </i></a> 
    </div>
</div>
 