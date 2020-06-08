<html>
    <head>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>  
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <title>PROCESO DE PAGO ONLINE</title>
        <style>
            .resumen{
                background-color: #F9F9F9;
                padding: 20px;
                border:1px solid #CCCCCC;
            }
        </style>
    </head>
<body>
    <section class="">
        <div class="container">
            <h2 class="light text-center">Proceso de pago</h2>
        </div>
    </section>
    <br>
    <section>
        <div class="container">
            <div class="">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div id="pago" class="resumen" style="display: none">
                            <label>PAGO PROCESADO. EN BREVE NOS COMUNICAREMOS CON USTED.</label>
                        </div>
                        <div id="resumen" class="resumen">
                            <label>Pago numero : <?php echo $pago['id']; ?></label><br><br>
                            
                            <label>Cliente: <?php echo strtolower($cliente['razon_social']); ?></label><br><br>
                            
                            
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Pago</th>
                                        <th>Plan</th>
                                        <th>Precio</th>
                                        <th>Vencimiento</th>
                                        	
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th><?php echo $pago['id']; ?></th>
                                        <th><?php echo $pago['plan']; ?></th>
                                        <th>$ <?php echo $pago['importe']; ?></th>
                                        <th><?php echo $pago['fecha_vencimiento']; ?></th>
                                        
                                    </tr>
                                </tbody>
                                

                                <tfoot>
                                  <tr>
                                    <!-- init_point para produccion-->
                                    <!--<td><a href="<?php //echo $preference['response']['sandbox_init_point']; ?>" name="MP-Checkout" class="lightblue-M-Ov-ArOn" mp-mode="modal" onreturn="execute_my_onreturn">Pagar</a></td>-->
                                    <td><a href="<?php echo $preference['response']['init_point']; ?>" name="MP-Checkout" class="lightblue-M-Ov-ArOn" mp-mode="modal" onreturn="execute_my_onreturn">Pagar</a></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    
                                      </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    	
    <script src="<?=base_url()?>recursos/bootstrap/js/bootstrap.min.js"></script>
         
    <script type="text/javascript">
        var pago=<?php echo $pago['id']; ?>;
        
        function execute_my_onreturn (json) {
            if (json.collection_status=='approved'){
                alert ('Pago acreditado');
                pagar(pago);
                $('#pago').show();
                $('#resumen').hide();
                

            } else if(json.collection_status=='pending'){
                alert ('El usuario no completo el pago');
            } else if(json.collection_status=='in_process'){    
                alert ('El pago esta siendo revisado');    
            } else if(json.collection_status=='rejected'){
                alert ('El pago fue rechazado, el usuario puede intentar nuevamente el pago');
            } else if(json.collection_status==null){
                alert ('El usuario no completo el proceso de pago, no se ha generado ningun pago');
            }
        }
        
        function pagar(id_cuenta){
        $.ajax({
             type:"POST",
             url: "<?php echo base_url()?>index.php/Pagos/registrar_pago",
             data:{numero:id_cuenta},

             beforeSend: function(event){},
             success: function(data){
               data = JSON.parse(data);

               if(data)
               {
                  alert("se registro el pago con fecha de hoy");
               }
             },
             error: function(event){alert(event.responseText);},
     });   
  }

    </script>    
    <script type="text/javascript">
        (function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
    </script>
     
</body>
</html>
			