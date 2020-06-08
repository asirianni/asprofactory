<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '3176198382397576',
      cookie     : true,
      xfbml      : true,
      version    : 'v5.0'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

    function checkLoginState() {
      FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
      });
    }
</script>


<section>
	<div class="boxloginregister">
		<div class="tabordion">
		  <div id="section1">
		    <input type="radio" name="sections" id="option1" checked class="selection">
		    <label for="option1" class="labellr"><h2>Iniciá sesión</h2></label>
		    <article>
                        <label class="ingresa-usuario" style="color: red;" id="error_mail"></label><br>
		    	<div class="boxinput">
                                
		    		<input type="text" id="mail">
		    		<p class="placeholderinput">Mail</p>
		    	</div>
                         <label class="ingresa-usuario" style="color: red" id="error_pass"></label><br>
		    	<div class="boxinput">
                               
		    		<input type="password" name="pass" id="pass">
		    		<p class="placeholderinput">Contraseña</p>
		    	</div>
		    	<div class="box1 boxchecklogin">
		    		<div class="checklogin">
						<label class="labellogin">
						  <input type="checkbox" name="radio3">
						  <span class="spanlogin"></span>
						</label>
						<p>Recordame</p>
					</div>
		    		<a class="recuperarc">Recuperar contraseña</a>
		    	</div>
		    	<div class="box1">
		    		<button onclick="ingresa();" class="btnred btningresa"><img src="<?php echo base_url()?>assets/img/iconos/user.svg" alt="">INGRESÁ</button>
		    	</div>
		    	<div class="box1 divisoro">
		    		<div class="hrlogin1"><hr></div><p>O</p><div class="hrlogin2"><hr></div>
		    	</div>
		    	<div class="box1">
		    		<p class="pingresa">Ingresá con tu cuenta</p>
		    		<div class="boxbtnlr">
		    			<button class="btnfacebook">Accedé <img src="<?php echo base_url()?>assets/img/iconos/facebook2.svg" alt=""></button>
		    			<button class="btngoogle">Accedé <img src="<?php echo base_url()?>assets/img/iconos/google.svg" alt=""></button>
		    		</div>
		    	</div>
		    </article>

		    <article>
		    	<h3 class="titleoc">¿Olvidaste tu contraseña?</h3>
		    	<div class="boxinput romb">
		    		<input type="text">
		    		<p class="placeholderinput">Mail</p>
		    	</div>
		    	<div class="box1">
		    		<a href="#recuperarcontrasenia"><button class="btnred btningresa">ENVIAR</button></a>
		    	</div>
		    	<div class="box1 divisoro">
		    		<div class="hrlogin1"><hr></div><p>O</p><div class="hrlogin2"><hr></div>
		    	</div>
		    	<div class="box1">
		    		<p class="pingresa">Ingresá con tu cuenta</p>
		    		<div class="boxbtnlr">
                                        
		    			<button class="btnfacebook">Accedé <img src="<?php echo base_url()?>assets/img/iconos/facebook2.svg" alt=""></button>
		    			<button class="btngoogle">Accedé <img src="<?php echo base_url()?>assets/img/iconos/google.svg" alt=""></button>
		    		</div>
		    	</div>
		    </article>

		  </div>
		  <div id="section2">
		    <input type="radio" name="sections" id="option2" class="selection">
		    <label for="option2" class="sl2 labellr"><h2>Registrate</h2></label>
		    <article>
		    	<p class="pingresa">Completa los siguientes los datos</p>
                        <label class="ingresa-usuario" style="color: red" id="error_nombre"></label><br>
		    	<div class="boxinput">
		    		<input type="text" id="nombre">
		    		<p class="placeholderinput">Nombre*</p>
		    	</div>
                        <label class="ingresa-usuario" style="color: red" id="error_mail_registro"></label><br>
		    	<div class="boxinput">
                            <input type="text" id="mail_registro">
		    		<p class="placeholderinput">Mail*</p>
		    	</div>
                        
                        <label class="ingresa-usuario" style="color: red" id="error_area"></label><br>
                        <label class="ingresa-usuario" style="color: red" id="error_telefono"></label><br>  
		    	<div class="boxinput">
                                 
                            <div class="boxinput1">
                                <input type="text" id="area">
                                    <p class="placeholderinput">Cód. Área</p>
                            </div>

                            <div class="boxinput2">
                                    <input type="text" id="telefono">
                                    <p class="placeholderinput">Teléfono</p>
                            </div>
		    	</div>
                        <label class="ingresa-usuario" style="color: red" id="error_passregistro"></label><br>  
		    	<div class="boxinput">
                            <input type="password" id="passregistro">
		    		<p class="placeholderinput">Contraseña*</p>
		    	</div>
                        <label class="ingresa-usuario" style="color: red" id="error_passre"></label><br>  
		    	<div class="boxinput">
                            <input type="password" id="passre">
                            <p class="placeholderinput">Repetir Contraseña*</p>
		    	</div>
                        <label class="ingresa-usuario" style="color: red" id="error_terminos"></label><br>  
		    	<div class="box1 boxchecklogin">
                            <div class="checklogin">
                                    <label class="labellogin">
                                      <input type="checkbox" name="radio3" id="terminos">
                                      <span class="spanlogin"></span>
                                    </label>
                                    <p>Acepto los <a href="terminosycondiciones.html">Términos y Condiciones</a></p>
                            </div>
		    	</div>
                        
		    	<div class="box1">
                            <button class="btnred btningresa" onclick="registrar()"><img src="<?php echo base_url()?>assets/img/iconos/user.svg" alt=""> REGISTRATE</button>
		    	</div>
		    	<div class="box1 divisoro">
		    		<div class="hrlogin1"><hr></div><p>O</p><div class="hrlogin2"><hr></div>
		    	</div>
		    	<div class="box1">
		    		<p class="pingresa">Registrate con tu cuenta</p>
		    		<div class="boxbtnlr">
		    			<button class="btnfacebook">Accedé <img src="<?php echo base_url()?>assets/img/iconos/facebook2.svg" alt=""></button>
		    			<button class="btngoogle">Accedé <img src="<?php echo base_url()?>assets/img/iconos/google.svg" alt=""></button>
		    		</div>
		    	</div>
		    </article>
		  </div>
		</div>					
	</div>
</section>
<script type="text/javascript">

	function ingresa(){
		
		var mail=$( "#mail" ).val();
		var pass=$( "#pass" ).val();
		
		if(cambiar('mail',"(Complete este dato)")){
			if(validarEmail(mail)){
				$("#mail").css("border-color", "#0DC143");
				$("#mail_error").append("");
				if(cambiar('pass',"(Complete este dato)")){
					$.ajax({
            			type: "POST",
            			async:false,
            			url: "<?php echo base_url()?>index.php/usuario/loguin",
            			data:{correo:mail,pass:pass},

            			beforeSend: function(event){},
        				success: function(data){
                			data = JSON.parse(data);

                			if(data.usuario_validado== true)
                			{ 
                    			//alert(data.error_mensaje);
                    			location.href="<?php echo base_url()?>usuario/escritorio";
                    			console.log(data.error_mensaje);
                			}
                			else
                			{
                				alert(data.error_mensaje);
                    			console.log(data.error_mensaje);
                			}
            			},
            			error: function(event){},
        			});
				}
			}else{
				$("#mail").css("border-color", "#D80000");
				$("#error_mail").append("(el correo ingresado no es correcto.ej: jose@gmail.com)");
			}
		}


	}

	function cambiar(selectores,texto){
		var validacion=false;
		var selector="#"+selectores;
		campo=$( selector ).val();

		var selector_error= "#error_"+selectores;

		$(selector_error).empty();
		

		if(campo==""){
			$(selector).css("border-color", "#D80000");
			$(selector_error).append(texto);
		}else{
			$(selector).css("border-color", "#0DC143");
			$(selector_error).append("");
			validacion=true;
		}
		return validacion;
		
	}

	function validarEmail(valor) {
		var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    	return regex.test(valor) ? true : false;
	}

	function abrir_modal_recuperacion(){
		$('#recuperacion').modal('show');
	}

	function enviar_correo_recuperacion(){
		var mail_recuperacion=$( "#mail_recuperacion" ).val();

		if(cambiar('mail_recuperacion',"(Complete este dato)")){
			if(validarEmail(mail_recuperacion)){
				$("#mail_recuperacion").css("border-color", "#0DC143");
				$("#error_mail_recuperacion").append("");

				if(existe_correo(mail_recuperacion)){
					$("#mensaje_recuperacion").empty();
					$("#mensaje_recuperacion").append("se enviaron sus datos a la casilla!");
				}else{
					$("#mensaje_recuperacion").empty();
					$("#mensaje_recuperacion").append("ese correo ingresado no esta registrado");
				}

				
			}else{
				$("#mail_recuperacion").css("border-color", "#D80000");
				$("#error_mail_recuperacion").append("(el correo ingresado no es correcto.ej: jose@gmail.com)");
			}
		}

	}

	function existe_correo(correo){
		var existe=false;

		$.ajax({
            type: "POST",
            async:false,
            url: "<?php echo base_url()?>index.php/Usuario/existe",
            data:{correo:correo},

            beforeSend: function(event){},
            success: function(data){
                data = JSON.parse(data);

                if(data== true)
                { 
                    console.log("existe correo");
                    existe=true;
                }
                else
                {
                    console.log("no existe correo");
                }
            },
            error: function(event){},
        });

        return existe;
	}
        
        


	function registrar(){
        
		var nombre=$( "#nombre" ).val();
                var mail=$( "#mail_registro" ).val();
                var area=$( "#area" ).val();
		var telefono=$( "#telefono" ).val();
		var passregistro=$( "#passregistro" ).val();
		var passre=$( "#passre" ).val();
		var terminos=document.getElementById("terminos").checked;
		
                console.log(passregistro);
                console.log(passre);
                
		if(cambiar('nombre',"(Complete este dato)")){
			
                    if(cambiar('mail_registro',"(Complete este dato)")){
                        if(validarEmail(mail)){
                                $("#mail_registro").css("border-color", "#0DC143");
                                $("#error_mail_registro").append("");
                                if(cambiar('area',"(Complete este dato)")){
                                   if(cambiar('telefono',"(Complete este dato)")){
                                       if(cambiar('passregistro',"(Complete este dato)")){
                                        if(cambiar('passre',"(Complete este dato)")){
                                                if(passregistro===passre){
                                                        $("#pass").css("border-color", "#0DC143");
                                                        $("#error_passregistro").append("");

                                                        $("#passre").css("border-color", "#0DC143");
                                                        $("#error_passre").append("");

                                                        if(terminos){
                                                                $("#error_terminos").empty();


                                                                if(!existe_correo(mail)){
                                                                        $("#mail_registro").css("border-color", "#0DC143");
                                                                        $("#error_mail_registro").append("");

                                                                        registro(nombre,"",mail,passregistro,area,telefono);

                                                                }else{
                                                                        alert("Correo ya registrado!");
                                                                        $("#mail_registro").css("border-color", "#D80000");
                                                                        $("#error_mail_registro").append("(correo existente! si no recordas tus datos recuperalos en 'Inicia Session')");
                                                                }

                                                        }else{
                                                                $("#error_terminos").empty();
                                                                $("#error_terminos").append("(por favor confirme esta casilla)");
                                                        }

                                                }else{
                                                        $("#pass").css("border-color", "#D80000");
                                                        $("#error_passregistro").append("(estos datos tienen que ser coincidentes)");

                                                        $("#passre").css("border-color", "#D80000");
                                                        $("#error_passre").append("(estos datos tienen que ser coincidentes)");
                                                }
                                        }
                                    }
                                   }    
                                   
                                }    



                        }else{
                            $("#mail_registro").css("border-color", "#D80000");
                            $("#error_mail_registro").append("(el correo ingresado no es correcto.ej: jose@gmail.com)");
                        }


					
                    }
			
		}


	}

	function cambiar(selectores,texto){
		var validacion=false;
		var selector="#"+selectores;
		campo=$( selector ).val();

		var selector_error= "#error_"+selectores;

		$(selector_error).empty();
		

		if(campo==""){
			$(selector).css("border-color", "#D80000");
			$(selector_error).append(texto);
		}else{
			$(selector).css("border-color", "#0DC143");
			$(selector_error).append("");
			validacion=true;
		}
		return validacion;
		
	}


	function existe_correo(correo){
		var existe=false;

		$.ajax({
            type: "POST",
            async:false,
            url: "<?php echo base_url()?>index.php/Usuario/existe",
            data:{correo:correo},

            beforeSend: function(event){},
            success: function(data){
                data = JSON.parse(data);

                if(data== true)
                { 
                    console.log("existe correo");
                    existe=true;
                }
                else
                {
                    console.log("no existe correo");
                }
            },
            error: function(event){},
        });

        return existe;
	}

	function registro(nombre,apellido,mail,pass,cod,tel){
		
            $.ajax({
                type: "POST",
                async:false,
                url: "<?php echo base_url()?>index.php/Usuario/registrar",
                data:{nombre:nombre,apellido:apellido,mail:mail,pass:pass,cod:cod,tel:tel},
                beforeSend: function(event){},
                success: function(data){
                    data = JSON.parse(data);

                    if(data== true)
                    { 
                        console.log("registrado");
                        location.href="<?php echo base_url()?>usuario/registro_exitoso";
                    }
                    else
                    {
                        console.log("no registrado");
                    }
                },
                error: function(event){},
            });

        
	}



</script>