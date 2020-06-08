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
class Planes_model extends CI_Model{
    //put your code here
    
    function __construct() {
        parent::__construct();
    }
    
    public function get_planes(){
        $r = $this->db->query("SELECT * FROM planes where mostrar='si'");
        return $r->result_array();
    }
    public function get_plan($id){
        $r = $this->db->query("SELECT * FROM planes where id=$id");
        return $r->row_array();
    }
    
}
