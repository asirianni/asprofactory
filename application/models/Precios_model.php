<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Precios_model
 *
 * @author mario
 */
class Precios_model extends CI_Model
{
    //put your code here
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getPrecioRelacionado($rubro)
    {
        $r = $this->db->query("select precios.codigo, rubros.descripcion,precios.precio, tipo_valor.valor from precios INNER JOIN tipo_valor on tipo_valor.codigo = precios.tipo_valor INNER JOIN rubros on rubros.codigo = precios.rubro where rubro = $rubro LIMIT 1 ");
        return $r->row_array();
    }
}
