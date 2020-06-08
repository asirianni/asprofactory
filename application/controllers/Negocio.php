<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Negocio extends Super_Controller
{
    
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->library('form_validation');
        $this->load->library('Usuario');
        $this->load->library('Empresa');
        $this->load->model('Configuracion_model');
        $this->load->model('Rubros_model');
        $this->load->model('Terminos_model');
        $this->load->model('Sistemas_model');
        $this->load->model('Planes_model');
        $this->load->model('Negocio_model');
    }
    
        
    public function cargar_negocio() {
        // primero registramos la empresa para que nos devuelva el id 
        // y poder registrar el usuario con esa empresa asociada
        $negocio=new Empresa();
        $id_negocio=$negocio->cargar_negocio();
        
        // luego se registra el usuario con el id de la empresa creada
        $usuario=new Usuario();
        $usuario->cargar_sesion("id_negocio", $id_negocio);
        $usuario->insertar_usuario_administrador();
        $this->mostrar_sucursales();
    }
    
    //var_dump($this->session->userdata());
    public function mostrar_sucursales() {
        if($this->verificar_usuario_session()){
            
            $empresa=new Empresa();
            $empresa_generada=$empresa->generar_empresa($this->session->userdata('id_negocio'));

            $datos_salidas["titulo"]= $this->Configuracion_model->get_configuracion(1);
            $datos_salidas["negocio"]=$empresa_generada;
            $datos_salidas["tipo_negocio"]=$this->Negocio_model->get_tipos_negocio();


            $this->load->view('front/sucursales', $datos_salidas);
        }else{
            redirect("Login/index");
        }
        
    }
    
    
    
    
    
    
}