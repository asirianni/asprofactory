
<h2>Historial de Movimientos</h2>
 <br>
<div class="container">
    <h2>Stock Actual de <?php echo $galpon["nombre_galpon"]?></h2><br>
    <div class="row">
        
        
        <div class="col-lg-3 col-sm-12 col-xs-12" style="background-color: greenyellow; border-style: solid; display: flex; justify-content: center;align-items: center;">
            <h6><strong>CHICOS:    <?php echo $galpon["chicos"]?> </strong></h6>
        </div>
        <div class="col-lg-3 col-sm-12 col-xs-12" style="background-color: greenyellow; border-style: solid; display: flex; justify-content: center;align-items: center;">
            <h6><strong>MEDIANOS:    <?php echo $galpon["medianos"]?> </strong></h6>
        </div>
        <div class="col-lg-3 col-sm-12 col-xs-12" style="background-color: greenyellow; border-style: solid; display: flex; justify-content: center;align-items: center;">
            <h6><strong>MEDIANITOS:    <?php echo $galpon["medianitos"]?> </strong></h6>
        </div>
        <div class="col-lg-3 col-sm-12 col-xs-12" style="background-color: greenyellow; border-style: solid; display: flex; justify-content: center;align-items: center;">
            <h6><strong>BOLITA:    <?php echo $galpon["bolita"]?> </strong></h6>
        </div>
        
    </div>
    <div class="row">
        
        
        
        <div class="col-lg-4 col-sm-12 col-xs-12" style="background-color: greenyellow; border-style: solid; display: flex; justify-content: center;align-items: center;">
            <h6><strong>GRANDES:    <?php echo $galpon["grandes"]?> </strong></h6>
        </div>
        <div class="col-lg-4 col-sm-12 col-xs-12" style="background-color: greenyellow; border-style: solid; display: flex; justify-content: center;align-items: center;">
            <h6><strong>EXTRA:    <?php echo $galpon["extra"]?> </strong></h6>
        </div>
        <div class="col-lg-4 col-sm-12 col-xs-12" style="background-color: greenyellow; border-style: solid; display: flex; justify-content: center;align-items: center;">
            <h6><strong>CARTONES:    <?php echo $galpon["cartones"]?> </strong></h6>
        </div>
    </div>
    <br><br>
    <h2>Consultar Movimientos</h2><br>
    
        
    
    <div class="row">
        <form method="GET" action="<?php echo base_url()?>galpones/consultar_historial">
        <div class="col-sm-12 col-md-2">
            <input class="form-control" type="text" placeholder="DESDE" value="<?php echo $fecha_desde?>" id="fecha_desde" name="fecha_desde">
        </div>
        <div class="col-sm-12 col-md-2">
            <input class="form-control" type="text" placeholder="HASTA" value="<?php echo $fecha_hasta?>" id="fecha_hasta" name="fecha_hasta">
        </div>
        <div class="col-sm-12 col-md-2">
            <select class="form-control" id="tipo_entrada" name="usuario">
                <option value="0">USUARIO</option>
                <?php
                    foreach ($usuarios as $u) {
                        ?>
                <option value="<?php echo $u["id"]?>"><?php echo $u["nombre"]?></option>
                        <?php
                    }
                ?>
            </select>
        </div>
        <div class="col-sm-12 col-md-2">
            <select class="form-control" id="tipo_entrada" name="tipo">
                <option value="0">OPERACION</option>
                <option value="1">ENTRADA</option>
                <option value="2">SALIDA</option>
            </select>
        </div>
            <input type="hidden" value="<?php echo $galpon["id"]?>" name="galpon" >
        <div class="col-sm-12 col-md-2">
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
                <th scope="col">MOVIMIENTO</th>
                <th scope="col">FECHA</th>
                <th scope="col">USUARIO</th>
                <th scope="col">CHICOS</th>
                <th scope="col">MEDIANOS</th>
                <th scope="col">MEDIANITOS</th>
                <th scope="col">BOLITA</th>
                <th scope="col">GRANDES</th>
                <th scope="col">EXTRA</th>
                <th scope="col">CARTONES</th>
                <th></td>
            </tr>
        </thead>    
        <?php
            $total_chicos=0;
            $total_medianos=0;
            $total_grandes=0;
            $total_extra=0;
            $total_cartones=0;
            $total_bolita=0;
            $total_medianitos=0;
            
            foreach ($listado as $l) {
                if($l["id_tipo"]==1){
                    $total_chicos=$total_chicos+$l["chicos"];
                    $total_medianos=$total_medianos+$l["medianos"];
                    $total_grandes=$total_grandes+$l["grandes"];
                    $total_extra=$total_extra+$l["extra"];
                    $total_cartones=$total_cartones+$l["cartones"];
                    $total_bolita=$total_bolita+$l["bolita"];
                    $total_medianitos=$total_medianitos+$l["medianitos"];
                }else{
                    $total_chicos=$total_chicos-$l["chicos"];
                    $total_medianos=$total_medianos-$l["medianos"];
                    $total_grandes=$total_grandes-$l["grandes"];
                    $total_extra=$total_extra-$l["extra"];
                    $total_cartones=$total_cartones-$l["cartones"];
                    $total_bolita=$total_bolita-$l["bolita"];
                    $total_medianitos=$total_medianitos-$l["medianitos"];
                }
                
                
                ?>
                <tr>
                    <td><?php echo $l["moviento_detalle"]?></td>
                    <td><?php echo $l["fecha"]?></td>
                    <td><?php echo $l["usuario_nombre"]?></td>
                    <td><?php if($l["id_tipo"]!=1){echo "-";} echo $l["chicos"]?></td>
                    <td><?php if($l["id_tipo"]!=1){echo "-";} echo $l["medianos"]?></td>
                    <td><?php if($l["id_tipo"]!=1){echo "-";} echo $l["medianitos"]?></td>
                    <td><?php if($l["id_tipo"]!=1){echo "-";} echo $l["bolita"]?></td>
                    <td><?php if($l["id_tipo"]!=1){echo "-";} echo $l["grandes"]?></td>
                    <td><?php if($l["id_tipo"]!=1){echo "-";} echo $l["extra"]?></td>
                    <td><?php if($l["id_tipo"]!=1){echo "-";} echo $l["cartones"]?></td>
                    <td><a href="#?" onclick="eliminar_movimiento(<?php echo $l["id"]?>)">eliminar</a></td>
                </tr>
                <?php
            }
            
        ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td>TOTALES</td>
                    <td><?php echo $total_chicos?></td>
                    <td><?php echo $total_medianos?></td>
                    <td><?php echo $total_medianitos?></td>
                    <td><?php echo $total_bolita?></td>
                    <td><?php echo $total_grandes?></td>
                    <td><?php echo $total_extra?></td>
                    <td><?php echo $total_cartones?></td>
                </tr>
    </table>
    </div>
    
</div>
    <?php
}

?>



 
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
    
    function eliminar_movimiento(id){
        var r=confirm("Confirma la operacion???");
        var galpon=<?php echo $galpon["id"]?>;
        
        if(r==true){


            $.ajax({
                async: false,
                type: "POST",
                url: "<?php echo base_url()?>galpones/eliminar_movimiento",
                data:{id:id,galpon:galpon},
                success:function(data){
                     //alert(data);
                    data = JSON.parse(data);

                    if(data.exito){
                        location.href="<?php echo base_url()?>galpones/historial/"+galpon;
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
