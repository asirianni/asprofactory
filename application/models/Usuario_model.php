<?php

/**

 *

 * @author AdrianSirianni

 *        

 */

class Usuario_model extends CI_Model {

	

	/**

	 *

	 * @access public

	 *        

	 */

	public function __construct() {

		parent::__construct ();

		$this->load->database();

	}

	

	public function insertar_usuario($correo,$pass,$nombre,$apellido,$tipo,$cod_a,$tel){
		
		date_default_timezone_set('America/Argentina/Cordoba');

		$id_token=uniqid();

		$data = array(
			'id' => '',
			'correo' => $correo,
			'pass' => $pass,
			'nombre' => $nombre,
			'apellido' => $apellido,
			'f_alta' => date("Y-m-d H:i:s"),
			'f_activacion' => date("Y-m-d H:i:s"),
			'token_activacion' => $id_token,
			'id_estado' => 1, // activo.
			'tipo_usuario' => $tipo,
                        'pais' => 1,
                        'prov' => 14,
                        'loc' => 1438,
                        'cod_a' => $cod_a,
                        'tel' => $tel
			
		);
		
		$consulta=$this->db->insert('usuarios', $data);
		
		$id_insertado=$this->db->insert_id();
		
		$datos_retorno=array(
			'id_insertado' => '',
			'token_activacion' => '',
			'insercion'=> false
		);

		if($consulta){
			$datos_retorno=array(
				'id_insertado' => $id_insertado,
				'token_activacion' => $id_token,
				'insercion'=> $consulta
			);
		}

		return $datos_retorno;
	}

	public function obtener_usuario($correo){
		$query = $this->db->query("Select * from usuarios where correo='$correo'");
		return $query->row_array();

	}
        
        public function get_usuarios(){
            $query = $this->db->query("Select * from usuarios");
            return $query->result_array();

	}
        
        public function get_usuario($id){
		$query = $this->db->query("Select * from usuarios where id=$id");
		return $query->row_array();

	}
        
        public function get_usuarios_busqueda($tipo, $dato) {
            $sql="SELECT * from usuarios where $tipo LIKE '%$dato%' and tipo_usuario=2";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

	public function obtener_usuario_by_token($token){
		$query = $this->db->query("Select * from usuarios where token_activacion='$token'");
		return $query->row_array();

	}

	public function activar_usuario($id){
            date_default_timezone_set('America/Argentina/Cordoba');
		$data = array(
	        		'id_estado' => 1,
	        		'f_activacion' => date("Y-m-d H:i:s")
			);

		$this->db->where('id', $id);
		return $this->db->update('usuarios', $data);
	}

	public function get_cliente_inicio_sesion($correo,$password)
    {
        $r= $this->db->query("SELECT usuarios.* from usuarios where usuarios.correo = '".$correo."' ");
        $valor_obtenido = $r->row_array();

        //$this->load->library('encrypt');
        $this->load->library('encryption');

        $respuesta=array();

        if (!empty($valor_obtenido)) {
        
        	$valor_obtenido["password_correcta"]=false;

            $pass_encriptada=$valor_obtenido["pass"];

//            $pass_desencriptada=$this->encrypt->decode($pass_encriptada);
            $pass_desencriptada=$this->encryption->decrypt($pass_encriptada);
            
            if($pass_desencriptada==$password){
                $valor_obtenido["contrasenia"]=$password;
                $valor_obtenido["password_correcta"]=true;
                $respuesta=$valor_obtenido;
            }
        }
        
        return $respuesta;
    }
    
    public function get_cliente_pass($correo)
    {
        $r= $this->db->query("SELECT usuarios.* from usuarios where usuarios.correo = '".$correo."' ");
        $valor_obtenido = $r->row_array();

        //$this->load->library('encrypt');
        $this->load->library('encryption');

        $respuesta=array();

        if (!empty($valor_obtenido)) {
        
            $valor_obtenido["password_correcta"]=false;

            echo $pass_encriptada=$valor_obtenido["pass"];

//            $pass_desencriptada=$this->encrypt->decode($pass_encriptada);
            echo $pass_desencriptada=$this->encryption->decrypt($pass_encriptada);
            die();
            if($pass_desencriptada==$password){
                $valor_obtenido["contrasenia"]=$password;
                $valor_obtenido["password_correcta"]=true;
                $respuesta=$valor_obtenido;
            }
        }
        
        return $respuesta;
    }
    
    public function update_usuario(
		$id,$nombre,$apellido,$mail,$nacimiento,$dni,$area,$tel,$pais,$provincia,$localidad,$cod_p,$direccion,$empresa,$cuit,$pass_actual
	){
		$datos = Array(
            "nombre"=>$nombre,
            "apellido"=>$apellido,
            "correo"=>$mail,
            "fecha_n"=>$nacimiento,
            "dni"=>$dni,
            "cod_a"=>$area,
            "tel"=>$tel,
            "pais"=>$pais,
            "prov"=>$provincia,
            "loc"=>$localidad,
            "cod_p"=>$cod_p,
            "direcc"=>$direccion,
            "empresa"=>$empresa,
            "cuit"=>$cuit,
            "pass"=>$pass_actual,

            
        );
        
        $this->db->where("id",$id);
        return $this->db->update("usuarios",$datos);
	}
        
        public function update_cliente(
		$id,$nombre,$apellido,$mail,$area,$tel
	){
		$datos = Array(
            "nombre"=>$nombre,
            "apellido"=>$apellido,
            "correo"=>$mail,
            "cod_a"=>$area,
            "tel"=>$tel,
        );
        
        $this->db->where("id",$id);
        return $this->db->update("usuarios",$datos);
	}
        
        public function eliminar_cliente($id) {
            $this->db->where('id', $id);
            $this->db->delete('usuarios');
            
            $this->db->where('id_usuario', $id);
            $this->db->delete('inversiones'); 
        }
        
        public function get_usuario_admin_correo() {
            $query = $this->db->query("Select * from usuarios where tipo_usuario=1 LIMIT 1");
            return $query->row_array();
        }
        
        public function get_usuarios_($id_tipo,$provincia,$localidad,$nombre,$cuit,$id) {
            $sql="Select u.id as id, "
                    . "u.correo as correo, "
                    . "u.nombre as nombre, "
                    . "u.cod_a as codigo, "
                    . "u.tel as telefono, "
                    . "u.pais as id_pais,"
                    . "u.loc as id_localidad,"
                    . "u.cuit as cuit,"
                    . "l.localidad as localidad, "
                    . "p.provincia as provincia "
                    . "from usuarios as u, "
                    . "localidades as l, provincias as p "
                    . "where u.tipo_usuario=$id_tipo"
                    . " and u.loc=l.codigo "
                    . " and l.id_provincia=p.id"
                    . " and u.id_estado=1";
                if($provincia!=0){
                    $sql.=" and p.id=$provincia";
                }
                if($localidad!=0){
                    $sql.=" and l.codigo=$localidad";
                }
                if($nombre!=""){
                    $sql.=" and u.nombre='$nombre'";
                }
                if($cuit!=""){
                    $sql.=" and u.cuit='$cuit'";
                }
                if($id!=""){
                    $sql.=" and u.id=$id";
                }
                 $sql.=" order by id asc";
//                 echo $sql;
//                 die();
            $query = $this->db->query($sql);
            return $query->result_array();
        }
        
        public function suspender($id) {

            $datos = Array(
                "id_estado"=>3
            );


            $this->db->where("id",$id);
            $exito=$this->db->update("usuarios",$datos);
             $datos_salida=array(
                    "id"=>$id,
                    "exito"=>$exito
                );

            return $datos_salida;

            
        }
        
        

	

}