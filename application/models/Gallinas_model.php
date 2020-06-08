<?php

/**

 *

 * @author AdrianSirianni

 *        

 */

class Gallinas_model extends CI_Model {

    public function __construct() {
        parent::__construct ();
        $this->load->database();
    }
    
    public function get_gallineros(){
        $sql="Select g.id as id, g.nombre as nombre, g.localidad as id_localidad, l.localidad as localidad_nombre from gallinero as g, localidades_reparto as l where g.localidad=l.id";
        $query = $this->db->query($sql);
        
        return $query->result_array();
		
    }
    
    public function get_gallinero($id){
        $sql="Select g.id as id, "
                . "g.nombre as nombre, "
                . "g.localidad as id_localidad, "
                . "l.localidad as localidad_nombre "
                . "from gallinero as g, localidades_reparto as l "
                . "where g.localidad=l.id "
                . "and g.id=$id";
        $query = $this->db->query($sql);
        
        return $query->row_array();
		
    }
    
    public function get_estado_gallinas(){
        $sql="Select * from estado_gallinas";
        $query = $this->db->query($sql);
        
        return $query->result_array();
		
    }
    
    public function insertar_gallinero($id_localidad,$nombre_galpon) {
                
        $data = array(
            'localidad' => $id_localidad,
            'nombre' => $nombre_galpon
            
        );

        $accion=$this->db->insert('gallinero', $data);
        $insertId = $this->db->insert_id();
        
        return array(
            'exito'=>$accion,
            'id'=>$insertId
        );
    }
    
    public function eliminar_gallinero($id) {
        
       $accion=$this->db->delete('gallinero', array('id' => $id));
       
       if($accion){
           $this->db->delete('gallinas', array('id_gallinero' => $id));
       }
       
       return array(
            'exito'=>$accion,
            'id'=>$id
        );
       
    }
    
    public function ingresar_gallinas($cantidad,$nacimiento,$semana_actual,$id_gallinero,$peso,$estado) {
        $data = array(
            'cantidad' => $cantidad,
            'nacimiento' => $nacimiento,
            'semana_actual' => $semana_actual,
            'id_gallinero' => $id_gallinero,
            'peso' => $peso,
            'estado' => $estado
        );

        $this->db->insert('gallinas', $data);
    }
    
    public function get_listado_gallinas($gallinero,$estado) {
        $sql="select g.tanda as tanda,"
                . "g.cantidad as cantidad,"
                . "g.nacimiento as nacimiento,"
                . "g.semana_actual as semana,"
                . "g.peso as peso,"
                . "g.estado as id_estado,"
                . "e.estado as estado from gallinas as g, estado_gallinas as e "
                . "where g.estado=e.id "
                . "and g.id_gallinero=$gallinero";
        
        if($estado!=0){
            $sql.= " and g.estado=$estado "; 
        }
        
        $query = $this->db->query($sql);
        
        return $query->result_array();
    }
}    