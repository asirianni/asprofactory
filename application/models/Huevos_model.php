<?php

/**

 *

 * @author AdrianSirianni

 *        

 */

class Huevos_model extends CI_Model {

    public function __construct() {
        parent::__construct ();
        $this->load->database();
    }
    
    public function get_huevos_parametros_cantidades($id){
        $sql="select * from huevos where id=$id";
        $query = $this->db->query($sql);
        return $query->row_array();
		
    }
}
    