<?php
include "../partials/header.php";
include "../../controller/Media.php";
$con = new Media();

?> 
<title> create </title>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <div class="card">
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

                        <form class="user" action="" method="POST">
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" class="form-control" required name="mname" placeholder="Media Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" class="form-control" required name="occupation" placeholder="Occupation Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0"> 
                                    <input type="text" class="form-control" required name="m_phone" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0"> 
                                    <input type="text" class="form-control" required name="address" placeholder="Address....">
                                </div>
                            </div>

                            <input type="submit" class="btn btn-primary btn-user" name="submit" value="Add Category"/>
                        </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
   