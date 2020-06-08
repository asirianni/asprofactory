<?php
    function is_negative_number($number=0){

            if( is_numeric($number) AND ($number<=0) ){
                    return true;
            }else{
                    return false;
            }

    }
?>

<br><br>
<div class="container">
    <a href="<?php echo base_url()?>reparto/">LISTADO PRINCIPAL</a><a href="">>SECCION DEUDORES</a>
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
    <h2>Reporte Deudores</h2><br>
    
       
    
    
</div>
<BR>


<?php 
if(!empty($listado)){
    
    ?>
<div class="container">
    <h2>Listado deudores en violeta</h2>
    <br>
    <div class="table-responsive">
        <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">RAZON SOCIAL</th>
                <th scope="col">ENTRADAS</th>
                <th scope="col">SALIDAS</th>
                <th scope="col">SALDO</th>
                
                <th></td>
            </tr>
        </thead>    
        <?php
            
           
            $total_entradas=0;
            $total_salidas=0;
            $total_saldos=0;
            
            foreach ($listado as $l) {

                    $total_entradas=$total_entradas+$l["ventas"]["entradas"];
                    $total_salidas=$total_salidas+$l["ventas"]["salidas"];
                    $total_saldos=$total_saldos+$l["ventas"]["saldos"];
                
                
                ?>
                <tr <?php if(is_negative_number($l["ventas"]["saldos"])){}else{echo "style='background-color: violet'";} ?>>
                    <td ><?php echo $l["id"]?></td>
                    <td><?php echo $l["razon_social"]?></td>
                    <td> $ <?php echo number_format($l["ventas"]["entradas"], 2, ',', '.')?></td>
                    <td> $ <?php echo number_format($l["ventas"]["salidas"], 2, ',', '.')?></td>
                    <td> $ <?php echo number_format($l["ventas"]["saldos"], 2, ',', '.')?></td>
                     <td><a href="<?php echo base_url()?>clientes/ver_saldo_cliente/<?php echo $l["id"]?>">VER CUENTA</a></td>
                </tr>
                <?php
            }
            
        ?>
                <tr>
                    
                    <td></td>
                    <td><strong>TOTALES</strong></td>
                    <td>$ <?php echo number_format($total_entradas, 2, ',', '.')?></td>
                    <td>$ <?php echo number_format($total_salidas, 2, ',', '.')?></td>
                    <td>$ <?php echo number_format($total_saldos, 2, ',', '.')?></td>
                    
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
