<?php
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

              <h3 class="profile-username text-center text-capitalize"><?= $after_assoc['first_name'] ?> <?= $after_assoc['last_name'] ?></h3>

              <!-- <p class="text-muted text-center">Software Engineer</p> -->
              <p class="text-muted text-center"><?= $after_assoc['email'] ?></p>
              <p class="text-muted text-center text-capitalize"><?= $after_assoc['address'] ?></p>


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

              <a href="profile_edit.php" class="btn btn-warning btn-block text-dark"><b>Profile Edit</b></a>
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
              <h3 class="card-title">Profile</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <div class="card-body">
              <?php

              if (isset($_SESSION['update_successs'])) {

              ?>
                <div class="alert alert-success" role="alert">
                  <?php
                  echo $_SESSION['update_successs'];
                  unset($_SESSION['update_successs']);

                  ?>
                </div>

              <?php
              }

              ?>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">First Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0 title text-capitalize"><?= $after_assoc['first_name'] ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Last Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0 title text-capitalize"><?= $after_assoc['last_name'] ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $after_assoc['email'] ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Number</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0 title text-capitalize"><?= $after_assoc['number'] ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Date Of Birth</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0 title text-capitalize"><?= $after_assoc['date_of_birth'] ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Country</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0 title text-capitalize"><?= $after_assoc['country'] ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">State</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0 title text-capitalize"><?= $after_assoc['state'] ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">city</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0 title text-capitalize"><?= $after_assoc['city'] ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">post Code</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0 title text-capitalize"><?= $after_assoc['post_code'] ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Region</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0 title text-capitalize"><?= $after_assoc['region'] ?></p>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Image</p>
                </div>
                <div class="col-sm-9">
                  <p class="mb-0"> <img src="../<?= $after_assoc['image_location'] ?>" alt="" width="150px;"></p>


                </div>
              </div>
              <hr>
            </div>
            <!-- /.card-body -->

          </div>
          <!-- /.tab-content -->
        </div><!-- /.card-body -->
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