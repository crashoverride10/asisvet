<?php

require_once 'constantes.php';
require_once 'connectbd.php';
	
class funciones {
 
    // constructor
    function __construct() {
		
    }
 
    // destructor
    function __destruct() {
        // $this->close();
    }
	
	function seguridad(){
		$db = new DB_Connect();
		$conn = $db->connect();
		$resultado = false;
		//Revisar primero la sesión
		if(isset($_SESSION['user_authorized'])){
			if($_SESSION['user_authorized'] == true){
				$resultado = true;
			}
		}
		
		//Revisar luego la cookie
		if($resultado == false){
			$cookie_name = "id";
			if(isset($_COOKIE[$cookie_name])) {
				$query = "select count(*) as cuenta,id, id_rol, primer_nombre, primer_apellido, id_empresa from usuario where estado = 'A' and id = ".$_COOKIE[$cookie_name];
			$result = mysqli_query($conn,$query);
			$row = mysqli_fetch_array($result);
			$cuenta = $row['cuenta'];
				if($cuenta == 1){
					$_SESSION['user_authorized'] = true;
					$_SESSION['id'] = $row['id'];
					$_SESSION['rol'] = $row['id_rol'];
					$_SESSION['nombre'] = $row['primer_nombre'];
					$_SESSION['apellido'] = $row['primer_apellido'];
					$_SESSION['id_empresa'] = $row['id_empresa'];
					$resultado = true;
				}		
			}
		}
		
		//Revisar rol
		if($resultado == true){
			$query_sec = "SELECT count(*) as cuenta FROM menu_item m
					inner join rol_modulo r on m.id = r.id_modulo
					where m.direccion_pagina = '".basename($_SERVER['PHP_SELF'])."' and id_rol = ".$_SESSION['rol'];
			$result = mysqli_query($conn,$query_sec);
			$row = mysqli_fetch_array($result);
			if($row['cuenta'] == '0'){
				$resultado = false;
			}
		}
		
		if($resultado == false){
			header('location:login.php');
		}
	}
	
	function menu_item($padre,$menu_items,$lvl){
		foreach($menu_items as $m_item){
			if($m_item['id_padre'] == $padre){
						$li_clase = "";
						if($m_item['clase'] == 'A'){
							$li_clase = ' class="active open" ';
						}
						
						if($m_item['estado'] == 'A'){
							if($m_item['hijos']){
								echo '<li'.$li_clase.'><a href="javascript:;">
									<i class="'.$m_item['clase_icono'].'"></i>
									<span class="title">'.$m_item['nombre'].'</span>
									<span class="arrow "></span>
									</a>';
								echo '<ul class="sub-menu">';
								$this->menu_item($m_item['id'],$menu_items,$lvl+1);
								echo '</ul></li>';
							}else{
								echo '<li'.$li_clase.'>
									<a href="'.$m_item['direccion_pagina'].'">
									<i class="'.$m_item['clase_icono'].'"></i>
									<span class="title">'.$m_item['nombre'].'</span></a></li>';
							}
						}
			}
		}
	}
	
	function menu(){
		$db = new DB_Connect();
		$conn = $db->connect();
		$menu_items = Array();
		$padre = '';
		$query = "select m.id, id_padre, direccion_pagina, nombre, clase_icono, m.estado,
			(select count(*) from menu_item i
			inner join rol_modulo rm
			on i.id = rm.id_modulo
			where i.id_padre = m.id
			and i.estado = 'A'
			and rm.id_rol = ".$_SESSION['rol'].") as hijos
		from menu_item m
		inner join rol_modulo r
		on m.id = r.id_modulo
		where m.estado in ('A','I')
		and r.id_rol = ".$_SESSION['rol']."
		order by m.id";
		$result = mysqli_query($conn,$query);
		while($row = mysqli_fetch_array($result)){
			if(basename($_SERVER['PHP_SELF']) == $row['direccion_pagina']){
				$row['clase'] = 'A';
				$padre = $row['id'];
			}else{
				$row['clase'] = 'X';
			}
			$menu_items[] = $row;
		}
		
		//Colocar menu seleccionado como activo
		while($padre != ""){
			foreach($menu_items as $key => $m_item){
				if($m_item['id'] == $padre){
					$menu_items[$key]['clase'] = 'A';
					$padre = $m_item['id_padre'];
				}
			}
		}
		
		echo '<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu " data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<br>';
				$this->menu_item('',$menu_items,1);
			echo '</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>';
	}
	
	function menu_top(){
		echo '<div class="top-menu">
			<ul class="nav navbar-nav pull-right">';
				$this->notificaciones();
		echo'<li class="dropdown dropdown-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<span class="username username-hide-on-mobile">
					'.$_SESSION['nombre'].' </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="extra_profile.html">
							<i class="icon-user"></i> My Profile </a>
						</li>
						<li>
							<a href="page_calendar.html">
							<i class="icon-calendar"></i> My Calendar </a>
						</li>
						<li>
							<a href="inbox.html">
							<i class="icon-envelope-open"></i> My Inbox <span class="badge badge-danger">
							3 </span>
							</a>
						</li>
						<li>
							<a href="#">
							<i class="icon-rocket"></i> My Tasks <span class="badge badge-success">
							7 </span>
							</a>
						</li>
						<li class="divider">
						</li>
						<li>
							<a href="extra_lock.html">
							<i class="icon-lock"></i> Lock Screen </a>
						</li>
						<li>
							<a href="logout.php">
							<i class="icon-key"></i> Cerrar sesión </a>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
			</ul>
			</div>';
	}

	function notificaciones(){
		echo '<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="icon-bell"></i>
					<span class="badge badge-default">
					7 </span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<p>
								 You have 14 new notifications
							</p>
						</li>
						<li>
							<ul class="dropdown-menu-list scroller" style="height: 250px;">
								<li>
									<a href="#">
									<span class="label label-sm label-icon label-success">
									<i class="fa fa-plus"></i>
									</span>
									New user registered. <span class="time">
									Just now </span>
									</a>
								</li>
								<li>
									<a href="#">
									<span class="label label-sm label-icon label-danger">
									<i class="fa fa-bolt"></i>
									</span>
									Server #12 overloaded. <span class="time">
									15 mins </span>
									</a>
								</li>
							</ul>
						</li>
						<li class="external">
							<a href="#">
							See all notifications <i class="m-icon-swapright"></i>
							</a>
						</li>
					</ul>
				</li>';
	}
	
	function logo(){
		echo '<a class="site-logo" href="index.php"><img height="19px" src="assets/frontend/layout/img/logos/logo-comic.png" alt="'.TITULO_APP.'"></a>';
	}
	
	function footer(){
		echo '<div class="footer" style="bottom:0; width:100%; height:36px; padding:1px; position:fixed; z-index: 11000;">
      <div class="container">
        <div class="row">
          <!-- BEGIN COPYRIGHT -->
          <div class="col-md-8 col-sm-8 padding-top-10">
            2014 © appMascotas. Todos los derechos reservados.
          </div>
          <div class="col-md-4 col-sm-4">
            <ul class="social-footer list-unstyled list-inline pull-right">
            </ul>  
          </div>
        </div>
      </div>
    </div>';
	}
	
	//Dependiendo del tipo de usuario muestra el sub-menu adecuado
	function submenu_perfil_mascota(){
		if($_SESSION['rol'] == 4){
		echo '<div class="col-md-3">
				<ul class="ver-inline-menu tabbable margin-bottom-10">
					<li class="active">
						<a data-toggle="tab" href="#tab_1">
						<i class="fa fa-arrow-circle-o-right"></i> Recomendaciones </a>
						<span class="after">
						</span>
					</li>
					<li>
						<a data-toggle="tab" href="#tab_2">
						<i class="fa fa-plus"></i> Tratamiento </a>
					</li>
				</ul>
			</div>';
		}else if($_SESSION['rol'] == 1 or $_SESSION['rol'] == 2 or $_SESSION['rol'] == 3){
		echo  '<div class="col-md-3">
				<ul class="ver-inline-menu tabbable margin-bottom-10">
					<li>
						<a data-toggle="tab" href="#tab_3">
						<i class="fa fa-medkit"></i> Prescripción </a>
					</li>
					<li>
						<a data-toggle="tab" href="#tab_4">
						<i class="fa fa-bug"></i> Desparasitaciones </a>
					</li>
					<li>
						<a data-toggle="tab" href="#tab_5">
						<i class="fa fa-stethoscope"></i> Control de peso </a>
					</li>
					<li>
						<a data-toggle="tab" href="#tab_6">
						<i class="fa fa-user-md"></i> Vacunas </a>
					</li>
				</ul>
			</div>';
		}
	}
}
?>