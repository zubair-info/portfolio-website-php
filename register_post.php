<?php
session_start();

require_once('config.php');
// print_r($_POST);

$first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
$first_name_lenth = strlen($first_name);
// $_SESSION['first_name']=$first_name;  
$last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
// $_SESSION['last_name']=$last_name;  
$number = filter_var($_POST['number'], FILTER_SANITIZE_NUMBER_INT);
// $_SESSION['number']=$number;   

$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$email_lower = strtolower($email);
$valid_email = filter_var($email_lower, FILTER_VALIDATE_EMAIL);
$password = $_POST['password'];
$pass_upper = preg_match('@[A-Z]@', $password);
$pass_lower = preg_match('@[a-z]@', $password);
$pass_num = preg_match('@[0-9]@', $password);
$pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
$pass_char = preg_match($pattern, $password);
// $_SESSION['password']=$password; 
$confirm_password = $_POST['confirm_password'];

if (empty($first_name)) {
    $_SESSION['error_msg_fname'] = 'First Name is Required!';
    header('location:register.php');
} else if (!preg_match("/^[a-zA-Z ]*$/", $first_name)) {
    $_SESSION['error_msg_fname'] = 'Only letters  are allowed!';
    header('location:register.php');
} else if ($first_name_lenth < 3 || $first_name_lenth > 10) {
    $_SESSION['error_msg_fname'] = 'First Name is min 3 char and max 5!';
    header('location:register.php');
} else if (empty($last_name)) {
    $_SESSION['error_msg_lname'] = 'Last Name is Required!';
    header('location:register.php');
} else if (!preg_match("/^[a-zA-Z ]*$/", $last_name)) {
    $_SESSION['error_msg_lname'] = 'Only letters  are allowed!';
    header('location:register.php');
} else if (empty($number)) {
    $_SESSION['error_msg_num'] = 'Number Required!';
    header('location:register.php');
} else if (empty($email)) {
    $_SESSION['error_msg_email'] = 'Email is Required!';
    header('location:register.php');
} else if (empty($password)) {
    $_SESSION['error_msg_pass'] = 'Password is Required!';
    header('location:register.php');
} else if (empty($confirm_password)) {
    $_SESSION['error_msg_cpass'] = 'Confirm Password is Required!';
    header('location:register.php');
} else {

    if ($valid_email) {

        if (strlen($password) < 5) {
            $_SESSION['error_msg_pass'] = 'Password should be at least 5 characters!';
            header('location:register.php');
        } elseif (!$pass_upper == 1) {
            $_SESSION['error_msg_pass'] = "Password must include at least  one upper letter!";
            header('location:register.php');
        } elseif (!$pass_lower == 1) {
            $_SESSION['error_msg_pass'] = "Password should include at least one lower case letter!";
            header('location:register.php');
        } elseif (!$pass_num == 1) {
            $_SESSION['error_msg_pass'] = "Password should include at least one number!";
            header('location:register.php');
        } elseif (!$pass_char == 1) {
            $_SESSION['error_msg_pass'] = "Password should include at least one doller sing!";
            header('location:register.php');
        } else if ($password !== $confirm_password) {
            $_SESSION['error_msg_cpass'] = "Password Does not match!";
            header('location:register.php');
        } else {

            $pass_encrypt = md5($password);
            $conf_pass_encrypt = md5($confirm_password);
            $duplicate_email_check = "SELECT COUNT(*) AS total_email FROM users WHERE email='$valid_email'";
            $db_query_result = mysqli_query($db_conect, $duplicate_email_check);

            // if($db_query_result){
            //     echo "ok";

            // }else{
            //     echo 'vejal ace';
            // }
            // print_r($db_query_result);
            $after_associte_res = mysqli_fetch_assoc($db_query_result);
            //    print_r($after_associte_res);

            if ($after_associte_res['total_email'] == 0) {

                // echo 'data insert kora jabe';

                $insert_query = "INSERT INTO `users`(`first_name`, `last_name`,`number`,`email`,`password`, `confirm_password`) VALUES ('$first_name','$last_name','$number','$valid_email','$pass_encrypt','$conf_pass_encrypt')";

                mysqli_query($db_conect, $insert_query);
                $_SESSION['success_msg'] = 'Congarts!! Your Registration Sucessfully!!';
                // unset($_SESSION['error_msg_fname']);
                // unset($_SESSION['error_msg_lname']);
                //    unset($_SESSION['number']);
                //    unset($_SESSION['first_name']);
                //    unset($_SESSION['first_name']);
                //    unset($_SESSION['first_name']);
                //    unset($_SESSION['first_name']);
                //    unset($_SESSION['first_name']);
                //    unset($_SESSION['first_name']);
                //    unset($_SESSION['first_name']);
                //    unset($_SESSION['first_name']);
                //    unset($_SESSION['first_name']);


                //    if($sql){
                //     $_SESSION['success_msg']='Congarts!! Your Registration Sucessfully!!';
                //    }else{
                //     $_SESSION['error_msg']='opps!! database connection faild!!';
                //    }      

                header('location:register.php');
            } else {

                $_SESSION['error_msg_email'] = 'Email Already Register';
                header('location:register.php');
                // echo 'Email Already Register';
            }
            // echo 'Strong password.';

        }
    } else {
        // echo 'invalid email';
        $_SESSION['error_msg_email'] = 'Email Invalid';
        header('location:register.php');
    }
}
