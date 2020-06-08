<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cliente_model
 *
 * @author Adrian Sirianni
 */
class Configuracion_model extends CI_Model
{
    //put your code here
    function __construct() {
        parent::__construct();
    }
    
   
    public function get_configuracion($id){
        $r = $this->db->query("SELECT * FROM configuraciones WHERE id = $id");
        return $r->row_array();
    }
    
    
    
 }