
<style>
    .calculo{
        width: 100%;
    }
    .total{
        width: 100%;
    }
</style>
<div class="container">
    <div class="row" >
        <a href="<?php echo base_url()?>reparto/">REPARTOS ></a><a href="<?php echo base_url()?>reparto/listar">LISTADO > </a><a>REPARTO: <?php echo $reparto["id"]?>  </a>
        <br><br>
        <div class="col-lg-12 col-sm-12 col-xs-12" style="border-style: dotted;">
            <h5 style="text-align: left"><?php echo $reparto["fecha"]?> - RUTA NUM: <?php echo $reparto["id"]?>  - <?php echo $reparto["localidad_descripcion"]?> </h5>
            
                <div class="row">
                    
                    <div class="col">
                        <h5>CARGA</h5>
                                                
                        <h6>CHICOS: <?php echo $reparto["chicos"]?></h6>
                        <h6>MEDIANOS: <?php echo $reparto["medianos"]?></h6>
                        <h6>MEDIANITOS: <?php echo $reparto["medianitos"]?></h6>
                        <h6>BOLITAS: <?php echo $reparto["bolita"]?></h6>
                        <h6>GRANDES: <?php echo $reparto["grandes"]?></h6>
                        <h6>EXTRA: <?php echo $reparto["extra"]?></h6>
                        <h6>CARTONES: <?php echo $reparto["cartones"]?></h6>
                    </div>
                    <div class="col">
                        
                        
                        <h5>VENTAS</h5>
                        <h6>CHICOS:  <?php echo $ventas["chicos"]?></h6>
                        <h6>MEDIANOS: <?php echo $ventas["medianos"]?></h6>
                        <h6>MEDIANITOS: <?php echo $ventas["medianitos"]?></h6>
                        <h6>BOLITAS: <?php echo $ventas["bolita"]?></h6>
                        <h6>GRANDES: <?php echo $ventas["grandes"]?></h6>
                        <h6>EXTRA: <?php echo $ventas["extra"]?></h6>
                        <h6>ROTOS: <?php echo $ventas["rotos"]?></h6>
                       
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>Total: $ <?php echo number_format($reparto["cambio_inicial"]+$ventas["abonado"], 2, ',', '.')?></h5>
                        
                    </div>
                    <div class="col">
                        <h5>Cambio: $ <?php echo number_format($reparto["cambio_inicial"], 2, ',', '.')?></h5>
                        
                    </div>
                    <div class="col">
                        <h5>Cobrado: $ <?php echo number_format($ventas["abonado"], 2, ',', '.')?></h5>
                        
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-primary btn-lg btn-block" onclick="editar_reparto(<?php echo $reparto["id"]?>)">EDITAR</button>
                    </div> 
                </div>
               
                
        </div>
        
    </div>
    
</div>
<BR><BR>
<div class="container">
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-success btn-lg btn-block" onclick="modal_agregar_cliente()">+ AGREGAR CLIENTE</button>
        </div>
    </div>
    
</div>
<BR><BR>
<div class="container">
    <div class="row" style="width: 70%">   
        <table class="">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">CLIENTE</th>
                    <th scope="col">$TOTAL</th>
                    <th scope="col">$ABONADO</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($clientes as $c) {
                            ?>
                                <tr>
                                    <th scope="row"><a href="#?" onclick="modal_editar_cliente(
                                                                                    <?php echo $c["id"]?>,
                                                                                    <?php echo $c["chicos"]?>,
                                                                                    <?php echo $c["pre_c"]?>,
                                                                                    <?php echo $c["medianos"]?>,
                                                                                    <?php echo $c["pre_me"]?>,
                                                                                    <?php echo $c["extra"]?>,
                                                                                    <?php echo $c["pre_e"]?>,
                                                                                    <?php echo $c["grandes"]?>,
                                                                                    <?php echo $c["pre_g"]?>,
                                                                                    <?php echo $c["total_pedido"]?>,
                                                                                    <?php echo $c["abonado"]?>,
                                                                                    <?php echo $c["id_cliente"]?>,
                                                                                    <?php echo $c["medianito"]?>,
                                                                                    <?php echo $c["media_pre"]?>, 
                                                                                    <?php echo $c["bolita"]?>, 
                                                                                    <?php echo $c["boli_pre"]?>, 
                                                                                    <?php echo $c["rotos"]?>, 
                                                                                    <?php echo $c["rotos_pre"]?>,             
                                                                                    )">VER</a></th>
                                    <td><?php echo $c["razon_social"]?></td>
                                    <td>$ <?php echo number_format($c["total_pedido"], 2, ',', '.')?></td>
                                    <td>$ <?php echo number_format($c["abonado"], 2, ',', '.')?></td>
                                </tr>
                            <?php
                        }
                    ?>
                  
                  
                </tbody>
            </table>
    </div>
    
</div>
<BR><BR>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" id="modal_editar_hoja">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Editar Datos de Reparto</h5>
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
                
                <input class="form-control" id="id_maple_medianitos" value="0" type="number">
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
          <button type="button" class="btn btn-primary" onclick="guardar_hoja_editada()">Guardar Hoja</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" id="modal_agregar_cliente">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Agregar Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="row" id="busqueda_cliente">
            <div class="col">
                <div class="col-sm-12">
                    <label class="" >Escriba Razon Social</label>

                </div>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col">
                            <input class="form-control" id="tipear_cliente" > 
                        </div>
                        <div class="col">
                            <button class="btn-success" onclick="buscar_cliente()">BUSCAR</button>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
        
        <div class="row" id="seleccionar_cliente" style="display: none;">
            <div class="col">
                <div class="col-sm-12">
                    <label >Cliente Seleccionado</label>

                </div>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col">
                            <input class="form-control" id="cliente_seleccionado_texto" disabled="true">
                            <input type="hidden" id="cliente_seleccionado_id" value="0"> 
                        </div>
                        <div class="col">
                            <button class="btn-danger" onclick="eliminar_cliente()"> X Eliminar Cliente</button>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>  
          
        <BR>
        
        <div id="clientes">
            
        </div>
        
        

          
          
          
        
        <br>
        <div class="row">
            <div class="col">
                <div class="col-sm-12">
                    <label class="">Chicos</label>

                </div>
                <div class="col-sm-12">

                    <input class="calculo" id="id_cantidad_maple_chicos_calculo" value="0" type="number">
                </div>
            </div>
            <div class="col">
                <div class="col-sm-12">
                    <label class="">$</label>

                </div>
                <div class="col-sm-12">

                    <input class="calculo" id="id_precio_maple_chicos_calculo" value="0"  type="number">
                </div>
            </div>
            <div class="col">
                <div class="col-sm-12">
                    <label class=""> $ Total</label>

                </div>
                <div class="col-sm-12">

                    <input class="total" id="id_total_maple_chicos_calculo" value="0" type="number" disabled="true">
                </div>
            </div>
            
        </div>
        
        <div class="row">
            <div class="col">
                <div class="col-sm-12">
                    <label class="">Media</label>

                </div>
                <div class="col-sm-12">

                    <input class="calculo" id="id_cantidad_maple_media_calculo" value="0" type="number">
                </div>
            </div>
            <div class="col">
                <div class="col-sm-12">
                    <label class="">$ </label>

                </div>
                <div class="col-sm-12">

                    <input class="calculo" id="id_precio_maple_media_calculo" value="0"  type="number">
                </div>
            </div>
            <div class="col">
                <div class="col-sm-12">
                    <label class=""> $ Total</label>

                </div>
                <div class="col-sm-12">

                    <input class="total" id="id_total_maple_media_calculo" value="0" type="number" disabled="true">
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col">
                <div class="col-sm-12">
                    <label class="">Medtos</label>

                </div>
                <div class="col-sm-12">

                    <input class="calculo" id="id_cantidad_maple_medianitos_calculo" value="0" type="number">
                </div>
            </div>
            <div class="col">
                <div class="col-sm-12">
                    <label class="">$ </label>

                </div>
                <div class="col-sm-12">

                    <input class="calculo" id="id_precio_maple_medianitos_calculo" value="0"  type="number">
                </div>
            </div>
            <div class="col">
                <div class="col-sm-12">
                    <label class=""> $ Total</label>

                </div>
                <div class="col-sm-12">

                    <input class="total" id="id_total_maple_medianitos_calculo" value="0" type="number" disabled="true">
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col">
                <div class="col-sm-12">
                    <label class="">Bolita</label>

                </div>
                <div class="col-sm-12">

                    <input class="calculo" id="id_cantidad_maple_bolita_calculo" value="0" type="number">
                </div>
            </div>
            <div class="col">
                <div class="col-sm-12">
                    <label class="">$ </label>

                </div>
                <div class="col-sm-12">

                    <input class="calculo" id="id_precio_maple_bolita_calculo" value="0"  type="number">
                </div>
            </div>
            <div class="col">
                <div class="col-sm-12">
                    <label class=""> $ Total</label>

                </div>
                <div class="col-sm-12">

                    <input class="total" id="id_total_maple_bolita_calculo" value="0" type="number" disabled="true">
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col">
                <div class="col-sm-12">
                    <label class="">Grand</label>

                </div>
                <div class="col-sm-12">

                    <input class="calculo" id="id_cantidad_maple_grandes_calculo" value="0" type="number">
                </div>
            </div>
            <div class="col">
                <div class="col-sm-12">
                    <label class="">$ </label>

                </div>
                <div class="col-sm-12">

                    <input class="calculo" id="id_precio_maple_grandes_calculo" value="0" type="number">
                </div>
            </div>
            <div class="col">
                <div class="col-sm-12">
                    <label class=""> $ Total</label>

                </div>
                <div class="col-sm-12">

                    <input class="total" id="id_total_maple_grandes_calculo" value="0" type="number" disabled="true">
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col">
                <div class="col-sm-12">
                    <label class="">Extra</label>

                </div>
                <div class="col-sm-12">

                    <input class="calculo" id="id_cantidad_maple_extra_calculo" value="0" type="number">
                </div>
            </div>
            <div class="col">
                <div class="col-sm-12">
                    <label class="">$ </label>

                </div>
                <div class="col-sm-12">

                    <input class="calculo" id="id_precio_maple_extra_calculo" value="0" type="number">
                </div>
            </div>
            <div class="col">
                <div class="col-sm-12">
                    <label class=""> $ Total</label>

                </div>
                <div class="col-sm-12">

                        <input class="total" id="id_total_maple_extra_calculo" value="0" type="number" disabled="true">
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col">
                <div class="col-sm-12">
                    <label class="">Rotos</label>

                </div>
                <div class="col-sm-12">

                    <input class="calculo" id="id_cantidad_maple_rotos_calculo" value="0" type="number">
                </div>
            </div>
            <div class="col">
                <div class="col-sm-12">
                    <label class="">$ </label>

                </div>
                <div class="col-sm-12">

                    <input class="calculo" id="id_precio_maple_rotos_calculo" value="0"  type="number">
                </div>
            </div>
            <div class="col">
                <div class="col-sm-12">
                    <label class=""> $ Total</label>

                </div>
                <div class="col-sm-12">

                    <input class="total" id="id_total_maple_rotos_calculo" value="0" type="number" disabled="true">
                </div>
            </div>
            
        </div>
        
        
        
        <div class="row">
            <div class="col">
                
            </div>
            <div class="col">
              
                
            </div>
            <div class="col">
                
                <div class="col-sm-12">
                    <label> <strong>$ SUMA </strong></label> 
                    <input class="total" id="id_calculo_pedido" value="0" type="number" disabled="true">
                    
                </div>
            </div>
            
        </div>
        <br>
        <div class="row">
            <div class="col">
                <div class="col-sm-12">
                    <label> <strong>$ ANTERIOR</strong></label> 
                    <input class="calculo" id="id_saldo" value="0" type="number" disabled="true">
                    
                </div>
            </div>
            <div class="col">
              <div class="col-sm-12">
                    <label> <strong>$ ACTUAL</strong></label> 
                    <input class="form-control" id="id_actual" value="0" type="number" disabled="true">
                    
                </div>
                
            </div>
            <div class="col">
                
                <div class="col-sm-12">
                    <label> <strong>$ SUMA Total</strong></label> 
                    <input class="form-control" id="id_suma_total" value="0" type="number" disabled="true">
                    
                </div>
            </div>
            
        </div>
        <br>
        <div class="row">
            <div class="col">
                
                
            </div>
            <div class="col">
                <label> <strong>$ ABONADO</strong></label> 
                <input class="form-control" id="id_abonado" value="0" type="number">  
            </div>
        </div>
          
        <br>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="editar_pedido_cliente()" id="boton_editar_cliente">Guardar </button>
        <button type="button" class="btn btn-danger" onclick="eliminar_pedido_cliente()" id="boton_eliminar_cliente">Eliminar </button> 
        <input id="id_edicion" value="0" type="hidden">
        
        <button type="button" class="btn btn-success" onclick="guardar_cliente()" id="boton_nuevo_cliente">Guardar cliente</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>

<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
    
    var id_reparto=<?php echo $reparto["id"]?> ;
    var total_pedido=0;
    
    
    function editar_reparto(id){
        id_reparto=id;
        $.ajax({
            async: false,
            type: "POST",
            url: "<?php echo base_url()?>reparto/get_reparto_json_by_id",
            data:{id:id},
            success:function(data){
                 //alert(data);
                data = JSON.parse(data);

                if(data.exito){
                    
                    $("#id_localidad option[value="+ data.datos.id_localidad_reparto +"]").attr("selected",true);
                    $("#id_carga option[value="+ data.datos.id_galpon +"]").attr("selected",true);
                    $('#id_maple_chicos').val(data.datos.chicos);
                    $('#id_maple_medianos').val(data.datos.medianos);
                    $('#id_maple_medianitos').val(data.datos.medianitos);
                    $('#id_maple_bolita').val(data.datos.bolita);
                    $('#id_maple_grandes').val(data.datos.grandes);
                    $('#id_maple_extras').val(data.datos.extra);
                    $('#id_cartones').val(data.datos.cartones);
                    $('#id_cambio').val(data.datos.cambio_inicial);
                                        
                    $('#modal_editar_hoja').modal('show');
                }else{
                    alert("Error en la carga, intentelo mas tarde!");
                }
            },
            error:function(data){
                console.log(data);
            }
        });
    }
    
    function guardar_hoja_editada(){
        var id_localidad = $('#id_localidad').val();
        var id_carga= $('#id_carga').val();
        var chicos= $('#id_maple_chicos').val();
        var medianos= $('#id_maple_medianos').val();
        var medianitos= $('#id_maple_medianitos').val();
         var bolita= $('#id_maple_bolita').val();
        var grandes= $('#id_maple_grandes').val();
        var extra= $('#id_maple_extras').val();
        var cartones= $('#id_cartones').val();
        var cambio= $('#id_cambio').val();
     
        console.log(id_localidad);
        console.log(id_carga);
        console.log(chicos);
        console.log(medianos);
        console.log(grandes);
        console.log(extra);
        console.log(cartones);
        console.log(cambio);
        
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
                            url: "<?php echo base_url()?>reparto/editar_hoja",
                            data:{id:id_reparto,localidad:id_localidad,carga:id_carga,cambio:cambio,chicos:chicos,medianos:medianos,grandes:grandes,extra:extra,cartones:cartones,medianitos:medianitos,bolita:bolita},
                            success:function(data){
                                 //alert(data);
                                data = JSON.parse(data);
                                
                                if(data.exito){

                                    location.href="<?php echo base_url()?>reparto/ver/"+id_reparto;
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
    
    function modal_agregar_cliente(){
        $('#boton_editar_cliente').hide();
        $('#boton_eliminar_cliente').hide();
        $('#boton_nuevo_cliente').show();
        
        $("#id_cantidad_maple_chicos_calculo").val(0);
        $("#id_precio_maple_chicos_calculo").val(0);
        $("#id_cantidad_maple_media_calculo").val(0);
        $("#id_precio_maple_media_calculo").val(0);
        $("#id_cantidad_maple_extra_calculo").val(0);
        $("#id_precio_maple_extra_calculo").val(0);
        $("#id_cantidad_maple_grandes_calculo").val(0);
        $("#id_precio_maple_grandes_calculo").val(0);
        $("#id_calculo_pedido").val(0);
        $("#id_abonado").val(0);
        
        $("#id_cantidad_maple_medianitos_calculo").val(0);
        $("#id_precio_maple_medianitos_calculo").val(0);
            
        $("#id_cantidad_maple_bolita_calculo").val(0);
        $("#id_precio_maple_bolita_calculo").val(0);
            
        $("#id_cantidad_maple_rotos_calculo").val(0);
        $("#id_precio_maple_rotos_calculo").val(0);
        
        eliminar_cliente();
        verificar_totales();
        
        $('#modal_agregar_cliente').modal('show');
        
    }
    
    function modal_editar_cliente(id,chicos,pre_chicos,media,pre_media,extra,pre_extra,
    grandes,pre_grandes,total,abonado,id_cliente,medianito_c,medianito_p,bolita_c,bolita_p,roto_c,roto_p){
        $('#boton_editar_cliente').show();
        $('#boton_eliminar_cliente').show();
        $('#boton_nuevo_cliente').hide();
        
        $("#id_cantidad_maple_chicos_calculo").val(chicos);
        $("#id_precio_maple_chicos_calculo").val(pre_chicos);
        $("#id_cantidad_maple_media_calculo").val(media);
        $("#id_precio_maple_media_calculo").val(pre_media);
        $("#id_cantidad_maple_extra_calculo").val(extra);
        $("#id_precio_maple_extra_calculo").val(pre_extra);
        $("#id_cantidad_maple_grandes_calculo").val(grandes);
        $("#id_precio_maple_grandes_calculo").val(pre_grandes);
        $("#id_calculo_pedido").val(total);
        $("#id_abonado").val(abonado);
        
        $("#id_cantidad_maple_medianitos_calculo").val(medianito_c);
        $("#id_precio_maple_medianitos_calculo").val(medianito_p);
            
        $("#id_cantidad_maple_bolita_calculo").val(bolita_c);
        $("#id_precio_maple_bolita_calculo").val(bolita_p);
            
        $("#id_cantidad_maple_rotos_calculo").val(roto_c);
        $("#id_precio_maple_rotos_calculo").val(roto_p);
        
        var saldo=0;
        $.ajax({
            async: false,
            type: "POST",
            url: "<?php echo base_url()?>clientes/saldo_cliente_json",
            data:{id:id_cliente},
            success:function(data){
                saldo=data;
            },
            error:function(data){
                console.log(data);
            }
        });
        
        seleccionar_cliente(id_cliente,saldo);
        
        $('#id_edicion').val(id);
        
        $('#modal_agregar_cliente').modal('show');
        
    }
    
    function buscar_cliente(){
        
        var desc=$('#tipear_cliente').val();
        $.ajax({
            async: false,
            type: "POST",
            url: "<?php echo base_url()?>clientes/buscar_cliente",
            data:{texto:desc},
            success:function(data){
                $('#clientes').empty().append(data);
            },
            error:function(data){
                console.log(data);
            }
        });
        
    }
    
    function seleccionar_cliente(id,saldo){
        $('#clientes').empty();
        $('#busqueda_cliente').hide();
        
        $.ajax({
            async: false,
            type: "POST",
            url: "<?php echo base_url()?>clientes/get_cliente",
            data:{id:id},
            success:function(data){
                cli = JSON.parse(data);
                $('#cliente_seleccionado_texto').val(cli.razon_social);
                $('#cliente_seleccionado_id').val(cli.id);
                $('#id_saldo').val(saldo);
                $('#seleccionar_cliente').show();
                verificar_totales();
                
            },
            error:function(data){
                console.log(data);
            }
        });
        
        //alert(id);
    }
    
    function eliminar_cliente(){
        $('#seleccionar_cliente').hide();
        $('#cliente_seleccionado_texto').val("");
        $('#cliente_seleccionado_id').val(0);
        $('#busqueda_cliente').show();
    }
    
    function calcular(maple){
        var id_cantidad="#id_cantidad_maple_"+maple+"_calculo";
        var id_precio="#id_precio_maple_"+maple+"_calculo";
        var id_total="#id_total_maple_"+maple+"_calculo";
        
        var cantidad = $(id_cantidad).val();
        var precio = $(id_precio).val();
        
        var total= 1*precio;
        $(id_total).val(total);
        
        return total;
        
    }
    
    function verificar_totales(){
        var chicos=calcular("chicos");
        var medianos=calcular("media");
        var grandes=calcular("grandes");
        var extra=calcular("extra");
        var medianitos=calcular("medianitos");
        var bolita=calcular("bolita");
        var rotos=calcular("rotos");
        
        total_pedido=chicos+medianos+medianitos+bolita+grandes+extra+rotos;
        
        $("#id_calculo_pedido").val(total_pedido);
        $("#id_actual").val(total_pedido);

        var pedido_actual= $("#id_actual").val();
        var saldo=$("#id_saldo").val();
        var suma_total=parseFloat(pedido_actual)+parseFloat(saldo);
        
        $("#id_suma_total").val(suma_total);
    }
    
    function guardar_cliente(){
        var cliente=$("#cliente_seleccionado_id").val();
        if(cliente==0){
            alert("Seleccione cliente!");
        }else{
            var r=confirm("Confirma la operacion???");
        
        if(r==true){
            
            var chicos_c=$("#id_cantidad_maple_chicos_calculo").val();
            var chicos_p=$("#id_precio_maple_chicos_calculo").val();
            var medio_c=$("#id_cantidad_maple_media_calculo").val();
            var medio_p=$("#id_precio_maple_media_calculo").val();
            var extra_c=$("#id_cantidad_maple_extra_calculo").val();
            var extra_p=$("#id_precio_maple_extra_calculo").val();
            var grand_c=$("#id_cantidad_maple_grandes_calculo").val();
            var grand_p=$("#id_precio_maple_grandes_calculo").val();
            var total=$("#id_calculo_pedido").val();
            var abonado=$("#id_abonado").val();
            
            var medianito_c=$("#id_cantidad_maple_medianitos_calculo").val();
            var medianito_p=$("#id_precio_maple_medianitos_calculo").val();
            
            var bolita_c=$("#id_cantidad_maple_bolita_calculo").val();
            var bolita_p=$("#id_precio_maple_bolita_calculo").val();
            
            var rotos_c=$("#id_cantidad_maple_rotos_calculo").val();
            var rotos_p=$("#id_precio_maple_rotos_calculo").val();
            
        
            $.ajax({
            async: false,
            type: "POST",
            url: "<?php echo base_url()?>reparto/guardar_cliente",
            data:{
                id_reparto:id_reparto,
                cliente:cliente,
                chicos_c:chicos_c,
                chicos_p:chicos_p,
                medio_c:medio_c,
                medio_p:medio_p,
                medianito_c:medianito_c,
                medianito_p:medianito_p,
                bolita_c:bolita_c,
                bolita_p:bolita_p,
                rotos_c:rotos_c,
                rotos_p:rotos_p,
                extra_c:extra_c,
                extra_p:extra_p,
                grand_c:grand_c,
                grand_p:grand_p,
                total:total,
                abonado:abonado
            },
            success:function(data){
                data = JSON.parse(data);
                                
                if(data.exito){
                    location.href="<?php echo base_url()?>reparto/ver/"+id_reparto;
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
    
    function editar_pedido_cliente(){
        var cliente=$("#cliente_seleccionado_id").val();
        if(cliente==0){
            alert("Seleccione cliente!");
        }else{
            var r=confirm("Confirma la operacion???");
        
        if(r==true){
            var id_reparto_detalle=$("#id_edicion").val();
            var chicos_c=$("#id_cantidad_maple_chicos_calculo").val();
            var chicos_p=$("#id_precio_maple_chicos_calculo").val();
            var medio_c=$("#id_cantidad_maple_media_calculo").val();
            var medio_p=$("#id_precio_maple_media_calculo").val();
            var extra_c=$("#id_cantidad_maple_extra_calculo").val();
            var extra_p=$("#id_precio_maple_extra_calculo").val();
            var grand_c=$("#id_cantidad_maple_grandes_calculo").val();
            var grand_p=$("#id_precio_maple_grandes_calculo").val();
            var total=$("#id_calculo_pedido").val();
            var abonado=$("#id_abonado").val();
            
            var medianito_c=$("#id_cantidad_maple_medianitos_calculo").val();
            var medianito_p=$("#id_precio_maple_medianitos_calculo").val();
            
            var bolita_c=$("#id_cantidad_maple_bolita_calculo").val();
            var bolita_p=$("#id_precio_maple_bolita_calculo").val();
            
            var rotos_c=$("#id_cantidad_maple_rotos_calculo").val();
            var rotos_p=$("#id_precio_maple_rotos_calculo").val();
        
            $.ajax({
            async: false,
            type: "POST",
            url: "<?php echo base_url()?>reparto/editar_pedido_cliente",
            data:{
                id_reparto_detalle:id_reparto_detalle,
                id_reparto:id_reparto,
                cliente:cliente,
                chicos_c:chicos_c,
                chicos_p:chicos_p,
                medio_c:medio_c,
                medio_p:medio_p,
                medianito_c:medianito_c,
                medianito_p:medianito_p,
                bolita_c:bolita_c,
                bolita_p:bolita_p,
                rotos_c:rotos_c,
                rotos_p:rotos_p,
                extra_c:extra_c,
                extra_p:extra_p,
                grand_c:grand_c,
                grand_p:grand_p,
                total:total,
                abonado:abonado
            },
            success:function(data){
                data = JSON.parse(data);
                                
                if(data.exito){
                    location.href="<?php echo base_url()?>reparto/ver/"+id_reparto;
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
    
    function eliminar_pedido_cliente(){
        var r=confirm("Confirma la operacion???");
        
        if(r==true){

            var id_reparto_detalle=$("#id_edicion").val();
            $.ajax({
                async: false,
                type: "POST",
                url: "<?php echo base_url()?>reparto/eliminar_pedido",
                data:{id:id_reparto_detalle},
                success:function(data){
                     //alert(data);
                    data = JSON.parse(data);

                    if(data.exito){

                       location.href="<?php echo base_url()?>reparto/ver/"+id_reparto;
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
    
    $(document).ready(function(){
        
        $(".calculo").change(function(){
            verificar_totales();
            
        });
            
    });
    
</script>