<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Huevos extends CI_Controller {

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
        $this->load->library('grocery_CRUD');
        $this->load->model("Usuario_model");
    }
    
    public function index() {
        
        
        if($this->session->userdata("ingresado") == true)
        {
           
            $output["title"]="Systema Avicola";
                $this->session->set_userdata("abm_general","Huevos");
                $crud = new grocery_CRUD();
                $crud->set_table('huevos');

                //$crud->set_theme('bootstrap');
                $abm = $crud->render();
                
                $this->load->view('back/header',$output);
                $this->load->view('back/abm_general', $abm);
                $this->load->view('back/footer',$output);
                $this->load->view('back/script_abm',$abm);
            
            
        }else{
            
            
            redirect("usuario/ingreso");
        }
    }     
    
 }    