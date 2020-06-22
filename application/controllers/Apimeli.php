<?php defined('BASEPATH') OR exit('No direct script access allowed');

if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('America/Argentina/Buenos_Aires');
}

class Apimeli extends CI_Controller {
    public $token_acces="";
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Apimeli_model');
        $this->load->model('Cliente_model');
        $this->load->model('Configuracion_model');
        $base_token=$this->Configuracion_model->get_configuracion(8);
        $this->token_acces=$base_token["dato"];
    }
    //se obtine el acces token para hacer las consultas
    public function get_acces_token() {
        $base_token=$this->Configuracion_model->get_configuracion(8);
        echo json_encode($base_token);
    }
    // se obtine el listado de las cuentas creadas de mercadolibre de la base de datos
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
    // se insertar por api los clientes que se crean en la app de meli
    public function insert_cliente_api_meli() {
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
    // se insertan las credenciales creadas desde la app y se persisten los datos creados
    public function insert_api_meli() {
        $token = $this->input->post("token");
        
        if($token==$this->token_acces){
            
            $id_cliente=$this->input->post("id_cliente");
            $user_id=$this->input->post("user_id");
            $code=$this->input->post("code");
            $access_token=$this->input->post("access_token");
            $expires_in=$this->input->post("expires_in");
            $refresh_token=$this->input->post("refresh_token");
            $endpoint=$this->input->post("endpoint");
            
            $this->load->helper(array('form', 'url'));

                $this->load->library('form_validation');

                $this->form_validation->set_rules('user_id', 'user_id', 'required');
                $this->form_validation->set_rules('access_token', 'access_token', 'required');
                $this->form_validation->set_rules('expires_in', 'expires_in', 'required');
                $this->form_validation->set_rules('refresh_token', 'refresh_token', 'required');
                
                if ($this->form_validation->run() == FALSE)
                {
                    $listado=array(
                        "code" =>"400",
                        "error" =>"campos incorrectos" 
                     ); 
                }
                else
                {
                    $listado= $this->Apimeli_model->insertar($id_cliente,$user_id,$code,$access_token,$expires_in,$refresh_token,$endpoint);
                }           
            
            
        }else{
            $listado=array(
               "code" =>"401",
               "error" =>"Unauterized=el token no es valido" 
            );
        }
        echo json_encode($listado);
    }
    // se insertan las credenciales creadas desde la app y se persisten los datos creados
    public function update_api_meli() {
        $token = $this->input->post("token");
        
        if($token==$this->token_acces){
            $id=$this->input->post("id");
            $access_token=$this->input->post("access_token");
            $expires_in=$this->input->post("expires_in");
            $refresh_token=$this->input->post("refresh_token");
            
            
            $this->load->helper(array('form', 'url'));

                $this->load->library('form_validation');
                $this->form_validation->set_rules('access_token', 'access_token', 'required');
                $this->form_validation->set_rules('expires_in', 'expires_in', 'required');
                $this->form_validation->set_rules('refresh_token', 'refresh_token', 'required');
                
                if ($this->form_validation->run() == FALSE)
                {
                    $listado=array(
                        "code" =>"400",
                        "error" =>"campos incorrectos" 
                     ); 
                }
                else
                {
                    $listado= $this->Apimeli_model->actualizar($id,$access_token,$expires_in,$refresh_token);
                }           
            
            
        }else{
            $listado=array(
               "code" =>"401",
               "error" =>"Unauterized=el token no es valido" 
            );
        }
        echo json_encode($listado);
    }
    
    // para verificar si existe el usser id en la base de datos y luego verificar si se inserta o se actualizar los tokens
    public function existe_usuario() {
        $token = $this->input->post("token");
        $user = $this->input->post("usser_id");
        
        if($token==$this->token_acces){
            $listado= $this->Apimeli_model->get_api_meli_user($user);
            if(!empty($listado)){
                $listado=array(
                    "code" =>"200",
                    "existe" =>true,
                    "id_meli" =>$listado["id"]
                 ); 
            }else{
                $listado=array(
                    "code" =>"200",
                    "existe" =>false
                 );
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