<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * CLASE QUE TRABAJA CON UNA ENTIDAD 
 * USUARIO PARA OBTENER Y SETEAR SUS 
 * PROPIEDADES
 */

class Empresa{
    private $id;
    private $razon_social;
    private $tipo_plan;
    private $listado_sucursales;
    private $cantidad_sucursales_permitidas;
    private $cantidad_sucursales_activas;
    private $plan;
    
    function getPlan() {
        return $this->plan;
    }

    function setPlan($plan) {
        $this->plan = $plan;
    }

        
    function getCantidad_sucursales_permitidas() {
        return $this->cantidad_sucursales_permitidas;
    }

    function getCantidad_sucursales_activas() {
        return $this->cantidad_sucursales_activas;
    }

    function setCantidad_sucursales_permitidas($cantidad_sucursales_permitidas) {
        $this->cantidad_sucursales_permitidas = $cantidad_sucursales_permitidas;
    }

    function setCantidad_sucursales_activas($cantidad_sucursales_activas) {
        $this->cantidad_sucursales_activas = $cantidad_sucursales_activas;
    }

        
    

        
    function getListado_sucursales() {
        return $this->listado_sucursales;
    }

    function setListado_sucursales($listado_sucursales) {
        $this->listado_sucursales = $listado_sucursales;
    }

                
    function getId() {
        return $this->id;
    }

    function getRazon_social() {
        return $this->razon_social;
    }

    function getTipo_plan() {
        return $this->tipo_plan;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setRazon_social($razon_social) {
        $this->razon_social = $razon_social;
    }

    function setTipo_plan($tipo_plan) {
        $this->tipo_plan = $tipo_plan;
    }

        
    public function __construct() {
        $this->ci =&get_instance();
//        $this->ci->load->helper("html");
        $this->ci->load->model("Negocio_model");
        $this->ci->load->model("Sucursal_model");
        $this->ci->load->model("Planes_model");
        $this->ci->load->library("session");
        $this->ci->load->library("sucursal");
        
    }
    
    public function cargar_negocio(){
        $id_negocio=0;
        
        $sessusr=$this->ci->session->userdata('razon_social'); 
        if(isset($sessusr) && trim($sessusr!='')){
            $razon_social=$this->ci->session->userdata('razon_social');
            $tipo_plan=$this->ci->session->userdata('plan');        
            $id_negocio=$this->ci->Negocio_model->insert($razon_social,$tipo_plan);
        }

        return $id_negocio;
    }
    
    public function generar_empresa($id_empresa) {
        
        $empresa=new Empresa();
        $negocio=$this->ci->Negocio_model->get_negocio($id_empresa);
        $empresa->setId($negocio["id"]);
        $empresa->setRazon_social($negocio["razon_social"]);
        $empresa->setTipo_plan($negocio["tipo_plan"]);
        $sucursales=$this->ci->Sucursal_model->get_sucursales($negocio["id"]);
        
        $plan=$this->ci->Planes_model->get_plan($negocio["tipo_plan"]);
        
        
        $listado_sucursales=array();
        foreach ($sucursales as $s) {
            $sucursal=new Sucursal();
            $sucursal->sucursal($s["id"]);
            array_push($listado_sucursales, $sucursal);
        }
        $empresa->setListado_sucursales($listado_sucursales);
        $empresa->setPlan($plan);
        $empresa->setCantidad_sucursales_activas(count($listado_sucursales));
        $empresa->setCantidad_sucursales_permitidas($plan["sucursales"]);
        
        return $empresa;
    }
}