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
class Sucursal_model extends CI_Model{
    //put your code here
    
    function __construct() {
        parent::__construct();
    }
    
    public function insert($descripcion, $id_negocio, $tipo_negocio, $estado) {
        $datos = Array(
            "id"=>'',
            "descripcion"=>$descripcion,
            "id_negocio"=>$id_negocio,
            "tipo_negocio"=>$tipo_negocio,
            "estado"=>$estado
            
        );
        $this->db->insert("sucursales",$datos);
        return $this->db->insert_id();
    }
    
    public function get_sucursales($id) {
        $r = $this->db->query("select * from sucursales where id_negocio=$id");
        return $r->result_array();
    }
    
    public function get_sucursal($id) {
        $r = $this->db->query("SELECT s.id as id, s.descripcion as descripcion, s.id_negocio, n.razon_social, s.tipo_negocio as id_tipo, t.tipo, s.estado as estado FROM sucursales as s, negocio as n, tipo_negocio as t WHERE s.id_negocio=n.id and s.tipo_negocio=t.id and s.id=$id");
        return $r->row_array();
    }
    
    public function delete($id) {
        return $this->db->delete('sucursales', array('id' => $id)); 
    }
}
