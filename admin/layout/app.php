<?php
// include '../../config/AuthSession.php'; 
//   Session::init();
//   include '../../database/DBconnection.php';

 
//  Session::checkSession(); 

// Session::get('phone');
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
          <!-- Login Message Start -->
          <?php
           $res= Session::get('loginmsg');
                if($res){
                    echo $res;
                    Session::set('loginmsg',null);
                }
          ?>
           <!-- Login Message Start -->
          <div class="row">
                <div class="col-md-3">
                  <div class="card bg-primary text-white">
                  <div class="contents">
                        <div class="content">
                            <i class="fa fa-list"></i>
                        </div>
                        <div class="content text-center">
                            <h3>50</h3>
                            <span>Midea</span>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="col-md-3">
                <div class="card bg-danger text-white">
                      <div class="contents">
                        <div class="content ">
                            <i class="fa fa-list"></i>
                        </div>
                        <div class="content text-center">
                            <h3>150</h3>
                            <span>candidate</span>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="col-md-3">
                <div class="card bg-warning text-white">
                      <div class="contents">
                        <div class="content">
                            <i class="fa fa-list"></i>
                        </div>
                        <div class="content text-center">
                            <h3>330</h3>
                            <span>Job Hollder</span>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card bg-info text-white">
                      <div class="contents">
                        <div class="content">
                            <i class="fa fa-list"></i>
                        </div>
                        <div class="content text-center">
                            <h3>50</h3>
                            <span>candidate</span>
                        </div>
                      </div>
                  </div>
                </div>
          </div>
          

          <!-- content-wrapper ends -->
        </div>
<!-- partial:partials/_footer.html -->
<?php include "../partials/footer.php"?>