<section>
	<div class="container busquedacartel">
	<div class="row">
	<div class="col-md-12 busquedacartel1">
		<p><img src="img/iconos/home.svg" alt=""> > <?php echo $cartel["provincia_desc"]?> > <?php echo $cartel["iluminacion_des"]?> > <span>Cód.: <?php echo $cartel["cod_interno"]?></span></p>
	</div>
	<div class="box1 busquedacartel2">
		<div class="col-md-5">
                    <?php 
                    $img_c= trim($cartel["imagenes"]);
                    $imagen_c = explode(", ", $img_c);
                    
                    
                    
                    ?>
                    
                    
                    <div class="cartelfoto" 
                         
                                <?php 
                                    if(!empty($imagen_c[0])){
                                        
                                 ?>
                                        style=" background-image:url(<?php echo base_url().'assets/recursos/fotos/'.$imagen_c[0]?>)"
                                 <?php
                                    }
                                 ?>     
                         
                    >
                        <img src="<?php echo base_url()?>assets/img/iconos/heart.svg" alt="" class="like">
                    </div>
		</div>
		<div class="col-md-7">
			<div class="datoscartelfoto">
				<h3 class="dcfh3a">Cód.: <?php echo $cartel["cod_interno"]?></h3>
				<h1><?php echo $cartel["titulo"]?></h1>
				<h3 class="dcfh3b">Tipo de soporte: <?php echo $cartel["ti_descripcion"]." ".$cartel["iluminacion_des"] ?> </h3>
				<div class="box1">
					<div class="box1 infocartel"><p><img src="<?php echo base_url()?>assets/img/iconos/crop2.svg" alt="">Dimensiones: <?php echo $cartel["ancho"]?>m x <?php echo $cartel["alto"]?>m</p></div>
					<div class="box1 infocartel"><p><img src="<?php echo base_url()?>assets/img//iconos/calculadora2.svg" alt="">Presupuesto estimado: <?php echo $cartel["rango_descripcion"]?></p></div>
					<div class="box1 infocartel"><p><img src="<?php echo base_url()?>assets/img//iconos/ubicacion.svg" alt=""><?php echo $cartel["direccion"]?>, <?php echo $cartel["localidad_desc"]?>, <?php echo $cartel["provincia_desc"]?>, Argentina</p></div>
					<h4>Descripción</h4>
					<p class="descripcion"><?php echo $cartel["descripcion"]?></p>
					<a href="#" onclick="mostrar_calendario(<?php echo $cartel["id"]?>)"><button class="btnred">COTIZAR</button></a>
				</div>
			</div>
		</div>
	</div>
	<div class="box1">
		<div class="col-md-5">
			<div class="mapa">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.325827456878!2d-68.84702128511013!3d-32.889552576329805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x967e0907b3f6324b%3A0x501d1521958dfb21!2sPlaza%20Independencia!5e0!3m2!1ses-419!2sar!4v1576271847989!5m2!1ses-419!2sar" width="100%" height="394" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
			</div>
		</div>
		<div class="col-md-7">
			<div class="imgmapa"></div>
		</div>
	</div>
	</div>
	</div>
	</div>
</section>
<section>
	<div><h2 class="titlecenter">Carteles que te pueden interesar</h2></div>
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
</section>
