<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Obras_model
 *
 * @author mario
 */
class Obras_model extends CI_Model
{
    //put your code here
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getFotosObras()
    {
        $r = $this->db->query("select * from foto_obras");
        return $r->result_array();
    }
}
