<?php 
include "../partials/header.php";
include "../../controller/Person.php"; 
include "../../controller/Category.php";
include "../../controller/Media.php";
$con = new Person(); 
$category =new Category(); 
$media =new Media(); 
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
            <!-- content-wrapper start -->

            <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"><strong>Candidate Update</strong></h4>
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
                            $results = $con->edit("person",$id);   
                            foreach ($results as $result) 
                            {  
                         ?>
                    <form class="user" action="" method="POST">
                    <input type="text" name="id" value="<?php echo $result['id'] ?>" hidden>
                    
                      <p class="card-description"> Personal info </p>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group row"> 
                            <div class="col-sm-11">
                            <label for=""> Person Name</label>
                              <input type="text" class="form-control" name="p_name" value="<?php echo $result['p_name'] ?>" require  >
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group row"> 
                        <label for="">Univercity</label>
                            <div class="col-sm-11">
                            <input type="text" class="form-control "  name="university"  value="<?php echo $result['univercity'] ?>" require   >
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Father Name</label>
                            <div class="col-sm-11">
                              <input type="text" class="form-control" name="father" value="<?php echo $result['father'] ?>"  require  >
                            </div>
                          </div>
                        </div>  
                        <div class="col-md-4">
                          <div class="form-group row">
                              <label for="">Address</label>
                            <div class="col-sm-11"> 
                                <textarea name="address" cols="35" rows="1" require  ><?php echo $result['p_address']?></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Department</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="department"  value="<?php echo $result['department']; ?>" >
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="p_phone"  value="<?php echo $result['p_phone']; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6" hidden>
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Semester</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="semester"  value="<?php echo $result['semester'] ?>" require  >
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Total Amount </label>
                            <div class="col-sm-9"> 
                            <input type="number" class="form-control" id="total" name="total_amt"  value="<?php echo $result['total_amt']; ?>" onkeyup="sub()" placeholder="total" require>
                            </div>
                          </div>
                        </div>                         
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Due Amount</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" name="due_amt" value="<?php echo $result['due_amt'] ?>" 
                              id="due" onkeyup="sub()"  >
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Payment</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" name="pay_amt" value="<?php echo $result['pay_amt']?>"  
                              id="payment" onkeyup="sub()"   >
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6" >
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date</label>
                            <div class="col-sm-9">
                              <input type="date" class="form-control" name="date" value="<?php echo $result['date']?>">
                            </div>
                          </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Gender</label>
                                  <input type="text" name="gender" value="<?php echo $result['gender']?>" readonly   >
                              </div>
                          </div>
                        </div>  
                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <?php $categories = $category->index("categories");   ?>
                                <select class="form-control" name="cat_id" id="" required>
                                     <?php foreach ($categories as $category) { ?>
                                        <option value="<?php echo $category['id']; ?>"><?php echo str_replace('_',' ',$category['category']); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                          </div>  
                        </div> 
                        <div class="col-md-6" >
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Media</label>
                            <div class="col-sm-9">
                                <?php $medias = $media->index("media");   ?>
                                <select class="form-control" name="media_id" id="" required> 
                                  <?php foreach ($medias as $media) { ?>
                                  <option value="<?php echo $media['id']; ?>"><?php echo str_replace('_',' ',$media['m_name']); ?></option>
                                  <?php } ?>
                                </select>
                            </div>
                          </div>
                        </div> 
                        </div>
                         
                      <!-- left slide End -->
                      <!-- <input type="submit" value="update" name="update"> -->
                      <button type="submit" class="btn btn-primary btn-block" name="update" > <i class="fa fa-check"></i> Save </button> 
                    </form>
                    <?php } }?>
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
            let text = 'Neg';
            if(dueAmount <0 ){
              alert('Due no accepted Nagetive Value')
               document.getElementById('due').value = text;

            }

        }

</script>