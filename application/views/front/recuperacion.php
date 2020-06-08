<section>
	<div class="boxloginregister">
		<div class="tabordion">
		  <div>
		    <div><div class="labellr"><a href="<?php echo base_url()?>usuario/ingreso"><h2>Iniciá sesión</h2></a></div></div>
		    <article>
		    	<h3 class="titleoc">¿Olvidaste tu contraseña?</h3>
                         <label class="ingresa-usuario" style="color: red" id="error_mail_recuperacion"></label><br>
		    	<div class="boxinput romb">
                            <input type="text" placeholder="Mail" id="mail_recuperacion">
		    	</div>
		    	<div class="box1">
                            <button class="btnred btningresa" onclick="enviar_correo_recuperacion()">ENVIAR</button>
		    	</div>
		    	
		    </article>
		  </div>
		</div>					
	</div>
</section>

<div id="recuperarcontrasenia" class="modal_mask">
	<div class="box-modal modalrecuperar">
		<div class="box1">
		 	<img src="<?php echo base_url()?>assets/img/ilustraciones/mail.svg" alt="" class="mensajerecibidoimg">
		</div>
		<div class="box1">
		 	<h2>Enviado</h2>
                        <p style="margin-bottom:26px;" id="mensaje_recuperacion">Hemos enviado un correo a tu cuenta de mail para que recuperes tu contraseña. Recordá revisar tu bandeja de spam.</p>
		 	<p><a href="<?php echo base_url()?>usuario/ingreso">volver.</a></p>
		</div>
	</div><!-- box-modal==== -->
</div>
