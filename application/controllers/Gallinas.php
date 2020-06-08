<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallinas extends CI_Controller {

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
        $this->load->library('grocery_CRUD');
    }
  
    public function index() {
        
        
        if($this->session->userdata("ingresado") == true)
        {
           
            $output["listado_localidades"]= $this->Localidades_model->get_localidades_reparto();
            
            $output["listado_gallineros"]=$this->Gallinas_model->get_gallineros();
            
            for($i=0;$i<count($output["listado_gallineros"]);$i++){
                //echo $output["listado_gallineros"][$i]["id"];
               
                $output["listado_gallineros"][$i]["tandas_activas"]=$this->Gallinas_model->get_listado_gallinas($output["listado_gallineros"][$i]["id"],1);
                
            }
//            var_dump($output["listado_gallineros"]);
//            die();

            $this->load->view('back/header',$output);
            $this->load->view('back/gallineros',$output);
            
            $this->load->view('front/footer',$output);
            
            
        }else{
            
            redirect("usuario/ingreso");
        }
    
    }
    
    public function nomenclador(){
        if($this->validar_acceso()){
            $output["title"]="Systema Avicola";
            $this->session->set_userdata("abm_general","Tabla de Produccion (Nomenclador)");
            $crud = new grocery_CRUD();
            $crud->set_table('nomenclador');
            $crud->columns('semana','porce_produc','peso');
            $abm = $crud->render();

            $this->load->view('back/header',$output);
            $this->load->view('back/abm_general', $abm);
            $this->load->view('back/footer',$output);
            $this->load->view('back/script_abm',$abm);
        }else{
            redirect('usuario/ingreso');
        }
    }
    
    public function ver_gallinero($id) {
        if($this->session->userdata("ingresado") == true && !empty($id))
        {

            $output["listado"]=$this->Gallinas_model->get_listado_gallinas($id,1);
            
            $output["gallinero"]=$this->Gallinas_model->get_gallinero($id);
            $output["semanas"]= $this->Nomenclador_model->get_listado();
            $output["estado_gallinas"]= $this->Gallinas_model->get_estado_gallinas();
            $this->load->view('back/header',$output);
            $this->load->view('back/ver_gallinero',$output);
            
           $this->load->view('front/footer',$output);
            
            
        }else{
            
            
            redirect("usuario/ingreso");
        }
    }
    
    public function consultar_gallinero() {
        if($this->session->userdata("ingresado") == true)
        {
            $id= $this->input->get("id_gallinero");
            $estado= $this->input->get("estado");

            $output["listado"]=$this->Gallinas_model->get_listado_gallinas($id,$estado);
            
            $output["gallinero"]=$this->Gallinas_model->get_gallinero($id);
            $output["semanas"]= $this->Nomenclador_model->get_listado();
            $output["estado_gallinas"]= $this->Gallinas_model->get_estado_gallinas();
            $this->load->view('back/header',$output);
            $this->load->view('back/ver_gallinero',$output);
            
            $this->load->view('front/footer',$output);
            
            
        }else{
            
            
            redirect("usuario/ingreso");
        }
    }
        
    private function validar_acceso(){
        $respuesta = false;
        
        if($this->session->userdata("ingresado") == true )
        {
            $respuesta = true;
        }
        
        return $respuesta;
    }

    public function nuevo_gallinero() {
        $datos_salida=array(
            "id"=>"",
            "exito"=>false
        );
        
        if($this->session->userdata('ingresado') && $this->input->is_ajax_request())
        {
            $nombre = $this->input->post("nombre");
            $localidad = $this->input->post("localidad");
            
            $datos_salida=$this->Gallinas_model->insertar_gallinero($localidad,$nombre);
        }
        
        echo json_encode($datos_salida);
    }
    
    public function eliminar_gallinero() {
        $datos_salida=array(
            "id"=>"",
            "exito"=>false
        );
        
        if($this->session->userdata('ingresado') && $this->input->is_ajax_request())
        {
            $id = $this->input->post("id");
            
            
            $datos_salida=$this->Gallinas_model->eliminar_gallinero($id);
        }
        
        echo json_encode($datos_salida);
    }
    
    public function ingresar_gallinas() {
        
        if($this->session->userdata("ingresado") == true)
        {
            date_default_timezone_set('America/Argentina/Buenos_Aires');
            
            $semana = $this->input->get("semana");
            $cantidad = $this->input->get("cantidad");
            $peso = $this->input->get("peso");
            $estado = $this->input->get("estado");
            $id_gallinero = $this->input->get("id_gallinero");
            
            
            $fecha_actual = date("Y-m-d H:m:i");
            
            $nacimiento=date("Y-m-d H:m:i",strtotime($fecha_actual."- $semana week"));
            
                        
            $this->Gallinas_model->ingresar_gallinas($cantidad,$nacimiento,$semana,$id_gallinero,$peso,$estado);
            redirect("gallinas/ver_gallinero/".$id_gallinero);            
            
        }else{
            
            
            redirect("usuario/ingreso");
        }
        
    }
    
 }    