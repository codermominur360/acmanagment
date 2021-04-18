<?php
include "../partials/header.php";
include "../partials/navbar.php";
include "../../controller/Provided.php"; 
include "../../controller/Category.php";
include "../../controller/Media.php";

$con = new Provided();  
$category =new Category(); 
$media =new Media(); 

?> 
<title> provide </title>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
      <?php include "../partials/sidebar.php"?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- content-wrapper start -->
            
            <div class="card mt-5">
                  <div class="card-body">
                    <h4 class="card-title"><strong>Provide For Candidate </strong></h4>
                    <?php
                        if (isset($_REQUEST['submit'])) {
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') { ?>
                                <div class="alert alert-success"><?php echo $con->create($_POST); ?>
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"> × </span></button>
                                </div>
                            <?php } else { ?>
                                <div class="alert alert-danger">Request Method Invalid!</div>
                            <?php }
                        } 
                    ?>
                    <form class="user" action="" method="POST"> 
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Cause Name </label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="cause" placeholder="cause name" require>
                              <span style="font-size:11px;color:red; font-family:arial;"><i>mention the cause name </i></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Amount </label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" name="provid_amt" placeholder="Amount" require>
                              <span style="font-size:11px;color:red; font-family:arial;"><i>only number accepted !</i></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date</label>
                            <div class="col-sm-9">
                              <input type="date" class="form-control" name="date" require>
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Description </label>
                            <div class="col-sm-9"> 
                                <textarea name="description" id="" cols="40" rows="1" require></textarea>
                            </div>
                          </div>
                        </div>
                      </div> 
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Media</label>
                            <div class="col-sm-9">
                                <?php $results = $category->index("media");   ?>
                                    <select class="form-control" name="media_id" id="" required>
                                        <option value="">Select Media Name </option>
                                        <?php foreach ($results as $result) { ?>
                                            <option value="<?php echo $result['id']; ?>"><?php echo str_replace('_',' ',$result['m_name']); ?></option>
                                <?php } ?>
                                    </select>
                            </div>
                          </div>
                        </div>                       
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <?php $results = $category->index("categories");   ?>
                                <select class="form-control" name="cat_id" id="" required>
                                    <option value="">Select Media Name </option>
                                    <?php foreach ($results as $result) { ?>
                                        <option value="<?php echo $result['id']; ?>"><?php echo str_replace('_',' ',$result['category']); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                          </div>
                        </div>
                      </div> 
                      <input type="submit" name="submit" class="form-control btn btn-primary btn-block"
                            placeholder="Save" >
                      <!-- <button type="submit" class="btn btn-primary btn-block" name="submit" > <i class="fa fa-check"></i> Save </button>  -->
                    </form>
                  </div>
                </div> 
        <!-- content-wrapper ends -->
        </div>
<!-- partial:partials/_footer.html -->
<?php include "../partials/footer.php"; ?> 

<script>
   
   function sub(){
            var totalAmount = document.getElementById('total').value
            var paidAmount = document.getElementById('payment').value
            var dueAmount= document.getElementById('due').value = totalAmount - paidAmount

            let text = 'neg sign not accepted';
            if(dueAmount < 0 ){
               document.getElementById("due").context = "000";
            }

        }

</script>