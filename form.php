<?php include("connection.php");
include("session.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FORM</title>
    <?php include("header.php"); ?>
</head>

<body class="hold-transition sidebar-mini">

    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php include('sidebar.php'); ?>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="card card-primary" style="margin:10px ; ">
                    <div class="card-header">
                        <h3 class="card-title">Form</h3>
                    </div>
                    <!-- form start -->
                    <form action="#" method="post" id="form" autocomplete="off">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address<span style="color:#FF0000">*</span></label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">Name<span style="color:#FF0000">*</span></label>
                                <input type="text" class="form-control" id="exampleInputName" placeholder="Enter name"
                                    name="name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password<span style="color:#FF0000">*</span></label>
                                <input type="password" class="form-control" id="exampleInputassword1"
                                    placeholder="password" name="password">
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>User Type<span style="color:#FF0000">*</span></label>

                                    <?php
                                    $sql = "SELECT * from `ekta`.`role`";
                                    $result = mysqli_query($conn, $sql);
                                    ?>
                                    <select class="form-control select2" style="width: 100%;" name="type">
                                        <option value="">Select</option>
                                        <?php while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['role']; ?>
                                        </option>
                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <!-- radio -->
                                    <div class="form-group clearfix">
                                        <label for="exampleInputGender">Gender<span style="color:#FF0000">*</span></label><br>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="gender1" value="female" name="gender">Female
                                            <label for="gender1">
                                            </label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="gender2" value="male" name="gender">Male
                                            <label for="gender2">
                                            </label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="gender3" value="other" name="gender">Others
                                            <label for="gender3">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <!-- checkbox -->
                                <div class="form-group clearfix">
                                    <label for="exampleInputLanguage">Languages<span style="color:#FF0000">*</span></label><br>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="checkboxPrimary1" value="hindi" name="languages[]">
                                        <label for="checkboxPrimary1">Hindi
                                        </label>
                                    </div><br>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="checkboxprimary2" value="english" name="languages[]">
                                        <label for="checkboxprimary2">English
                                        </label>
                                    </div><br>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="checkboxprimary3" value="other" name="languages[]">
                                        <label for="checkboxprimary3">Other
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-body -->

                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" name="submit" id="submit" value="submit">
                        </div>
                    </form>
                </div>
                <?php
                ini_set('display_errors', 0);
                $insert = false;
                if (isset($_POST['submit'])) {
                    $email = $_POST['email'];
                    $name = $_POST['name'];
                    $pwd = $_POST['password'];
                    $type = $_POST['type'];
                    $gender = $_POST['gender'];
                    $languages = $_POST["languages"];
                    $lang = "";
                    foreach ($languages as $row) {
                        $lang .= $row . " ";
                    }
                    $existsql = "SELECT * FROM `ekta`.`user` WHERE email = '$email'";
                    $res = mysqli_query($conn, $existsql);
                    $num1 = mysqli_num_rows($res);
                    if ($num1 > 0) //compare
                    {
                        echo "<div class='alert alert-warning' role='alert'>
                        <h4 class='alert-heading'>User Already Registered..!</h4>
                        </div>";
                        die;
                    } else {
                        //sql query to be executed for inserting data
                        $sql = "INSERT INTO `ekta`.`user`
                            (`email`,`name`,
                            `password`,
                            `type`,`gender`,
                            `languages`)
                            VALUES('$email','$name','$pwd','$type','$gender','$lang')";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            //echo "Data inserted";
                            $insert = true;
                            echo "<br>";
                            echo "<br>";
                        } else {
                            echo "Error in insertion" . mysqli_error($conn);
                        }
                    }
                    if ($insert) {
                        echo "<div class='alert alert-success' role='alert'>
                            <h4 class='alert-heading'>Well done!</h4><hr>
                            <p> User Added Successfully....! </p>
                            </div>";
                    }
                }
                ?>
            </section>
        </div>
        <br>
        <?php include("footer.php"); ?>
        <!-- Page specific script -->
        <script>
        $('#form').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                name: {
                    required: true,
                },
                password: {
                    required: true,
                    minlength: 5
                },
                type: {
                    required: true
                },
                gender: {
                    required: true
                },
                "languages[]": {
                    required: true
                },
            },
            messages: {
                email: {
                    required: "Please enter a email address",
                    email: "Please enter a valid email address"
                },
                name: {
                    required: "Please provide a name"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                gender: {
                    required: "Please select your Gender"
                },
                type: {
                    required: "Please select your User Type"
                },
                "languages[]": "Please select your Language"
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