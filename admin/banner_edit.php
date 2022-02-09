<?php
session_start();
ob_start();
include('inc/admin_header.php');
include('inc/navbar.php');
// include('inc/sidebar.php');
include('../config.php');
if (!isset($_SESSION['user_status'])) {

    header('location:../login.php');
}


$id = $_GET['banner_id'];
$get_query = "SELECT * FROM banners WHERE id=$id";
$db_from = mysqli_query($db_conect, $get_query);
$after_assoc = mysqli_fetch_assoc($db_from);
// header('location: guest_message.php');

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $banner_title_one = filter_var($_POST['banner_title_one'], FILTER_SANITIZE_STRING);
    // $banner_title_one = strtoupper($banner_title_one);
    $banner_title_two = filter_var($_POST['banner_title_two'], FILTER_SANITIZE_STRING);
    // $banner_title_two = strtoupper($banner_title_two);
    $banner_sub_title = filter_var($_POST['banner_sub_title'], FILTER_SANITIZE_STRING);
    // $banner_sub_title = strtoupper($banner_sub_title);
    $banner_detail = filter_var($_POST['banner_detail'], FILTER_SANITIZE_STRING);
    // $banner_title_one = filter_var($_POST['banner_title_one'], FILTER_SANITIZE_STRING);
    $banner_image = $_FILES['banner_image'];
    $image_orginal_name = $_FILES['banner_image']['name'];
    $image_orginal_size = $_FILES['banner_image']['size'];

    if (empty($banner_title_one)) {
        $_SESSION['banner_title_one'] = "Banner Title One Requried";
    } elseif (empty($banner_title_two)) {
        $_SESSION['banner_title_two'] = "Banner Title One Requried";
    } elseif (empty($banner_sub_title)) {
        $_SESSION['banner_sub_title'] = "Banner Title One Requried";
    } elseif (empty($banner_detail)) {
        $_SESSION['banner_detail'] = "Banner Title One Requried";
    } else {
        // echo 'update kora jabe';
        $update_query_banner = "UPDATE `banners` SET `banner_title_one`='$banner_title_one',`banner_title_two`='$banner_title_two',`banner_sub_title`='$banner_sub_title',`banner_detail`='$banner_detail' WHERE id=$id";
        mysqli_query($db_conect, $update_query_banner);
        header('location:banner.php');
        ob_end_flush();


        if ($_FILES['banner_image']['name']) {


            if ($image_orginal_size <= 2000000) {

                $after_explode = explode('.', $image_orginal_name);
                // print_r($after_explode);
                $image_extention = end($after_explode);
                // print_r($image_extention);
                $allow_extention = array('jpg', 'png', 'jpeg', 'PNG', 'JPEG', 'JPG');
                if (in_array($image_extention, $allow_extention)) {

                    $get_image_location = "SELECT image_location FROM banners WHERE id=$id";

                    $image_location_form_db = mysqli_query($db_conect, $get_image_location);

                    $after_assoc_image_location = mysqli_fetch_assoc($image_location_form_db);
                    // echo $after_assoc_image_location['image_location'];

                    unlink('../' . $after_assoc_image_location['image_location']);
                    $image_new_name = $id . "." . $image_extention;
                    $save_location = "../uploads/banner/" . $image_new_name;
                    move_uploaded_file($_FILES['banner_image']['tmp_name'], $save_location);
                    $image_location = "uploads/banner/" . $image_new_name;
                    $update_new_image_query = "UPDATE banners SET image_location='$image_location' WHERE id=$id";
                    mysqli_query($db_conect, $update_new_image_query);
                    header('location: banner.php');
                    ob_end_flush();
                }
            } else {
                $_SESSION['banner_image'] = "Image is too big!! more than 2MB";
            }
        } else {
            $_SESSION['banner_image'] = "Image requried";
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
                    <h1>Banner Edit</h1>
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
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Banner Edit</h3>
                        </div>
                        <div class="card-body">
                            <form action=" " method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" class="form-control" value="<?= $after_assoc['id'] ?>">
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Banner Title One</label>
                                    <input type="text" name="banner_title_one" value="<?= $after_assoc['banner_title_one'] ?>" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['banner_title_one'])) {
                                            echo $_SESSION['banner_title_one'];
                                            unset($_SESSION['banner_title_one']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Banner Title Two</label>
                                    <input type="text" name="banner_title_two" value="<?= $after_assoc['banner_title_two'] ?>" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['banner_title_two'])) {
                                            echo $_SESSION['banner_title_two'];
                                            unset($_SESSION['banner_title_two']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Bannerb Sub Title </label>
                                    <input type="text" name="banner_sub_title" value="<?= $after_assoc['banner_sub_title'] ?>" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['banner_sub_title'])) {
                                            echo $_SESSION['banner_sub_title'];
                                            unset($_SESSION['banner_sub_title']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Banner Details</label>
                                    <!-- <input type="text" cols="50" rows="10" name="banner_detail" value="<?= $after_assoc['banner_detail'] ?>" class="form-control"> -->
                                    <textarea name="banner_detail" class="form-control cols=" 30" rows="5"><?= $after_assoc['banner_detail'] ?></textarea>
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['banner_detail'])) {
                                            echo $_SESSION['banner_detail'];
                                            unset($_SESSION['banner_detail']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">Banner Image</label>
                                    <input type="file" name="banner_image" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['banner_image'])) {
                                            echo $_SESSION['banner_image'];
                                            unset($_SESSION['banner_image']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <img src="../<?= $after_assoc['image_location'] ?>" alt="" width="150">
                                </div>

                                <button class="btn btn-success" name="submit" type="submit">Update Banner</button>
                            </form>

                        </div>


                    </div>


                </div>

            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>






<?php
include('inc/admin_footer.php');

?>