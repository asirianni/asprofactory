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
                                
				<?php echo $contenido;?>
			</div>
		</div>
	</div>
<!-- //banner-body -->

<?php
    echo $template->getFooter();
?>
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