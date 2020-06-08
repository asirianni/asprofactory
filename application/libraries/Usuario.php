<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * CLASE QUE TRABAJA CON UNA ENTIDAD 
 * USUARIO PARA OBTENER Y SETEAR SUS 
 * PROPIEDADES
 */

class Usuario 
{
    private $id;
    private $correo;
    private $password;
    private $nombre;
    private $apellido;
    private $movil;
    private $id_localidad;
    private $localidad;
    private $id_tipo_usuario;
    private $tipo_usuario;
    private $id_estado;
    private $estado;
    private $id_sucursal;
    private $descripcion_sucursal;
    private $id_negocio;
    private $descripcion_negocio;
    private $id_tipo_negocio;
    private $tipo_negocio;
    private $sucursales;
    
    function getSucursales() {
        return $this->sucursales;
    }

    function setSucursales($sucursales) {
        $this->sucursales = $sucursales;
    }

        
    function getId() {
        return $this->id;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getPassword() {
        return $this->password;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getMovil() {
        return $this->movil;
    }

    function getId_localidad() {
        return $this->id_localidad;
    }

    function getLocalidad() {
        return $this->localidad;
    }

    function getId_tipo_usuario() {
        return $this->id_tipo_usuario;
    }

    function getTipo_usuario() {
        return $this->tipo_usuario;
    }

    function getId_estado() {
        return $this->id_estado;
    }

    function getEstado() {
        return $this->estado;
    }

    function getId_sucursal() {
        return $this->id_sucursal;
    }

    function getDescripcion_sucursal() {
        return $this->descripcion_sucursal;
    }

    function getId_negocio() {
        return $this->id_negocio;
    }

    function getDescripcion_negocio() {
        return $this->descripcion_negocio;
    }

    function getId_tipo_negocio() {
        return $this->id_tipo_negocio;
    }

    function getTipo_negocio() {
        return $this->tipo_negocio;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setMovil($movil) {
        $this->movil = $movil;
    }

    function setId_localidad($id_localidad) {
        $this->id_localidad = $id_localidad;
    }

    function setLocalidad($localidad) {
        $this->localidad = $localidad;
    }

    function setId_tipo_usuario($id_tipo_usuario) {
        $this->id_tipo_usuario = $id_tipo_usuario;
    }

    function setTipo_usuario($tipo_usuario) {
        $this->tipo_usuario = $tipo_usuario;
    }

    function setId_estado($id_estado) {
        $this->id_estado = $id_estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setId_sucursal($id_sucursal) {
        $this->id_sucursal = $id_sucursal;
    }

    function setDescripcion_sucursal($descripcion_sucursal) {
        $this->descripcion_sucursal = $descripcion_sucursal;
    }

    function setId_negocio($id_negocio) {
        $this->id_negocio = $id_negocio;
    }

    function setDescripcion_negocio($descripcion_negocio) {
        $this->descripcion_negocio = $descripcion_negocio;
    }

    function setId_tipo_negocio($id_tipo_negocio) {
        $this->id_tipo_negocio = $id_tipo_negocio;
    }

    function setTipo_negocio($tipo_negocio) {
        $this->tipo_negocio = $tipo_negocio;
    }
    
    
    public function __construct() {
        $this->ci =&get_instance();
        $this->ci->load->helper("html");
        $this->ci->load->library("email");
        $this->ci->load->library("session");
        $this->ci->load->library('encrypt');
        $this->ci->load->model("Usuarios_model");
        
    }
    
    
    public function cargar_sesion($nombre_variable, $valor){
        $nuevosdatos = array($nombre_variable=> $valor);
        $this->ci->session->set_userdata($nuevosdatos);
    }
    
    public function iniciar_sesion_usuario($base_usuario) {
        
        $sucursales=$this->ci->Usuarios_model->get_sucursales($base_usuario["id"]) ;
        /// datos del usuario
        $this->cargar_sesion("id_usuario", $base_usuario["id"]);
        $this->cargar_sesion("correo", $base_usuario["correo"]);
        $this->cargar_sesion("nombre", $base_usuario["nombre"]);
        $this->cargar_sesion("apellido", $base_usuario["apellido"]);
        $this->cargar_sesion("telefono", $base_usuario["movil"]);
        $this->cargar_sesion("localidad", $base_usuario["localidad"]);
        $this->cargar_sesion("tipo_usuario", $base_usuario["tipo_usuario"]);
        $this->cargar_sesion("id_negocio", $base_usuario["id_negocio"]);
        $this->cargar_sesion("estado", $base_usuario["estado"]);
        /// sucursal
        $this->cargar_sesion("sucursales", $sucursales);
        $this->cargar_sesion("ingresado", true);
    }
    
    public function insertar_usuario_administrador() {
        
        $correo=$this->ci->session->userdata('correo');
        
        // se obtiene la pass ingresada y se encripta
        
        $pass=$this->ci->session->userdata('pass');
        $pass_encriptada=$this->ci->encrypt->encode($pass);
        
        // se elimina la pass ingresada para que no quede en la session
        $this->ci->session->unset_userdata('pass');
        
        $nombre=$this->ci->session->userdata('nombre');
        $apellido=$this->ci->session->userdata('apellido');
        $movil=$this->ci->session->userdata('telefono');
        $localidad=$this->ci->session->userdata('localidad');
        $id_negocio=$this->ci->session->userdata('id_negocio');
        
        $estado=1;
        $tipo_usuario=1;
        $id_usuario_registrado=$this->ci->Usuarios_model->insert($correo,$pass_encriptada,$nombre,$apellido,$movil,$localidad,$tipo_usuario,$id_negocio,$estado);
        
        //se carga el id del usuario ingresado en la session para utilizar en la session
        $this->cargar_sesion('id_usuario', $id_usuario_registrado);
        
//        echo $this->ci->encrypt->decode($pass_encriptada);
//        var_dump($this->ci->session->userdata());
    }


        
    
}
