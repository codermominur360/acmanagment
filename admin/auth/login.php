<?php
include '../../config/AuthSession.php';
Session::init();
Session::checklogin();
include '../../config/Auth.php'; 
$auth = new Auth();

?>

<?php  include "../partials/header.php"; ?> 
 
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auto-form-wrapper"> 
                  <?php
                    if (isset($_REQUEST['submit'])) {
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                          echo $auth->userLogin($_POST);
                        } else { ?>
                            <div class="alert alert-danger">Request Method Invalid!</div>
                        <?php }
                      } 
                  ?>
                <form action="" class='user' method="POST">
                  <div class="form-group">
                    <label class="label">Email</label>
                    <div class="input-group">
                      <input type="email" class="form-control" placeholder="Username Email" name="email">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="label">Password</label>
                    <div class="input-group">
                      <input type="password" class="form-control" placeholder="*********" name="password">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group"> 
                     <input type="submit" name="submit" value="login" class="btn btn-primary submit-btn btn-block" >
                  </div>
                  <div class="form-group d-flex justify-content-between">
                    <div class="form-check form-check-flat mt-0">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" checked> Keep me signed in </label>
                    </div>
                    <a href="#" class="text-small forgot-password text-black">Forgot Password</a>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-block g-login"> 
                       <span class="text-small font-weight-semibold">Not a member ?</span>
                       <a href="http://localhost/acManagment/admin/auth/register.php" class="text-black text-small">Create new account</a>
                    </button>
                  </div>
                  <div class="text-block text-center my-3">
                    
                  </div>
                </form>
              </div>
              <ul class="auth-footer">
                <li>
                  <a href="#">Conditions</a>
                </li>
                <li>
                  <a href="#">Help</a>
                </li>
                <li>
                  <a href="#">Terms</a>
                </li>
              </ul>
              <p class="footer-text text-center">copyright © 2018 Bootstrapdash. All rights reserved.</p>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <?php  include "../partials/footer.php"; ?> 

