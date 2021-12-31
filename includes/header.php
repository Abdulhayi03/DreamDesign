<header class="box-header">
<div class="box-logo">
                <a href="index.html"><img src="logo.png" width="160" alt="Logo"></a>
            </div>
				<!-- box-nav -->
				<a class="box-primary-nav-trigger" >
					<span class="box-menu-text">Menu</span><span class="box-menu-icon"></span>
				</a>
				<!-- box-primary-nav-trigger -->
			</header>
			<nav>
            <ul class="box-primary-nav">

                <li><a href="#index">HOME</a></li>
                <li><a href="#about">ABOUT US</a></li>
                <li><a href="#services">SERVICES</a></li>
                <li><a href="#portfolio">PORTFOLIO</a></li>
                <li><a href="#reviews">REVIEWS</a></li>
                <li><a href="#contact">CONTACT</a></li>


            </ul>
        </nav>

        <script>
                $(function () {
                    $('nav li a').filter(function () {
                        return this.href === location.href;
                    }).addClass('active');
                });
         </script>