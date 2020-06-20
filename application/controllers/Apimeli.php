<?php defined('BASEPATH') OR exit('No direct script access allowed');

if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('America/Argentina/Buenos_Aires');
}

class Apimeli extends CI_Controller {
    public $token_acces="5114Cirilo1128!";
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Apimeli_model');
        $this->load->model('Cliente_model');
    }
    
    public function get_api_meli() {
        $token = $this->input->post("token");
        if($token==$this->token_acces){
            $listado= $this->Apimeli_model->get_api_meli();
            
        }else{
            $listado=array(
               "code" =>"401",
               "error" =>"Unauterized=el token no es valido" 
            );
        }
        echo json_encode($listado);
        
    }
    
    public function insert_api_meli() {
        $token = $this->input->post("token");
        
        if($token==$this->token_acces){
            
            $razon_social=$this->input->post("razon_social");
            $telefono=$this->input->post("telefono");
            
            $this->load->helper(array('form', 'url'));

                $this->load->library('form_validation');

                $this->form_validation->set_rules('razon_social', 'razon_social', 'required');
                $this->form_validation->set_rules('telefono', 'telefono', 'required');
                
                if ($this->form_validation->run() == FALSE)
                {
                    $listado=array(
                        "code" =>"400",
                        "error" =>"campos incorrectos" 
                     ); 
                }
                else
                {
                    $listado= $this->Cliente_model->insertar($razon_social,$telefono);
                }           
            
            
        }else{
            $listado=array(
               "code" =>"401",
               "error" =>"Unauterized=el token no es valido" 
            );
        }
        echo json_encode($listado);
    }
}