<?php

/**

 *

 * @author AdrianSirianni

 *        

 */

class Gasto_model extends CI_Model {

    public function __construct() {
        parent::__construct ();
        $this->load->database();
    }
    
    public function registrar_movimiento($concepto,$importe,$usuario) {
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $fecha=date("Y-m-d H:i:s");        
        $data = array(
            
            'fecha'=>$fecha,
            'concepto'=>$concepto,
            'importe'=>$importe,
            'id_usuario'=>$usuario,
            
            
        );

        $accion=$this->db->insert('compras', $data);
        $insertId = $this->db->insert_id();
        
        return array(
            'exito'=>$accion,
            'id'=>$insertId
        );
    }
    
    public function reporte_gastos($fecha_desde,$fecha_hasta){
        $sql="SELECT c.id as id, c.fecha as fecha, c.concepto as concepto, c.importe as importe, c.id_usuario as id_usuario, u.nombre as nombre_usuario FROM compras as c, usuarios as u WHERE c.id_usuario=u.id" ;
                
                if(!empty($fecha_hasta)){
                    $sql.=" and c.fecha >= '$fecha_desde 00:00:00' ";
                    $sql.= "and c.fecha <= '$fecha_hasta 23:59:59'";
                }
                
        $query = $this->db->query($sql);
        
        return $query->result_array();
		
    }
    
    public function eliminar_movimiento($id) {
        
       $accion=$this->db->delete('compras', array('id' => $id));
       
       
       
       return array(
            'exito'=>$accion,
            'id'=>$id
        );
       
        
       
    }
    
  }   