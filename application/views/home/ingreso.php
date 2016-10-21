<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>JuanCa Mantenimiento</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Photographer Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="<?php echo base_url(); ?>/recursos/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url(); ?>/recursos/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="<?php echo base_url(); ?>/recursos/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>/recursos/js/zelect.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Syncopate:400,700' rel='stylesheet' type='text/css'>

<style>
    <?php
        $imagenes_slider = $template->getImagenesSlider();
        
        for($i=0;$i < count($imagenes_slider);$i++)
        {
            echo ".banner".($i+1)."{
                            background:url(".  base_url()."recursos/images/".$imagenes_slider[$i]["imagen"].") no-repeat 0px 0px;
                            background-size:cover;
                            -webkit-background-size:cover;
                            -moz-background-size:cover;
                            -o-background-size:cover;
                            -ms-background-size:cover;
                    }";
        }
    ?>
    
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
</head>
	
<body>
<!-- banner-body -->
	<div class="banner-body">
		<div class="container">
			<div class="banner-body-content">
				<?php
                                 echo $template->getMenu();
                                ?>
                                <!-- BANNER -->
				<?php
                                 echo $template->getBanner();
                                ?>
                                <!-- FIN BANNER -->
                                
				<?php echo $contenido;?>
			</div>
		</div>
	</div>
<!-- //banner-body -->

<?php
    echo $template->getFooter();
?>
<!-- scroll_top_btn -->
		<script type="text/javascript" src="<?php echo base_url(); ?>/recursos/js/move-top.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/recursos/js/easing.js"></script>
	    <script type="text/javascript">
			$(document).ready(function() {
			
				var defaults = {
		  			containerID: 'toTop', // fading element id
					containerHoverID: 'toTopHover', // fading element hover id
					scrollSpeed: 1200,
					easingType: 'linear' 
		 		};
				
				
				$().UItoTop({ easingType: 'easeOutQuart' });
				
			});
		</script>
		 <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
<!--end scroll_top_btn -->
<!-- for bootstrap working -->
	<script src="<?php echo base_url(); ?>/recursos/js/bootstrap.js"></script>
<!-- //for bootstrap working -->

<script>
    $(document).ready(function(){
        $('#intro select').zelect({ placeholder:'Seleccione...' });
        
        // ACTIVANDO LA SECCION
        
        var seccion = <?php echo json_encode($seccion);?>;
        
        switch(seccion)
        {
            case "principal": $("#seccion_principal").addClass("active");
                  break;
            case "servicios": $("#seccion_servicios").addClass("active");
                  break;
            case "calculo_obra": $("#seccion_calculo_obra").addClass("active");
                  break;
            case "contacto": $("#seccion_obras").addClass("active");
                  break;
            case "obras": $("#seccion_contacto").addClass("active");
                  break;
        }
    });
    
    function calcular_obra()
    {
        var rubro = $("#rubro_calcular_obra").val();
        var cantidad = $("#cantidad_calcular_obra").val();
        
        //alert(rubro+" "+cantidad);
        
        if(rubro != "nada")
        {
            if(!isNaN(cantidad) && cantidad != "")
            {
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url()?>index.php/welcome/getPresupuesto",
                    data:{cantidad:cantidad,rubro:rubro},
                    
                    beforeSend: function(event){},
                    success: function(data)
                    {
                        data = JSON.parse(data);
                        $("#resultado_presupuesto_contenido").html(data);
                    },
                    error: function(event){alert("ERROR");},
                });
            }
            else
            {
              alert("Escriba una cantidad correcta");  
            }
        }
        else
        {
            alert("seleccione un rubro");
        }
        
        $("#resultado_presupuesto").removeAttr("hidden");
        $("#presupeste_obra").attr("hidden","true");
    }
    
    function volver_a_presupuestar()
    {
        $("#resultado_presupuesto").attr("hidden","true");
        $("#presupeste_obra").removeAttr("hidden");
    }
</script>
</body>
</html>