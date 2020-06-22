<?php

/**

 *

 * @author AdrianSirianni

 *        

 */

class Apimeli_model extends CI_Model {

    public function __construct() {
        parent::__construct ();
        $this->load->database();
    }
    
    public function get_api_meli(){
        $sql="SELECT * FROM api_meli where estado='activo'";
        
        $query = $this->db->query($sql);
        
        return $query->result_array();
		
    }
    
    public function get_api_meli_user($user){
        $sql="SELECT * FROM api_meli where user_id=$user";
        
        $query = $this->db->query($sql);
        
        return $query->row_array();
		
    }
    
    public function insertar($id_cliente,$user_id,$code,$access_token,$expires_in,$refresh_token,$endpoint) {
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $fecha=date("Y-m-d H:i:s");
        $data = array(
            
            'id_cliente'=>$id_cliente,
            'user_id'=>$user_id,
            'code'=>$code,
            'access_token'=>$access_token,
            'expires_in'=>$expires_in,
            'refresh_token'=>$refresh_token,
            'endpoint'=>$endpoint,
            'estado'=>'activo',
            'fecha'=>$fecha,
        );

        $accion=$this->db->insert('api_meli', $data);
        $insertId = $this->db->insert_id();
        
        return array(
            'exito'=>$accion,
            'id'=>$insertId
        );
    }
    
    public function actualizar($id,$access_token,$expires_in,$refresh_token){
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $fecha=date("Y-m-d H:i:s");
    	$datos = Array(
                'access_token'=>$access_token,
                'expires_in'=>$expires_in,
                'refresh_token'=>$refresh_token,
                'fecha'=>$fecha,
            );
            
        $this->db->where("id",$id);
        $accion= $this->db->update("api_meli",$datos);
        
        return array(
            'exito'=>$accion,
            'id'=>$id,
            'actualizacion'=>$fecha
        );
    }
    
}