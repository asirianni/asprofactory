<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sucursales extends CI_Controller
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
        $this->load->model('Sucursal_model');
        $this->load->model('Planes_model');
        $this->load->model('Negocio_model');
    }
    
        
    public function alta_sucursal() {
        
        $datos=array(
            'confirmacion'=>false,
            'mensaje'=>"error no ingreso por medio de la aplicacion"
        );
        
        //verificar si la peticion viene por ajax
        if($this->input->is_ajax_request())
        {
            $id_negocio=$this->session->userdata('id_negocio');
            //verificar si esta permitido la carga de sucursal
            
            
            $descripcion=$this->input->post("descripcion");
            $tipo_negocio=$this->input->post("tipo");
                        
            
            $registrar= $this->Sucursal_model->insert($descripcion,$id_negocio,$tipo_negocio,'op');
            
            if($registrar){
                
                $datos=array(
                    'confirmacion'=>true,
                    'mensaje'=>"exito"
                );
            }else{
                
                $datos=array(
                    'confirmacion'=>false,
                    'mensaje'=>"error al registrar. intente mas tarde"
                );
            }
            
        }
        
        echo json_encode($datos);
        
    }
    
    public function eliminar_sucursal() {
        
        $datos=array(
            'confirmacion'=>false,
            'mensaje'=>"error no ingreso por medio de la aplicacion"
        );
        
        //verificar si la peticion viene por ajax
        if($this->input->is_ajax_request())
        {

            $id=$this->input->post("id");
            
            if($id!=0){
                $registrar= $this->Sucursal_model->delete($id);
            
                if($registrar){

                    $datos=array(
                        'confirmacion'=>true,
                        'mensaje'=>"exito"
                    );
                }else{

                    $datos=array(
                        'confirmacion'=>false,
                        'mensaje'=>"error al registrar. intente mas tarde"
                    );
                }
            }
            
            
            
        }
        
        echo json_encode($datos);
        
    }

    
}