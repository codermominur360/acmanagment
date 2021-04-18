<?php include "../partials/header.php";
include "../../controller/Expensive.php";
$con = new Expensive();
?>
<title> Expensive </title>
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
              <div class="col-lg-6">
                  <div class="card-body">
                        <h4 class="card-title"><strong>Expensive Of Expense </strong></h4>
                        <p class="card-description"> Expensive Create </p>
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
                                    <input type="text" class="form-control" required name="expensive_name"  placeholder="Expensive Name">
                                </div>
                            </div>
                          <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" class="form-control" required name="position" placeholder="Position of Company">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <select class="form-control" required name="status" id="">
                                        <option value="">Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">De-Active</option>
                                    </select>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-primary btn-block" name="submit" value="Add Expensive"/>
                        </form>
                    </div>
                    <a href="http://localhost/row/acManagment/admin/expense/" class="btn btn-warning"> Back</a>

              </div>
              <div class="col-lg-6">
              <h4 class="bg-white p-3"> <i class="fa fa-list"></i> Category List</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered" >
                                <thead >
                                    <tr>
                                        <th>Sl</th> 
                                        <th>Expensive Name</th>
                                        <th>Position</th>
                                        <th>Status At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php 
                                    if(isset($_GET['del'])){
                                        $id= $_GET['id']; 
                                        $results = $con->delete($id,'expensivess');
                                    }
                                    $results = $con->index("expensivess"); 
                                    
                                    foreach ($results as $key => $result) { 
                                    ?>
                                        <tr>
                                            <td><?php echo $key+1 ?></td>
                                            <td><?php echo str_replace("_", " ", $result['expensive_name']) ?></td>
                                            <td><?php echo str_replace("_", " ", $result['position']) ?></td>
                                            <td class="<?php echo ($result['status'] == 1) ? 'text-info' : 'text-danger' ?>"><?php echo ($result['status'] == 1) ? 'Active' : 'De-Active' ?></td> 
                                            <td>
                                                <a href=" ?del=delete&id=<?php echo $result['id']?>" class="text-danger" id="deleteAlert" onclick="deleteDate().value;"><i class="fa fa-trash-o"></i></a>
                                                
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>  
              </div>
          </div>    
        </div> 
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
        <?php include "../partials/footer.php"?>
        <script> 
        function deleteDate(){
            alert('Category is delete');
        }
        </script>
          