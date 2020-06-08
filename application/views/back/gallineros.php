<div class="container">
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-success btn-lg btn-block" onclick="gallinero();">+ NUEVO GALLINERO</button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-primary btn-lg btn-block" onclick="precios();">PRODUCCION</button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-warning btn-lg btn-block" onclick="huevos();">CONTROL</button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-warning btn-lg btn-block" onclick="nomenclador();">NOMENCLADOR</button>
        </div>
    </div>
</div>
<br><br>
<div class="container">
    <div class="row" >
        
        <?php foreach ($listado_gallineros as $g) {
            ?>
            <div class="col-lg-6 col-sm-12 col-xs-12" style="border-style: dotted;">
                <h1><?php echo $g["nombre"]." - ".$g["localidad_nombre"]?></h1>
                <br>
                <div class="row">
                    <div class="col">
                        <a href=""><img src="<?php echo base_url()?>assets/img/gallinas.png" width="50%"></a><br>
                        <button type="button" class="btn btn-primary btn-lg" onclick="ver_gallinero(<?php echo $g["id"];?>);">Gallinas</button>
                        <?php
                            if(empty($g["tandas_activas"])){
                               ?>
                               <button type="button" class="btn btn-danger btn-lg" onclick="eliminar_gallinero(<?php echo $g["id"];?>)">Eliminar</button>
                               <?php
                            }
                        ?>
                    </div>
                    <div class="col">
                       
                        
                        <?php
                        if(!empty($g["tandas_activas"])){
                            ?>
                        <h5>TANDAS ACTIVAS</h5>
                        <table class="table-responsive">
                            <thead>
                                <tr>
                                    <td>Tanda</td>
                                    
                                    <td>Semana</td>
                                    <td>Cantidad</td>
                                </tr>
                            </thead>
                            
                            
                            <tbody>
                                <?php
                                    foreach ( $g["tandas_activas"] as $t) {
                                      ?>
                                      <tr>
                                        <td><?php echo $t["tanda"]?></td>
                                        
                                        <td><?php echo $t["semana"]?></td>
                                        <td><?php echo $t["cantidad"]?></td>
                                    </tr>
                                      <?php
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                            <?php
                        }else{
                        ?>
                            <h5>NO HAY TANDAS ACTIVAS</h5> 
                        <?php
                            
                        }
                        ?>
                        
                        
                    </div>
                    
                </div>
                <br>
                <div class="row">
                    
                    
                    

                   
                   
                </div>
                
        </div>
            <?php
        }?>
        
        
    </div>
    
</div>
<br><br><br><br>
<div class="container text-center" >
    <div style="background-color:plum" >
        
        <h1>PROXIMO CONTROL: 1-5-2020</h1>

      
        
                
                
        
        

    
    </div>
</div>
<br><br>
<div class="modal" tabindex="-1" role="dialog" id="modal_gallinero">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">REGISTRAR NUEVO GALLINERO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="row">
            <div class="col-sm-12">
                <label class="">NOMBRE GALLINERO</label>
                
            </div>
            <div class="col-sm-12">
                
                <input class="form-control" id="id_nombre_gallinero_registro" value="" type="text">
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
          <button type="button" class="btn btn-primary" onclick="registrar_gallinero()">Registrar Gallinero</button>
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
    function gallinero(){
        $('#modal_gallinero').modal('show');
    }
    
    function registrar_gallinero(){
        
        var nombre= $('#id_nombre_gallinero_registro').val();
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
                            url: "<?php echo base_url()?>gallinas/nuevo_gallinero",
                            data:{nombre:nombre,localidad:localidad},
                            success:function(data){
                                 //alert(data);
                                data = JSON.parse(data);
                                
                                if(data.exito){

                                    location.href="<?php echo base_url()?>gallinas";
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
    
    function eliminar_gallinero(id){
        var r=confirm("Confirma la operacion???");
        
        if(r==true){


            $.ajax({
                async: false,
                type: "POST",
                url: "<?php echo base_url()?>gallinas/eliminar_gallinero",
                data:{id:id},
                success:function(data){
                     //alert(data);
                    data = JSON.parse(data);

                    if(data.exito){

                        location.href="<?php echo base_url()?>gallinas";
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
    
    function ver_gallinero(id){
        location.href="<?php echo base_url()?>gallinas/ver_gallinero/"+id;
    }
    
    function nomenclador(){
        location.href="<?php echo base_url()?>gallinas/nomenclador";
    }
</script>
