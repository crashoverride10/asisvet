<?php
	session_start();
	require_once 'php/constantes.php';
   	require_once 'php/funciones.php';
	require_once 'php/connectbd.php';
	$func = new funciones();
	$func->seguridad();
	$db = new DB_Connect();
	$conn = $db->connect();
?>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.2.0
Version: 3.1.3
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php echo TITULO_APP;?> | Perfil del usuario</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="../assets/global/plugins/select2/select2.css"/>
<link href="../assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="../assets/global/css/components.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="../assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="../assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
<link href="../assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>



</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content ">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="index.html">
			<img src="../assets/admin/layout/img/logo.png" alt="logo" class="logo-default"/>
			</a>
			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
			<?php $func->menu_top(); ?>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<?php $func->menu(); ?>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Perfil del usuario
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.php">Inicio</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Perfil del usuario</a>					
					</li>
				</ul> 
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input placeholder="Cédula" type="text" name="txtCedula" id="txtCedula" class="form-control select2"/>
					</div>
				</div>
				<div class="col-md-6">
					<button class="btn blue" onclick="buscar_usuario()">Aceptar</button>
				</div>
			</div>
			<div class="row profile">
				<div class="col-md-12">
				<?php
				if(isset($_GET['u'])){
					$query = "select us.primer_nombre, us.segundo_nombre, us.primer_apellido, us.segundo_apellido, us.nombre_usuario, us.id_tipo_documento, us.cedula, us.estado, us.fecha_registro, td.nombre as nombre_documento, udc.valor, tc.nombre as contact_nombre
							  from usuario us
							  inner join tipo_documento td on us.id_tipo_documento = td.id
							  inner join usuario_det_comunicacion udc on us.id = udc.id_usuario
							  inner join tipo_comunicacion tc on udc.id_tipo_comunicacion = tc.id
							  where us.id_empresa = ".$_SESSION['id_empresa']."
							  and us.id = ".$_GET['u'];
					$result = mysqli_query($conn,$query);
					$row = mysqli_fetch_array($result);	
					mysqli_data_seek($result, 0);
					
					$query_mascota = "select m.id, m.nombre, r.nombre as raza, func_edad(m.fecha_nacimiento) as edad
							  from mascota m
							  inner join raza r on m.id_raza = r.id
							  where m.id_usuario = ".$_GET['u'];
					$result_mascota = mysqli_query($conn,$query_mascota);
					
				?>
					<div class="tabbable tabbable-custom tabbable-full-width">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_1_1" data-toggle="tab">
								Resumen </a>
							</li>
							<li>
								<a href="#tab_1_3" data-toggle="tab">
								Detalles </a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1_1">
								<div class="row">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-8 profile-info">
											
												<h1>
													<?php
														echo '<h1>'.strtoupper($row['primer_nombre']." ".$row['primer_apellido']).' &nbsp;'; 
														echo '<a href="registrar_usuario.php?u='.$_GET['u'].'"><i class="fa fa-pencil"></i></a>';
														echo '</h1>';
													?>	
												</h1>
												<ul class="list-inline">
													<li>
													
													</li>
													<li>
														<i class="fa fa-calendar"></i> <?php echo $row['fecha_registro']; ?>
													</li>
												</ul>
											</div>
										</div>
										<!--end row-->
												<div class="tab-pane active" id="tab_1_11">
														<table class="table table-striped table-bordered table-advance table-hover">
														<thead>
														<div class="caption">
															<h1>
															 Mascotas
															 </h1>
														</div>
														<tr>
															<th>
																<i class="fa fa-paw"></i> Nombre
															</th>
															<th>
																<i class="fa fa-bookmark"></i> Raza
															</th>
															<th>
																<i class="fa fa-calendar"></i> Edad
															</th>
														</tr>
														</thead>
														<tbody>
														<?php
														while($row_mascota = mysqli_fetch_array($result_mascota)){
														echo '<tr>
																<td>
																	<a href="perfil_mascota.php?m='.$row_mascota['id'].'">'.
																	$row_mascota['nombre'].
																'</a></td>
																<td>'.
																	$row_mascota['raza'].
																'</td>
																<td>'.
																	$row_mascota['edad'].
																'</td>
															</tr>';
															}
															
														?>
														</tbody>
														</table>
														<a href="registrar_mascota.php?u=<?php echo $_GET['u']; ?>" class="btn white"><i class="fa fa-plus"></i> Agregar mascota</a>
												</div>
									</div>
								</div>
							</div>
							<!--tab_1_2-->
							<div class="tab-pane" id="tab_1_3">
								<div class="row profile-account">
									<div class="col-md-3">
										<ul class="ver-inline-menu tabbable margin-bottom-10">
											<li class="active">
												<a data-toggle="tab" href="#tab_1-1">
												<i class="fa fa-cog"></i> Información Personal </a>
												<span class="after">
												</span>
											</li>
											<li>
												<a data-toggle="tab" href="#tab_2-2">
												<i class="fa fa-phone"></i> Información de contacto </a>
											</li>
											<li>
												<a data-toggle="tab" href="#tab_3-3">
												<i class="fa fa-lock"></i> Change Password </a>
											</li>
											<li>
												<a data-toggle="tab" href="#tab_4-4">
												<i class="fa fa-eye"></i> Privacity Settings </a>
											</li>
										</ul>
									</div>
									<div class="col-md-9">
										<div class="tab-content">
											<div id="tab_1-1" class="tab-pane active">
												<?php
													echo '<h1>Nombres</h1>
													<h3>'.strtoupper($row['primer_nombre'])." ".strtoupper($row['segundo_nombre']).'</h3>
													<h1>Apellidos</h1>
													<h3>'.strtoupper($row['primer_apellido'])." ".strtoupper($row['segundo_apellido']).'</h3>
													<h1>Nombre de usuario</h1>
													<h3>'.$row['nombre_usuario'].'</h3>
													<h1>'.$row['nombre_documento'].'</h1>
													<h3>'.strtoupper($row['cedula']).'</h3>';							
												?>		
											</div>
											<div id="tab_2-2" class="tab-pane">
												<p>
													<h1>CONTACTOS</h1>
													
														<?php
													
															while ($row = mysqli_fetch_array($result)){
																echo'
																 <h1>'.$row['contact_nombre'].'</h1>
																 <h2>'.$row['valor'].'</h2>'; 
															}
														?>
												</p>
											</div>
											<div id="tab_3-3" class="tab-pane">
												<form action="#">
													<div class="form-group">
														<label class="control-label">Current Password</label>
														<input type="password" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">New Password</label>
														<input type="password" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Re-type New Password</label>
														<input type="password" class="form-control"/>
													</div>
													<div class="margin-top-10">
														<a href="#" class="btn green">
														Change Password </a>
														<a href="#" class="btn default">
														Cancel </a>
													</div>
												</form>
											</div>
											<div id="tab_4-4" class="tab-pane">
												<form action="#">
													<table class="table table-bordered table-striped">
													<tr>
														<td>
															 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus..
														</td>
														<td>
															<label class="uniform-inline">
															<input type="radio" name="optionsRadios1" value="option1"/>
															Yes </label>
															<label class="uniform-inline">
															<input type="radio" name="optionsRadios1" value="option2" checked/>
															No </label>
														</td>
													</tr>
													<tr>
														<td>
															 Enim eiusmod high life accusamus terry richardson ad squid wolf moon
														</td>
														<td>
															<label class="uniform-inline">
															<input type="checkbox" value=""/> Yes </label>
														</td>
													</tr>
													<tr>
														<td>
															 Enim eiusmod high life accusamus terry richardson ad squid wolf moon
														</td>
														<td>
															<label class="uniform-inline">
															<input type="checkbox" value=""/> Yes </label>
														</td>
													</tr>
													<tr>
														<td>
															 Enim eiusmod high life accusamus terry richardson ad squid wolf moon
														</td>
														<td>
															<label class="uniform-inline">
															<input type="checkbox" value=""/> Yes </label>
														</td>
													</tr>
													</table>
													<!--end profile-settings-->
													<div class="margin-top-10">
														<a href="#" class="btn green">
														Save Changes </a>
														<a href="#" class="btn default">
														Cancel </a>
													</div>
												</form>
											</div>
										</div>
									</div>
									<!--end col-md-9-->
								</div>
							</div>
							<!--end tab-pane-->
						</div>
					</div>
					<?php
						}
					?>
					<!--END TABS-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 2014 &copy; Metronic by keenthemes.
	</div>
	<div class="page-footer-tools">
		<span class="go-top">
		<i class="fa fa-angle-up"></i>
		</span>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="../assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="../assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<!-- END PAGE LEVEL PLUGINS -->
<script src="../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script type="text/javascript" src="../assets/global/plugins/select2/select2.min.js"></script>
<script>
function buscar_usuario(){
	window.location.assign(window.location.pathname+"?u="+$('#txtCedula').val());
}

jQuery(document).ready(function() {
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features


	
$('#txtCedula').select2({
				placeholder: 'Buscar usuario',
				ajax: {
					url: "php/wsListarUsuario.php",
					dataType: 'json',
					quietMillis: 100,
					data: function (term, page) {
						return {
							term: term, //search term
							page_limit: 10 // page size
						};
					},
					results: function (data, page) {
						return { results: data.results };
					}

				}
				});
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>