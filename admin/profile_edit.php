<?php
ob_start();
session_start();
include('inc/admin_header.php');
include('../config.php');
include('inc/navbar.php');
if (!isset($_SESSION['user_status'])) {
    header('location:../login.php');
}
$login_email = $_SESSION['email'];
$get_query = "SELECT * FROM users WHERE email='$login_email'";
$db_from = mysqli_query($db_conect, $get_query);
$after_assoc = mysqli_fetch_assoc($db_from);
// print_r($after_assoc);
// $profile_image = $_FILES['profile_image'];

if (isset($_POST['submit'])) {
    // $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $number = $_POST['number'];
    $date = $_POST['date'];
    $country = $_POST['country'];
    $_SESSION['country'] = $country;
    $city = $_POST['city'];
    $state = $_POST['state'];
    $post_code = $_POST['post_code'];
    $region = $_POST['region'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    // $profile_image = $_FILES['profile_image'];
    $profile_image = $_FILES['profile_image'];


    if (empty($first_name)) {
        $_SESSION['error_msg_fname'] = 'First Name is Required!';
    } else if (empty($last_name)) {
        $_SESSION['error_msg_lname'] = 'Last Name is Required!';
    } else if (empty($number)) {
        $_SESSION['error_msg_num'] = 'Number Required!';
    } elseif (empty($date)) {
        $_SESSION['error_msg_date'] = "Date  Required!";
    } elseif (empty($country) || $country == "Enter country") {
        $_SESSION['error_msg_country'] = "Country Name Required!";
    } elseif (empty($city)) {
        $_SESSION['error_msg_city'] = "City Name Required!";
    } elseif (empty($state)) {
        $_SESSION['error_msg_state'] = "State Name Required!";
    } elseif (empty($post_code)) {
        $_SESSION['error_msg_post_code'] = "Post Code  Required!";
    } elseif (empty($region)) {
        $_SESSION['error_msg_region'] = "Region Required!";
    } elseif (empty($address)) {
        $_SESSION['error_msg_address'] = "Address Required!";
    }
    // elseif(empty($gender)){
    //     $_SESSION['error_msg_gender']="Gender requried Required!";
    // }
    else {

        // echo 'update kora jabe';

        $email = $_POST['email'];

        $update_query = "UPDATE `users` SET `first_name`='$first_name',`last_name`='$last_name',`number`='$number' WHERE email='$email'";
        $update_query = "UPDATE `users` SET `first_name`='$first_name',`last_name`='$last_name',`number`='$number',`date_of_birth`='$date',`country`='$country',`city`='$city',`state`='$state',`post_code`='$post_code',`region`='$region',`address`='$address' WHERE email='$email'";
        mysqli_query($db_conect, $update_query);
        //    if($sql){
        //        echo 'update hobe';
        //    }else{
        //        echo 'update hobe na';
        //    }
        $_SESSION['update_success'] = "Your Profile Update Sucessfully Done!!!";
        header('location:profile.php');
        ob_end_flush();
        $image_orginal_name = $_FILES['profile_image']['name'];
        $image_orginal_size = $_FILES['profile_image']['size'];

        if ($_FILES['profile_image']['name']) {


            // echo 'ece';
            if ($image_orginal_size <= 2000000) {

                $after_explode = explode('.', $image_orginal_name);
                // print_r($after_explode);
                $image_extention = end($after_explode);
                // print_r($image_extention);
                $allow_extention = array('jpg', 'png', 'jpeg', 'PNG', 'JPEG', 'JPG');
                if (in_array($image_extention, $allow_extention)) {

                    $get_image_location = "SELECT image_location FROM users WHERE email='$email'";

                    $image_location_form_db = mysqli_query($db_conect, $get_image_location);

                    $after_assoc_image_location = mysqli_fetch_assoc($image_location_form_db);
                    // echo $after_assoc_image_location['image_location'];

                    unlink('../' . $after_assoc_image_location['image_location']);
                    $image_new_name = $id . "." . $image_extention;
                    $save_location = "../uploads/profile/" . $image_new_name;
                    move_uploaded_file($_FILES['profile_image']['tmp_name'], $save_location);
                    $image_location = "uploads/profile/" . $image_new_name;
                    $update_new_image_query = "UPDATE users SET image_location='$image_location' WHERE email='$email'";
                    mysqli_query($db_conect, $update_new_image_query);
                    $_SESSION['update_successs'] = "Profile Update Sucessfully!!";

                    header('location: profile.php');
                } else {
                    $_SESSION['profile_image'] = "Image Allowed Png,Jpg,Jpeg";
                    header('location: profile_edit.php');
                }
            } else {
                $_SESSION['profile_image'] = "Image is too big!! more than 2MB";
                header('location: profile_edit.php');
            }
        } else {
            // echo 'nai';
            $_SESSION['profile_image'] = "Image requried";
            header('location: profile_edit.php');
        }
    }
}

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="../<?= $after_assoc['image_location'] ?>" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center title text-capitalize"><?= $after_assoc['first_name'] ?> <?= $after_assoc['last_name'] ?></h3>

                            <p class="text-muted text-center">Software Engineer</p>
                            <p class="text-muted text-center"><?= $after_assoc['email'] ?></p>
                            <p class="text-muted text-center"><?= $after_assoc['address'] ?></p>


                            <!-- <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Followers</b> <a class="float-right">1,322</a>
                        </li>
                        <li class="list-group-item">
                            <b>Following</b> <a class="float-right">543</a>
                        </li>
                        <li class="list-group-item">
                            <b>Friends</b> <a class="float-right">13,287</a>
                        </li>
                        </ul> -->

                            <a href="#" class="btn btn-primary btn-block"><b>Profile </b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->

                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Profile Edit</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <div class="card-body">
                            <form action=" " method="POST" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="first_name">First Name<span style="color:red;">*</span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="hidden" name="email" id="email" value="<?= $after_assoc['email'] ?>">
                                            <input class="form-control" type="text" name="first_name" id="first_name" value="<?= $after_assoc['first_name'] ?>">

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
                                            <input class="form-control" type="text" name="last_name" id="last_name" value="<?= $after_assoc['last_name'] ?>">
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


                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="number">Contact No<span style="color:red;">*</span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="number" id="number" value="<?= $after_assoc['number'] ?>">
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
                                        <label for="date_of_birth">Date Of Birth<span style="color:red;">*</span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="date" name="date" id="date_of_birth" value="<?= $after_assoc['date_of_birth'] ?>">
                                            <span class="text-danger" style="color:red;">
                                                <?php
                                                if (isset($_SESSION['error_msg_date'])) {
                                                    echo $_SESSION['error_msg_date'];
                                                    unset($_SESSION['error_msg_date']);
                                                }
                                                ?>
                                            </span>
                                        </div>

                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <label for="country">Country<span style="color:red;">*</span></label>
                                        <div class="form-group">
                                            <select class="form-control" name="country" aria-label="Default select example">
                                                <option selected>Enter country</option>
                                                <option value="Bangladesh" <?= ($after_assoc['country'] == "Bangladesh") ? "selected" : "" ?>>Bangladesh</option>
                                                <option value="India" <?= ($after_assoc['country'] == "India") ? "selected" : "" ?>>India</option>
                                                <!-- <option <?php if ($_SESSION['country'] === "Pakistan") {
                                                                    echo ' selected="selected"';
                                                                } ?> value="Pakistan">Pakistan</option> -->
                                            </select>
                                            <span class="text-danger" style="color:red;">
                                                <?php
                                                if (isset($_SESSION['error_msg_country'])) {
                                                    echo $_SESSION['error_msg_country'];
                                                    unset($_SESSION['error_msg_country']);
                                                }
                                                ?>
                                            </span>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <label for="city">City<span style="color:red;">*</span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="city" id="city" value="<?= $after_assoc['city'] ?>">

                                            <span class="text-danger" style="color:red;">
                                                <?php
                                                if (isset($_SESSION['error_msg_city'])) {
                                                    echo $_SESSION['error_msg_city'];
                                                    unset($_SESSION['error_msg_city']);
                                                }
                                                ?>
                                            </span>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <label for="state">State<span style="color:red;">*</span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="state" id="state" value="<?= $after_assoc['state'] ?>">
                                            <span class="text-danger" style="color:red;">
                                                <?php
                                                if (isset($_SESSION['error_msg_state'])) {
                                                    echo $_SESSION['error_msg_state'];
                                                    unset($_SESSION['error_msg_state']);
                                                }
                                                ?>
                                            </span>
                                        </div>

                                    </div>

                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <label for="post_code">Post Code<span style="color:red;">*</span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="post_code" id="post_code" value="<?= $after_assoc['post_code'] ?>">
                                            <span class="text-danger" style="color:red;">
                                                <?php
                                                if (isset($_SESSION['error_msg_post_code'])) {
                                                    echo $_SESSION['error_msg_post_code'];
                                                    unset($_SESSION['error_msg_post_code']);
                                                }
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="region">Region<span style="color:red;">*</span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="region" id="region" value="<?= $after_assoc['region'] ?>">
                                            <span class="text-danger" style="color:red;">
                                                <?php
                                                if (isset($_SESSION['error_msg_region'])) {
                                                    echo $_SESSION['error_msg_region'];
                                                    unset($_SESSION['error_msg_region']);
                                                }
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email">Email<span style="color:red;">*</span></label>
                                        <div class="form-group Disabled">
                                            <input type="text" disabled class="form-control" id="email" name="email" value="<?= $after_assoc['email'] ?>" />
                                        </div>
                                    </div>

                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-7">

                                        <label for="address">Address<span style="color:red;">*</span></label>
                                        <div class="form-group">

                                            <textarea class="form-control" name="address" value=""><?= $after_assoc['address'] ?></textarea>
                                            <span class="text-danger" style="color:red;">
                                                <?php
                                                if (isset($_SESSION['error_msg_address'])) {
                                                    echo $_SESSION['error_msg_address'];
                                                    unset($_SESSION['error_msg_address']);
                                                }
                                                ?>
                                            </span>
                                        </div>

                                    </div>
                                    <div class="col-md-5">

                                        <label for="address">Profile Picture<span style="color:red;">*</span></label>
                                        <div class="form-group">

                                            <input type="file" name="profile_image" class="form-control">

                                        </div>
                                        <div class="mb-3">
                                            <img src="../<?= $after_assoc['image_location'] ?>" alt="" width="150">
                                        </div>


                                    </div>



                                    <div class="row mt-4">
                                        <div class="d-grid gap-2">

                                            <input type="submit" name="submit" class="btn btn-info" value="UPDATE PROFILE">
                                        </div>

                                    </div>

                            </form>

                        </div>

                    </div>
                </div>
                <!-- /.card -->
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


<?php
include('inc/admin_footer.php');

?>