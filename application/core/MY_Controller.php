<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//extendemos el controlador base de codeigniter
class Super_Controller extends CI_Controller{
        
    public function __construct(){
        parent::__construct();
    }
    
    
    public function verificar_usuario_session() {
        $verificacion=false;

        if(!is_null($this->session->userdata('ingresado')) && $this->session->userdata('ingresado')==true){
            $verificacion=true;
        }
        
        return $verificacion;
    }
    
}    