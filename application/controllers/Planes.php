<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Planes extends CI_Controller
{
    
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->library('form_validation');
        $this->load->library('Usuario');
        $this->load->model('Configuracion_model');
        $this->load->model('Rubros_model');
        $this->load->model('Terminos_model');
        $this->load->model('Sistemas_model');
        $this->load->model('Planes_model');
    }
    
    public function index() {
        $datos_salidas["titulo"]= $this->Configuracion_model->get_configuracion(1);
        $datos_salidas["planes"]= $this->Planes_model->get_planes();
        
        $this->load->view('front/planes', $datos_salidas);
        
    }
    
    public function seleccionar_plan() {
        
            $id_plan = $this->input->post("id");
            $razon_social = $this->input->post("razon");
            $usuario= new Usuario();                           
            $usuario->cargar_sesion("plan", $id_plan);
            $usuario->cargar_sesion("razon_social", $razon_social);
            
        
    }
}