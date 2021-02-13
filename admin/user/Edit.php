<?php
include "../../database/DBconnection.php";
include "../../controller/Person.php";
include "../../controller/Category.php";
include "../../controller/Media.php";
$con = new Person();
$cat = new Category();
$med = new Media();


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
            <!-- content-wrapper start -->
                <div class="card">
                   <div class="card-body">
                   <?php
                        if (isset($_REQUEST['update'])) {
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') { ?>
                                <!-- <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert"><span
                                                aria-hidden="true">×</span></button>
                                </div> -->
                                <?php echo $con->update($_POST)?>
                            <?php } else { ?>
                                <div class="alert alert-danger">Request Method Invalid!</div>
                            <?php }
                        }
                        if ($_REQUEST['id']) {
                        $id = $_REQUEST['id'];
                        $results = $con->edit('person', $id);
                        
                        foreach ($results as $result) {
                    ?>
                        <form class="forms-sample" action="" method="POST">
                            <input type="text" name="id" value="<?php echo $result['id'] ?>" hidden >
                            <!-- information -->
                            <div class="row">
                                <div class="col-sm-3 col-md-3 col-lg-4">
                                    <div class="form-group row p-2">
                                        <label for="exampleInputEmail2" class=" col-form-label">Cadidate Name</label> 
                                            <input type="text" class="form-control" value="<?php echo $result['name']; ?>" name="name"> 
                                    </div> 
                                </div>
                                <div class="col-sm-3 col-md-4 col-lg-4 ">
                                    <div class="form-group row  p-2">
                                        <label for="exampleInputEmail2" class=" col-form-label">Univercity</label> 
                                        <input type="text" class="form-control"  value="<?php echo $result['univercity'] ?>" name="univercity"> 
                                    </div> 
                                </div>
                                <div class="col-sm-3 col-md-4 col-lg-4 ">
                                    <div class="form-group row p-2">
                                        <label for="exampleInputEmail2" class=" col-form-label">Department</label> 
                                        <input type="text" class="form-control"  value="<?php echo $result['department']; ?>" name="department">
                                         
                                    </div> 
                                </div>
                            </div>
                            <!-- Media & Category -->
                            <div class="row"> 

                                <div class="col-sm-6 col-md-6 col-lg-6 ">
                                    <div class="form-group row p-2">
                                        <label for="exampleInputEmail2" class=" col-form-label">Catagory</label> 
                                        <?php $results = $med->index('categories'); ?>
                                        <select class="form-control" required name="cat_id" id=""> 
                                            <?php foreach ($results as $result) { ?>
                                                <option value="<?php echo $result['id']; ?>"><?php echo $result['category']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div> 
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6 ">
                                    <div class="form-group row p-2">
                                        <label for="exampleInputEmail2" class=" col-form-label">Media Name</label> 
                                        <?php $results = $med->index('media'); ?>
                                        <select class="form-control" required name="media_id" id=""> 
                                            <?php foreach ($results as $result) { ?>
                                                <option value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div> 
                                </div>

                            </div>
                           
                            
                             
                           <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Total Name</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control"  value="<?php echo $result['total_amt'] ?>" name="total_amt">
                                </div>
                           </div> 
                             
                           <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Payment Amount</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control"  value="<?php echo $result['pay_amt'] ?>" name="pay_amt">
                                </div>
                           </div> 
                             
                           <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Due Amount</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" value="<?php echo $result['due_amt'] ?>" name="due_amt">
                                </div>
                           </div> 
                          
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" class="form-control"
                                           value="<?php echo $result['father'];?>" name="father"
                                           hidden
                                           placeholder="Enter occupation Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" class="form-control none"
                                           value="<?php echo $result['address']; ?>" name="address"
                                           hidden
                                           placeholder="Enter address Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" class="form-control"
                                           value="<?php echo $result['semester'] ?>" name="semester"
                                           hidden
                                           placeholder="Enter semester Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-primary text-light btn-user" name="update"><i class="fa fa-pencil-square"></i> Update</button>  
                                </div>
                                <div class="col-sm-4">
                                    <a href="Index.php" class="btn bg-info text-light btn-user" > <i class="fa fa-reply"></i>Go Back</a>
                                </div>
                            </div>
                            <?php }
                            } ?>
                        </form>
                   </div>
                </div>
          <!-- content-wrapper ends -->
        </div>
<!-- partial:partials/_footer.html -->
<?php include "../partials/footer.php"?>   