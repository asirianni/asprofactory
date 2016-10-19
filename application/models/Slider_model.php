<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Slider_model
 *
 * @author mario
 */
class Slider_model extends CI_Model
{
    //put your code here
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getImagenesSlider()
    {
        $r = $this->db->query("select * from home_slider");
        return $r->result_array();
    }
}
