<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Servicios_model
 *
 * @author mario
 */
class Servicios_model extends CI_Model
{
    //put your code here
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getServicios()
    {
        $r= $this->db->query("select * from servicios");
        return $r->result_array();
    }
}
