<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $titulo["dato"];?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/template/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/template/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/template/dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/template/plugins/iCheck/square/blue.css">
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <!-- Google recaptcha -->
        <script src='https://www.google.com/recaptcha/api.js?render=<?php echo $you_recaptcha_site_key;?>'></script>
        <script>
            grecaptcha.ready(function() {
              grecaptcha.execute('<?php echo $you_recaptcha_site_key;?>', {action: 'action_name'})
                  .then(function(token) {
                      var recaptchaResponse = document.getElementById('recaptchaResponse');
                      recaptchaResponse.value = token;
                  });
              });
        </script>
        <style>
            #lista_localidades{
                list-style:none;
                font-size: 12px;
                padding-left: 5px;
            }
            
            li:hover {
                background: #FFFFFF;
            }
            
        </style>
    </head>
    <body class="hold-transition login-page">
        
        
        <div class="col-md-12">
            <div class="login-box">
                <div class="login-box-body" id="validador_correo">
                  <div class="login-logo">
                        <a href="<?php echo base_url()?>"><b>As Pro </b>Factory</a>
                  </div>  
                  <p class="login-box-msg">Ingrese su correo</p>
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="Email" id="correo_ingresado">
                      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                          <a class="btn btn-warning btn-block btn-flat" href="<?php echo base_url()?>index.php/login" class="text-center"> << Volver</a>
                      </div>
                      <div class="col-md-6">
                          
                          <button class="btn btn-primary btn-block btn-flat" onclick="verificar_correo()" id="boton_consultar">Consultar >> </button>
                      </div>
                        
                    </div>
                  <div class="overlay" id='refresh' style="display: none">
                    <i class="fa fa-refresh fa-spin"></i> Espere...
                  </div>
                </div>
            </div>
            <div class="login-box-body" id="carga_datos">
                <div class="login-logo">
                    <a href="<?php echo base_url()?>"><b>As Pro </b>Factory</a>
                </div> 
                <p class="login-box-msg">Ingrese sus datos</p>
                <div class="row">
                    
                        <div class="col-md-4">
                            
                            <div class="form-group has-feedback">
                                <input type="password" class="form-control" placeholder="Ingrese una Pass para su usuario" onchange="cambio(this, 'error_pass')" id='pass_usser'>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                <label id="error_pass"></label>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" class="form-control" placeholder="Repita la pass ingresada" onchange="cambio(this, 'error_pass_repite')" id='re_pass_usser'>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                <label id="error_pass_repite"></label>
                                
                            </div>
                            <div class="form-group has-feedback">
                              <input type="localidad" class="form-control" placeholder="Escriba su Localidad" id="id_localidad_usser">
                              <div id="suggesstion-box"></div>
                              <span class="glyphicon glyphicon-user form-control-feedback"></span>
                              <label id="error_localidad"></label>
                            </div>
                            
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Nombre" onchange="cambio(this, 'error_nombre')" id="nombre_usser">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <label id="error_nombre"></label>
                            </div>
                            <div class="form-group has-feedback">
                              <input type="text" class="form-control" placeholder="Apellido" onchange="cambio(this, 'error_apellido')" id='apellido_usser'>
                              <span class="glyphicon glyphicon-user form-control-feedback"></span>
                              <label id="error_apellido"></label>
                            </div>
                            <div class="form-group has-feedback">
                              <input type="number" class="form-control" placeholder="Telefono" onchange="cambio(this, 'error_telefono')" id='telefono_usser'>
                              <span class="glyphicon glyphicon-user form-control-feedback"></span>
                              <label id="error_telefono"></label>
                            </div>

                        </div>    
                        <div class="col-md-4">
                            
                            
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" id="cheq_terminos"/> Acepto los <a href="#" onclick="abrir_terminos_condiciones_modal()">terminos </a> y condiciones
                                </label>
                                
                            </div>
                             
                            
                            <label id="error_terminos"></label>
                            <br>
                            <button class="btn btn-primary btn-block btn-flat" onclick="registrar()" id="boton_registrar">Registrar</button>
                            <form action="<?php echo base_url()?>index.php/Login/registro_usuario" method="POST" id="formulario_envio">
                                <input type="hidden" name="correo" id="correo_id_hiden">
                                <input type="hidden" name="pass" id="pass_hiden">
                                <input type="hidden" name="localidad" id="localidad_hiden">
                                <input type="hidden" name="nombre" id="nombre_hiden">
                                <input type="hidden" name="apellido" id="apellido_hiden">
                                <input type="hidden" name="telefono" id="telefono_hiden">
                                <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                            </form>
                        </div>

                </div>
                <br>
                <br>
                <a href="<?php echo base_url()?>index.php/login" class="text-center">Volver</a>
            </div>
           
        </div>
        
        <div class="modal modal-danger fade" id="modal-danger">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="texto_titulo_modal"></h4>
              </div>
              <div class="modal-body">
                <p id="texto_body_modal"></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        
        <div class="modal modal-primary fade" id="modal-terminos">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="texto_titulo_modal">Terminos y condiciones de uso del portal</h4>
              </div>
              <div class="modal-body">
                  <p id="texto_body_modal">
                      <?php
                        echo "<ul>";
                            foreach ($terminos as $t) {
                                echo "<li>";
                                echo $t["termino"];
                                echo "</li>";
                                
                            }
                        echo "</ul>";  
                      ?>
                     
                  </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        
        

        <!-- jQuery 3 -->
        <script src="<?php echo base_url()?>assets/template/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo base_url()?>assets/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url()?>assets/template/plugins/iCheck/icheck.min.js"></script>
        
        <script>
            var correo_electronico_cargado="";
            var localidad_seleccionada=0;
            $( document ).ready(function() {
                $("#validador_correo").css("display", "block");
                $("#carga_datos").css("display", "none");
                
                $("#id_localidad_usser").keyup(function(){
                    
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url()?>index.php/Login/get_localidad",
                        data:'keyword='+$(this).val(),
                        beforeSend: function(){
                                $("#id_localidad_usser").css("background","");
                        },
                        success: function(data){   
                            $("#suggesstion-box").html(data);
                            $("#suggesstion-box").css("background","#D2D6DE");
                            $("#suggesstion-box").show();
                        }
                    });
                });  
                 
                  
            });
            
            function agregar_localidad(codigo, val) {
                localidad_seleccionada=codigo;
                $("#id_localidad_usser").val(val);
                $("#suggesstion-box").hide();
            }
          
            $(function () {
                $('input').iCheck({
                  checkboxClass: 'icheckbox_square-blue',
                  radioClass: 'iradio_square-blue',
                  increaseArea: '20%' /* optional */
                });
            });
          
            function verificar_correo(){
                var correo=$("#correo_ingresado" ).val();
                var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
                if(correo===""){
                    texto_modal("CAMPO VACIO","INGRESE UN CORREO ELECTRONICO PARA VERIFICAR SI YA EXISTE");
                }else{
                    if (! caract.test(correo)){
                        texto_modal("CORREO INVALIDO","INGRESE UN CORREO ELECTRONICO CORRECTO. Con caracteres @ y .com .net .ar");

                    }else{
                        $("#correo_ingresado").prop("disabled", true);
                        $("#boton_consultar").prop("disabled", true);
                        $("#refresh").css("display", "block");
                        setTimeout(function()
                        {
                            $.ajax({
                                type: "POST",
                                async: false,
                                url: "<?php echo base_url()?>index.php/Login/get_usuario",
                                data:{correo:correo},
                                beforeSend: function(event){},
                                success: function(data){
//                                    alert(data);
                                    if(data){
                                        texto_modal("USUARIO EXISTENTE","EL USUARIO INGRESADO YA ESTA INGRESADO! APRETE 'VOLVER' PARA IR LOGUIN DE ACCESO.");
                                        $("#refresh").css("display", "none");
                                    }else{
                                        correo_electronico_cargado=correo;
                                        
                                        $("#validador_correo").css("display", "none");
                                        $("#carga_datos").css("display", "block");  
                                    };
                                },
                                error: function(event){}
                            });
                        }, 2000);
                    }
                }
            }

            function texto_modal(titulo,texto){
                $("#texto_titulo_modal").text(titulo);
                $("#texto_body_modal").text(texto);
                $("#modal-danger").modal('show');
            }
            
            function cambio(elemento,error){
                var error='#'+error;
                if ($(elemento).val() === "") {
                  $(elemento).css("background-color", "grey");
                  $(error).html( "complete este campo" );
                }
                else{
                  $(elemento).css("background-color", "green");
                  $(error).html( "campo completo" );
                }
                $("#suggesstion-box").hide();
            }
            
            function abrir_terminos_condiciones_modal(){
                $("#modal-terminos").modal('show');
            }
                        
            function registrar(){
                
                if ($("#cheq_terminos").is(":checked")) {
                    
                    
                    var pass=$("#pass_usser" ).val();
                    var pass_rep=$("#re_pass_usser" ).val();
                    var localidad=$("#id_localidad_usser" ).val();
                    var nombre=$("#nombre_usser" ).val();
                    var apellido=$("#apellido_usser" ).val();
                    var telefono=$("#telefono_usser" ).val();
                    
                    if(pass==""){
                        $("#pass_usser").css("background-color", "grey");
                        $("#error_pass").html( "complete este campo" );
                    }else{
                        if(pass_rep==""){
                            $("#re_pass_usser").css("background-color", "grey");
                            $("#error_pass_repite").html( "complete este campo" );
                        }else{
                            if(localidad==""){
                                $("#id_localidad_usser").css("background-color", "grey");
                                $("#error_localidad").html( "complete este campo" );
                            }else{
                                if(nombre==""){
                                    $("#nombre_usser").css("background-color", "grey");
                                    $("#error_nombre").html( "complete este campo" );
                                }else{
                                    if(apellido==""){
                                        $("#apellido_usser").css("background-color", "grey");
                                        $("#error_apellido").html( "complete este campo" );
                                    }else{
                                        if(telefono==""){
                                            $("#telefono_usser").css("background-color", "grey");
                                            $("#error_telefono").html( "complete este campo" );
                                        }else{
                                            if(localidad_seleccionada==0){
                                                $("#id_localidad_usser").css("background-color", "grey");
                                                $("#error_localidad").html( "complete este campo" );
                                            }else{
                                                if(pass!==pass_rep){
                                                    $("#pass_usser").css("background-color", "red");
                                                    $("#error_pass").html( "no coincidente" );
                                                    
                                                    $("#re_pass_usser").css("background-color", "red");
                                                    $("#error_pass_repite").html( "no coincidente" );
                                                }else{
                                                    $("#pass_usser").css("background-color", "blue");
                                                    $("#error_pass").html( "correcto" );
                                                    
                                                    $("#re_pass_usser").css("background-color", "blue");
                                                    $("#error_pass_repite").html( "correcto" );
                                                    $("#boton_registrar").attr("disabled", true);
                                                    
                                                    $("#correo_id_hiden" ).val(correo_electronico_cargado);
                                                    $("#pass_hiden" ).val(pass);
                                                    $("#localidad_hiden" ).val(localidad_seleccionada);
                                                    $("#nombre_hiden" ).val(nombre);
                                                    $("#apellido_hiden" ).val(apellido);
                                                    $("#telefono_hiden" ).val(telefono);
                                                    
                                                    
                                                    $( "#formulario_envio" ).submit();
                                                }
                                                 
                                            }
                                           
                                        }
                                    }
                                }
                            }
                        }
                    }
                    
                }else{
                     texto_modal("TERMINOS Y CONDICIONES","CONFIRME LA CASILLA DE ACEPTACION DE TERMINOS Y CONDICIONES");
                }

                
            }
          
        </script>
    </body>
</html>