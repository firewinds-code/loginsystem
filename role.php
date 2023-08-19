<?php
include("session.php");
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Role Master</title>
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
                    <button class="btn btn-sm btn-primary"><a href="addrole.php" class="text-light"><i
                                class="nav-icon fas fa-plus" aria-hidden="true"> Add Role
                            </i>
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
                                                            <th>Role</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql = "SELECT * FROM `ekta`.`role`";
                                                        $result = mysqli_query($conn, $sql);
                                                        while ($row = mysqli_fetch_assoc($result)) //fetch data from database
                                                        {
                                                            echo "<tr>
                                                                    <td>" . $row['id'] . "</td>  
                                                                    <td>" . $row['role'] . "</td>
                                                            <td><button class='btn btn-sm btn-primary'><a href='editrole.php?id=" . $row['id'] . "&role=" .$row['role']."' class='text-light' id=" . $row['id'] . ">Edit</a></button>&nbsp<button class='btn btn-sm btn-danger'><a href='deleterole.php?id=" . $row['id'] . "' onclick='return checkDelete()' class='text-light' id=" . $row['id'] . ">Delete</a></button></td> 
                                                            </tr>"; // .$row['column name']. links the columns
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
                    </div>
                </div>
            </section>

        </div>
        <?php include("footer.php");?>
        <script language="JavaScript" type="text/javascript">
            function checkDelete(){
                return confirm('Are you sure?');
            }
</script>
</body>

</html>