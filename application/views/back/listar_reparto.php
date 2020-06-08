<div class="container">
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-success btn-lg btn-block" onclick="nueva_hoja()">+ NUEVA HOJA DE RUTA</button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-primary btn-lg btn-block" onclick="historial()">HISTORIAL</button>
        </div>
        
    </div>
</div>

<BR><BR>


<div class="container">
    <div class="row" >
        
        
        
        <?php
        
        if(empty($repartos)){
            
            ?>
                <div class="col-lg-12 col-sm-12 col-xs-12" style="border-style: dotted;">
                <h5 style="text-align: left">NO HAY HOJAS DE RUTAS</h5>
                <div class="row">
                    <div class="col">
                        <a href="<?php echo base_url()?>precios"><img src="<?php echo base_url()?>assets/img/reparto.png" width="20%"></a>
                    </div>
                    
                    
                </div>
                
                
        </div>
            <?php
            
        }else{
            foreach ($repartos as $r) {
            ?>
                <div class="col-lg-6 col-sm-12 col-xs-12" style="border-style: dotted;">
                    <h5 style="text-align: left"><?php echo $r["fecha"]?> - RUTA NUM: <?php echo $r["id"]?>  - <?php echo $r["localidad_descripcion"]?> </h5>
                        <div class="row">
                            <div class="col">
                                <a href="<?php echo base_url()?>precios"><img src="<?php echo base_url()?>assets/img/reparto.png" width="100%"></a>
                            </div>
                            <div class="col">
                                <h5>CARGA</h5>
                                <h6>CHICOS: <?php echo $r["chicos"]?></h6>
                                <h6>MEDIANOS: <?php echo $r["medianos"]?></h6>
                                <h6>MEDIANITOS: <?php echo $r["medianitos"]?></h6>
                                <h6>BOLITAS: <?php echo $r["bolita"]?></h6>
                                <h6>GRANDES: <?php echo $r["grandes"]?></h6>
                                <h6>EXTRA: <?php echo $r["extra"]?></h6>
                                <h6>CARTONES: <?php echo $r["cartones"]?></h6>
                            </div>
                            <div class="col">
                                <h5>VENTAS</h5>
                                <h6>CHICOS:  <?php echo $r["ventas"]["chicos"]?></h6>
                                <h6>MEDIANOS: <?php echo $r["ventas"]["medianos"]?></h6>
                                <h6>MEDIANITOS: <?php echo $r["ventas"]["medianitos"]?></h6>
                                <h6>BOLITAS: <?php echo $r["ventas"]["bolita"]?></h6>
                                <h6>GRANDES: <?php echo $r["ventas"]["grandes"]?></h6>
                                <h6>EXTRA: <?php echo $r["ventas"]["extra"]?></h6>
                                <h6>ROTOS: <?php echo $r["ventas"]["rotos"]?></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                        <h5>Total: $ <?php echo number_format($r["cambio_inicial"]+$r["ventas"]["abonado"], 2, ',', '.')?></h5>
                        
                    </div>
                    <div class="col">
                        <h5>Cambio: $ <?php echo number_format($r["cambio_inicial"], 2, ',', '.')?></h5>
                        
                    </div>
                    <div class="col">
                        <h5>Cobrado: $ <?php echo number_format($r["ventas"]["abonado"], 2, ',', '.')?></h5>
                        
                    </div>
                        </div>
                        <div class="row">

                            <button type="button" class="btn btn-primary btn-lg" onclick="ver_reparto(<?php echo $r["id"]?>)">> VER</button>



                            <button type="button" class="btn btn-success btn-lg" onclick="finalizar(<?php echo $r["id"]?>)">> FINALIZAR</button>



                            <button type="button" class="btn btn-danger btn-lg" onclick="eliminar(<?php echo $r["id"]?>)">x ELIMINAR</button>



                        </div>

                </div>
            <?php
            }
        }
        ?>
        
    </div>
    
</div>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" id="modal_nueva_hoja">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nueva Hoja de Ruta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="row">
            <div class="col-sm-12">
                <label class="" >Localidad del Reparto</label>
                
            </div>
            <div class="col-sm-12">
                
                <select class="form-control" id="id_localidad">
                    <option value="0">seleccione</option>
                    <?php 
                        foreach ($localidades_reparto as $l) {
                            ?>
                            <option value="<?php echo $l["id"]?>"><?php echo $l["localidad"]?></option>
                            <?php
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label class="" >De donde se saca la carga</label>
                
            </div>
            <div class="col-sm-12">
                
                <select class="form-control" id="id_carga">
                    <option value="0">seleccione</option>
                    <?php 
                        foreach ($galpones as $g) {
                            ?>
                            <option value="<?php echo $g["id"]?>"><?php echo $g["nombre_galpon"]?></option>
                            <?php
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label class="">Cantidad de maples chicos</label>
                
            </div>
            <div class="col-sm-12">
                
                <input class="form-control" id="id_maple_chicos" value="0" type="number">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label class="">Cantidad de maples medianos</label>
                
            </div>
            <div class="col-sm-12">
                
                <input class="form-control" id="id_maple_medianos" value="0" type="number">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label class="">Cantidad de maples medianitos</label>
                
            </div>
            <div class="col-sm-12">
                
                <input class="form-control" id="id_maple_medianito" value="0" type="number">
            </div>
        </div>
          <div class="row">
            <div class="col-sm-12">
                <label class="">Cantidad de maples bolita</label>
                
            </div>
            <div class="col-sm-12">
                
                <input class="form-control" id="id_maple_bolita" value="0" type="number">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label class="">Cantidad de maples grandes</label>
                
            </div>
            <div class="col-sm-12">
                
                <input class="form-control" id="id_maple_grandes" value="0" type="number">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label class="">Cantidad de maples extra</label>
                
            </div>
            <div class="col-sm-12">
                
                <input class="form-control" id="id_maple_extras" value="0" type="number">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label class="">Cantidad de cartones</label>
                
            </div>
            <div class="col-sm-12">
                
                <input class="form-control" id="id_cartones" value="0" type="number">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label class="">Efectivo en cambio</label>
                
            </div>
            <div class="col-sm-12">
                
                <input class="form-control" id="id_cambio" value="0" type="number">
            </div>
        </div>   
          
        <br>  
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="registrar_nueva_hoja()">Registrar Hoja</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>

<script type="text/javascript">
    function ver_reparto(id){
        location.href="<?php echo base_url()?>reparto/ver/"+id;
    }
    
    function nueva_hoja(){
        $('#modal_nueva_hoja').modal('show');
    }
    
    function registrar_nueva_hoja(){
        var id_localidad = $('#id_localidad').val();
        var id_carga= $('#id_carga').val();
        var chicos= $('#id_maple_chicos').val();
        var medianos= $('#id_maple_medianos').val();
        var grandes= $('#id_maple_grandes').val();
        var extra= $('#id_maple_extras').val();
        var cartones= $('#id_cartones').val();
        var cambio= $('#id_cambio').val();
        
       var medianito= $('#id_maple_medianito').val();
       var bolita= $('#id_maple_bolita').val();
     
        console.log(id_localidad);
        console.log(id_carga);
        console.log(chicos);
        console.log(medianos);
        console.log(grandes);
        console.log(extra);
        console.log(cartones);
        console.log(cambio);
        console.log(medianito);
        console.log(bolita);
        
        if(id_localidad=="0"){
                alert("Seleccione Localidad del reparto.");
            }else{
                if(id_carga=="0"){
                    alert("Seleccione de donde se saca la carga");
                }else{
                    var r=confirm("Confirma la operacion???");
        
                    if(r==true){


                    $.ajax({
                            async: false,
                            type: "POST",
                            url: "<?php echo base_url()?>reparto/nueva_hoja",
                            data:{localidad:id_localidad,carga:id_carga,cambio:cambio,chicos:chicos,medianos:medianos,grandes:grandes,extra:extra,cartones:cartones,medianito:medianito,bolita:bolita},
                            success:function(data){
                                 //alert(data);
                                data = JSON.parse(data);
                                
                                if(data.exito){

                                    location.href="<?php echo base_url()?>reparto/listar";
                                }else{
                                    alert("Error en la carga, intentelo mas tarde!");
                                }
                            },
                            error:function(data){
                                console.log(data);
                            }
                        });
                }
                }
            }
        
        
    }
    
    function eliminar(id){
        var r=confirm("Confirma la operacion???");
        
        if(r==true){


            $.ajax({
                async: false,
                type: "POST",
                url: "<?php echo base_url()?>reparto/eliminar",
                data:{id:id},
                success:function(data){
                     //alert(data);
                    data = JSON.parse(data);

                    if(data.exito){

                        location.href="<?php echo base_url()?>reparto/listar";
                    }else{
                        alert("Error en la carga, intentelo mas tarde!");
                    }
                },
                error:function(data){
                    console.log(data);
                }
            });
        }
    }
    
    function finalizar(id){
        var r=confirm("Confirma la operacion???");
        
        if(r==true){


            $.ajax({
                async: false,
                type: "POST",
                url: "<?php echo base_url()?>reparto/finalizar",
                data:{id:id},
                success:function(data){
                     //alert(data);
                    data = JSON.parse(data);

                    if(data.exito){

                        location.href="<?php echo base_url()?>reparto/listar";
                    }else{
                        alert("Error en la carga, intentelo mas tarde!");
                    }
                },
                error:function(data){
                    console.log(data);
                }
            });
        }
    }
    
    function historial(){
       location.href="<?php echo base_url()?>reparto/historial";
    }
    
</script>

<BR><BR><BR><BR><BR><BR><BR>