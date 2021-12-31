
<?php

require('connection.php');
require('functions.php');



$pro_id = mysqli_real_escape_string($con,$_GET['id']);

$sql = "select * from projects where pro_id=$pro_id";
    $res = mysqli_query($con, $sql);
    $data = array();
    while($row=mysqli_fetch_assoc($res)){
      $data[]=$row;
    };


?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>DreamDesign</title>

    <?php include('includes/links.php') ?>

</head>

<body style="background-image: url('background.jpg');background-position: center;background-repeat: no-repeat; background-size: cover;">

    <!-- Preloader -->
    		<?php include('includes/preloader.php') ?>

    <!-- end Preloader -->

    <div class="container-fluid">
       <!-- box-header -->
       <?php include('includes/header.php') ?>

        <!-- end nav -->
    </div>
    
    
    <!-- main-container -->
    <div class="container">
        <div class="col-md-12" style="position:relative;">
            <div class="banner-four">
            <?php if($data['0']['pro_type']==1) {?>
        <div class="col-md-8" style="position:relative;">
            <img src="./media/projects/<?php echo $data['0']['pro_image']; ?>" alt="" class="img-responsive" />
            <div class="h-30"></div>
        </div>
        <div class="col-md-12">
            <h3 class="text-uppercase"><?php echo $data['0']['pro_title']?></h3>
            <div class="h-30"></div>
        </div>

        <div class="col-md-9">
            <p><?php echo $data['0']['pro_desc']?> Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum autem voluptates molestias, harum expedita necessitatibus consequuntur enim ipsum a at vitae accusantium, beatae, facilis numquam deleniti soluta ipsam omnis nobis.</p>
        </div>

        
        <?php }else{ ?>
            <div style="position:relative;">
                
                    <div class="col-md-5">
                        <img src="./media/projects/<?php echo $data['0']['pro_image']; ?>" alt="image" class="img-responsive" />
                    </div>
                    <div class="col-md-7"> 
                        <div class="h-30"></div>
                        <div class="h-30"></div>

                        <h3 class="text-uppercase" style="color:white;"><?php echo $data['0']['pro_title']?></h3>
                        <div class="h-30"></div>
                        <p style="color:white;"><?php echo $data['0']['pro_desc']?> Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum autem voluptates molestias, harum expedita necessitatibus consequuntur enim ipsum a at vitae accusantium, beatae, facilis numquam deleniti soluta ipsam omnis nobis.</p>

                    </div>
                    <div class="col-md-3">
            <ul class="cat-ul">
                <li><i class="ion-ios-circle-filled"></i> Design</li>
                <li><i class="ion-ios-circle-filled"></i> consectetur adipiscing</li>
                <li><i class="ion-ios-circle-filled"></i> et gubernationis</li>
                <li><i class="ion-ios-circle-filled"></i> Aliter enim nosmet</li>
            </ul>
            <div class="h-10"></div>
            <h4>Share</h4>
            <ul class="social-ul">
                <li class="box-social"><a href="#0"><i class="ion-social-facebook"></i></a></li>
                <li class="box-social"><a href="#0"><i class="ion-social-instagram-outline"></i></a></li>
                <li class="box-social"><a href="#0"><i class="ion-social-twitter"></i></a></li>
                <li class="box-social"><a href="#0"><i class="ion-social-dribbble"></i></a></li>
            </ul>
        </div>
                
             </div>
            <div class="h-30"></div>
        </div>
            <?php } ?>
            </div>
        </div>

        

        
    </div>
    <!-- end main-container -->


    <!-- footer -->
    <footer>
        <div class="container-fluid">
            <p class="copyright">© DreamDesign 2021</p>
        </div>
    </footer>
    <!-- end footer -->
    
    <!-- back to top -->
    <a href="#0" class="cd-top"><i class="ion-android-arrow-up"></i></a>
    <!-- end back to top -->
    
</body>

</html>