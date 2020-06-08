<section>
	<div class="container">
	<div class="row">
	<div class="col-md-12 proveedoreditar">
		<h1 class="titlecenterh1">Mi perfil</h1>
		<div class="boxmiperfil">
						
						
							
							<div class="row" style="vertical-align: middle;margin-top: 42px;">
								<div class="col-xs-12 col-md-12 col-lg-12">
									<label class="ingresa-usuario" >Nombre</label>
									<label class="ingresa-usuario" id="error_nombre"></label><br>
									<input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $this->session->userdata("nombre")?>"><br>
								</div>
								
							</div>
							
							<div class="row">
								<div class="col-12">
									<label class="ingresa-usuario" >Mail</label>
									<label class="ingresa-usuario" id="error_mail"></label><br>
									<input class="form-control" type="text" name="mail" id="mail" value="<?php echo $this->session->userdata("correo")?>"><br>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-md-3 col-lg-3">
									<label class="ingresa-usuario" >Cod. Area</label>
									<label class="ingresa-usuario" id="error_cod_a"></label><br>
									<input class="form-control" type="number" name="cod_a" id="cod_a" value="<?php echo $this->session->userdata("cod_a")?>"><br>
								</div>
								<div class="col-xs-12 col-md-9 col-lg-9">
									<label class="ingresa-usuario">Telefono</label>
									<label class="ingresa-usuario" id="error_tel"></label><br>
									<input class="form-control" type="number" name="tel" id="tel" value="<?php echo $this->session->userdata("tel")?>"><br>
								</div>
							</div>
							<div class="row">
								
								<div class="col-xs-12 col-md-6 col-lg-6">
									<label class="ingresa-usuario">Provincia</label>
									<label class="ingresa-usuario" id="error_prov"></label><br>
									<select class="form-control" id="prov">
										
									</select>
									<br>
								</div>
                                                                <div class="col-xs-12 col-md-6 col-lg-6">
									<label class="ingresa-usuario" >Localidad</label>
									<label class="ingresa-usuario" id="error_loc"></label><br>
									<select class="form-control" id="loc">
										
									</select><br>
								</div>
							</div>
							
							<div class="row">
								<div class="col-12">
									<label class="ingresa-usuario" >Direccion</label>
									<label class="ingresa-usuario" id="error_direcc"></label><br>
									<input class="form-control" placeholder="" type="text" name="direcc" id="direcc" value="<?php echo $this->session->userdata("direcc")?>"><br>
								</div>
							</div>
							<div class="row">
								
								<div class="col-xs-12 col-md-12 col-lg-12">
									<label class="ingresa-usuario">CUIT/CUIL</label>
									<label class="ingresa-usuario" id="error_cuit"></label><br>
									<input class="form-control" type="text" name="cuit" id="cuit" value="<?php echo $this->session->userdata("cuit")?>"><br>
								</div>
							</div>
							<section  id="linea">
						        <div class="text-center">
						            <hr style="height: 2px;width: 100%;background-color: #4977ff;margin-top: 88px;margin-bottom: 62px;">
						        <div>    
						    </seccion>
							<br>
							<div class="row">
								<div class="col-12">
									<label class="ingresa-usuario" >Contrase&ntilde;a actual</label>
									<label class="ingresa-usuario" id="error_pass_actual"></label><br>
									<input class="form-control" type="password" name="pass_actual" id="pass_actual" value="<?php echo $this->session->userdata("pass")?>" disabled="true"><br>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-12">
									<label class="ingresa-usuario" >Nueva contrase&ntilde;a</label>
									<label class="ingresa-usuario" id="error_nueva_pass"></label><br>
									<input class="form-control" type="password" name="nueva_pass" id="nueva_pass"><br>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<label class="ingresa-usuario" >Repetir nueva contrase&ntilde;a</label>
									<label class="ingresa-usuario" id="error_nueva_pass_re"></label><br>
									<input class="form-control" type="password" name="pass_re" id="pass_re"><br>
								</div>
							</div>
							
						
                                                        <div class="btnprovedor">
                                                                <a href=""><button class="btnwhite2"><div class="arrowci"></div>VOLVER</button></a>
                                                                <button class="btnred" onclick="actualizar();">GUARDAR</button>
                                                        </div>

								
						
				</div>
		</div>
        </div>
</div>
</section>            

