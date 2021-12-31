<?php
    require('connection.php');
    
    unset($_SESSION['ADMIN_LOGIN']);
    unset($_SESSION['ADMIN_USERNAME']);
    die();
    header('location:login.php');
    
    
?> 