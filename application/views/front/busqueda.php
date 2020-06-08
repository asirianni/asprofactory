<section>
	<div class="box1">
		<div class="cabecera">
			<h1 class="titleleft">Carteles</h1>
			<div class="cabecerar arrow">
				<p>Ordenar por</p>
				<select name="" id=""><option value="">Relevancia</option></select>
			</div>
		</div>
	</div>
	<div class="container">
	<div class="row">
	<div class="boxcartel">
		<?php 
                foreach ($listado as $d) {
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
                                    <a href="#" onclick="mostrar_calendario(<?php echo $d["id"]?>)"><button class="btnred">Cotizar</button></a>
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
		<div class="paginador">
			<div class="prev"><a href="#"></a></div>
			<div class="paginas">
				<a href="" class="pagactiva">1</a>
				<a href="">2</a>
				<a href="">3</a>
				<a href="">4</a>
				<a href="">5</a>
				<a href="">6</a>
				<a href="">7</a>
				<a href="">8</a>
				<a href="">9</a>
			</div>
			<div class="next"><a href="#"></a></div>
		</div>
	</div>
</section>

