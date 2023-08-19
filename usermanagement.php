<?php include("connection.php");
include("session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Database</title>
    <?php include("header.php");?>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php  include('sidebar.php');?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <button class="btn btn-sm btn-primary"><a href="form.php" class="text-light"><i
                                class="nav-icon fas fa-plus" aria-hidden="true"> Add
                                User</i>
                        </a></button>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class=" content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">




                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Email</th>
                                                            <th>Name</th>

                                                            <th>User Type</th>
                                                            <th>Gender</th>
                                                            <th>Languages</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php 
                  
                  $sql  = "SELECT user.id,user.email,user.name,user.gender,user.languages,role.role AS rolename,role.id AS roleid 
                  FROM user  
                  LEFT JOIN role 
                  ON user.type=role.id";
                    $result = mysqli_query($conn ,$sql );
                    while($row=mysqli_fetch_assoc($result)) //fetch data from database
                    {
                        echo "<tr>
                        <td>".$row['id']."</td>  
                        <td>".$row['email']."</td>
                        <td>".$row['name']."</td>
                        
                        <td>".$row['rolename']."</td>
                        <td>".$row['gender']."</td>
                        <td>".$row['languages']."</td> 
                        <td><button class='btn btn-sm btn-primary'><a href='update.php?id=".$row['id']."' class='text-light' id=".$row['id'].">Edit</a></button>&nbsp<button class='btn btn-sm btn-danger'><a href='delete.php?id=".$row['id']."' onclick='return checkDelete()' class='text-light' id=".$row['id'].">Delete</a></button></td> 
                      </tr>";// .$row['column name']. links the columns
                    }
                    ?>

                                                    </tbody>
                                                </table>
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
                </div>
        </div>
        <script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
</script>
        <?php include("footer.php");?>
</body>

</html>