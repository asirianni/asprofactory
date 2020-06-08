<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * CLASE QUE TRABAJA CON UNA ENTIDAD 
 * USUARIO PARA OBTENER Y SETEAR SUS 
 * PROPIEDADES
 */

class Sucursal{
    private $id_sucursal;
    private $caja=0;
    private $v_mensual=0;
    private $ganancia=0;
    private $stock_v=0;
    private $usuario=0;
    private $desripcion_sucursal;
    private $id_negocio;
    private $descripcion_negocio;
    private $id_tipo_negocio;
    private $estado;
    
    function getId_sucursal() {
        return $this->id_sucursal;
    }

    function setId_sucursal($id_sucursal) {
        $this->id_sucursal = $id_sucursal;
    }

        function getDesripcion_sucursal() {
        return $this->desripcion_sucursal;
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

    function getEstado() {
        return $this->estado;
    }

    function setDesripcion_sucursal($desripcion_sucursal) {
        $this->desripcion_sucursal = $desripcion_sucursal;
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

    function setEstado($estado) {
        $this->estado = $estado;
    }
    public function __construct() {
        
    }
    public function sucursal($id_sucursal) {
        $this->ci =&get_instance();
        $this->ci->load->model("Negocio_model");
        $this->ci->load->model("Sucursal_model");
        $sucursal=$this->ci->Sucursal_model->get_sucursal($id_sucursal);
        $this->setId_sucursal($sucursal["id"]);
        $this->setDesripcion_sucursal($sucursal["descripcion"]);
        $this->setId_negocio($sucursal["id_negocio"]);
        $this->setDescripcion_negocio($sucursal["razon_social"]);
        $this->setId_tipo_negocio($sucursal["id_tipo"]);
        $this->setDescripcion_negocio($sucursal["tipo"]);
        $this->setEstado($sucursal["estado"]);
        
    }
    
    function getCaja() {
        return $this->caja;
    }

    function getV_mensual() {
        return $this->v_mensual;
    }

    function getGanancia() {
        return $this->ganancia;
    }

    function getStock_v() {
        return $this->stock_v;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function setCaja($caja) {
        $this->caja = $caja;
    }

    function setV_mensual($v_mensual) {
        $this->v_mensual = $v_mensual;
    }

    function setGanancia($ganancia) {
        $this->ganancia = $ganancia;
    }

    function setStock_v($stock_v) {
        $this->stock_v = $stock_v;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }


    
    
        
}