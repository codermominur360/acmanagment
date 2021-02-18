<?php
include "../partials/header.php";
include "../../controller/Person.php"; 
include "../../controller/Category.php";
include "../../controller/Media.php";
$category =new Category(); 
$media =new Media(); 
$con = new Person(); 
?> 
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
                    <h4 class="card-title"><strong>Candidate Information</strong></h4>
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
                      <p class="card-description"> Personal info </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Candidate </label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="name" placeholder="candidate name" require>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Father Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="father" placeholder="father name" require>
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
                          <label class="col-sm-3 col-form-label">Address </label>
                            <div class="col-sm-9"> 
                                <textarea name="address" id="" cols="40" rows="1" require></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
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
                        <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Membership</label>
                            <div class="col-sm-4">
                              <div class="form-radio">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="gender" id="membershipRadios1" value="male" checked=""> Male <i class="input-helper"></i></label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-radio">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="gender" id="membershipRadios2" value="female"> Fe-Male <i class="input-helper"></i></label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <p class="card-description"> AMOUNT </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Total Amount </label>
                            <div class="col-sm-9"> 
                            <input type="number" class="form-control" name="total_amt"
                            id="total" onkeyup="sub()" placeholder="total" require>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Univercity</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" name="univercity" placeholder="univercity" require>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Payment</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" name="pay_amt" 
                              id="payment" onkeyup="sub()" placeholder="payment" require>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Semester</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="semester" placeholder="semester" require>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Due Amount</label>
                            <div class="col-sm-9">
                            <input type="number" class="form-control" name="due_amt"
                            id="due" onkeyup="sub()" placeholder="Due" disabled require>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Department</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="department" placeholder="department">
                            </div>
                          </div>
                        </div>
                      </div>
                      <input type="submit" class="form-control btn btn-primary btn-block" name="submit"
                            placeholder="Save" >
                      <!-- <button type="submit" class="btn btn-primary btn-block" name="submit" > <i class="fa fa-check"></i> Save </button>  -->
                    </form>
                  </div>
                </div> 
        <!-- content-wrapper ends -->
        </div>
<!-- partial:partials/_footer.html -->
<?php include "../partials/footer.php"?> 

<script>
   
   function sub(){
            var totalAmount = document.getElementById('total').value
            var paidAmount = document.getElementById('payment').value
            var dueAmount= document.getElementById('due').value = totalAmount - paidAmount

            let text = 'neg sign not accepted';
            if(dueAmount <0 ){
               document.getElementById("due").context = "neg sign!";
            }

        }

</script>