

<br><br>
<div class="container">
    <a href="<?php echo base_url()?>reparto/">LISTADO PRINCIPAL</a><a href="">>SECCION VENTAS</a>
    <br><br>
    <div class="row">
       <div class="col">
            <a href="<?php echo base_url()?>reparto/seccion_ventas" class="btn btn-success btn-lg btn-block"> VENTAS</a>
        </div>
        <div class="col">
            <a href="<?php echo base_url()?>clientes/seccion_deudores" class="btn btn-danger btn-lg btn-block"> DEUDORES</a>
        </div>
    </div> 
    <br><br>
    <h2>Reporte de Ventas</h2><br>
    
       
    
    <div class="row">
        <form method="GET" action="<?php echo base_url()?>reparto/reporte_ventas">
        <div class="col-sm-12 col-md-3">
            <input class="form-control" type="text" placeholder="DESDE" value="<?php echo $fecha_desde?>" id="fecha_desde" name="fecha_desde">
        </div>
        <div class="col-sm-12 col-md-3">
            <input class="form-control" type="text" placeholder="HASTA" value="<?php echo $fecha_hasta?>" id="fecha_hasta" name="fecha_hasta">
        </div>
            
        <div class="col-sm-12 col-md-3">
            <select class="form-control" name="localidad" id="localidad_seleccionada">
                <option value="0">Localidad Reparto</option>
                <?php 
                    foreach ($localidades_reparto as $loc) {
                        ?>
                        <option value="<?php echo $loc["id"]?>"><?php echo $loc["localidad"]?></option>
                        <?php
                    }
                ?>
            </select>
        </div>    
        
        <div class="col-sm-12 col-md-3">
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
                <th scope="col">REPARTO</th>
                <th scope="col">FECHA</th>
                <th scope="col">CLIENTE</th>
                <th scope="col">CHICOS</th>
                <th scope="col">MEDIANOS</th>
                <th scope="col">GRANDES</th>
                <th scope="col">EXTRA</th>
                <th scope="col">MEDIANITOS</th>
                <th scope="col">BOLITA</th>
                <th scope="col">ROTOS</th>
                <th scope="col">$ VENTAS</th>
                
                <th scope="col">$ RECAUDADO</th>
                <th></td>
            </tr>
        </thead>    
        <?php
            $total_chicos=0;
            $total_medianos=0;
            $total_grandes=0;
            $total_extra=0;
           
            $total_venta=0;
            $total_recaudado=0;
            
            $total_medianitos=0;
            $total_bolita=0;
            $total_rotos=0;
            
            foreach ($listado as $l) {
                
                    $total_chicos=$total_chicos+$l["chicos"];
                    $total_medianos=$total_medianos+$l["medianos"];
                    $total_grandes=$total_grandes+$l["grandes"];
                    $total_extra=$total_extra+$l["extra"];
                    
                    $total_venta=$total_venta+$l["total_pedido"];
                    $total_recaudado=$total_recaudado+$l["abonado"];
                    
                    $total_medianitos=$total_medianitos+$l["medianitos"];
                    $total_bolita=$total_bolita+$l["bolita"];
                    $total_rotos=$total_rotos+$l["rotos"];
                
                
                ?>
                <tr>
                    <td><?php echo $l["id"]?></td>
                    <td><?php echo $l["localidad_reparto"]?></td>
                    <td><?php echo $l["fecha"]?></td>
                    <td><?php echo $l["razon_social"]?></td>
                    <td><?php echo $l["chicos"]?></td>
                    <td><?php echo $l["medianos"]?></td>
                    <td><?php echo $l["grandes"]?></td>
                    <td><?php echo $l["extra"]?></td>
                    <td><?php echo $l["medianitos"]?></td>
                    <td><?php echo $l["bolita"]?></td>
                    <td><?php echo $l["rotos"]?></td>
                    <td>$ <?php echo number_format($l["total_pedido"], 2, ',', '.')?></td>
                    <td>$ <?php echo number_format($l["abonado"], 2, ',', '.')?></td>
                    <td><a href="<?php echo base_url()?>reparto/ver/<?php echo $l["id_reparto"]?>">VER REPARTO</a></td>
                </tr>
                <?php
            }
            
        ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong>TOTALES</strong></td>
                    <td> <?php echo $total_chicos?></td>
                    <td><?php echo $total_medianos?></td>
                    <td><?php echo $total_grandes?></td>
                    <td><?php echo $total_extra?></td>
                    <td><?php echo $total_medianitos?></td>
                    <td><?php echo $total_bolita?></td>
                    <td><?php echo $total_rotos?></td>
                    <td><strong>$ <?php echo number_format($total_venta, 2, ',', '.')?></strong></td>
                    <td><strong>$ <?php echo number_format($total_recaudado, 2, ',', '.')?></strong></td>
                </tr>
<!--                <tr>
                    <td></td>
                    <td></td>
                    <td><strong>CAJONES</strong></td>
                    <td><strong><?php //echo round($total_chicos/12,2, PHP_ROUND_HALF_DOWN);?></strong></td>
                    <td><strong><?php //echo round($total_medianos/12,2, PHP_ROUND_HALF_DOWN)?></strong></td>
                    <td><strong><?php //echo round($total_grandes/12,2, PHP_ROUND_HALF_DOWN)?></strong></td>
                    <td><strong><?php //echo round($total_extra/12,2, PHP_ROUND_HALF_DOWN)?></strong></td>
                    <td></td>
                    <td></td>
                </tr>-->
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
    
    
</script>