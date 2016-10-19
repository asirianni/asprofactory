<?php if ( ! defined('BASEPATH')) exit('No se permite el acceso directo al script');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Pagina 
{
   private $estilos;
    private $cabecera;
    private $detalle_cabecera;
    private $pie;
    private $configuraciones;
    private $java_script;
    private $title;
    private $body;
    private $menu;
    private $slider;
    protected $ci;  
    
   public function __construct() {
        $this->ci =&get_instance();
        $this->ci->load->helper("html");
        //$this->ci->load->model("Configuracion_model");
   }
   
   public function generar_estilos($css) {
        
        $estilo="recursos/css/".$css;
        
        $link = array(
          'href' => $estilo,
          'rel' => 'stylesheet',
          'type' => 'text/css'
        );

        $this->estilos.=link_tag($link);
    }
   
   public function generar_pagina_loguin() {
        $this->generar_estilos("bootstrap.min.css"); 
        //$this->generar_estilos("theme.css");
        //$this->generar_estilos("base-loguin.css");
        //$this->generar_estilos("main-loguin.css");
        $this->title="Loguin";
    }
    
   public function obtener_titulo() {
        echo $this->title;
   }
   
   public function obtener_estilos() {
        echo $this->estilos;
   }
   
   public function menu_administrador($imagen, $dni, $nombre, $apellido) {
       $menu="<!-- sidebar: style can be found in sidebar.less -->
                <section class='sidebar'>

                  <!-- Sidebar user panel (optional) -->
                  <div class='user-panel'>
                    <div class='pull-left image'>
                      <img src='".$imagen."' class='img-circle' alt='User Image'>
                    </div>
                    <div class='pull-left info'>
                      <p>".$nombre." ".$apellido."</p>
                      <!-- Status -->
                      <a href='#'><i class='fa fa-circle text-success'></i> Online</a>
                    </div>
                  </div>

                  <!-- search form (Optional) 
                  <form action='#' method='get' class='sidebar-form'>
                    <div class='input-group'>
                      <input type='text' name='q' class='form-control' placeholder='Search...'>
                          <span class='input-group-btn'>
                            <button type='submit' name='search' id='search-btn' class='btn btn-flat'><i class='fa fa-search'></i>
                            </button>
                          </span>
                    </div>
                  </form>-->
                  <!-- /.search form -->

                  <!-- Sidebar Menu -->
                  <ul class='sidebar-menu'>
                    <li class='header'>MENU</li>
                    <!-- Optionally, you can add icons to the links -->
                    <li class='active'><a href='".base_url()."index.php/Administrador/abm_imagenes_slider'><i class='fa fa-calendar-times-o'></i> <span>Home Slider</span></a></li>
                    <li class='active'><a href='".base_url()."index.php/Administrador/abm_imagenes_slider'><i class='fa fa-calendar-times-o'></i> <span>Home Slider</span></a></li>
                    <li class='treeview'>
                        <a href='".site_url('administrador/caja')."'><i class='fa fa-calculator'></i> <span>Caja</span></a>
                    </li>
                    <li class='treeview'>
                      <a href='#'><i class='fa fa-users'></i> <span>Usuarios</span>
                        <span class='pull-right-container'>
                          <i class='fa fa-angle-left pull-right'></i>
                        </span>
                      </a>
                      <ul class='treeview-menu'>
                        <li><a href='".site_url('administrador/abm_empleados')."'><i class='fa fa-arrow-circle-right'></i>ADMINISTRAR</a></li>
                      
                        <li><a href='".site_url('administrador/abm_horarios_habilitados')."'><i class='fa fa-arrow-circle-right'></i>ACCESO HORARIOS</a></li>
                      
                        <!--<li><a href='".site_url('administrador/abm_dias_habilitados')."'><i class='fa fa-arrow-circle-right'></i>ACCESO DIAS</a></li>-->
                      </ul>
                    </li>
                    <li class='treeview'>
                      <a href='#'><i class='fa fa-user-md'></i> <span>Profesionales</span>
                        <span class='pull-right-container'>
                          <i class='fa fa-angle-left pull-right'></i>
                        </span>
                      </a>
                      <ul class='treeview-menu'>
                        <li><a href='".site_url('administrador/abm_profesionales')."'><i class='fa fa-arrow-circle-right'></i>ABM PROFESIONALES</a></li>
                        <li><a href='".site_url('administrador/asignacion_horarios')."'><i class='fa fa-arrow-circle-right'></i>ASIGNACION HORARIOS</a></li>    
                        <li><a href='".site_url('administrador/asignacion_especialidades')."'><i class='fa fa-arrow-circle-right'></i>ASIGNACION ESPECIALIDADES</a></li>
                      </ul>
                    </li>
                    <li class='treeview'>
                      <a href='#'><i class='fa fa-stethoscope'></i> <span>Especialidades</span>
                        <span class='pull-right-container'>
                          <i class='fa fa-angle-left pull-right'></i>
                        </span>
                      </a>
                      <ul class='treeview-menu'>
                        <li><a href='".site_url('administrador/abm_especialidades')."'><i class='fa fa-arrow-circle-right'></i>ABM ESPECILIDADES</a></li>
                      </ul>
                    </li>
                    <li class='treeview'>
                      <a href='#'><i class='fa fa-hospital-o'></i> <span>Obras Sociales</span>
                        <span class='pull-right-container'>
                          <i class='fa fa-angle-left pull-right'></i>
                        </span>
                      </a>
                      <ul class='treeview-menu'>
                        <li><a href='".site_url('administrador/abm_obrassociales')."'><i class='fa fa-arrow-circle-right'></i>ABM OBRAS SOCIALES</a></li>
                        <li><a href='".site_url('administrador/abm_nomenclador')."'><i class='fa fa-arrow-circle-right'></i>ABM NOMENCLADOR</a></li>
                      </ul>
                    </li>
                    <li class='treeview'>
                      <a href='#'><i class='fa fa-wheelchair'></i> <span>Pacientes</span>
                        <span class='pull-right-container'>
                          <i class='fa fa-angle-left pull-right'></i>
                        </span>
                      </a>
                      <ul class='treeview-menu'>
                        <li><a href='".site_url('administrador/abm_pacientes')."'><i class='fa fa-arrow-circle-right'></i>ABM PACIENTES</a></li>
                            <li><a href='".site_url('administrador/abm_historias_clinicas')."'><i class='fa fa-arrow-circle-right'></i>ABM HIST. CLINICAS</a></li>
                      </ul>
                    </li>
                    <li class='treeview'>
                      <a href='#'><i class='fa fa-user-md'></i> <span>Reportes</span>
                        <span class='pull-right-container'>
                          <i class='fa fa-angle-left pull-right'></i>
                        </span>
                      </a>
                      <ul class='treeview-menu'>
                        <li><a href='".site_url('administrador/reporte_liquidacion_obras_sociales')."'><i class='fa fa-arrow-circle-right'></i>Liquidacion obras soc.</a></li>
                      </ul>
                    </li>
                    <!--<li class='treeview'>
                      <a href='#'><i class='fa fa-gear'></i> <span>Configuraciones</span>
                        <span class='pull-right-container'>
                          <i class='fa fa-angle-left pull-right'></i>
                        </span>
                      </a>
                      <ul class='treeview-menu'>
                        <li><a href='".site_url('administrador/abm_localidades')."'><i class='fa fa-arrow-circle-right'></i>ABM LOCALIDADES</a></li>
                        <li><a href='".site_url('administrador/abm_sucursales')."'><i class='fa fa-arrow-circle-right'></i>ABM SUCURSALES</a></li>
                        <li><a href='".site_url('administrador/abm_datos_home')."'><i class='fa fa-arrow-circle-right'></i>DATOS HOME</a></li> 
                        <li><a href='".site_url('administrador/abm_textos_deslizables')."'><i class='fa fa-arrow-circle-right'></i>TEXTOS DESLIZABLES HOME</a></li>
                        <li><a href='".site_url('administrador/abm_secciones')."'><i class='fa fa-arrow-circle-right'></i>ABM SECCIONES</a></li>
                      </ul>
                    </li>-->
                  </ul>
                  <!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->";
       return $menu;
   }
   
   public function menu_secretaria($imagen, $dni, $nombre, $apellido) 
   {
        $menu="<!-- sidebar: style can be found in sidebar.less -->
                <section class='sidebar'>

                  <!-- Sidebar user panel (optional) -->
                  <div class='user-panel'>
                    <div class='pull-left image'>
                      <img src='".$imagen."' class='img-circle' alt='User Image'>
                    </div>
                    <div class='pull-left info'>
                      <p>".$nombre." ".$apellido."</p>
                      <!-- Status -->
                      <a href='#'><i class='fa fa-circle text-success'></i> Online</a>
                    </div>
                  </div>

                  <!-- search form (Optional) 
                  <form action='#' method='get' class='sidebar-form'>
                    <div class='input-group'>
                      <input type='text' name='q' class='form-control' placeholder='Search...'>
                          <span class='input-group-btn'>
                            <button type='submit' name='search' id='search-btn' class='btn btn-flat'><i class='fa fa-search'></i>
                            </button>
                          </span>
                    </div>
                  </form>-->
                  <!-- /.search form -->

                  <!-- Sidebar Menu -->
                  <ul class='sidebar-menu'>
                    <li class='header'>MENU</li>
                    <!-- Optionally, you can add icons to the links -->
                    <li class='treeview'>
                        <a href='".site_url('secretaria/index')."'><i class='fa fa-calendar-times-o'></i> <span>Turnos</span></a>
                    </li>
               <!--<li class='treeview'>
                      <a href='#'><i class='fa fa-calendar-times-o'></i> <span>Turnos</span>
                        <span class='pull-right-container'>
                          <i class='fa fa-angle-left pull-right'></i>
                        </span>
                      </a>
                      <ul class='treeview-menu'>
                        <li><a href='".site_url('secretaria/ver_calendario')."'><i class='fa fa-arrow-circle-right'></i>Calendario</a></li>
                        <li><a href='".site_url('secretaria/ver_turnos_hoy')."'><i class='fa fa-arrow-circle-right'></i>Turnos hoy</a></li>
                        <li><a href='".site_url('secretaria/ver_turnos_proximos_confirmados')."'><i class='fa fa-arrow-circle-right'></i>Turnos confirmados</a></li>
                        <li><a href='".site_url('secretaria/ver_turnos_finalizados')."'><i class='fa fa-arrow-circle-right'></i>Turnos Finalizados</a></li>
                      </ul>
                    </li>-->
                    <li class='treeview'>
                        <a href='".site_url('secretaria/caja')."'><i class='fa fa-calculator'></i> <span>Caja</span></a>
                    </li>
                    <li class='treeview'>
                      <a href='#'><i class='fa fa-hospital-o'></i> <span>Obras Sociales</span>
                        <span class='pull-right-container'>
                          <i class='fa fa-angle-left pull-right'></i>
                        </span>
                      </a>
                      <ul class='treeview-menu'>
                        <li><a href='".site_url('administrador/abm_obrassociales')."'><i class='fa fa-arrow-circle-right'></i>ABM OBRAS SOCIALES</a></li>
                        <li><a href='".site_url('administrador/abm_nomenclador')."'><i class='fa fa-arrow-circle-right'></i>ABM NOMENCLADOR</a></li>
                      </ul>
                    </li>
                    <li class='treeview'>
                      <a href='#'><i class='fa fa-wheelchair'></i> <span>Pacientes</span>
                        <span class='pull-right-container'>
                          <i class='fa fa-angle-left pull-right'></i>
                        </span>
                      </a>
                      <ul class='treeview-menu'>
                        <li><a href='".site_url('administrador/abm_pacientes')."'><i class='fa fa-arrow-circle-right'></i>ABM PACIENTES</a></li>
                        <li><a href='".site_url('secretaria/abm_historias_clinicas')."'><i class='fa fa-arrow-circle-right'></i>ABM HIST. CLINICAS</a></li>
                      </ul>
                    </li>
                    <li class='treeview'>
                      <a href='#'><i class='fa fa-user-md'></i> <span>Reportes</span>
                        <span class='pull-right-container'>
                          <i class='fa fa-angle-left pull-right'></i>
                        </span>
                      </a>
                      <ul class='treeview-menu'>
                        <li><a href='".site_url('secretaria/reporte_liquidacion_obras_sociales')."'><i class='fa fa-arrow-circle-right'></i>Liquidacion obras soc.</a></li>
                      </ul>
                    </li>
                  </ul>
                  <!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->";
       return $menu;
   }
   
   public function menu_profesional($imagen, $dni, $nombre, $apellido) {
       $menu="<!-- sidebar: style can be found in sidebar.less -->
                <section class='sidebar'>

                  <!-- Sidebar user panel (optional) -->
                  <div class='user-panel'>
                    <div class='pull-left image'>
                      <img src='".$imagen."' class='img-circle' alt='User Image'>
                    </div>
                    <div class='pull-left info'>
                      <p>".$nombre." ".$apellido."</p>
                      <!-- Status -->
                      <a href='#'><i class='fa fa-circle text-success'></i> Online</a>
                    </div>
                  </div>

                  <!-- search form (Optional) 
                  <form action='#' method='get' class='sidebar-form'>
                    <div class='input-group'>
                      <input type='text' name='q' class='form-control' placeholder='Search...'>
                          <span class='input-group-btn'>
                            <button type='submit' name='search' id='search-btn' class='btn btn-flat'><i class='fa fa-search'></i>
                            </button>
                          </span>
                    </div>
                  </form>-->
                  <!-- /.search form -->

                  <!-- Sidebar Menu -->
                  <ul class='sidebar-menu'>
                    <li class='header'>MENU</li>
                    <!-- Optionally, you can add icons to the links -->
                    <li class='active'><a href='".base_url()."index.php/Profesional/index'><i class='fa fa-calendar-times-o'></i> <span>Turnos</span></a></li>
                    <li class='treeview'>
                      <a href='#'><i class='fa fa-wheelchair'></i> <span>Pacientes</span>
                        <span class='pull-right-container'>
                          <i class='fa fa-angle-left pull-right'></i>
                        </span>
                      </a>
                      <ul class='treeview-menu'>
                        <li><a href='".site_url('Profesional/abm_pacientes')."'><i class='fa fa-arrow-circle-right'></i>ABM PACIENTES</a></li>
                        <li><a href='".site_url('Profesional/abm_historias_clinicas')."'><i class='fa fa-arrow-circle-right'></i>ABM HIST. CLINICAS</a></li>
                      </ul>
                    </li>
                  </ul>
                  <!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->";
       return $menu;
   }
   
   public function cabecera_administrador($imagen, $dni, $nombre, $apellido) {
       $menu="<!-- Main Header -->
                <header class='main-header'>

                  <!-- Logo -->
                  <a href='' class='logo'>
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class='logo-mini'><b>A</b>dm</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class='logo-lg'><b>Administrador</b></span>
                  </a>

                  <!-- Header Navbar -->
                  <nav class='navbar navbar-static-top' role='navigation'>
                    <!-- Sidebar toggle button-->
                    <a href='#' class='sidebar-toggle' data-toggle='offcanvas' role='button'>
                      <span class='sr-only'>Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class='navbar-custom-menu'>
                      <ul class='nav navbar-nav'>
                        <!-- Tasks Menu -->
                        <!--<li class='dropdown messages-menu'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown'>
                                <i class='fa fa-envelope-o'></i>
                                <span class='label label-success'></span>
                            </a>
                            <ul class='dropdown-menu'>
                                <li class='header'>Tiene 4 mensajes</li>
                                <li>
                                    <ul class='menu'>
                                         <li> 
                                            <a href='#'>
                                                <div class='pull-left'>
                                                  <img src='' class='img-circle' alt='User Image'>
                                                </div>
                                                <h4>
                                                  Support Team
                                                  <small><i class='fa fa-clock-o'></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                              </a>
                                         </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>-->
                        <li class='dropdown notifications-menu'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown'>
                                <i class='fa fa-bell-o'></i>";
                                
                                
                                $cantidad= 0;
                                
                                $cantidad_turnos_pendientes = $cantidad;
                                $menu.="<span class='label label-warning'>".$cantidad."</span>
                            </a>
                            <ul class='dropdown-menu'>";
                                
                                if($cantidad != 0)
                                {
                                    $menu.="<li class='header'>Tiene ".$cantidad." notificaciones</li>
                                            <li>
                                                <ul class='menu'>";
                                                    if($cantidad_turnos_pendientes > 0)
                                                    {
                                                     $menu.="<li> 
                                                        <a href='".base_url()."index.php/secretaria/administrar_turnos_pendientes'>
                                                            <p><strong>".$cantidad_turnos_pendientes."</strong> Turnos pendientes</p>
                                                        </a>
                                                     </li>";
                                                    }
                                        $menu.="</ul>
                                            </li>";
                                }
                                else
                                {
                                    $menu.="<li class='header'>Felicidades tiene ".$cantidad." notificaciones</li>";
                                }
                     $menu.="</ul>
                        </li>
                        <li class='dropdown tasks-menu'>
                        </li>
                        <!-- User Account Menu -->
                        <li class='dropdown user user-menu'>
                          <!-- Menu Toggle Button -->
                          <a href='#' class='dropdown-toggle' data-toggle='dropdown'>
                            <!-- The user image in the navbar-->
                            <img src='".$imagen."' class='user-image' alt='User Image'>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class='hidden-xs'>".$nombre." ".$apellido."</span>
                          </a>
                          <ul class='dropdown-menu'>
                            <!-- The user image in the menu -->
                            <li class='user-header'>
                              <img src='".$imagen."' class='img-circle' alt='User Image'>

                              <p>
                                ".$nombre." ".$apellido." - Administrador
                                <small>".$dni."</small>
                              </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class='user-footer'>
                              <div class='pull-left'>
                                <a href='".base_url()."index.php/Administrador/miPerfil' class='btn btn-default btn-flat'>Mi Perfil</a>
                              </div>
                              <div class='pull-right'>
                                <a href='".base_url()."index.php/Administrador/cerrar_sesion' class='btn btn-default btn-flat'>Cerrar Sesion</a>
                              </div>
                            </li>
                          </ul>
                        </li>
                        <li>
                            <a href='".base_url()."index.php/Administrador/abm_datos_home' ><i class='fa fa-home'></i></a>
                        </li>
                        <li>
                            <a href='' data-toggle='control-sidebar'><i class='fa fa-gears'></i></a>
                        </li>
                      </ul>
                    </div>
                  </nav>
                </header>";
       return $menu;
   }
   
   public function cabecera_secretaria($imagen, $dni, $nombre, $apellido) 
   {
        $menu="<!-- Main Header -->
                <header class='main-header'>

                  <!-- Logo -->
                  <a href='' class='logo'>
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class='logo-mini'><b>A</b>dm</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class='logo-lg'><b>Cedip</b></span>
                  </a>

                  <!-- Header Navbar -->
                  <nav class='navbar navbar-static-top' role='navigation'>
                    <!-- Sidebar toggle button-->
                    <a href='#' class='sidebar-toggle' data-toggle='offcanvas' role='button'>
                      <span class='sr-only'>Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class='navbar-custom-menu'>
                      <ul class='nav navbar-nav'>
                        <!-- Tasks Menu -->
                        <!--<li class='dropdown messages-menu'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown'>
                                <i class='fa fa-envelope-o'></i>
                                <span class='label label-success'></span>
                            </a>
                            <ul class='dropdown-menu'>
                                <li class='header'>Tiene 4 mensajes</li>
                                <li>
                                    <ul class='menu'>
                                         <li> 
                                            <a href='#'>
                                                <div class='pull-left'>
                                                  <img src='' class='img-circle' alt='User Image'>
                                                </div>
                                                <h4>
                                                  Support Team
                                                  <small><i class='fa fa-clock-o'></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                              </a>
                                         </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>-->
                        <li class='dropdown notifications-menu'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown'>
                                <i class='fa fa-bell-o'></i>";
                                
                                $this->ci->load->model("Turnos_model");
                                $cantidad = $this->ci->Turnos_model->getCantidadTurnosEnPendiente();
                                
                                $cantidad= (int)$cantidad["cantidad"];
                                
                                $cantidad_turnos_pendientes = $cantidad;
                                $menu.="<span class='label label-warning'>".$cantidad."</span>
                            </a>
                            <ul class='dropdown-menu'>";
                                
                                if($cantidad != 0)
                                {
                                    $menu.="<li class='header'>Tiene ".$cantidad." notificaciones</li>
                                            <li>
                                                <ul class='menu'>";
                                                    if($cantidad_turnos_pendientes > 0)
                                                    {
                                                     $menu.="<li> 
                                                        <a href='".base_url()."index.php/secretaria/administrar_turnos_pendientes'>
                                                            <p><strong>".$cantidad_turnos_pendientes."</strong> Turnos pendientes</p>
                                                        </a>
                                                     </li>";
                                                    }
                                        $menu.="</ul>
                                            </li>";
                                }
                                else
                                {
                                    $menu.="<li class='header'>Felicidades tiene ".$cantidad." notificaciones</li>";
                                }
                     $menu.="</ul>
                        </li>
                        <li class='dropdown tasks-menu'>
                        </li>
                        <!-- User Account Menu -->
                        <li class='dropdown user user-menu'>
                          <!-- Menu Toggle Button -->
                          <a href='#' class='dropdown-toggle' data-toggle='dropdown'>
                            <!-- The user image in the navbar-->
                            <img src='".$imagen."' class='user-image' alt='User Image'>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class='hidden-xs'>".$nombre." ".$apellido."</span>
                          </a>
                          <ul class='dropdown-menu'>
                            <!-- The user image in the menu -->
                            <li class='user-header'>
                              <img src='".$imagen."' class='img-circle' alt='User Image'>

                              <p>
                                ".$nombre." ".$apellido." - Administrador
                                <small>".$dni."</small>
                              </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class='user-footer'>
                              <div class='pull-left'>
                                <a href='".base_url()."index.php/Administrador/miPerfil' class='btn btn-default btn-flat'>Mi Perfil</a>
                              </div>
                              <div class='pull-right'>
                                <a href='".base_url()."index.php/Administrador/cerrar_sesion' class='btn btn-default btn-flat'>Cerrar Sesion</a>
                              </div>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                  </nav>
                </header>";
       return $menu;
       
   }
   
   public function cabecera_profesional($imagen, $dni, $nombre, $apellido) 
   {
       $menu="<!-- Main Header -->
                <header class='main-header'>

                  <!-- Logo -->
                  <a href='' class='logo'>
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class='logo-mini'><b>A</b>dm</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class='logo-lg'><b>Cedip</b></span>
                  </a>

                  <!-- Header Navbar -->
                  <nav class='navbar navbar-static-top' role='navigation'>
                    <!-- Sidebar toggle button-->
                    <a href='#' class='sidebar-toggle' data-toggle='offcanvas' role='button'>
                      <span class='sr-only'>Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class='navbar-custom-menu'>
                      <ul class='nav navbar-nav'>
                        <!-- Tasks Menu -->
                        <!--<li class='dropdown messages-menu'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown'>
                                <i class='fa fa-envelope-o'></i>
                                <span class='label label-success'>4</span>
                            </a>
                            <ul class='dropdown-menu'>
                                <li class='header'>Tiene 4 mensajes</li>
                                <li>
                                    <ul class='menu'>
                                         <li> 
                                            <a href='#'>
                                                <div class='pull-left'>
                                                  <img src='' class='img-circle' alt='User Image'>
                                                </div>
                                                <h4>
                                                  Support Team
                                                  <small><i class='fa fa-clock-o'></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                              </a>
                                         </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class='dropdown notifications-menu'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown'>
                                <i class='fa fa-bell-o'></i>
                                <span class='label label-warning'>4</span>
                            </a>
                            <ul class='dropdown-menu'>
                                <li class='header'>Tiene 4 mensajes</li>
                                <li>
                                    <ul class='menu'>
                                         <li> 
                                            <a href='#'>
                                                <div class='pull-left'>
                                                  <img src='' class='img-circle' alt='User Image'>
                                                </div>
                                                <h4>
                                                  Support Team
                                                  <small><i class='fa fa-clock-o'></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                              </a>
                                         </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>-->
                        <li class='dropdown tasks-menu'>
                        </li>
                        <!-- User Account Menu -->
                        <li class='dropdown user user-menu'>
                          <!-- Menu Toggle Button -->
                          <a href='#' class='dropdown-toggle' data-toggle='dropdown'>
                            <!-- The user image in the navbar-->
                            <img src='".$imagen."' class='user-image' alt='User Image'>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class='hidden-xs'>".$nombre." ".$apellido."</span>
                          </a>
                          <ul class='dropdown-menu'>
                            <!-- The user image in the menu -->
                            <li class='user-header'>
                              <img src='".$imagen."' class='img-circle' alt='User Image'>

                              <p>
                                ".$nombre." ".$apellido." - Profesional
                                <small>".$dni."</small>
                              </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class='user-footer'>
                              <div class='pull-left'>
                                <a href='".base_url()."index.php/Administrador/miPerfil' class='btn btn-default btn-flat'>Mi Perfil</a>
                              </div>
                              <div class='pull-right'>
                                <a href='".base_url()."index.php/Administrador/cerrar_sesion' class='btn btn-default btn-flat'>Cerrar Sesion</a>
                              </div>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                  </nav>
                </header>";
       return $menu;
   }
   
   public function render_ver_perfil()
   {
       
   }
   
   public function getCabecera($tipo_usuario,$logo, $dni, $nombre, $apellido)
   {
        $respuesta = null;
        
        switch($tipo_usuario)
        {
            case "1":
            case "3":
                    $respuesta = $this->cabecera_administrador($logo, $dni, $nombre, $apellido);
                break;
            case "2":$respuesta = $this->cabecera_secretaria($logo, $dni, $nombre, $apellido);
                break;
            case "4": $respuesta = $this->cabecera_profesional($logo, $dni, $nombre, $apellido);
                break;
        }
        return $respuesta;
   }
   
   public function getMenu($tipo_usuario,$imagen, $dni, $nombre, $apellido)
   {
        $respuesta = null;
       
        switch($tipo_usuario)
        {
            case "1":
            case "3":
                $respuesta = $this->menu_administrador($imagen, $dni, $nombre, $apellido);
                break;
            case "2":$respuesta = $this->menu_secretaria($imagen, $dni, $nombre, $apellido);
                break;
            case "4": $respuesta = $this->menu_profesional($imagen, $dni, $nombre, $apellido);
                break;
        }
        return $respuesta;
   }
   
    public function generar_escritorio_administrador()
    {
        $html= "";
        return $html;
    }
    
    
    public function generar_escritorio_profesional($especialidades)
    {
        $html=
        "
            	<div class='row'>
                        <div class='col-md-6 col-sm-12 col-xs-12' id='div_calendario'>
                                <!-- Form Element sizes -->
                                <div class='box box-success'>
                                  <div class='box-header with-border'>
                                    <div class='col-md-12'>
                                        <div class='row'>
                                            <div class='col-md-3'>
                                                <select  id='mes_escritorio_profesional' class='form-control'>";
                                                    $meses = Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                                    $mes_actual = (int)Date('m');
                                                    
                                                    for($i=0; $i < 12;$i++)
                                                    {
                                                        if(($i+1)== $mes_actual)
                                                        {
                                                            $html.="<option value='".($i+1)."' selected>".$meses[$i]."</option>";
                                                        }
                                                        else
                                                        {
                                                           $html.="<option value='".($i+1)."'>".$meses[$i]."</option>"; 
                                                        }
                                                    }
                                                $html.="</select>
                                            </div>
                                            <div class='col-md-3'>
                                                <select  id='anio_escritorio_profesional' class='form-control'>";
                                                $html.="<option value='".Date('Y')."' selected>".Date('Y')."</option>";
                                                $anio_proximo = (int)Date('Y');
                                                $anio_proximo+=1;
                                                $html.="<option value='".$anio_proximo."'>".$anio_proximo."</option>";
                                                $html.="</select>
                                            </div>
                                            <div class='col-md-6'>
                                                <select id='especialidad_escritorio_profesional' class='form-control chosen-select'>";
                                                foreach ($especialidades as $value) 
                                                {
                                                    $html.="<option value='".$value["codigo"]."'>".$value["especialidad"]."</option>";
                                                }
                                                $html.="</select>
                                            </div>
                                            <!--<div class='col-md-offset-4 col-md-4' style='margin-top: 10px;'>
                                                <input type='button' class='btn btn-success' value='Ver todo los turnos'/>
                                            </div>-->
                                        </div>
                                    </div>
                                  </div>
                                  <div class='box-body'>
                                
                                    <div id='calendario' style='width: 100%;margin-top: 10px;'>
                                            <div class='col-md-12 col-xs-12 col-sm-12 sinpadding' style='background-color: #53a3a3;width: 100%;text-align:center;'>
                                                    <!--<input style='float:left;background-color:#04b173;' type='button' class='btn btn-default' value='<' onClick='mes_anterior(&#039;calendario&#039;)'/>-->
                                                    <span style='font-size: 22px;;color:#fff;' id='calendario_mes'></span>
                                                    <!--<input style='float:right;background-color:#04b173;' type='button' class='btn btn-default' value='>' onClick='mes_siguiente(&#039;calendario&#039;)'/>-->
                                            </div>
                                            <div id='nombres_dia' class='col-md-10 col-sm-10 col-xs-10' style='padding: 0;'>
                                                    
                                            </div>
                                            <div id='nombresdia1' class='col-md-2 col-sm-2 col-xs-2 sinpadding' style='padding: 0;'>
                            
                                                
                                            </div>
                                            <!-- MESES -->
                                            <div id='calendario_botonera' class='col-md-10 col-sm-10 col-xs-10 sinpadding'>
                                            <!-- ENERO -->

                                            </div>
                                            <div id='calendario_botonera_dos' class='col-md-2 col-sm-2 col-xs-2 sinpadding'>
                                            <!-- ENERO -->
                                                
                                            </div>




                                    </div>
                                    </div>
                                        <!-- /.box-body -->
                                      </div>
                                      <!-- /.box -->
                            
			</div>
                        
                        <div class='col-md-6 col-sm-12 col-xs-12' id='muestra_turnos_hoy' style=''>
                            <!-- Form Element sizes -->
                            <div class='box box-success'>
                              <div class='box-header with-border'>
                                <div class='col-md-offset-7 col-md-5'>
                                            <div class='col-md-5'>
                                                <input type='button' class='btn btn-success' onClick='mostrar_turnos_hoy()' value='Turnos hoy'/>
                                            </div>
                                            <div class='col-md-offset-2 col-md-5'>
                                                <input type='button' class='btn btn-success' onClick='historico_turno()' value='Historico'/>
                                            </div>
                                </div>
                              </div>
                              <div class='box-body' id='tabla_turnos_hoy_profesional'>
                                <div>
                                    <table id='tabla_asignar_especialidades' data-toggle='table'  
                                    data-url='".base_url()."index.php/Profesional/getTurnosHoyLista'
                                    data-search='true'
                                    data-show-refresh='true' 
                                    data-show-columns='true'  
                                    data-pagination='true' style='background-color: #fff;'>
                                     <thead>
                                         <tr>
                                             <th data-field='nombre' data-visible='true'>Paciente</th>
                                             <th data-field='dni' data-visible='true'>Dni</th>
                                             <th data-field='especialidad' data-visible='true'>especialidad</th>
                                             <th data-field='hora_desde' data-visible='true'>Desde</th>
                                             <th data-field='hora_hasta' data-visible='true'>Hasta</th>
                                             <th data-field='estado' data-visible='true'>Estado</th>
                                             <th data-field='options' data-formatter='optionsFormatterVerTurno'> </th>
                                          </tr>
                                     </thead>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class='box-body' id='tabla_historial_turnos_profesional' hidden='true'>
                                <div>
                                    <table id='tabla_asignar_especialidades' data-toggle='table'  
                                    data-url='".base_url()."index.php/Profesional/getHistoricoTurnos'
                                    data-search='true'
                                    data-show-refresh='true' 
                                    data-show-columns='true'  
                                    data-pagination='true' style='background-color: #fff;'>
                                     <thead>
                                         <tr>
                                             <th data-field='paciente' data-visible='true'>Paciente</th>
                                             <th data-field='fecha' data-visible='true'>Fecha</th>
                                             <th data-field='especialidad' data-visible='true'>especialidad</th>
                                             <th data-field='hora_desde' data-visible='true'>Desde</th>
                                             <th data-field='hora_hasta' data-visible='true'>Hasta</th>
                                             <th data-field='estado' data-visible='true'>Estado</th>
                                          </tr>
                                     </thead>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                          </div>
                          <!-- /.box -->
			</div>
		</div>
        
                <script>
                $(document).ready(function(){ inicializarTurnosHoy();});
                   
                </script>";
        return $html;
    }
    
    public function generar_escritorio_secretaria($especialidades)
    {
        $html=
        "
            	<div class='row'>
			<div class='col-md-4'>
                        <!-- Form Element sizes -->
                        <div class='box box-success'>
                          <div class='box-header with-border'>
                            <!--<h3 class='box-title'>Different Height</h3>-->
                          </div>
                          <div class='box-body'>   
				<div class='col-md-12'>
					<label for='especialidad_turnero'>Especialidad</label>
					<select class='form-control chosen-select' name='especialidad_turnero' id='especialidad_turnero'>
                                        <option value='nada'>Seleccione</option>";
                                        foreach ($especialidades as $value) {
                                            $html.="<option value='".$value["codigo"]."'>".$value["especialidad"]."</option>";
                                        }
        
					$html.="</select>
				</div>
				<div class='col-md-12'>
					<label for='profesional_turnero'>Medico</label>
					<select class='form-control' name='profesional_turnero' id='profesional_turnero' disabled='disabled'>
                                            <option value='nada'>Seleccione Especialidad</option>
					</select>
				</div>
				<div class='col-md-12'>
					<label for='anio_turnero'>Año</label>
					<select class='form-control' name='anio_turnero' id='anio_turnero'>
						
					</select>
				</div>
				<div class='col-md-12'>
					<label for='mes_turnero'>Mes</label>
					<select class='form-control' name='mes_turnero' id='mes_turnero'>
						<option>Value</option>
					</select>
				</div>
                                <div class='col-md-12' style='margin-top: 10px;'>
                                    <input type='button' class='btn btn-success form-control' value='VER TURNOS' id='btn_ver_turno'/>
				</div>
			</div>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
          
        

                        <div class='col-md-8 col-sm-12 col-xs-12' >
                                <!-- Form Element sizes -->
                                <div class='box box-success'>
                                  <div class='box-header with-border'>
                                    <div class='col-md-8'>
                                        <div class='row'>
                                            <input type='button' class='btn btn-success' onClick='mostrar_turnos_todos()' value='Turnos todos'/>
                                            <input type='button' class='btn btn-success' onClick='mostrar_turnos_hoy()' value='Turnos hoy'/>
                                            <input type='button' class='btn btn-success' onClick='mostrar_calendario()' value='Calendario'/>
                                        </div>
                                    </div>
                                  </div>
                                  <div class='box-body' hidden='true' id='div_calendario'>
                                
                                        <div id='calendario' style='width: 100%;margin-top: 10px;'>
                                                <div class='col-md-12 col-xs-12 col-sm-12 sinpadding' style='background-color: #53a3a3;width: 100%;text-align:center;'>
                                                        <!--<input style='float:left;background-color:#04b173;' type='button' class='btn btn-default' value='<' onClick='mes_anterior(&#039;calendario&#039;)'/>-->
                                                        <span style='font-size: 22px;;color:#fff;' id='calendario_mes'></span>
                                                        <!--<input style='float:right;background-color:#04b173;' type='button' class='btn btn-default' value='>' onClick='mes_siguiente(&#039;calendario&#039;)'/>-->
                                                </div>
                                                <div id='nombres_dia' class='col-md-10 col-sm-10 col-xs-10' style='padding: 0;'>

                                                </div>
                                                <div id='nombresdia1' class='col-md-2 col-sm-2 col-xs-2 sinpadding' style='padding: 0;'>


                                                </div>
                                                <!-- MESES -->
                                                <div id='calendario_botonera' class='col-md-10 col-sm-10 col-xs-10 sinpadding'>
                                                <!-- ENERO -->

                                                </div>
                                                <div id='calendario_botonera_dos' class='col-md-2 col-sm-2 col-xs-2 sinpadding'>
                                                <!-- ENERO -->
                                                </div>
                                        </div>
                                    </div>
                                    <div class='box-body' hidden='true' id='tabla_turnos_todos_secretaria' >
                                        <table id='tabla_asignar_especialidades' data-toggle='table'  
                                        data-url='".base_url()."index.php/Secretaria/getTurnosDesdeHoyLista'
                                        data-search='true'
                                        data-show-refresh='true' 
                                        data-show-columns='true'  
                                        data-pagination='true' style='background-color: #fff;'>
                                         <thead>
                                             <tr>
                                                 <th data-field='codigo' data-visible='false' data-sortable='true'>Turno</th>
                                                 <th data-field='fecha' data-visible='true' data-sortable='true'>Fecha</th>
                                                 <th data-field='nombre_profesional' data-visible='false'>Profesional</th>
                                                 <th data-field='nombre_paciente' data-visible='true'>Paciente</th>
                                                 <th data-field='paciente' data-visible='false'>Dni</th>
                                                 <th data-field='hora_desde' data-visible='true'>Desde</th>
                                                 <th data-field='hora_hasta' data-visible='true'>Hasta</th>
                                                 <th data-field='estado' data-visible='true'>Estado</th>
                                                 <th data-field='importe' data-visible='true'>Precio</th>
                                                 <th data-field='cobrado' data-visible='true'>Cobrado:</th>
                                                 <th data-field='options' data-formatter='optionsFormatterCobrarTurno'> </th>
                                              </tr>
                                         </thead>
                                        </table>
                                    </div>
                                    <div class='box-body' id='tabla_turnos_hoy_secretaria'>
                                        <table id='tabla_asignar_especialidades' data-toggle='table'  
                                        data-url='".base_url()."index.php/Secretaria/getTurnosHoyLista'
                                        data-search='true'
                                        data-show-refresh='true' 
                                        data-show-columns='true'  
                                        data-pagination='true' style='background-color: #fff;'>
                                         <thead>
                                             <tr>
                                                 <th data-field='codigo' data-visible='false' data-sortable='true'>Turno</th>
                                                 <th data-field='fecha' data-visible='true' data-sortable='true'>Fecha</th>
                                                 <th data-field='nombre_profesional' data-visible='false'>Profesional</th>
                                                 <th data-field='nombre_paciente' data-visible='true'>Paciente</th>
                                                 <th data-field='paciente' data-visible='false'>Dni</th>
                                                 <th data-field='hora_desde' data-visible='true'>Desde</th>
                                                 <th data-field='hora_hasta' data-visible='true'>Hasta</th>
                                                 <th data-field='estado' data-visible='true'>Estado</th>
                                                 <th data-field='importe' data-visible='true'>Precio</th>
                                                 <th data-field='cobrado' data-visible='true'>Cobrado:</th>
                                                 <th data-field='options' data-formatter='optionsFormatterCobrarTurno'> </th>
                                              </tr>
                                         </thead>
                                        </table>
                                    </div>
                                    <!-- /.box-body -->
                               </div>
                           <!-- /.box -->
                            
			</div>
                        

                        
                        
		</div>
        
                <script>
                $(document).ready(function(){ inicializarTurnosHoy();});
                   
                </script>";
        return $html;
    }
    function generar_render_datos_personales($dni,$correo,$usuario,$pass,$nombre,$apellido,$telefono,$movil,$tipo_usuario,$direccion,$sucursal,$localidad,$imagen,$inicio,$operativo) {
        $contenido="
            
        <div class='row'>
            <input type='text' id='dni' name='dni' value='".$dni."' hidden='true'/>
            <div class='col-sm-12 col-md-offset-2 col-md-8 col-md-offset-2 col-lg-offset-2 col-lg-8 col-lg-offset-2'>
              <form role='form' action='".base_url()."index.php/Administrador/actualizar_datos' class='form' enctype='multipart/form-data' method='post' accept-charset='utf-8'>
                <div class='box box-success' style='padding: 2%;'>
                  <div class='box-header with-border'>
                    <div align='right'>
                      <button type='submit' class='btn btn-primary' style='background-color:#53a3a3;margin-bottom: 5px;'>Actualizar mi perfil</button>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='col-sm-12 col-md-5 col-lg-4' align='center'>
                      <img src='".$imagen."' id='imagen' width='160' height='160' style='border-width: 9px; border-style: solid; border-color: #04b173; border-radius: 10px;'/>
                    </div>
                    <div class='col-sm-12 col-md-7 col-lg-8'>
                      <div class='row'>
                        <div class='col-sm-12 col-md-12 col-lg-12'>
                          <label for=''>Usuario</label>
                          <div class='input-group'>
                            <span class='input-group-addon'><li class='fa fa-user'></li></span>
                            <input type='text' class='form-control' readonly='readonly' id='usuario' name='usuario' value='".$usuario."'>
                          </div>
                        </div>
                        <div class='col-sm-12 col-md-12 col-lg-12'>
                          <label for=''>Contraseña</label>
                          <div class='input-group'>
                            <span class='input-group-addon'><li class='fa fa-key'></li></span>
                            <input type='password' id='password' name='password'class='form-control' value='".$pass."'/>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='col-sm-4 col-md-4 col-lg-4'>
                      <label for=''>Dni</label>
                      <input type='text' class='form-control' value='".$dni."' disabled/>
                    </div>
                    <div class='col-sm-4 col-md-4 col-lg-4'>
                      <label for=''>Nombre</label>
                      <input type='text' id='nombre' name='nombre' class='form-control' value='".$nombre."'/>
                    </div>
                    <div class='col-sm-4 col-md-4 col-lg-4'>
                      <label for=''>Apellido</label>
                      <input type='text' id='apelllido' name='apellido' class='form-control' value='".$apellido."'/>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='col-sm-4 col-md-4 col-lg-4'>
                      <label for=''>Telefono</label>
                      <div class='input-group'>
                        <span class='input-group-addon'><li class='fa fa-phone-square'></li></span>
                        <input type='text' id='telefono' name='telefono' class='form-control' value='".$telefono."'/>
                      </div>       
                    </div>
                    <div class='col-sm-4 col-md-4 col-lg-4'>
                      <label for=''>Movil</label>
                      <div class='input-group'>
                        <span class='input-group-addon'><li class='fa fa-mobile'></li></span>
                        <input type='text' id='movil' name='movil' class='form-control' value='".$movil."'/>
                      </div>
                    </div>
                    <div class='col-sm-4 col-md-4 col-lg-4'>
                      <label for=''>Direccion</label>
                      <div class='input-group'>
                        <span class='input-group-addon'><li class='fa fa-thumb-tack'></li></span>
                        <input type='text' id='direccion' name='direccion' class='form-control' value='".$direccion."'/>
                      </div>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='col-sm-4 col-md-4 col-lg-4'>
                      <label for=''>Tipo de usuario:</label>
                      <input type='text' class='form-control' value='".$tipo_usuario."'disabled>
                    </div>
                    <div class='col-sm-4 col-md-4 col-lg-4'>
                      <label for=''>sucursal</label>
                      <input class='form-control' value='".$sucursal."' disabled>
                    </div>
                    <div class='col-sm-4 col-md-4 col-lg-4'>
                      <label for=''>localidad</label>
                      <input class='form-control' id='localidad' value='".$localidad."' disabled/>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='col-sm-3 col-md-3 col-lg-3'>
                      <label for=''>Operativo</label>
                      <input class='form-control' value='".$operativo."' disabled/>
                    </div>
                    <div class='col-sm-3 col-md-3 col-lg-3'>
                      <label for=''>Inicio</label>
                      <input class='form-control' value='".$inicio."' disabled/>
                    </div>
                    <div class='col-sm-6 col-md-6 col-lg-6'>
                      <label for=''>Correo</label>
                      <input type='mail' id='correo' name='correo' class='form-control' value='".$correo."'/>
                    </div>
                  </div>
                  <div class='row'>
                      <div class='col-sm-12 col-lg-12 col-md-12'>
                        <label for=''>Imagen</label>
                        <input type='file' id='imagen' name='imagen'/>
                      </div>
                  </div>
                  </div>
                </form>
              </div>
            </div>";
        return $contenido;
    }
   
     public function generar_render_administrar_profesionales()
    {
        $html="
			<div class='box box-success'>
                            <div class='box-body'>
                                <table id='tabla_asignar_especialidades' data-toggle='table'  
                                data-url='".  base_url()."index.php/Administrador/getListadoProfesionales'
                                data-search='true'
                                data-show-refresh='true' 
                                data-show-columns='true'  
                                data-pagination='true' style='background-color: #fff;'>
                                 <thead>
                                     <tr>
                                         <th data-field='codigo' data-visible='true'>Codigo</th>
                                         <th data-field='dni' data-visible='true'>Dni</th>
                                         <th data-field='matricula' data-visible='true'>Matricula</th>
                                         <th data-field='nombre' data-visible='true'>Nombre</th>
                                         <th data-field='apellido' data-visible='true'>Apellido</th>
                                         <th data-field='inicio' data-visible='true'>Inicio</th>
                                         <th data-field='operativo' data-visible='true'>Operativo</th>
                                         <th data-field='telefono' data-visible='true'>telefono</th>
                                         <th data-field='movil' data-visible='true'>movil</th>

                                         <th data-field='options' data-formatter='optionsFormatterEspecialidadProfesional'>Especialidades</th>
                                     </tr>
                                 </thead>
                                </table>
                           </div>
                        </div>";
        
        return $html;
    }
    
    public function render_asignar_especialidades($codigo,$nombre,$apellido,$especialidades_profesional,$especialidades,$especialidades_faltantes)
    {
        $html=                  
        "                
                                <div class='row'>
	                        	<div class='col-md-12'>
									<h2 class='text-center' style='margin-bottom: 10px;' >Especialidades ".$nombre." ".$apellido."</h2>
									 <input type='text' id='codigo_profesional_modal_especialidades' hidden='true' value='".$codigo."'/>";
                                                                        if(count($especialidades_faltantes) > 0)
                                                                        {
                                                                            $html.="<div class='from-group'>
                                                                                    <label for='agregar_especialidad_profesional'>Agregar especialidad</label>
                                                                                    <select id='agregar_especialidad_profesional' name='agregar_especialidad_profesional' class='form-control'>";
                                                                            foreach ($especialidades_faltantes as $value) {
                                                                                    $html.="<option value='".$value["codigo"]."'>".$value["especialidad"]."</option>";
                                                                            }
                                                                            $html.="</select><br>"
                                                                                 . "<input type='button' class='btn btn-success form-control' id='btn_agregar_especialidad' value='Agregar Especialidad'/>";
                                                                        }
										$html.="
									</div>
									<table class='table table-bordered' id='especialidades_del_profesional' style='margin-top: 10px;'>
										<thead>
											<th style='width: 20px;'>Codigo</th>
											<th>Especialidad</th>
											<th style='width: 20px;'>Borrar</th>
										</thead>
										<div>";
                                                                                foreach ($especialidades_profesional as $value) 
                                                                                {
            
                                                                                       $html.="<tr>
                                                                                                <td>".$value["codigo"]."</td>
                                                                                                <td>".$value["especialidad"]."</td>
                                                                                                <td><img src='".base_url()."recursos/img/pagina/delete.png' onClick='borrar_especialidad_profesional(".$codigo.",".$value["codigo"].")'/></td>
                                                                                               </tr>";
                                                                                }
									$html.="</div>
									</table>
	                        	</div>
	                        </div>
                                <script>
                                    $('#btn_agregar_especialidad').click(function(){
                                        var codigo_especialidad = document.getElementById('agregar_especialidad_profesional').value;
                                        var cod_medico = document.getElementById('codigo_profesional_modal_especialidades').value;
                                        agregar_especialidad_profesional(cod_medico,codigo_especialidad);
                                    });
                                    
                                    
                                </script>";
        
        return $html;
    }
    
    private function getTurnero($especialidades)
    {
        $html=
        "
            	<div class='row'>
			<div class='col-md-5'>
                        <!-- Form Element sizes -->
                        <div class='box box-success'>
                          <div class='box-header with-border'>
                            <!--<h3 class='box-title'>Different Height</h3>-->
                          </div>
                          <div class='box-body'>   
				<div class='col-md-12'>
					<label for='especialidad_turnero'>Especialidad</label>
					<select class='form-control chosen-select' name='especialidad_turnero' id='especialidad_turnero'>
                                        <option value='nada'>Seleccione</option>";
                                        foreach ($especialidades as $value) {
                                            $html.="<option value='".$value["codigo"]."'>".$value["especialidad"]."</option>";
                                        }
        
					$html.="</select>
				</div>
				<div class='col-md-12'>
					<label for='profesional_turnero'>Medico</label>
					<select class='form-control' name='profesional_turnero' id='profesional_turnero' disabled='disabled'>
                                            <option value='nada'>Seleccione Especialidad</option>
					</select>
				</div>
				<div class='col-md-12'>
					<label for='anio_turnero'>Año</label>
					<select class='form-control' name='anio_turnero' id='anio_turnero'>
						
					</select>
				</div>
				<div class='col-md-12'>
					<label for='mes_turnero'>Mes</label>
					<select class='form-control' name='mes_turnero' id='mes_turnero'>
						<option>Value</option>
					</select>
				</div>
                                <div class='col-md-12' style='margin-top: 10px;'>
                                    <input type='button' class='btn btn-success form-control' value='VER TURNOS' id='btn_ver_turno'/>
				</div>
			</div>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
          
        

                        <div class='col-md-7 col-sm-12 col-xs-12' hidden='true' id='div_calendario'>
                                <!-- Form Element sizes -->
                                <div class='box box-success'>
                                  <div class='box-header with-border'>
                                    <div class='col-md-8'>
                                        <div class='row'>
                                            
                                            <input type='button' class='btn btn-success' onClick='mostrar_turnos_hoy()' value='Turnos hoy'/>
                                            <input type='button' class='btn btn-success' onClick='mostrar_calendario()' value='Calendario'/>
                                        </div>
                                    </div>
                                  </div>
                                  <div class='box-body'>
                                
                                    <div id='calendario' style='width: 100%;margin-top: 10px;'>
                                            <div class='col-md-12 col-xs-12 col-sm-12 sinpadding' style='background-color: #53a3a3;width: 100%;text-align:center;'>
                                                    <!--<input style='float:left;background-color:#04b173;' type='button' class='btn btn-default' value='<' onClick='mes_anterior(&#039;calendario&#039;)'/>-->
                                                    <span style='font-size: 22px;;color:#fff;' id='calendario_mes'></span>
                                                    <!--<input style='float:right;background-color:#04b173;' type='button' class='btn btn-default' value='>' onClick='mes_siguiente(&#039;calendario&#039;)'/>-->
                                            </div>
                                            <div id='nombres_dia' class='col-md-10 col-sm-10 col-xs-10' style='padding: 0;'>
                                                    
                                            </div>
                                            <div id='nombresdia1' class='col-md-2 col-sm-2 col-xs-2 sinpadding' style='padding: 0;'>
                            
                                                
                                            </div>
                                            <!-- MESES -->
                                            <div id='calendario_botonera' class='col-md-10 col-sm-10 col-xs-10 sinpadding'>
                                            <!-- ENERO -->

                                            </div>
                                            <div id='calendario_botonera_dos' class='col-md-2 col-sm-2 col-xs-2 sinpadding'>
                                            <!-- ENERO -->
                                            </div>




                                    </div>
                                    </div>
                                        <!-- /.box-body -->
                                      </div>
                                      <!-- /.box -->
                            
			</div>
                        
                        <div class='col-md-7 col-sm-12 col-xs-12' id='muestra_turnos_hoy' style=''>
                            <!-- Form Element sizes -->
                            <div class='box box-success'>
                              <div class='box-header with-border'>
                                    <div class='col-md-8'>
                                        <div class='row'>
                                            
                                            <input type='button' class='btn btn-success' onClick='mostrar_turnos_hoy()' value='Turnos hoy'/>
                                            <input type='button' class='btn btn-success' onClick='mostrar_calendario()' value='Calendario'/>
                                        </div>
                                    </div>
                              </div>
                              <div class='box-body'>
                                <div>
                                    <table id='tabla_asignar_especialidades' data-toggle='table'  
                                    data-url='".base_url()."index.php/Administrador/getTurnosHoyLista'
                                    data-search='true'
                                    data-show-refresh='true' 
                                    data-show-columns='true'  
                                    data-pagination='true' style='background-color: #fff;'>
                                     <thead>
                                         <tr>
                                             <th data-field='codigo' data-visible='true'>Codigo</th>
                                             <th data-field='nombre_profesional' data-visible='true'>Profesional</th>
                                             <th data-field='nombre' data-visible='true'>Paciente</th>
                                             <th data-field='dni' data-visible='true'>Dni</th>
                                             <th data-field='hora_desde' data-visible='true'>Desde</th>
                                             <th data-field='hora_hasta' data-visible='true'>Hasta</th>
                                             <th data-field='estado' data-visible='true'>Estado</th>
                                             <th data-field='options' data-formatter='optionsFormatterVerTurno'> </th>
                                          </tr>
                                     </thead>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                          </div>
                          <!-- /.box -->
			</div>
		</div>
        
                <script>
                $(document).ready(function(){ inicializarTurnosHoy();});
                   
                </script>";
        return $html;
    }
    
    public function render_horarios_dia($turnos_profesional_hoy,$horarios_profesional,$anio,$mes,$dia,$profesional,$profesional_nombre_apellido)
    {
        $nombre = $profesional_nombre_apellido[0]["nombre"];
        $apellido = $profesional_nombre_apellido[0]["apellido"];
        
        $html="";       
        
        if($horarios_profesional[0]["hora_desde"] != "")
        {
            $html.=
            "<h3 class='text-center'> Desde ".$horarios_profesional[0]['hora_desde']." Hasta ".$horarios_profesional[0]['hora_hasta']."</h3>";



            // echo date('H:s:i', strtotime('08:30:00 + 8 hours + 30 minutes'));


            $tiempo_turno= date('H:i:s', strtotime($horarios_profesional[0]['tiempo_turno']));
            $hora_desde = date('H:i:s', strtotime($horarios_profesional[0]["hora_desde"]));
            $hora_hasta = date('H:i:s', strtotime($horarios_profesional[0]["hora_hasta"]));

            $turno_minutos = (int)substr($tiempo_turno, 3);
            $turno_horas = (int)$tiempo_turno;


            // CONVIERTIENDO HORAS DESDE A FLOAT
            $h_desde= date('H:i:s', strtotime($horarios_profesional[0]['hora_desde']));
            $desde_minutos = (int)substr($h_desde, 3);
            $desde_horas = (int)$h_desde;


            // CONVIERTIENDO HORAS HASTA A FLOAT
            $h_hasta= date('H:i:s', strtotime($horarios_profesional[0]['hora_hasta']));
            $hasta_minutos = (int)substr($h_hasta, 3);
            $hasta_horas = (int)$h_hasta;


            $float_hora_hasta = $hasta_horas + ($hasta_minutos /100);

            $hora_actual =$h_desde;

            $contador =0;

            while($hora_actual < $h_hasta)
            {
                $respuesta = false;

                for ($i=0; $i < count($turnos_profesional_hoy);$i++) 
                {
                    if($turnos_profesional_hoy[$i]["hora_desde"] == $hora_actual)
                    {
                        $respuesta = true;
                    }
                }

                if($respuesta)
                {
                    $html.=
                    "<div class='row' style='margin-top: 5px;'>
                                <div class='col-md-12'>
                                        <input type='button' class='btn btn-danger form-control' onClick='administrar_turno(".$turnos_profesional_hoy[$contador]['codigo'].")' value='$hora_actual";
                                $hora_actual = date('H:i', strtotime("$hora_actual + $turno_horas hours + $turno_minutos minutes")).":00";
                                $html.=" a $hora_actual hs'/>
                                </div>

                        </div>";
                    $contador++;
                }
                else{
                   $html.=
                    "<div class='row' style='margin-top: 5px;'>
                                <div class='col-md-12'>";
                                $hora_hasta =date('H:i', strtotime("$hora_actual + $turno_horas hours + $turno_minutos minutes")).":00";
                                        $html.="<input type='button' class='btn btn-success form-control' onClick='render_agregar_turno(".$horarios_profesional[0]["codigo"].",$anio,$mes,$dia,$profesional,&#34;$hora_actual&#34;,&#34;$hora_hasta&#34;,&#34;$nombre&#34;,&#34;$apellido&#34;)' value='$hora_actual";
                                $hora_actual = $hora_hasta;
                                $html.=" a $hora_actual hs'/>
                                </div>

                        </div>"; 
                }
                
            }
        }
        else
        {
            $html.="<h1 class='text-center'>No trabaja este dia</h1>";
        }
        
        $dt = new DateTime('08:30:00');
        $dt->add(new DateInterval('PT8H30M'));
        
        //$html.="".$dt->format('H:i:s');
        
        return $html;
    }
    
    public function render_registrar_turno($profesional,$fecha,$hora_desde,$hora_hasta,$pacientes,$especialidades_profesional,$nombre,$apellido,$obra_social_primer_paciente,$precio)
    {
        $html=
        "       <div class='row'>
			<div class='col-md-4'>
				<label for='profesional'>Profesional</label>
				<input type='text' hidden='true' name='profesional' id='profesional_registrar_turno' value='$profesional' disabled>
                                    <input type='text' class='form-control' name='profesional' id='profesional_registrar_turno' value='$nombre $apellido' disabled>
			</div>
			<div class='col-md-4'>
				<label for='fecha'>Fecha</label>
				<input type='text' class='form-control' name='fecha' id='fecha_registrar_turno' value='$fecha' disabled>
			</div>
			<div class='col-md-4'>
				<label for='hora_desde'>Hora desde</label>
				<input type='text' class='form-control' name='hora_desde' id='hora_desde_registrar_turno' value='$hora_desde' disabled>
			</div>
			<div class='col-md-4'>
				<label for='hora_hasta'>Hora hasta</label>
				<input type='text' class='form-control' name='hora_hasta' id='hora_hasta_registrar_turno' value='$hora_hasta' disabled>
			</div>
			<div class='col-md-4'>
                                <label for='paciente_registrar_turno'>Dni Paciente</label>
				<select class='form-control chosen-select' name='paciente' id='paciente_registrar_turno'>";
                                foreach ($pacientes as $value) {
                                    $html.="<option value='".$value["dni"]."'>".$value["dni"]."</option>";
                                }   
                                $html.="</select>
                                 
			</div>
                        <div class='col-md-4'>
                                <label for='especialidad_registrar_turno'>Especialidad</label>
				<select class='form-control chosen' name='especialidad' id='especialidad_registrar_turno'>";
                                foreach ($especialidades_profesional as $value) {
                                    $html.="<option value='".$value["codigo"]."'>".$value["especialidad"]."</option>";
                                }   
                                $html.="</select>
                                 
			</div>
                        <div class='clearfix'></div>
                        <div class='col-md-4'>
                                <label for='tipo_atencion_turno'>Atendido por: </label>
				<select class='form-control' name='especialidad' id='tipo_atencion_turno'>
                                    <option value='1'>Particular</option>";
                                
                                    if($obra_social_primer_paciente && $obra_social_primer_paciente["codigo"] != "1")
                                    {
                                        $html.="<option value='".$obra_social_primer_paciente["codigo"]."'>".$obra_social_primer_paciente["razon_social"]."</option>";
                                    }
                                    
                        $html.="</select>
                                 
			</div>
                        <div class='col-md-4'>
				<label for='precio_registrar_turno'>Precio</label>
				<input type='text' class='form-control' name='precio' id='precio_registrar_turno' value='$precio' disabled>
			</div>
			<div class='col-md-4'>
				<label for='estado'>Estado</label>
				<select type='text' class='form-control' name='estado' id='estado_registrar_turno'>
					<option value='pendiente'>pendiente</option>
					<option value='confirmado'>confirmado</option>
					<option value='cumplido'>cumplido</option>
				</select>
		 	</div>
                        <div class='col-md-12'>
                            <input type='button' class='btn btn-success form-control' style='margin-top: 20px;' value='Registrar Turno' onClick='registrar_turno()'/>
                        </div>
		</div>
                <script>
                    $(document).ready(function(){
                        $('.chosen-select').chosen({no_results_text: 'Oops, nothing found!'});  
                        $('#especialidad_registrar_turno').change(function(){cargar_precio_registrar_turno();});
                        $('#tipo_atencion_turno').change(function(){cargar_precio_registrar_turno();});
                        $('#paciente_registrar_turno').change(function(){cambio_paciente_registrar_turno();});
                    });
                </script>";
        return $html;
    }
    
    public function render_registrar_turno_usuario_paciente($profesional,$fecha,$hora_desde,$hora_hasta,$dni,$especialidad)
    {
        $html=
        "       <div class='row'>
				<input type='text' name='profesional' id='profesional_registrar_turno' value='$profesional' hidden='true'>
			
				<input type='text' name='fecha' id='fecha_registrar_turno' value='$fecha' hidden='true'>
			
				<input type='text' name='hora_desde' id='hora_desde_registrar_turno' value='$hora_desde' hidden='true'>
			
				<input type='text' name='hora_hasta' id='hora_hasta_registrar_turno' value='$hora_hasta' hidden='true'>
			
				<input type='text' value='".$dni."' name='paciente' id='paciente_registrar_turno' readonly='readonly' hidden='true'>
                                 
			
				<input type='text'  name='especialidad' id='especialidad_registrar_turno' readonly='readonly' value='".$especialidad."' hidden='true'/>
                                 
			
				<select type='text' name='estado' id='estado_registrar_turno' readonly='readonly' hidden='true'>
					<option value='pendiente'>pendiente</option>
				</select>
		 	<p class='text-center'>
                         Una vez registrado el turno, este tendrá que ser confirmado por una secretaria, la cual se comunicará con usted via mail o telefono
                        </p>
                        
                        <div class='col-md-12'>
                            <input type='button' class='btn btn-primary form-control' style='margin-top: 20px;' value='Registrar Turno' onClick='registrar_turno()'/>
                        </div>
		</div>";
        return $html;
    }
    
    public function render_administrar_turno($turno,$pacientes,$especialidad,$profesional_nombre_apellido,$paciente)
    {
        $html=
        "       <div class='row'>
                        <div class='col-md-4'>
				<label for='codigo'>Codigo</label>
				<input type='text' class='form-control' name='codigo' id='codigo_actualizar_turno' value='".$turno["codigo"]."' readonly='readonly'>
			</div>
			<div class='col-md-4'>
				<label for='profesional'>Profesional</label>
				<input type='text' hidden='true'  name='profesional' id='profesional_actualizar_turno' value='".$turno["profesional"]."' readonly='readonly'>
                                <input type='text' class='form-control' value='".$profesional_nombre_apellido[0]["nombre"]." ".$profesional_nombre_apellido[0]["apellido"]."' readonly='readonly'/>
			</div>
			<div class='col-md-4'>
				<label for='fecha'>Fecha</label>
				<input type='text' class='form-control' name='fecha' id='fecha_actualizar_turno' value='".$turno["fecha"]."' readonly='readonly'>
			</div>
			<div class='col-md-4'>
				<label for='hora_desde'>Hora desde</label>
				<input type='text' class='form-control' name='hora_desde' id='hora_desde_actualizar_turno' value='".$turno["hora_desde"]."' readonly='readonly'>
			</div>
			<div class='col-md-4'>
				<label for='hora_hasta'>Hora hasta</label>
				<input type='text' class='form-control' name='hora_hasta' id='hora_hasta_actualizar_turno' value='".$turno["hora_hasta"]."' readonly='readonly'>
			</div>
                        <div class='col-md-4'>
				<label for='profesional'>Nombre Paciente</label>
                                <input type='text' class='form-control' value='".$paciente[0]["nombre"]." ".$paciente[0]["apellido"]."' readonly='readonly'/>
			</div>
			<div class='col-md-4' hidden='true'>
				<label for='paciente_actualizar_turno'>Dni Paciente</label>
				<select class='form-control chosen-select' name='paciente' id='paciente_actualizar_turno' value='".$turno["paciente"]."'>";
                               foreach ($pacientes as $value) {
                                    $html.="<option value='".$value["dni"]."'>".$value["dni"]."</option>";
                                }   
                                $html.="</select>
                       </div>
                       <div class='col-md-4'>
                            <label for='paciente_actualizar_turno'>Especialidad</label>
				<select class='form-control' name='especialidad' id='especialidad_actualizar_turno' value='".$turno["especialidad"]."' disabled>
                                <option value='".$especialidad["codigo"]."'>".$especialidad["especialidad"]."</option>
                                </select>
                       </div>
                       <div class='col-md-4'>
				<label for=''>Precio</label>
				<input type='text' class='form-control' name='precio_actualizar_turno' id='precio_actualizar_turno' value='".$turno["importe"]."' readonly='readonly'>
			</div>
                        <div class='col-md-4'>
				<label for='cobrado'>Cobrado</label>
				<input type='text' class='form-control' name='cobrado_actualizar_turno' id='cobrado_actualizar_turno' value='".$turno["cobrado"]."' readonly='readonly'>
			</div>
			<div class='col-md-4'>
				<label for='estado'>Estado</label>
				<select type='text' class='form-control' name='estado' id='estado_actualizar_turno'>";
                                if($turno["estado"] == "pendiente")
                                {
                                    $html.="<option value='pendiente' selected>pendiente</option>";
                                }
                                else
                                {
                                    $html.="<option value='pendiente'>pendiente</option>"; 
                                }
                                
                                if($turno["estado"] == "confirmado")
                                {
                                    $html.="<option value='confirmado' selected>confirmado</option>";
                                }
                                else
                                {
                                    $html.="<option value='confirmado'>confirmado</option>"; 
                                }
                                    
                                if($turno["estado"] == "cumplido")
                                {
                                   $html.="<option value='cumplido' selected>cumplido</option>";
                                }
                                else
                                {
                                    $html.="<option value='cumplido'>cumplido</option>";
                                }
				
                                
					
					
				$html.="</select>
		 	</div>
                        <div class='clearfix'></div>
                        <div class='col-md-4'>
                            <input type='button' class='btn btn-success form-control' style='margin-top: 5px;' value='Actualizar Turno' onClick='actualizar_turno()'/>
                        </div>
                        <div class='col-md-4'> 
                            <input type='button' class='btn btn-info form-control' style='margin-top: 5px;' value='Imprimir Turno' onClick='imprimir_turno()'/>
                        </div>
                        <div class='col-md-4'> 
                            <input type='button' class='btn btn-danger form-control' style='margin-top: 5px;' value='Borrar Turno' onClick='borrar_turno()'/>
                        </div>
		</div>
                <script>
                    $(document).ready(function(){
                         $('.chosen-select').chosen({no_results_text: 'Oops, nothing found!'}); 
                    });
                </script>";
        return $html;
    }
    
    public function render_historias_clinicas()
    {
        $html=
        "
        
        <div class='box box-success'>
                <div class='box-header with-border'>
                        <div class='col-md-12'>
                                <div class='row'>
                                        <div class='col-md-5'>
                                                <input type='button' class='btn btn-success pull-left' onClick='agregar_historia_clinica()' value='+ nuevo'/>
                                        </div>
                                </div>
                        </div>
                </div>
                
                <div class='box-body' id='tabla_historias_clinicas'>
                    <table  data-toggle='table'  
                        data-url='".base_url()."index.php/secretaria/getHistoriasClinicas'
                        data-search='true'
                        data-show-refresh='true' 
                        data-show-columns='true'  
                        data-pagination='true' style='background-color: #fff;'>
                        <thead>
                            <tr>
                                <th data-field='codigo' data-visible='false'>codigo</th>
                                <th data-field='fecha' data-visible='true' data-sortable='true'>fecha</th>
                                <th data-field='paciente' data-visible='true' data-sortable='true'>dni</th>
                                <th data-field='nombre_paciente' data-visible='true'>paciente</th>
                                <th data-field='nombre_profesional' data-visible='true'>profesional</th>
                                <th data-field='nombre_especialidad' data-visible='true'>especialidad</th>
                                <th data-field='paciente' data-visible='false'>paciente</th>
                                <th data-field='profesional' data-visible='false'>profesional</th>
                                <th data-field='especialidad' data-visible='false'>especialidad</th>
                                
                                <th data-field='options' data-formatter='optionsFormatterHistoriasClinicas'></th>
                            </tr>
                        </thead>
                    </table>
                </div>
        </div><!-- /.box -->
        ";
        return $html;
    }
    
    
    public function render_agregar_historia_clinica($profesionales,$especialidades,$pacientes)
    {
        $html=
        "<div class='row'>
            <div class='col-md-12'>
                <form role='form' action='".base_url()."index.php/Secretaria/agregar_historia_clinica' class='form' enctype='multipart/form-data' method='post' accept-charset='utf-8'>
                    <div class='col-md-6'>
                        <label for='fecha_agregar_historia_clinica'>Fecha</label>
                        <input type='text' id='fecha_agregar_historia_clinica' name='fecha_agregar_historia_clinica' class='form-control datepicker' value='".date("Y-m-d")."'>
                    </div>
                    <div class='col-md-6'>
                        <label for='paciente_agregar_historia_clinica'>Paciente</label>
                        <section id='intro'>
                            <select class='form-control' name='paciente_agregar_historia_clinica' id='paciente_agregar_historia_clinica'>";
                            foreach ($pacientes as $value) {
                                $html.="<option value='".$value["dni"]."'>".$value["dni"]."</option>";
                            }
                    $html.="</select>
                        </section>
                    </div>
                    <div class='col-md-6'>
                        <label for='profesional_agregar_historia_clinica'>Profesional</label>
                        <select class='form-control' name='profesional_agregar_historia_clinica' id='profesional_agregar_historia_clinica'>";
                        foreach ($profesionales as $value) {
                            $html.="<option value='".$value["codigo"]."'>".$value["nombre"]." ".$value["apellido"]."</option>";
                        }
                $html.="</select>
                    </div>
                    <div class='col-md-6'>
                        <label for='especialidad_agregar_historia_clinica'>Especialidad</label>
                         <section id='intro'>
                            <select class='form-control' name='especialidad_agregar_historia_clinica' id='especialidad_agregar_historia_clinica'>";
                            foreach ($especialidades as $value) {
                                $html.="<option value='".$value["codigo"]."'>".$value["especialidad"]."</option>";
                            }
                    $html.="</select>
                        </section>
                    </div>
                    <div class='col-md-12'>
                        <label for='medico_agregar_historia_clinica'>Solitante:</label>
                        <input type='text' id='medico_agregar_historia_clinica' name='medico_agregar_historia_clinica' class='form-control'>
                    </div>
                    <div class='col-md-12'>
                        <label for='examen_agregar_historia_clinica'>Examen</label>
                        <textarea id='examen_agregar_historia_clinica' name='examen_agregar_historia_clinica' class='form-control'>
                        </textarea>
                    </div>
                    <div class='col-md-12'>
                        <label for='conclusion_agregar_historia_clinica'>Conclusion</label>
                        <textarea id='conclusion_agregar_historia_clinica' name='conclusion_agregar_historia_clinica' class='form-control'>
                        </textarea>
                    </div>
                    <div class='col-md-6'>
                        <label for='imagen1_agregar_historia_clinica'>Imagen</label>
                        <input type='file' id='imagen1_agregar_historia_clinica' name='imagen1_agregar_historia_clinica'/>
                    </div>
                    <div class='col-md-6'>
                        <label for='imagen2_agregar_historia_clinica'>Imagen</label>
                        <input type='file' id='imagen2_agregar_historia_clinica' name='imagen2_agregar_historia_clinica'/>
                    </div>
                    <div class='col-md-6'>
                        <label for='imagen3_agregar_historia_clinica'>Imagen</label>
                        <input type='file' id='imagen3_agregar_historia_clinica' name='imagen3_agregar_historia_clinica'/>
                    </div>
                    <div class='col-md-6'>
                        <label for='imagen4_agregar_historia_clinica'>Imagen</label>
                        <input type='file' id='imagen4_agregar_historia_clinica' name='imagen4_agregar_historia_clinica'/>
                    </div>
                    <div class='col-md-12' style='margin-top: 10px;'>
                        <input type='submit' id='' name='' class='form-control btn btn-success' value='Agregar'>
                    </div>
                </form>
            </div>
         </div>
         <script>
         $(document).ready(function(){
            $('.datepicker').datetimepicker({
                lang:'es',
                 i18n:{
                  de:{
                   months:[
                    'Enero','Febrero','Märzo','Abril',
                    'Mayo','Junio','Julio','Agosto',
                    'Septiembre','Octubre','Noviembre','Diciembre',
                   ],
                   dayOfWeek:[
                    'So.', 'Mo', 'Di', 'Mi', 
                    'Do', 'Fr', 'Sa.',
                   ]
                  }
                 },
                 timepicker:false,

                 format:'Y-m-d'
            });
            
            
            $(setup)

            function setup() {
              $('#intro select').zelect({ placeholder:'Seleccione...' })
            }
     
            });
         </script>
        ";
        return $html;
    }
    
    public function render_editar_historia_clinica($historia_clinica,$paciente,$profesional,$especialidad)
    {
        $html=
        "
            <form action='".base_url()."index.php/secretaria/actualizar_historia_clinica' enctype='multipart/form-data'  method='post' accept-charset='utf-8'>
                <input type='text'  hidden='true' id='codigo_actualizar_historia_clinica' name='codigo_actualizar_historia_clinica' value='".$historia_clinica["codigo"]."'/>
                <div class='col-md-6'>
                            <label for='fecha_editar_historia_clinica'>Fecha</label>
                            <input type='text' id='fecha_editar_historia_clinica' name='fecha_editar_historia_clinica' class='form-control datepicker' value='".$historia_clinica["fecha"]."'>
                        </div>
                        <div class='col-md-6'>
                            <label for=''>Paciente</label>
                            <input type='text' class='form-control' value='".$paciente."' readonly='readonly'>
                        </div>
                        <div class='col-md-6'>
                            <label for=''>Profesional</label>
                            <input type='text' class='form-control' value='".$profesional."' readonly='readonly'>
                        </div>
                        <div class='col-md-6'>
                            <label for=''>Especialidad</label>
                            <input type='text' class='form-control' value='".$especialidad."' readonly='readonly'>
                        </div>
                        <div class='col-md-12'>
                            <label for='medico_editar_historia_clinica'>Solitante:</label>
                            <input type='text' id='medico_editar_historia_clinica' name='medico_editar_historia_clinica' class='form-control' value='".$historia_clinica["medico"]."'>
                        </div>
                        <div class='col-md-12'>
                            <label for='examen_editar_historia_clinica'>Examen</label>
                            <textarea id='examen_editar_historia_clinica' name='examen_editar_historia_clinica' class='form-control'>".$historia_clinica["examen"]."</textarea>
                        </div>
                        <div class='col-md-12'>
                            <label for='conclusion_editar_historia_clinica'>Conclusion</label>
                            <textarea id='conclusion_editar_historia_clinica' name='conclusion_editar_historia_clinica' class='form-control'>".$historia_clinica["conclusion"]."</textarea>
                        </div>
                        <div class='col-md-12'>
                            <img src='".base_url()."recursos/img/pacientes/".$historia_clinica["imagen1"]."' width='100' height='100'/>
                            <img src='".base_url()."recursos/img/pacientes/".$historia_clinica["imagen2"]."' width='100' height='100'/>
                            <img src='".base_url()."recursos/img/pacientes/".$historia_clinica["imagen3"]."' width='100' height='100'/>
                            <img src='".base_url()."recursos/img/pacientes/".$historia_clinica["imagen4"]."' width='100' height='100'/>
                        </div>
                        <div class='col-md-6'>
                            <label for='imagen1_editar_historia_clinica'>Imagen</label>
                            <input type='file' id='imagen1_editar_historia_clinica' name='imagen1_editar_historia_clinica'/>
                        </div>
                        <div class='col-md-6'>
                            <label for='imagen2_editar_historia_clinica'>Imagen</label>
                            <input type='file' id='imagen2_editar_historia_clinica' name='imagen2_editar_historia_clinica'/>
                        </div>
                        <div class='col-md-6'>
                            <label for='imagen3_editar_historia_clinica'>Imagen</label>
                            <input type='file' id='imagen3_editar_historia_clinica' name='imagen3_editar_historia_clinica'/>
                        </div>
                        <div class='col-md-6'>
                            <label for='imagen4_editar_historia_clinica'>Imagen</label>
                            <input type='file' id='imagen4_editar_historia_clinica' name='imagen4_editar_historia_clinica'/>
                        </div>
                        <div class='col-md-12' style='margin-top: 10px;'>
                            <input type='submit' id='' name='' class='form-control btn btn-success' value='Agregar'>
                        </div>
                    </form>
                </div>
             </div>
             <script>
             $(document).ready(function(){
                $('.datepicker').datetimepicker({
                    lang:'es',
                     i18n:{
                      de:{
                       months:[
                        'Enero','Febrero','Märzo','Abril',
                        'Mayo','Junio','Julio','Agosto',
                        'Septiembre','Octubre','Noviembre','Diciembre',
                       ],
                       dayOfWeek:[
                        'So.', 'Mo', 'Di', 'Mi', 
                        'Do', 'Fr', 'Sa.',
                       ]
                      }
                     },
                     timepicker:false,

                     format:'Y-m-d'
                });
                $('.chosen-select').chosen({no_results_text: 'Oops, nothing found!'}); 
                });
             </script>
            
            </form>
        ";
        return $html;
    }
    
    
    
    
    public function render_abm_datos_home()
    {
        $html=
        "<div class='box box-success'>
                              
                              <div class='box-body'>
                                <div>
                                    <table id='tabla_asignar_especialidades' data-toggle='table'  
                                    data-url='".base_url()."index.php/Administrador/getDatosHome'
                                    data-search='false'
                                    data-show-refresh='false' 
                                    data-show-columns='false'  
                                    data-pagination='true' style='background-color: #fff;'>
                                     <thead>
                                         <tr>
                                             <th data-field='codigo' data-visible='false'>Codigo</th>
                                             <th data-field='descripcion' data-visible='true'>Descripcion</th>
                                             <th data-field='tipo_descripcion' data-visible='true'>Especificacion</th>
                                             <th data-field='formato' data-visible='true'>Tipo</th>
                                             <th data-field='options' data-formatter='optionsFormatterDatosHome'> </th>
                                          
                                          </tr>
                                     </thead>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                          </div>
                          <!-- /.box -->";
        return $html;
    }
    
    
    // IMPRESORES
    
    function generar_pantalla_liquidacion_obras_sociales($hoy,$obras_sociales) {
        $html="
                <input type='text' id='fecha_desde_liquidacion_obrassociales_ultima' value='".$hoy."' hidden='true'>
                <input type='text' id='fecha_hasta_liquidacion_obrassociales_ultima' value='".$hoy."' hidden='true'>
                <div class='row'>
                    <div class='col-md-12'>
                            <div class='box box-default'>
                                <div class='box-body'>
                                    <div class='alert alert-info alert-dismissable'>
                                        <div class='margin'>
                                            <div class='btn-group'>
                                                <div class='col-xs-3 col-md-3'>
                                                    <label class='control-label'>Fecha desde</label>
                                                    <input type='text' class='form-control select-fecha' name='fecha_desde' value='".$hoy."' id='fecha_desde_liquidacion_obrassociales' >
                                                </div>
                                                <div class='col-xs-3 col-md-3'>
                                                    <label class='control-label'>Fecha hasta</label>
                                                    <input type='text' class='form-control select-fecha' name='fecha_desde' value='".$hoy."' id='fecha_hasta_liquidacion_obrassociales' >
                                                </div>
                                                <div class='col-xs-3 col-md-3'>
                                                    <label>Obra social</label>
                                                    <div id='intro'>
                                                        <select class='form-control' id='select_obra_social_liquidacion'>
                                                        <option value='0'>todas</option>";
                                                        foreach ($obras_sociales as $value) {
                                                            $html.="<option value='".$value["codigo"]."'>".$value["razon_social"]."</option>";
                                                        }

                                                $html.="</select>
                                                    </div>
                                                </div>
                                                <div class='col-xs-3 col-md-3'>
                                                    <label> </label>
                                                    <input type='button' class='form-control btn btn-info ' onclick='listar_liquidacion_obras_sociales()' value='Listar'/>
                                                </div>
                                            </div>
                                         </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class='col-md-offset-5 col-md-3'>
                        <!--<div class='box box-default'>
                            <div class='box-body'>
                                <!--<h3>En Ventas</h3>
                                <div class='col-lg-4 col-xs-8'>
                                    <div class='small-box bg-green'>
                                      <div class='inner'>
                                            <h3><span id='ventas_de_la_consulta'>12</span><sup style='font-size: 20px'>$</sup></h3>
                                            <p>Cuotas encontradas</p>
                                      </div>
                                      <div class='icon'>
                                        <i class='ion ion-stats-bars'></i>
                                      </div>
                                      <a href='#' class='small-box-footer'><i class='fa fa-arrow-circle-right'></i> de estadisticas</a>
                                    </div>
                                </div>
                                
                                <div class='col-lg-4 col-xs-8'>
                                    <div class='small-box bg-red'>
                                      <div class='inner'>
                                        <h3><span id='ventas_de_todas_las_consulta'>0</span><sup style='font-size: 20px'>$</sup></h3>
                                        <p>Ventas de las consultas</p>
                                      </div>
                                      <div class='icon'>
                                        <i class='ion ion-stats-bars'></i>
                                      </div>
                                       <a href='#' class='small-box-footer'><i class='fa fa-arrow-circle-right'></i> de estadisticas</a>
                                    </div>
                                </div>
                                <div class='col-lg-4 col-xs-8'>
                                    <div class='small-box bg-yellow'>
                                      <div class='inner'>
                                        <h3>as<sup style='font-size: 20px'>$</sup></h3>
                                        <p>Ventas Totales</p>
                                      </div>
                                      <div class='icon'>
                                        <i class='ion ion-pie-graph'></i>
                                      </div>
                                      <a href='#' class='small-box-footer'><i class='fa fa-arrow-circle-right'></i> de estadisticas</a>
                                    </div>
                                </div>
                                <h3>En ganancias</h3>
                                <div class='col-lg-4 col-xs-8'>
                                    <div class='small-box bg-green'>
                                      <div class='inner'>
                                        <h3><span id='ventas_de_la_consulta'>12</span><sup style='font-size: 20px'>$</sup></h3>
                                        <p>Cuotas encontradas</p>
                                      </div>
                                      <div class='icon'>
                                        <i class='ion ion-stats-bars'></i>
                                      </div>
                                      <a href='#' class='small-box-footer'><i class='fa fa-arrow-circle-right'></i> de estadisticas</a>
                                    </div>
                                </div>
                                <div class='col-lg-4 col-xs-8'>
                                    <div class='small-box bg-red'>
                                      <div class='inner'>
                                        <h3><span id='ventas_de_todas_las_consulta'>0</span><sup style='font-size: 20px'>$</sup></h3>
                                        <p>Ventas de las consultas</p>
                                      </div>
                                      <div class='icon'>
                                        <i class='ion ion-stats-bars'></i>
                                      </div>
                                       <a href='#' class='small-box-footer'><i class='fa fa-arrow-circle-right'></i> de estadisticas</a>
                                    </div>
                                </div>
                                <div class='col-lg-12 col-xs-12' hidden='true'>
                                    <div class='small-box bg-yellow'>
                                      <div class='inner'>
                                        <h3><span id='total_liquidacion_obrassociales'>0</span><sup style='font-size: 20px'>$</sup></h3>
                                        <p>Total</p>
                                      </div>
                                      <div class='icon'>
                                        <i class='ion ion-pie-graph'></i>
                                      </div>
                                      <a href='#' class='small-box-footer'><i class='fa fa-arrow-circle-right'></i>&nbsp;</a>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                    </div>
               </div>
               <div class='row'>
                  <div class='col-md-12'>
                        <div class='box box-default'>
                            <div class='box-header'>
                                <h3 class='box-title'>Resultado: </h3>
                                <button class='btn btn-default pull-right' onClick='imprimir_liquidacion_obras_sociales()'><i class='fa fa-print'></i> Imprimir</button>
                            </div>
                            <div class='box-body'>
                                <div class='row'>
                                <div class='col-sm-12'>
                                    <table class='table table-bordered table-hover dataTable'>
                                        <thead>
                                                <tr>
                                                      <th>Dni</th>
                                                      <th>Nombre</th>
                                                      <th>Apellido</th>
                                                      <th>Especialidad</th>
                                                      <th>Obra social</th>
                                                      <th>Fecha</th>
                                                      <th>Precio</th>
                                                </tr>
                                        </thead>   
                                        <tbody style='font-weight: bold;' id='tabla_liquidacion_obras_sociales'>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
               </div>
               <script>
                $(document).ready(function(){
                $('#intro select').zelect({ placeholder:'Seleccione...' });
                 });
                 </script>
               


";
        return $html;
    }
    
    public function generar_impresion_obras_sociales($fecha1,$fecha2,$obras_sociales)
    {
        $html=
        "<div class='row'>
                  
                  <div class='col-md-12'>
                    
                        <div class='box box-default'>
                            <div class='box-header'>
                                <div>
                      </div>
                                <h3 class='text-center'>";
                                if($fecha1 == $fecha2)
                                {
                                    $html.="Liquidacion obras sociales el $fecha1";
                                }
                                else
                                {
                                    $html.="Liquidacion obras sociales desde el $fecha1 hasta el $fecha2";
                                }
                                $html.="</h3>
                            </div>
                            <div class='box-body'>
                                
                                <div class='row'>
                                <div class='col-sm-offset-1 col-sm-10'>
    					<table class='table table-bordered table-hover dataTable'>
                                        <thead>
                                                <tr>
                                                      <th>Dni</th>
                                                      <th>Nombre</th>
                                                      <th>Apellido</th>
                                                      <th>Especialidad</th>
                                                      <th>Obra social</th>
                                                      <th>Fecha</th>
                                                      <th>Precio</th>
                                                </tr>
                                        </thead>   
                                        <tbody>";
                                        foreach ($obras_sociales as $value) {
                                              $html.="<tr><td>".$value["dni"]."</td><td>".$value["nombre"]."</td><td>".$value["apellido"]."</td><td>".$value["especialidad"]."</td><td>".$value["razon_social"]."</td><td>".$value["fecha"]."</td><td>".$value["precio"]."</td></tr>";
                                        }
                                        $html.="</tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
               </div>
               <div class='row'>";
                $totales = 0.0;
                foreach ($obras_sociales as $value) {
                     $totales += ((float)$value["precio"]);
                 }
                $html.="
                    <div class='col-sm-offset-7 col-sm-4'>
                        <div class='pull-right' style='font-size: 16px;'>
                            <strong>Total: $".$totales."</strong>
                        </div>
                    </div>
               
               </div>";
        return $html;
    }
    
    public function administrar_turnos_pendientes()
    {
        $html=
        "<div class='box box-success'>
            <div class='box-body'>
                    <table data-toggle='table'  
                            data-url='".base_url()."index.php/secretaria/getTurnosPendientes'
                            data-search='false'
                            data-show-refresh='true' 
                            data-show-columns='false'  
                            data-pagination='true'>
                             <thead>
                                 <tr>
                                     <th data-field='codigo' data-visible='false' data-sortable='true'>codigo</th>
                                     <th data-field='fecha' data-visible='true' data-sortable='true'>fecha</th>
                                     <th data-field='hora_desde' data-visible='true' data-sortable='true'>hora_desde</th>
                                     <th data-field='hora_hasta' data-visible='true' data-sortable='true'>hora_hasta</th>
                                     <th data-field='profesional' data-visible='false' data-sortable='true'>profesional</th>
                                     <th data-field='especialidad' data-visible='false' data-sortable='true'>especialidad</th>
                                     <th data-field='paciente' data-visible='true' data-sortable='false'>dni paciente</th>
                                     <th data-field='estado' data-visible='false' data-sortable='true'>estado</th>
                                     
                                     <th data-field='options' data-formatter='optionsFormatterAdministrarTurno'>Administrar</th>
                                 </tr>
                             </thead>
                    </table>
            </div><!--         
        </div> /.box -->";
        return $html;
    }
    
    public function generar_impresion_turno($turno,$dni_paciente,$fecha,$hora_desde,$hora_hasta,$nombre_profesional,$apellido_profesional,$especialidad,$estado,$nombre_paciente,$apellido_paciente)
    {
        $html=
        "<div class='container-fluid'>
            <div class='row'>
			<div class='col-md-4'>
                            <div  style='border-width: 2px; border-color: #000; border-style: solid; padding: 20px; margin-top: 10px;' >
				<h3>Turno ".$turno."</h3>
				<p>Paciente: <strong>".$nombre_paciente." ".$apellido_paciente."</strong></p>
                                <p>Dni paciente: <strong>".$dni_paciente."</strong></p>
				<p>Fecha: <strong>$fecha</strong></p>
				<p>Especialidad: <strong>$especialidad</strong></p>
				<p>Profesional: <strong>".$nombre_profesional." ".$apellido_profesional."</strong></p>
				<p>Hora desde: <strong>$hora_desde hs</strong></p>
				<p>Hora hasta: <strong>$hora_hasta hs</strong></p>
				<p>Estado: <strong>$estado</strong></p>
                            </div>
			</div>
            </div>
        </div>";
        return $html;
    }
    
    public function ver_calendario_secretaria($especialidades)
    {
        $html=
        "
            	<div class='row'>
			<div class='col-md-5'>
                        <!-- Form Element sizes -->
                        <div class='box box-success'>
                          <div class='box-header with-border'>
                            <!--<h3 class='box-title'>Different Height</h3>-->
                          </div>
                          <div class='box-body'>   
				<div class='col-md-12'>
					<label for='especialidad_turnero'>Especialidad</label>
					<select class='form-control chosen-select' name='especialidad_turnero' id='especialidad_turnero'>
                                        <option value='nada'>Seleccione</option>";
                                        foreach ($especialidades as $value) {
                                            $html.="<option value='".$value["codigo"]."'>".$value["especialidad"]."</option>";
                                        }
        
					$html.="</select>
				</div>
				<div class='col-md-12'>
					<label for='profesional_turnero'>Medico</label>
					<select class='form-control' name='profesional_turnero' id='profesional_turnero' disabled='disabled'>
                                            <option value='nada'>Seleccione</option>
					</select>
				</div>
				<div class='col-md-12'>
					<label for='anio_turnero'>Año</label>
					<select class='form-control' name='anio_turnero' id='anio_turnero'>
						
					</select>
				</div>
				<div class='col-md-12'>
					<label for='mes_turnero'>Mes</label>
					<select class='form-control' name='mes_turnero' id='mes_turnero'>
						<option>Value</option>
					</select>
				</div>
                                <div class='col-md-12' style='margin-top: 10px;'>
                                    <input type='button' class='btn btn-success form-control' value='VER TURNOS' id='btn_ver_turno'/>
				</div>
			</div>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
          
        

                        <div class='col-md-7 col-sm-12 col-xs-12' hidden='true' id='div_calendario'>
                                <!-- Form Element sizes -->
                                <div class='box box-success'>
                                  <div class='box-header with-border'>
                                    <div class='col-md-offset-6 col-md-6'>
                                        <!--<div class='row'>
                                            <div class='col-md-4'>
                                                <input type='button' class='btn btn-success ' onClick='mostrar_turnos_desde_hoy()' value='Turnos'/>
                                            </div>
                                            <div class='col-md-4'>
                                                <input type='button' class='btn btn-success' onClick='mostrar_calendario()' value='Calendario'/>
                                            </div>
                                            <div class='col-md-4'>
                                                <input type='button' class='btn btn-success' onClick='historico_turno()' value='Historico'/>
                                            </div>
                                        </div>-->
                                    </div>
                                  </div>
                                  <div class='box-body'>
                                
                                    <div id='calendario' style='width: 100%;margin-top: 10px;'>
                                            <div class='col-md-12 col-xs-12 col-sm-12 sinpadding' style='background-color: #53a3a3;width: 100%;text-align:center;'>
                                                    <!--<input style='float:left;background-color:#04b173;' type='button' class='btn btn-default' value='<' onClick='mes_anterior(&#039;calendario&#039;)'/>-->
                                                    <span style='font-size: 22px;;color:#fff;' id='calendario_mes'></span>
                                                    <!--<input style='float:right;background-color:#04b173;' type='button' class='btn btn-default' value='>' onClick='mes_siguiente(&#039;calendario&#039;)'/>-->
                                            </div>
                                            <div id='nombres_dia' class='col-md-10 col-sm-10 col-xs-10' style='padding: 0;'>
                                                    
                                            </div>
                                            <div id='nombresdia1' class='col-md-2 col-sm-2 col-xs-2 sinpadding' style='padding: 0;'>
                            
                                                
                                            </div>
                                            <!-- MESES -->
                                            <div id='calendario_botonera' class='col-md-10 col-sm-10 col-xs-10 sinpadding'>
                                            <!-- ENERO -->

                                            </div>
                                            <div id='calendario_botonera_dos' class='col-md-2 col-sm-2 col-xs-2 sinpadding'>
                                            <!-- ENERO -->
                                            </div>




                                    </div>
                                    </div>
                                        <!-- /.box-body -->
                                      </div>
                                      <!-- /.box -->
                            
			</div>";
        return $html;
    }
    
    public function ver_turnos_hoy()
    {
        $html=
        " <div class='col-md-12 col-sm-12 col-xs-12'  id='div_calendario'>
                                <!-- Form Element sizes -->
                                <div class='box box-success'>
                                  <div class='box-header with-border'>
                                    <div class='col-md-offset-6 col-md-6'>
                                        <!--<div class='row'>
                                            <div class='col-md-4'>
                                                <input type='button' class='btn btn-success ' onClick='mostrar_turnos_desde_hoy()' value='Turnos'/>
                                            </div>
                                            <div class='col-md-4'>
                                                <input type='button' class='btn btn-success' onClick='mostrar_calendario()' value='Calendario'/>
                                            </div>
                                            <div class='col-md-4'>
                                                <input type='button' class='btn btn-success' onClick='historico_turno()' value='Historico'/>
                                            </div>
                                        </div>-->
                                    </div>
                                  </div>
                                  <div class='box-body' id='tabla_historial_turnos_secretaria' >
                                <div>
                                    <table id='tabla_asignar_especialidades' data-toggle='table'  
                                    data-url='".base_url()."index.php/Secretaria/getTurnosHoyLista'
                                    data-search='true'
                                    data-show-refresh='true' 
                                    data-show-columns='true'  
                                    data-pagination='true' style='background-color: #fff;'>
                                     <thead>
                                         <tr>
                                            



                                             <th data-field='codigo' data-visible='true'>Codigo</th>
                                             <th data-field='fecha' data-visible='true'>Fecha</th>
                                             <th data-field='nombre_profesional' data-visible='true'>Profesional</th>
                                             <th data-field='dni' data-visible='true'>Dni paciente</th>
                                             <th data-field='nombre' data-visible='true'>Paciente</th>
                                             <th data-field='hora_desde' data-visible='true'>Desde</th>
                                             <th data-field='hora_hasta' data-visible='true'>Hasta</th>
                                             <th data-field='importe' data-visible='true'>Importe</th>
                                             <th data-field='cobrado' data-visible='true'>Cobrado</th>
                                             <th data-field='estado' data-visible='true'>Estado</th>
                                             <th data-field='options' data-formatter='optionsFormatterCobrarTurno'> </th>
                                          </tr>
                                     </thead>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                          </div>
                          <!-- /.box -->
			</div>
		</div>";
        return $html;
    }
    
    public function ver_turnos_confirmados()
    {
        $html=
        " <div class='col-md-12 col-sm-12 col-xs-12'  id='div_calendario'>
                                <!-- Form Element sizes -->
                                <div class='box box-success'>
                                  <div class='box-header with-border'>
                                    <div class='col-md-offset-6 col-md-6'>
                                        <!--<div class='row'>
                                            <div class='col-md-4'>
                                                <input type='button' class='btn btn-success ' onClick='mostrar_turnos_desde_hoy()' value='Turnos'/>
                                            </div>
                                            <div class='col-md-4'>
                                                <input type='button' class='btn btn-success' onClick='mostrar_calendario()' value='Calendario'/>
                                            </div>
                                            <div class='col-md-4'>
                                                <input type='button' class='btn btn-success' onClick='historico_turno()' value='Historico'/>
                                            </div>
                                        </div>-->
                                    </div>
                                  </div>
                                  <div class='box-body' id='tabla_historial_turnos_secretaria' >
                                <div>
                                    <table id='tabla_asignar_especialidades' data-toggle='table'  
                                    data-url='".base_url()."index.php/Secretaria/getTurnosProximosConfirmados'
                                    data-search='true'
                                    data-show-refresh='true' 
                                    data-show-columns='true'  
                                    data-pagination='true' style='background-color: #fff;'>
                                     <thead>
                                         <tr>
                                             <th data-field='codigo' data-visible='true'>Codigo</th>
                                             <th data-field='fecha' data-visible='true'>Fecha</th>
                                             <th data-field='nombre_profesional' data-visible='true'>Profesional</th>
                                             <th data-field='dni' data-visible='true'>Dni paciente</th>
                                             <th data-field='nombre' data-visible='true'>Paciente</th>
                                             <th data-field='hora_desde' data-visible='true'>Desde</th>
                                             <th data-field='hora_hasta' data-visible='true'>Hasta</th>
                                             <th data-field='estado' data-visible='true'>Estado</th>
                                          </tr>
                                     </thead>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                          </div>
                          <!-- /.box -->
			</div>
		</div>";
        return $html;
    }
    
    public function ver_turnos_finalizados()
    {
        $html=
        " <div class='col-md-12 col-sm-12 col-xs-12'  id='div_calendario'>
                                <!-- Form Element sizes -->
                                <div class='box box-success'>
                                  <div class='box-header with-border'>
                                    <div class='col-md-offset-6 col-md-6'>
                                        <!--<div class='row'>
                                            <div class='col-md-4'>
                                                <input type='button' class='btn btn-success ' onClick='mostrar_turnos_desde_hoy()' value='Turnos'/>
                                            </div>
                                            <div class='col-md-4'>
                                                <input type='button' class='btn btn-success' onClick='mostrar_calendario()' value='Calendario'/>
                                            </div>
                                            <div class='col-md-4'>
                                                <input type='button' class='btn btn-success' onClick='historico_turno()' value='Historico'/>
                                            </div>
                                        </div>-->
                                    </div>
                                  </div>
                                  <div class='box-body' id='tabla_historial_turnos_secretaria' >
                                <div>
                                    <table id='tabla_asignar_especialidades' data-toggle='table'  
                                    data-url='".base_url()."index.php/Secretaria/getTurnosFinalizados'
                                    data-search='true'
                                    data-show-refresh='true' 
                                    data-show-columns='true'  
                                    data-pagination='true' style='background-color: #fff;'>
                                     <thead>
                                         <tr>
                                             <th data-field='codigo' data-visible='true'>Codigo</th>
                                             <th data-field='fecha' data-visible='true'>Fecha</th>
                                             <th data-field='nombre_profesional' data-visible='true'>Profesional</th>
                                             <th data-field='dni' data-visible='true'>Dni paciente</th>
                                             <th data-field='nombre' data-visible='true'>Paciente</th>
                                             <th data-field='hora_desde' data-visible='true'>Desde</th>
                                             <th data-field='hora_hasta' data-visible='true'>Hasta</th>
                                             <th data-field='estado' data-visible='true'>Estado</th>
                                          </tr>
                                     </thead>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                          </div>
                          <!-- /.box -->
			</div>
		</div>";
        return $html;
    }
    
    function generar_pantalla_ingreso_caja($fecha, $entradas, $salidas, $total,$listado_entrada,$listado_salidas) {
        $caja="<div class='row'>
                    <div class='col-md-4'>
                        <div class='box box-default'>
                            <div class='box-body'>
                                <div class='alert alert-info alert-dismissable'>
                                    <div class='margin'>
                                        <div class='btn-group'>
                                            <label class='control-label'>Fecha</label>
                                            <input type='text' class='form-control' name='fecha'value='".$fecha."' id='datepicker' >
                                            <button type='button' class='btn btn-info' onclick='listar();'> Listar </button>
                                            <button type='button' class='btn btn-info' onclick='modal_movimiento_caja();'>
                                                Movimiento (+ / -) 
                                            </button>
                                        </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-8'>
                        <div class='box box-default'>
                            <div class='box-body'>
                                <div class='col-lg-4 col-xs-8'>
                                    <!-- small box -->
                                    <div class='small-box bg-green'>
                                      <div class='inner'>
                                        <h3>".$entradas."<sup style='font-size: 20px'>$</sup></h3>
                                        <p>Entradas</p>
                                      </div>
                                      <div class='icon'>
                                        <i class='ion ion-stats-bars'></i>
                                      </div>
                                      <a href='#' class='small-box-footer'><i class='fa fa-arrow-circle-right'></i> de caja</a>
                                    </div>
                                </div>
                                <div class='col-lg-4 col-xs-8'>
                                    <!-- small box -->
                                    <div class='small-box bg-red'>
                                      <div class='inner'>
                                        <h3>".$salidas."<sup style='font-size: 20px'>$</sup></h3>
                                        <p>Salidas</p>
                                      </div>
                                      <div class='icon'>
                                        <i class='ion ion-stats-bars'></i>
                                      </div>
                                       <a href='#' class='small-box-footer'><i class='fa fa-arrow-circle-right'></i> de caja</a>
                                    </div>
                                </div>
                                <div class='col-lg-4 col-xs-8'>
                                    <!-- small box -->
                                    <div class='small-box bg-yellow'>
                                      <div class='inner'>
                                        <h3>".$total."<sup style='font-size: 20px'>$</sup></h3>
                                        <p>Saldos</p>
                                      </div>
                                      <div class='icon'>
                                        <i class='ion ion-pie-graph'></i>
                                      </div>
                                      <a href='#' class='small-box-footer'><i class='fa fa-arrow-circle-right'></i> de caja</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
               <div class='row'>
                  <div class='col-md-12'>
                        <div class='box box-default'>
                            <div class='box-header'>
                                <h3 class='box-title'>Detalle de caja</h3>
                            </div>
                            <div class='box-body'>
                                <div class='row'>
                                <div class='col-sm-12'>
                                    <table class='table table-bordered table-hover dataTable'>
                                        <thead>
                                                <tr>
                                                      <th>Fecha</th>
                                                      <th>Tipo</th>
                                                      <th>Comprobante</th>
                                                      <th>Entrada</th>
                                                      <th>Salida</th>
                                                      <th>Acciones</th>
                                                </tr>
                                        </thead>   
                                        <tbody>";
                                            foreach ($listado_entrada as $e) {
                                                    $caja.="
                                                <tr>
                                                        <td>".$e["fecha"]."</td>
                                                        <td>".$e["tipo"]."</td>
                                                        <td>".$e["comprobante"]."</td>
                                                        <td>".$e["importe"]."</td>
                                                        <td></td>
                                                        <td>
                                                            <a class='btn btn-success' href='#' onclick='acciones_sobre_registro(1, ".$e["tipo_cod_comp"].", ".$e["comprobante"]." );'>
                                                                <i class='fa fa-search'></i>                                          
                                                            </a>";
                                                            if($fecha == Date("Y-m-d")){
                                                                $caja.="
                                                                            <a class='btn btn-danger' href='#' onclick='acciones_sobre_registro(2, ".$e["tipo_cod_comp"].", ".$e["comprobante"]." );'>
                                                                                <i class='fa fa-trash-o'></i> 
                                                                            </a>
                                                                          ";
                                                            }
                                                            $caja.="<a class='btn btn-warning' href='#' onclick='acciones_sobre_registro(3, ".$e["tipo_cod_comp"].", ".$e["comprobante"]." );'>
                                                                <i class='fa fa-print'></i>                                          
                                                            </a>
                                                            
                                                        </td>
                                                </tr>";
                                            }
                                            foreach ($listado_salidas as $s) {
                                                    $caja.="
                                                <tr>
                                                        <td>".$s["fecha"]."</td>
                                                        <td>".$s["tipo"]."</td>
                                                        <td>".$s["comprobante"]."</td>
                                                        <td></td>
                                                        <td>".$s["importe"]."</td>
                                                        <td>
                                                            <a class='btn btn-success' href='#' onclick='acciones_sobre_registro(1, ".$s["tipo_cod_comp"].", ".$s["comprobante"]." );'>
                                                                <i class='fa fa-search'></i>                                               
                                                            </a>";
                                                            if($fecha == Date("Y-m-d")){
                                                                $caja.="
                                                                            <a class='btn btn-danger' href='#' onclick='acciones_sobre_registro(2, ".$s["tipo_cod_comp"].", ".$s["comprobante"]." );'>
                                                                                <i class='fa fa-trash-o'></i> 
                                                                            </a>
                                                                          ";
                                                            }
                                                            $caja.="<a class='btn btn-warning' href='#' onclick='acciones_sobre_registro(3, ".$e["tipo_cod_comp"].", ".$e["comprobante"]." );'>
                                                                <i class='fa fa-print'></i>                                          
                                                            </a>
                                                        </td>
                                                </tr>";
                                            }

                                          $caja.="</tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
               </div>
          
";
        return $caja;
    }
    
    public function generar_detalle_comprobante_caja($numero, $fecha, $movimiento, $importe, $concepto) {
        		
		$mensaje="<table class='table table-bordered table-striped'>
				<tbody>
                                        <tr>
						<td>Numero</td>
						<td>".$numero."</td>
					</tr>
                                        <tr>
						<td>Fecha</td>
						<td>".$fecha."</td>
					</tr>
                                        <tr>
						<td>Movimiento</td>
						<td>".$movimiento."</td>
					</tr>
					<tr>
						<td>Importe</td>
						<td>".$importe."</td>
					</tr>
                                        <tr>
						<td>Concepto</td>
						<td>".$concepto."</td>
					</tr>
					
				</tbody>
			</table>";
		echo $mensaje;
    }
    
    public function generar_configuraciones(){
        $config="<!-- Create the tabs -->
        <ul class='nav nav-tabs nav-justified control-sidebar-tabs'>
          <li class='active'><a href='#control-sidebar-home-tab' data-toggle='tab'><i class='fa fa-home'></i></a></li>

           <!-- <li><a href='#control-sidebar-settings-tab' data-toggle='tab'><i class='fa fa-gears'></i></a></li>-->
        </ul>
        <!-- Tab panes -->
        <div class='tab-content'>
          <!-- Home tab content -->
          <div class='tab-pane active' id='control-sidebar-home-tab'>
            <h3 class='control-sidebar-heading'>Configuraciones</h3>
            <ul class='control-sidebar-menu'>
                
                <li>
                    <a href='".site_url('administrador/abm_textos_deslizables')."'>
                    <i class='menu-icon fa fa-mouse-pointer bg-red'></i>
                        <div class='menu-info'>
                          <h4 class='control-sidebar-subheading'>Slider</h4>
                          <p>Textos Deslizables</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href='".site_url('administrador/abm_secciones')."'>
                    <i class='menu-icon fa fa-mouse-pointer bg-red'></i>
                        <div class='menu-info'>
                          <h4 class='control-sidebar-subheading'>Secciones</h4>
                          <p>Menu Principal</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href='".site_url('administrador/abm_localidades')."'>
                    <i class='menu-icon fa fa-folder bg-yellow'></i>
                        <div class='menu-info'>
                          <h4 class='control-sidebar-subheading'>Localidades</h4>
                          <p>ingrese localidades</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href='".site_url('administrador/abm_sucursales')."'>
                    <i class='menu-icon fa fa-folder bg-yellow'></i>
                        <div class='menu-info'>
                          <h4 class='control-sidebar-subheading'>Sucursales</h4>
                          <p>ingrese sucursales nuevas</p>
                        </div>
                    </a>
                </li>
                <!-- <li>
                    <a href='".site_url('empleado/abm_iva')."'>
                    <i class='menu-icon fa fa-folder bg-blue'></i>
                        <div class='menu-info'>
                          <h4 class='control-sidebar-subheading'>Agregar Iva</h4>
                          <p>ingrese valores nuevos</p>
                        </div>
                    </a>
                </li>/.control-sidebar-menu -->
            </ul>

          </div><!-- /.tab-pane -->
          <!-- Stats tab content
          <div class='tab-pane' id='control-sidebar-stats-tab'>Stats Tab Content</div>
           
          <div class='tab-pane' id='control-sidebar-settings-tab'>
            <form method='post'>
              <h3 class='control-sidebar-heading'>General Settings</h3>
              <div class='form-group'>
                <label class='control-sidebar-subheading'>
                  Report panel usage
                  <input type='checkbox' class='pull-right' checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div>

              <div class='form-group'>
                <label class='control-sidebar-subheading'>
                  Allow mail redirect
                  <input type='checkbox' class='pull-right' checked>
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div>

              <div class='form-group'>
                <label class='control-sidebar-subheading'>
                  Expose author name in posts
                  <input type='checkbox' class='pull-right' checked>
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div>

              <h3 class='control-sidebar-heading'>Chat Settings</h3>

              <div class='form-group'>
                <label class='control-sidebar-subheading'>
                  Show me as online
                  <input type='checkbox' class='pull-right' checked>
                </label>
              </div> 

              <div class='form-group'>
                <label class='control-sidebar-subheading'>
                  Turn off notifications
                  <input type='checkbox' class='pull-right'>
                </label>
              </div>

              <div class='form-group'>
                <label class='control-sidebar-subheading'>
                  Delete chat history
                  <a href='javascript::;' class='text-red pull-right'><i class='fa fa-trash-o'></i></a>
                </label>
              </div>
            </form>
          </div>.tab-pane -->
        </div>";
        return $config;
    }
    
    public function render_ver_imagenes_historia_clinica($historia)
    {
        $html=
        "
        
        <div class='box box-success'>
                <div class='box-header with-border'>
                        <div class='col-md-12'>
                                <div class='row'>
                                        <div class='col-md-5'>";
                                            if($this->ci->session->userdata("tipo_usuario") == "1" || $this->ci->session->userdata("tipo_usuario") == "3")
                                            {
                                                $html.="<a href='".base_url()."index.php/Administrador/abm_historias_clinicas' class='btn btn-success pull-left'>Volver</a>";
                                            }
                                            else if($this->ci->session->userdata("tipo_usuario") == "2")
                                            {
                                               $html.="<a href='".base_url()."index.php/Secretaria/abm_historias_clinicas' class='btn btn-success pull-left'>Volver</a>";
                                            }
                                            else
                                            {
                                               $html.="<a href='".base_url()."index.php/Profesional/abm_historias_clinicas' class='btn btn-success pull-left'>Volver</a>";
                                            }
                                   $html.="</div>
                                </div>
                        </div>
                </div>
                
                <div class='box-body' id='tabla_historias_clinicas'>
                    <div class='col-md-12'>";
        
                     for($i=1; $i <= 4; $i++)
                     {
                         if(getimagesize(base_url()."recursos/img/pacientes/".$historia[0]["imagen".$i]))
                         {
                             $html.="<img src='".base_url()."recursos/img/pacientes/".$historia[0]["imagen".$i]."' width='100' height='100' style='margin-right: 10px;margin-top: 10px;' onClick='carga_imagen(&#34;".base_url()."recursos/img/pacientes/".$historia[0]["imagen".$i]."&#34;)'/>";
                         }
                     }
            $html.="</div>
                    <div>
                        <img id='visor_imagenes' src='' width='400' style='margin-top: 20px;' data-imagezoom='true' alt=''/>
                    </div>
                </div>
        </div><!-- /.box -->
        ";
        return $html;
    }
    
    public function generar_render_ver_factura($datos,$comprobante)
    {
        $html=
       "<div class='row'>
            <div class='col-md-12'>
				<h3>Factura $comprobante</h3>
				<table class='table table-striped'>
						<tr>
							<td>Fecha: </td>
							<td>".$datos["fecha"]."</td>
						</tr>
						<tr>
							<td>Hora desde: </td>
							<td>".$datos["hora_desde"]."</td>
						</tr>
						<tr>
							<td>Hora hasta: </td>
							<td>".$datos["hora_hasta"]."</td>
						</tr>
						<tr>
							<td>Paciente: </td>
							<td>".$datos["nombre_paciente"]." ".$datos["apellido_paciente"]."</td>
						</tr>
						<tr>
							<td>Profesional: </td>
							<td>".$datos["nombre_profesional"]." ".$datos["apellido_profesional"]."</td>
						</tr>
						<tr>
							<td>Especialidad: </td>
							<td>".$datos["especialidad"]."</td>
						</tr>
						<tr>
							<td>Obra social: </td>
							<td>".$datos["razon_social"]."</td>
						</tr>
                                                <tr>
							<td>Importe: </td>
							<td>".$datos["importe"]."</td>
						</tr>
				</table>
            </div>
	</div>";
        return $html;
    }
    
    public function generar_render_ver_movimiento_caja($datos,$comprobante)
    {
        $html=
       "<div class='row'>
            <div class='col-md-12'>
				<h3>Movimiento: $comprobante</h3>
				<table class='table table-striped'>
						<tr>
							<td>Fecha: </td>
							<td>".$datos["fecha"]."</td>
						</tr>
						<tr>
							<td>Concepto: </td>
							<td>".$datos["concepto"]."</td>
						</tr>
						<tr>
							<td>Empleado: </td>
							<td>".$datos["nombre_empleado"]." ".$datos["apellido_empleado"]."</td>
						</tr>
						<tr>
							<td>Tipo de movimiento: </td>
							<td>".$datos["tipo_mov"]."</td>
						</tr>
                                                <tr>
							<td>Importe: </td>
							<td>".$datos["importe"]."</td>
						</tr>
				</table>
            </div>
	</div>";
        return $html;
    }
    
    public function generar_render_imprimir_factura($datos,$comprobante)
    {
        $html=
       "<div class='row'>
            <div class='col-md-offset-1 col-md-4'>
				<h3>Factura $comprobante</h3>
				<table class='table table-striped'>
						<tr>
							<td>Fecha: </td>
							<td>".$datos["fecha"]."</td>
						</tr>
						<tr>
							<td>Hora desde: </td>
							<td>".$datos["hora_desde"]."</td>
						</tr>
						<tr>
							<td>Hora hasta: </td>
							<td>".$datos["hora_hasta"]."</td>
						</tr>
						<tr>
							<td>Paciente: </td>
							<td>".$datos["nombre_paciente"]." ".$datos["apellido_paciente"]."</td>
						</tr>
						<tr>
							<td>Profesional: </td>
							<td>".$datos["nombre_profesional"]." ".$datos["apellido_profesional"]."</td>
						</tr>
						<tr>
							<td>Especialidad: </td>
							<td>".$datos["especialidad"]."</td>
						</tr>
						<tr>
							<td>Obra social: </td>
							<td>".$datos["razon_social"]."</td>
						</tr>
                                                <tr>
							<td>Importe: </td>
							<td>".$datos["importe"]."</td>
						</tr>
				</table>
            </div>
	</div>";
        return $html;
    }
    
    public function generar_render_imprimir_movimiento_caja($datos,$comprobante)
    {
        $html=
       "<div class='row'>
            <div class='col-md-offset-1 col-md-4'>
				<h3>Movimiento: $comprobante</h3>
				<table class='table table-striped'>
						<tr>
							<td>Fecha: </td>
							<td>".$datos["fecha"]."</td>
						</tr>
						<tr>
							<td>Concepto: </td>
							<td>".$datos["concepto"]."</td>
						</tr>
						<tr>
							<td>Empleado: </td>
							<td>".$datos["nombre_empleado"]." ".$datos["apellido_empleado"]."</td>
						</tr>
						<tr>
							<td>Tipo de movimiento: </td>
							<td>".$datos["tipo_mov"]."</td>
						</tr>
                                                <tr>
							<td>Importe: </td>
							<td>".$datos["importe"]."</td>
						</tr>
				</table>
            </div>
	</div>";
        return $html;
    }
}
