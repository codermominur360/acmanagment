<?php 
include "../partials/header.php";
include "../../controller/Depodit.php";
include "../../controller/ShareHolder.php";
$con = new Dipodit(); 
$shareHolder = new ShareHolder();
?>
<title> edit </title>
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

          <div class="row">
         <!-- Start Form Insert Database  -->
              <div class="col-lg-12 ">
                  <div class="card-body"> 
                        <p class="card-description"> <b>Depodit Create</b> </p>
                        <?php
                            if (isset($_REQUEST['update'])) {
                                if ($_SERVER['REQUEST_METHOD'] == 'POST') { ?>
                                    <div class="alert alert-success"><?php echo $con->update($_POST); ?>
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
                                    </div>
                                <?php } else { ?>
                                    <div class="alert alert-danger">Request Method Invalid!</div>
                                <?php } 
                            }
                            if ($_REQUEST['id']) {
                                $id = $_REQUEST['id'];  
                                $results = $con->edit('dipodites', $id);
                                foreach ($results as $result) {  
                        ?>

                        <form class="user" action="" method="POST">
                        <input type="text" name="id" value="<?php echo $result['id'] ?>" hidden> 
                             
                            <div class="form-group row">
                                <div class=" col-sm-12 ">  
                                    <input type="text" class="form-control" required name="name" value="<?php echo $result['name']?>" hidden>
                                </div>
                                <div class=" col-sm-6 "> 
                                <label for="">Creadit</label>
                                    <input type="text" class="form-control" required name="creadit" value="<?php echo $result['creadit']?>" id="creadit" onkeyup=calu() >
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Debit</label> 
                                    <input type="text" class="form-control" required name="debit" value="<?php echo $result['debit']?>" id="debit" onkeyup=calu() >
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Due</label> 
                                    <input type="text" class="form-control" required name="due" value="<?php echo $result['due']?>" id="due" onkeyup=calu() readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Date</label> 
                                    <input type="date" class="form-control" required name="update_date"   >
                                </div>
                            </div> 
                            <input type="submit" class="btn btn-primary btn-user pl-5 pr-5" name="update" value="Re-Depodit"/>

                        </form>
                        <?php 
                            }
                        }
                        ?>
                    </div>
              </div>
             
          </div>    
        </div>
          <!-- content-wrapper ends -->
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
        <script>
            function calu(){
                var totalcreadit = document.getElementById('creadit').value 
                var paidDebit = document.getElementById('debit').value 
                var dueAmount= document.getElementById('due').value = totalcreadit - paidDebit
            }
             
        </script>
        <script> 
        // Row data Delete to database
           function deleteData(){
               alert('Media is Delete ');
           }
        </script>