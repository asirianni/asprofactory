<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>JuanCa Mantenimiento</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Photographer Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="<?php echo base_url(); ?>/recursos/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url(); ?>/recursos/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="<?php echo base_url(); ?>/recursos/js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Syncopate:400,700' rel='stylesheet' type='text/css'>

<style>
    <?php
        $imagenes_slider = $template->getImagenesSlider();
        
        for($i=0;$i < count($imagenes_slider);$i++)
        {
            echo ".banner".($i+1)."{
                            background:url(".  base_url()."recursos/images/".$imagenes_slider[$i]["imagen"].") no-repeat 0px 0px;
                            background-size:cover;
                            -webkit-background-size:cover;
                            -moz-background-size:cover;
                            -o-background-size:cover;
                            -ms-background-size:cover;
                    }";
        }
    ?>
</style>
</head>
	
<body>
<!-- banner-body -->
	<div class="banner-body">
		<div class="container">
			<div class="banner-body-content">
				<?php
                                 echo $template->getMenu();
                                ?>
                                <!-- BANNER -->
				<?php
                                 echo $template->getBanner();
                                ?>
                                <!-- FIN BANNER -->
                                
				<div class="banner-bottom">
					<div class="col-md-7 banner-bottom-left">
						<div class="banner-bottom-left1">
							<h2>Welcome to our Photography</h2>
							<div class="col-md-4 banner-bottom-left1-gridl">
								<img src="<?php echo base_url(); ?>/recursos/images/4.jpg" alt=" " class="img-responsive" />
							</div>
							<div class="col-md-8 banner-bottom-left1-gridr">
								<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
								<ul>
									<li><a href="single.html">Sed ut perspiciatis unde omnis</a></li>
									<li><a href="single.html">But I must explain to you</a></li>
									<li><a href="single.html">Neque porro quisquam est, qui</a></li>
								</ul>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="banner-bottom-left2">
							<h3>Offered Services</h3>
							<div class="col-md-4 banner-bottom-left2l">
								<img src="<?php echo base_url(); ?>/recursos/images/5.jpg" alt=" " class="img-responsive" />
							</div>
							<div class="col-md-8 banner-bottom-left2r">
								<ul>
									<li><a href="single.html">Sed ut perspiciatis unde omnis</a></li>
									<li><a href="single.html">But I must explain to you</a></li>
									<li><a href="single.html">Neque porro quisquam est, qui</a></li>
									<li><a href="single.html">Quis autem vel eum iure reprehend</a></li>
								</ul>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="col-md-5 banner-bottom-right">
						<div class="newsletter">
							<h1>Newsletter</h1>
							<form>
								<input type="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
								<input type="submit" value="Subscribe" >
							</form>
						</div>
						<div class="news">
							<h3>Our News</h3>
							<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
							<ul>
								<li><a href="single.html">Sed ut perspiciatis unde omnis</a></li>
								<li><a href="single.html">But I must explain to you</a></li>
								<li><a href="single.html">Neque porro quisquam est, qui</a></li>
								<li><a href="single.html">Quis autem vel eum iure reprehend</a></li>
								<li><a href="single.html">Temporibus autem quibusdam et aut</a></li>
								<li><a href="single.html">Lorem Ipsum is not simply random</a></li>
							</ul>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
<!-- //banner-body -->
<!-- footer-top -->
	<div class="footer-top">
		<div class="container">
			<div class="col-md-3 footer-top-grid">
				<h3>About <span>Us</span></h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque 
					id arcu neque, at convallis est felis.</p>
			</div>
			<div class="col-md-3 footer-top-grid">
				<h3>The <span>Tags</span></h3>
				<div class="unorder">
					<ul class="tag2">
						<li><a href="single.html">Photos</a></li>
						<li><a href="single.html">Camera</a></li>
						<li><a href="single.html">Development</a></li>
					</ul>
					<ul class="tag2">
						<li><a href="single.html">Albums</a></li>
						<li><a href="single.html">photoshop</a></li>
						<li><a href="single.html">photography</a></li>
					</ul>
					<ul class="tag2">
						<li><a href="single.html">Photos</a></li>
						<li><a href="single.html">Camera</a></li>
						<li><a href="single.html">development</a></li>
					</ul>
					<ul class="tag2">
						<li><a href="single.html">Albums</a></li>
						<li><a href="single.html">photoshop</a></li>
						<li><a href="single.html">photography</a></li>
					</ul>
					<ul class="tag2">
						<li><a href="single.html">Photos</a></li>
						<li><a href="single.html">Camera</a></li>
						<li><a href="single.html">development</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-3 footer-top-grid">
				<h3>Latest <span>Tweets</span></h3>
				<ul class="twi">
					<li>I like this awesome freebie. Check it out <a href="mailto:info@example.com" class="mail">
					@http://t.co/9vslJFpW</a> <span>ABOUT 15 MINS</span></li>
					<li>I like this awesome freebie. You can view it online here<a href="mailto:info@example.com" class="mail">
					@http://t.co/9vslJFpW</a> <span>ABOUT 2 HOURS AGO</span></li>
				</ul>
			</div>
			<div class="col-md-3 footer-top-grid">
				<h3>Flickr <span>Feed</span></h3>
				<div class="flickr-grids">
					<div class="flickr-grid">
						<a href="single.html"><img src="<?php echo base_url(); ?>/recursos/images/4.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="flickr-grid">
						<a href="single.html"><img src="<?php echo base_url(); ?>/recursos/images/6.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="flickr-grid">
						<a href="single.html"><img src="<?php echo base_url(); ?>/recursos/images/11.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="clearfix"> </div>
					
					<div class="flickr-grid">
						<a href="single.html"><img src="<?php echo base_url(); ?>/recursos/images/12.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="flickr-grid">
						<a href="single.html"><img src="<?php echo base_url(); ?>/recursos/images/11.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="flickr-grid">
						<a href="single.html"><img src="<?php echo base_url(); ?>/recursos/images/6.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //footer-top -->
<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="footer-left">
				<ul>
					<li><a href="index.html"><i>Photo</i>grapher</a><span> |</span></li>
					<li><p>The awesome agency. <span>0800 (123) 4567 // Australia 746 PO</span></p></li>
				</ul>
			</div>
			<div class="footer-right">
				<p>© 2016 Photographer. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //footer -->
<!-- scroll_top_btn -->
		<script type="text/javascript" src="<?php echo base_url(); ?>/recursos/js/move-top.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/recursos/js/easing.js"></script>
	    <script type="text/javascript">
			$(document).ready(function() {
			
				var defaults = {
		  			containerID: 'toTop', // fading element id
					containerHoverID: 'toTopHover', // fading element hover id
					scrollSpeed: 1200,
					easingType: 'linear' 
		 		};
				
				
				$().UItoTop({ easingType: 'easeOutQuart' });
				
			});
		</script>
		 <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
<!--end scroll_top_btn -->
<!-- for bootstrap working -->
	<script src="<?php echo base_url(); ?>/recursos/js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>