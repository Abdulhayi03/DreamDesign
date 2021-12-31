
<?php

    require('connection.php');
    require('functions.php');
    $msg='';

    if(isset($_POST['submit'])){
         $username = get_safe_value($con, $_POST['username']);
         $password = get_safe_value($con, $_POST['password']);
         $sql = "select * from admin where username='$username' and password='$password'";
         $res = mysqli_query($con, $sql);
         $count = mysqli_num_rows($res);

         if($count>0){
            $_SESSION['ADMIN_LOGIN']='yes';
            $_SESSION['ADMIN_USERNAME']=$username;

            header('location:dashboard.php');
            die();
         }else{
            $msg = "Please enter correct login details";
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

    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container ">

        <!-- Outer Row -->
        <div class="row justify-content-center mt-5">

            <div class="col-lg-6 mt-5">
            <div class="p-5 mt-5">
                                    <div class="text-center">
                                        <h1 class="h4 mb-4" style="color:white; font-weight:900;">Welcome Ramish!</h1>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input 
                                                type="text" 
                                                class="form-control form-control-user"
                                                id="exampleInputEmail"
                                                name="username"
                                                placeholder="Enter Username..."
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <input 
                                                type="password" 
                                                class="form-control form-control-user"
                                                id="exampleInputPassword"
                                                name="password" 
                                                placeholder="Password"
                                                required>
                                        </div>
                                        
                                        <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        
                                        
                                    </form>
                                    <div class="mt-3 text-center" style="color:white;">
                                    <?php
                                        echo $msg;
                                    ?>
                                    </div>
                                    
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

</body>

</html>