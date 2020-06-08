<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sistemas_model
 *
 * @author Dell
 */
class Sistemas_model extends CI_Model {
    //put your code here
    function __construct() {
        parent::__construct();
    }
    public function get_sistemas(){
        $r = $this->db->query("SELECT * FROM sistemas where mostrar='si'");
        return $r->result_array();
    }
}
