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
        <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/iconos/favicon.ico">
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
            
            <?php 
                if($this->session->userdata("ingresado") == true )
                {
                    if($this->session->userdata("tipo_usuario") ==1){


                    ?>
                        <div class="collapse navbar-collapse menu menuprovedor" id="navbarResponsive">
                            <ul class="navbar-nav ml-auto ">
                                <li class="menuproveedorli nav-item"><a href="administrador-carteles.html">CARTELES</a></li>
                                <li class="menuproveedorli nav-item"><a href="administrador-anunciantes.html">ANUNCIANTES</a></li>
                                <li class="menuproveedorli nav-item"><a href="administrador-proveedores.html">PROVEEDORES</a></li>
                                <li class="menuproveedorli nav-item"><a href="administrador-carteles.html">USUARIOS</a></li>
                                
                    <?php
                    }
                    
                    if($this->session->userdata("tipo_usuario") ==2){


                    ?>
                        <div class="collapse navbar-collapse menu menuprovedor" id="navbarResponsive">
                            <ul class="navbar-nav ml-auto ">
                                <li class="menuproveedorli nav-item"><a href="proveedor-anunciosactivos.html">ACTIVOS</a></li>
                                <li class="menuproveedorli nav-item"><a href="proveedor-mispublicaciones.html">MIS PUBLICACIONES</a></li>
                                <li class="menuproveedorli nav-item"><a href="proveedor-interesados.html">INTERESADOS</a></li>
                                <li class="menuproveedorli2 nav-item"><a href="cargaranuncio1.html"><button class="btnblue">PUBLICAR</button></a></li>
                                
                    <?php
                    }
                    
                }
            ?>
                           <li class="nav-item menue">
                                    <a href="#"><div class="perfilmenu"><h4>Rodolgo Gimenez</h4><p>Administrador</p></div><img src="<?php echo base_url()?>assets/img/iconos/arrowblue.svg" alt=""></a>
                                <ul class="hidden">
                                  <li class="itemsubmenu"><a href="miperfil.html"><img src="<?php echo base_url()?>assets/img/iconos/user2.svg" alt="">Mi Perfil</a></li>
                                  <li class="itemsubmenu"><a href="<?php echo base_url()?>usuario/cerrar_sesion">Cerrar Sesión</a></li>
                                </ul>
                                </li>
                            </ul>
                          </div>         
                </div>
	</nav>
</header>

