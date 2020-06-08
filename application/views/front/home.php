<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="U-UX-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
	<title>Systema Avicola</title>
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css" type="text/css">
	<link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/iconos/favicon.png">
        <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/redviap.js"></script>
</head>

<body class="">
	
<div id="pantalla">
<div id="contenedor">

<header>
	 <nav class="navbar navbar-expand-lg fixed-top navbar-fixed">
      <div class="boxnav">
        <div class="boxlogo">
			<a href="index.html"><img src="<?php echo base_url()?>assets/img/logohome.svg" alt="Logo Systema Avicola"></a>
		</div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
          	<span class="icon-bar"></span>
          	<span class="icon-bar"></span>
          	<span class="icon-bar"></span>
          </span>
        </button>
        <div class="collapse navbar-collapse menu" id="navbarResponsive">
          <ul class="navbar-nav ml-auto ">
              <li class="menu1 nav-item"><a href="<?php echo base_url()?>usuario/soy_proveedor">Publicá gratis</a></li>
            <li class="menu2 nav-item"><a href="<?php echo base_url()?>usuario/soy_proveedor">Soy Proveedor</a></li>
            <li class="nav-item"><a href="<?php echo base_url()?>usuario/soy_anunciante"><button class="btnblue">Soy Anunciante</button></a></li>
          </ul>
        </div>
      </div>
    </nav>
</header>

<section>
	<div class="container">
	<div class="row">
	<div class="col-md-12">
		<img src="<?php echo base_url()?>assets/img/ilustraciones/portada.svg" alt="" class="imgportada">
		<div class="portada">
			<h1>Alquilá <span>el cartel</span> que necesitás en un solo lugar</h1>
			<h3>Centralizamos la publicación y alquiler de de cartelería en vía pública de todo el interior de Argentina</h3>
			
		</div>
                <form action="<?php echo base_url()?>welcome/buscar">
		<div class="box1 boxbuscador">
			<div class="buscador arrow">
				<select name="provincia" id="prov">
                                    <option value="0">Provincia</option>
                                </select>
                                <select name="localidad" id="loc">
                                    <option value="0">Localidad</option>
                                </select>
                                <select name="elemento" id="elemento">
                                    <option value="0">Elemento</option>
                                    <?php
                                        foreach ($tipos as $t) {
                                    ?>
                                        <option value="<?php echo $t["id"]?>"><?php echo $t["tipo"]?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                <select name="presupuesto" id="presupuesto">
                                    <option value="0">Presupuesto</option>
                                    <?php
                                        foreach ($precios as $p) {
                                    ?>
                                        <option value="<?php echo $p["id"]?>"><?php echo $p["rango"]?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
				<a href="buscador.html"><button class="btnred"><img src="img/iconos/lupa.svg" alt="">BUSCAR</button></a>
			</div>	
		</div>
                </form>
	</div>
	</div>
	</div>
	
</section>
<section>
	<h1 class="title">Carteles Destacados</h1>
	<div class="container">
	<div class="row">
	<div class="boxcartel">
            <?php 
                foreach ($destacados as $d) {
                    $img= trim($d["imagen"]);
                    $imagen = explode(", ", $img);
                ?>
                <div class="col-md-3">
			<div class="cartel">
				<div class="imgcartel" 
                                 <?php 
                                    if(!empty($imagen[0])){
                                        
                                 ?>
                                        style=" background-image:url(<?php echo base_url().'assets/recursos/fotos/'.$imagen[0]?>)"
                                 <?php
                                    }
                                 ?>
                                 
                                ></div>
				<div class="direccionc"><h4><?php echo $d["direccion"]?>, <?php echo $d["localidad"]?>, <?php echo $d["provincia"]?>, Argentina</h4></div>
				<div class="datocartel"><img src="<?php echo base_url()?>assets/img/iconos/crop.svg" alt=""><p><?php echo $d["ancho"]?>m x <?php echo $d["alto"]?>m</p></div>
				<div class="datocartel"><img src="<?php echo base_url()?>assets/img/iconos/calculadora.svg" alt=""><p><?php echo $d["rango"]?></p></div>
				<div>
                                    <a href="<?php echo base_url()."welcome/ver_cartel/".$d["id"]?>"><button class="btnblue">+Info</button></a>
                                    <a href="<?php echo base_url()."welcome/ver_cartel/".$d["id"]?>"><button class="btnred">Cotizar</button></a>
				</div>
			</div>
		</div>
                <?php
                }
            
            ?>
		
		
	</div>
	</div>
	</div>
	<div class="box1">
            <a href="<?php echo base_url()?>welcome/buscar"><button class="btnver btnred">VER MÁS CARTELES</button></a>
            
        </div>
</section>
<section>
	<h1 class="title">¿Cómo funciona?</h1>
	<div class="container">
	<div class="row">
	<div class="boxpasos">
		<img src="<?php echo base_url()?>assets/img/ilustraciones/lineaguion.svg" alt="" class="pasosimg2">
		<div class="col-md-4">
			<div class="pasos">
				<img src="<?php echo base_url()?>assets/img/ilustraciones/paso1.svg" alt="" class="pasosimg">
				<h3>Buscás</h3>
				<p>Encontrá las mejores ubicaciones para tus anuncios</p>
			</div>
		</div>
		<div class="col-md-4">
			<div class="pasos">
				<img src="<?php echo base_url()?>assets/img/ilustraciones/paso2.svg" alt="" class="pasosimg">
				<h3>Cotizás</h3>
				<p>Armá un listado y pedí un presupuesto</p>
			</div>
		</div>
		<div class="col-md-4">
			<div class="pasos">
				<img src="<?php echo base_url()?>assets/img/ilustraciones/paso3.svg" alt="" class="pasosimg">
				<h3>Contratás</h3>
				<p>A través de un solo pedido, centralizá toda la contratación</p>
			</div>
		</div>
	</div>
	</div>
	</div>
	<div class="boximagenes">
		<img src="<?php echo base_url()?>assets/img/ilustraciones/carteles.svg" alt="" class="imgcarteles">
		<img src="<?php echo base_url()?>assets/img/ilustraciones/fondofooter.svg" alt="" class="imgfondofooter">
	</div>
</section>

	
<footer>
	<div class="boxfooter">
		<div class="box1">
			<a href="index.html"><img src="<?php echo base_url()?>assets/img/logohomeblanco.svg" alt="Logo Systema Avicola" class="logofooter"></a>
			<div class="redes">
				<p>Consultanos <a href="#"><img src="<?php echo base_url()?>assets/img/iconos/facebook.svg" alt=""></a><a href="#"><img src="<?php echo base_url()?>assets/img/iconos/instagram.svg" alt=""></a></p>
			</div>
		</div>
		<div class="box1">
			<p class="legales">© 2019 Systema Avicola | <a href="">Aviso Legal</a> | <a href="">Política de privacidad</a> </p>
			<div class="datosmydesign">
				<p>Sitio desarrollado por<a href="https://www.mydesign.com.ar/" target="_blank"><img src="<?php echo base_url()?>assets/img/logomydesign.svg" alt="Logo My Design"></a></p>
			</div>
		</div>
	</div>
</footer>	

<div id="calendariocotizar" class="modal_mask">
	<div class="box-modal modalcalendario">
		<div class="cerrarmodal"><a href="#" class="">X</a></div>
		<div class="box1">
		 	<h2>Seleccioná una fecha</h2>
		</div>
		<div class="box1">
		 	<h4>Disponibilidad</h4>
		 	<select name="" id="" class="smc1"><option value="">2019</option></select>
		 	<select name="" id="" class="smc2"><option value="">Agosto</option></select>
		</div>
		<div class="box1">
		 	<div class="calendariomodal">
		 		<div class="columnacm">
		 			<div class="diacm"><p>D</p></div>
		 			<div class="fechacm"></div>
		 			<div class="fechacm celdafecha"><p>03</p></div>
		 			<div class="fechacm celdafecha"><p>10</p></div>
		 			<div class="fechacm celdafechaseleccionada"><p>17</p></div>
		 			<div class="fechacm celdafecha"><p>24</p></div>
		 		</div>
		 		<div class="columnacm">
		 			<div class="diacm"><p>L</p></div>
		 			<div class="fechacm"></div>
		 			<div class="fechacm celdafecha"><p>04</p></div>
		 			<div class="fechacm celdafecha"><p>11</p></div>
		 			<div class="fechacm celdafechaseleccionada"><p>18</p></div>
		 			<div class="fechacm celdafecha"><p>25</p></div>
		 		</div>
		 		<div class="columnacm">
		 			<div class="diacm"><p>M</p></div>
		 			<div class="fechacm"></div>
		 			<div class="fechacm celdafecha"><p>05</p></div>
		 			<div class="fechacm celdafechaseleccionada celdaactiva"><p>12</p></div>
		 			<div class="fechacm celdafechaseleccionada"><p>19</p></div>
		 			<div class="fechacm celdafecha"><p>26</p></div>
		 		</div>
		 		<div class="columnacm">
		 			<div class="diacm"><p>M</p></div>
		 			<div class="fechacm"></div>
		 			<div class="fechacm celdafecha"><p>06</p></div>
		 			<div class="fechacm celdafechaseleccionada"><p>13</p></div>
		 			<div class="fechacm celdafechaseleccionada"><p>20</p></div>
		 			<div class="fechacm celdafecha"><p>27</p></div>
		 		</div>
		 		<div class="columnacm">
		 			<div class="diacm"><p>J</p></div>
		 			<div class="fechacm"></div>
		 			<div class="fechacm celdafecha"><p>07</p></div>
		 			<div class="fechacm celdafechaseleccionada"><p>14</p></div>
		 			<div class="fechacm celdafechaseleccionada celdaactiva"><p>21</p></div>
		 			<div class="fechacm celdafecha"><p>28</p></div>
		 		</div>
		 		<div class="columnacm">
		 			<div class="diacm"><p>V</p></div>
		 			<div class="fechacm celdafecha"><p>01</p></div>
		 			<div class="fechacm celdafecha"><p>08</p></div>
		 			<div class="fechacm celdafechaseleccionada"><p>15</p></div>
		 			<div class="fechacm celdafecha"><p>22</p></div>
		 			<div class="fechacm celdafecha"><p>29</p></div>
		 		</div>
		 		<div class="columnacm">
		 			<div class="diacm"><p>S</p></div>
		 			<div class="fechacm celdafecha"><p>02</p></div>
		 			<div class="fechacm celdafecha"><p>09</p></div>
		 			<div class="fechacm celdafechaseleccionada"><p>16</p></div>
		 			<div class="fechacm celdafecha"><p>23</p></div>
		 			<div class="fechacm celdafecha"><p>30</p></div>
		 		</div>
		 	</div>
		</div>
		<div class="box1">
			<div class="boxopcion boxinput mfmcbo">
				<p class="placeholderinputactive">Desde</p>
				<p class="datospe">12/09/2019</p>
			</div>
			<div class="boxopcion boxinput">
	    		<p class="placeholderinputactive">Hasta</p>
				<p class="datospe">21/09/2019</p>
			</div>
			<a href="#mensajerecibido"><button class="btnred">ENVIAR</button></a>
		</div>
		<div class="box1"><p class="spanfnd">¡Revisar fechas! Fechas no disponibles</p></div>
	</div><!-- box-modal==== -->
</div>

<div id="mensajerecibido" class="modal_mask">
	<div class="box-modal modalmensajerecibido">
		<div class="box1">
		 	<img src="<?php echo base_url()?>assets/img/ilustraciones/mensajerecibido.svg" alt="" class="mensajerecibidoimg">
		</div>
		<div class="box1">
		 	<h2>Recibimos tu pedido</h2>
		 	<p>En breve te estaremos enviando la cotización a tu cuenta.</p>
		</div>
		<div class="box1">
			<div class="boxbtnmr">
				<a href="#"><button class="btnwhite">IR A MI CUENTA</button></a>
				<a href="#"><button class="btnred">SEGUIR BUSCANDO</button></a>
			</div>		
		</div>
	</div><!-- box-modal==== -->
</div>	

</div> <!-- #contenedor ==== -->
</div> <!-- #pantalla ==== -->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
    
       
    function generar_provincias(codigo){
    	$.ajax({
            type: "POST",
            url: "<?php echo base_url()?>usuario/get_provincias",
            data:{codigo_pais:codigo},
            
            beforeSend: function(event){},
            success: function(data){
                 $('#prov').empty().append(data);
            },
            error: function(event){},
        });
    }

    function generar_localidades(codigo){
    	$.ajax({
            type: "POST",
            url: "<?php echo base_url()?>usuario/get_localidades",
            data:{codigo_provincia:codigo},
            
            beforeSend: function(event){},
            success: function(data){
                 $('#loc').empty().append(data);
            },
            error: function(event){},
        });
    }

    $( "#prov" ).change(function() {
        var codigo=$('#prov').val();
        generar_localidades(codigo);
    });

    $( document ).ready(function() {
        generar_provincias("1");
    });
	
</script>
</body>
</html>