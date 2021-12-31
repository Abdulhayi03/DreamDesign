<?php

    require('connection.php');
    require('functions.php');

    if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){
         
            
         }else{
            header('location:login.php');
            die();         
        }

    $msg='';
    
    if(isset($_POST['submit'])){
        $category_id = get_safe_value($con, $_POST['category_id']);
        $pro_title = get_safe_value($con, $_POST['pro_title']);
        $pro_desc = get_safe_value($con, $_POST['pro_desc']);
        $pro_image = get_safe_value($con, $_POST['pro_image']);
        $pro_thumb = get_safe_value($con, $_POST['pro_thumb']);
        $pro_type = get_safe_value($con, $_POST['pro_type']);

        $res=mysqli_query($con, "select * from projects where pro_id='$id'");
            $check=mysqli_num_rows($res); 
            if($check>0){
                $msg="Project already exists";
            }else{
                    if(isset($_GET['pro_id']) && $_GET['pro_id']!=''){
                    mysqli_query($con, "update projects set category_id='$category_id',pro_title='$pro_title',pro_desc='$pro_desc',pro_image='$pro_image',pro_thumb='$pro_thumb',pro_type='$pro_type' where pro_id='$id'");
                }else{
                    $pro_image=rand(111111111,999999999).'_'.$_FILES['pro_image']['pro_title'];
                    move_uploaded_file($_FILES['pro_image']['tmp_name'],'./media/projects/'.$pro_image);
                    mysqli_query($con, "insert into projects(category_id, pro_title, pro_desc, pro_image, pro_thumb, pro_type) values('$category_id','$pro_title','$pro_desc','$pro_image','$pro_thumb','$pro_type')");
                }
                header('location:projects.php');
                die();
            }
           
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DreamDesign</title>

    <!-- Custom fonts for this template -->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('includes/sidebar.php') ?>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    
                    <!-- Topbar Navbar -->
                    <?php include('includes/topbar.php') ?>


                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Projects / <span style="color:royalblue;">add</span></h1>
                    <div class="row">
                        <div class="col-lg-12">
                            <center>
                        <form method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="pro_title" placeholder="Enter project title" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6">
                                <textarea type="text" class="form-control" name="pro_desc" placeholder="Enter project description" required></textarea>
                            </div> 
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="file" class="form-control" name="pro_image" required>
                            </div>
                        </div>

                        <div class="form-group">
                                <div class="col-sm-6">
                                    <select name="pro_type" class="form-control">
                                        <option value="">Select Type</option>
                                        <?php
                                            $res=mysqli_query($con, "select id, type_name from types");
                                            while($row=mysqli_fetch_assoc($res)){
                                                echo "<option value=".$row['id'].">".$row['type_name']."</option>";
                                                
                                            }
                                        ?>
                                    </select>
                                </div>
                        </div> 

                        <div class="form-group">
                                <div class="col-sm-6">
                                    <select name="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        <?php
                                            $res=mysqli_query($con, "select id, category from categories");
                                            while($row=mysqli_fetch_assoc($res)){
                                                echo "<option value=".$row['id'].">".$row['category']."</option>";
                                                
                                            }
                                        ?>
                                    </select>
                                </div>
                        </div>
                        
                                <button type="submit" name="submit" class="btn btn-primary">Save</button>

                             
                        </center>
                        </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                    <span>Copyright &copy; DreamDesign <?php echo date('Y') ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="admin/js/demo/datatables-demo.js"></script>

</body>

</html>