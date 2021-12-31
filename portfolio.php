<?php

    require('connection.php');
    require('functions.php');

    

    $cat_id = mysqli_real_escape_string($con,$_GET['id']);
    

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>DreamDesign</title>

		<?php include('includes/links.php') ?>

  </head>

  <body>
    <!-- Preloader -->
		<?php include('includes/preloader.php') ?>

    <!-- end Preloader -->

    <div class="container-fluid">
      <!-- box-header -->
      <?php include('includes/header.php') ?>

      <!-- end nav -->
    </div>

    <!-- top bar -->
    
    <!-- end top bar -->

    <!-- main container -->
    <div class="main-container portfolio-inner clearfix">
    <div class="container">

<div class="section-title" data-aos="zoom-out">
  <h2>All Projects</h2>
  <p>Our Best Work</p>
</div> 
</div>
      <!-- portfolio div -->
      <div class="portfolio-div">
        <div class="portfolio">
          <!-- portfolio_filter -->
          <?php include('includes/nav.php') ?>

          <!-- portfolio_filter -->

          <!-- portfolio_container -->
          <div class="no-padding portfolio_container clearfix">
         
          <?php
            $get_project=get_project($con, $cat_id);
            foreach($get_project as $list){
          ?>
            <div class="col-md-4 col-sm-6 mypad">
            <a href="single-project.php?id=<?php echo $list['pro_id']; ?>" class="portfolio_item">

                <img
                data-src="./media/projects/<?php echo $list['pro_image']; ?>"
                  alt="image"
                  class="img-responsive my-Img lazy"
                />
                <div class="portfolio_item_hover">
                  <div class="portfolio-border clearfix">
                    <div class="item_info">
                      <em><?php echo $list['pro_title'];?></em>
                    </div>
                  </div>
                </div>
              </a>
            </div>
              <?php  } ?>
          

            <!-- <div class="col-md-4 col-sm-6 mypad Exteriors">
              <a href="./projects/exterior/1.html" class="portfolio_item">
                <img
                  src="thumbs/exterior/1-min.jpg"
                  alt="image"
                  class="img-responsive lazy"
                />
                <div class="portfolio_item_hover">
                  <div class="portfolio-border clearfix">
                    <div class="item_info">
                      <em>Exteriors</em>
                    </div>
                  </div>
                </div>
              </a>
            </div> -->

            

            <!-- end single work -->

            <!-- end single work -->
          </div>
          <!-- end portfolio_container -->
        </div>
        <!-- portfolio -->
      </div>
      <!-- end portfolio div -->
    </div>
    <!-- end main container -->
              
    <!-- footer -->
    <footer style="margin-top: 385px;">
      <div class="container-fluid">
        <p class="copyright">© DreamDesign 2021</p>
      </div>
    </footer>
    <!-- end footer -->

    <!-- back to top -->
    <a href="#0" class="cd-top"><i class="ion-android-arrow-up"></i></a>
    <!-- end back to top -->

    <!-- google analytics  -->
  </body>
</html>
