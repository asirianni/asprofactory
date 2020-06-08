<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Nomenclador_model extends CI_Model {

    public function __construct() {
        parent::__construct ();
        $this->load->database();
    }
    
    public function get_listado() {
        $sql="select * from nomenclador";
        $query = $this->db->query($sql);
        
        return $query->result_array();
    }
    
}    