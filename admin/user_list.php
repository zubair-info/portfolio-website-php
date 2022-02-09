<?php

session_start();
include('inc/admin_header.php');
include('inc/navbar.php');
include('../config.php');

if (!isset($_SESSION['user_status'])) {

  header('location:../login.php');
}

$sql_query = "SELECT * FROM users";
$db_from = mysqli_query($db_conect, $sql_query);

?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>User List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User List</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All User Information List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body box-body table-responsive no-paddings">
              <form action="user_mark_delete.php" method="post">


                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th> ID </th>

                      <th><input style="margin-left: 15px;" type="checkbox" id="checkAl"><br>Select All
                        <button type="submit" onclick="return ConfirmDelete('Are you sure you want to delete this item?');" name="delete" class="btn btn-danger" style="margin-left: 15px;"> DELETE</button>
                      </th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Number</th>
                      <th>EDIT </th>
                      <th>DELETE </th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php

                    $count = 0;
                    foreach ($db_from as $user) {


                      $count++

                    ?>

                      <tr>
                        <td><?= $count ?></td>
                        <td><input type="checkbox" name="check[<?= $user['id'] ?>]" style="margin-left: 15px;"></td>
                        <td><?= $user['first_name'] ?></td>
                        <td><?= $user['last_name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['number'] ?></td>
                        <td>
                          <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>

                        </td>
                        <td>
                          <button onclick="return ConfirmDelete('Are you sure you want to delete this item?');" value="user_delete.php?user_id=<?= $user['id'] ?>" type="submit" class="btn btn-danger"> DELETE</button>

                        </td>

                      </tr>
                    <?php

                    }

                    ?>

                  </tbody>
                </table>
              </form>


            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>



<?php
include('inc/admin_footer.php');
?>
<script>
  $(document).ready(function() {

    $("#checkAl").click(function() {
      $('input:checkbox').prop('checked', this.checked);
    });
  });
</script>
<!-- delete code -->
<script>
  function ConfirmDelete() {
    return confirm("Are you sure you want to delete?");
  }
</script>