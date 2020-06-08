<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

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
        //$this->load->library('encrypt');
        $this->load->library('encryption');
        $this->load->library('Correo');
        $this->load->model("Usuario_model");
        $this->load->model("Localidades_model");
        $this->load->library('grocery_CRUD');
        
        
    }
    
       
    public function ingreso(){
        if($this->session->userdata("ingresado") == true )
        {
            $this->ingreso_usuario();
        }else{
            $output["title"]="";
            
            $this->load->view('back/header',$output);
            $this->load->view('front/loguin',$output);
            $this->load->view('back/footer',$output);
            $this->load->view('back/script_registros',$output);
        }	
		
    }
    
    public function ingreso_usuario() {
        if($this->session->userdata("ingresado") == true )
        {
            redirect("reparto");
        }else{
            $this->ingreso();
        }
    }
    
    public function registro(){
            if($this->session->userdata("ingresado") == true )
            {
                $this->ingreso_usuario();
            }else{
                $output["title"]="Red Via Publica";
                
                $this->load->view('back/header',$output);
                $this->load->view('front/registro',$output);
                
                $this->load->view('back/footer',$output);
                $this->load->view('back/script_registros',$output);
            }
    }


    // REGISTRACION DE CLIENTE NUEVO Y ACTIVACION DE CUENTA

    public function existe(){
    	$this->load->model("Usuario_model");
    	$correo = $this->input->post("correo");
    	$existe=false;
    	$usuario=$this->Usuario_model->obtener_usuario($correo);
    	if(!empty($usuario)){
    		$existe=true;
    	}
    	echo json_encode($existe);
    }

    public function registrar(){
    	
        $tipo_usuario=$this->session->userdata("tipo_usuario");
        
    	$correo = $this->input->post("mail");
    	$pass = $this->input->post("pass");
    	$nombre = $this->input->post("nombre");
    	$apellido = $this->input->post("apellido");
        $cod= $this->input->post("cod");
        $tel= $this->input->post("tel");
    	
        $encriptar_pass = $this->encryption->encrypt($pass);
    	
    	$usuario=$this->Usuario_model->insertar_usuario($correo,$encriptar_pass,$nombre,$apellido,$tipo_usuario,$cod,$tel);

    	echo json_encode($usuario["insercion"]);
    }
    
    public function registro_exitoso() {
        $output["title"]="Red Via Publica";
        
        $this->load->view('back/header',$output);
        $this->load->view('front/exito',$output);
        $this->load->view('front/footer',$output);
    }
    
    public function recuperacion() {
        $output["title"]="Red Via Publica";
        
        $this->load->view('back/header',$output);
        $this->load->view('front/recuperacion',$output);
        $this->load->view('front/footer',$output);
        $this->load->view('front/script_registros',$output);
    }


    public function recuperar_datos_cuenta(){
        $de_titulo="Redviapublica.com";
        $de="info@redviapublica.com";
        $correo = $this->input->post("envio");
        //var_dump($_POST);
        $mensaje_salida_pantalla="";
        
        $usuario=$this->Usuario_model->obtener_usuario($correo);
        //var_dump($usuario);
        if(empty($usuario)){
            $mensaje_salida_pantalla= "el correo ingresado no existe. por favor registrese";
        }else{
            $mail_destino=$usuario["correo"];
            $pass_encriptada=$usuario["pass"];
            $pass_desencriptada=$this->encryption->decrypt($pass_encriptada);
            
            $mensaje_envio="";
            
            if($usuario["id_estado"]==2){
                $mensaje_envio.= $this->generar_mensaje_envio($usuario["token_activacion"]);
            }
            
            $mensaje_envio.="ACCESO DE USUARIO ".$de_titulo.": <BR> ";
            $mensaje_envio.="USUARIO: ".$mail_destino."<BR> ";
            $mensaje_envio.="PASS: ".$pass_desencriptada."<BR> ";
            
            $titulo    = "CORREO DE RECUPERACION - ".$de_titulo;

            $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
            $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            // Cabeceras adicionales

            $cabeceras .= 'From: '.$de . "\r\n";    
            
            $enviando=mail($mail_destino, $titulo, $mensaje_envio, $cabeceras);
            
            if($enviando){
                $mensaje_salida_pantalla= "el correo se envio correctamente a ".$mail_destino." por favor revise su correo y casilla de spam";
            }else{
                $mensaje_salida_pantalla= "no se pudo enviar el correo, por favor intentelo mas tarde";
            }
        }
            echo $mensaje_salida_pantalla;
    }

    // FIN DE REGISTRACION Y ACTIVACION DE CUENTA

    // LOGUIN DE USUARIO

    public function loguin(){
        if($this->input->is_ajax_request()){

            $validacion["usuario_validado"]=false;
            $validacion["error_mensaje"]="el usuario o pass no son correctos";

            $correo = $this->input->post("correo");
            $password = $this->input->post("pass");

            //$correo = "sirianni.adrian@gmail.com";
            //$password = "c";

            $registro = $this->Usuario_model->get_cliente_inicio_sesion($correo,$password);
            //var_dump($registro);
            
            if(!empty($registro)){
                if($registro["id_estado"]==1){
                
                    $registro["ingresado"]=true;
                    $this->session->set_userdata($registro);
                    
                    $validacion["usuario_validado"]=true;
                    $validacion["error_mensaje"]="usuario correcto!";
                }else{
                    $validacion["usuario_validado"]=false;
                    $validacion["error_mensaje"]="El Usuario no esta activo. Comuniquese con el administrador. ";
                }
            }

            //var_dump($this->session->userdata());


            echo json_encode($validacion);


        }

    }

    public function mi_perfil(){
        
        if($this->validar_acceso()){
                $output["title"]="Red Via Publica";                
                $this->load->view('back/header',$output);
                $this->load->view('back/mi_perfil',$output);
                $this->load->view('back/footer',$output);
                $this->load->view('back/script_misdatos',$output);
        }else{
            redirect('home/ingreso');
        }
    }

    public function cerrar_sesion(){
        if($this->validar_acceso()){
            $this->session->sess_destroy();
            redirect("usuario/ingreso");
        }else{
            redirect('usuario/ingreso');
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
    
    public function update(){
        if($this->input->is_ajax_request()){
            //obtenemos el id de usuario de session
            $id_usuario_session=$this->session->userdata("id");
            // campos del formulario cargado
            $nombre = $this->input->post("nombre");
            $apellido = $this->input->post("apellido");
            $mail = $this->input->post("mail");
            $nacimiento = $this->input->post("nacimiento");
            $dni = $this->input->post("dni");
            $area = $this->input->post("area");
            $tel = $this->input->post("tel");
            $pais = $this->input->post("pais");
            $provincia = $this->input->post("provincia");
            $localidad = $this->input->post("localidad");
            $con_p = $this->input->post("cod_p");
            $direccion = $this->input->post("direccion");
            $empresa = $this->input->post("empresa");
            $cuit = $this->input->post("cuit");
            //obtenemos la pas y la encriptamos
            $pas_actual = $this->input->post("pass");
            
//            $encriptar_pass=$this->encrypt->encode($pas_actual);
            $encriptar_pass = $this->encryption->encrypt($pas_actual);

            //para testear descomentar
             /*$id_usuario_session=$this->session->userdata("id");

            $nombre = "balca";
            $apellido = "ciro";
            $mail = "sirianni@gmail.com";
            $nacimiento = "2015-8-9";
            $dni = "545454";
            $area = "54545";
            $tel = "22222";
            $pais = "1";
            $provincia = "7";
            $localidad = "542";
            $con_p = "1";
            $direccion = "cor";
            $empresa = "asprofactrory";
            $cuit = "20318475718";
            
            $pas_actual = "c";
            $encriptar_pass=$this->encrypt->encode($pas_actual);
            */

            $existe=false;
            //actualizamos el usuario.
            $usuario=$this->Usuario_model->update_usuario($id_usuario_session,$nombre,$apellido,$mail,$nacimiento,$dni,$area,$tel,$pais,$provincia,$localidad,$con_p,$direccion,$empresa,$cuit,$encriptar_pass);

            if($usuario){
                $existe=true;
                $this->session->sess_destroy();
            }
            echo json_encode($existe);
        }
        
        
    }
    
    public function get_localidades(){
		if($this->input->is_ajax_request()){
			 $id=$this->input->post("codigo_provincia");
			 $listado=$this->Localidades_model->get_localidades($id);
			 $html="<option value='0'>Seleccione Localidad</option>";
			 
			 foreach ($listado as $p) {
			 	$html.="<option value='".$p["codigo"]."'>".$p["localidad"]."</option>";
			 }
			 echo $html;
		}else{
			$this->index();
		}
	}

    public function get_provincias(){
		if($this->input->is_ajax_request()){
			 $id=$this->input->post("codigo_pais");
			 $html="<option value='0'>Seleccione Provincia</option>";
			 $listado=$this->Localidades_model->get_provincias($id);
			 foreach ($listado as $p) {
			 	$html.="<option value='".$p["id"]."'>".$p["provincia"]."</option>";
			 }
			 echo $html;
		}else{
			$this->index();
		}
	}

    public function usuarios(){
            if($this->validar_acceso()){
                $output["title"]="Systema Avicola";
                $this->session->set_userdata("abm_general","Usuarios Registrados");
                $crud = new grocery_CRUD();
                $crud->set_table('usuarios');
                $crud->field_type('pass', 'password');
                $crud->columns('correo','nombre','id_estado');
               
                $crud->set_relation('id_estado','estado_usuario','estado');
                $crud->set_relation('tipo_usuario','tipo_usuario','tipo');
                $crud->unset_add_fields('apellido','f_alta','f_activacion','token_activacion','fecha_n','dni','cod_a','tel','pais','prov','loc','cod_p','direcc','empresa','cuit');
                $crud->unset_edit_fields('apellido','f_alta','f_activacion','token_activacion','fecha_n','dni','cod_a','tel','pais','prov','loc','cod_p','direcc','empresa','cuit');
                $crud->callback_before_insert(array($this,'encrypt_password_callback'));
                $crud->callback_before_update(array($this,'encrypt_password_callback'));
                $crud->callback_edit_field('pass',array($this,'decrypt_password_callback'));
                //$crud->set_theme('bootstrap');
                $abm = $crud->render();
                
                $this->load->view('back/header',$output);
                $this->load->view('back/abm_general', $abm);
                $this->load->view('back/footer',$output);
                $this->load->view('back/script_abm',$abm);
            }else{
                redirect('usuario/ingreso');
            }
        }
        
    function encrypt_password_callback($post_array, $primary_key = null){
            $this->load->library('encryption');

            
            $post_array['pass'] = $this->encryption->encrypt($post_array['pass']);
            return $post_array;
        }
 
    function decrypt_password_callback($value){
            $this->load->library('encryption');

            $decrypted_password = $this->encryption->decrypt($value);
            return "<input type='password' name='pass' value='$decrypted_password' />";
        }
        
    public function ver_pass(){
            echo $correo = "lacolo88@gmail.com";
            echo "<br>";

            $registro=$this->Usuario_model->get_cliente_pass($correo);

            var_dump($registro);

        }



}