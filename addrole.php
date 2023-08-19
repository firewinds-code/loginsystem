<?php
include("connection.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Role</title>
    <?php include("header.php");?>
</head>

<body class="hold-transition sidebar-mini">

    <!-- Site wrapper -->
    <div class="wrapper">
        <?php  include('sidebar.php');?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="card card-primary" style="margin:30px ; ">
                    <div class="card-header">
                        <h3 class="card-title">Add Role Form</h3>
                    </div>

                    <!-- form start -->
                    <form method="post" id="addrole" autocomplete="off">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Role Name</label>
                                <input type="text" class="form-control" id="role" placeholder="Enter Role" name="role">
                            </div>
                        </div>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="rolesubmit">Submit</button>
                        </div>
                    </form>
                    <?php
                        if (isset($_POST['rolesubmit'])) //button name
                        {
                            $role = $_POST['role'];
                            $exist = "SELECT * FROM `ekta`.`role` WHERE role = '$role'";
                    $res = mysqli_query($conn, $exist);
                    $num = mysqli_num_rows($res);
                    if ($num > 0) //compare
                    {
                        echo "<div class='alert alert-warning' role='alert'>
                        <h4 class='alert-heading'>Role Already Registered..!</h4>
                        </div>";
                       die;
                    } 
                    else 
                    {
                        //sql query to be executed for inserting data
                        $sql = "INSERT INTO `ekta`.`role`
                        (`role`) VALUES('$role')";
                        $result = mysqli_query($conn, $sql);
                        
                        if ($result) {
                        //echo "Data inserted";
                        $insert = true;
                        echo "<br>";
                        echo "<br>";
                        } else {
                        echo "Error in insertion" . mysqli_error($conn);
                        }

                        if ($insert) {
                        echo "<div class='alert alert-success' role='alert'>
                            <h4 class='alert-heading'>Well done!</h4>
                            <hr>
                            <p> Role Added Successfully....! </p>
                        </div>";
                        }
                        } 
                    }
                    ?>
                </div>
            </section>
        </div>

        <!-- ./wrapper -->
        <?php include("footer.php");?>
        <script>
        $('#addrole').validate({
            rules: {
                role: {
                    required: true,
                },
            },
            messages: {
                role: "Please enter your Role"
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
        </script>
</body>

</html>