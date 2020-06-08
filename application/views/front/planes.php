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
            <b>As Pro </b>Factory
        </div> 
        <p class="box-msg">Elija el plan</p>
        <div class="flex-container">
            <?php
                foreach ($planes as $p) {
                    $sucursales="ilimitados";
                    $facturas="ilimitados";
                    $usuarios="ilimitados";
                    $productos="ilimitados";
                    
                    if($p["sucursales"]>0){
                        $sucursales=$p["sucursales"];
                    }
                    
                    if($p["facturas"]>0){
                        $facturas=$p["facturas"];
                    }
                    
                    if($p["usuarios"]>0){
                        $usuarios=$p["usuarios"];
                    }
                    
                    if($p["productos"]>0){
                        $productos=$p["productos"];
                    }
                    
                    
                    echo "<div class='pricing'>
                            <h3>".strtoupper($p["plan"])." : $".$p["costo"]." / mes</h3> 
                            <ul>
                                <li><i class='fas fa-store-alt'></i> Cantidad de sucursales: ".$sucursales."</li>
                                <li><i class='fas fa-file-invoice-dollar'></i> Cantidad de facturas diarias: ".$facturas."</li>
                                <li><i class='fas fa-users'></i> Cantidad de usuarios: ".$usuarios."</li>
                                <li><i class='fas fa-tasks'></i> Cantidad de productos: ".$productos."</li>
                            </ul>
                            <a href='#' class='boton_seleccion' onclick='elegir_plan(".$p["id"].")'>Elegir</a>
                        </div>";
                }
            
            ?>
            
        </div>
       
        <div id="myModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2 >PLAN SELECCIONADO: <span id="modal_header"></span></h2>
                </div>
                <div class="modal-body">
                    <p>Complete con la razon social del negocio</p>
                    
                    <input type="text" placeholder="Razon Social" id="razon_social">
                    <br><br><br>    
                    
                    <a href='#' class='boton_seleccion' onclick='confirmar_plan()'>CONFIRMAR</a>
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
        function elegir_plan(id_select){
            plan_seleccionado=id_select;
            $("#modal_header").html(id_select);
            modal.style.display = "block";
            

        }
        
        function confirmar_plan(){
            var razon_social= $("#razon_social" ).val();;
            if(razon_social!=""){
                $.ajax({
                    type: "POST",
                    async: false,
                    url: "<?php echo base_url()?>index.php/Planes/seleccionar_plan",
                    data:{id:plan_seleccionado,razon:razon_social},

                    success: function(data){

                        location.href="<?php echo base_url()?>index.php/Negocio/cargar_negocio";
                    },
                    error: function(event){}
                });
            }else{
                alert("Por favor complete la razon social");
            }
        }
        
    </script>
</html>