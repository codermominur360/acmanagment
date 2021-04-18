<?php
include "../partials/header.php"; 
include "../../controller/Expensive.php";
include "../../controller/Expenselists.php";
$expensivess = new Expensive();
$con = new Expenselists();

?>
 <title> create </title>
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
           <!--  content-wrapper start -->
           <div class="row">
               <div class="col-lg-2"></div>
               <div class="col-lg-8">
               <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Expense Create</h4> 
                        <?php
                        if (isset($_REQUEST['submit'])) {
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') { ?>
                                <div class="alert alert-success"><?php echo $con->create($_POST); ?>
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
                                </div>



                            <?php } else { ?>
                                <div class="alert alert-danger">Request Method Invalid!</div>
                            <?php }
                        } ?>
                        <form action="" method="POST">
                        <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <label for=""> Expensive Name :</label>
                                    <?php $results = $expensivess->index("expensivess");   ?>
                                        <select class="form-control" name="exp_name" id="" required>
                                            <option value="">Expensive Name  </option>
                                            <?php foreach ($results as $result) { ?>
                                                <option value="<?php echo $result['id']; ?>"><?php echo str_replace('_',' ',$result['expensive_name']); ?></option>                            
                                            <?php } ?>
                                        </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <label for=""> Expensive Position :</label>
                                    <?php $results = $expensivess->index("expensivess");   ?>
                                        <select class="form-control" name="exp_position" id="" required>
                                            <option value="">Position </option>
                                            <?php foreach ($results as $result) { ?>
                                                <option value="<?php echo $result['id']; ?>"><?php echo str_replace('_',' ',$result['position']); ?></option>
                    
                                            <?php } ?>
                                        </select>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                <label for="">Name of Expense :</label>
                                    <input type="text" class="form-control" required name="name_of_expense"   placeholder="expense">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                <label for="">Name of Sector :</label>
                                    <input type="text" class="form-control" required name="name_of_sector"   placeholder="sector">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                <label for="">Total Amount :</label>
                                    <input type="number" class="form-control" required name="amount"  placeholder="amount">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                <label for="">Date :</label>
                                    <input type="date" class="form-control" required name="date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <textarea name="description" cols="74" rows="4" placeholder="Details of Expense and Expense Sector"></textarea>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-primary btn-user" name="submit" value="Add Expense"/>
                        </form>
                    </div>
            </div>
               </div> 
               <!-- content row is end -->
               <div class="col-lg-2"></div>
           </div>
            
            <!-- content-wrapper ends -->          
        </div>  
        <!-- partial:partials/_footer.html -->
          <?php include "../partials/footer.php"?>
