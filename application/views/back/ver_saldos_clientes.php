

<br><br>
<?php
    function is_negative_number($number=0){

            if( is_numeric($number) AND ($number<0) ){
                    return true;
            }else{
                    return false;
            }

    }
?>
<div class="container">
    <a href="<?php echo base_url()?>reparto/">REPARTOS ></a><a href="<?php echo base_url()?>clientes/">CLIENTES </a>
    <br><br>
    <h2>Estado de Cuenta: <?php echo $cliente["razon_social"];?></h2><br>
     <div class="row">
        
        <div class="col">
            <h5>Entradas: $ <?php echo number_format($entradas, 2, ',', '.');?></h5>
        </div>
        <div class="col">
            <h5>Salidas: $ <?php echo number_format($salidas, 2, ',', '.');?></h5>
        </div>
        <div class="col">
            <h5>Saldo <?php if(is_negative_number($saldo)){echo "acreedor";}else{echo "deudor";} ?>: $ <?php echo number_format($saldo, 2, ',', '.');?></h5>
        </div>
        <div class="col">
            <button class="btn btn-primary btn-lg btn-block" onclick="mostrar_modal_movimientos()">Agregar Movimiento</button>
        </div> 
        
        
    </div>
    <br><br>
    
    <h2>Ver Movimientos</h2><br>
    <div class="row">
        <form method="GET" action="<?php echo base_url()?>clientes/consultar_movimientos">
        <div class="col-sm-12 col-md-4">
            <input class="form-control" type="text" placeholder="DESDE" value="<?php echo $fecha_desde?>" id="fecha_desde" name="fecha_desde">
        </div>
        <div class="col-sm-12 col-md-4">
            <input class="form-control" type="text" placeholder="HASTA" value="<?php echo $fecha_hasta?>" id="fecha_hasta" name="fecha_hasta">
        </div>
            <input  type="hidden" value="<?php echo $cliente["id"];?>" name="id_cliente">
        <div class="col-sm-12 col-md-4">
            <input type="submit" class="btn btn-warning btn-lg btn-block" value="Consultar"/>
        </div>
        </form>
    </div>
</div>
<BR>


<?php 
if(!empty($listado)){
    
    ?>
<div class="container">
    <h2>Listado</h2>
    <br>
    <div class="table-responsive">
        <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">FECHA</th>
                <th scope="col">USUARIO</th>
                <th scope="col">ENTRADA</th>
                <th scope="col">SALIDA</th>
                <th></td>
            </tr>
        </thead>    
        <?php
            $total_entrada=0;
            $total_salida=0;
            
            
            foreach ($listado as $l) {
                
                    if($l["id_movimiento"]==1){
                        $total_entrada=$total_entrada+$l["total"];
                    }else{
                        $total_salida=$total_salida+$l["total"];
                    }
                
                
                ?>
                <tr>
                    <td><?php echo $l["id"]?></td>
                    <td><?php echo $l["fecha"]?></td>
                    <td><?php echo $l["nombre_usuario"]?></td>
                    <td>
                        <?php
                            if($l["id_movimiento"]==1){
                              echo "$ ".number_format($l["total"], 2, ',', '.');
                            }
                        ?>
                        
                    </td>
                    <td>
                        <?php
                            if($l["id_movimiento"]==2){
                              echo "$ ".number_format($l["total"], 2, ',', '.');
                            }
                        ?>
                    </td>
                    
                    <td>
                        <?php
                            if($l["id_reparto_detalle"]!=0){
                              ?>
                              <a href="<?php echo base_url()?>reparto/ver/<?php echo $l["id_reparto_detalle"]?>">VER REPARTO</a>
                              <?php
                            }
                        ?>
                        
                    </td>
                </tr>
                <?php
            }
            
        ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td>TOTALES</td>
                    <td>$ <?php echo number_format($total_entrada, 2, ',', '.')?></td>
                    <td>$ <?php echo number_format($total_salida, 2, ',', '.')?></td>
                    
                     
                </tr>
    </table>
    </div>
    
</div>
    <?php
}

?>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" id="modal_movimiento">
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
                <label class="">$ IMPORTE TOTAL MOVIMIENTO</label>
                
            </div>
            <div class="col-sm-12">
                
                <input class="form-control" id="id_importe" value="0" type="number">
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


 
<BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>


<link href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.css" rel="stylesheet" media="screen">
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/locales/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>

<script type="text/javascript">
    $(function () {
        $('#fecha_desde').datetimepicker({
            language:  'es',
            format: 'yyyy-mm-dd',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0,
            modal: true
        });
        $('#fecha_hasta').datetimepicker({
            language:  'es',
            format: 'yyyy-mm-dd',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        });;
    });
    var id_cliente=<?php echo $cliente["id"];?>;
    function mostrar_modal_movimientos(){
        
        $('#modal_movimiento').modal('show');
        
    }
    
    function registrar_nuevo_movimiento(){
        var tipo_entrada= $('#tipo_entrada').val();
        var importe = $('#id_importe').val();
        
        
        
        console.log(tipo_entrada);
        console.log(importe);
        
        
        if(tipo_entrada=="0"){
                alert("Seleccione el Tipo de Movimiento.");
            }else{
                var r=confirm("Confirma la operacion???");
        
                if(r==true){


                    $.ajax({
                            async: false,
                            type: "POST",
                            url: "<?php echo base_url()?>clientes/nuevo_movimiento",
                            data:{cliente:id_cliente,tipo:tipo_entrada,importe:importe},
                            success:function(data){
                                 //alert(data);
                                data = JSON.parse(data);
                                
                                if(data.exito){

                                    location.href="<?php echo base_url()?>clientes/ver_saldo_cliente/"+id_cliente;
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
    
</script>