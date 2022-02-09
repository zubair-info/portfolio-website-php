<?php

session_start();
require_once('header.php');
// require_once('admin/header.php');
if (isset($_SESSION['user_status'])) {

    header('location: admin/dashboard.php');
}
?>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-3 m-auto">
            <div class="card ">
                <div class="card-body">
                    <div class="row">
                        <div class="d-flex justify-content-center">

                            <img width="100px" class="m-auto center" src="pic1.jpg" />

                        </div>

                    </div>

                    <div class="row">
                        <div>
                            <h4 class="text-center">User Login</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <hr>
                        </div>
                    </div>

                    <form action="login_post.php" method="POST">

                        <div class="row m-2">
                            <div class="d-flex justify-content-center">
                                <!-- <span class="badge badge-info" style="width:100%;">Info</span> -->
                                <span class="badge bg-warning text-dark">Login Credentials</span>
                                <!-- <p class="badge badge-warning"  >Login Credentials</p>  -->

                            </div>
                        </div>

                        <?php

                        if (isset($_SESSION['login_error'])) {

                        ?>
                            <div class="alert alert-danger" role="alert">
                                <?php
                                echo $_SESSION['login_error'];
                                unset($_SESSION['login_error']);

                                ?>
                            </div>

                        <?php
                        }

                        ?>

                        <div class="row mt-4">


                            <div class="col-md-12">
                                <label for="email">Email<span style="color:red;">*</span></label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="email" name="email" value="<?php if (isset($email)) echo $email; ?>" />

                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_email'])) {
                                            echo $_SESSION['error_msg_email'];
                                            unset($_SESSION['error_msg_email']);
                                        }
                                        ?>
                                    </span>

                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="password">Password<span style="color:red;">*</span></label>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">

                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_pass'])) {
                                            echo $_SESSION['error_msg_pass'];
                                            unset($_SESSION['error_msg_pass']);
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>

                        </div>


                        <div class="row mt-4 ">

                            <div class="d-grid gap-2">
                                <input type="submit" name="submit" class="btn btn-danger" value="LOGIN">
                                <a href="register.php" class="btn btn-success">SINGUP</a>
                                <!-- <input style="width:100%;" style="width: 350px;" class="btn btn-danger" value="LOGIN"> -->

                            </div>
                            <!-- <div class="col-6">
                        
                            <a href="index.php"   class="btn btn-danger">SINGUP</a>
                            
                        </div> -->

                        </div>


                    </form>



                </div>
            </div>
        </div>
    </div>

    <?php

    require_once('footer.php');

    ?>