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
class Usuarios_model extends CI_Model{
    //put your code here
    
    function __construct() {
        parent::__construct();
    }
    
    public function get_usuario($correo){
        $r = $this->db->query("SELECT * FROM usuarios where correo='$correo'");
        return $r->row_array();
    }
    
    //obtiene un arreglo con el listado de sucursales asociado al usuario
    // si el listado devuelve nada es por que el usuario es tipo dministrador. Tiene acceso a todos las sucursales.
    // este metodo tiene que ser utilizado siempre luego de validar que el usuario exista por que sino no se valida 
    // la existencia del usaurio. 
    public function get_sucursales($by_usuario) {
        $sucursales="";
        $listado_sucursales = $this->db->query("SELECT * FROM usuariosxsucursal where id_usuario=$by_usuario");
        $lista=$listado_sucursales->result_array();
        foreach ($lista as $s) {
          $sucursales.=" ".$s["id_sucursal"].",";  
        }
        $sucursales=trim($sucursales);
        return $sucursales;
    }
    
    public function insert($correo,$pass,$nombre,$apellido,$movil,$localidad,$tipo_usuario,$id_negocio,$estado) {

        $datos = Array(
            "correo"=>$correo,
            "pass"=>$pass,
            "nombre"=>$nombre,
            "apellido"=>$apellido,
            "movil"=>$movil,
            "localidad"=>$localidad,
            "tipo_usuario"=>$tipo_usuario,
            "id_negocio"=>$id_negocio,
            "estado"=>$estado,
            
        );
        $this->db->insert("usuarios",$datos);
        return $this->db->insert_id();
    }
}