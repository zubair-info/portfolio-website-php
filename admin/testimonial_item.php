<?php
session_start();
require_once('inc/admin_header.php');
require_once('inc/navbar.php');

if (!isset($_SESSION['user_status'])) {

    header('location: ../login.php');
}


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Testimonal Item</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Testimonal Item</li>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title text-capitalize">Testimonal Add From</h3>
                        </div>

                        <div class="card-body">

                            <form action="testimonial_item_Post.php" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">testimonial Item name</label>
                                    <input type="text" name="name" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_name'])) {
                                            echo $_SESSION['error_msg_name'];
                                            unset($_SESSION['error_msg_name']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">testimonial Item Degination</label>
                                    <input type="text" name="degination" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_degination'])) {
                                            echo $_SESSION['error_msg_degination'];
                                            unset($_SESSION['error_msg_degination']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">testimonial Item Details</label>
                                    <!-- <input type="text" name="service_detail" class="form-control"> -->
                                    <textarea type="text" class="form-control" id="detail" name="detail" rows="4" cols="50"></textarea>
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_detail'])) {
                                            echo $_SESSION['error_msg_detail'];
                                            unset($_SESSION['error_msg_detail']);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="text-capitalize">testimonial Image</label>
                                    <input type="file" name="testimonial_image" class="form-control">
                                    <span class="text-danger" style="color:red;">
                                        <?php
                                        if (isset($_SESSION['error_msg_image'])) {
                                            echo $_SESSION['error_msg_image'];
                                            unset($_SESSION['error_msg_image']);
                                        }
                                        ?>
                                    </span>
                                </div>

                                <button class="btn btn-success" name="submit" type="submit">Add Items</button>
                            </form>

                        </div>

                    </div>


                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title text-capitalize">Testimonal Item List</h3>
                        </div>

                        <div class="card-body box-body table-responsive no-padding">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Item name</th>
                                        <th>Item Degination</th>
                                        <th>Item Details</th>
                                        <th>Item Image</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $get_query = "SELECT * FROM testimonial_items";
                                    $db_from = mysqli_query($db_conect, $get_query);

                                    $count = 0;

                                    foreach ($db_from as $testimonial) {

                                        $count++

                                    ?>

                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><?= $testimonial['name'] ?></td>
                                            <td><?= $testimonial['degination'] ?></td>
                                            <td><?= $testimonial['detail'] ?></td>

                                            <td>
                                                <img src="../<?= $testimonial['image_location'] ?>" alt="" width="150px;">

                                            </td>
                                            <td>
                                                <?php
                                                if ($testimonial['active_sts'] == 1) :
                                                ?>
                                                    <span class="badge bg-success">active</span>

                                                <?php
                                                else :
                                                ?>
                                                    <span class="badge bg-danger">Deactive</span>


                                                <?php
                                                endif

                                                ?>

                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                    <?php
                                                    if ($testimonial['active_sts'] == 1) :
                                                    ?>
                                                        <a href="testimonial_item_active.php?testimonial_id=<?= $testimonial['id'] ?>" class="btn btn-danger"" class=" make_active_btn btn btn-success">active</a>

                                                    <?php
                                                    else :
                                                    ?>
                                                        <a href="testimonial_item_deactive.php?testimonial_id=<?= $testimonial['id'] ?>" class="make_deactive_btn btn btn-success">Deactive</a>


                                                    <?php
                                                    endif

                                                    ?>

                                                    <a href="testimonial_item_edit.php?testimonial_id=<?= $testimonial['id'] ?>" class="btn btn-warning">Edit</a>
                                                    <!-- <a href="testimonial_item_delete.php?testimonial_id=<?= $testimonial['id'] ?>" class="btn btn-danger">Delete</a> -->
                                                    <button value="testimonial_item_delete.php?testimonial_id=<?= $testimonial['id'] ?>" type="submit" class="delete_btn btn btn-danger"> DELETE</button>



                                                </div>
                                            </td>

                                        </tr>
                                    <?php

                                    }

                                    ?>

                                </tbody>


                            </table>

                        </div>


                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section> <!-- /.col -->
</div>


<?php
require_once('inc/admin_footer.php');
?>
<!-- <script>
  $( document ).ready(function() {
    
    
    $('.delete_btn').click(function(){

      var link=$(this).val();

      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
        window.location.href=link
          
        }

      })

    });
  });
  
  
</script> -->
<!-- <?php if (isset($_SESSION['testimonial_success'])) : ?> 
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
    icon: 'success',
    title: '<?php echo $_SESSION['testimonial_success'] ?>'
    })
</script>

<?php endif ?>
<?php unset($_SESSION['testimonial_success']); ?> -->