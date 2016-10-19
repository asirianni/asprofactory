<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Administrador
 *
 * @author mario
 */
class Administrador extends Super_Controller
{
    //put your code here
    public $pagina;
    
    public function __construct() {
        parent::__construct();
        
        $this->load->library("session");
        $this->load->library("Pagina");
        $this->load->library("Grocery_CRUD");
        
        $this->pagina = new Pagina();
    }
    
    public function index()
    {
        if($this->session->userdata("operativo") == "si")
        {
            $imagen=base_url()."recursos/img/empleados/".$this->session->userdata('imagen');
            $dni=$this->session->userdata('dni');
            $nombre=$this->session->userdata('nombre');
            $apellido=$this->session->userdata('apellido');
            $vista["menu"] = $this->pagina->menu_administrador($imagen, $dni, $nombre, $apellido);
            $vista["cabecera"] = $this->pagina->cabecera_administrador($imagen, $dni, $nombre, $apellido);
            $vista["seccion"] = "Escritorio";
            $vista["config"] = $this->pagina->generar_configuraciones();
            $vista["detalle"] = $this->pagina->generar_escritorio_administrador();
            $this->load->view('administrador/vista_general.php',$vista);
        }
        else
        {
            redirect("Welcome/acceso");
        }
    }
}
