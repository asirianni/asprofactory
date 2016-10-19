<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//extendemos el controlador base de codeigniter
class Super_Controller extends CI_Controller{
    private $usuario;
    public $pagina;
    public $vehiculo;
    
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->library('session');
        $this->load->library("Pagina");
//        $this->load->library("Usuario");
//        $this->load->library("Vehiculo");
//        $this->load->library('grocery_CRUD');
//        $this->usuario=new Usuario();
          $this->pagina=new Pagina();
//        $this->vehiculo=new Vehiculo();
    }
 
    /**********************************
    *  Mario
    **********************************/
   
   public function miPerfil()
   {
        if ($this->session->userdata("operativo") == "si") 
        {
            $dni=$this->session->userdata('dni');
            
            $this->load->model("Usuarios_model");
            $resultado = $this->Usuarios_model->getDatosRelacionados($dni);
            
               
            $this->session->set_userdata('email', $resultado["correo"]);
            $this->session->set_userdata('nombre', $resultado["nombre"]);
            $this->session->set_userdata('apellido', $resultado["apellido"]);
            $this->session->set_userdata('telefono', $resultado["telefono"]);
            $this->session->set_userdata('movil', $resultado["movil"]);
            $this->session->set_userdata('usuario', $resultado["usuario"]);
            $this->session->set_userdata('inicio', $resultado["inicio"]);
            $this->session->set_userdata('imagen', $resultado["imagen"]);
            $this->session->set_userdata('apellido', $resultado["apellido"]);

            $imagen=base_url()."recursos/img/usuarios/".$resultado["imagen"];
            
            $nombre=$this->session->userdata('nombre');
            $apellido=$this->session->userdata('apellido');
            
            $tipo_usuario = $this->session->userdata("tipo_usuario");
            
            $vista["menu"] = $this->pagina->getMenu($tipo_usuario,$imagen, $dni, $nombre, $apellido);
            $vista["cabecera"] = $this->pagina->getCabecera($tipo_usuario,$imagen, $dni, $nombre, $apellido);
            
            
            
            
            $vista["detalle"] = 
            $this->pagina->generar_render_datos_personales($resultado["dni"],
                                        $resultado["correo"],$resultado["usuario"],$resultado["pass"],$resultado["nombre"],
                                        $resultado["apellido"],$resultado["telefono"],$resultado["movil"],$resultado["tipo_usuario"],
                                        $resultado["direccion"],$resultado["sucursal"],$resultado["localidad"],base_url()."recursos/img/usuarios/".$resultado["imagen"],
                                        $resultado["inicio"],$resultado["operativo"]); // fin de funcion generar datos personales
            
            $vista["seccion"] = "Mi perfil";
            $this->load->view('administrador/vista_general.php',$vista);
        }
        else
        {
            redirect("welcome/acceso");
        }
   }  
   
   public function actualizar_datos()
    { 
        if($this->input->post())
        {
            if ($this->session->userdata("operativo") == "si") 
            {
                
               
                // SUBIDA DE IMAGEN
                $imagen ="";
                $config['upload_path'] = "./recursos/img/usuarios/";
                $config['allowed_types'] = "jpg";

                    $this->load->library("upload",$config);

                if($this->upload->do_upload("imagen")) // si se sube la imagen
                {
                   $imagen = $this->upload->data("file_name");
                }
                // fin subida de imagen
                
                
                $this->load->model("Usuarios_model");
                $this->Usuarios_model->actualizaDatosUsuario($this->session->userdata('dni'),$this->input->post("usuario"),$this->input->post("password"),
                                                                $this->input->post("nombre"),$this->input->post("apellido"),
                                                                $this->input->post("telefono"),$this->input->post("movil"),
                                                                $this->input->post("direccion"),
                                                                $this->input->post("correo"),$imagen);
                
                /*$this->usuario->actualizarDatos($dni,$this->input->post("usuario"),$this->input->post("password"),
                                                                $this->input->post("nombre"),$this->input->post("apellido"),
                                                                $this->input->post("telefono"),$this->input->post("movil"),
                                                                $this->input->post("direccion"),
                                                                $this->input->post("correo"),$imagen);*/
                
                redirect("Administrador/miPerfil");
            }
            else
            {
                redirect("Welcome/acceso");
            }
        }
        else
        {
            redirect("Welcome/acceso");
        }
    }
    
    
    public function abm_imagenes_slider()
	{
            if (true) {
                try{
                
                $crud = new Grocery_CRUD();
                $crud->set_table("home_slider");
                
                $crud->required_fields('titulo','descripcion','imagen');
                
                $crud->columns(array('codigo','titulo','descripcion','imagen'));
                $crud->set_field_upload('imagen','recursos/images/');
                $output_detalle = $crud->render();
                $texto_pagina="Administrar";
                $leyenda="vehiculos";        
                
                $imagen=base_url()."recursos/img/empleados/".$this->session->userdata('imagen');
                $dni=$this->session->userdata('dni');
                $nombre=$this->session->userdata('nombre');
                $apellido=$this->session->userdata('apellido');
                $vista["menu"] = $this->pagina->menu_administrador($imagen, $dni, $nombre, $apellido);
                $vista["cabecera"] = $this->pagina->cabecera_administrador($imagen, $dni, $nombre, $apellido);
                $vista["seccion"] = "Escritorio";
                $vista["config"] = $this->pagina->generar_configuraciones();
                $this->load->view('administrador/cabecera.php',$vista);
                $this->load->view('administrador/detalle.php',$output_detalle);
                $this->load->view('administrador/pie.php',$vista);
                
                
                }catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
            }  else {
                redirect('/welcome/acceso');
            }
	}
    
    public function cerrar_sesion()
    {
        $this->session->sess_destroy();
        redirect("Welcome/acceso");
    }
    
    
}