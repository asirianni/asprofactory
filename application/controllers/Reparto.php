<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reparto extends CI_Controller {

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
        $this->load->model("Galpon_model");
        $this->load->model("Usuario_model");
        $this->load->model("Reparto_model");
        $this->load->model("Cliente_model");
        $this->load->model("Gasto_model");
    }
    
    public function index() {
        
        
        if($this->session->userdata("ingresado") == true)
        {
           
            $output["listado"]="";
            
            $this->load->view('back/header',$output);
            $this->load->view('back/reparto',$output);
            
            $this->load->view('back/footer',$output);
            
            
        }else{
            
            
            redirect("usuario/ingreso");
        }
    
    }
    
    public function listar() {
        
        
        if($this->session->userdata("ingresado") == true)
        {
           
            $output["localidades_reparto"]= $this->Localidades_model->get_localidades_reparto();
            $output["galpones"]= $this->Galpon_model->get_galpones();
            $repartos=$this->Reparto_model->listado();
            
            
            for ($index = 0; $index < count($repartos); $index++) {
                $repartos[$index]["ventas"]=$this->ventas($repartos[$index]["id"]);
            }
            
            
            $output["repartos"]= $repartos;
            $this->load->view('back/header',$output);
            $this->load->view('back/listar_reparto',$output);
            
            $this->load->view('back/footer',$output);
            
            
        }else{
            
            
            redirect("usuario/ingreso");
        }
    
    }
    
    public function eliminar() {
        $datos_salida=array(
            "id"=>"",
            "exito"=>false
        );
        
        if($this->session->userdata('ingresado') && $this->input->is_ajax_request())
        {
            $id = $this->input->post("id");
            
            
            $datos_salida=$this->Reparto_model->eliminar($id);
        }
        
        echo json_encode($datos_salida);
    }
    
    public function finalizar() {
        $datos_salida=array(
            "id"=>"",
            "exito"=>false
        );
        
        if($this->session->userdata('ingresado') && $this->input->is_ajax_request())
        {
            $id = $this->input->post("id");
            
            
            $datos_reparto= $this->ventas($id);

            $reparto= $this->Reparto_model->get_reparto($id);
           
            $this->Reparto_model->actualizar_campo_reparto($id,"chicos",$datos_reparto["chicos"]);
            $this->Reparto_model->actualizar_campo_reparto($id,"medianos",$datos_reparto["medianos"]);
            $this->Reparto_model->actualizar_campo_reparto($id,"grandes",$datos_reparto["grandes"]);
            $this->Reparto_model->actualizar_campo_reparto($id,"extra",$datos_reparto["extra"]);
            $this->Reparto_model->actualizar_campo_reparto($id,"medianitos",$datos_reparto["medianitos"]);
            $this->Reparto_model->actualizar_campo_reparto($id,"bolita",$datos_reparto["bolita"]);
            $this->Reparto_model->actualizar_campo_reparto($id,"rotos",$datos_reparto["rotos"]);
            $this->Reparto_model->actualizar_campo_reparto($id,"total_recaudado",$datos_reparto["abonado"]);

            $this->Galpon_model->registrar_movimiento($reparto["id_galpon"],2,$datos_reparto["chicos"],$datos_reparto["medianos"],$datos_reparto["grandes"],$datos_reparto["extra"],0,$reparto["id_usuario"],$id,$datos_reparto["medianitos"],$datos_reparto["bolita"],$datos_reparto["rotos"]);
            
            $clientes_reparto=$this->Reparto_model->clientes($id);
            
            foreach ($clientes_reparto as $c) {
                $this->Cliente_model->insertar(2,$reparto["fecha"],$c["id_cliente"],$c["total_pedido"],$id,$reparto["id_usuario"]);
                if($c["abonado"]>0){
                    $this->Cliente_model->insertar(1,$reparto["fecha"],$c["id_cliente"],$c["abonado"],$id,$reparto["id_usuario"]);
                }
            }
            
            $datos_salida=$this->Reparto_model->finalizar($id);
        }
        
        echo json_encode($datos_salida);
    }
    
    public function nueva_hoja() {
        $datos_salida=array(
            "id"=>"",
            "exito"=>false
        );
        
        if($this->session->userdata('ingresado') && $this->input->is_ajax_request())
        {
            $localidad = $this->input->post("localidad");
            $carga = $this->input->post("carga");
            $cambio = $this->input->post("cambio");
            $chicos = $this->input->post("chicos");
            $medianos = $this->input->post("medianos");
            $grandes = $this->input->post("grandes");
            $extra = $this->input->post("extra");
            $cartones = $this->input->post("cartones");
            
            $medianito = $this->input->post("medianito");
            $bolita = $this->input->post("bolita");
            
            
            $datos_salida=$this->Reparto_model->insertar($localidad,$carga,$cambio,$chicos,$medianos,$grandes,$extra,$cartones,$medianito,$bolita);
        }
        
        echo json_encode($datos_salida);
    }
    
    public function editar_hoja() {
        $datos_salida=array(
            "id"=>"",
            "exito"=>false
        );
        
        if($this->session->userdata('ingresado') && $this->input->is_ajax_request())
        {
            $id = $this->input->post("id");
            $localidad = $this->input->post("localidad");
            $carga = $this->input->post("carga");
            $cambio = $this->input->post("cambio");
            $chicos = $this->input->post("chicos");
            $medianos = $this->input->post("medianos");
            $grandes = $this->input->post("grandes");
            $extra = $this->input->post("extra");
            $cartones = $this->input->post("cartones");
            $medianitos = $this->input->post("medianitos");
            $bolita = $this->input->post("bolita");
            
            $datos_salida=$this->Reparto_model->actualizar($id,$localidad,$carga,$cambio,$chicos,$medianos,$grandes,$extra,$cartones,$medianitos,$bolita);
        }
        
        echo json_encode($datos_salida);
    }
    
    public function guardar_cliente() {
        $datos_salida=array(
            "id"=>"",
            "exito"=>false
        );
        
        if($this->session->userdata('ingresado') && $this->input->is_ajax_request())
        {
            $id_reparto = $this->input->post("id_reparto");
            $cliente = $this->input->post("cliente");
            $chicos_c = $this->input->post("chicos_c");
            $chicos_p = $this->input->post("chicos_p");
            $medio_c = $this->input->post("medio_c");
            $medio_p = $this->input->post("medio_p");
            $extra_c = $this->input->post("extra_c");
            $extra_p = $this->input->post("extra_p");
            $grand_c = $this->input->post("grand_c");
            $grand_p = $this->input->post("grand_p");
            $total= $this->input->post("total");
            $abonado = $this->input->post("abonado");
            
            $medianito_c = $this->input->post("medianito_c");
            $medianito_p = $this->input->post("medianito_p");
            $bolita_c = $this->input->post("bolita_c");
            $bolita_p = $this->input->post("bolita_p");
            $rotos_c = $this->input->post("rotos_c");
            $rotos_p = $this->input->post("rotos_p");
            
            $datos_salida=$this->Reparto_model->guardar_cliente(
                                                        $id_reparto, 
                                                        $cliente, 
                                                        $chicos_c, 
                                                        $chicos_p,
                                                        $medio_c, 
                                                        $medio_p, 
                                                        $extra_c, 
                                                        $extra_p, 
                                                        $grand_c, 
                                                        $grand_p, 
                                                        $total,
                                                        $abonado,
                                                        $medianito_c,
                                                        $medianito_p,
                                                        $bolita_c,
                                                        $bolita_p,
                                                        $rotos_c,
                                                        $rotos_p
                                                    );
        }
        
        echo json_encode($datos_salida);
    }
    
    public function editar_pedido_cliente() {
        $datos_salida=array(
            "id"=>"",
            "exito"=>false
        );
        
        if($this->session->userdata('ingresado') && $this->input->is_ajax_request())
        {
            $id_reparto_detalle = $this->input->post("id_reparto_detalle");
            $id_reparto = $this->input->post("id_reparto");
            $cliente = $this->input->post("cliente");
            $chicos_c = $this->input->post("chicos_c");
            $chicos_p = $this->input->post("chicos_p");
            $medio_c = $this->input->post("medio_c");
            $medio_p = $this->input->post("medio_p");
            $extra_c = $this->input->post("extra_c");
            $extra_p = $this->input->post("extra_p");
            $grand_c = $this->input->post("grand_c");
            $grand_p = $this->input->post("grand_p");
            $total= $this->input->post("total");
            $abonado = $this->input->post("abonado");
            
            
            $medianito_c = $this->input->post("medianito_c");
            $medianito_p = $this->input->post("medianito_p");
            $bolita_c = $this->input->post("bolita_c");
            $bolita_p = $this->input->post("bolita_p");
            $rotos_c = $this->input->post("rotos_c");
            $rotos_p = $this->input->post("rotos_p");
                        
            
            $datos_salida=$this->Reparto_model->editar_pedido_cliente(
                                                        $id_reparto_detalle,
                                                        $id_reparto, 
                                                        $cliente, 
                                                        $chicos_c, 
                                                        $chicos_p,
                                                        $medio_c, 
                                                        $medio_p, 
                                                        $extra_c, 
                                                        $extra_p, 
                                                        $grand_c, 
                                                        $grand_p, 
                                                        $total,
                                                        $abonado,
                                                        $medianito_c,
                                                        $medianito_p,
                                                        $bolita_c,
                                                        $bolita_p,
                                                        $rotos_c,
                                                        $rotos_p
                                                    );
        }
        
        echo json_encode($datos_salida);
    }
    
    public function eliminar_pedido() {
        $datos_salida=array(
            "id"=>"",
            "exito"=>false
        );
        
        if($this->session->userdata('ingresado') && $this->input->is_ajax_request())
        {
            $id = $this->input->post("id");
            
            
            $datos_salida=$this->Reparto_model->eliminar_pedido($id);
        }
        
        echo json_encode($datos_salida);
    }

    public function get_reparto_json_by_id() {
        $datos_salida=array(
            "id"=>"",
            "datos"=>"",
            "exito"=>false
        );
        
        if($this->session->userdata('ingresado') && $this->input->is_ajax_request())
        {
            $id = $this->input->post("id");

            $array=$this->Reparto_model->get_reparto($id);
            
            $datos_salida=array(
                "id"=>$id,
                "datos"=>$array,
                "exito"=>true
            );
        }
        
        echo json_encode($datos_salida);
    }
    
    public function ver($num) {
        if($this->session->userdata("ingresado") == true && !empty($num))
        {
            $output["localidades_reparto"]= $this->Localidades_model->get_localidades_reparto();
            $output["galpones"]= $this->Galpon_model->get_galpones();
            $output["reparto"]= $this->Reparto_model->get_reparto($num);
            $output["ventas"]= $this->ventas($num);
            $output["clientes"]= $this->Reparto_model->clientes($num);
            
            $this->load->view('back/header',$output);
            $this->load->view('back/ver_reparto',$output);
            
            $this->load->view('back/footer',$output);
            
            
        }else{
            
            
            redirect("usuario/ingreso");
        }
    }
    
    public function historial() {
        if($this->session->userdata("ingresado") == true )
        {
            
            $output["fecha_desde"]="";
            $output["fecha_hasta"]="";
            $output["listado"]=array();
            $this->load->view('back/header',$output);
            $this->load->view('back/historial_reparto',$output);
            
           $this->load->view('front/footer',$output);
            
            
        }else{
            
            
            redirect("usuario/ingreso");
        }
    }
    
    public function consultar_historial() {
        if($this->session->userdata("ingresado") == true )
        {
            $fecha_desde = $this->input->get("fecha_desde");
            $fecha_hasta = $this->input->get("fecha_hasta");
            
            
            
            $output["fecha_desde"]=$fecha_desde;
            $output["fecha_hasta"]=$fecha_hasta;
            
            $output["listado"]=$this->Reparto_model->listado_finalizado($fecha_desde,$fecha_hasta);
            
            $this->load->view('back/header',$output);
            $this->load->view('back/historial_reparto',$output);
            
           $this->load->view('front/footer',$output);
            
            
        }else{
            
            
            redirect("usuario/ingreso");
        }
    }
    
        
    private function ventas($reparto){
         $ventas= $this->Reparto_model->ventas($reparto);
         
         $chicos= $this->calculo_total($ventas["chicos"]);
         $medianos=$this->calculo_total($ventas["medianos"]);
         $grandes=$this->calculo_total($ventas["grandes"]);
         $extra=$this->calculo_total($ventas["extra"]);
         $abonado=$this->calculo_total($ventas["abonado"]);
         $medianitos=$this->calculo_total($ventas["medianito"]);
         $bolita=$this->calculo_total($ventas["bolita"]);
         $rotos=$this->calculo_total($ventas["rotos"]);
         
         $v=array(
             "chicos"=>$chicos,
             "medianos"=>$medianos,
             "medianitos"=>$medianitos,
             "bolita"=>$bolita,
             "grandes"=>$grandes,
             "extra"=>$extra,
             "abonado"=>$abonado,
             "rotos"=>$rotos,
         );
         
         return $v;
    }
    
    
    private function calculo_total($consulta) {
        $total=0;
        if(!is_null($consulta)){
            $total=$consulta;
        }
        return $total;
    }
    
    
    public function seccion_ventas() {
        if($this->session->userdata("ingresado") == true )
        {
            
            $output["fecha_desde"]="";
            $output["fecha_hasta"]="";
            $output["listado"]=array();
            $output["localidades_reparto"]= $this->Localidades_model->get_localidades_reparto();
            $this->load->view('back/header',$output);
            $this->load->view('back/ventas',$output);
            
           $this->load->view('front/footer',$output);
            
            
        }else{
            
            
            redirect("usuario/ingreso");
        }
    }
    
    public function seccion_gastos() {
        if($this->session->userdata("ingresado") == true)
        {
            
            $output["fecha_desde"]="";
            $output["fecha_hasta"]="";
                        
            
            $output["listado"]=array();
            
            
            
            $this->load->view('back/header',$output);
            $this->load->view('back/gastos',$output);
            
           $this->load->view('front/footer',$output);
            
            
        }else{
            
            
            redirect("usuario/ingreso");
        }
    }
    
    public function reporte_ventas() {
        if($this->session->userdata("ingresado") == true )
        {
            $fecha_desde = $this->input->get("fecha_desde");
            $fecha_hasta = $this->input->get("fecha_hasta");
            $id_localidad= $this->input->get("localidad");
            
            
            $output["fecha_desde"]=$fecha_desde;
            $output["fecha_hasta"]=$fecha_hasta;
            $output["localidades_reparto"]= $this->Localidades_model->get_localidades_reparto();
            $output["listado"]=$this->Reparto_model->reporte_ventas($fecha_desde,$fecha_hasta,$id_localidad);
            
            $this->load->view('back/header',$output);
            $this->load->view('back/ventas',$output);
            
           $this->load->view('front/footer',$output);
            
            
        }else{
            
            
            redirect("usuario/ingreso");
        }
    }
    
    
    
    public function reporte_gastos() {
        $fecha_desde = $this->input->get("fecha_desde");
            $fecha_hasta = $this->input->get("fecha_hasta");
            
            
            
            $output["fecha_desde"]=$fecha_desde;
            $output["fecha_hasta"]=$fecha_hasta;
            
            $output["listado"]=$this->Gasto_model->reporte_gastos($fecha_desde,$fecha_hasta);
            
            $this->load->view('back/header',$output);
            $this->load->view('back/gastos',$output);
            
           $this->load->view('front/footer',$output);
    }
    
    
}