pedido = [];
cantidad_productos=0;
total = 0;
prueba = [];

var storage;

function cargar_local_store(pedido){
	localStorage['pedido']=JSON.stringify(pedido);
}

function producto(codigo, cod_producto, descripcion, cantidad, precio, total){
	this.cod=codigo;
        this.cod_prod=cod_producto;
	this.desc=descripcion;
	this.cant=cantidad;
	this.pre=precio;
	this.tot=total;
	this.tieneDetalle=false;
	this.detalle="";
}
			
function hayOtroIgual(codigo, cantidad){
	var validacion=false;
	if (cantidad_productos == 0) {
		
	} else {
		var i = 0;
		while (i<pedido.length) { 
			if (pedido[i].cod == codigo) {
				pedido[i].cant=pedido[i].cant+cantidad;
				validacion=true;
				buscar_producto_tabla(codigo, pedido[i].cant, pedido[i].pre);
				break;
			}
			i++;
		}
	}		
	return validacion;
	
}

function restarProducto(codigo, precio, cantidad){
	var cant = 0;
	var i = 0;
	while (i<pedido.length) {
		 
		if (pedido[i].cod == codigo) {
			if (pedido[i].cant<2) {
				eliminar_producto(codigo);
				break;
			} else {
				pedido[i].cant=pedido[i].cant-1;
				cant = pedido[i].cant;
				buscar_producto_tabla(codigo, pedido[i].cant, pedido[i].pre);
				break;
			}
			
			
		}
		i++;
	}
	var total = calcular_total_por_producto(precio, cant);
	imagen2 = document.getElementById('tot_'+codigo);
	imagen2.childNodes[0].nodeValue=total;
	calcular_total();
	cargar_local_store(pedido);
	
}

function agregar_producto(codigo, cod_producto, descripcion, cantidad, precio, tieneDetalle, detalle){
				
		if (!hayOtroIgual(codigo,cantidad)) {
			prod = new producto(codigo, cod_producto, descripcion, cantidad, precio);
			if(tieneDetalle){
				prod.tieneDetalle=true;
				prod.detalle=detalle;
			}
			pedido[cantidad_productos]=prod;
			cantidad_productos++;
			var total = calcular_total_por_producto(precio, cantidad);
			agregar_producto_tabla(codigo, cod_producto, descripcion, cantidad, precio, total);
			calcular_total();
		}
		cargar_local_store(pedido);
					
}

function calcular_total_por_producto(precio, cantidad){
	var total=0;
	total=precio*cantidad;
	return total;
}

function calcular_total(){
	total_final=0;
	var i=0;
	while (i<pedido.length) {
		total_final=total_final+calcular_total_por_producto(pedido[i].pre, pedido[i].cant);
		i++;
	}
	total_final=Math.round(total_final * 100) / 100;	
	imagen = document.getElementById('total_final');
	imagen.childNodes[0].nodeValue=total_final;
	
	imagen = document.getElementById('total_final_menu');
	imagen.childNodes[0].nodeValue=total_final;
	total=total_final;
	
}

function eliminar_producto(codigo){
	var indice = 0;
	var i=0;
	var tieneDetalle=false;
	while (i<pedido.length) {
		if (pedido[i].cod == codigo) {
			indice = i;
			if(pedido[i].tieneDetalle){
				tieneDetalle=pedido[i].tieneDetalle;
			}
			break;
		}				
		i++;
	}
	cantidad_productos--;
	pedido.splice(indice,1);
	imagen = document.getElementById(codigo);	
	padre = imagen.parentNode;
	padre.removeChild(imagen);
	
	if(tieneDetalle){
		codigoDetalle="detalle_"+codigo;
		imagenDetalle = document.getElementById(codigoDetalle);	
		padre = imagenDetalle.parentNode;
		padre.removeChild(imagenDetalle);
	}
	
	calcular_total();
	cargar_local_store(pedido);
	verificar_productos();
}

function buscar_producto_tabla(codigo, cantidad, precio){
	
	imagen = document.getElementById('cant_'+codigo);
	imagen.childNodes[0].nodeValue=cantidad;
	var total = calcular_total_por_producto(precio, cantidad);
	imagen2 = document.getElementById('tot_'+codigo);
	imagen2.childNodes[0].nodeValue=total;
	calcular_total();
}


function verificar_productos(){
	if(cantidad_productos>0){
		//document.getElementById("activate-step-2").disabled = false;
		//labelIndicador = document.getElementById('label-indicador');
		//labelIndicador.childNodes[0].nodeValue="Productos Cargados";
	}else{
		//document.getElementById("activate-step-2").disabled = true;
		//labelIndicador = document.getElementById('label-indicador');
		//labelIndicador.childNodes[0].nodeValue="No tiene productos cargado";
	}
}

function agregar_detalle_al_producto(codigo, detalle){
	var i = 0;
	while (i<pedido.length) { 
		if (pedido[i].cod == codigo) {
			pedido[i].tieneDetalle=true;
			pedido[i].detalle=detalle;
		}
		i++;
	}
}