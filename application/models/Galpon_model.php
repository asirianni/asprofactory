<?php

/**

 *

 * @author AdrianSirianni

 *        

 */

class Galpon_model extends CI_Model {

    public function __construct() {
        parent::__construct ();
        $this->load->database();
    }
    
    public function get_galpones(){
        $sql="Select g.id as id, "
                . "g.id_localidad as id_localidad, "
                . "lr.localidad as localidad_descripcion, "
                . "g.nombre_galpon as nombre_galpon, "
                . "g.medianito as medianitos,"
                . "g.bolita as bolita,"
                
                . "g.chicos as chicos, "
                . "g.medianos as medianos, "
                . "g.grandes as grandes, "
                . "g.extra as extra, "
                . "g.cartones as cartones "
                . "from galpones as g, localidades_reparto as lr where g.id_localidad=lr.id";
        $query = $this->db->query($sql);
        
        return $query->result_array();
		
    }
    
    public function get_galpon($id) {
        $sql="Select g.id as id, "
                . "g.id_localidad as id_localidad, "
                . "lr.localidad as localidad_descripcion, "
                . "g.nombre_galpon as nombre_galpon, "
                . "g.medianito as medianitos,"
                . "g.bolita as bolita,"
                
                . "g.chicos as chicos, "
                . "g.medianos as medianos, "
                . "g.grandes as grandes, "
                . "g.extra as extra, "
                . "g.cartones as cartones "
                . "from galpones as g, localidades_reparto as lr"
                . " where g.id=$id";
        $query = $this->db->query($sql);
        return $query->row_array();
    }
    
    
    public function insertar($id_localidad,$nombre_galpon) {
                
        $data = array(
            'id_localidad' => $id_localidad,
            'nombre_galpon' => $nombre_galpon
            
        );

        $accion=$this->db->insert('galpones', $data);
        $insertId = $this->db->insert_id();
        
        return array(
            'exito'=>$accion,
            'id'=>$insertId
        );
    }
    
    public function actualizar_campo_galpon($id,$campo,$dato) {
        $data = array(
                $campo => $dato,
                
        );
        $this->db->where('id', $id);
        $this->db->update('galpones', $data);
    }
    
    public function eliminar_galpon($id) {
        
       $accion=$this->db->delete('galpones', array('id' => $id));
       
       if($accion){
           $this->db->delete('movimiento_galpones', array('id_galpon' => $id));
       }
       
       return array(
            'exito'=>$accion,
            'id'=>$id
        );
       
    }
    
    public function eliminar_movimiento_galpon($id,$galpon) {
        
       $accion=$this->db->delete('movimiento_galpones', array('id' => $id));
       
       $this->actualizar_stock_galpon($galpon);
       
       return array(
            'exito'=>$accion,
            'id'=>$id
        );
       
        
       
    }
    
    public function registrar_movimiento($galpon,$tipo,$chicos,$medianos,$grandes,$extra,$cartones,$usuario,$reparto,$medianito,$bolita,$roto){
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        
        $data = array(
            'tipo_movimiento' => $tipo,
            'chicos' => $chicos,
            'medianos' => $medianos,
            'grandes' => $grandes,
            'extra' => $extra,
            'cartones' => $cartones,
            'id_galpon' => $galpon,
            'id_usuario' => $usuario,
            'id_reparto' => $reparto,
            'medianito' => $medianito,
            'bolita' => $bolita,
            'roto' => $roto,
        );

        $accion=$this->db->insert('movimiento_galpones', $data);
        $insertId = $this->db->insert_id();
        
        $this->actualizar_stock_galpon($galpon);
        
        return array(
            'exito'=>$accion,
            'id'=>$insertId
        );
    }
    
    public function get_entradas_galpon($id_galpon,$id_tipo) {
        $sql="SELECT SUM(chicos) as chicos, SUM(medianos) as medianos, SUM(grandes)as grandes, SUM(extra) as extra, SUM(cartones) as cartones,SUM(medianito) as medianitos,SUM(bolita) as bolita   FROM `movimiento_galpones` WHERE id_galpon=$id_galpon and tipo_movimiento=$id_tipo";
        $query = $this->db->query($sql);
        
        return $query->row_array();
    }
    
    public function actualizar_stock_galpon($galpon) {
        $entradas= $this->get_entradas_galpon($galpon,1);
        $salidas= $this->get_entradas_galpon($galpon,2);
        
        $chicos_t=$entradas["chicos"]-$salidas["chicos"];
        $medianos_t=$entradas["medianos"]-$salidas["medianos"];
        $grandes_t=$entradas["grandes"]-$salidas["grandes"];
        $extra_t=$entradas["extra"]-$salidas["extra"];
        $cartones_t=$entradas["cartones"]-$salidas["cartones"];
        $medianitos_t=$entradas["medianitos"]-$salidas["medianitos"];
        $bolita_t=$entradas["bolita"]-$salidas["bolita"];
        
        $this->actualizar_campo_galpon($galpon,"chicos",$chicos_t);
        $this->actualizar_campo_galpon($galpon,"medianos",$medianos_t);
        $this->actualizar_campo_galpon($galpon,"grandes",$grandes_t);
        $this->actualizar_campo_galpon($galpon,"extra",$extra_t);
        $this->actualizar_campo_galpon($galpon,"cartones",$cartones_t);
        $this->actualizar_campo_galpon($galpon,"medianito",$medianitos_t);
        $this->actualizar_campo_galpon($galpon,"bolita",$bolita_t);
    }
    
    public function listado_movimientos($galpon,$usuario,$tipo,$fecha_hasta,$fecha_desde) {
        $sql="SELECT mg.id as id, "
                . "mg.tipo_movimiento as id_tipo, "
                . "t.movimiento as moviento_detalle, "
                . "mg.fecha as fecha, "
                . "mg.chicos as chicos, "
                . "mg.medianos as medianos, "
                . "mg.medianito as medianitos, "
                . "mg.bolita as bolita, "
                . "mg.grandes as grandes, "
                . "mg.extra as extra, "
                . "mg.cartones as cartones, "
                . "mg.medianito as medianito, "
                . "mg.bolita as bolita, "
                . "mg.id_usuario as id_usuario, "
                . "u.nombre as usuario_nombre "
                . "FROM movimiento_galpones as mg, tipo_movimiento as t, usuarios as u "
                . "WHERE mg.tipo_movimiento=t.id "
                . "and mg.id_usuario=u.id ";
                $sql.= "and mg.id_galpon=$galpon ";
                
                if($usuario!=0){
                   $sql.= "and u.id=$usuario "; 
                }
                
                if($tipo!=0){
                    $sql.="and mg.tipo_movimiento=$tipo";
                }
                
                if(!empty($fecha_hasta)){
                    $sql.="and mg.fecha >= '$fecha_desde 00:00:00' ";
                    $sql.= "and mg.fecha <= '$fecha_hasta 23:59:59'";
                }
                
                
                
        $query = $this->db->query($sql);
        
        return $query->result_array();
    }
    
    
    
        
}        