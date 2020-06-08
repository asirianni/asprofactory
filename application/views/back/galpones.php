<div class="container">
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-success btn-lg btn-block" onclick="galpon();">+ NUEVO GALPON</button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-primary btn-lg btn-block" onclick="precios();">PRECIOS</button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-warning btn-lg btn-block" onclick="huevos();">HUEVOS</button>
        </div>
    </div>
</div>
<br><br>
<div class="container">
    <div class="row" >
        <?php
            $total_chicos=0;
            $total_medianos=0;
            $total_grandes=0;
            $total_extra=0;
            $total_cartones=0;
            $total_medianito=0;
            $total_bolita=0;
        
        ?>
        <?php foreach ($listado_galpones as $g) {
            ?>
            <div class="col-lg-6 col-sm-12 col-xs-12" style="background-color: orange; border-style: dotted;">
                <h1><?php echo $g["nombre_galpon"]?></h1>
                <br>
                <div class="row">
                    <div class="col">
                        <a href="<?php echo base_url()?>precios"><img src="<?php echo base_url()?>assets/img/galpon.png" width="50%"></a>
                    </div>
                    <div class="col">
                        <h5><strong>STOCK</strong></h5>
                        <h6>CHICOS: <?php echo $g["chicos"]; if($g["chicos"]>=$parametros_huevos_stock_chicos["punto_critico"]){echo " <strong>(ALTO)</strong>";}$total_chicos=$total_chicos+$g["chicos"];?></h6>
                        <h6>MEDIANOS: <?php echo $g["medianos"];if($g["medianos"]>=$parametros_huevos_stock_medianos["punto_critico"]){echo " <strong>(ALTO)</strong>";}$total_medianos=$total_medianos+$g["medianos"];?></h6>
                        <h6>MEDIANITOS: <?php echo $g["medianitos"];if($g["medianitos"]>=$parametros_huevos_stock_medianitos["punto_critico"]){echo " <strong>(ALTO)</strong>";}$total_medianito=$total_medianito+$g["medianitos"];?></h6>
                        <h6>BOLITA: <?php echo $g["bolita"];if($g["bolita"]>=$parametros_huevos_stock_bolita["punto_critico"]){echo " <strong>(ALTO)</strong>";}$total_bolita=$total_bolita+$g["bolita"];?></h6>
                        <h6>GRANDES: <?php echo $g["grandes"];if($g["grandes"]>=$parametros_huevos_stock_grandes["punto_critico"]){echo " <strong>(ALTO)</strong>";}$total_grandes=$total_grandes+$g["grandes"];?></h6>
                        <h6>EXTRA: <?php echo $g["extra"];if($g["extra"]>=$parametros_huevos_stock_extra["punto_critico"]){echo " <strong>(ALTO)</strong>";}$total_extra=$total_extra+$g["extra"];?></h6>
                        <h6>CARTONES: <?php echo $g["cartones"];if($g["cartones"]>=$parametros_huevos_stock_carton["punto_critico"]){echo " <strong>(ALTO)</strong>";}$total_cartones=$total_cartones+$g["cartones"];?></h>
                    </div>
                    <div class="col">
                        <h5><strong>CAJONES</strong></h5>
                        <h6>CHICOS: <?php echo round($g["chicos"]/12,2, PHP_ROUND_HALF_DOWN);?></h6>
                        <h6>MEDIANOS: <?php echo round($g["medianos"]/12,2, PHP_ROUND_HALF_DOWN);?></h6>
                        <h6>MEDIANITOS: <?php echo round($g["medianitos"]/12,2, PHP_ROUND_HALF_DOWN);?></h6>
                        <h6>BOLITA: <?php echo round($g["bolita"]/12,2, PHP_ROUND_HALF_DOWN);?></h6>
                        <h6>GRANDES: <?php echo round($g["grandes"]/12,2, PHP_ROUND_HALF_DOWN);?></h6>
                        <h6>EXTRA: <?php echo round($g["extra"]/12,2, PHP_ROUND_HALF_DOWN);?></h6>
                        <h6>CARTONES: <?php echo round($g["cartones"]/12,2, PHP_ROUND_HALF_DOWN);?></h>
                    </div>
                    <div class="col">
                        <h5><strong>MAXIMO</strong></h5>
                        <h6>CHICOS: <?php echo $parametros_huevos_stock_chicos["punto_critico"];?></h6>
                        <h6>MEDIANOS: <?php echo $parametros_huevos_stock_medianos["punto_critico"];?></h6>
                        <h6>MEDIANITOS: <?php echo $parametros_huevos_stock_medianitos["punto_critico"];?></h6>
                        <h6>BOLITA: <?php echo $parametros_huevos_stock_bolita["punto_critico"];?></h6>
                        <h6>GRANDES: <?php echo $parametros_huevos_stock_grandes["punto_critico"];?></h6>
                        <h6>EXTRA: <?php echo $parametros_huevos_stock_extra["punto_critico"];?></h6>
                        <h6>CARTONES: <?php echo $parametros_huevos_stock_carton["punto_critico"];?></h>
                    </div>
                </div>
                <br>
                <div class="row">
                    
                    <button type="button" class="btn btn-primary btn-lg" onclick="registrar_movimiento(<?php echo $g["id"];?>);">Registrar movimiento</button>

                   
                    
                        <button type="button" class="btn btn-success btn-lg" onclick="ver_historial(<?php echo $g["id"];?>);">Historial</button>

                    
                   
                        <button type="button" class="btn btn-danger btn-lg" onclick="eliminar_galpon(<?php echo $g["id"];?>)">Eliminar</button>

                   
                   
                </div>
                
        </div>
            <?php
        }?>
        
        
    </div>
    
</div>
<br><br><br><br>
<div class="container" >
    <div style="background-color:plum" >
        
        <h1>TOTALES</h1>
        
        <div class="row">
              <div class="col-lg-3 col-sm-12 col-xs-12" style="background-color: greenyellow; border-style: solid; display: flex; justify-content: center;align-items: center;">
                    <h6><strong>CHICOS:    <?php echo $total_chicos?> </strong></h6>
              </div>
                <div class="col-lg-3 col-sm-12 col-xs-12" style="background-color: greenyellow; border-style: solid; display: flex; justify-content: center;align-items: center;">
                    <h6><strong>MEDIANOS:    <?php echo $total_medianos?> </strong></h6>
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12" style="background-color: greenyellow; border-style: solid; display: flex; justify-content: center;align-items: center;">
                    <h6><strong>MEDIANITOS:    <?php echo $total_medianito?> </strong></h6>
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12" style="background-color: greenyellow; border-style: solid; display: flex; justify-content: center;align-items: center;">
                    <h6><strong>BOLITA:    <?php echo $total_bolita?> </strong></h6>
                </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-12 col-xs-12" style="background-color: greenyellow; border-style: solid; display: flex; justify-content: center;align-items: center;">
                <h6><strong>GRANDES:    <?php echo $total_grandes?> </strong></h6>
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12" style="background-color: greenyellow; border-style: solid; display: flex; justify-content: center;align-items: center;">
                <h6><strong>EXTRA:    <?php echo $total_extra?> </strong></h6>
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12" style="background-color: greenyellow; border-style: solid; display: flex; justify-content: center;align-items: center;">
                <h6><strong>CARTONES:    <?php echo $total_cartones?> </strong></h6>
            </div>
        </div>
      
        
                
                
        
        

    
    </div>
</div>
<br><br>
<div class="modal" tabindex="-1" role="dialog" id="modal_galpon">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">REGISTRAR NUEVO GALPON</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="row">
            <div class="col-sm-12">
                <label class="">NOMBRE GALPON</label>
                
            </div>
            <div class="col-sm-12">
                
                <input class="form-control" id="id_nombre_galpon_registro" value="" type="text">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <label class="" >SELECCIONE LOCALIDAD</label>
                
            </div>
            <div class="col-sm-12">
                
                <select class="form-control" id="localidad_seleccionada">
                    <option value="0">seleccione</option>
                    <?php 
                        foreach ($listado_localidades as $l) {
                            ?>
                            <option value="<?php echo $l["id"]?>"><?php echo $l["localidad"]?></option>
                            <?php
                        }
                    ?>
                </select>
            </div>
        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="registrar_galpon()">Registrar Galpon</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" id="modal_carga_movimiento">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Registrar Movimiento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        
        <div class="row">
            <div class="col-sm-12">
                <label class="" >TIPO MOVIMIENTO</label>
                
            </div>
            <div class="col-sm-12">
                
                <select class="form-control" id="tipo_entrada">
                    <option value="0">seleccione</option>
                    <option value="1">ENTRADA</option>
                    <option value="2">SALIDA</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label class="">CANTIDAD CHICOS</label>
                
            </div>
            <div class="col-sm-12">
                
                <input class="form-control" id="id_maple_chicos" value="0" type="number">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label class="">CANTIDAD MEDIANOS</label>
                
            </div>
            <div class="col-sm-12">
                
                <input class="form-control" id="id_maple_medianos" value="0" type="number">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label class="">CANTIDAD MEDIANITOS</label>
                
            </div>
            <div class="col-sm-12">
                
                <input class="form-control" id="id_maple_medianitos" value="0" type="number">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label class="">CANTIDAD BOLITA</label>
                
            </div>
            <div class="col-sm-12">
                
                <input class="form-control" id="id_maple_bolita" value="0" type="number">
            </div>
        </div>  
        <div class="row">
            <div class="col-sm-12">
                <label class="">CANTIDAD GRANDES</label>
                
            </div>
            <div class="col-sm-12">
                
                <input class="form-control" id="id_maple_grandes" value="0" type="number">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label class="">CANTIDAD EXTRAS</label>
                
            </div>
            <div class="col-sm-12">
                
                <input class="form-control" id="id_maple_extras" value="0" type="number">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label class="">CANTIDAD CARTONES</label>
                
            </div>
            <div class="col-sm-12">
                
                <input class="form-control" id="id_cartones" value="0" type="number">
            </div>
        </div>  
        <br>  
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="registrar_nuevo_movimiento()">Registrar Movimiento</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<br><br><br><br>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/redviap.js"></script>

<script type="text/javascript">
    function galpon(){
        $('#modal_galpon').modal('show');
    }
    
    function registrar_galpon(){
        
        var nombre= $('#id_nombre_galpon_registro').val();
        var localidad= $('#localidad_seleccionada').val();
        console.log(nombre);
        console.log(localidad);
        
        if(nombre==""){
            alert("complete el dato nombre");
        }else{
            if(localidad=="0"){
                alert("seleccione localidad");
            }else{
                var r=confirm("Confirma la operacion???");
        
                if(r==true){


                    $.ajax({
                            async: false,
                            type: "POST",
                            url: "<?php echo base_url()?>galpones/nuevo",
                            data:{nombre:nombre,localidad:localidad},
                            success:function(data){
                                 //alert(data);
                                data = JSON.parse(data);
                                
                                if(data.exito){

                                    location.href="<?php echo base_url()?>galpones";
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
    
    var galpon_seleccionadado;
    function registrar_movimiento(id){
        galpon_seleccionadado=id;
        $('#modal_carga_movimiento').modal('show');
        
    }
    
    function registrar_nuevo_movimiento(){
        var tipo_entrada= $('#tipo_entrada').val();
        var chicos = $('#id_maple_chicos').val();
        var medianos = $('#id_maple_medianos').val();
        var grandes = $('#id_maple_grandes').val(); 
        var extra = $('#id_maple_extras').val();
        var cartones = $('#id_cartones').val();
        var medianitos = $('#id_maple_medianitos').val();
        var bolita = $('#id_maple_bolita').val();
        
        console.log(tipo_entrada);
        console.log(chicos);
        console.log(medianos);
        console.log(grandes);
        console.log(extra);
        console.log(cartones);
        console.log(medianitos);
        console.log(bolita);
        
        if(tipo_entrada=="0"){
                alert("Seleccione el Tipo de Movimiento.");
            }else{
                var r=confirm("Confirma la operacion???");
        
                if(r==true){


                    $.ajax({
                            async: false,
                            type: "POST",
                            url: "<?php echo base_url()?>galpones/nuevo_movimiento",
                            data:{galpon:galpon_seleccionadado,tipo:tipo_entrada,chicos:chicos,medianos:medianos,grandes:grandes,extra:extra,cartones:cartones,medianitos:medianitos,bolita:bolita},
                            success:function(data){
                                 //alert(data);
                                data = JSON.parse(data);
                                
                                if(data.exito){

                                    location.href="<?php echo base_url()?>galpones";
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
    
    function eliminar_galpon(id){
        var r=confirm("Confirma la operacion???");
        
        if(r==true){


            $.ajax({
                async: false,
                type: "POST",
                url: "<?php echo base_url()?>galpones/eliminar",
                data:{id:id},
                success:function(data){
                     //alert(data);
                    data = JSON.parse(data);

                    if(data.exito){

                        location.href="<?php echo base_url()?>galpones";
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
    
    function ver_historial(id){
        location.href="<?php echo base_url()?>galpones/historial/"+id;
    }
    
    function precios(){
        location.href="<?php echo base_url()?>precios/";
    }
    
    function huevos(){
        location.href="<?php echo base_url()?>huevos/";
    }
</script>
