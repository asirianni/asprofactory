<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CEDIP - Centro Medico Argentina</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>recursos/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>recursos/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>recursos/dist/css/skins/_all-skins.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>recursos/css/chosen.min.css">
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>recursos/img/pagina/favicon.ico"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>recursos/css/jquery.datetimepicker.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>recursos/css/bootstrap-table.css"/>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
    .sinpadding
    {   
        padding-right: 0px;
        padding-left: 0px;
    }
    
    .suggest-element{
    margin-left:5px !important;
    margin-top:5px !important;
    width:350px !important;
    cursor:pointer !important;
    }
    #segerencia-paciente{
    width:350px;
    height:150px;
    overflow: auto;
    }
    #intro .zelect {
      display: inline-block;
      background-color: white;
      min-width: 100%;
      cursor: pointer;
      line-height: 36px;
      border: 1px solid #dbdece;
      border-radius: 6px;
      position: relative;
    }
    #intro .zelected {
      font-weight: bold;
      padding-left: 10px;
    }
    #intro .zelected.placeholder {
      color: #999f82;
    }
    #intro .zelected:hover {
      border-color: #c0c4ab;
      box-shadow: inset 0px 5px 8px -6px #dbdece;
    }
    #intro .zelect.open {
      border-bottom-left-radius: 0;
      border-bottom-right-radius: 0;
    }
    #intro .dropdown {
      background-color: white;
      border-bottom-left-radius: 5px;
      border-bottom-right-radius: 5px;
      border: 1px solid #dbdece;
      border-top: none;
      position: absolute;
      left:-1px;
      right:-1px;
      top: 36px;
      z-index: 2;
      padding: 3px 5px 3px 3px;
    }
    #intro .dropdown input {
      font-family: sans-serif;
      outline: none;
      font-size: 14px;
      border-radius: 4px;
      border: 1px solid #dbdece;
      box-sizing: border-box;
      width: 100%;
      padding: 7px 0 7px 10px;
    }
    #intro .dropdown ol {
      padding: 0;
      margin: 3px 0 0 0;
      list-style-type: none;
      max-height: 150px;
      overflow-y: scroll;
    }
    #intro .dropdown li {
      padding-left: 10px;
    }
    #intro .dropdown li.current {
      background-color: #e9ebe1;
    }
    #intro .dropdown .no-results {
      margin-left: 10px;
    }
    </style>
    
    <script src="<?php echo base_url(); ?>recursos/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>recursos/js/imagezoom.js"></script>
    <script src="<?php echo base_url(); ?>recursos/js/zelect.js"></script>
    
    <script>
    
  </script>
    
</head>
<body class="hold-transition skin-green-light sidebar-mini">
<div class="wrapper">

  <?php echo $cabecera;?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
      <?php echo $menu;?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $seccion;?>
        <!--<small>Optional description</small>-->
      </h1>
      <!--<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>-->
    </section>-

    <!-- Main content -->
    <section class="content">
        <?php echo $detalle;?>
    </section>
    <!-- /.content -->
  </div>

  

  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Version 1.0.0 
    </div>
    <!-- Default to the left -->
    <strong>desarrollo <a href="http://www.alessoweb.com">alessoweb.com</a></strong>.
  </footer>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<!--  <div class="control-sidebar-bg">
     <?php //echo $config ?> 
      
  </div>-->
  <aside class="control-sidebar control-sidebar-dark">
    <?php echo $config ?>
  </aside>
</div>
<!-- ./wrapper -->

    <!-- BEGIN MODAL 'S-->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="box">
                        <div class="box-header">
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" id="cuerpo-modal">
                          
                        </div>
                  <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-editar-imagen-datos-home" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="box">
                        <div class="box-header">
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" id="cuerpo-editar-imagen-datos-home" style="background-color: #ccc;">
                            <form role='form' action='<?php echo base_url()?>index.php/Administrador/actualizar_imagen_dato_home' class='form' enctype='multipart/form-data' method='post' accept-charset='utf-8'>
                                    <input type="text" id="codigo_imagen_dato_home_actualizar" name="codigo_imagen_dato_home_actualizar" hidden="true"/>
                                    
                                    <div class='row'>
                                            <div class="col-md-12">
                                                    <div style="text-align: center;">
                                                            <img src="imagen" id="imagen_actual_dato_home" width="200"/>
                                                    </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div style="text-align: center;margin-top: 40px;">
                                                    <input type='file' id='imagen_actualizar_dato_home' name='imagen_actualizar_dato_home'/>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                    <div style="text-align: center; margin-top: 30px;">
                                                            <input type="submit" class="btn btn-success" value="Actualizar"/>
                                                    </div>
                                            </div>
                                    </div>
                            </form>
                        </div>
                  <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-editar-texto-datos-home" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="box">
                        <div class="box-header">
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" id="cuerpo-editar-texto-datos-home">
                            <form method="post" action="<?php echo base_url()?>index.php/Administrador/actualizar_texto_dato_home">
                                    <input type="text" id="codigo_texto_dato_home_actualizar" name="codigo_texto_dato_home_actualizar" hidden="true"/>
                                    <div class='row'>
                                            <div class="col-md-12">
                                                    <div style="text-align: center; margin-top: 10px;"><label for="desripcion_dato_home_actualizar">Descripcion</label></div>
                                                    <div style="text-align: center; margin-top: 10px;">
                                                    <textarea name="descripcion_dato_home_actualizar" id="descripcion_dato_home_actualizar" cols="30" rows="10">

                                                    </textarea>
                                                    </div>
                                            </div>
                                            <div class="col-md-12">
                                                    <div style="text-align: center; margin-top: 10px;">
                                                            <input type="submit" class="btn btn-success" value="Actualizar"/>
                                                    </div>
                                            </div>
                                    </div>
                            </form>
                        </div>
                  <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- Main Footer -->
    
<!-- FIN MODAL-->
    
    <!--END MODAL's-->
    
    <!-- Core Scripts - Include with every page -->
    
    <script src="<?php echo base_url(); ?>recursos/plugins/bootstrap/bootstrap.min.js"></script>
    
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>recursos/dist/js/app.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>recursos/dashboard/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>recursos/dashboard/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>recursos/js/bootstrap-table.js"></script>
    <script src="<?php echo base_url(); ?>recursos/js/chosen.jquery.min.js"></script>
    
    <script src="<?php echo base_url(); ?>recursos/js/jquery.datetimepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src="<?php echo base_url(); ?>recursos/dashboard/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="<?php echo base_url(); ?>recursos/dashboard/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <!--<script src="<?php echo base_url(); ?>recursos/dashboard/plugins/timepicker/bootstrap-timepicker.min.js"></script>-->
    <script src="<?php echo base_url(); ?>recursos/js/jquery.datetimepicker.js"></script>
   <script>
    var anio =null;
    var numero_profesional = null;
    var calendario = null;
    var especialidad=null;
    
    $(document).ready(function()
    {
        
	var meses = new Array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
        
        var fecha_actual = new Date();
        
        var mes_actual = fecha_actual.getMonth()+1;
        var dia_actual = fecha_actual.getDate();
        var anio_actual = fecha_actual.getFullYear();
        
        
        
        
        var html="";
        
        html+="<option value='"+anio_actual+"' selected>"+anio_actual+"</option>";
        html+="<option value='"+(anio_actual+1)+"'>"+(anio_actual+1)+"</option>";
        $("#anio_turnero").html(html);
        
        html="";
        
        for(var i=0; i < meses.length;i++)
        {
           var leyendo = i+1;
           
           if(leyendo == mes_actual)
           {
            html+="<option value='"+(i+1)+"' selected>"+meses[i]+"</option>";
           }
           else
           {
             html+="<option value='"+(i+1)+"'>"+meses[i]+"</option>";  
           }
            
        }
        
        $("#mes_turnero").html(html);

	calendario = new MarioOliveraCalendar(meses,mes_actual,"calendario","calendario_botonera","calendario_mes");	
	calendario.setMesActual(mes_actual);
        calendario.actualiza_mes(null);
        
        
        $("#especialidad_turnero").change(function(){
            cargarProfesionalesPorEspecialidad();
        });
        
        $("#btn_ver_turno").click(function(){
            mostrar_calendario();
        });
        
        
        $('.chosen-select').chosen({no_results_text: 'Oops, nothing found!'}); 

   });
       
        
    
        
		
                function mes_siguiente(id)
		{
			if(id="calendario")
			{
				calendario.mes_siguiente();
			}
		}
		function mes_anterior(id)
		{
			if(id="calendario")
			{
				calendario.mes_anterior();
			}
		}

		

		function MarioOliveraCalendar(meses,mes_actual,id_calendario,id_botonera,id_nombre)
		{
			// PROPIEDADES
			this.meses = meses;
			this.mes_actual=mes_actual;
			this.id_calendario=id_calendario;
			this.id_botonera=id_botonera;
			this.id_nombre=id_nombre;

			// METODOS
			this.actualiza_mes = actualiza_mes;
			this.construye_calendario =construye_calendario;
			this.mostrar_seleccion=mostrar_seleccion;
			this.mes_siguiente=mes_siguiente;
			this.mes_anterior=mes_anterior;
			this.mostrar_seleccion=mostrar_seleccion;
                        this.setMesActual=setMesActual;
                        
                        function setMesActual(mes)
                        {
                            this.mes_actual = mes;
                        }
			function actualiza_mes(data)
			{
				// ENERO MARZO MAYO JULIO AGOSTO OCTUBRE DICIEMBRE -- 31 dias
				if( this.mes_actual == 1 || this.mes_actual == 3 || this.mes_actual == 5 || this.mes_actual == 7 || 
					this.mes_actual == 8 || this.mes_actual == 10 || this.mes_actual==12)
				{
					this.construye_calendario(31,data);
						
				}
				else if(this.mes_actual == 2)
				{
					this.construye_calendario(29,data);
				}
				else
				{
					this.construye_calendario(30,data);
				}
                                
                                var nombres_dias;
                                
                                switch(this.mes_actual)
                                {
                                    case 1:nombres_dias="<div class='col-md-11'>\n\
                                                            <div class='col-md-2'>Lunes</div>\n\
                                                        </div>";
                                        break;
                                    case 2:
                                        break;
                                    case 3:
                                        break;
                                    case 4:
                                        break;
                                    case 5:
                                        break;
                                    case 6:
                                        break;
                                    case 7:
                                        break;
                                    case 8:
                                        break;
                                    case 9:
                                        break;
                                    case 10:
                                        break;
                                    case 11:
                                        break;
                                    case 12:
                                        break;
                                }
                                
                                $("#"+this.id_calendario+"nombres_dia").html(nombres_dias);
			}

			function construye_calendario(cantidad_dias,data)
			{
                            var fecha = new Date("2016/"+this.mes_actual+"/01");
                            var numero_dia = fecha.getDay();
                            
                            var contador= fecha.getDay();
                            
                            var dias= new Array("","L","Ma","Mi","J","V","S","D");
                            
                            $("#nombres_dia").html("");
                            
                            for(var i=0; i < 7;i++)
                            {
                                
                                if(i == 6)
                                {
                                    $("#nombresdia1").html("<div class='col-md-12 col-sm-12 col-xs-12' style='padding: 0;'><input type='button' class='btn btn-warning form-control' value='"+dias[contador]+"'/></div>");
                                }
                                else
                                {
                                    $("#nombres_dia").append("<div class='col-md-2 col-sm-2 col-xs-2' style='padding: 0;'><input type='button' class='btn btn-warning form-control' value='"+dias[contador]+"'/></div>")
                                }
                                
                                if((contador+1) <= 7)
                                {
                                    contador++;
                                }
                                else
                                {
                                    contador=1;
                                }
                            }
                            
                            if(data != null)
                            {
				$("#"+this.id_nombre).text(this.meses[this.mes_actual-1]);
                                        
                                        
                                        var dias = new Array();
                                        
                                        for(var i=0; i < data.length;i++)
                                        {
                                            fecha = new Date(data[i]["fecha"]);
                                            var dia = fecha.getDate();
                                            
                                            dias[dia+1]=dia+1;
                                        }
                                        
					var html ="";
                                        var html_2="";
                                        
                                        var numero_dia = 1;
					for(var i=1; i <= cantidad_dias;i++)
					{
                                            
                                            if(numero_dia < 7)
                                            {
                                                if(dias[i] != undefined)
                                                {
                                                    html+="<div class='col-md-2 col-sm-2 col-xs-2 sinpadding'>";
                                                    html+="		<input type='button' class='btn btn-danger form-control' onClick='getHorariosDia("+i+","+this.mes_actual+",&#039;"+this.id_calendario+"&#039;)' value='"+i+"'/>";
                                                    html+="</div>";
                                                }   
                                                else
                                                {
                                                    html+="<div class='col-md-2 col-sm-2 col-xs-2 sinpadding'>";
                                                    html+="		<input type='button' class='btn btn-default form-control' onClick='getHorariosDia("+i+","+this.mes_actual+",&#039;"+this.id_calendario+"&#039;)' value='"+i+"'/>";
                                                    html+="</div>";
                                                }
                                                numero_dia++;
                                            }
                                            else
                                            {
                                                numero_dia=1;
                                                
                                                if(dias[i] != undefined)
                                                {
                                                    html_2+="<div class='col-md-12 col-sm-12 col-xs-12 sinpadding'>";
                                                    html_2+="		<input type='button' class='btn btn-danger form-control' onClick='getHorariosDia("+i+","+this.mes_actual+",&#039;"+this.id_calendario+"&#039;)' value='"+i+"'/>";
                                                    html_2+="</div>";
                                                }   
                                                else
                                                {
                                                    html_2+="<div class='col-md-12 col-sm-12 col-xs-12 sinpadding'>";
                                                    html_2+="		<input type='button' class='btn btn-default form-control' onClick='getHorariosDia("+i+","+this.mes_actual+",&#039;"+this.id_calendario+"&#039;)' value='"+i+"'/>";
                                                    html_2+="</div>";
                                                }
                                            }
                                                
					}
                                        
                                       
					$("#"+this.id_botonera).html(html);
                                        $("#"+this.id_botonera+"_dos").html(html_2);
                            }
                            
			}

			function mes_siguiente()
			{
				if(this.mes_actual+1 <= 12)
				{
					this.mes_actual= this.mes_actual+1;
				}
				else
				{
					this.mes_actual=1;
				}
				this.actualiza_mes();
			}

			function mes_anterior()
			{
				if(this.mes_actual-1 >= 1)
				{
					this.mes_actual-=1;
				}
				else
				{
					this.mes_actual=12;
				}
				this.actualiza_mes();
			}

			function mostrar_seleccion(dia,mes,id)
			{
				alert(dia+" DEL "+mes+" ELEMENTO: "+id);
			}
		}
        
    function mostrar_calendario()
    {
        if(document.getElementById('especialidad_turnero').value != "nada")
            {
                if(document.getElementById('profesional_turnero').value != "nada")
                {
                    especialidad = document.getElementById('especialidad_turnero').value;
                    numero_profesional = document.getElementById('profesional_turnero').value;
                    var mes = document.getElementById('mes_turnero').value;
                    anio = document.getElementById('anio_turnero').value;
                    
                    $.ajax
                    ({
                        type:'POST',
                        url: "<?php echo base_url();?>index.php/Secretaria/getTurnosPorProfesionalEspecialidadMesAnio",
                        data:{profesional:numero_profesional,especialidad:especialidad,mes:mes,anio:anio},
                        
                        beforeSend: function(event){},
                        
                        success: function(data)
                        {
                            data = JSON.parse(data);
                            
                            calendario.setMesActual(mes);
                            calendario.actualiza_mes(data);
                            
                        },
                        error: function(event){
                            alert("ERROR");
                        },
                    });
                }
                else
                {
                    alert2("<img src='<?php echo base_url()?>recursos/img/pagina/peligro.png' width='50'/>  <p style='text-align: center;'>SELECCIONE UNA PROFESIONAL</p>");
                }
            }
            else
            {
                alert2("<img src='<?php echo base_url()?>recursos/img/pagina/peligro.png' width='50'/>  <p style='text-align: center;'>SELECCIONE UNA ESPECIALIDAD</p>");
            }
            
            $("#div_calendario").removeAttr("hidden");
            $("#muestra_turnos_hoy").attr("hidden","true");
    }
    function cargarProfesionalesPorEspecialidad()
    {
        var especialidad = document.getElementById('especialidad_turnero').value;
        
        $.post("<?php echo base_url()?>index.php/Secretaria/getProfesionalesPorEspecialidad",
        {especialidad:especialidad},
        function(data)
        {
            var html="<option value='nada'>Seleccione</option>";
            
            $("#profesional_turnero").html(html);
            $("#profesional_turnero").attr("disabled","disabled");
            
            for(var i=0;i< data.length;i++)
            {
                html+="<option value='"+data[i]["codigo"]+"'>"+data[i]["nombre"]+" "+data[i]["apellido"]+"</option>";
            }
            
            $("#profesional_turnero").html(html);
            $("#profesional_turnero").removeAttr("disabled");
        },"json");
    }
    
  
    function alert2(mensaje)
    {
        $("#modal").modal("show");
        $("#cuerpo-modal").html(mensaje);
    }
    
    function optionsFormatterEspecialidadProfesional(value, row, index) {
        return [        
            '<a class="btn btn-success" href="#" onclick = "administrar_especialidad_profesional('+row.codigo+')";>',
                'Administrar',
            '</a>'  
        ].join('');
        //document.getElementById("cerrar_id").click();
        //document.getElementById("alerta_id").click();
    };
    
    function optionsFormatterDatosHome(value, row, index) {
        return [        
            '<a class="btn btn-success" href="#" onclick = "administrar_dato_home('+row.codigo+',&#034;'+row.formato+'&#034;)";>',
                'Administrar',
            '</a>'  
        ].join('');
        //document.getElementById("cerrar_id").click();
        //document.getElementById("alerta_id").click();
    };
    
    function optionsFormatterVerTurno(value, row, index) {
        return [        
            '<a class="btn btn-success" href="#" onclick = "administrar_turno('+row.codigo+')";>',
                'ver',
            '</a>'  
        ].join('');
        //document.getElementById("cerrar_id").click();
        //document.getElementById("alerta_id").click();
    };
    
    function optionsFormatterVerRegistroHistoriaClinica(value, row, index) {
        return [        
            '<a class="btn btn-success" href="#" onclick = "render_editar_historia_clinica('+row.codigo+','+row.dni_paciente+')";>',
                'edit',
            '</a>'  
        ].join('');
        //document.getElementById("cerrar_id").click();
        //document.getElementById("alerta_id").click();
    };
    
    function administrar_especialidad_profesional(codigo_profesional)
    {
        $.post("<?php echo base_url()?>index.php/Administrador/administrar_especialidades_profesional",
        {codigo:codigo_profesional},
        function(data)
        {
            $("#cuerpo-modal").html(data);
            $("#modal").modal("show");
        },"json"
                );
    }
    
    function agregar_especialidad_profesional(profesional,codigo_especialidad)
    {
        $.post("<?php echo base_url()?>index.php/Administrador/agregar_especialidad_profesional",
        {profesional:profesional,especialidad:codigo_especialidad},
        function(data)
        {
            $("#cuerpo-modal").html("");
            $("#modal").modal("hide");
            
            if(data)
            {
                alert("Especialidad agregada");
            }
            else
            {
                alert("No se pudo agregar la especialidad");
            }
        },"JSON");
    }
    
    function borrar_especialidad_profesional(profesional,especialidad)
    {
        
       $.post("<?php echo base_url()?>index.php/Administrador/borrar_especialidad_profesional",
        {profesional:profesional,especialidad:especialidad},
        function(data)
        {
            $("#cuerpo-modal").html("");
            $("#modal").modal("hide");
            
            if(data)
            {
                alert("Especialidad borrada con exito");
            }
            else
            {
                alert("No se pudo borrar la especialidad");
            }
        },"JSON"); 
    }
    
    function inicializarTurnosHoy()
    {
       $.ajax({
           type:"POST",
           url: "<?php echo base_url()?>index.php/Secretaria/getTurnosHoyLista",
           data:{},
           
           beforeSend: function(event){},
           success: function(data){
               data = JSON.parse(data);
               $("#muestra_turnos_hoy").removeAttr("hidden");
              
               var html ="<thead><th>Profesional</th><th>Paciente</th><th>Hora desde</th><th>Hora hasta</th><th>Tiempo turno</th></thead>";
               
               for(var i=0; i < data.length;i++)
               {
                   //html+="<tr><td>"+data[i]["nombre_profesional"]+" "+data[i]["apellido_profesional"]+"</td><td>"+data[i]["nombre"]+" "+data[i]["apellido"]+"</td><td>"+data[i]["hora_desde"]+"</td><td>"+data[i]["hora_hasta"]+"</td><td>"+data[i]["estado"]+"</td></tr>";
                   html+="<tr><td>"+data[i]["apellido_profesional"]+"</td><td>"+data[i]["apellido"]+"</td><td>"+data[i]["hora_desde"]+"</td><td>"+data[i]["hora_hasta"]+"</td><td>"+data[i]["estado"]+"</td></tr>";
               }
               
               $("#lista_turnos_hoy").html(html);
           },
           errror: function(event){},
       });
    }
    
    function getHorariosDia(dia,mes,id)
    {
        var date = anio+"-"+mes+"-"+dia;
        fecha = new Date(date);
        
        var dia_nombre = null;
        
      
       $.ajax({
           type:"POST",
           url: "<?php echo base_url()?>index.php/Secretaria/getHorariosDia",
           data:{numero_dia:dia_nombre,fecha:date,profesional:numero_profesional,anio:anio,mes:mes,dia:dia},
           
           beforeSend: function(event){},
           success: function(data){
               data =JSON.parse(data);
               
               $("#cuerpo-modal").html(data);
               $("#modal").modal("show");
           },
           error: function(event){alert2("Error no se pudo inicializar los horarios de el dia seleccionado")},
       });
    }
    
    function mostrar_turnos_hoy()
    {
        $("#div_calendario").attr("hidden","true");
        $("#muestra_turnos_hoy").removeAttr("hidden");
    }
    
    function render_agregar_turno(codigo_horario,anio,mes,dia,profesional,hora_desde,hora_hasta,nombre,apellido)
    {
        var fecha = anio+"-"+mes+"-"+dia;
        $.ajax({
           type:"POST",
           url: "<?php echo base_url()?>index.php/Secretaria/htmlRegistrarTurno",
           data:{profesional:profesional,fecha:fecha,hora_desde:hora_desde,hora_hasta:hora_hasta,nombre:nombre,apellido:apellido},
           
           beforeSend: function(event){},
           success: function(data){
               data = JSON.parse(data);
               
               $("#cuerpo-modal").html(data);
               $("#modal").modal("show");
           },
           errror: function(event){},
       });
    }
    
    
    function administrar_turno(codigo_turno)
    {
        $.ajax({
           type:"POST",
           url: "<?php echo base_url()?>index.php/Secretaria/htmlAdministrarTurno",
           data:{codigo:codigo_turno},
           
           beforeSend: function(event){},
           success: function(data){
               data = JSON.parse(data);
               
               
               $("#cuerpo-modal").html(data);
               $("#modal").modal("show");
               
           },
           error: function(event){alert("Error");},
       });
        
    }
    
    function actualizar_turno()
    {
        var codigo = document.getElementById('codigo_actualizar_turno').value;
        var profesional = document.getElementById('profesional_actualizar_turno').value;
        var fecha = document.getElementById('fecha_actualizar_turno').value;
        var hora_desde = document.getElementById('hora_desde_actualizar_turno').value;
        var hora_hasta = document.getElementById('hora_hasta_actualizar_turno').value;
        var paciente = document.getElementById('paciente_actualizar_turno').value;
        var estado = document.getElementById('estado_actualizar_turno').value;
        var especialidad2 = document.getElementById('especialidad_actualizar_turno').value;
        
        if(!isNaN(paciente))
        {
            $.ajax({
               type:"POST",
               url: "<?php echo base_url()?>index.php/Secretaria/actualizar_turno",
               data:{codigo:codigo,profesional:profesional,fecha:fecha,hora_desde:hora_desde,hora_hasta:hora_hasta,paciente:paciente,estado:estado,especialidad:especialidad2},

               beforeSend: function(event){},
               success: function(data){
                   data = JSON.parse(data);

                   if(data == "Turno actualizado correctamente")
                   {
                        alert(data);
                        //sincroniza_con_historias_clinicas(codigo,estado);
                        $("#cuerpo-modal").html("");
                        $("#modal").modal("hide");  
                        
                   }
                   else
                   {
                       alert(data);
                   }

               },
               errror: function(event){},
           });
        }
        else
        {
            alert("DNI no valido");
        }
        
    }
    
    function borrar_turno()
    {
        var codigo = document.getElementById('codigo_actualizar_turno').value;
        var profesional = document.getElementById('profesional_actualizar_turno').value;
        var fecha = document.getElementById('fecha_actualizar_turno').value;
        var hora_desde = document.getElementById('hora_desde_actualizar_turno').value;
        var hora_hasta = document.getElementById('hora_hasta_actualizar_turno').value;
        var paciente = document.getElementById('paciente_actualizar_turno').value;
        var estado = document.getElementById('estado_actualizar_turno').value;
        var especialidad2 = document.getElementById('especialidad_actualizar_turno').value;
        
        if(!isNaN(paciente))
        {
            $.ajax({
               type:"POST",
               url: "<?php echo base_url()?>index.php/Secretaria/borrar_turno",
               data:{codigo:codigo,profesional:profesional,fecha:fecha,hora_desde:hora_desde,hora_hasta:hora_hasta,paciente:paciente,estado:estado,especialidad:especialidad2},

               beforeSend: function(event){},
               success: function(data){
               data = JSON.parse(data);

                   if(data)
                   {;
                        alert("Turno borrado");
                        $("#cuerpo-modal").html("");
                        $("#modal").modal("hide");  
                        
                   }
                   else
                   {
                       alert("error al intentar borrar");
                   }

               },
               errror: function(event){},
           });
        }
        else
        {
            alert("DNI no valido");
        }
        
    }
    
    function sincroniza_con_historias_clinicas(codigo_turno,estado)
    {
        $.ajax({
               type:"POST",
               url: "<?php echo base_url()?>index.php/Secretaria/sincroniza_con_historias_clinicas",
               data:{codigo:codigo_turno,estado:estado},

               beforeSend: function(event){},
               success: function(data){
                   data = JSON.parse(data);
               },
               errror: function(event){alert("ERROR!")},
           });
    }
    
    function render_editar_historia_clinica(codigo_historia_clinica,dni)
    {
        $.ajax({
               type:"POST",
               url: "<?php echo base_url()?>index.php/Administrador/render_editar_historia_clinica",
               data:{codigo:codigo_historia_clinica,dni:dni},

               beforeSend: function(event){},
               success: function(data){
                   data = JSON.parse(data);
                   $("#cuerpo-modal").html(data);
                   $("#modal").modal("show");  
                   
               },
               error: function(event){alert("ERROR!")},
           });
    }
    
    function actualizar_historia_clinica(codigo)
    {
        
        var observaciones = $("#observaciones_actualizar_historia_clinica").val();
        var imagen1 = $("#imagen1_actualizar_historia_clinica").val();
        var imagen2 = $("#imagen2_actualizar_historia_clinica").val();
        var imagen3 = $("#imagen3_actualizar_historia_clinica").val();
        var imagen4 = $("#imagen4_actualizar_historia_clinica").val();
        
        alert(observaciones+" "+imagen1+" "+imagen2+" "+imagen3+" "+imagen4);
        $.ajax({
               type:"POST",
               url: "<?php echo base_url()?>index.php/Administrador/actualizar_historia_clinica",
               data:{codigo:codigo},

               beforeSend: function(event){},
               success: function(data){
                   data = JSON.parse(data);
                   alert(data); 
                   
               },
               errror: function(event){alert("ERROR!")},
           });
    }
    
    function administrar_dato_home(codigo,formato)
    {
            $.ajax({
               type:"POST",
               url: "<?php echo base_url()?>index.php/Administrador/getDatoHome",
               data:{codigo:codigo},

               beforeSend: function(event){},
               success: function(data){
                   
                    data = JSON.parse(data); 
                    
                    if(formato == "imagen")
                    {
                        var src= "<?php echo base_url()?>recursos/home/images/"+data[0]["descripcion"];
                        $("#codigo_imagen_dato_home_actualizar").val(codigo);
                        $("#imagen_actual_dato_home").attr("src",src);
                        $("#modal-editar-imagen-datos-home").modal("show");
                    }
                    else if(formato == "texto")
                    {
                        $("#codigo_texto_dato_home_actualizar").val(codigo);
                        $("#descripcion_dato_home_actualizar").html(data[0]["descripcion"]);
                        $("#modal-editar-texto-datos-home").modal("show");
                    }  
               },
               error: function(event){alert("ERROR!")},
           });
    }
    
    function listar_liquidacion_obras_sociales()
    {
        var fecha1 = $("#fecha_desde_liquidacion_obrassociales").val();
        var fecha2= $("#fecha_hasta_liquidacion_obrassociales").val();
        var obra_social = $("#select_obra_social_liquidacion").val();
        
        $("#fecha_desde_liquidacion_obrassociales").val(fecha1);
        $("#fecha_hasta_liquidacion_obrassociales").val(fecha2);
        
        $.ajax({
            type: "POST",
            url: "<?php echo base_url()?>index.php/administrador/getLiquidacionObraSocialEntreFechas",
            data: {fecha1:fecha1,fecha2:fecha2,obra_social:obra_social},
            
            beforeSend: function(e){},
            
            success: function(data)
            {
                data = JSON.parse(data);
                var html="";
                var total = 0;
                
                for(var i=0; i < data.length;i++)
                {
                  html+="<tr><td>"+data[i]["dni"]+"</td><td>"+data[i]["nombre"]+"</td><td>"+data[i]["apellido"]+"</td><td>"+data[i]["especialidad"]+"</td><td>"+data[i]["razon_social"]+"</td><td>"+data[i]["fecha"]+"</td><td>"+data[i]["precio"]+"</td></tr>";  
                  total+= parseFloat(data[i]["precio"]);
                }

                $("#tabla_liquidacion_obras_sociales").html(html);
                $("#total_liquidacion_obrassociales").html(total);
            },
            error: function(data){alert("ERROR!")},
        });
    }
    
    function imprimir_liquidacion_obras_sociales()
    {
        var fecha1 = $("#fecha_desde_liquidacion_obrassociales").val();
        var fecha2= $("#fecha_hasta_liquidacion_obrassociales").val();
        
        var obra_social = parseInt($("#select_obra_social_liquidacion").val());
        
        window.open("<?php echo base_url()?>index.php/Administrador/imprimir_reporte_liquidacion_obras_sociales/"+fecha1+"/"+fecha2+"/"+obra_social);
    }
    
    function optionsFormatterAdministrarTurno(value, row, index) {
        return [        
            '<button class="btn btn-success" href="#" onclick = "administrar_turno('+row.codigo+')";>',
                'confirmar ',
            '</button>'  
        ].join('');
        //document.getElementById("cerrar_id").click();
        //document.getElementById("alerta_id").click();
    };
    
     //CAMBIOS
    function optionsFormatterHistoriasClinicasPorPaciente(value, row, index) {
        return [        
            '<a class="btn btn-success" href="#" onclick = "administrar_historia_clinica_paciente('+row.dni+')";>',
                'Historia Clinica',
            '</a>'  
        ].join('');
    };
    
    //CAMBIOS
    function administrar_historia_clinica_paciente(dni)
    {
        $.ajax(
        {
            type: "POST",
            url: "<?php echo base_url()?>index.php/Secretaria/getHistoriasClinicasActivasPorPaciente",
            data: {dni:dni},
            
            beforeSend: function(event){},
            
            success: function(data)
            {
                var html="<table class='table table-bordered table-hover'>";
                data= JSON.parse(data);
                
                for(var i=0; i < data.length;i++)
                {
                    html+="<tr><td>"+data[i]["fecha"]+"</td><td>"+data[i]["profesional"]+"</td><td>"+data[i]["especialidad"]+"</td><td>"+data[i]["observaciones"]+"</td><td><button class='btn btn-success' onClick='render_editar_historia_clinica("+data[i]["codigo"]+","+data[i]["dni_paciente"]+")'>Ver</button></td></tr>";
                }
                html+="</table>";
                $("#tabla_historia_paciente").removeAttr("hidden");
                $("#tabla_historias_clinicas").attr("hidden","true");
                $("#cuerpo-tabla_historia_paciente").html(html);
            },
            
            error: function(event){},
        }
        );
    }
    
    function imprimir_ultimo_turno()
    {
        window.open("<?php echo base_url();?>index.php/Administrador/imprimir_ultimo_turno");
    }
    
    jQuery('.select-fecha').datetimepicker({
        lang:'es',
         i18n:{
          de:{
           months:[
            'Enero','Febrero','Märzo','Abril',
            'Mayo','Junio','Julio','Agosto',
            'Septiembre','Octubre','Noviembre','Diciembre',
           ],
           dayOfWeek:[
            "So.", "Mo", "Di", "Mi", 
            "Do", "Fr", "Sa.",
           ]
          }
         },
         timepicker:false,

         format:'Y-m-d'
    });
    
    function cargar_precio_registrar_turno()
    {
        var especialidad= $("#especialidad_registrar_turno").val();
        var obra_social= $("#tipo_atencion_turno").val();
        
        
        $.ajax({
            type: "POST",
            url: "<?php echo base_url()?>index.php/secretaria/getDatosNomencladorTurno",
            data: {especialidad:especialidad,obra_social:obra_social},
            
            beforeSend: function(e){},
            
            success: function(data)
            {
                data = JSON.parse(data);
                
                if(data == null)
                {
                    $("#precio_registrar_turno").val("No hay precio");
                }
                else
                {
                    $("#precio_registrar_turno").val(data["precio"]);
                }
                
                
            },
            error: function(data){alert("ERROR!")},
        });
    }
    
    function cambio_paciente_registrar_turno()
    {
        var paciente = $("#paciente_registrar_turno").val();
        
        $.ajax({
            type: "POST",
            url: "<?php echo base_url()?>index.php/secretaria/getObraSocialPaciente",
            data: {paciente:paciente},
            
            beforeSend: function(e){},
            
            success: function(data)
            {
                data = JSON.parse(data);
                
                var html= "<option value='1'>Particular</option>";
                
                if(data)
                {
                    html += "<option value='"+data["codigo"]+"'>"+data["razon_social"]+"</option>";
                } 
                
                $("#tipo_atencion_turno").html(html);
            },
            error: function(data){alert("ERROR!")},
        });
    }
    
    // AGREGADO 28/09
    
    function imprimir_turno()
    {
        var turno = $("#codigo_actualizar_turno").val();
        window.open("<?php echo base_url()?>index.php/Secretaria/imprimir_turno_registrado/"+turno);
        
        
    }
    
    function imprimir_ultimo_turno()
    {
        window.open("<?php echo base_url();?>index.php/Administrador/imprimir_ultimo_turno");
    }
    
    jQuery('.select-fecha').datetimepicker({
        lang:'es',
         i18n:{
          de:{
           months:[
            'Enero','Febrero','Märzo','Abril',
            'Mayo','Junio','Julio','Agosto',
            'Septiembre','Octubre','Noviembre','Diciembre',
           ],
           dayOfWeek:[
            "So.", "Mo", "Di", "Mi", 
            "Do", "Fr", "Sa.",
           ]
          }
         },
         timepicker:false,

         format:'Y-m-d'
    });
    
    function cargar_precio_registrar_turno()
    {
        var especialidad= $("#especialidad_registrar_turno").val();
        var obra_social= $("#tipo_atencion_turno").val();
        
        
        $.ajax({
            type: "POST",
            url: "<?php echo base_url()?>index.php/secretaria/getDatosNomencladorTurno",
            data: {especialidad:especialidad,obra_social:obra_social},
            
            beforeSend: function(e){},
            
            success: function(data)
            {
                data = JSON.parse(data);
                
                if(data == null)
                {
                    $("#precio_registrar_turno").val("No hay precio");
                }
                else
                {
                    $("#precio_registrar_turno").val(data["precio"]);
                }
                
                
            },
            error: function(data){alert("ERROR!")},
        });
    }
    
    function cambio_paciente_registrar_turno()
    {
        var paciente = $("#paciente_registrar_turno").val();
        
        $.ajax({
            type: "POST",
            url: "<?php echo base_url()?>index.php/secretaria/getObraSocialPaciente",
            data: {paciente:paciente},
            
            beforeSend: function(e){},
            
            success: function(data)
            {
                data = JSON.parse(data);
                
                var html= "<option value='1'>Particular</option>";
                
                if(data)
                {
                    html += "<option value='"+data["codigo"]+"'>"+data["razon_social"]+"</option>";
                } 
                
                $("#tipo_atencion_turno").html(html);
            },
            error: function(data){alert("ERROR!")},
        });
    }
    
    function registrar_turno()
    {
        var profesional = document.getElementById('profesional_registrar_turno').value;
        var fecha = document.getElementById('fecha_registrar_turno').value;
        var hora_desde = document.getElementById('hora_desde_registrar_turno').value;
        var hora_hasta = document.getElementById('hora_hasta_registrar_turno').value;
        var paciente = document.getElementById('paciente_registrar_turno').value;
        var estado = document.getElementById('estado_registrar_turno').value;
        var especialidad2 = document.getElementById('especialidad_registrar_turno').value;
        var obra_social = document.getElementById('tipo_atencion_turno').value;
        
        //
        var precio = document.getElementById('precio_registrar_turno').value;
        var cobrado = "no";
        //
        
        if(!isNaN(paciente))
        {
            $.ajax({
               type:"POST",
               url: "<?php echo base_url()?>index.php/Secretaria/registrar_turno",
               data:{profesional:profesional,fecha:fecha,hora_desde:hora_desde,hora_hasta:hora_hasta,paciente:paciente,estado:estado,especialidad:especialidad2,precio:precio,cobrado:cobrado,obra_social:obra_social},

               beforeSend: function(event){},
               success: function(data){
                   data = JSON.parse(data);

                   if(data == "Turno agregado correctamente")
                   {
                        alert(data);  
                       
                        if (confirm("¿Desea imprimir el turno?")) {
                            imprimir_ultimo_turno();
                        }
                        //sincroniza_con_historias_clinicas(null,estado);
                        $("#cuerpo-modal").html("");
                        $("#modal").modal("hide");
                   }
                   else
                   {
                       alert(data);
                   }

               },
               errror: function(event){},
           });
        }
        else
        {
            alert("Dni no valido");
        }
        
    }
    
    function optionsFormatterCobrarTurno(value, row, index) {
        if(row.cobrado == "no")
        {
            return [        
                '<a class="btn btn-primary"  href="#" onclick = "cobrar_turno('+row.codigo+')";>',
                    'Cobrar',
                '</a>',
                '<a class="btn btn-success" href="#" onclick = "administrar_turno('+row.codigo+')";>',
                    'ver',
                '</a>'
            ].join('');
        }
        else
        {
            return [        
            '<a class="btn btn-success" href="#" onclick = "administrar_turno('+row.codigo+')";>',
                'ver',
            '</a>'  
        ].join('');
        }
    };
    
    function cobrar_turno(codigo)
    {
            $.ajax({
               type:"POST",
               url: "<?php echo base_url()?>index.php/Secretaria/cobrar_turno",
               data:{codigo:codigo},
               
               beforeSend: function(event){},
               success: function(data){
                   data = JSON.parse(data);

                   if(data)
                   {
                        alert("Turno cobrado");
                   }
                   else
                   {
                        alert("No se ha podido cobrar el turno");

                   }

               },
               error: function(event){alert("error");},
           }); 
    }
    
    
    //
    
    function mostrar_turnos_hoy()
    {
        $("#tabla_turnos_hoy_secretaria").removeAttr("hidden");
        $("#tabla_turnos_todos_secretaria").attr("hidden","true");
        $("#div_calendario").attr("hidden","true");
        $("#muestra_turnos_hoy").removeAttr("hidden");
        
    }
    
    function mostrar_turnos_todos()
    {
        $("#tabla_turnos_todos_secretaria").removeAttr("hidden");
        $("#tabla_turnos_hoy_secretaria").attr("hidden","true");
        $("#div_calendario").attr("hidden","true");
        //$("#muestra_turnos_todos").removeAttr("hidden");
        
    }
    
    function historico_turno()
    {
        $("#tabla_turnos_hoy_secretaria").attr("hidden","true");
        $("#tabla_historial_turnos_secretaria").removeAttr("hidden");
        $("#div_calendario").attr("hidden","true");
        $("#muestra_turnos_hoy").removeAttr("hidden");
        $("#muestra_turnos_finalizados").attr("hidden","true");
        $("#muestra_turnos_confirmados").attr("hidden","true");
    }
    
    function mostrar_confirmados()
    {
        $("#muestra_turnos_confirmados").removeAttr("hidden");
        $("#tabla_turnos_hoy_secretaria").attr("hidden","true");
        $("#tabla_historial_turnos_secretaria").attr("hidden","true");
        $("#div_calendario").attr("hidden","true");
        $("#muestra_turnos_finalizados").attr("hidden","true");
        
        $("#muestra_turnos_hoy").removeAttr("hidden");
    }
    
    
    
    function mostrar_finalizados()
    {
        $("#muestra_turnos_confirmados").attr("hidden","true");
        $("#tabla_turnos_hoy_secretaria").attr("hidden","true");
        $("#tabla_historial_turnos_secretaria").attr("hidden","true");
        $("#div_calendario").attr("hidden","true");
        $("#muestra_turnos_finalizados").removeAttr("hidden");
        
        $("#muestra_turnos_hoy").removeAttr("hidden");
    }
    
    ////////////
    
    function modal_movimiento_caja()
    {
        $("#myModalMovimientoCaja").modal("show");
    }
    
    //ejecuta la funcion para traer los datos de la caja
    function listar(){
        if(validarFecha()){
            location.href="<?php echo base_url()?>index.php/Secretaria/caja/"+document.getElementById('datepicker').value;
        }
    }
    
    function validarFecha(){
        var fecha=document.getElementById('datepicker').value;
        if(fecha===""){
            alert("Ingrese fecha de caja a consultar");
            return false;
        }else{
            return true;
        }
    }
    
     jQuery('#datepicker').datetimepicker({
        lang:'es',
         i18n:{
          de:{
           months:[
            'Enero','Febrero','Märzo','Abril',
            'Mayo','Junio','Julio','Agosto',
            'Septiembre','Octubre','Noviembre','Diciembre',
           ],
           dayOfWeek:[
            "So.", "Mo", "Di", "Mi", 
            "Do", "Fr", "Sa.",
           ]
          }
         },
         timepicker:false,

         format:'Y-m-d'
    });
    
    jQuery('.datepicker').datetimepicker({
        lang:'es',
         i18n:{
          de:{
           months:[
            'Enero','Febrero','Märzo','Abril',
            'Mayo','Junio','Julio','Agosto',
            'Septiembre','Octubre','Noviembre','Diciembre',
           ],
           dayOfWeek:[
            "So.", "Mo", "Di", "Mi", 
            "Do", "Fr", "Sa.",
           ]
          }
         },
         timepicker:false,

         format:'Y-m-d'
    });
    
    function generar_accion_registro(url, tipo_comp, num_comp){
        $.ajax({
          type: "POST",
          url: url,
          data: {
                tipo_comp: tipo_comp,
                num_comp: num_comp

          },

          beforeSend: function (event){
          },

          success: function (data) {
            $('#datos').empty().append(data);
            $("#myModalVerDetalle").modal("show");
          },

          error: function (event){

          },

        });  
    }
    
     // 09/10/2016
    function optionsFormatterHistoriasClinicas(value, row, index) {
        return [        
            '<a class="btn btn-success" href="#" onclick = "editar_historia_clinica('+row.codigo+')";>',
                'Editar',
            '</a>',
            ' <a class="btn btn-success" href="#" onclick = "reporte_historia_clinica('+row.codigo+')";>',
                'Informe',
            '</a>',
            ' <a class="btn btn-success" href="#" onclick = "eliminar_historia_clinica('+row.codigo+')";>',
                'Eliminar',
            '</a>',
            ' <a class="btn btn-success" href="#" onclick = "imagenes_historia_clinica('+row.codigo+')";>',
                'Imagenes',
            '</a>'
        ].join('');
    };
    
    function agregar_historia_clinica()
    {
         $.ajax({
          type: "POST",
          url: "<?php echo base_url()?>index.php/secretaria/getHtmlAgregarHistoriaClinica",
          data: {},
          beforeSend: function (event){},
          success: function (data) {
              data= JSON.parse(data);
              $("#cuerpo-modal").html(data);
              $("#modal").modal("show");
          },
          error: function (event){alert("ERROR");},

        });  
    }
    
    function editar_historia_clinica(codigo)
    {
        $.ajax({
          type: "POST",
          url: "<?php echo base_url()?>index.php/secretaria/getHtmlEditarHistoriaClinica",
          data: {codigo:codigo},
          beforeSend: function (event){},
          success: function (data) {
              data= JSON.parse(data);
              $("#cuerpo-modal").html(data);
              $("#modal").modal("show");
          },
          error: function (event){alert("ERROR");},

        }); 
    }
    
    function eliminar_historia_clinica(codigo)
    {
        if (confirm("¿Desea eliminar la historia clinica?"))
        {           
            $.ajax({
              type: "POST",
              url: "<?php echo base_url()?>index.php/secretaria/eliminar_historia_clinica",
              data: {codigo:codigo},
              beforeSend: function (event){},
              success: function (data) {
                  data= JSON.parse(data);

                  if(data)
                  {
                      alert("Historia clinica borrada");
                      location.href="<?php echo base_url()?>index.php/administrador/abm_historias_clinicas";
                  }
                  else
                  {
                       alert("No se ha podido borrar");
                  }
              },
              error: function (event){alert("ERROR");},

            }); 
        }
    }
    
    function reporte_historia_clinica(codigo)
    {
        window.open("<?php echo base_url()?>index.php/Secretaria/reporte_historia_clinica/"+codigo);
    }
    
    ///
    
    function imagenes_historia_clinica(codigo)
    {
        $.ajax({
          type: "POST",
          url: "<?php echo base_url()?>index.php/secretaria/comprobar_imagenes",
          data: {codigo:codigo},
          beforeSend: function (event){},
          success: function (data) {
              data= JSON.parse(data);
              
              if(data)
              {
                location.href="<?php echo base_url()?>index.php/Administrador/ver_imagenes_historia_clinica/"+codigo;
              }
              else
              {
                  alert("NO TIENE IMAGENES");
              }
          },
          error: function (event){alert("ERROR");},

        });  
    }
    
    function carga_imagen(url)
    {
        $("#visor_imagenes").attr("src",url);
    }
    
    // 17/10/2016
    
    function acciones_sobre_registro (tipo_accion, tipo_comp, num_comp){
        //si es 1 es ver detalle sino es eliminar. las 2 posibles acciones sobre el registro.
        if(tipo_accion==1)
        {
          if(tipo_comp == 1)
          {
            $.ajax({
                 type:"POST",
                 url: "<?php echo base_url()?>index.php/Administrador/mostrar_datos_factura",
                 data:{comprobante:num_comp},

                 beforeSend: function(event){},
                 success: function(data){
                     data = JSON.parse(data);

                     $("#cuerpo-modal").html(data);
                     $("#modal").modal("show");

                 },
                 error: function(event){alert("error");},
             });   
          }
          else if(tipo_comp == 5)
          {
            $.ajax({
                 type:"POST",
                 url: "<?php echo base_url()?>index.php/Administrador/mostrar_datos_movimiento_caja",
                 data:{comprobante:num_comp},

                 beforeSend: function(event){},
                 success: function(data){
                     alert(data);
                     data = JSON.parse(data);

                     $("#cuerpo-modal").html(data);
                     $("#modal").modal("show");

                 },
                 error: function(event){alert("error");},
             });   
          }
        }
        else if (tipo_accion==2)
        {

            if (confirm('¿ELIMINAR DE LA CAJA??')) { 
                
              
               $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>index.php/secretaria/eliminar_movimiento",
                    data: {codigo:num_comp},

                    beforeSend: function (event){
                    },

                    success: function (data) {
                        alert(data);
                    },

                    error: function (event){
                        alert("Error");
                    },

                  });  
           }
        }
        else if (tipo_accion==3)
        {
            if(tipo_comp == 1)
            {
                window.open("<?php echo base_url();?>index.php/secretaria/imprimir_datos_factura/"+num_comp);
            }
            else if(tipo_comp == 5)
            {
                window.open("<?php echo base_url();?>index.php/secretaria/imprimir_datos_movimiento_caja/"+num_comp);
            }
        }
    }
    </script>
    
    
</body>

</html>