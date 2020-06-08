<?php

/**

 *

 * @author AdrianSirianni

 *        

 */

class Reparto_model extends CI_Model {

    public function __construct() {
        parent::__construct ();
        $this->load->database();
    }
    
    public function insertar($localidad,$carga,$cambio,$chicos,$medianos,$grandes,$extra,$cartones,$medianito,$bolita) {
        date_default_timezone_set('America/Argentina/Cordoba');        
        $data = array(
            'fecha' => date("Y-m-d H:i:s"),
            'chicos'=>$chicos,
            'medianos'=>$medianos,
            'grandes'=>$grandes,
            'extra'=>$extra,
            'cartones'=>$cartones,
            'cambio_inicial'=>$cambio,
            'total_recaudado'=>$cambio,
            'id_usuario'=>$this->session->userdata("id"),
            'id_estado'=>1,
            'id_localidad_reparto'=>$localidad,
            'id_galpon'=>$carga,
            'medianitos'=>$medianito,
            'bolita'=>$bolita,
            'rotos'=>0
            
        );

        $accion=$this->db->insert('repartos', $data);
        $insertId = $this->db->insert_id();
        
        return array(
            'exito'=>$accion,
            'id'=>$insertId
        );
    }
    
     public function actualizar($id,$localidad,$carga,$cambio,$chicos,$medianos,$grandes,$extra,$cartones,$medianitos,$bolita) {
                
        $data = array(
            
            'chicos'=>$chicos,
            'medianos'=>$medianos,
            'grandes'=>$grandes,
            'extra'=>$extra,
            'cartones'=>$cartones,
            'cambio_inicial'=>$cambio,
            'total_recaudado'=>$cambio,
            'id_usuario'=>$this->session->userdata("id"),
            'medianitos'=>$medianitos,
            'bolita'=>$bolita,
            'id_localidad_reparto'=>$localidad,
            'id_galpon'=>$carga
            
        );

        $this->db->where('id', $id);
        $accion=$this->db->update('repartos', $data);
        
        return array(
            'exito'=>$accion,
            'id'=>$id
        );
    }
    
    public function listado(){
        $sql="SELECT 
                r.id as id,
                r.fecha as fecha,
                r.chicos as chicos,
                r.medianos as medianos,
                r.grandes as grandes,
                r.extra as extra,
                r.cartones as cartones,
                r.medianitos as medianitos,
                r.bolita as bolita,
                r.cambio_inicial as cambio_inicial,
                r.total_recaudado as total,
                u.nombre as nombre_usuario,
                e.estado as descripcion_estado,
                l.localidad as localidad_descripcion,
                g.nombre_galpon as nombre_galpon
                FROM repartos as r, usuarios as u, estado_reparto as e, localidades_reparto as l, galpones as g 
                WHERE r.id_usuario=u.id
                and r.id_estado=e.id
                and r.id_localidad_reparto=l.id
                and r.id_galpon=g.id and r.id_estado=1" ;
        $query = $this->db->query($sql);
        
        return $query->result_array();
		
    }
    
    public function listado_finalizado($fecha_desde,$fecha_hasta){
        $sql="SELECT 
                r.id as id,
                r.fecha as fecha,
                r.chicos as chicos,
                r.medianos as medianos,
                r.grandes as grandes,
                r.extra as extra,
                r.cartones as cartones,
                r.cambio_inicial as cambio_inicial,
                r.total_recaudado as total,
                r.medianitos as medianitos,
                r.bolita as bolita,
                r.rotos as rotos,
                u.nombre as nombre_usuario,
                e.estado as descripcion_estado,
                l.localidad as localidad_descripcion,
                g.nombre_galpon as nombre_galpon
                FROM repartos as r, usuarios as u, estado_reparto as e, localidades_reparto as l, galpones as g 
                WHERE r.id_usuario=u.id
                and r.id_estado=e.id
                and r.id_localidad_reparto=l.id
                and r.id_galpon=g.id and r.id_estado=2" ;
                
                if(!empty($fecha_hasta)){
                    $sql.=" and r.fecha >= '$fecha_desde 00:00:00' ";
                    $sql.= "and r.fecha <= '$fecha_hasta 23:59:59'";
                }
                
        $query = $this->db->query($sql);
        
        return $query->result_array();
		
    }
    
    public function get_reparto($id){
        $sql="SELECT 
                r.id as id,
                r.fecha as fecha,
                r.chicos as chicos,
                r.medianos as medianos,
                r.grandes as grandes,
                r.extra as extra,
                r.cartones as cartones,
                r.bolita as bolita,
                r.medianitos as medianitos,
                r.medianitos as rotos,
                r.cambio_inicial as cambio_inicial,
                r.total_recaudado as total,
                r.id_localidad_reparto as id_localidad_reparto,
                r.id_galpon as id_galpon,
                r.id_usuario as id_usuario,
                u.nombre as nombre_usuario,
                e.estado as descripcion_estado,
                l.localidad as localidad_descripcion,
                g.nombre_galpon as nombre_galpon
                FROM repartos as r, usuarios as u, estado_reparto as e, localidades_reparto as l, galpones as g 
                WHERE r.id_usuario=u.id
                and r.id_estado=e.id
                and r.id_localidad_reparto=l.id
                and r.id_galpon=g.id and r.id=$id" ;
        $query = $this->db->query($sql);
        
        return $query->row_array();
		
    }
    
    public function eliminar($id) {
        
       $accion=$this->db->delete('repartos', array('id' => $id));
       $this->db->delete('reparto_detalle', array('id_reparto' => $id));
       
       return array(
            'exito'=>$accion,
            'id'=>$id
        );
       
    }
    
    public function eliminar_pedido($id) {
        
       $accion=$this->db->delete('reparto_detalle', array('id' => $id));
       
       return array(
            'exito'=>$accion,
            'id'=>$id
        );
       
    }
    
    public function actualizar_campo_reparto($id,$campo,$dato) {
        $data = array(
                $campo => $dato,
                
        );
        $this->db->where('id', $id);
        $accion=$this->db->update('repartos', $data);
        
        return $accion;
    }
    
    public function finalizar($id) {
        
       $accion= $this->actualizar_campo_reparto($id,"id_estado",2);
       
       return array(
            'exito'=>$accion,
            'id'=>$id
        );
       
    }
    
    public function guardar_cliente($id_reparto, 
                                    $cliente, 
                                    $chicos_c, 
                                    $chicos_p,
                                    $medio_c, 
                                    $medio_p, 
                                    $extra_c, 
                                    $extra_p, 
                                    $grand_c, 
                                    $grand_p, 
                                    $total,
                                    $abonado,
                                    $medianito_c,
                                    $medianito_p,
                                    $bolita_c,
                                    $bolita_p,
                                    $rotos_c,
                                    $rotos_p) {
        
        $data = array(
            
            'id_reparto'=>$id_reparto,
            'id_cliente'=>$cliente,
            'chicos'=>$chicos_c,
            'pre_chi'=>$chicos_p,
            'medianos'=>$medio_c,
            'pre_me'=>$medio_p,
            'grandes'=>$grand_c,
            'pre_gra'=>$grand_p,
            'extra'=>$extra_c,
            'pre_extra'=>$extra_p,
            'total'=>$total,
            'abonado'=>$abonado,
            'medianito'=>$medianito_c,
            'media_pre'=>$medianito_p,
            'bolita'=>$bolita_c,
            'boli_pre'=>$bolita_p,
            'rotos'=>$rotos_c,
            'rotos_pre'=>$rotos_p,
            
        );

        $accion=$this->db->insert('reparto_detalle', $data);
        $insertId = $this->db->insert_id();
        
        return array(
            'exito'=>$accion,
            'id'=>$insertId
        );
        
        
    }
    
    public function editar_pedido_cliente($id,$id_reparto, 
                                    $cliente, 
                                    $chicos_c, 
                                    $chicos_p,
                                    $medio_c, 
                                    $medio_p, 
                                    $extra_c, 
                                    $extra_p, 
                                    $grand_c, 
                                    $grand_p, 
                                    $total,
                                    $abonado,
                                    $medianito_c,
                                    $medianito_p,
                                    $bolita_c,
                                    $bolita_p,
                                    $rotos_c,
                                    $rotos_p) {
        
        $data = array(
            
            'id_reparto'=>$id_reparto,
            'id_cliente'=>$cliente,
            'chicos'=>$chicos_c,
            'pre_chi'=>$chicos_p,
            'medianos'=>$medio_c,
            'pre_me'=>$medio_p,
            'grandes'=>$grand_c,
            'pre_gra'=>$grand_p,
            'extra'=>$extra_c,
            'pre_extra'=>$extra_p,
            'total'=>$total,
            'abonado'=>$abonado,
            'medianito'=>$medianito_c,
            'media_pre'=>$medianito_p,
            'bolita'=>$bolita_c,
            'boli_pre'=>$bolita_p,
            'rotos'=>$rotos_c,
            'rotos_pre'=>$rotos_p,
            
        );
        
        $this->db->where('id', $id);
        $accion=$this->db->update('reparto_detalle', $data);

        
        return array(
            'exito'=>$accion,
            'id'=>$id
        );
        
        
    }
    
    public function ventas($reparto){
        $sql="SELECT sum(chicos) as chicos,sum(medianos) as medianos,sum(grandes) as grandes,sum(extra) as extra,sum(abonado) as abonado,sum(bolita) as bolita,sum(medianito) as medianito,sum(rotos) as rotos    FROM reparto_detalle WHERE id_reparto=$reparto";
        
        $query = $this->db->query($sql);
        
        return $query->row_array();
		
    }
    
    public function clientes($reparto){
        $sql="SELECT r.id as id, "
                . "r.id_reparto as id_reparto, "
                . "r.id_cliente as id_cliente, "
                . "r.chicos as chicos, "
                . "r.pre_chi as pre_c, "
                . "r.medianos as medianos, "
                . "r.pre_me as pre_me, "
                . "r.grandes as grandes, "
                . "r.pre_gra as pre_g, "
                . "r.extra as extra, "
                . "r.pre_extra as pre_e, "
                . "r.total as total_pedido, "
                . "r.abonado as abonado, "
                . "r.medianito as medianito, "
                . "r.bolita as bolita, "
                . "r.media_pre as media_pre, "
                . "r.boli_pre as boli_pre, "
                . "r.rotos as rotos, "
                . "r.rotos_pre as rotos_pre,"
                . "c.razon_social as razon_social "
                . "FROM reparto_detalle as r, clientes as c "
                . "WHERE r.id_cliente=c.id and r.id_reparto=$reparto";
        
        $query = $this->db->query($sql);
        
        return $query->result_array();
		
    }
    
    public function reporte_ventas($fecha_desde,$fecha_hasta,$id_localidad){
        $sql="SELECT rd.id as id, "
                . "rd.id_reparto as id_reparto, "
                . "rd.id_cliente as id_cliente, "
                . "rd.chicos as chicos, "
                . "rd.pre_chi as pre_chi, "
                . "rd.medianos as medianos, "
                . "rd.pre_me as pre_me, "
                . "rd.grandes as grandes, "
                . "rd.pre_gra as pre_gra, "
                . "rd.extra as extra, "
                . "rd.pre_gra as pre_extra,  
                   rd.medianito as medianitos,
                   rd.bolita as bolita,
                   rd.rotos as rotos, "
                
                . "rd.total as total_pedido, "
                . "rd.abonado as abonado, "
                . "r.fecha as fecha, "
                . "c.razon_social as razon_social, "
                . "l.localidad as localidad_reparto "
                . "FROM reparto_detalle as rd, repartos as r,clientes as c, localidades_reparto as l "
                . "WHERE rd.id_reparto=r.id and rd.id_cliente=c.id and r.id_localidad_reparto=l.id" ;
                if(!empty($id_localidad)){
                    $sql.=" and  r.id_localidad_reparto=$id_localidad";
                    
                }
                
                if(!empty($fecha_hasta)){
                    $sql.=" and r.fecha >= '$fecha_desde 00:00:00' ";
                    $sql.= "and r.fecha <= '$fecha_hasta 23:59:59'";
                }
                
        $query = $this->db->query($sql);
        
        return $query->result_array();
		
    }
    
}