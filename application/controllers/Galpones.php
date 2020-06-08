<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galpones extends CI_Controller {

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
        $this->load->model("Huevos_model");
        $this->load->model("Usuario_model");
    }
    
    public function index() {
        
        
        if($this->session->userdata("ingresado") == true)
        {
           
            $output["listado_localidades"]= $this->Localidades_model->get_localidades_reparto();
            
            $output["listado_galpones"]=$this->Galpon_model->get_galpones();
            
            $output["parametros_huevos_stock_chicos"]=$this->Huevos_model->get_huevos_parametros_cantidades(1);
            $output["parametros_huevos_stock_medianos"]=$this->Huevos_model->get_huevos_parametros_cantidades(2);
            $output["parametros_huevos_stock_grandes"]=$this->Huevos_model->get_huevos_parametros_cantidades(3);
            $output["parametros_huevos_stock_extra"]=$this->Huevos_model->get_huevos_parametros_cantidades(4);
            $output["parametros_huevos_stock_carton"]=$this->Huevos_model->get_huevos_parametros_cantidades(5);
            $output["parametros_huevos_stock_medianitos"]=$this->Huevos_model->get_huevos_parametros_cantidades(6);
            $output["parametros_huevos_stock_bolita"]=$this->Huevos_model->get_huevos_parametros_cantidades(7);
            
            
            $this->load->view('back/header',$output);
            $this->load->view('back/galpones',$output);
            
            $this->load->view('front/footer',$output);
            
            
        }else{
            
            redirect("usuario/ingreso");
        }
    }
    
    public function nuevo() {
        $datos_salida=array(
            "id"=>"",
            "exito"=>false
        );
        
        if($this->session->userdata('ingresado') && $this->input->is_ajax_request())
        {
            $nombre = $this->input->post("nombre");
            $localidad = $this->input->post("localidad");
            
            $datos_salida=$this->Galpon_model->insertar($localidad,$nombre);
        }
        
        echo json_encode($datos_salida);
    }
    
    public function nuevo_movimiento() {
        $datos_salida=array(
            "id"=>"",
            "exito"=>false
        );
        
        if($this->session->userdata('ingresado') && $this->input->is_ajax_request())
        {
            $galpon = $this->input->post("galpon");
            $tipo = $this->input->post("tipo");
            $chicos = $this->input->post("chicos");
            $medianito = $this->input->post("medianitos");
            $bolita = $this->input->post("bolita");
            $roto = 0;
            $medianos = $this->input->post("medianos");
            $grandes = $this->input->post("grandes");
            $extra = $this->input->post("extra");
            $cartones = $this->input->post("cartones");
            $reparto =$this->input->post("id_reparto");
            $usuario = $this->session->userdata("id");
            
            $datos_salida=$this->Galpon_model->registrar_movimiento($galpon,$tipo,$chicos,$medianos,$grandes,$extra,$cartones,$usuario,$reparto,$medianito,$bolita,$roto);
        }
        
        echo json_encode($datos_salida);
    }
    
    public function eliminar() {
        $datos_salida=array(
            "id"=>"",
            "exito"=>false
        );
        
        if($this->session->userdata('ingresado') && $this->input->is_ajax_request())
        {
            $id = $this->input->post("id");
            
            
            $datos_salida=$this->Galpon_model->eliminar_galpon($id);
        }
        
        echo json_encode($datos_salida);
    }
    
    public function historial($galpon) {
        if($this->session->userdata("ingresado") == true && $galpon!="")
        {
           
            $output["listado_localidades"]= $this->Localidades_model->get_localidades_reparto();
            $output["galpon"]=$this->Galpon_model->get_galpon($galpon);
            
            $fecha = date('Y-m-d');
            $nuevafecha = strtotime ( '-7 day' , strtotime ( $fecha ) ) ;
            $nuevafecha = date ( 'Y-m-d' , $nuevafecha );
            
            $output["fecha_desde"]="";
            $output["fecha_hasta"]="";
            
            $output["usuarios"]= $this->Usuario_model->get_usuarios();
            $output["listado"]=array();
            $this->load->view('back/header',$output);
            $this->load->view('back/historial_galpones',$output);
            
            $this->load->view('front/footer',$output);
            
            
        }else{
            
            redirect("usuario/ingreso");
        }
    }
    
    public function consultar_historial() {
        if($this->session->userdata("ingresado") == true)
        {
            $fecha_desde = $this->input->get("fecha_desde");
            $fecha_hasta = $this->input->get("fecha_hasta");
            $tipo = $this->input->get("tipo");
            $usuario = $this->input->get("usuario");
            $galpon = $this->input->get("galpon");
            
            $output["listado_localidades"]= $this->Localidades_model->get_localidades_reparto();
            $output["galpon"]=$this->Galpon_model->get_galpon($galpon);
            
            
            
            $output["fecha_desde"]=$fecha_desde;
            $output["fecha_hasta"]=$fecha_hasta;
            
            $output["usuarios"]= $this->Usuario_model->get_usuarios();
            
            $output["listado"]=$this->Galpon_model->listado_movimientos($galpon,$usuario,$tipo,$fecha_hasta,$fecha_desde);
            
            $this->load->view('back/header',$output);
            $this->load->view('back/historial_galpones',$output);
            
            $this->load->view('front/footer',$output);
            
            
        }else{
            
            redirect("usuario/ingreso");
        }
    }
    
    public function eliminar_movimiento() {
        $datos_salida=array(
            "id"=>"",
            "exito"=>false
        );
        
        if($this->session->userdata('ingresado') && $this->session->userdata("tipo_usuario") ==1 && $this->input->is_ajax_request())
        {
            $id = $this->input->post("id");
            $galpon = $this->input->post("galpon");
            
            $datos_salida=$this->Galpon_model->eliminar_movimiento_galpon($id,$galpon);
        }
        
        echo json_encode($datos_salida);
    }
    
 }    