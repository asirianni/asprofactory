

<br><br>
<div class="container">
    <a href="<?php echo base_url()?>reparto/">REPARTOS ></a><a href="<?php echo base_url()?>reparto/listar">LISTADO </a>
    <br><br>
    <h2>Consultar Repartos</h2><br>
    
        
    
    <div class="row">
        <form method="GET" action="<?php echo base_url()?>reparto/consultar_historial">
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
                <th scope="col">CHICOS</th>
                <th scope="col">MEDIANOS</th>
                <th scope="col">GRANDES</th>
                <th scope="col">EXTRA</th>
                <th scope="col">MEDIANITOS</th>
                <th scope="col">BOLITA</th>
                <th scope="col">ROTOS</th>
                <th scope="col">RECAUDADO</th>
                <th></td>
            </tr>
        </thead>    
        <?php
            $total_chicos=0;
            $total_medianos=0;
            $total_grandes=0;
            $total_extra=0;
            $total_cartones=0;
            
            $total_recaudado=0;
            
            $total_medianitos=0;
            $total_bolita=0;
            $total_rotos=0;
            
            foreach ($listado as $l) {
                
                    $total_chicos=$total_chicos+$l["chicos"];
                    $total_medianos=$total_medianos+$l["medianos"];
                    $total_grandes=$total_grandes+$l["grandes"];
                    $total_extra=$total_extra+$l["extra"];
                    $total_cartones=$total_cartones+$l["cartones"];
                    
                    $total_recaudado=$total_recaudado+$l["total"];
                    
                    $total_medianitos=$total_medianitos+$l["medianitos"];
                    $total_bolita=$total_bolita+$l["bolita"];
                    $total_rotos=$total_rotos+$l["rotos"];
                
                
                ?>
                <tr>
                    <td><?php echo $l["id"]?></td>
                    <td><?php echo $l["fecha"]?></td>
                    <td><?php echo $l["nombre_usuario"]?></td>
                    <td><?php echo $l["chicos"]?></td>
                    <td><?php echo $l["medianos"]?></td>
                    <td><?php echo $l["grandes"]?></td>
                    <td><?php echo $l["extra"]?></td>
                    <td><?php echo $l["medianitos"]?></td>
                    <td><?php echo $l["bolita"]?></td>
                    <td><?php echo $l["rotos"]?></td>
                    <td>$ <?php echo number_format($l["total"], 2, ',', '.')?></td>
                    <td><a href="<?php echo base_url()?>reparto/ver/<?php echo $l["id"]?>">VER</a></td>
                </tr>
                <?php
            }
            
        ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td>TOTALES</td>
                    <td> <?php echo $total_chicos?></td>
                    <td><?php echo $total_medianos?></td>
                    <td><?php echo $total_grandes?></td>
                    <td><?php echo $total_extra?></td>
                    <td><?php echo $total_medianitos?></td>
                    <td><?php echo $total_bolita?></td>
                    <td><?php echo $total_rotos?></td>
                     <td>$ <?php echo number_format($total_recaudado, 2, ',', '.')?></td>
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
    
    
</script>