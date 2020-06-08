<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

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
        $this->load->library('encryption');
        $this->load->library('Correo');
        $this->load->model("Usuario_model");
        $this->load->model("Localidades_model");
        $this->load->model("Cliente_model");
        $this->load->library('grocery_CRUD');
    }
    
    public function index() {
        if($this->validar_acceso()){
            $output["title"]="Systema Avicola";
            $this->session->set_userdata("abm_general","Clientes Registrados");
            $crud = new grocery_CRUD();
            //$crud->set_theme('datatables');
            $crud->set_table('clientes');
            $crud->set_relation('tipo','tipo_cliente','tipo');
            $crud->set_relation('localidad_reparto','localidades_reparto','localidad');
            $crud->columns('id','razon_social','nombre','apellido', 'direccion','localidad_reparto','telefono','horario');
            $crud->add_action('Saldos', site_url('/assets/img/saldo.png'), 'clientes/ver_saldo_cliente');
            //$crud->add_action('Saldos', '', '','ui-icon-plus',array($this,'ver_saldo_cliente'));
            
            $crud->unset_add_fields('alta');
            
            $abm = $crud->render();

            $this->load->view('back/header',$output);
            $this->load->view('back/abm_general', $abm);
            $this->load->view('back/footer',$output);
            $this->load->view('back/script_abm',$abm);
        }else{
            redirect('usuario/ingreso');
        }
    }
    
    function ver_saldo_cliente($primary_key)
    {
        
        
        if($this->session->userdata("ingresado") == true && !empty($primary_key))
        {
            
            $output["fecha_desde"]="";
            $output["fecha_hasta"]="";
            $output["cliente"]= $this->Cliente_model->get_cliente($primary_key);
            
            $entradas_seleccionadas=0;
            $salidas_seleccionadas=0;
            
            
            $entradas=$this->Cliente_model->get_saldo($primary_key,1);
            if(!is_null($entradas["total"])){
                $entradas_seleccionadas=$entradas["total"];
            }
            
            
            $salidas=$this->Cliente_model->get_saldo($primary_key,2);
            if(!is_null($salidas["total"])){
                $salidas_seleccionadas=$salidas["total"];
            }

            $saldo=$salidas_seleccionadas-$entradas_seleccionadas;
            
            
            $output["listado"]=array();
            
            $output["salidas"]=$salidas_seleccionadas;
            $output["entradas"]=$entradas_seleccionadas;
            $output["saldo"]=$saldo;
            
            $this->load->view('back/header',$output);
            $this->load->view('back/ver_saldos_clientes',$output);
            
           $this->load->view('front/footer',$output);
            
            
        }else{
            
            
            redirect("usuario/ingreso");
        }
        
    }
    
    function nuevo_movimiento(){
        $datos_salida=array(
            "id"=>"",
            "exito"=>false
        );
        
        if($this->session->userdata('ingresado') && $this->input->is_ajax_request())
        {
            
            $tipo = $this->input->post("tipo");
            $importe=$this->input->post("importe");
            $cliente=$this->input->post("cliente");
            $usuario = $this->session->userdata("id");
            
            $datos_salida=$this->Cliente_model->registrar_movimiento($cliente,$tipo,$importe,$usuario);
        }
        
        echo json_encode($datos_salida);
    }
    
    public function consultar_movimientos() {
        if($this->session->userdata("ingresado") == true )
        {
            $fecha_desde = $this->input->get("fecha_desde");
            $fecha_hasta = $this->input->get("fecha_hasta");
            $cliente = $this->input->get("id_cliente");
            
            
            $output["cliente"]= $this->Cliente_model->get_cliente($cliente);
            
            $entradas_seleccionadas=0;
            $salidas_seleccionadas=0;
            
            
            $entradas=$this->Cliente_model->get_saldo($cliente,1);
            if(!is_null($entradas["total"])){
                $entradas_seleccionadas=$entradas["total"];
            }
            
            
            $salidas=$this->Cliente_model->get_saldo($cliente,2);
            if(!is_null($salidas["total"])){
                $salidas_seleccionadas=$salidas["total"];
            }

            $saldo=$salidas_seleccionadas-$entradas_seleccionadas;
            
            
            $output["listado"]=$this->Cliente_model->get_listado_saldo_cliente($cliente,$fecha_desde,$fecha_hasta);
            
            $output["salidas"]=$salidas_seleccionadas;
            $output["entradas"]=$entradas_seleccionadas;
            $output["saldo"]=$saldo;
            $output["fecha_desde"]=$fecha_desde;
            $output["fecha_hasta"]=$fecha_hasta;
            
            $this->load->view('back/header',$output);
            $this->load->view('back/ver_saldos_clientes',$output);
            
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
    
    public function buscar_cliente() {
        if($this->session->userdata("ingresado") == true && $this->input->is_ajax_request())
        {
            $texto_cliente = $this->input->post("texto");
            $listado=$this->Cliente_model->get_cliente_desc($texto_cliente);
            
            $html="";
            foreach ($listado as $l) {
                $saldo=$this->obtener_saldo_cliente($l["id"]);
                $html.="<div class='row'>
                            <div class='col'>
                                <div class='col-sm-12' style='border-style: solid;'>
                                    <label >".$l["razon_social"]." saldo: ".number_format($saldo, 2, ',', '.')." </label>          "
                        . "<button class='btn-primary' onclick='seleccionar_cliente(".$l["id"].",".$saldo.")'>Seleccionar</button>

                                </div>

                            </div>
                        </div>";
            }

            echo $html;
        }
        
    }
    
    public function saldo_cliente_json() {
        if($this->session->userdata("ingresado") == true && $this->input->is_ajax_request())
        {
            $id = $this->input->post("id");
            $saldo=$this->obtener_saldo_cliente($id);
            echo $saldo;
        }
        
    }
    
    
    public function get_cliente() {
        if($this->session->userdata("ingresado") == true && $this->input->is_ajax_request())
        {
            $id = $this->input->post("id");
            $cliente=$this->Cliente_model->get_cliente($id);

            echo json_encode($cliente);
        }
        
    }
    
    public function obtener_saldo_cliente($id) {
        if($this->session->userdata("ingresado") == true)
        {
            $entradas_seleccionadas=0;
            $salidas_seleccionadas=0;
            
            
            $entradas=$this->Cliente_model->get_saldo($id,1);
            if(!is_null($entradas["total"])){
                $entradas_seleccionadas=$entradas["total"];
            }
            
            
            $salidas=$this->Cliente_model->get_saldo($id,2);
            if(!is_null($salidas["total"])){
                $salidas_seleccionadas=$salidas["total"];
            }

            return $salidas_seleccionadas-$entradas_seleccionadas;
        }
    }
    
    public function obtener_saldo_cliente_json($id) {
        if($this->session->userdata("ingresado") == true)
        {
            $entradas_seleccionadas=0;
            $salidas_seleccionadas=0;
            
            
            $entradas=$this->Cliente_model->get_saldo($id,1);
            if(!is_null($entradas["total"])){
                $entradas_seleccionadas=$entradas["total"];
            }
            
            
            $salidas=$this->Cliente_model->get_saldo($id,2);
            if(!is_null($salidas["total"])){
                $salidas_seleccionadas=$salidas["total"];
            }
            
            $datos=array(
                "entradas"=>$entradas_seleccionadas,
                "salidas"=>$salidas_seleccionadas,
                "saldos"=>$salidas_seleccionadas-$entradas_seleccionadas,
            
            );

            return $datos;
        }
    }
    
    public function seccion_deudores() {
        if($this->session->userdata("ingresado") == true )
        {
            
            $output["fecha_desde"]="";
            $output["fecha_hasta"]="";
            $listado=$this->Cliente_model->get_clientes();
            for ($index = 0; $index < count($listado); $index++) {
                $listado[$index]["ventas"]= $this->obtener_saldo_cliente_json($listado[$index]["id"]);
            }
            $output["listado"]= $listado;
            $this->load->view('back/header',$output);
            $this->load->view('back/deudores',$output);
            
           $this->load->view('front/footer',$output);
            
            
        }else{
            
            
            redirect("usuario/ingreso");
        }
    }
    
    public function reporte_deudores() {
        
    }
    
}