<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bienvenido</title>

        <!-- CSS -->
        <!--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>recursos/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>recursos/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>recursos/font-awesome/fonts/font-webfont.eot">
        <link rel="stylesheet" href="<?php echo base_url(); ?>recursos/css/form-elements.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>recursos/css/style_1.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>recursos/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>recursos/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>recursos/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>recursos/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>recursos/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>
        <!-- Top content -->
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Login</strong> acceso </h1>
                            <div class="description">
                            	
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <div class="form-box">
                                <div class="form-top">
                                    <div class="form-top-left">
                                        <h3>Acceso de usuario</h3>
                                        <label><?php echo $salida_error; ?></label>
                                    </div>
                                    <div class="form-top-right">
                                        <img src="<?php echo base_url(); ?>recursos/img/acceso.png" alt='' />
                                    </div>
                                </div>
                             <div class="form-bottom">
                                <?php $atributes="id='loguin'";
                                echo form_open('welcome/validar_usuario', $atributes);?>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username">Username</label>
                                        <input type="text" name="usuario" placeholder="usuario..." 
                                               class="form-username form-control" id="form-username" required='required'>
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Password</label>
                                        <input type="password" name="pass" placeholder="pass..." 
                                               class="form-password form-control" id="form-password" required='required'>
                                    </div>
                                    <div class="form-group">
                                        <!--<label class="sr-only" for="form-password">Local</label>-->
<!--                                        <select name='local' class='form-control' id='local_id' required='required'>
                                            <option value="">seleccione local</option>
                                             //<?php 
//                                                foreach ($locales as $l) {
//                                                    echo "<option value ='".$l["codigo"]."'>".$l["descripcion"]."</option>";
//                                                }
//                                             ?>
					</select>-->
                                    </div>
                                    <button type="submit" class="btn">Ingresar!</button>
                                <?php echo form_close();?>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- Footer 
        <footer>
        	<div class="container">
        		<div class="row">
        			
        			<div class="col-sm-8 col-sm-offset-2">
        				<div class="footer-border"></div>
        				<p>Made by Anli Zaimi at <a href="http://azmind.com" target="_blank"><strong>AZMIND</strong></a> 
        					having a lot of fun. <i class="fa fa-smile-o"></i></p>
        			</div>
        			
        		</div>
        	</div>
        </footer>
		-->
        <!-- Javascript -->
        <script src="<?php echo base_url(); ?>recursos/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url(); ?>recursos/js/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>recursos/js/jquery.backstretch.min.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
        <script>
        
            jQuery(document).ready(function() {

                /*
                    Fullscreen background
                */
                $.backstretch("<?php echo base_url(); ?>recursos/img/backgrounds/1.jpg");

                /*
                    Login form validation
                */
                $('.login-form input[type="text"], .login-form input[type="password"], .login-form textarea').on('focus', function() {
                    $(this).removeClass('input-error');
                });

                $('.login-form').on('submit', function(e) {

                    $(this).find('input[type="text"], input[type="password"], textarea').each(function(){
                            if( $(this).val() == "" ) {
                                    e.preventDefault();
                                    $(this).addClass('input-error');
                            }
                            else {
                                    $(this).removeClass('input-error');
                            }
                    });

                });

                /*
                    Registration form validation
                */
                $('.registration-form input[type="text"], .registration-form textarea').on('focus', function() {
                    $(this).removeClass('input-error');
                });

                $('.registration-form').on('submit', function(e) {

                    $(this).find('input[type="text"], textarea').each(function(){
                            if( $(this).val() == "" ) {
                                    e.preventDefault();
                                    $(this).addClass('input-error');
                            }
                            else {
                                    $(this).removeClass('input-error');
                            }
                    });

                });


            });
        </script>
    </body>

</html>