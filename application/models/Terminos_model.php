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
class Terminos_model extends CI_Model{
    //put your code here
    
    function __construct() {
        parent::__construct();
    }
    
     public function get_terminos(){
        $r = $this->db->query("SELECT * FROM terminos where mostrar='si'");
        return $r->result_array();
    }
}
