<?php
include "../partials/header.php";
include "../../controller/Provided.php";
$collected = new Provided(); 
?> 
<title>provider details </title>
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
                            <?php
                                if ($_REQUEST['id']) {
                                $id = $_REQUEST['id'];  
                                $results = $collected->details('providedes', $id);
                                foreach ($results as $result) { ?>
                                <p class="  bg-primary text-center p-3" style="color:#fff; font-size:18px; font-weight:500;  "> Provite By " 
                                    <?php 
                                        if($result['m_name'] <2)
                                        echo strtoupper($result['m_name']);
                                        break; 
                                    ?>
                                </p>
                            <?php } } ?> "

                            <div class="table-responsive card-body">
                                <table class="table table-bordered "  id="proivder"   >
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Cause Name</th>
                                        <th> Descriptiion</th>
                                        <th>Provide Amount </th>
                                        <th>Media </th>
                                        <th>Date</th> 
                                    </tr>
                                    </thead>
                                    <tbody> 
                                    <?php
                                        if ($_REQUEST['id']) {
                                        $id = $_REQUEST['id'];  
                                        $results = $collected->details('providedes', $id);
                                        foreach ($results as $key => $result) {  

                                    ?>
                                    <tr>
                                        <td><?php echo $key+1 ?></td>
                                        <td><?php echo $result['cause'];?></td>
                                        <td><?php echo $result['description'];?></td> 
                                        <td><?php echo $result['provid_amt'];?></td> 
                                        <td><?php echo str_replace('_',' ',$result['category']) ;?></td>
                                        <td><?php echo $result['create_at'];?></td> 
                                    <tr/> 
                                    <?php } } ?>  
                                    </tbody>
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th> Total Amount</th>
                                        <th  class="bg-danger">
                                        <?php 
                                            $provid= 0;
                                            foreach($results as $res ){
                                                $provid+=$res['provid_amt']; 
                                            }
                                            echo $provid;
                                        ?>
                                        </th>
                                        <th> </th>
                                        <th> </th> 
                                    </tr>
                                    </thead>
                                </table>
                                <a href="Index.php" class="btn bg-primary text-white"> <i class="fa fa-arrow-left"> Back</i></a>
                            </div>
                        </div>
                         
</div>
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
  <?php include "../partials/footer.php"?>

  <script>
    $(document).ready(function() {
        $('#proivder').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf'
                // 'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );
</script>
