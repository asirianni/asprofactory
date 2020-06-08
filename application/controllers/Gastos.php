<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gastos extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model("Usuario_model");
        $this->load->model("Localidades_model");
        $this->load->model("Galpon_model");
        $this->load->model("Usuario_model");
        $this->load->model("Reparto_model");
        $this->load->model("Cliente_model");
        $this->load->model("Gasto_model");
    }
    
    function nuevo_movimiento(){
        $datos_salida=array(
            "id"=>"",
            "exito"=>false
        );
        
        if($this->session->userdata('ingresado') && $this->input->is_ajax_request())
        {
           
            $concepto = $this->input->post("id_concepto");
            $importe=$this->input->post("id_importe");
            $usuario = $this->session->userdata("id");
            
            $datos_salida=$this->Gasto_model->registrar_movimiento($concepto,$importe,$usuario);
        }
        
        echo json_encode($datos_salida);
    }
    
    public function eliminar_movimiento() {
        $datos_salida=array(
            "id"=>"",
            "exito"=>false
        );
        
        if($this->session->userdata('ingresado') && $this->session->userdata("tipo_usuario") ==1 && $this->input->is_ajax_request())
        {
            $id = $this->input->post("id");
            
            
            $datos_salida=$this->Gasto_model->eliminar_movimiento($id);
        }
        
        echo json_encode($datos_salida);
    }
    
}    