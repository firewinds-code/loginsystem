<?php
include("session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Role Deleted </title>
    <?php include("header.php");?>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <?php  include('sidebar.php');?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <?php include("connection.php");
                    $del = false;
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $sql = "DELETE FROM `ekta`.`role` WHERE id ='$id'";
                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            //echo "Deleted Successfully";
                            $del = true;
                        } else {
                            die("Connection Failed : " . mysqli_connect_error());
                        }
                    }
                    if ($del) {
                        echo "<div class='alert alert-danger' role='alert'>
                            <h4 class='alert-heading'>Role Deleted Successfully...!</h4>
                            </div>";
                    }
                    ?>
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- ./wrapper -->

    <?php include("footer.php");?>
</body>

</html>