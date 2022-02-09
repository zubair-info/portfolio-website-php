<?php
session_start();
require_once('inc/admin_header.php');


require_once('../config.php');
require_once('inc/navbar.php');
if (!isset($_SESSION['user_status'])) {

    header('location: ../login.php');
}
$get_query = "SELECT * FROM guest_messages";
$db_from = mysqli_query($db_conect, $get_query);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Message List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Message List</li>
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
                            <h3 class="card-title">All Guest Message</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body box-body table-responsive no-paddings">
                            <form action="message_mark_delete.php" method="post">

                                <table id="example1" class="table table-bordered table-striped">

                                    <thead>
                                        <tr>

                                            <th>SL </th>
                                            <th><input style="margin-left: 15px;" type="checkbox" id="checkAl"><br>Select All

                                                <button onclick="return ConfirmDelete('Are you sure you want to delete this item?');" type="submit" class="btn btn-danger" style="margin-left: 15px;"> DELETE</button>
                                                <!-- <a type="submit" class="btn btn-danger" style="margin-left: 15px;"> DELETE</a> -->
                                                <!-- onclick="return ConfirmDelete('Are you sure you want to delete this item?');" -->

                                            </th>

                                            <th>Guest Name</th>
                                            <th>Guest Email</th>
                                            <th>Guest Message</th>
                                            <th>Guest Subject</th>
                                            <th>Read Status</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = 0;

                                        foreach ($db_from as $message) {

                                            $count++

                                        ?>

                                            <tr class="
                                        <?php
                                            if ($message['read_sts'] == 1) {
                                                echo 'bg-info';
                                            } else {
                                                echo 'text-dark';
                                            }
                                        ?>
                                    ">
                                                <td><?= $count ?> </td>
                                                <td><input type="checkbox" name="check[<?= $message['id'] ?>]" style="margin-left: 15px;"></td>

                                                <td><?= $message['guest_name'] ?></td>
                                                <td><?= $message['guest_email'] ?></td>
                                                <td><?= $message['guest_message'] ?></td>
                                                <td><?= $message['guest_subject'] ?></td>
                                                <td>
                                                    <?php
                                                    if ($message['read_sts']  == 1) :

                                                    ?>
                                                        <a href="message_status.php?message_id=<?= $message['id'] ?>" class="btn btn-warning">mark as read</a>

                                                    <?php
                                                    else :
                                                    ?>
                                                        <a onclick="return ConfirmDelete('Are you sure you want to delete this item?');" href="message_delete.php?message_id=<?= $message['id'] ?>" class="btn btn-danger"> Delete</a>
                                                        <!-- <button value="message_delete.php?message_id=<?= $message['id'] ?>" type="submit" class="delete_btn btn btn-danger"> DELETE</button> -->
                                                        <!-- <button value="message_delete.php?message_id=<?= $message['id'] ?>" type="submit" class="delete_btn_mess btn btn-danger"> DELETE</button> -->

                                                    <?php
                                                    endif
                                                    ?>
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
require_once('inc/admin_footer.php')
?>
<script>
    $("#checkAl").click(function() {
        $('input:checkbox').prop('checked', this.checked);
    });
    // $(document).ready(function() {
    //     $('#checkAl').click(function() {
    //         if (this.checked)
    //             $(".chkbox").prop("checked", true);
    //         else
    //             $(".chkbox").prop("checked", false);
    //     });
    // });
</script>

<!-- delete code -->
<script>
    function ConfirmDelete() {
        return confirm("Are you sure you want to delete?");
    }
</script>
<script>
    $(document).ready(function() {


        $('.delete_btn_mess').click(function() {

            var link = $(this).val();
            // alert(link)
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
                    window.location.href = link
                    // Swal.fire(
                    //     'Deleted!',
                    //     'Your file has been deleted.',
                    //     'success'
                    // )
                }
            })

            // Swal.fire({
            //     title: 'Are you sure?',
            //     text: "You won't be able to revert this!",
            //     icon: 'warning',
            //     showCancelButton: true,
            //     confirmButtonColor: '#3085d6',
            //     cancelButtonColor: '#d33',
            //     confirmButtonText: 'Yes, delete it!'
            // }).then((result) => {
            //     if (result.isConfirmed) {
            //         // window.location.href=link,
            //         // Swal.fire(
            //         //   'Deleted!',
            //         //   'Your file has been deleted.',
            //         //   'success'

            //         // )
            //         // window.location.href = link
            //         // location.href=self.attr('link')


            //     }


            // })

        });
    });
</script>