<?php defined('BASEPATH') OR exit('No direct script access allowed');

if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('America/Argentina/Buenos_Aires');
}

class Welcome extends CI_Controller {

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
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->helper('html');
            $this->load->library('form_validation');
            $this->load->model('Configuracion_model');
            $this->load->model('Rubros_model');
            $this->load->model('Sistemas_model');
        }
        
        public function index()
	{
            $datos_salidas["titulo"]= $this->Configuracion_model->get_configuracion(1);
            $datos_salidas["facebook"]= $this->Configuracion_model->get_configuracion(2);
            $datos_salidas["youtube"]= $this->Configuracion_model->get_configuracion(3);
            $datos_salidas["linkedin"]= $this->Configuracion_model->get_configuracion(4);
            $datos_salidas["movil"]= $this->Configuracion_model->get_configuracion(5);
            $datos_salidas["direccion"]= $this->Configuracion_model->get_configuracion(6);
            $datos_salidas["correo"]= $this->Configuracion_model->get_configuracion(7);
            $datos_salidas["rubros"]= $this->Rubros_model->get_rubros();
            $datos_salidas["sistemas"]= $this->Sistemas_model->get_sistemas();

            $this->load->view('home', $datos_salidas);

            
        }
        
        public function enviar_formulario()
	{
            $datos_salida=array(
                "texto"=>"error al enviar mensaje, por favor intente mas tarde!",
                "exito"=>false
            );
            $nombre=$this->input->post("nombre");
            $correo=$this->input->post("correo");
            $telefono=$this->input->post("telefono");
            $mensaje=$this->input->post("mensaje");
            $texto="El usuario ".$nombre." consulta: ";
            $cuerpo_menje=$texto.$mensaje;
            $cuerpo_menje.=" correo: ".$correo." telefono: ".$telefono;
            $email=$this->Configuracion_model->get_configuracion(7);
            $correo_envio=$email["dato"];
            
            $this->load->library('email');

            $config['protocol'] = 'sendmail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'iso-8859-1';
            $config['mailtype'] = 'html';
            $config['wordwrap'] = TRUE;

            $this->email->initialize($config);

            $this->email->from("pedidos@asprofactory.net");
            $this->email->to($correo_envio);

            $this->email->subject("CONSULTA DESDE EL PORTAL - AsProFactory");
            $this->email->message($cuerpo_menje);
            
            //validacion de captcha
            define("RECAPTCHA_V3_SECRET_KEY", '6LezCAAaAAAAAL4iWrabtHckSNdzLj8FCWFQc2gn');
 
            $token = $this->input->post("token");
            
            $action = $this->input->post("action");
            
            //$action = $_POST['action'];

            // call curl to POST request
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            $arrResponse = json_decode($response, true);
            
            // verify the response
            if($arrResponse["success"] == '1' && $arrResponse["action"] == $action && $arrResponse["score"] >= 0.5) {
                
                $datos_salida["texto"]="Mensaje enviado!";
                $datos_salida["exito"]=true;
                $this->email->send();
                
            } 
            
            echo json_encode($datos_salida);
        }
        
        public function verificar_google() {
                       
            define("RECAPTCHA_V3_SECRET_KEY", '6LePeYwUAAAAAC9789Cxxgh7gCgC55EVHZ_hqbXh');
 
            $token = $this->input->post("token");
            //$action = $_POST['action'];

            // call curl to POST request
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            $arrResponse = json_decode($response, true);

            var_dump($arrResponse);
        }
        

        public function politicas(){
            $this->load->view('politicas');
        }

}