<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuarios
 *
 * @author mario
 */
class Usuarios_model extends CI_Model
{
    //put your code here
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getUsuario($usuario,$password)
    {
        $r = $this->db->query("select * from usuarios where usuario = '$usuario' and pass = '$password'");
        return $r->row_array();
    }
    
    // Devuelve todos los datos del usuario, pero relacionados.
    function getDatosRelacionados($dni)
    {
        $query = $this->db->query("SELECT dni, correo, usuario, pass, nombre, apellido, telefono, movil,"
                                        . "tipo_usuario.tipo as tipo_usuario, usuarios.direccion,"
                                        . "sucursales.descripcion as sucursal, localidades.descripcion as localidad,"
                                        . "usuarios.imagen,usuarios.inicio,usuarios.operativo from usuarios "
                                        . "INNER JOIN tipo_usuario on usuarios.tipo_usuario = tipo_usuario.codigo "
                                        . "INNER JOIN sucursales on usuarios.cod_sucursal = sucursales.numero "
                                        . "INNER JOIN localidades on usuarios.cod_localidad = localidades.cod_localidad "
                                        . "where dni =".$dni);
        return $query->row_array();
    }
    
    // Cambia los datos del usuario, donde sus CF estan relacionadas
    function actualizaDatosUsuario($dni,$usuario,$pass,$nombre,$apellido,$telefono,$movil,$direccion,$correo,$imagen)
    {
        if($imagen =="")
        {
            $query = $this->db->query("SELECT imagen FROM usuarios where dni = ".$dni);
            $query = $query->row_array();
            $imagen = $query["imagen"];
            
        }
        
        $data = array(
            'usuario' => $usuario,
            'pass' => $pass,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'telefono' => $telefono,
            'movil' => $movil,
            'direccion' => $direccion,
            'correo' => $correo,
            'imagen' =>$imagen
        );
        
        $this->db->where('dni', $dni);
        
        $respuesta =  $this->db->update('usuarios', $data);
        
        var_dump($respuesta);
        // Si no quiso cambiar la imagen
        if($imagen == ""){}
    }
}
