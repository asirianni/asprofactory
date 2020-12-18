<!DOCTYPE html>

<html lang="en-US">
    <head>
        <META http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <META name="viewport" content="width=device-width, initial-scale=1">
        <META http-equiv="X-UA-Compatible" content="IE=edge">
        <META name="description" content="sistemas informaticos a medida en php, facturas electronicas, 
              distribuimos sistemas lomasoft, integraciones de sistemas vtex, mercadopago, tiendanube, mercadolibre, 
              desde cordoba para todo el pais">
        <!-- Title -->
        <title><?php echo $titulo["dato"];?></title>
        
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="<?php echo base_url()?>recursos/img/favico.ico">
              
        <!--Bootstrap css-->
        <link rel="stylesheet" href="<?php echo base_url()?>recursos/css/bootstrap.min.css">
        
        <!-- Magnific Popup Css -->
        <link rel="stylesheet" href="<?php echo base_url()?>recursos/css/magnific-popup.css">
        
        <!-- Owl Carousel -->
        <link rel="stylesheet" href="<?php echo base_url()?>recursos/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>recursos/css/owl.carousel.min.css">
        
        <!--Font Awesome css-->
        <link rel="stylesheet" href="<?php echo base_url()?>recursos/css/font-awesome.min.css">
        
        <!--Site Main Style css-->
        <link rel="stylesheet" href="<?php echo base_url()?>recursos/css/theme.css">
        
        <!--Site Main Responsive File -->
        <link rel="stylesheet" href="<?php echo base_url()?>recursos/css/responsive.css">
        
        <!--<script type="text/javascript" charset="UTF-8" src="<?php echo base_url()?>recursos/js/common.js"></script>-->
	<!--<script type="text/javascript" charset="UTF-8" src="<?php // echo base_url()?>recursos/js/util.js"></script>-->
	<!--<script type="text/javascript" charset="UTF-8" src="<?php echo base_url()?>recursos/js/map.js"></script>-->
	<!--<script type="text/javascript" charset="UTF-8" src="<?php echo base_url()?>recursos/js/marker.js"></script>-->
	<style type="text/css">
            .dismissButton{background-color:#fff;border:1px solid #dadce0;color:#1a73e8;border-radius:4px;font-family:Roboto,sans-serif;font-size:14px;height:36px;cursor:pointer;padding:0 24px}
            .dismissButton:hover{background-color:rgba(66,133,244,0.04);border:1px solid #d2e3fc}
            .dismissButton:focus{background-color:rgba(66,133,244,0.12);border:1px solid #d2e3fc;outline:0}
            .dismissButton:hover:focus{background-color:rgba(66,133,244,0.16);border:1px solid #d2e2fd}
            .dismissButton:active{background-color:rgba(66,133,244,0.16);border:1px solid #d2e2fd;box-shadow:0 1px 2px 0 rgba(60,64,67,0.3),0 1px 3px 1px rgba(60,64,67,0.15)}
            .dismissButton:disabled{background-color:#fff;border:1px solid #f1f3f4;color:#3c4043}

            .gm-style .gm-style-mtc label,.gm-style .gm-style-mtc div{font-weight:400}

            .gm-control-active img{box-sizing:content-box;pointer-events:none}
            .gm-control-active:hover img:nth-child(1),.gm-control-active:active img:nth-child(1),.gm-control-active:active img:nth-child(2){display:none}

            .gm-ui-hover-effect{opacity:.6}.gm-ui-hover-effect:hover{opacity:1}

            .gm-style .gm-style-cc span,
            .gm-style .gm-style-cc a,.gm-style 
            .gm-style-mtc div{font-size:10px;box-sizing:border-box}

	@media print {  
		.gm-style .gmnoprint, 
		.gmnoprint {    display:none  }}
	@media screen {  
		.gm-style .gmnoscreen, 
		.gmnoscreen {    display:none  }}
            .gm-style {
                font: 400 11px Roboto, Arial, sans-serif;
                text-decoration: none;
            }
            .gm-style img { max-width: none; }
        
            .gm-style-pbc{transition:opacity ease-in-out;background-color:rgba(0,0,0,0.45);text-align:center}
            .gm-style-pbt{font-size:22px;color:white;font-family:Roboto,Arial,sans-serif;position:relative;margin:0;top:50%;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%)}
            header {
                height: 100vh;
                background: url(<?php echo base_url()?>recursos/img/BS-21.jpg);
                background-size: cover;
                overflow: hidden;
                background-position: center 65%;
                background-attachment: fixed;
            }
            .flotante {
                display:scroll;
                position:fixed;
                bottom:50px;
                right:0px;
            }
        </style>
	<!--<script type="text/javascript" charset="UTF-8" src="<?php echo base_url()?>recursos/js/onion.js"></script>-->
	<!--<script type="text/javascript" charset="UTF-8" src="<?php echo base_url()?>recursos/js/stats.js"></script>-->
	<!--<script type="text/javascript" charset="UTF-8" src="<?php echo base_url()?>recursos/js/controls.js"></script>-->
    </head>
    <body>
        <!--<a class='flotante' href='https://api.whatsapp.com/send?phone=5491162979311&text=Hola!%20Quiero%20consultar!' ><img class="img-responsive" src='<?php echo base_url()?>recursos/img/boton-flotante.jpg' border="0"/></a>-->
        <div id="fb-root"></div>
        <script >(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.2&appId=726310897761570&autoLogAppEvents=1';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>
        
        <!-- 00 - Start Preloader -->
        <div class="preloader" style="display: none;">
            <div class="sk-folding-cube">
                <div class="sk-cube1 sk-cube"></div>
                <div class="sk-cube2 sk-cube"></div>
                <div class="sk-cube4 sk-cube"></div>
                <div class="sk-cube3 sk-cube"></div>
            </div>
        </div>
        <!-- End Preloader -->
        
        <!-- 01 - Start Header Section -->
        <header class="header">
            <!-- Start Navbar -->
                <nav class="navbar-tefa navbar-fixed-top navbar navbar-default">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-tefa-collapse" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <!-- Start Logo -->
                            <a class="navbar-brand" href="<?php echo base_url();?>"> <?php echo $titulo["dato"];?></a> 
                            <!-- End Logo -->
                        </div>
                        <div class="collapse navbar-collapse" id="navbar-tefa-collapse">
                            <!-- Start Menu -->
                            <ul class="nav navbar-nav navbar-right">
                                <li><a data-scroll="header" class="" href="https://tefa-v1.netlify.com/#">Inicio</a></li>
                                <li><a data-scroll="about" href="https://tefa-v1.netlify.com/#" class="active">Nosotros</a></li>
                                <li><a data-scroll="services" href="https://tefa-v1.netlify.com/#" class="">Servicios</a></li>
                                <li><a data-scroll="portfolio" href="https://tefa-v1.netlify.com/#" class="">Demos</a></li>
<!--                                <li><a data-scroll="team" href="https://tefa-v1.netlify.com/#" class="">Team</a></li>
                                <li><a data-scroll="blog" href="https://tefa-v1.netlify.com/#" class="">Blog</a></li>-->
                                <li><a data-scroll="contact" href="https://tefa-v1.netlify.com/#" class="">Contacto</a></li>
                            </ul>
                            <!-- End Menu -->
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            <div class="header-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="text-part">
                                <h1>Desarrollo de  <br>Sistemas</h1>
                                    <p>Aplicaciones web desde 0
                                    <br> Sistemas de Facturacion
                                    <br> Sistemas de catalogos on-line
                                    <br> Sistemas de cobros on-line
                                    <br> Sistemas de control de Stock
                                    <br> Servicio de mesa en restaurante
                                    <br> Tomas de turnos en centros medicos 
                                    
                                    <br>Trabajamos con <span class="typed-cursor">|</span></p>
                                <ul class="social-links">
                                    <li><a href="<?php echo $facebook["dato"];?>" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
                                    <li><a href="<?php echo $youtube["dato"];?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                    <li><a href="<?php echo $linkedin["dato"];?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- End Header Section -->
        
        <!-- 02 - Start About Section -->
        <section class="about">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section-title text-center">
                            <h2>Nosotros</h2>
                            
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="avatar-img">
                            <div class="social-media">
                                <ul class="social-links">
                                   
                                    <li><a href="<?php echo $facebook["dato"];?>" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
                                    <li><a href="<?php echo $youtube["dato"];?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                    <li><a href="<?php echo $linkedin["dato"];?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                    
                                    
                                </ul>
                            </div>
                            <!--<img src="<?php echo base_url()?>recursos/img/avatar-img.png" alt="avatar-img">-->
                            <div class="fb-page" data-href="https://web.facebook.com/Ordene-su-negocio-737763829635258/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://web.facebook.com/Ordene-su-negocio-737763829635258/" class="fb-xfbml-parse-ignore"><a href="https://web.facebook.com/Ordene-su-negocio-737763829635258/">Ordene su negocio</a></blockquote></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="text-part">
                            <h2 class="text-center">Lo ayudamos a ordenarse</h2>
                            <ul class="row text-center">
                                <li class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                                    <div class="about-box">
                                        <h3></h3>
                                        <h4></h4>
                                    </div>
                                </li>
                                <li class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                                    <div class="about-box">
                                        <h3>230+</h3>
                                        <h4>Clientes Felices</h4>
                                    </div>
                                </li>
                                <li class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                                    <div class="about-box bn">
                                        <h3></h3>
                                        <h4></h4>
                                    </div>
                                </li>
                            </ul>
                            <p>Desarrollamos sistemas informaticos a medida<br>
                                Somos distribuidores de Lomasoft inovaciones<br>
                                Realizamos trabajos para consultoras de sistemas,<br>
                                marketing y agencias de publicidad<br>
                                </p>
                            
                            <!-- A- Start Skills Part -->
                            
                            <!-- End Skills Part -->
                            <div class="cv-btn">
                                <div class="fb-like" data-href="https://www.facebook.com/Ordene-su-negocio-737763829635258/" data-layout="button" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section -->
        
        <!-- 03 - Start Services Section -->
        <section class="services">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section-title text-center">
                            <h2>Servicios</h2>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="service-box">
                            <h2 class="box-num">01</h2>
                            <img src="<?php echo base_url()?>recursos/img/creative.png" alt="service image" draggable="false"> <!-- Service Image -->
                            <h3>Consultoria</h3>
                            <p>Lo ayudamos a ordenar su negocio. Cuente con nuestra ayuda para tener un circuito de informacion.</p>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="service-box">
                            <h2 class="box-num">02</h2>
                            <img src="<?php echo base_url()?>recursos/img/support.png" alt="service image" draggable="false"> <!-- Service Image -->
                            <h3>Soporte</h3>
                            <p>Nuestras aplicaciones van de la mano del permanente contacto con los clientes</p>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="service-box">
                            <h2 class="box-num">03</h2>
                            <img src="<?php echo base_url()?>recursos/img/tools.png" alt="service image" draggable="false"> <!-- Service Image -->
                            <h3>Desarrollo</h3>
                            <p>Fabricamos Software para ordenar su organizacion, comercio, empresa o emprendimiento.</p>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <section class="services">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section-title text-center">
                            <h2>Desarrollo de integraciones</h2>
                            
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="section-title text-center">
                            <h3>Comunicamos su sistema de facturacion o desarrollo en: VTEX, Tiendanube, MercadoPago, MercadoLibre</h3>
                            <img src="<?php echo base_url()?>recursos/img/marcas.png" style="width: 50%"> 
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="service-box">
                            
                            <img src="<?php echo base_url()?>recursos/img/creative.png" alt="service image" draggable="false"> <!-- Service Image -->
                            <h3>Consultoria</h3>
                            <p>Experiencia en las Apis publicas de los plataformas mas modernas .</p>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="service-box">
                            
                            <img src="<?php echo base_url()?>recursos/img/support.png" alt="service image" draggable="false"> <!-- Service Image -->
                            <h3>Soporte</h3>
                            <p>Nuestras aplicaciones van de la mano del permanente contacto con los clientes</p>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="service-box">
                           
                            <img src="<?php echo base_url()?>recursos/img/tools.png" alt="service image" draggable="false"> <!-- Service Image -->
                            <h3>Desarrollo</h3>
                            <p>Fabricamos Software para ordenar su organizacion, comercio, empresa o emprendimiento.</p>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End Services Section -->
        
        
    
        <!-- 05 - Start Porfolio Section -->
        <section class="portfolio">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section-title text-center">
                            <h2>Portfolio y demos de software</h2>
                            <p>Vea algunos de nuestros trabajos</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <ul class="portfolio-filter">
                            <li class="filter active" data-filter="all">Todos</li>
                            <?php
                                foreach ($rubros as $r) {
                                    echo " <li class='filter' data-filter='.".$r["id"]."'>".$r["rubro"]."</li>";
                                }
                            ?>
                            
                        </ul>
                    </div>
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="grid" id="MixItUp173DCE">
                            <!-- portfolio item -->
                            <?php
                                foreach ($sistemas as $s) {
                                   echo "<div class='col-lg-3 col-md-6 col-xs-12 col-sm-6 ".$s["id_rubro"]." mix' style='display: inline-block;' data-bound=''>
                                            <div class='img-box'>
                                                <a class='item popup' href='".base_url()."recursos/img/".$s["imagen"]."'><img class='img-responsive' src='".base_url()."recursos/img/".$s["imagen"]."' alt=''></a>
                                                <div class='info-box'>
                                                    <a href='".$s["url"]."' target='_blank'><h4>".$s["titulo"]."</h4></a>
                                                    <h6>".$s["detalle"]."</h6>";
                                    if($s["precio"]!=0){
                                              echo "<h6> $ ".$s["precio"]."</h6>";
                                    }
                                    echo        "</div>
                                            </div>
                                        </div>";                         
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
                
        <!-- 10 - Start Contact Me Section -->
        <section class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section-title text-center">
                            <h2>Contacto</h2>
                            <br> <br> <br>
                            <ul class="row text-center">
                                <li class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
                                    <div class="about-box">
                                        <h4><i class="fa fa-phone"></i></h4>
                                        <h3><?php echo $movil["dato"]?></h3>
                                        
                                    </div>
                                </li>
                                <li class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
                                    <div class="about-box">
                                        <h4><i class="fa fa-envelope"></i></h4>
                                        <h3><?php echo $correo["dato"]?></h3>
                                        
                                    </div>
                                </li>
                                <li class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
                                    <div class="about-box bn">
                                        <h4><i class="fa fa-address-card"></i></h4>
                                        <h4><?php echo $direccion["dato"]?></h4>
                                                                               
                                    </div>
                                </li>
                            </ul>
                           
                             <br> <br>
                        </div>
                    </div>
                    <div class="col-xs-12 map-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3424.9113469937733!2d-64.52601968542503!3d-30.861156981592487!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x942d8d8a4cb3baa3%3A0x6ced0426a9d0982e!2sPueyrred%C3%B3n+%26+Corrientes%2C+X5184+Capilla+del+Monte%2C+C%C3%B3rdoba!5e0!3m2!1ses!2sar!4v1544883348332" width="550" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <form action="<?php echo base_url()?>index.php/welcome/enviar_formulario" method="post" id="formulario">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <input type="text" placeholder="Nombre" required="true" name="nombre" id="nombre">
                                        </div>
                                        <div class="col-xs-12">
                                            <input type="email" placeholder="Correo" required="true" name="correo" id="correo">
                                        </div>
                                        <div class="col-xs-12">
                                            <input type="text" placeholder="Telefono" required="true" name="telefono" id="telefono">
                                        </div>
                                        <div class="col-xs-12">
                                            <textarea placeholder="Mensaje" name="mensaje" required="true" id="mensaje"></textarea>
                                            <input type="button"  onclick="enviar()" value="enviar" />
                                            
                                          
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Me Section -->
        
        <!-- 11 - Start Footer Section -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <p class="copy-right">
                            Desarrollado por Adrian Sirianni. 
                        </p>
                        <p class="copy-right">
                            <li>
                                <a href="<?php echo base_url().'index.php/welcome/politicas'?>" target="_blank">Politicas de privacidad</a>
                            </li>
                        </p>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <ul class="social-list">
                            <li><a href="<?php echo $facebook["dato"];?>" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
                            <li><a href="<?php echo $youtube["dato"];?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="<?php echo $linkedin["dato"];?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer Section -->
            <!-- WhatsHelp.io widget -->
        <script type="text/javascript">
            (function () {
                var options = {
                    whatsapp: "+5491162979311", // WhatsApp number
                    call_to_action: "Hace tu consulta ahora!", // Call to action
                    position: "right", // Position may be 'right' or 'left'
                };
                var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
                var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
                s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
                var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
            })();
        </script>
        
        <script src="https://www.google.com/recaptcha/api.js?render=6LezCAAaAAAAAGOPFdRWkq-3VvLJMEO32i-iLWHk"></script>
        
        <script>
            function enviar(){
                event.preventDefault();
                var nombre = $('#nombre').val();
                var telefono = $('#telefono').val();
                var correo = $('#correo').val();
                var mensaje = $('textarea#mensaje').val();
                
                console.log(nombre);
                console.log(telefono);
                console.log(correo);
                console.log(mensaje);
                
                if(nombre===""){
                    alert("Por favor complete el campo nombre");
                }else{
                    if(correo===""){
                        alert("Por favor complete el campo correo");
                    }else{
                        if(telefono===""){
                            alert("Por favor complete el campo telefono");
                        }else{
                            if(mensaje===""){
                                alert("Por favor complete el campo mensaje");
                            }else{
                                grecaptcha.ready(function() {
                                    grecaptcha.execute('6LezCAAaAAAAAGOPFdRWkq-3VvLJMEO32i-iLWHk', {action: 'submit'}).then(function(token) {


                                        $.ajax({
                                            async: false,
                                            type: "POST",
                                            url: "<?php echo base_url()?>index.php/welcome/enviar_formulario",
                                            data:{token:token,action:"submit",nombre:nombre,correo:correo,telefono:telefono,mensaje:mensaje},
                                            success:function(data){
                                                 //alert(data);
                                                data = JSON.parse(data);

                                                if(data.exito){
                                                    alert(data.texto);

                                                }else{
                                                    alert(data.texto);
                                                }
                                            },
                                            error:function(data){
                                                console.log(data);
                                            }
                                        });



                                    });;
                                });
                            }
                        }
                    }
                }
                
                
                
                
            }
            
        </script>
        
        
        <!-- /WhatsHelp.io widget -->
        <!-- Jquery -->
        <script src="<?php echo base_url()?>recursos/js/jquery-3.3.1.min.js"></script>
        <!-- bootstrap js -->
        <script src="<?php echo base_url()?>recursos/js/bootstrap.min.js"></script>
        <!-- typed js -->
        <script src="<?php echo base_url()?>recursos/js/typed.js"></script>
        <!-- mixitup js -->
        <script src="<?php echo base_url()?>recursos/js/jquery.mixitup.js"></script>      
        <!-- Map Key API -->
        <!--<script src="<?php echo base_url()?>recursos/js/js"></script>-->
        <!-- Map js -->
        <!--<script src="<?php echo base_url()?>recursos/js/map.js"></script>-->
        <!-- Start Owl Carousel -->
        <script src="<?php echo base_url()?>recursos/js/owl.carousel.min.js"></script>
        <!-- Magnific Popup Js -->
        <script src="<?php echo base_url()?>recursos/js/magnific-popup.min.js"></script>
        <!-- theme script -->
        <script src="<?php echo base_url()?>recursos/js/theme.js"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-156201527-1">
        </script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-156201527-1');
        </script>
    </body>
</html>