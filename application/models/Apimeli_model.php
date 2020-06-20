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
        $sql="SELECT * FROM api_meli";
        
        $query = $this->db->query($sql);
        
        return $query->result_array();
		
    }
    
}