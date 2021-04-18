<?php 
include "../partials/header.php";
include "../../controller/Person.php";
$con = new Person(); 
?>
<title> candidate list  </title>
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
        <div class="card">            
        <div class="card-header">
        <h4 class="bg-white "> <i class="fa fa-list"></i> Candidate List</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered S" id="example" class="display nowrap">
                    <thead >
                        <tr >
                            <th>Sl</th> 
                            <th>Name</th> 
                            <th>Media Name</th>
                            <th>Category</th>
                            <th>Univercity</th>
                            <th>Department</th> 
                            <th>Total</th> 
                            <th>Payment</th> 
                            <th>Due Amt</th> 
                            <th>Date</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php
                    if(isset($_GET['del'])){
                        $id= $_GET['id']; 
                        $result = $con->delete($id,'person');
                    }
                    $results = $con->index('person');
                    $i = 1;  
                       //array show table
                    foreach ($results as $result) {  
                        ?> 
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo str_replace("_", " ", $result['p_name']) ?></td> 
                            <td><?php echo str_replace("_", " ", $result['father']) ?></td>
                            <td><?php echo str_replace("_", " ", $result['category']) ?></td>
                            <td><?php echo str_replace("_", " ", $result['univercity']) ?></td>
                            <td><?php echo str_replace("_", " ", $result['department']) ?></td> 
                            <td ><?php echo str_replace("_", " ", $result['total_amt']) ?></td> 
                            <td><?php echo str_replace("_", " ", $result['pay_amt']) ?></td> 
                            <td><?php echo str_replace("_", " ", $result['due_amt']) ?></td> 
                            <td><?php echo $result['date']; ?></td> 
                            <td>
                                <a href="Edit.php?id=<?php echo $result['id'] ?>"  class="text-warning "> <i class="fa fa-pencil-square-o"></i> </a>
                                <a href="Details.php?id=<?php echo $result['id']?>" class="text-info"><i class="fa fa-eye"></i></a>
                                <a href=" ?del=delete&id=<?php echo $result['id']?>" class="text-danger" ><i class="fa fa-trash-o"></i></a>
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
                               $total += $result['total_amt'];
                               $payment += $result['pay_amt'];
                               $due += $result['due_amt'];
                                $result['total_amt'];
                                $result['pay_amt'];
                                $result['due_amt'];
                            }  
                    ?> 
                    <li class="total-list total"> Total : <b> <?php echo $total; ?></b> </li>
                    <li class="total-list pay"> Payment : <b><?php echo $payment; ?></b> </li>
                    <li class="total-list due"> Due : <b><?php echo $due; ?></b> </li>
                </ul>
                </div>
                 </div>
            </div>
</div>
         <!-- content-wrapper ends -->
    </div>
<!-- partial:partials/_footer.html -->
<?php include "../partials/footer.php"?>



<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                 'excel', 'pdf'
                // 'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );
</script> 