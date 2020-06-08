<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produccion extends CI_Controller {

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
        $this->load->model("Gallinas_model");
        $this->load->model("Usuario_model");
        $this->load->model("Nomenclador_model");
        $this->load->model("Produccion_model");
        $this->load->model("Galpon_model");
        $this->load->library('grocery_CRUD');
    }
  
    public function index() {
        
        
        if($this->session->userdata("ingresado") == true)
        {
                      
            $output["listado_gallineros"]=$this->Gallinas_model->get_gallineros();
            $output["produccion"]=$this->Produccion_model->get_listado();
             
            $this->load->view('back/header',$output);
            $this->load->view('back/produccion',$output);
            
            $this->load->view('back/footer',$output);
            
            
        }else{
            
            redirect("usuario/ingreso");
        }
    
    }
    
    public function ver($id) {
        
        
        if($this->session->userdata("ingresado") == true)
        {
                      
            $output["listado_gallineros"]=$this->Gallinas_model->get_gallineros();
            $output["listado_galpones"]=$this->Galpon_model->get_galpones();
            $output["r"]=$this->Produccion_model->get_produccion($id);
            $output["produccion"]=$this->Produccion_model->get_produccion_detalle($id);
//            var_dump($output["produccion"]);
            for($i=0;$i<count($output["produccion"]);$i++){
                $tanda=$this->Gallinas_model->get_tanda($output["produccion"][$i]["tanda"]);               
                $output["produccion"][$i]["gallinas"]=$tanda;
                $output["produccion"][$i]["galpon"]=$this->Gallinas_model->get_gallinero($tanda["id_gallinero"]);
                $output["produccion"][$i]["nomenclador"]=$this->Produccion_model->get_nomenclador($output["produccion"][$i]["semana"]);
            }
            
//            var_dump($output["produccion"]);
//            die();
             
            $this->load->view('back/header',$output);
            $this->load->view('back/produccion_detalle',$output);
            
            $this->load->view('back/footer',$output);
            
            
        }else{
            
            redirect("usuario/ingreso");
        }
    
    }
    
    public function nueva_produccion(){
        $datos_salida=array(
            "id"=>"",
            "exito"=>false
        );
        
        if($this->session->userdata('ingresado') && $this->input->is_ajax_request())
        {
                        
            $datos_salida=$this->Produccion_model->nueva_produccion();
        }
        
        echo json_encode($datos_salida);
    }
    
    public function registrar() {
        $datos_salida=array(
            "id"=>"",
            "exito"=>false
        );
        
        if($this->session->userdata('ingresado') && $this->input->is_ajax_request())
        {
            $id_tanda = $this->input->post("tanda");
            $cantidad = $this->input->post("cantidad");
            $id_produccion = $this->input->post("produccion");
            
            //bucar la tanda de gallinas y obtener la cantidad de gallinas
            
            $tanda_seleccionada=$this->Gallinas_model->get_tanda($id_tanda);
            
            $nomenclador=$this->Produccion_model->get_nomenclador($tanda_seleccionada["semana_actual"]);
            
            $semana=$tanda_seleccionada["semana_actual"];
            $produccion=($cantidad*100)/$tanda_seleccionada["cantidad"];
            $peso=$tanda_seleccionada["peso"];
            
            $datos_salida=$this->Produccion_model->ingresar_tanda($id_tanda,$cantidad,$semana,$produccion,$peso,$id_produccion);
        }
        
        echo json_encode($datos_salida);
    }
    
     public function eliminar_produccion_detalle() {
        $datos_salida=array(
            "id"=>"",
            "exito"=>false
        );
        
        if($this->session->userdata('ingresado') && $this->input->is_ajax_request())
        {
            $id = $this->input->post("id");
            
            
            $datos_salida=$this->Produccion_model->eliminar_detalle_produccion($id);
        }
        
        echo json_encode($datos_salida);
    }
    
    public function eliminar_produccion() {
        $datos_salida=array(
            "id"=>"",
            "exito"=>false
        );
        
        if($this->session->userdata('ingresado') && $this->input->is_ajax_request())
        {
            $id = $this->input->post("id");
            
            
            $datos_salida=$this->Produccion_model->eliminar_produccion($id);
        }
        
        echo json_encode($datos_salida);
    }
    
    public function registrar_clasificacion() {
        if($this->session->userdata("ingresado") == true)
        {
                      
          $id = $this->input->post("id_produccion");
          $rotos = $this->input->post("rotos");
          $chicos = $this->input->post("chicos");
          $media = $this->input->post("media");
          $medianitos = $this->input->post("medianitos");
          $grandes = $this->input->post("grandes");
          $extra = $this->input->post("extra");
          $bolita = $this->input->post("bolita");
          
          $this->Produccion_model->actualizar_campo($id,"rotos",$rotos);
          $this->Produccion_model->actualizar_campo($id,"chicos",$chicos);
          $this->Produccion_model->actualizar_campo($id,"medianos",$media);
          $this->Produccion_model->actualizar_campo($id,"medianitos",$medianitos);
          $this->Produccion_model->actualizar_campo($id,"grandes",$grandes);
          $this->Produccion_model->actualizar_campo($id,"extra",$extra);
          $this->Produccion_model->actualizar_campo($id,"bolita",$bolita);
          
          redirect("produccion/ver/".$id);
          
            
        }else{
            
            redirect("usuario/ingreso");
        }
    }
    
    public function finalizar() {
        $datos_salida=array(
            "id"=>"",
            "exito"=>false
        );
        
        if($this->session->userdata('ingresado') && $this->input->is_ajax_request())
        {
            $id_produccion = $this->input->post("produccion");
            $galpon = $this->input->post("galpon");
            
            $produccion=$this->Produccion_model->get_produccion($id_produccion);
            $usuario = $this->session->userdata("id");
            
            $this->Produccion_model->actualizar_campo($id_produccion,"estado",3);
            $this->Produccion_model->actualizar_campo($id_produccion,"id_galpon",$galpon);
            
            $datos_salida=$this->Galpon_model->registrar_movimiento($galpon,1,$produccion["chicos"],$produccion["medianos"],$produccion["grandes"],$produccion["extra"],0,$usuario,0,$produccion["medianitos"],$produccion["bolita"],$produccion["rotos"]);
                        
        }
        
        echo json_encode($datos_salida);
    }
    
 }    
    