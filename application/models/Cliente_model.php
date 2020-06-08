<?php

/**

 *

 * @author AdrianSirianni

 *        

 */

class Cliente_model extends CI_Model {

    public function __construct() {
        parent::__construct ();
        $this->load->database();
    }
    
    public function get_clientes(){
        $sql="SELECT * FROM clientes order by id asc";
        
        $query = $this->db->query($sql);
        
        return $query->result_array();
		
    }
    
    public function get_cliente_desc($desc){
        $sql="SELECT * FROM clientes WHERE razon_social LIKE '%$desc%' limit 5";
        
        $query = $this->db->query($sql);
        
        return $query->result_array();
		
    }
    
    public function get_cliente($id){
        $sql="SELECT * FROM clientes WHERE id=$id";
        
        $query = $this->db->query($sql);
        
        return $query->row_array();
		
    }
    
    public function registrar_movimiento($id_cliente,$tipo,$importe,$usuario){
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        
        $data = array(
            'id_movimiento' => $tipo,
            'id_cliente' => $id_cliente,
            'total' => $importe,
            'id_usuario' => $usuario,
           
        );

        $accion=$this->db->insert('movimiento_cliente', $data);
        $insertId = $this->db->insert_id();
        
                
        return array(
            'exito'=>$accion,
            'id'=>$insertId
        );
    }
    
    public function get_saldo($id,$tipo){
        $sql="SELECT sum(total) as total FROM `movimiento_cliente` WHERE id_cliente=$id and id_movimiento=$tipo";
        
        $query = $this->db->query($sql);
        
        return $query->row_array();
		
    }
    
    public function get_listado_saldo_cliente($cliente,$fecha_desde,$fecha_hasta) {
        $sql="SELECT 
            m.id as id, 
            m.id_movimiento as id_movimiento, 
            m.fecha as fecha,
            m.id_cliente as id_cliente,
            m.total as total,
            m.id_reparto_detalle as id_reparto_detalle,
            m.id_usuario as id_usuario,
            u.nombre as nombre_usuario
            FROM movimiento_cliente as m, usuarios as u 
            WHERE m.id_usuario=u.id
            and m.id_cliente=$cliente" ;
                
                if(!empty($fecha_hasta)){
                    $sql.=" and m.fecha >= '$fecha_desde 00:00:00' ";
                    $sql.= "and m.fecha <= '$fecha_hasta 23:59:59'";
                }
//        echo $sql;
//        die();
        $query = $this->db->query($sql);
        
        return $query->result_array();
    }
    
    public function insertar($id_movimiento,$fecha,$id_cliente,$total,$reparto,$id_usuario) {
                
        $data = array(
            
            'id_movimiento'=>$id_movimiento,
            'fecha'=>$fecha,
            'id_cliente'=>$id_cliente,
            'total'=>$total,
            'id_reparto_detalle'=>$reparto,
            'id_usuario'=>$id_usuario
            
        );

        $accion=$this->db->insert('movimiento_cliente', $data);
        $insertId = $this->db->insert_id();
        
        return array(
            'exito'=>$accion,
            'id'=>$insertId
        );
    }
    
    
    
}    