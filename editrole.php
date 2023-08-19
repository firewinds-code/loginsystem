<?php   
include("connection.php");
include("session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update</title>
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

                    <!-- form start -->
                    <div class="card card-primary" style="margin:30px ; ">
                        <div class="card-header">
                            <h3 class="card-title">Update Role</h3>
                        </div>
                        <form method="post" id="editrole1" autocomplete="off">
                            <div class=" card-body">
                                <div class="row">
                                    <div class=" col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputRole">Role<span
                                                    style="color:#FF0000">*</span></label>
                                            <input type="text" class="form-control" id="editrole"
                                                value="<?php echo $_REQUEST['role']; ?>" name="editrole">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="update" id="update">Update
                                    Role</button>
                                <button type="submit" class="btn btn-primary" name="back" id="back"><a href='role.php'
                                        class='text-light'>Back</a>
                                </button>
                            </div>
                        </form>
                    </div>
                    <?php 
                        $id = $_GET['id'];             
                        if (isset($_POST['update'])) 
                        {
                            
                            $role = $_POST['editrole']; //form se aane vali value     
                        
                            //update query
                            $sql = "UPDATE `ekta`.`role`
                                    SET
                                    `role` = '$role'
                                    WHERE `id` = '$id'";
        
                            $result = mysqli_query($conn, $sql);
                            if ($result) 
                            {
                                echo "<div class='alert alert-success' role='alert'>
                                    <h4 class='alert-heading'>Well done!</h4>
                                    <hr>
                                    <p> Role successfully updated. </p>
                                    </div>";    
                                    die;
                            } 
                            else 
                            {
                                die("Connection Failed : " . mysqli_connect_error());
                            }
                        }

                    ?>
                    <!-- /.card-footer-->
                </div>
            </section>
            <!-- /.content -->
        </div>

        <!-- ./wrapper -->

        <?php include("footer.php");?>
        <!-- Page specific script -->
        <script>
        $('#editrole1').validate({
            rules: {
                editrole: {
                    required: true,
                },
            },
            messages: {
                editrole: "Please enter your Role"
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