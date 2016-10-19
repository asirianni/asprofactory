<?php if ( ! defined('BASEPATH')) exit('No se permite el acceso directo al script');


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Template
 *
 * @author mario
 */
class Template 
{
    //put your code here
    
    public $imagenes_slider;
    public $ci;
    
    public function __construct() {
        
        $this->ci= &get_instance();
        $this->ci->load->model("Slider_model");
        
        $this->imagenes_slider = $this->ci->Slider_model->getImagenesSlider();
    }
    public function getMenu()
    {
        $html=
        "                       <div class='top-nav'>
                                        <!-- MENUU -->
					<nav class='navbar navbar-default'>
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class='navbar-header'>
						  <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
							<span class='sr-only'>Toggle navigation</span>
							<span class='icon-bar'></span>
							<span class='icon-bar'></span>
							<span class='icon-bar'></span>
						  </button>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class='collapse navbar-collapse nav-wil' id='bs-example-navbar-collapse-1'>
							<nav class='fill'>
								<ul class='nav navbar-nav'>
									<li class='active'><a href='index.html'>Home</a></li>
									<li><a href='services.html'>Services</a></li>
									<li><a href='events.html'>News & Events</a></li>
									<li><a href='short-codes.html'>Short Codes</a></li>
									<li><a href='gallery.html'>Gallery</a></li>
									<li><a href='mail.html'>Mail Us</a></li>
								</ul>
							</nav>
						</div>
						<!-- /.navbar-collapse -->
					</nav>
                                        <!-- / FIN MENU -->
				</div>";
        return $html;
    }
    
    public function getBanner()
    {
        $html=
                                "<div class='banner'>
					<div class='wmuSlider example1'>
						<div class='wmuSliderWrapper'>";
        
                                                    for($i=0; $i < count($this->imagenes_slider);$i++)
                                                    {
                                                        $html.="
							<article style='position: absolute; width: 100%; opacity: 0;'> 
								<div class='banner-wrap'>
									<div class='banner".($i+1)."'>
										<div class='banner1-info'>
											<a href='index.html'>".$this->imagenes_slider[$i]["titulo"]." <span>".$this->imagenes_slider[$i]["descripcion"]."</span></a>
										</div>
									</div>
								</div>
							</article>";
                                                    }
							
						$html.="</div>
					</div>
							<script src='".base_url()."/recursos/js/jquery.wmuSlider.js'></script> 
							<script>
								$('.example1').wmuSlider();         
							</script> 
				</div>";
        return $html;
    }
    
    public function getImagenesSlider()
    {
        return $this->imagenes_slider;
    }
}
