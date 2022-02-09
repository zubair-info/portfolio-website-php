<?php
session_start();
include('header.php');
?>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-5 m-auto">
            <div class="card ">
                <div class="card-body">
                    <div class="row">
                        <div class="d-flex justify-content-center">

                            <img width="100px" class="m-auto center" src="pic1.jpg" />

                        </div>

                    </div>

                    <div class="row">
                        <div>

                            <h4 class="text-center">User Registration</h4>

                            <h6 class="text-center">Account Details - </h6>


                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <hr>
                        </div>
                    </div>

                    <?php

                    if (isset($_SESSION['success_msg'])) {

                    ?>
                        <div class="alert alert-success" role="alert">
                            <?php
                            echo $_SESSION['success_msg'];
                            unset($_SESSION['success_msg']);

                            ?>
                        </div>

                    <?php
                    }

                    ?>
                    <?php

                    if (isset($_SESSION['error_msg'])) {

                    ?>
                        <div class="alert alert-danger" role="alert">
                            <?php
                            echo $_SESSION['error_msg'];
                            unset($_SESSION['error_msg']);

                            ?>
                        </div>

                    <?php
                    }

                    ?>

                    <form action="register_post.php" method="POST">

                        <div class="row">
                            <div class="col-md-6">
                                <label for="first_name">First Name<span style="color:red;">*</span></label>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="first_name" id="first_name" value="<?php if (isset($first_name)) echo $first_name; ?>">

                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_fname'])) {
                                            echo $_SESSION['error_msg_fname'];
                                            unset($_SESSION['error_msg_fname']);
                                        }
                                        ?>
                                    </span>

                                </div>

                            </div>
                            <div class="col-md-6">
                                <label for="last_name">Last Name<span style="color:red;">*</span></label>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="last_name" id="last_name" value="<?php if (isset($last_name)) echo $last_name; ?>">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_lname'])) {
                                            echo $_SESSION['error_msg_lname'];
                                            unset($_SESSION['error_msg_lname']);
                                        }
                                        ?>
                                    </span>
                                </div>

                            </div>
                        </div>

                        <div class="row mt-2">

                            <div class="col-md-6">
                                <label for="number">Contact No<span style="color:red;">*</span></label>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="number" id="number" value="<?php if (isset($number)) echo $number; ?>">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_num'])) {
                                            echo $_SESSION['error_msg_num'];
                                            unset($_SESSION['error_msg_num']);
                                        }
                                        ?>
                                    </span>
                                </div>

                            </div>
                            <div class="col-md-6">
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


                        </div>

                        <div class="row mt-1">

                            <div class="col-md-6">
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
                            <div class="col-md-6">
                                <label for="confirm_password">Confirm Password<span style="color:red;">*</span></label>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_cpass'])) {
                                            echo $_SESSION['error_msg_cpass'];
                                            unset($_SESSION['error_msg_cpass']);
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>




                        <div class="row mt-4 mb-4 ">
                            <div class="col-6">

                                <input type="submit" style="width:100%;" name="submit" class="btn btn-success" value="SINGUP">
                            </div>
                            <div class="col-6">
                                <a href="login.php" style="width:100%;" class="btn btn-danger">LOGIN</a>
                                <!-- <input style="width:100%;" style="width: 350px;" class="btn btn-danger" value="LOGIN">  -->

                            </div>
                        </div>


                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once('footer.php');
?>