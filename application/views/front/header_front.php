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
            <a href="<?php echo base_url()?>"><img src="<?php echo base_url()?>assets/img/logo.png" alt="Logo Systema Avicola"></a>
		</div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
          	<span class="icon-bar"></span>
          	<span class="icon-bar"></span>
          	<span class="icon-bar"></span>
          </span>
        </button>
        <div class="collapse navbar-collapse menu menubuscador" id="navbarResponsive">
          <ul class="navbar-nav ml-auto ">
            <li class="nav-item libuscador">
            	<div class="buscador2 arrow2">
                    <form action="<?php echo base_url()?>welcome/buscar">
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
                        <button class="btnred"><img src="<?php echo base_url()?>assets/img/iconos/lupa.svg" alt="">BUSCAR</button></form>
                </div>
            </li>
             <?php 
                if($this->session->userdata("ingresado") == true )
                {
                    
                    if($this->session->userdata("tipo_usuario") ==1){
                    $detalle_tipo="Administrador";    

                    ?>
                        
                                
                    <?php
                    }
                    
                    if($this->session->userdata("tipo_usuario") ==2){
                    $detalle_tipo="Proveedor";    

                    ?>
                        
                                
                    <?php
                    }
                    
                    if($this->session->userdata("tipo_usuario") ==3){
                    $detalle_tipo="Anunciante";    

                    ?>
                        
                                
                    <?php
                    }
                    
                    ?>
                                <li class="nav-item menue">
                                    <a href="#"><div class="perfilmenu"><h4><?php echo $this->session->userdata("nombre")?></h4><p><?php echo $detalle_tipo;?></p></div><img src="<?php echo base_url()?>assets/img/iconos/arrowblue.svg" alt=""></a>
                                <ul class="hidden">
                                  <li class="itemsubmenu"><a href="<?php echo base_url()?>usuario/mi_perfil"><img src="<?php echo base_url()?>assets/img/iconos/user2.svg" alt="">Mi Perfil</a></li>
                                  <li class="itemsubmenu"><a href="<?php echo base_url()?>usuario/cerrar_sesion">Cerrar Sesión</a></li>
                                </ul>
                                </li>
                            </ul>
                          </div>
                    <?php            
                }
            ?>
          </ul>
        </div>
      </div>
    </nav>
</header>
    
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