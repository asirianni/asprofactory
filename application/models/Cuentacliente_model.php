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
class Cuentacliente_model extends CI_Model{
    //put your code here
    
    function __construct() {
        parent::__construct();
    }
    
    public function get_cuenta_cliente($id_cliente){
        $r = $this->db->query("Select c.id as id, c.id_cliente as id_cliente, c.tipo_plan as tipo_plan, c.importe as importe, c.dia_vencimiento as dia_vencimiento, c.fecha_vencimiento as fecha_vencimiento, c.fecha_abonado as fecha_abonado, c.estado as estado, e.estado as estado_descripcion from cuenta_cliente c, estado_cuenta e where c.estado=e.id and id_cliente= $id_cliente order by fecha_vencimiento desc");
        return $r->result_array();
    }
    
    public function get_cuenta_cliente_by_id($id_cuenta_cliente){
        $r = $this->db->query("Select cc.id as id, cc.id_cliente as id_cliente, cc.tipo_plan as tipo_plan, p.plan as plan, cc.importe as importe, cc.dia_vencimiento as dia_vencimiento, cc.fecha_vencimiento as fecha_vencimiento, cc.fecha_abonado as fecha_abonado, cc.estado as estado  from cuenta_cliente as cc, planes as p where cc.tipo_plan=p.id and cc.id=$id_cuenta_cliente");
        return $r->row_array();
    }
    
    public function pagar($numero){
    	$datos = Array(
                "fecha_abonado"=>Date("Y-m-d"),
                "estado"=>2
            );
            
        $this->db->where("id",$numero);
        return $this->db->update("cuenta_cliente",$datos);
    }

    public function get_cliente($id_cliente){
        $r = $this->db->query("Select * from clientes where id=$id_cliente");
        return $r->row_array();
    }

    public function get_estado($id){
        $r = $this->db->query("Select * from estado_clientes where id=$id");
        return $r->row_array();
    }

    public function get_plan($id){
        $r = $this->db->query("Select * from planes where id=$id");
        return $r->row_array();
    }

    public function suspender_usuario($id_cliente){
    	$datos = Array(
                "estado"=>2,
            );
            
        $this->db->where("id",$id_cliente);
        return $this->db->update("clientes",$datos);
    }

    public function activar_usuario($id_cliente){
    	$datos = Array(
                "estado"=>1,
            );
            
        $this->db->where("id",$id_cliente);
        return $this->db->update("clientes",$datos);
    }
}