<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rubros_model
 *
 * @author Dell
 */
class Negocio_model extends CI_Model{
    //put your code here
    
    function __construct() {
        parent::__construct();
    }
    
    public function insert($razon_social,$tipo_plan) {
        $datos = Array(
            "razon_social"=>$razon_social,
            "tipo_plan"=>$tipo_plan
            
        );
        $this->db->insert("negocio",$datos);
        return $this->db->insert_id();
    }
    
    public function get_negocio($id) {
        $r = $this->db->query("select * from negocio where id=$id");
        return $r->row_array();
    }
    
    public function get_tipos_negocio() {
        $r = $this->db->query("select * from tipo_negocio");
        return $r->result_array();
    }
}
