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
									<li class='active'><a href='".base_url()."'>Principal</a></li>
									<li><a href='".base_url()."index.php/Welcome/servicios'>Servicios</a></li>
									<li><a href='".base_url()."index.php/Welcome/calculo_obra'>Calculo obra</a></li>
									<li><a href='".base_url()."index.php/Welcome/obras'>Obras</a></li>
									<li><a href='".base_url()."index.php/Welcome/contacto'>Contacto</a></li>
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
    
    public function getFooter()
    {
        $html=
        "<!-- footer-top -->
	<div class='footer-top'>
		<div class='container'>
			<div class='col-md-3 footer-top-grid'>
				<h3>NOSOTROS:</span></h3>
				<p>Especialistas en trabajos de pintura, albañilería, herrería, construcción en seco, electricidad, colocación de cerámicos y obras.</p>
			</div>
			<div class='col-md-3 footer-top-grid'>
				<h3>PALABRAS CLAVES:</span></h3>
				<div class='unorder'>
					<ul class='tag2'>
						<li><a href='single.html'>pintura</a></li>
						<li><a href='single.html'>albañilería</a></li>
						<li><a href='single.html'>herrería</a></li>
					</ul>
					<ul class='tag2'>
						<li><a href='single.html'>durlock</a></li>
						<li><a href='single.html'>electricidad</a></li>
						<li><a href='single.html'>cerámicos</a></li>
					</ul>
					<ul class='tag2'>
						<li><a href='single.html'>recuplast</a></li>
						<li><a href='single.html'>medianera</a></li>
						<li><a href='single.html'>colocador</a></li>
					</ul>
					<ul class='tag2'>
						<li><a href='single.html'>sintetico</a></li>
						<li><a href='single.html'>ladrillo portante</a></li>
						<li><a href='single.html'>albañil</a></li>
					</ul>
					<ul class='tag2'>
						<li><a href='single.html'>tejas</a></li>
						<li><a href='single.html'>cerramiento</a></li>
						<li><a href='single.html'>herreria</a></li>
					</ul>
                                        <ul class='tag2'>
						<li><a href='single.html'>plomeria</a></li>
						<li><a href='single.html'>plomero</a></li>
						<li><a href='single.html'>hierro</a></li>
					</ul>
                                        <ul class='tag2'>
						<li><a href='single.html'>maestro mayor obra</a></li>
						<li><a href='single.html'>direccion obra</a></li>
						<li><a href='single.html'>cielorraso</a></li>
					</ul>
                                        <ul class='tag2'>
						<li><a href='single.html'>divisiones</a></li>
						<li><a href='single.html'>tabiques</a></li>
						<li><a href='single.html'>presupuesto</a></li>
					</ul>
                                        <ul class='tag2'>
						<li><a href='single.html'>contratista </a></li>
					</ul>
				</div>
			</div>
			<div class='col-md-6 footer-top-grid'>
				<h3>Siguenos en Face</span></h3>
				<ul class='twi'>
					<li>I like this awesome freebie. Check it out <a href='mailto:info@example.com' class='mail'>
					@http://t.co/9vslJFpW</a> <span>ABOUT 15 MINS</span></li>
					<li>I like this awesome freebie. You can view it online here<a href='mailto:info@example.com' class='mail'>
					@http://t.co/9vslJFpW</a> <span>ABOUT 2 HOURS AGO</span></li>
				</ul>
			</div>
			<!--<div class='col-md-3 footer-top-grid'>
				<h3>Flickr <span>Feed</span></h3>
				<div class='flickr-grids'>
					<div class='flickr-grid'>
						<a href='single.html'><img src='<?php echo base_url(); ?>/recursos/images/4.jpg' alt=' ' class='img-responsive' /></a>
					</div>
					<div class='flickr-grid'>
						<a href='single.html'><img src='<?php echo base_url(); ?>/recursos/images/6.jpg' alt=' ' class='img-responsive' /></a>
					</div>
					<div class='flickr-grid'>
						<a href='single.html'><img src='<?php echo base_url(); ?>/recursos/images/11.jpg' alt=' ' class='img-responsive' /></a>
					</div>
					<div class='clearfix'> </div>
					
					<div class='flickr-grid'>
						<a href='single.html'><img src='<?php echo base_url(); ?>/recursos/images/12.jpg' alt=' ' class='img-responsive' /></a>
					</div>
					<div class='flickr-grid'>
						<a href='single.html'><img src='<?php echo base_url(); ?>/recursos/images/11.jpg' alt=' ' class='img-responsive' /></a>
					</div>
					<div class='flickr-grid'>
						<a href='single.html'><img src='<?php echo base_url(); ?>/recursos/images/6.jpg' alt=' ' class='img-responsive' /></a>
					</div>
					<div class='clearfix'> </div>
				</div>
			</div>-->
			<div class='clearfix'> </div>
		</div>
	</div>
<!-- //footer-top -->
<!-- footer -->
	<div class='footer'>
		<div class='container'>
			<div class='footer-left'>
				<ul>
					<li><a href='index.html'><i>JuanCa</i>Mantenimiento</a><span> |</span></li>
					<li><p>Movil/Wathapp:  <span>1136504413</span></p></li>
				</ul>
			</div>
			<div class='footer-right'>
				<p>2016 - Desarrollado por <a href='https://www.facebook.com/Ordene-su-negocio-737763829635258/'>Adrian Sirianni</a></p>
			</div>
			<div class='clearfix'> </div>
		</div>
	</div>
<!-- //footer -->";
        return $html;
    }
    
    
    public function getImagenesSlider()
    {
        return $this->imagenes_slider;
    }
    
    public function getPrincipal()
    {
        $html=
        "<div class='banner-bottom'>
					<div class='col-md-7 banner-bottom-left'>
						<div class='banner-bottom-left1'>
							<h2>Welcome to our Photography</h2>
							<div class='col-md-4 banner-bottom-left1-gridl'>
								<img src='<?php echo base_url(); ?>/recursos/images/4.jpg' alt=' ' class='img-responsive' />
							</div>
							<div class='col-md-8 banner-bottom-left1-gridr'>
								<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
								<ul>
									<li><a href='single.html'>Sed ut perspiciatis unde omnis</a></li>
									<li><a href='single.html'>But I must explain to you</a></li>
									<li><a href='single.html'>Neque porro quisquam est, qui</a></li>
								</ul>
							</div>
							<div class='clearfix'> </div>
						</div>
						<div class='banner-bottom-left2'>
							<h3>Offered Services</h3>
							<div class='col-md-4 banner-bottom-left2l'>
								<img src='<?php echo base_url(); ?>/recursos/images/5.jpg' alt=' ' class='img-responsive' />
							</div>
							<div class='col-md-8 banner-bottom-left2r'>
								<ul>
									<li><a href='single.html'>Sed ut perspiciatis unde omnis</a></li>
									<li><a href='single.html'>But I must explain to you</a></li>
									<li><a href='single.html'>Neque porro quisquam est, qui</a></li>
									<li><a href='single.html'>Quis autem vel eum iure reprehend</a></li>
								</ul>
							</div>
							<div class='clearfix'> </div>
						</div>
					</div>
					<div class='col-md-5 banner-bottom-right'>
						<div class='newsletter'>
							<h1>Newsletter</h1>
							<form>
								<input type='email' value='Email' onfocus='this.value = '';' onblur='if (this.value == '') {this.value = 'Email';}' required=''>
								<input type='submit' value='Subscribe' >
							</form>
						</div>
						<div class='news'>
							<h3>Our News</h3>
							<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
							<ul>
								<li><a href='single.html'>Sed ut perspiciatis unde omnis</a></li>
								<li><a href='single.html'>But I must explain to you</a></li>
								<li><a href='single.html'>Neque porro quisquam est, qui</a></li>
								<li><a href='single.html'>Quis autem vel eum iure reprehend</a></li>
								<li><a href='single.html'>Temporibus autem quibusdam et aut</a></li>
								<li><a href='single.html'>Lorem Ipsum is not simply random</a></li>
							</ul>
						</div>
					</div>
					<div class='clearfix'> </div>
				</div>";
        return $html;
    }
    
    public function getServicios()
    {
        $html=
        "<div class='services'>
						<h2>Our Services</h2>
						<div class='services-grids'>
							<div class='col-md-6 services-grid'>
								<div class='services-grid-left'>
									<span class='glyphicon glyphicon-import' aria-hidden='true'></span>
								</div>
								<div class='services-grid-right'>
									<h3><a href='single.html'>nisi ut aliquid ex ea commodi</a></h3>
									<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam 
										corporis suscipit laboriosam, nisi ut aliquid ex ea commodi 
										consequatur.</p>
								</div>
								<div class='clearfix'> </div>
							</div>
							<div class='col-md-6 services-grid'>
								<div class='services-grid-left'>
									<span class='glyphicon glyphicon-flash' aria-hidden='true'></span>
								</div>
								<div class='services-grid-right'>
									<h3><a href='single.html'>quis nostrum exercita ullam</a></h3>
									<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam 
										corporis suscipit laboriosam, nisi ut aliquid ex ea commodi 
										consequatur.</p>
								</div>
								<div class='clearfix'> </div>
							</div>
							<div class='clearfix'> </div>
						</div>
						<div class='services-grids'>
							<div class='col-md-6 services-grid'>
								<div class='services-grid-left'>
									<span class='glyphicon glyphicon-pawn' aria-hidden='true'></span>
								</div>
								<div class='services-grid-right'>
									<h3><a href='single.html'>accusantium dolore laudan</a></h3>
									<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam 
										corporis suscipit laboriosam, nisi ut aliquid ex ea commodi 
										consequatur.</p>
								</div>
								<div class='clearfix'> </div>
							</div>
							<div class='col-md-6 services-grid services-gridasd'>
								<div class='services-grid-left'>
									<span class='glyphicon glyphicon-retweet' aria-hidden='true'></span>
								</div>
								<div class='services-grid-right'>
									<h3><a href='single.html'>cillum dolore ugiat nulla</a></h3>
									<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam 
										corporis suscipit laboriosam, nisi ut aliquid ex ea commodi 
										consequatur.</p>
								</div>
								<div class='clearfix'> </div>
							</div>
							<div class='clearfix'> </div>
						</div>
						<h1>Ut enim ad minima veniam, quis nostrum exercitationem ullam 
							corporis suscipit laboriosam <span>Photography</span></h1>
						<div class='services-list'>
							<div class='col-md-6 services-list-left'>
								<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam 
									corporis suscipit laboriosam, nisi ut aliquid ex ea commodi 
									consequatur.</p>
								<ul>
									<li><a href='single.html'>Sed ut perspiciatis unde omnis</a></li>
									<li><a href='single.html'>But I must explain to you</a></li>
									<li><a href='single.html'>Neque porro quisquam est, qui</a></li>
									<li><a href='single.html'>Quis autem vel eum iure reprehend</a></li>
									<li><a href='single.html'>Temporibus autem quibusdam et aut</a></li>
									<li><a href='single.html'>Lorem Ipsum is not simply random</a></li>
								</ul>
							</div>
							<div class='col-md-6 services-list-right'>
								<div class='col-md-6 services-list-right-grid'>
									<div class='services-list-right-grid1'>
										<img src='images/11.jpg' alt=' ' class='img-responsive' />
										<h4><a href='single.html'>Temporibus quibusdam</a></h4>
										<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam 
										corporis suscipit laboriosam.</p>
									</div>
								</div>
								<div class='col-md-6 services-list-right-grid'>
									<div class='services-list-right-grid1'>
										<img src='images/12.jpg' alt=' ' class='img-responsive' />
										<h4><a href='single.html'>suscipit laboriosam</a></h4>
										<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam 
										corporis suscipit laboriosam.</p>
									</div>
								</div>
								<div class='clearfix'> </div>
							</div>
							<div class='clearfix'> </div>
						</div>
					</div>
				<!-- //services -->";
        return $html;
    }
    
    public function getCalculoObras()
    {
        $html=
        "<!-- latest-news -->
					<div class='latest-news'>
						<h2>Latest News</h2>
						<div class='latest-news-grids'>
							<div class='col-md-4 latest-news-grid'>
								<img src='images/4.jpg' alt=' ' class='img-responsive' />
								<ul>
									<li>By : <a href='single.html'>Adam Smith</a></li>
									<li>In : <a href='single.html'>Photography</a></li>
								</ul>
								<div class='latest-news-grid1'>
									<a href='single.html'>quam nihil molestiae</a>
									<p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
										esse quam nihil molestiae consequatur.</p>
									<div class='latest-news-grid1-left'>
										<ul>
											<li><a href='single.html'><span class='glyphicon glyphicon-envelope' aria-hidden='true'></span> 5</a></li>
											<li><a href='single.html'><span class='glyphicon glyphicon-heart' aria-hidden='true'></span> 15</a></li>
										</ul>
									</div>
									<div class='latest-news-grid1-right'>
										<p>1/29/2016</p>
									</div>
									<div class='clearfix'> </div>
								</div>
							</div>
							<div class='col-md-4 latest-news-grid'>
								<img src='images/6.jpg' alt=' ' class='img-responsive' />
								<ul>
									<li>By : <a href='single.html'>Adam Smith</a></li>
									<li>In : <a href='single.html'>Photography</a></li>
								</ul>
								<div class='latest-news-grid1'>
									<a href='single.html'>autem vel eum iure</a>
									<p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
										esse quam nihil molestiae consequatur.</p>
									<div class='latest-news-grid1-left'>
										<ul>
											<li><a href='single.html'><span class='glyphicon glyphicon-envelope' aria-hidden='true'></span> 7</a></li>
											<li><a href='single.html'><span class='glyphicon glyphicon-heart' aria-hidden='true'></span> 43</a></li>
										</ul>
									</div>
									<div class='latest-news-grid1-right'>
										<p>1/31/2016</p>
									</div>
									<div class='clearfix'> </div>
								</div>
							</div>
							<div class='col-md-4 latest-news-grid'>
								<img src='images/12.jpg' alt=' ' class='img-responsive' />
								<ul>
									<li>By : <a href='single.html'>James Frick</a></li>
									<li>In : <a href='single.html'>Photography</a></li>
								</ul>
								<div class='latest-news-grid1'>
									<a href='single.html'>qui in ea voluptate</a>
									<p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
										esse quam nihil molestiae consequatur.</p>
									<div class='latest-news-grid1-left'>
										<ul>
											<li><a href='single.html'><span class='glyphicon glyphicon-envelope' aria-hidden='true'></span> 10</a></li>
											<li><a href='single.html'><span class='glyphicon glyphicon-heart' aria-hidden='true'></span> 76</a></li>
										</ul>
									</div>
									<div class='latest-news-grid1-right'>
										<p>2/5/2016</p>
									</div>
									<div class='clearfix'> </div>
								</div>
							</div>
							<div class='clearfix'> </div>
						</div>
						<h1>Ut enim ad minima veniam, quis nostrum exercitationem ullam 
							corporis suscipit laboriosam <span>Photography</span></h1>
					</div>
				<!-- //latest-news -->";
        return $html;
    }
    
    public function getContacto()
    {
        $html=
        "<!-- contact -->
					<div class='contact'>
						<h1>Contact Us</h1>
						<h2 class='title1'>But I must explain to you how all this mistaken idea of denouncing pleasure.</h2>
						<div class='contact-grid'>
							<div class='col-md-5 contact-left'>
								<iframe src='https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3056.9443837127305!2d-75.7983021!3d39.9873482!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x69c9c879a1263188!2sLutheran+Church+of+the+Good+Shepherd!5e0!3m2!1sen!2sin!4v1426659332982' frameborder='0' style='border:0'></iframe>
							</div>
							<div class='col-md-7 contact-right'>
								<form>
									<input type='text' placeholder='Name' required=' '>
									<input type='text' placeholder='Email Address' required=' '>
									<input type='text' placeholder='Phone Number' required=' '>
									<input type='text' placeholder='Subject' required=' '>
									<div class='clearfix'> </div>
									<textarea placeholder='Type Your Text Here....' required=' '></textarea>
									<input type='submit' value='Submit'>
									<input type='reset' value='Clear'>
								</form>
							</div>
							<div class='clearfix'> </div>
						</div>
					</div>
					<div class='contact-bottom'>
						<div class='contact-bottom-grids'>
							<p>But I must explain to you how all this mistaken idea of denouncing 
								pleasure and praising pain was born and I will give you a complete 
								account of the system, and expound the actual teachings of the great 
								explorer of the truth.</p>
							<div class='col-md-4 contact-bottom-grid'>
								<div class='dot'>
									<span class='glyphicon glyphicon-map-marker' aria-hidden='true'></span>
								</div>
								<h4>JI.Paulnadwam 2nd D.No:23-50-903.<span>United States</span></h4>
							</div>
							<div class='col-md-4 contact-bottom-grid'>
								<div class='dot'>
									<span class='glyphicon glyphicon-envelope' aria-hidden='true'></span>
								</div>
								<a href='mailto:info@example.com'>info@example.com</a>
							</div>
							<div class='col-md-4 contact-bottom-grid'>
								<div class='dot'>
									<span class='glyphicon glyphicon-earphone' aria-hidden='true'></span>
								</div>
								<h4>+020 456 9696</h4>
							</div>
							<div class='clearfix'> </div>
						</div>
					</div>
				<!-- //contact -->";
        return $html;
    }
    
    public function getObras()
    {
        $html=
        "<!-- gallery -->
				<div class='gallery'>
					<h1>Photo Gallery</h1>
					<h2 class='title1'>But I must explain to you how all this mistaken idea of denouncing pleasure.</h2>
					<div class='gallery-grids'>
						<div class='gallery-grid'>
							<a href='#portfolioModal1' class='portfolio-link' data-toggle='modal'>
								<img src='images/4.jpg' class='img-responsive' alt='' />
							</a>
						</div>
						<div class='gallery-grid1'>
							<a href='#portfolioModal2' class='portfolio-link' data-toggle='modal'>
								<img src='images/7.jpg' class='img-responsive' alt='' />
							</a>
						</div>
						<div class='gallery-grid'>
							<a href='#portfolioModal3' class='portfolio-link' data-toggle='modal'>
								<img src='images/6.jpg' class='img-responsive' alt='' />
							</a>
						</div>
						<div class='gallery-grid1'>
							<a href='#portfolioModal4' class='portfolio-link' data-toggle='modal'>
								<img src='images/8.jpg' class='img-responsive' alt='' />
							</a>
						</div>
						<div class='clearfix'> </div>
					</div>
					<div class='gallery-grids'>
						<div class='gallery-grid1'>
							<a href='#portfolioModal5' class='portfolio-link' data-toggle='modal'>
								<img src='images/9.jpg' class='img-responsive' alt='' />
							</a>
						</div>
						<div class='gallery-grid'>
							<a href='#portfolioModal6' class='portfolio-link' data-toggle='modal'>
								<img src='images/11.jpg' class='img-responsive' alt='' />
							</a>
						</div>
						<div class='gallery-grid1'>
							<a href='#portfolioModal7' class='portfolio-link' data-toggle='modal'>
								<img src='images/10.jpg' class='img-responsive' alt='' />
							</a>
						</div>
						<div class='gallery-grid'>
							<a href='#portfolioModal8' class='portfolio-link' data-toggle='modal'>
								<img src='images/12.jpg' class='img-responsive' alt='' />
							</a>
						</div>
						<div class='clearfix'> </div>
					</div>
				</div>
			<!-- //gallery -->
			<!-- gallery-Modals -->
				<div class='portfolio-modal modal fade slideanim' id='portfolioModal1' tabindex='-1' role='dialog' aria-hidden='true'>
					<div class='modal-content'>
						<div class='close-modal' data-dismiss='modal'>
							<div class='lr'>
								<div class='rl'></div>
							</div>
						</div>
						<div class='portfolio-container'>
							<div class='row'>
								<div class='col-lg-8 col-lg-offset-2 gallery-pop-up'>
									<div class='modal-body'>
										<h3>Photographer</h3>
										<hr>
										<img src='images/4.jpg' class='img-responsive img-centered' alt='' />
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
										Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
										when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class='portfolio-modal modal fade slideanim' id='portfolioModal2' tabindex='-1' role='dialog' aria-hidden='true'>
					<div class='modal-content'>
						<div class='close-modal' data-dismiss='modal'>
							<div class='lr'>
								<div class='rl'></div>
							</div>
						</div>
						<div class='portfolio-container'>
							<div class='row'>
								<div class='col-lg-8 col-lg-offset-2 gallery-pop-up'>
									<div class='modal-body'>
										<h3>Photographer</h3>
										<hr>
										<img src='images/7.jpg' class='img-responsive img-centered' alt='' />
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
										Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
										when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class='portfolio-modal modal fade slideanim' id='portfolioModal3' tabindex='-1' role='dialog' aria-hidden='true'>
					<div class='modal-content'>
						<div class='close-modal' data-dismiss='modal'>
							<div class='lr'>
								<div class='rl'></div>
							</div>
						</div>
						<div class='portfolio-container'>
							<div class='row'>
								<div class='col-lg-8 col-lg-offset-2 gallery-pop-up'>
									<div class='modal-body'>
										<h3>Photographer</h3>
										<hr>
										<img src='images/6.jpg' class='img-responsive img-centered' alt='' />
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
										Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
										when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class='portfolio-modal modal fade slideanim' id='portfolioModal4' tabindex='-1' role='dialog' aria-hidden='true'>
					<div class='modal-content'>
						<div class='close-modal' data-dismiss='modal'>
							<div class='lr'>
								<div class='rl'></div>
							</div>
						</div>
						<div class='portfolio-container'>
							<div class='row'>
								<div class='col-lg-8 col-lg-offset-2 gallery-pop-up'>
									<div class='modal-body'>
										<h3>Photographer</h3>
										<hr>
										<img src='images/8.jpg' class='img-responsive img-centered' alt='' />
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
										Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
										when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class='portfolio-modal modal fade slideanim' id='portfolioModal5' tabindex='-1' role='dialog' aria-hidden='true'>
					<div class='modal-content'>
						<div class='close-modal' data-dismiss='modal'>
							<div class='lr'>
								<div class='rl'></div>
							</div>
						</div>
						<div class='portfolio-container'>
							<div class='row'>
								<div class='col-lg-8 col-lg-offset-2 gallery-pop-up'>
									<div class='modal-body'>
										<h3>Photographer</h3>
										<hr>
										<img src='images/9.jpg' class='img-responsive img-centered' alt='' />
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
										Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
										when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class='portfolio-modal modal fade slideanim' id='portfolioModal6' tabindex='-1' role='dialog' aria-hidden='true'>
					<div class='modal-content'>
						<div class='close-modal' data-dismiss='modal'>
							<div class='lr'>
								<div class='rl'></div>
							</div>
						</div>
						<div class='portfolio-container'>
							<div class='row'>
								<div class='col-lg-8 col-lg-offset-2 gallery-pop-up'>
									<div class='modal-body'>
										<h3>Photographer</h3>
										<hr>
										<img src='images/11.jpg' class='img-responsive img-centered' alt='' />
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
										Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
										when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class='portfolio-modal modal fade slideanim' id='portfolioModal7' tabindex='-1' role='dialog' aria-hidden='true'>
					<div class='modal-content'>
						<div class='close-modal' data-dismiss='modal'>
							<div class='lr'>
								<div class='rl'></div>
							</div>
						</div>
						<div class='portfolio-container'>
							<div class='row'>
								<div class='col-lg-8 col-lg-offset-2 gallery-pop-up'>
									<div class='modal-body'>
										<h3>Photographer</h3>
										<hr>
										<img src='images/10.jpg' class='img-responsive img-centered' alt='' />
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
										Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
										when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class='portfolio-modal modal fade slideanim' id='portfolioModal8' tabindex='-1' role='dialog' aria-hidden='true'>
					<div class='modal-content'>
						<div class='close-modal' data-dismiss='modal'>
							<div class='lr'>
								<div class='rl'></div>
							</div>
						</div>
						<div class='portfolio-container'>
							<div class='row'>
								<div class='col-lg-8 col-lg-offset-2 gallery-pop-up'>
									<div class='modal-body'>
										<h3>Photographer</h3>
										<hr>
										<img src='images/12.jpg' class='img-responsive img-centered' alt='' />
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
										Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
										when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<!-- //gallery-Modals -->";
        return $html;
    }
}
