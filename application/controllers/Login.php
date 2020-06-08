<?php defined('BASEPATH') OR exit('No direct script access allowed');

if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('America/Argentina/Buenos_Aires');
}

class Login extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->library('form_validation');
        $this->load->library('Usuario');
        $this->load->library('encrypt');
        $this->load->model('Configuracion_model');
        $this->load->model('Rubros_model');
        $this->load->model('Terminos_model');
        $this->load->model('Sistemas_model');
        $this->load->model('Usuarios_model');
    }
    
    public function index() {
        $datos_salidas["titulo"]= $this->Configuracion_model->get_configuracion(1);
        $this->load->view('front/loguin', $datos_salidas);
    }
    
    public function registro() {
        $you_recaptcha_site_key='6LePeYwUAAAAAEGbAu1o5oRiburjY1z39xsrbNXe';

        if(ENVIRONMENT=='development'){
            $you_recaptcha_site_key='6LeteYwUAAAAAAKYrtz0burUqdwoq2b0hpwPnGPD';
        }
        
        $datos_salidas["titulo"]= $this->Configuracion_model->get_configuracion(1);
        $datos_salidas["terminos"]= $this->Terminos_model->get_terminos();
        $datos_salidas["you_recaptcha_site_key"]=$you_recaptcha_site_key;
        
        $this->load->view('front/registro', $datos_salidas);
    }
    
    public function get_usuario() {
        if($this->input->is_ajax_request())
        {
            $this->load->model("Usuarios_model");
            $vacio=false;
            $respuesta = $this->Usuarios_model->get_usuario($this->input->post("correo"));
            if (!empty($respuesta)) {
                $vacio=true;
            }
            echo $vacio;
        }
    }
    
    public function get_localidad() {
        $html="no existe localidad, tipee correctamente";
        $this->load->model("Localidad_model");
        $respuesta = $this->Localidad_model->get_localidad($this->input->post("keyword"));
        if(!empty($respuesta)){
            $html="<ul id='lista_localidades'>";
       
            foreach ($respuesta as $r) {
                $html.="<li onClick='agregar_localidad(".$r["codigo"].",&#39;".$r["localidad"]."&#39;)'>".$r["localidad"]."</li>";
            }
            
            $html.="</ul>";
        }
        
        echo $html;
        
    }
    
    public function registro_usuario() {
        $correo=$this->input->post("correo");

        if(!empty($correo)){
            $pass=$this->input->post("pass");
            $localidad=$this->input->post("localidad");
            $nombre=$this->input->post("nombre");
            $apellido=$this->input->post("apellido");
            $telefono=$this->input->post("telefono");
            $recaptcha_select=$this->input->post("recaptcha_response");
            
            // las 2 secret son para poder trabajar en local y en productivo.
            // para utilizacion de la v3 de recaptcha recordar de registrar las dos.
            
            $secret='6LePeYwUAAAAAC9789Cxxgh7gCgC55EVHZ_hqbXh';

            if(ENVIRONMENT=='development'){
                $secret='6LeteYwUAAAAABfG_rSffJ9LfT1uzyJvTWsYpYF_';
            }
            
            // Build POST request:
            $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
            $recaptcha_secret = $secret;
            $recaptcha_response = $recaptcha_select;
            
//            echo $recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response;
//            echo "<br>";
            
            // Make and decode POST request:
            $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
            $recaptcha = json_decode($recaptcha);

            if(isset($recaptcha->score)){
                // Take action based on the score returned:
                if ($recaptcha->score >= 0.5) {
                    $usuario= new Usuario();
                                        
                    $usuario->cargar_sesion("correo", $correo);
                    $usuario->cargar_sesion("pass", $pass);
                    $usuario->cargar_sesion("localidad", $localidad);
                    $usuario->cargar_sesion("nombre", $nombre);
                    $usuario->cargar_sesion("apellido", $apellido);
                    $usuario->cargar_sesion("telefono", $telefono);
                    
                    redirect("Planes/index");
                    
//                    var_dump($this->session->userdata());
                
                    
                } else {
                    redirect("Login/index");
                }
            }else{
                redirect("Login/index");
            }
        }else{
            redirect("Login/index");
        }
        
                
    }
    
    public function ingresar(){
        //verificar si la peticion viene por ajax
        if($this->input->is_ajax_request())
        {
            $correo=$this->input->post("correo");
            $pass=$this->input->post("pass");
        
            $datos=array(
                'exito'=>false,
                'mensaje_principal'=>"Error al ingresar.",
                'usuario'=>false,
                'error_usuario'=>"No existe usuario",
                'pass'=>false,
                'error_pass'=>"Error pass",
            );
            
            $usuario=$this->Usuarios_model->get_usuario($correo);
            if(!empty($usuario)){
                $pass_encriptada=$this->encrypt->decode($usuario["pass"]);
                if($pass_encriptada==$pass){
                    $datos["exito"]=true;
                    $datos["mensaje_principal"]="Exito al ingresar";
                    $datos["usuario"]=true;
                    $datos["error_usuario"]="Correo Correcto";
                    $datos["pass"]=true;
                    $datos["error_pass"]="La pass es correcta";
                    $usser=new Usuario();
                    $usser->iniciar_sesion_usuario($usuario);
                }else{
                    $datos["usuario"]=true;
                    $datos["error_usuario"]="Correo Correcto";
                    $datos["pass"]=false;
                    $datos["error_pass"]="La pass no es correcta";
                }
            }
            echo json_encode($datos);
        }else{
            $this->index();
        }
    }
    
    public function test_loguin() {
        $correo="sirianni.adrian@gmail.com";
        $usuario=$this->Usuarios_model->get_usuario($correo);
        $usser=new Usuario();
        $usser->iniciar_sesion_usuario($usuario);
    }
    
    
}