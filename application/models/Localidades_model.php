<?php

/**

 *

 * @author AdrianSirianni

 *        

 */

class Localidades_model extends CI_Model {

	

	/**

	 *

	 * @access public

	 *        

	 */

	public function __construct() {

		parent::__construct ();

		$this->load->database();

	}

	

	public function get_provincias($id_pais){
		$query = $this->db->query("Select * from provincias where pais=$id_pais");
		return $query->result_array();
		
	}

	public function get_localidades($id_provincia){
		$query = $this->db->query("Select * from localidades where id_provincia=$id_provincia");
		return $query->result_array();
		
	}
        
        public function get_localidad($id_localidad){
            $sql="Select l.codigo as id, "
                        . "l.localidad as localidad, "
                        . "p.id as id_provincia, "
                        . "p.provincia as provincia "
                        . "from localidades as l, provincias as p "
                        . "where l.id_provincia=p.id and l.codigo=$id_localidad";
            $query = $this->db->query($sql);
            return $query->row_array();
	}
        
        public function get_localidades_reparto(){
            $sql="Select * from localidades_reparto";
            $query = $this->db->query($sql);
            return $query->result_array();
	}
        
        

	

	

}