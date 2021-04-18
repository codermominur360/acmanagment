<?php 
include "../partials/header.php";
include "../../controller/Collected.php";
include "../../controller/Provided.php";
$collect = new Collected(); 
$provide = new Provided(); 
?>
<title> Collect & Provide  </title>
<style>

ul.total-col {
    display: flex;
    flex-direction: row;
    place-content: flex-end;
}

li.total-list {
    list-style: none;
    padding: 10px;
}
li.total-list.total {
    background: #1c45ef;
    color: #fff;
    font-size: 17px;
}

li.total-list.pay {
    background: #18c718;
    color: #fff;
    font-size: 17px;
}

li.total-list.due {
    background: #cc0f0f;
    color: #fff;
    font-size: 17px;
}
</style>
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
    <div class="row">
        <div class="col-lg-12">
         <div class="card">            
            <div class="card-header">
                <h4 class="bg-white "> <i class="fa fa-list"></i> Collecded List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered collect " id="collect" class="display nowrap">
                            <thead >
                                <tr >
                                    <th>Sl</th>  
                                    <th>Media Name</th>
                                    <th>Category</th>
                                    <th>Cause Name</th> 
                                    <th>Collect Amount</th> 
                                    <th>Date</th>  
                                    <th>Description</th>  
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php
                            if(isset($_GET['del'])){
                                $id= $_GET['id']; 
                                $result = $collect->delete($id,'person');
                            }
                            $results = $collect->index('collecteds');
                            $i = 1;  
                            //array show table
                            foreach ($results as $result) {   
                                ?> 
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td>
                                        <a href="CollectedDetails.php?id=<?php echo $result['media_id']?>" class="text-info ">
                                            <?php echo str_replace("_", " ", $result['m_name']) ?>
                                        </a>
                                    </td> 
                                    
                                    <td><?php echo str_replace("_", " ", $result['category']) ?></td>
                                    <td><?php echo str_replace("_", " ", $result['cause']) ?></td>
                                    <td><?php echo str_replace("_", " ", $result['collect_amt']) ?></td>
                                    <td><?php echo str_replace("_", " ", $result['date']) ?></td>  
                                    <td><?php echo str_replace("_", " ", $result['description']) ?></td>  
                                    <td>
                                         
                                        <a href=" ?del=delete&id=<?php echo $result['id']?>" class="text-danger ml-3" ><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody> 
                    </table>
                    <div class="card-header total-value">
                        <ul class="total-col" >
                                <?php 
                                    $total =0; 
                                        foreach($results as $result){
                                        $total += $result['collect_amt']; 
                                            $result['collect_amt']; 
                                        }  
                                ?> 
                                <li class="total-list pay"> Total : <b> <?php echo $total; ?></b> </li> 
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
         <!-- End Collected  -->
        <div class="col-lg-12">
            <div class="card ">            
                <div class="card-header  ">
                    <h4 class="bg-white "> <i class="fa fa-list"></i> Provided List </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered"  class="display nowrap">
                                <thead >
                                    <tr >
                                        <th>Sl</th>  
                                        <th>Media Name</th>
                                        <th>Category</th>
                                        <th>Cause</th>
                                        <th>Provid Amount</th> 
                                        <th>Date</th>  
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php
                                if(isset($_GET['del'])){
                                    $id= $_GET['id'];  
                                    $result = $provide->delete($id,'person');
                                }
                                $results = $provide->index('providedes');
                                $i = 1;  
                                //array show table
                                foreach ($results as $result) {   
                                    ?> 
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo str_replace("_", " ", $result['m_name']) ?></td> 
                                        <td><?php echo str_replace("_", " ", $result['category']) ?></td>
                                        <td><?php echo str_replace("_", " ", $result['cause']) ?></td>
                                        <td><?php echo str_replace("_", " ", $result['provid_amt']) ?></td>
                                        <td><?php echo str_replace("_", " ", $result['date']) ?></td>   
                                        <td>
                                            <a href="ProviderDetails.php?id=<?php echo $result['media_id']?>" class="text-info"><i class="fa fa-eye"></i></a>
                                            <a href=" ?del=delete&id=<?php echo $result['id']?>" class="text-danger ml-3" ><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody> 
                        </table>
                        <div class="card-header total-value">
                            <ul class="total-col" >
                                    <?php 
                                        $total =0;
                                        $payment =0;
                                        $due =0;
                                            foreach($results as $result){
                                            $total += $result['provid_amt'];
                                            $payment += $result['pay_amt'];
                                            $due += $result['due_amt'];
                                                $result['provid_amt']; 
                                            }  
                                    ?> 
                                    <li class="total-list due"> Total : <b> <?php echo $total; ?></b> </li> 
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
         <!-- End Provided -->
    </div>
     <!-- end row -->
         <!-- content-wrapper ends -->
</div>
<!-- partial:partials/_footer.html -->
<?php include "../partials/footer.php"?>


  

<script> 
   function deleteData(){
       alert('Media is Delete ');
   }
</script>