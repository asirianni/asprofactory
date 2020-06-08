<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pagos extends Super_Controller
{
    
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->library('form_validation');
        $this->load->library('Usuario');
        $this->load->library('Empresa');
        $this->load->model('Configuracion_model');
        $this->load->model('Rubros_model');
        $this->load->model('Terminos_model');
        $this->load->model('Sistemas_model');
        $this->load->model('Planes_model');
        $this->load->model('Negocio_model');
        $this->load->model('Cuentacliente_model');
    }
    
        
    public function verificar_cuenta($id_cliente) {
        
        $datos=array(
                    "id_usuario"=> "",
                    "estado" =>"",
                    "estado_descripcion" =>"",
                    "razon_social"=>"",
                    "fecha_alta"=>"",
                    "id_plan"=>"",
                    "plan_descripcion" =>"",
                    "costo" =>"",
                    "deudor"=>false,
                    "importe_deuda"=>""
            );

        if(!empty($id_cliente)){
            $deudor=false;
            
            $cuenta=$this->Cuentacliente_model->get_cuenta_cliente($id_cliente);

            


            if(!empty($cuenta)){
                $deuda=0;
                $tipo_plan=1;
                foreach ($cuenta as $c) {
                    if(is_null($c["fecha_abonado"])){
                        $deuda+=$c["importe"];
                    }
                    $tipo_plan=$c["tipo_plan"];
                }

                if($deuda>0){
                    $deudor=true;
                }

                if($deuda>600){
                    $suspender=$this->Cuentacliente_model->suspender_usuario($id_cliente);
                }else{
                    $activar=$this->Cuentacliente_model->activar_usuario($id_cliente);
                }

                $datos_cliente=$this->Cuentacliente_model->get_cliente($id_cliente);
                $estado=$this->Cuentacliente_model->get_estado($datos_cliente["estado"]);
                $planes=$this->Cuentacliente_model->get_plan($tipo_plan);


                $datos=array(
                    "id_usuario"=> $id_cliente,
                    "estado" =>$datos_cliente["estado"],
                    "estado_descripcion" =>$estado["estado"],
                    "razon_social"=>$datos_cliente["razon_social"],
                    "fecha_alta"=>$datos_cliente["fecha_alta"],
                    "id_plan"=>$tipo_plan,
                    "plan_descripcion" =>$planes["plan"],
                    "costo" =>$planes["costo"],
                    "deudor"=>$deudor,
                    "importe_deuda"=>$deuda
                );

            }
        }

        echo $json=json_encode($datos);
        
    }

    public function listado_cuenta($id_cliente){
        $cuenta=$this->Cuentacliente_model->get_cuenta_cliente($id_cliente);

        if(!empty($cuenta)){
            $output["cuenta"]=$cuenta;
            $this->load->view("back/mi_cuenta",$output);
        }    
    }

    public function pagar($id_cuenta_cliente){
            $this->load->library('mercadopago');
            $this->load->model("Cuentacliente_model");
            
            $texto_pedido="Pago numero ".$id_cuenta_cliente;
            $datos_pago=$this->Cuentacliente_model->get_cuenta_cliente_by_id($id_cuenta_cliente);
            
            if(!empty($datos_pago) && $datos_pago["estado"] == "1"){
                
                $datos_cliente=$this->Cuentacliente_model->get_cliente($datos_pago["id_cliente"]);        
                
                $preference_data = array (
                    "items" => array (
                        array (
                            "title" => $texto_pedido,
                            "quantity" => 1,
                            "currency_id" => "ARS",
                            "unit_price" => (float) $datos_pago["importe"]
                        )
                    )
                );

                $preference = $this->mercadopago->create_preference($preference_data);

                $data['preference']=$preference;
                $data['cliente']=$datos_cliente;
                $data['pago']=$datos_pago;
                
                
                $this->load->view('back/checkout_mercadopago',$data);
                
            }else{
                $this->listado_cuenta($datos_pago["id_cliente"]);
            }
    }
    
    public function registrar_pago() {
        if($this->input->is_ajax_request())
        {
            $numero= $this->input->post("numero");
            $this->load->model("Cuentacliente_model");
            $respuesta = $this->Cuentacliente_model->pagar($numero);
            
            $fecha = "";

            if($respuesta)
            {
                $fecha= Date("Y-m-d");
            }

            echo json_encode($fecha);
        }
    }
    
}