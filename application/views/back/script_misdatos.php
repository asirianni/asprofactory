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

	function cambiar(selectores,texto){
		var validacion=false;
		var selector="#"+selectores;
		campo=$( selector ).val();

		var selector_error= "#error_"+selectores;

		$(selector_error).empty();
		

		if(campo==""){
			$(selector).css("border-color", "#D80000");
			$(selector_error).append(texto);
			alert("Por favor complete los datos en rojo!");
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

	function actualizar_datos(
		nombre,apellido,mail,nacimiento,dni,area,tel,pais,provincia,localidad,cod_p,direccion,empresa,cuit,pass_actual){

		console.log(nombre);
		console.log(apellido);
                console.log(mail);
                console.log(nacimiento);
                console.log(dni);
                console.log(area);
                console.log(tel);
                console.log(pais);
                console.log(provincia);
                console.log(localidad);
                console.log(cod_p);
                console.log(direccion);
                console.log(empresa);
                console.log(cuit);
    	
    	//console.log(pass_actual);

    	$.ajax({
            type: "POST",
            async:false,
            url: "<?php echo base_url()?>index.php/Usuario/update",
            data:{
            	nombre:nombre,
            	apellido:apellido,
            	mail:mail,
            	nacimiento:nacimiento,
            	dni:dni,
            	area:area,
            	tel:tel,
            	pais:pais,
            	provincia:provincia,
            	localidad:localidad,
            	cod_p:cod_p,
            	direccion:direccion,
            	empresa:empresa,
            	cuit:cuit,
            	pass:pass_actual
            },

            beforeSend: function(event){},
            success: function(data){
                data = JSON.parse(data);

                if(data== true)
                { 
                    alert("Datos Actualizados");
                    location.href="<?php echo base_url()?>proveedor/mis_publicaciones";
                }
                else
                {
                    alert("No se pudo actualizar, intente mas tarde");
                }
            },
            error: function(event){},
        });

	}

    function actualizar(){
    	var nombre=$( "#nombre" ).val();
//		var apellido=$( "#apellido" ).val();
		var mail=$( "#mail" ).val();

//		var nacimiento=$( "#fecha_n" ).val();
//		var dni=$( "#dni" ).val();
		var area=$( "#cod_a" ).val();
		var tel=$( "#tel" ).val();
//		var pais=$( "#pais" ).val();
		var provincia=$( "#prov" ).val();
		var localidad=$( "#loc" ).val();
//		var cod_p=$( "#cod_p" ).val();
		var direccion=$( "#direcc" ).val();
//		var empresa=$( "#empresa" ).val();
		var cuit=$( "#cuit" ).val();
		var pass_actual="<?php echo $this->session->userdata("contrasenia") ?>";
		var pass=$( "#nueva_pass" ).val();
		var repass=$( "#pass_re" ).val();

		console.log(pass);
                console.log(repass);

    	if(cambiar('nombre',"(Complete este dato)")){
			
				if(cambiar('mail',"(Complete este dato)")){
					if(validarEmail(mail)){
						$("#mail").css("border-color", "#0DC143");
						$("#mail_error").append("");
						
							
								if(cambiar('cod_a',"(Complete este dato)")){
									if(cambiar('tel',"(Complete este dato)")){
										if(provincia!=0){
											if(localidad!=0){
												
													if(cambiar('direcc',"(Complete este dato)")){
														
															if(cambiar('cuit',"(Complete este dato)")){
																//si no ingresa nueva pass, significa que no hay que validar este campo y pasa a actualizar
																if(pass==""){
																	actualizar_datos(
		nombre,"",mail,"","",area,tel,1,provincia,localidad,"",direccion,"",cuit,pass_actual);

																}else{
																	// si ingresa nueva pass, valida que los datos sean iguales y luego actualiza la pass
																	if(pass===repass){
																		$("#nueva_pass").css("border-color", "#0DC143");
																		$("#error_nueva_pass").append("");

																		$("#pass_re").css("border-color", "#0DC143");
																		$("#error_pass_re").append("");

																		actualizar_datos(
		nombre,"",mail,"","",area,tel,1,provincia,localidad,"",direccion,"",cuit,pass);
																	}else{
																		$("#nueva_pass").css("border-color", "#D80000");
																		$("#error_nueva_pass").append("(estos datos tienen que ser coincidentes)");

																		$("#pass_re").css("border-color", "#D80000");
																		$("#error_pass_re").append("(estos datos tienen que ser coincidentes)");
																	}
																}
															}
														
													}
												
											}else{
												alert("seleccione localidad");
											}
										}else{
											alert("seleccione provincia");
										}
									}
								}
							
						
						
					}else{
						$("#mail").css("border-color", "#D80000");
						$("#error_mail").append("(el correo ingresado no es correcto.ej: jose@gmail.com)");
					}
				}
			
		}
    }



	// luego de cargar la pagina

    $( document ).ready(function() {
    	var valor_provincia=<?php echo $this->session->userdata("prov") ?>;

    	var valor_localidad=<?php
	    						if(is_null($this->session->userdata("loc"))){
	    							echo "'-'";
	    						}else{
	    							echo $this->session->userdata("loc");
	    						} 
    						?>;


    	//espero 4 segundos antes de setear el dato en el combo
    	setTimeout(function(){
    		
     		console.log(valor_provincia);
     		$("#prov option[value="+ valor_provincia +"]").attr("selected",true);

     		if(valor_localidad!=="-"){
     			$("#loc option[value="+ valor_localidad +"]").attr("selected",true);
     		}
     		

		},4000); 

    	generar_provincias("1");
        generar_localidades(valor_provincia);
     	
	});
	
</script>