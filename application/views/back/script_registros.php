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
                                            location.href="<?php echo base_url()?>usuario/ingreso_usuario";
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
                                        
                                        $.ajax({
                                            type: "POST",
                                            async:false,
                                            url: "<?php echo base_url()?>index.php/Usuario/recuperar_datos_cuenta",
                                            data:{envio:mail_recuperacion},

                                            beforeSend: function(event){},
                                            success: function(data){
                                                $("#mensaje_recuperacion").empty();
                                                $("#mensaje_recuperacion").append(data);
                                                
                                                location.hash = "#recuperarcontrasenia";
                                            },
                                            error: function(event){},
                                        });
				}else{
					
                                        $("#mail_recuperacion").css("border-color", "#D80000");
                                        $("#error_mail_recuperacion").append("ese correo ingresado no esta registrado");
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
                        location.href="<?php echo base_url()?>Usuario/registro_exitoso";
                    }
                    else
                    {
                        console.log("no registrado");
                    }
                },
                error: function(event){},
            });

        
	}

    $('body').keyup(function(e) {
        if(e.keyCode == 13) {
            ingresa();
        }
    });

</script>