

<br><br>
<div class="container">
    <a href="<?php echo base_url()?>reparto/">REPARTOS ></a><a href="<?php echo base_url()?>reparto/seccion_gastos">GASTOS </a>
    <br><br>
        
    <h2>Ver Movimientos</h2><br>
    <div class="row">
        <form method="GET" action="<?php echo base_url()?>reparto/reporte_gastos">
        <div class="col-sm-12 col-md-4">
            <input class="form-control" type="text" placeholder="DESDE" value="<?php echo $fecha_desde?>" id="fecha_desde" name="fecha_desde">
        </div>
        <div class="col-sm-12 col-md-4">
            <input class="form-control" type="text" placeholder="HASTA" value="<?php echo $fecha_hasta?>" id="fecha_hasta" name="fecha_hasta">
        </div>
            
        <div class="col-sm-12 col-md-4">
            <input type="submit" class="btn btn-warning btn-lg btn-block" value="Consultar"/>
        </div>
            
        </form>
        <div class="col">
            <button class="btn btn-primary btn-lg btn-block" onclick="mostrar_modal_movimientos()">Agregar Movimiento</button>
        </div> 
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
                <th scope="col">CONCEPTO</th>
                <th scope="col">IMPORTE</th>
                <th></td>
            </tr>
        </thead>    
        <?php
            
            $total_salida=0;
            
            
            foreach ($listado as $l) {
                
                    
                        $total_salida=$total_salida+$l["importe"];
                    
                
                
                ?>
                <tr>
                    <td><?php echo $l["id"]?></td>
                    <td><?php echo $l["fecha"]?></td>
                    <td><?php echo $l["nombre_usuario"]?></td>
                    <td><?php echo $l["concepto"]?></td>
                    <td>
                        <?php
                            
                              echo "$ ".number_format($l["importe"], 2, ',', '.');
                            
                        ?>
                    </td>
                    
                    <td>
                        <a href="#?" onclick="eliminar_movimiento(<?php echo $l["id"]?>)">eliminar</a>                        
                    </td>
                </tr>
                <?php
            }
            
        ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>TOTALES</td>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Registrar Gasto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        
        <div class="row">
            <div class="col-sm-12">
                <label class="" >CONCEPTO</label>
                
            </div>
            <div class="col-sm-12">
                
                <input class="form-control" id="id_concepto" type="text">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label class="">$ IMPORTE TOTAL MOVIMIENTO</label>
                
            </div>
            <div class="col-sm-12">
                
                <input class="form-control" id="id_importe" type="number">
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
    
    function mostrar_modal_movimientos(){
        
        $('#modal_movimiento').modal('show');
        
    }
    
    function registrar_nuevo_movimiento(){
        var id_concepto= $('#id_concepto').val();
        var id_importe = $('#id_importe').val();
        
        
        
        console.log(id_importe);
        console.log(id_concepto);
        
        
        if(id_concepto==""){
                alert("COMPLETE EL CONCEPTO DEL GASTO!");
            }else{
                if(id_importe==""){
                    alert("COMPLETE EL IMPORTE DEL GASTO!");
                }else{
                    var r=confirm("Confirma la operacion???");
        
                    if(r==true){


                        $.ajax({
                            async: false,
                            type: "POST",
                            url: "<?php echo base_url()?>gastos/nuevo_movimiento",
                            data:{id_importe:id_importe,id_concepto:id_concepto},
                            success:function(data){
                                 //alert(data);
                                data = JSON.parse(data);
                                
                                if(data.exito){

                                    alert("Gasto Registrado con exito!");
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
    
    function eliminar_movimiento(id){
        var r=confirm("Confirma la operacion???");
        
        
        if(r==true){


            $.ajax({
                async: false,
                type: "POST",
                url: "<?php echo base_url()?>gastos/eliminar_movimiento",
                data:{id:id},
                success:function(data){
                     //alert(data);
                    data = JSON.parse(data);

                    if(data.exito){
                        alert("Gasto eliminado!");
                         location.reload();
                    }else{
                        alert("Error: no se pudo realizar la operacion!");
                    }
                },
                error:function(data){
                    console.log(data);
                }
            });
        }
    }
    
</script>