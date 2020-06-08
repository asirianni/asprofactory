<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $titulo["dato"];?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <!-- stilos personales -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/recursos/css/stylos_personales.css">
        
    </head>
    <body>
        <div class="logo">
            <b><?php echo $negocio->getRazon_social()?> </b>
        </div> 
        <p class="box-msg">Sucursales activas</p>
        <div class="flex-container">
            <?php
                if (!empty($negocio->getListado_sucursales())) {
                    $listado_sucursale=$negocio->getListado_sucursales();
                    foreach ($listado_sucursale as $su) {
                        echo "
                        <div class='pricing'>
                            <h3><i class='fas fa-store-alt'></i> ".$su->getDesripcion_sucursal()."</h3> 
                            <ul>

                                <li><i class='fas fa-file-invoice-dollar'></i> Caja diaria: $ ".$su->getCaja()."</li>
                                <li><i class='fas fa-file-invoice-dollar'></i> Venta Mensual: $ ".$su->getV_mensual()."</li>
                                <li><i class='fas fa-file-invoice-dollar'></i> Ganancia: $ ".$su->getGanancia()."</li>
                                <li><i class='fas fa-tasks'></i> Stock valorizado: $ ".$su->getStock_v()."</li>
                                <li><i class='fas fa-users'></i> Usuarios: ".$su->getUsuario()." </li>

                            </ul>
                            <a href='#' class='boton_seleccion' onclick=''>Ver</a>
                            <a href='#' class='boton_seleccion' onclick='eliminar_sucursal(".$su->getId_sucursal().");'>Eliminar</a>
                            <a href='#' class='boton_seleccion' onclick=''>Pausar</a>
                        </div>";
                    }
                    
                }else{
                    echo "
                        <div class='pricing'>
                            <h3><i class='fas fa-store-alt'></i> No hay sucursales</h3>
                        </div>";
                }
            ?>
            
            
            
            
            <div class='pricing'>
                <ul>
                    <?php
                        if ($negocio->getCantidad_sucursales_activas() < $negocio->getCantidad_sucursales_permitidas()) {
                          echo "<li><a href='#' id='boton_agregar_sucursal' onclick='abrir_modal_agregar()'>Agregar Sucursal</a></li>";          
                        }
                    ?>
                    <li><a href='#' id='boton_agregar_sucursal' onclick='abrir_modal_agregar()'>Agregar Usuarios</a></li>
                </ul>
                
                
            </div>
        </div>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2>AGREGAR SUCURSAL</h2>
                </div>
                <div class="modal-body">
                    
                    
                    <input type="text" placeholder="Descripcion Sucursal" id="descripcion_sucursal">
                    <br> 
                    
                         
                    <select id="tipo_negocio">
                        <option value="0" id="tipo_negocio">SELECCIONE TIPO DE NEGOCIO</option>
                        <?php
                            foreach ($tipo_negocio as $t) {
                                echo "<option value='".$t["id"]."'>".strtoupper($t["tipo"])."</option>";
                            }
                        
                        ?>
                        
                    </select><br><br> 
                    <a href='#' class='boton_seleccion' onclick='registrar_sucursal();'>CONFIRMAR</a>
                    <br><br><br>
                </div>
                <div class="modal-footer">
                    <h3 id="error_modal"></h3>
                    
                </div>
            </div>   
        </div>
        
        <div id="myModalEliminarSucursal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2>CONFIRMAR</h2>
                </div>
                <div class="modal-body">

                    <P>Seguro quiere eliminar la sucursal ??? Esta accion no se puede volver atras.</P>
                    
                    <a href='#' class='boton_seleccion' onclick='confirmar_eliminar_sucursal();'>CONFIRMAR</a>
                    <br><br><br>
                </div>
                <div class="modal-footer">
                    <h3 id="error_modal"></h3>
                    
                </div>
            </div>   
        </div>
        
        
    </body>
    <!-- jQuery 3 -->
    <script src="<?php echo base_url()?>assets/template/bower_components/jquery/dist/jquery.min.js"></script>
    <script>
        // Get the modal
        var modal = document.getElementById('myModal');
        var modal_eliminar = document.getElementById('myModalEliminarSucursal');

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        };

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        };
        
        var plan_seleccionado=0;
        function abrir_modal_agregar(){
            
            modal.style.display = "block";
        }
        
        var sucursal_seleccionado=0;
        function eliminar_sucursal(id){
            sucursal_seleccionado=id;
            modal_eliminar.style.display = "block";
        }
        
        function confirmar_eliminar_sucursal(){
            $.ajax({
                type: "POST",
                async: false,
                url: "<?php echo base_url()?>index.php/Sucursales/eliminar_sucursal",
                data:{id:sucursal_seleccionado},
                beforeSend: function(event){},
                success: function(data){
                    var obj = jQuery.parseJSON(data);
                    if(obj.confirmacion){
                        alert(obj.mensaje);
                        location.href="<?php echo base_url()?>index.php/Negocio/mostrar_sucursales";
                    }else{
                        alert(obj.mensaje);
                    }

                },
                error: function(event){}
            });
        }
        
        
        function registrar_sucursal(){
            var descripcion=$("#descripcion_sucursal").val();
            var tipo=$("#tipo_negocio").val();

            $.ajax({
                type: "POST",
                async: false,
                url: "<?php echo base_url()?>index.php/Sucursales/alta_sucursal",
                data:{descripcion:descripcion,tipo:tipo},
                beforeSend: function(event){},
                success: function(data){
                    var obj = jQuery.parseJSON(data);
                    if(obj.confirmacion){
                        alert(obj.mensaje);
                        location.href="<?php echo base_url()?>index.php/Negocio/mostrar_sucursales";
                    }else{
                        alert(obj.mensaje);
                    }

                },
                error: function(event){}
            });
        }
    </script>
</html>