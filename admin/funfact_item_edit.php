<?php
session_start();
ob_start();
require_once('inc/admin_header.php');
require_once('inc/navbar.php');
// require_once('inc/sidebar.php');
require_once('../config.php');
if (!isset($_SESSION['user_status'])) {

    header('location:../login.php');
}

if (isset($_GET['funfact_id'])) {
    $_SESSION['id'] = $_GET['funfact_id'];
}
$id = $_SESSION['id'];
// $id = $_GET['funfact_id'];
$get_query = "SELECT * FROM funfact_items WHERE id=$id";
$db_from = mysqli_query($db_conect, $get_query);
$after_assoc = mysqli_fetch_assoc($db_from);
// header('location: guest_message.php');



?>

<section>
    <div class="container">
        <div class="row m-auto">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header bg-info">
                        <h5 class="cadr-title text-capitalize">Funfact Item Edit From</h5>
                    </div>
                    <div class="card-body">

                        <form action="funfact__item_edit_post.php" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="id" value="<?= $after_assoc['id'] ?>">

                            <div class="mb-3">
                                <label for="" class="text-capitalize">Funfact Counter Number</label>
                                <input type="text" name="funfact_counter" value="<?= $after_assoc['funfact_counter'] ?>" class="form-control">
                                <span class="text-danger" style="color:red;">
                                    <?php
                                    if (isset($_SESSION['error_msg_funfact_counter'])) {
                                        echo $_SESSION['error_msg_funfact_counter'];
                                        unset($_SESSION['error_msg_funfact_counter']);
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="" class="text-capitalize">Funfact White Heading</label>
                                <input type="text" name="white_head" value="<?= $after_assoc['white_head'] ?>" class="form-control">
                                <span class="text-danger" style="color:red;">
                                    <?php
                                    if (isset($_SESSION['error_msg_white_head'])) {
                                        echo $_SESSION['error_msg_white_head'];
                                        unset($_SESSION['error_msg_white_head']);
                                    }
                                    ?>
                                </span>
                            </div>
                            <button class="btn btn-success" type="submit">Update Funfact</button>
                        </form>

                    </div>

                </div>

            </div>

        </div>
    </div>
</section>


<?php
require_once('../footer.php');

?>