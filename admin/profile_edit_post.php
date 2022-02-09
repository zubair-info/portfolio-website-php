<?php
session_start();
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
