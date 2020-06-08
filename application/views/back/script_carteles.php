<script type="text/javascript">

    function cargar_session(nombre,valor){
            $.ajax({
                async: false,
                type: "POST",
                url: "<?php echo base_url()?>carteles/cargar_datos",
                data:{nombre:nombre,valor:valor},
                beforeSend: function(event){},
                success: function(data){},
                error: function(event){}
            });
        }

    function guardar_borrador(){
        var r=confirm("Confirma la operacion???");
        if(r==true){
            $.ajax({
                    url:"<?php echo base_url()?>/Carteles/borrador",
                    processData: false,
                    contentType: false,
                    method:'POST',
                    success:function(data){
                         //alert(data);
                        data = JSON.parse(data);
                        if(data.exito){
                            
                            location.href="<?php echo base_url()?>proveedor/mis_publicaciones";
                        }else{
                            alert("Error en la carga, intentelo mas tarde!");
                        }
                    },
                    error:function(data){
                        console.log(data);
                    }
                });
        }else{
            
        }
    }
      
</script>    