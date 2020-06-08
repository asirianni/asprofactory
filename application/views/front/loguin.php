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
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url()?>"><b>As Pro </b>Factory</a>
  </div>
  <div class="overlay" id='refresh' style="display: none">
    <i class="fa fa-refresh fa-spin"></i> Espere...
  </div>  
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Ingrese sus datos</p>

      
      <label id="error_email"></label>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" id="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <label id="error_pas"></label>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" id="pass">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
            <button class="btn btn-primary btn-block btn-flat" onclick="ingresar()" id="boton_consultar">Ingresar</button>
        </div>
        
        <!-- /.col -->
      </div>
    

<!--    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>-->
    <!-- /.social-auth-links -->

    <a href="#">Olvide mis datos</a>
    <br>
    <br>
    <a href="<?php echo base_url()?>index.php/login/registro" class="text-center">Registrarme</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url()?>assets/template/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()?>assets/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url()?>assets/template/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
  function ingresar(){
    var correo=$("#email" ).val();
    var pass=$("#pass" ).val();
    var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
    if(correo===""){
        $('#error_email').html("INGRESE EMAIL");
        $("#email").css('border', '3px solid black');
    }else{
        if(pass===""){
            $('#error_pas').html("INGRESE PASS");
            $("#pass").css('border', '3px solid black');
        }else{
            
            if (!caract.test(correo)){
                $('#error_email').html("INGRESE UN CORREO ELECTRONICO CORRECTO. Con caracteres @ y .com .net .ar");
                $("#email").css('border', '3px solid black');
            }else{
                $('#error_pas').html("CORRECTO");
                $("#pass").css('border', '3px solid green');
                
                $('#error_email').html("CORRECTO");
                $("#email").css('border', '3px solid green');
                
                
                $("#boton_consultar").prop("disabled", true);
                $("#refresh").css("display", "block");
                setTimeout(function()
                {
                    $.ajax({
                        type: "POST",
                        async: false,
                        url: "<?php echo base_url()?>index.php/Login/ingresar",
                        data:{correo:correo,pass:pass},
                        beforeSend: function(event){},
                        success: function(data){
                            var obj = jQuery.parseJSON(data);
                             
                            console.log(obj.exito);
                            console.log(obj.mensaje_principal);
                            console.log(obj.usuario);
                            console.log(obj.error_usuario);
                            console.log(obj.pass);
                            console.log(obj.error_pass);
                            
                            if(obj.exito){
                                $('#error_pas').html("CORRECTO");
                                $("#pass").css('border', '3px solid green');

                                $('#error_email').html("CORRECTO");
                                $("#email").css('border', '3px solid green');
                                
                                location.href="<?php echo base_url()?>index.php/Negocio/mostrar_sucursales";
                                
                            }else{
                                if(!obj.usuario){
                                    $('#error_email').html("NO EXISTE EL USUARIO");
                                    $("#email").css('border', '3px solid black');
                                }
                                
                                if(!obj.pass){
                                    $('#error_pas').html("PASS INCORRECTA");
                                    $("#pass").css('border', '3px solid black');
                                }
                            }
                            
                            
                            
                            $("#boton_consultar").prop("disabled", false);
                            $("#refresh").css("display", "none");
                        },
                        error: function(event){}
                    });
                }, 2000);
            }
        }
        
    }
  }
</script>
</body>
</html>