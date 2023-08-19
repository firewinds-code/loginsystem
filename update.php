<?php include("connection.php");
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
                    <?php ini_set('display_errors', 0);
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM `ekta`.`user` WHERE id ='$id'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        if (isset($_POST['update'])) 
                        { 
                                $email = $_POST['editEmail']; //form se aane vali value
                                $name = $_POST['editName'];
                                $pass = $_POST['editpassword'];
                                $pwd = md5($pass);
                                $type = $_POST['usertype'];
                                $gender = $_POST['editgender'];
                                $languages = $_POST['editlanguages'];
                                $lang = "";
                                foreach ($languages as $row)
                                {
                                    $lang .= $row . " ";
                                
                                }

                            //update query
                            $sql = "UPDATE `ekta`.`user`
                                    SET
                                    `id` = '$id',
                                    `email` = '$email',
                                    `name` = '$name',
                                    `password` = '$pwd',
                                    `gender` = '$gender',
                                    `languages` = '$lang',
                                    `type` = '$type'
                                    WHERE `id` = '$id'";

                            $result = mysqli_query($conn, $sql);
                            if ($result) 
                            { 
                                echo "<div class='alert alert-success' role='alert'>
                                <h4 class='alert-heading'>Well done!</h4>
                                <hr>
                                <p> User successfully updated. </p>
                                </div>";
                                die;
                            }
                            else
                            {
                            die("Connection Failed : " . mysqli_connect_error());
                            }
                        }

                    ?>
                    <!-- form start -->
                    <div class="card card-primary" style="margin:30px ; ">
                        <div class="card-header">
                            <h3 class="card-title">Update Form</h3>
                        </div>
                        <form method="post" id="update" autocomplete="off">
                            <input type="hidden" name="snoEdit" id="snoEdit">
                            <div class=" card-body">
                                <div class="row">
                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address<span style="color:#FF0000">*</span></label>
                                            <input type="email" class="form-control" id="editEmail"
                                                value="<?php echo $row['email']; ?>" name="editEmail">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName">Name<span style="color:#FF0000">*</span></label>
                                            <input type="text" class="form-control" id="editName"
                                                placeholder="Enter name" value="<?php echo $row['name']; ?>"
                                                name="editName">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" id="editPassword"
                                                placeholder="password" name="editpassword">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>User Type<span style="color:#FF0000">*</span></label>

                                            <select class="form-control select2" style="width: 100%;" id="usertype"
                                                name="usertype">
                                                <option value="">
                                                    Select
                                                </option>
                                                <option value="admin"
                                                    <?php if ($row['type'] == "admin") echo 'selected="selected"'; ?>>
                                                    Admin
                                                </option>
                                                <option value="agent"
                                                    <?php if ($row['type'] == "agent") echo 'selected="selected"'; ?>>
                                                    Agent
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- radio -->
                                            <div class="form-group clearfix">
                                                <label for="exampleInputGender">Gender<span style="color:#FF0000">*</span></label><br>
                                                <div class="icheck-primary d-inline">
                                                    <label for="editgender1">Female
                                                    </label>

                                                    <input type="radio" name="editgender" <?php if ($row['gender'] == "female") {
                                                                                echo "checked";
                                                                            } ?> value="female">

                                                </div>
                                                <div class="icheck-primary d-inline">
                                                    <label for="editgender2">Male
                                                    </label>
                                                    <input type="radio" id="editgender2" value="male" name="editgender" <?php if ($row['gender'] == "male") {
                                                                                                            echo "checked";
                                                                                                        } ?>
                                                        value="male">

                                                </div>
                                                <div class="icheck-primary d-inline">
                                                    <label for="editgender3">Others
                                                    </label>
                                                    <input type="radio" id="editgender3" value="other" name="editgender" <?php if ($row['gender'] == "others") {
                                                                                                                echo "checked";
                                                                                                            } ?>
                                                        value="others">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!-- checkbox -->
                                        <div class="form-group clearfix">
                                            <?php $lang = explode(" ", $row['languages']); ?>
                                            <label for="exampleInputLanguage">Languages<span style="color:#FF0000">*</span></label><br>
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="editcheckboxprimary1" value="hindi"
                                                    <?php if (in_array("hindi", $lang)) echo 'checked="checked"'; ?>
                                                    name="editlanguages[]">
                                                <label for="editcheckboxprimary1">Hindi
                                                </label>
                                            </div><br>
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="editcheckboxprimary2" value="english"
                                                    <?php if (in_array("english", $lang)) echo 'checked="checked"'; ?>
                                                    name="editlanguages[]">
                                                <label for="editcheckboxprimary2">English
                                                </label>
                                            </div><br>
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" name="editlanguages[]" id="editcheckboxprimary3"
                                                    value="other"
                                                    <?php if (in_array("other", $lang)) echo 'checked="checked"'; ?>>
                                                <label for="editcheckboxprimary3">Other
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="update" id="update">Update</button>
                                <button type="submit" class="btn btn-primary" name="back" id="back"><a
                                        href='usermanagement.php' class='text-light'>Back</a>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- /.card-footer-->
                </div>
            </section>
            <!-- /.content -->
        </div>

        <!-- ./wrapper -->

        <?php include("footer.php");?>
        <!-- Page specific script -->
        <script>
        $('#update').validate({
            rules: {
                editEmail: {
                    required: true,
                    email: true,
                },
                editName: {
                    required: true,
                },
                usertype: {
                    required: true
                },
                editgender: {
                    required: true
                },
                "editlanguages[]": {
                    required: true
                },
            },
            messages: {
                editEmail: {
                    required: "Please enter a email address",
                    email: "Please enter a valid email address"
                },
                editName: {
                    required: "Please provide a name"
                },
                editgender: {
                    required: "Please select your Gender"
                },
                usertype: {
                    required: "Please select your User Type"
                },
                "editlanguages[]": "Please select your Language"
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