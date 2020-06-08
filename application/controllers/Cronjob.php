<?php defined('BASEPATH') OR exit('No direct script access allowed');

if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('America/Argentina/Buenos_Aires');
}

class Cronjob extends CI_Controller {
    public $cantidad_grupos=1;
    public $app_id="2511024789135709";
    public $app_secret="f77af87b59573e18bc5bff8057c2eaed";
    public $token="EAAjrw4SUIV0BAJpXyo5ytrOzBRvDDBnGg2hkZA5HYPIleLKZCv9Q8Pq7183vI3UeiwaTdZCqNazmB9GLob67Qj8cYi7s666NaUqypKT6cDgKLEhtxp0DsS0xlZBCQMc6cn1aRD33HperZCmXoyW5WuWIjCTZAFYG9hVviI8E2WupRNVLimq926FkhRJcIhJyMxtZAZA8ZChuW5NI2MMsTaok1bzx53pZCgieOXpMgFwUTZCXgZDZD";

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
        $this->load->library('FacebookSDK');
    }
    
    public function generar_grupos() {
       
       set_time_limit(0);

        $fb = new \Facebook\Facebook([
          'app_id' => $this->app_id,
          'app_secret' => $this->app_secret,
          'default_graph_version' => 'v2.4',
          //'default_access_token' => '{access-token}', // optional
        ]);

        // Use one of the helper classes to get a Facebook\Authentication\AccessToken entity.
        //   $helper = $fb->getRedirectLoginHelper();
        //   $helper = $fb->getJavaScriptHelper();
        //   $helper = $fb->getCanvasHelper();
        //   $helper = $fb->getPageTabHelper();

        try {
          // Get the \Facebook\GraphNodes\GraphUser object for the current user.
          // If you provided a 'default_access_token', the '{access-token}' is optional.
          $response = $fb->get('/me', $this->token);
        
//          var_dump($response);
          
          
          
        } catch(\Facebook\Exceptions\FacebookResponseException $e) {
          // When Graph returns an error
          echo 'Graph returned an error: ' . $e->getMessage();
          exit;
        } catch(\Facebook\Exceptions\FacebookSDKException $e) {
          // When validation fails or other local issues
          echo 'Facebook SDK returned an error: ' . $e->getMessage();
          exit;
        }

        $me = $response->getGraphUser();
        $id_usuario= $me->getId();
        $base="https://graph.facebook.com/$id_usuario/groups?access_token=";
        $url_point=$base.$this->token;

        $this->consultar_grupos($url_point);

        
        
//        echo 'Logged in as ' . $me->getName();
    }
    
    
    public function consultar_grupos($url_point) {
        
        $header_content_json = 'Content-Type:application/json';
        $ch = curl_init($url_point);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array($header_content_json));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
       
        $listado= json_decode($result,true);
        
        foreach ($listado["data"] as $d) {
            echo $this->cantidad_grupos." ".$d["name"]." id: ".$d["id"];
            
            $data = array(
                'nombre' => $d["name"],
                'id_face' => $d["id"],
                
             );
      
            $this->db->insert('grupos', $data);
            
            echo "<br>";
            $this->cantidad_grupos++;
        }
        
//        var_dump($listado["paging"]["next"]);
        
        echo "<br>";
        
        curl_close($ch);
        
        if(empty($listado["paging"]["next"])){
            
        }else{
            $this->consultar_grupos($listado["paging"]["next"]);
        }
        
        
        
    }
    
    public function index() {
        $campo_a_buscar="capilla";
        
        $where = "publicado IS NULL";
        $this->db->where($where);
        $this->db->like('nombre', $campo_a_buscar, 'both');
        $this->db->limit(1); 
        $listado = $this->db->get('grupos');
        $datos = $listado->result_array();
        foreach ($datos as $d) {
            echo $d["nombre"]." ".$d["id_face"];
            echo "<br>";
            $this->publicar($d["id_face"]);
            
        }
    }
    
    public function publicar($grupo) {
         

        $fb = new \Facebook\Facebook([
          'app_id' => $this->app_id,
          'app_secret' => $this->app_secret,
          'default_graph_version' => 'v2.4',

        ]);

        
        try {
            $response = $fb->get('/me', $this->token);
            $me = $response->getGraphUser();
            $id_usuario= $me->getId();
            
            $linkData = [
                'link' => "http://www.asprofactory.com",
                'message' => "DESARROLLO DE SISTEMAS A MEDIDA. CONSULTENOS",
            ];
            
            //$fb->post('/'.$grupo.'/feed', $linkData, $this->token);
          $fb->post('/feed', $linkData, $this->token);
          
          
        } catch(\Facebook\Exceptions\FacebookResponseException $e) {
          // When Graph returns an error
          echo 'Graph returned an error: ' . $e->getMessage();
          exit;
        } catch(\Facebook\Exceptions\FacebookSDKException $e) {
          // When validation fails or other local issues
          echo 'Facebook SDK returned an error: ' . $e->getMessage();
          exit;
        }


    }
  
        
}        