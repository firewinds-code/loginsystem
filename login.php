<?php 
include("connection.php");


if (isset($_POST['submit']))//button name
{
 
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    $sql = "SELECT * FROM `ekta`.`users` WHERE email = '$email' and password =  '$pwd'";//assigning value
    $result = mysqli_query($conn , $sql);
    //  print_r($result);
    $data1 = mysqli_fetch_array($result);
//      print_r($data1);
//  die;
    session_start();

    if($data1['type'] == 1)
    {
        
        $_SESSION['type'] = $data1['type'];
        // echo $_SESSION['type'];
        //  die;
    }


    $num = mysqli_num_rows($result);
    if($num == 1)//compare
    {
      $_SESSION['loggedin'] = true;
      $_SESSION['email'] = $email;
      header("location:dashboard.php");
    }
    else
    {
      echo "<div class='alert alert-danger role='alert'>
   <h3 class='alert-heading'>Login Failed...!</h3><hr>
    <p>Invalid email or password</p>
    </div>";
 }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login System</title>
    <?php include("header.php");?>
</head>

<body class="hold-transition login-page">



    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>COGENT</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="#" method="post" autocomplete="off">
                    <div class=" input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <!-- forget pasword
          <div class="forgetpass"><a href="#" class="link" onclick="message()"> Forget Password ?</a></div>
            -->
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4">
                            <input type="submit" name="submit" value="submit" id="submit"
                                class="btn btn-primary btn-block">
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- sign up page
          <div class="signup">New Member ?<a href="#" class="link"> Sign Up Here</a></div>
            -->
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

</body>

</html>