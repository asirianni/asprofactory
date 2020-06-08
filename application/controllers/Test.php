<?php defined('BASEPATH') OR exit('No direct script access allowed');

if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('America/Argentina/Buenos_Aires');
}

class Test extends CI_Controller {
    public $cantidad_grupos=1;
    public $app_id="2511024789135709";
    public $app_secret="f77af87b59573e18bc5bff8057c2eaed";
    public $token="EAAjrw4SUIV0BANCf3M3r0feN3Ix1v4wAqoCjFQYy7EjsgHT1FUe5xAVHrSiMKuLEDZBqZB0gx8jgbF0ksBwZBIDvQGs4Qj7cZBHT8O536D5t52fWZCTn7LU9eiQGBBfAFIWoAWDKXKakRQyNGiyZBJZB2yW42TZCoX1GskaV5SddHwZDZD";

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

    public function login()
    {
        session_start();

        $fb = new \Facebook\Facebook([
        'app_id' => $this->app_id, // Replace {app-id} with your app id
        'app_secret' => $this->app_secret,
        'default_graph_version' => 'v3.2',
        'persistent_data_handler' => 'session'
        ]);

        $helper = $fb->getRedirectLoginHelper();

        $permissions = ['email','publish_to_groups','publish_pages','manage_pages']; // Optional permissions
        $loginUrl = $helper->getLoginUrl('http://asprofactory.com/index.php/test/callback', $permissions);

        echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
    }

    public function callback()
    {
        session_start();
        $fb = new Facebook\Facebook([
        'app_id' => $this->app_id, // Replace {app-id} with your app id
        'app_secret' => $this->app_secret,
        'default_graph_version' => 'v3.2',
        'persistent_data_handler' => 'session'
        ]);

        $helper = $fb->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken();

            echo $accessToken;
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
    }

    public function publicarEnGrupo()
    {
        $grupo = "244753309673393"; // GROUP HARDCODE

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
              
            $fb->post('/'.$id_usuario.'/feed', $linkData, $this->token);
            
            
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