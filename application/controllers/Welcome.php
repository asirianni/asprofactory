<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

        public $pagina;
        public $template;
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
            $this->load->helper('html');
            $this->load->library('form_validation');
            $this->load->library('email');
            $this->load->library('session');
            $this->load->library('Pagina');
            $this->load->library('Template');
            
            
            
            $this->pagina= new Pagina();
            $this->template = new Template();
	}
        
	public function index()
	{
            $salida["template"]= $this->template;
            $salida["contenido"]= $this->template->getPrincipal();
            
            $this->load->view('home/ingreso',$salida);
	}
        
        public function servicios()
	{
            $salida["template"]= $this->template;
            $salida["contenido"]= $this->template->getServicios();
            
            $this->load->view('home/ingreso',$salida);
	}
        
        public function calculo_obra()
	{
            $salida["template"]= $this->template;
            $salida["contenido"]= $this->template->getCalculoObras();
            
            $this->load->view('home/ingreso',$salida);
	}
        
        public function contacto()
	{
            $salida["template"]= $this->template;
            $salida["contenido"]= $this->template->getContacto();
            
            $this->load->view('home/ingreso',$salida);
	}
        
        public function obras()
	{
            $salida["template"]= $this->template;
            $salida["contenido"]= $this->template->getObras();
            
            $this->load->view('home/ingreso',$salida);
	}
        
        
        
        public function acceso()
        {
            $pagina = new Pagina();
            $pagina->generar_pagina_loguin();
            $vista["pagina"]=$pagina;
            $vista["salida_error"]="";
            $this->load->view('loguin', $vista);
	}
        
       
        
        public function validar_usuario(){
            $pagina = new Pagina();
            $pagina->generar_pagina_loguin();
            $output["pagina"]=$pagina;
            
            //$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|valid_email');
            $this->form_validation->set_rules('usuario', 'Usuario', 'required');
            $this->form_validation->set_rules('pass', 'Pass', 'required');
            $this->form_validation->set_message(
                            'required', 'Valor requerido. No lo deje en blanco');
            //$this->form_validation->set_message(
                            //'valid_email', 'Ingrese con mail valido. Ej. jose@suempresa.com');
            if ($this->form_validation->run() == FALSE){
                $output['salida_error']="";
                $this->load->view('loguin', $output);
                
            }else{
                $usuario_ingresado = $this->input->post("usuario");
                $pass_ingresado = $this->input->post("pass");
                
                $this->load->model("Usuarios_model");
                
                $usuario = $this->Usuarios_model->getUsuario($usuario_ingresado,$pass_ingresado);
                
                if($usuario)
                {
                    $datos = Array(
                        "dni"=>$usuario["dni"],
                        "correo"=>$usuario["correo"],
                        "usuario"=>$usuario["usuario"],
                        "pass"=>$usuario["pass"],
                        "nombre"=>$usuario["nombre"],
                        "apellido"=>$usuario["apellido"],
                        "telefono"=>$usuario["telefono"],
                        "movil"=>$usuario["movil"],
                        "tipo_usuario"=>$usuario["tipo_usuario"],
                        "direccion"=>$usuario["direccion"],
                        "imagen"=>$usuario["imagen"],
                        "inicio"=>$usuario["inicio"],
                        "operativo"=>$usuario["operativo"],
                    );
                    
                    $this->session->set_userdata($datos);
                    
                    
                    if($usuario["tipo_usuario"] == "1")
                    {
                        redirect("Administrador");
                    }
                }
                else
                {
                    $output['salida_error']="Datos incorrectos";
                    $this->load->view('loguin', $output);
                }
                
            }
	}
}
