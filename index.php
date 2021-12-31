<?php

    require('connection.php');

	$sql = "select * from projects limit 6";
	$res = mysqli_query($con, $sql);
	$data = array();
	while($row=mysqli_fetch_assoc($res)){
		$data[] = $row;
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>DreamDesign</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


		<style>
			body {
				background-color: #000000;
				margin: 0px;
				overflow: hidden;
			}

			#container{
				 /* opacity: 85%;  */
			}

			#info {
				position: absolute;
				top: 0px; width: 100%;
				/* color: #ffffff; */
				padding: 5px;
				font-family:Monospace;
				font-size:33px;
				font-weight: bold;
				text-align:left;
			}

			a {
				color: #ffffff;
			}
		</style>

		 <?php include('includes/links.php') ?>
		

	</head>
	<body>
		
		<!-- Preloader -->
		<?php include('includes/preloader.php') ?>
		<!-- end Preloader -->
	
		<div class="container-fluid">
			<!-- box header -->
			<?php include('includes/header.php') ?>

			

		<div id="container" id="home"></div>
		<div id="info">

			<section class="box-intro">
				<div class="table-cell">
					<h1 class="new_heading">Dream Design
						
					</h1>
					<h5 style="color:white;">an interior design firm driven from highly imaginative design solutions</h5>
				</div>
	
				<div class="mouse">
					<div class="scroll"></div>
				</div>
			</section>

		</div>


		<script src="js/three.min.js"></script>

		<script>

			var camera, scene, renderer;

			var texture_placeholder,
			isUserInteracting = false,
			onMouseDownMouseX = 0, onMouseDownMouseY = 0,
			lon = 0, onMouseDownLon = 0,
			lat = 0, onMouseDownLat = 0,
			phi = 0, theta = 0;

			init();
			animate();
			function init() {

				var container, mesh;

				container = document.getElementById( 'container' );

				camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 1, 1100 );
				camera.target = new THREE.Vector3( 0, 0, 0 );

				scene = new THREE.Scene();

				var geometry = new THREE.SphereGeometry( 500, 60, 40 );
				geometry.applyMatrix( new THREE.Matrix4().makeScale( -1, 1, 1 ) );

				var material = new THREE.MeshBasicMaterial( {
					map: THREE.ImageUtils.loadTexture("images/Corona_Panorama.jpg" )
				} );

				mesh = new THREE.Mesh( geometry, material );
				
				scene.add( mesh );

				renderer = new THREE.WebGLRenderer();
				renderer.setSize( window.innerWidth, window.innerHeight );
				container.appendChild( renderer.domElement );

				document.addEventListener( 'mousedown', onDocumentMouseDown, false );
				document.addEventListener( 'mousemove', onDocumentMouseMove, false );
				document.addEventListener( 'mouseup', onDocumentMouseUp, false );
				document.addEventListener( 'mousewheel', onDocumentMouseWheel, false );
				document.addEventListener( 'DOMMouseScroll', onDocumentMouseWheel, false);

				//

				//

				window.addEventListener( 'resize', onWindowResize, false );

			}

			function onWindowResize() {

				camera.aspect = window.innerWidth / window.innerHeight;
				camera.updateProjectionMatrix();

				renderer.setSize( window.innerWidth, window.innerHeight );

			}

			function onDocumentMouseDown( event ) {

				// event.preventDefault();

				isUserInteracting = true;

				onPointerDownPointerX = event.clientX;
				onPointerDownPointerY = event.clientY;

				onPointerDownLon = lon;
				onPointerDownLat = lat;

			}

			function onDocumentMouseMove( event ) {

				if ( isUserInteracting === true ) {

					lon = ( onPointerDownPointerX - event.clientX ) * 0.1 + onPointerDownLon;
					lat = ( event.clientY - onPointerDownPointerY ) * 0.1 + onPointerDownLat;

				}

			}

			function onDocumentMouseUp( event ) {

				isUserInteracting = false;

			}

			function onDocumentMouseWheel( event ) {

				// WebKit

				if ( event.wheelDeltaY ) {

					camera.fov = Math.min(Math.max(15.0, (camera.fov - event.wheelDeltaY * 0.05)), 130.0);

				// Opera / Explorer 9

				} else if ( event.wheelDelta ) {

					camera.fov = Math.min(Math.max(15.0, (camera.fov - event.wheelDelta * 0.05)), 130.0);

				// Firefox

				} else if ( event.detail ) {

					camera.fov = Math.min(Math.max(15.0, (camera.fov + event.detail * 1.0)), 130.0);

				}

				camera.updateProjectionMatrix();

			}

			function animate() {

				requestAnimationFrame( animate );
				update();

			}

			function update() {

				if ( isUserInteracting === false ) {

					lon +=0.1;

				}

				lat = Math.max( - 85, Math.min( 85, lat ) );
				phi = THREE.Math.degToRad( 90 - lat );
				theta = THREE.Math.degToRad( lon + 180 );

				camera.target.x = 500 * Math.sin( phi ) * Math.cos( theta );
				camera.target.y = 500 * Math.cos( phi );
				camera.target.z = 500 * Math.sin( phi ) * Math.sin( theta );

				camera.lookAt( camera.target );

				renderer.render( scene, camera );

			}

		</script>

		<main id="main">
					<!-- About -->

	<section id="about" class="about">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>About</h2>
          <p>Who we are</p>
        </div>

        <div class="row content" data-aos="fade-up">
          <div class="col-lg-6">
            <p>
			Dream Design is an interior design studio that offers a luxury design experience to the clients. Our aim is to bring viewers visualize, create and make. We believe in the power of creativity and we want to inspire people by providing them with positive content that will make their minds wonder.
            </p>
            <ul>
              <li><i class="ion-checkmark"></i> We make products that are not only attractive and durable but also functional and practical</li>
              <li><i class="ion-checkmark"></i> We believe that the best quality products should be affordable to everyone.</li>
              <li><i class="ion-checkmark"></i> We offer a variety of services to fit every lifestyle and budget including custom home design, remodeling, renovations, interior design, and more.</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
			Dream Design is a group of skill sets that started to provide their share of services in the world of architecture in 1990. Our services include the creation of photo realistic high quality renders & 3D models of Interiors, Exteriors, and Products. To put it simply, it is to make a virtual 3D design of products or buildings before they are made in 4D. Our team is experienced and well versed in their respective areas with a strong regard for deadlines and quality.
            </p>
            <a href="#contact" class="myBtn">Get In Touch</a>
          </div>
        </div>

      </div>
	  <div class="mt-5"></div>
	  <div class="container-fluid mt-5">
		  <div class="row mt-5">
			  <div class="col-md-12" style="position:relative;">
				  <div class="banner">
					  <h1 class="text-center" style="padding-top:170px;">Giving your dreams a shape of reality</h1>
				  </div>
			  </div>
		  </div>
	  </div>
    </section><!-- End About Section -->
			<section id="services">
			  <div class="container">
				<div class="section-title" data-aos="zoom-out">
					<h2>Services</h2>
					<p>What We Do</p>
				</div>
				<div class="row">
					<div class="col-md-4">
					  <div class="service-item">
						<img class="img-responsive service-item-img" src="thumbs/interior/1-min.jpg" alt="">
						<div class="service-item-overlay text-center">
						
						<div class="service-text text-uppercase">
							<p>Interior Design</p>
						</div>
							<p>We produce & improve the interior of a construction. Our enhancements are 3D illustrations from stunning kitchens to offices.</p>						
</div>
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="service-item">
						<img class="img-responsive service-item-img" src="thumbs/exterior/Lawn-min.jpg" alt="">
						<div class="service-item-overlay text-center">
						
						<div class="service-text text-uppercase">
							<p>Exterior Design</p>
						</div>
						<p>We exercise the art of creation of outer spaces of not only residential but also commercial sites. This enables a faster approach to convert your idea into a project. 
</p>
					</div>
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="service-item">
						<img class="img-responsive service-item-img" src="thumbs/360/aprtmnt360-min.jpg" alt="">
						<div class="service-item-overlay text-center">
						
						<div class="service-text text-uppercase">
							<p>360° Rooms</p>
						</div>
						<p>We create a 360° view of a specific area as demanded. These are as good as blueprints and provide a next level experience for planning. 
</p>
					</div>
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="service-item">
						<img class="img-responsive service-item-img" src="thumbs/download.jpg" alt="">
						<div class="service-item-overlay text-center">
						
						<div class="service-text text-uppercase">
							<p>Floor Planning</p>
						</div>
						<p>We provide you with the finest floor plans for your architecture project that will help you understand the built-in features and how the spaces interact.
</p>
					</div>
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="service-item">
						<img class="img-responsive service-item-img" src="thumbs/products/Drum set-min.jpg" alt="">
						<div class="service-item-overlay text-center">
						
						<div class="service-text text-uppercase">
							<p>Product Modeling</p>
						</div>
						<p>We provide product models that help in visual communication and to solve design problems of our clients as our aim is to focus on their needs.
</p>
					</div>
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="service-item">
						<img class="img-responsive service-item-img" src="thumbs/product documentation/0001-min.jpg" alt="">
						<div class="service-item-overlay text-center">
						
						<div class="service-text text-uppercase">
							<p>Product Documentaion</p>
						</div>
						<p>We make sure that all the relevant information is communicated with the client and all of their queries are sorted by providing product documentation.
</p>
					</div>
					  </div>
					</div>
					
					
					
    	        </div>
			  </div>

			  <div class="mt-5"></div>
	  <div class="container-fluid mt-5">
		  <div class="row mt-5">
			  <div class="col-md-12" style="position:relative;">
				  <div class="banner-two">
					<div class="container">
						<div class="row">
							<div class="col-md-4 num-blocks" id="counter">

							<h1 class="text-center" style="padding-top:170px;">
							<span class="count" data-count="36">0</span>
							</h1>
							<p class="text-center">Professionals</p>
							</div>

							<div class="col-md-4 num-blocks">
							<h1 class="text-center" style="padding-top:170px;" >
							<span class="count" data-count="1180">0</span>

							</h1>
							<p class="text-center">Projects Delivered</p>

							</div>

							<div class="col-md-4 num-blocks">
							<h1 class="text-center" style="padding-top:170px;" >
							<span class="count" data-count="85">0</span>

							</h1>
							<p class="text-center">Consultation</p>

							</div>
						</div>
					</div>
				</div>
			  </div>
		  </div>
	  </div>


			</section>

			<section id="portfolio" class="about">
      			<div class="container">

					<div class="section-title" data-aos="zoom-out">
					<h2>Portfolio</h2>
					<p>What We've Done</p>
					</div>

					<div class="main-container portfolio-inner clearfix">
      <!-- portfolio div -->
      <div class="portfolio-div">
        <div class="portfolio">
          <!-- portfolio_filter -->

          <!-- portfolio_filter -->

          <!-- portfolio_container -->
          <div class="no-padding portfolio_container clearfix">
         
          <?php
			
            foreach($data as $list){
				
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
          
            

            <!-- end single work -->

            <!-- end single work -->
          </div>
          <!-- end portfolio_container -->
        </div>
        <!-- portfolio -->
      </div>
      <!-- end portfolio div -->
    </div>

				
				</div>
				<div class="text-center mt-5">
				<a href="allProjects.php" class="myBtn">Browse More</a>
				</div>

			</section>
			
			<section id="reviews" class="about">
      			<div class="container">

					<div class="section-title" data-aos="zoom-out">
					<h2>Reviews</h2>
					<p>What Our Clients Say</p>
					</div>
				</div>
				
				<div class="container-fluid">
		  			<div class="row">
			  			<div class="col-md-12" style="position:relative;">
				  			<div class="banner-three">
							  <div class="slideshow-container">

<!-- Full-width images with number and caption text -->
<div class="mySlides">
  <div class="numbertext">1 / 3</div>
	 <div class="review-box ">
		<div class="col-md-8 ">
			<h2>"The team provides quick responses and demonstrates knowledge of their field."</h2>
			<p>The team has delivered on all requirements so far. Professional and responsive, GenITeam Solutions produces quality work on time.


Technical expertise, single points of communication, and flexibility make for a smooth workflow</p>
		</div>
		<div class="col-md-3 ">
			<h2>Full Swing Simulators</h2>
			<p>GAME DEVELOPMENT JAN. 2019 - ONGOING</p>

			<i class="ion-android-star"></i>
			<i class="ion-android-star"></i>
			<i class="ion-android-star"></i>
			<i class="ion-android-star"></i>
			<i class="ion-android-star"></i>

		</div>
	 </div>

<div class="text">Rowan Atkinson.</div>
</div>

<div class="mySlides ">
  <div class="numbertext">2 / 3</div>
  <div class="review-box">
		<div class="col-md-8">
			<h2>"They were patient, flexible, and highly knowledgable."</h2>
			<p>The demo game was an integral part of soliciting funding from investors. DreamDesign effectively achieved a solution that exceeded stakeholders' expectations.</p>
		</div>
		<div class="col-md-3">
			<h2>Video Studio</h2>
			<p>GAME DEVELOPMENT AUG. 2018 - MAR. 2019</p>

			<i class="ion-android-star"></i>
			<i class="ion-android-star"></i>
			<i class="ion-android-star"></i>
			<i class="ion-android-star"></i>
			<i class="ion-android-star"></i>
		</div>
	 </div>
    <div class="text">Robert nova</div>
</div>

<div class="mySlides ">
  <div class="numbertext">3 / 3</div>
  <div class="review-box ">
		<div class="col-md-8 ">
			<h2>"The team provides quick responses and demonstrates knowledge of their field."</h2>
			<p>The team has delivered on all requirements so far. Professional and responsive, GenITeam Solutions produces quality work on time.


Technical expertise, single points of communication, and flexibility make for a smooth workflow</p>
		</div>
		<div class="col-md-3 ">
			<h2>Full Swing Simulators</h2>
			<p>GAME DEVELOPMENT JAN. 2019 - ONGOING</p>

			<i class="ion-android-star"></i>
			<i class="ion-android-star"></i>
			<i class="ion-android-star"></i>
			<i class="ion-android-star"></i>
			<i class="ion-android-star"></i>

		</div>
	 </div>
    <div class="text">Charles</div>
</div>

<!-- Next and previous buttons -->
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
<span class="dot" onclick="currentSlide(1)"></span>
<span class="dot" onclick="currentSlide(2)"></span>
<span class="dot" onclick="currentSlide(3)"></span>
</div>

<!-- silder end -->

							</div>
						</div>
					</div>
				</div>
				<!-- Slider start -->
			</section>

			<section id="contact" class="about">
      			<div class="container">

					<div class="section-title" data-aos="zoom-out">
					<h2>Contact</h2>
					<p>Get In Touch</p>
					</div>
				</div>
				<div class="contactform-con">
				<form action="https://formsubmit.co/info@dreamdesign.club" method="POST">
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-contact">
						<input type="text" name="name" required>
                            <span>your name</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-contact">
						<input type="email" name="email" required>
                            <span>your email</span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="input-contact">
						<input type="_subject" name="subject">                            
						<span>Subject</span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="textarea-contact">
                            <textarea name="message"></textarea>
                            <span>message</span>
							<input type="hidden" name="_captcha" value="false">

                        </div>
                    </div>
                    <div class="col-md-8 text-center pt-5">
					<button type="submit" class="myBtn">Send</button>
                    </div>
                </div>
            </form>
			</div>
			<p class="text-center mt-5">* Your contact Information is secure with us. We do not sell or share your Information with anyone else.</p>

			</section>

		</main>

		<!-- footer -->
		<footer>
        <div class="container-fluid">
            <p class="copyright">© Dream Design Club 2021</p>
        </div>
    	</footer>
    <!-- end footer -->
		
<script src="slider.js"></script>	
<script src="./js/counter.js"></script>


	</body>
</html>
