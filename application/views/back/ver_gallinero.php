

<br><br>
<div class="container">
    <a href="<?php echo base_url()?>gallinas/">GALLINEROS ></a><a href="<?php echo base_url()?>/gallinas/ver_gallinero/<?php echo $gallinero["id"]?>">GALLINERO <?php echo $gallinero["id"]?> </a>
    <br><br>
        
    <h2>Gallinas</h2><br>
    <div class="row">
        <form method="GET" action="<?php echo base_url()?>gallinas/consultar_gallinero">
        <div class="col-sm-12 col-md-3">
            <input class="form-control" value="<?php echo $gallinero["nombre"]?>" disabled="">
        </div>
        <div class="col-sm-12 col-md-3">
            <input class="form-control" value="<?php echo $gallinero["localidad_nombre"]?>" disabled="">
        </div>
        <div class="col-sm-12 col-md-3">
            <select class="form-control" id="estado_formulario_consulta" name="estado">
                <?php 
                    foreach ($estado_gallinas as $e) {
                        ?>
                        <option value="<?php echo $e["id"]?>"><?php echo $e["estado"]?></option>
                        <?php
                    }
                ?>
                <option value="0">TODOS</option>
            </select>
        </div>    
            
        <div class="col-sm-12 col-md-3">
            <input type="hidden" name="id_gallinero" value="<?php echo $gallinero["id"]?>">
            <input type="submit" class="btn btn-warning btn-lg btn-block" value="Consultar"/>
        </div>
            
        </form>
        <div class="col">
            <button class="btn btn-primary btn-lg btn-block" onclick="mostrar_modal_movimientos()">Agregar Gallinas</button>
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
                    <th scope="col">TANDA</th>
                    <th scope="col">CANTIDAD</th>
                    <th scope="col">NACIMIENTO</th>
                    <th scope="col">SEMANA ACTUAL</th>
                    <th scope="col">PESO</th>
                    <th scope="col">ESTADO</th>
                    <th></td>
                </tr>
            </thead>    
        <?php
            
            $total_cantidad=0;
            
            
            foreach ($listado as $l) {
                
                    
                        $total_cantidad=$total_cantidad+$l["cantidad"];
                    
                
                
                ?>
                <tr>
                    <td><?php echo $l["tanda"]?></td>
                    <td><?php echo $l["cantidad"]?></td>
                    <td><?php echo $l["nacimiento"]?></td>
                    <td><?php echo $l["semana"]?></td>
                    <td><?php echo $l["peso"]?></td>
                    <td><?php echo $l["estado"]?></td>
                    <td>
                        <a href="#?" onclick="eliminar_movimiento(<?php echo $l["tanda"]?>)">editar</a>                        
                    </td>
                </tr>
                <?php
            }
            
        ?>
                <tr>
                    <td>TOTAL</td>
                    <td> <?php echo $total_cantidad;?></td>
                    <td></td>
                    <td></td>
                    <td></td>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Nueva Tanda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form id="registro" method="GET" action="<?php echo base_url()?>gallinas/ingresar_gallinas">   
      <div class="modal-body">
        
      
        <div class="row">
            <div class="col-sm-12">
                <label class="" >SELECCIONE SEMANA DE LA TANDA</label>
                
            </div>
            <div class="col-sm-12">
                 
                <select class="form-control" id="semana_tanda" name="semana">
                   <?php 
                        foreach ($semanas as $s) {
                            ?>
                            <option value="<?php echo $s["semana"]?>"><?php echo $s["semana"]?></option>
                            <?php
                        }
                    ?>
                    
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label class="">CANTIDAD INGRESADA</label>
                
            </div>
            <div class="col-sm-12">
                
                <input class="form-control" id="cantidad" name="cantidad" type="number">
            </div>
        </div>
         <div class="row">
            <div class="col-sm-12">
                <label class="">PESO GRAL DE LA TANDA</label>
                
            </div>
            <div class="col-sm-12">
                
                <input class="form-control" id="peso" type="number" name="peso">
            </div>
        </div>
          <div class="row">
            <div class="col-sm-12">
                <label class="">ESTADO DE PRODUCCION</label>
                
            </div>
            <div class="col-sm-12">
                
                <select class="form-control" id="estado_gallinas" name="estado">
                    <?php 
                        foreach ($estado_gallinas as $e) {
                            ?>
                            <option value="<?php echo $e["id"]?>"><?php echo $e["estado"]?></option>
                            <?php
                        }
                    ?>
                    
                   
                </select>
            </div>
        </div>
       
        <br>  
      </div> 
      <div class="modal-footer">
        <input type="hidden" name="id_gallinero" value="<?php echo $gallinero["id"]?>">
        
        <button type="button" class="btn btn-primary" onclick="registrar_nuevo_movimiento()">Registrar Tanda</button>
        
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div></form>
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
        var r=confirm("Confirma la operacion???");
        
        if(r==true){

            $( "#registro" ).submit();

        }
    }
    

    
</script>