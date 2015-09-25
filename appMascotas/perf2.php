<?php
if(!isset($_GET['m'])){
	header('location:perfil_usuario.php');
}
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
<title><?php echo TITULO_APP;?> | Perfil de mascotas</title>
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
<link href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
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
	<?php
		$query = "select m.id_usuario, m.nombre, m.foto, m.sexo, m.castrado, m.observaciones, m.fecha_nacimiento, m.alergias, r.nombre as raza, m.color
				  from mascota m
				  inner join raza r on m.id_raza = r.id
				  where m.id = ".$_GET['m'];
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_array($result);
		
	
	?>
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Perfil de las mascotas
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.php">Inicio</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<i class="fa fa-user"></i>
						<a href="perfil_usuario.php?u=<?php echo $row['id_usuario']; ?>">Perfil del usuario</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Perfil de las mascotas</a>					
					</li>
				</ul> 
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row profile">
				<div class="col-md-12">
					<!--BEGIN TABS-->
					<div class="tabbable tabbable-custom tabbable-full-width">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_1_1" data-toggle="tab">
								Resumen </a>
							</li>
							<li>
								<a href="#tab_1_6" data-toggle="tab">
								Tratamiento </a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1_1">
								<div class="row">
									<div class="col-md-3">
										<ul class="list-unstyled profile-nav">
											<li>
												<img src="<?php echo RUTA_FOTOS_MASCOTAS."/".$row['foto']?>" class="img-responsive" alt=""/>
											</li>
										</ul>
									</div>
									<div class="col-md-9">
										<div class="row">
											<div class="col-md-8 profile-info">
											
												<h1>
													<?php
														echo '<h1>'.strtoupper($row['nombre']).'</h1>'; 
													?>
												</h1>
												<p>
													<h2>
														Observaciones
													</h2>
													 <?php
														echo '<h3 align="justify">'.$row['observaciones'].'</h3>'; 
													?>
												</p>
												<p>
													<h2>
														Alergias
													</h2>
													 <?php
														echo '<h3 align="justify">'.$row['alergias'].'</h3>'; 
													?>
													
												</p>
											</div>
											<!--end col-md-8-->
											<div class="col-md-4">
												<div class="portlet sale-summary">
													<div class="portlet-title">
														<div class="caption">
															 Caracteristicas
														</div>
													</div>
													<div class="portlet-body">
														<ul class="list-unstyled">
															<li>
																<span class="sale-info">
																SEXO <i class="fa fa-img-up"></i>
																</span>
																<span class="sale-num">
																	<?php
																		echo '<h3>'.strtoupper($row['sexo']).'</h3>'; 
																	?>
																</span>
															</li>
															<li>
																<span class="sale-info">
																RAZA </span>
																<span class="sale-num">
																<?php
																	echo '<h4>'.strtoupper($row['raza']).'</h4>'; 
																?>
																</span>
															</li>
															<li>
																<span class="sale-info">
																CASTRADO </span>
																<span class="sale-num">
																<?php
																	echo '<h4>'.strtoupper($row['castrado']).'</h4>'; 
																?>
																</span>
															</li>
															<li>
																<span class="sale-info">
																COLOR </span>
																<span class="sale-num">
																<?php
																	echo '<h4>'.strtoupper($row['color']).'</h4>'; 
																?>
																</span>
															</li>
															<li>
																<span class="sale-info">
																FECHA DE NACIMIENTO <i class="fa fa-img-down"></i>
																</span>
																<span class="sale-num">
																<?php
																	echo '<h4>'.strtoupper($row['fecha_nacimiento']).'</h4>'; 
																?>
																 </span>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!--end col-md-4-->
										</div>
										<!--end row-->
										
									</div>
								</div>
							</div>
							<!--tab_1_2-->

							<!--end tab-pane-->
	
							<!--end tab-pane-->
							<div class="tab-pane" id="tab_1_6">
								<div class="row">
									<div class="col-md-3">
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
											<li>
												<a data-toggle="tab" href="#tab_3">
												<i class="fa fa-medkit"></i> Prescripción </a>
											</li>
										<!--	<li>
												<a data-toggle="tab" href="#tab_1">
												<i class="fa fa-info-circle"></i> Recomendaciones </a>
											</li>
											<li>
												<a data-toggle="tab" href="#tab_2">
												<i class="fa fa-tint"></i> Payment Rules </a>
											</li>
											<li>
												<a data-toggle="tab" href="#tab_3">
												<i class="fa fa-plus"></i> Other Questions </a>
											</li>-->
										</ul>
									</div>
									<div class="col-md-9">
										<div class="tab-content">
											<div id="tab_1" class="tab-pane active">
												<div id="accordion1" class="panel-group">
													<div class="panel panel-info">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_1">
															1. Alimentación </a>
															</h4>
														</div>
														<div id="accordion1_1" class="panel-collapse collapse in">
															<div class="panel-body">
																<p align="justify">
																 No le dé alimentos crudos de ningún origen (carnes rojas, vísceras, pollo, verduras), ya que transmiten enfermedades: Toxoplasmosis, Brucelosis, Tuberculosis, Coccidiosis, otras parasitosis gastrointestinales, etc.
																 </br></br>
																 No le dé huesos de ningún tipo y tamaño, ya que puede traerle trastornos gastrointestinales: obstrucciones, perforaciones, heridas, todas ellas muy dañinas para la salud de su mascota.
																 </p>
															</div>
														</div>
													</div>
													<div class="panel panel-default">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_2">
															2. Cuidado </a>
															</h4>
														</div>
														<div id="accordion1_2" class="panel-collapse collapse">
															<div class="panel-body">
																<p align="justify">
																 No lo bañe con detergentes, jabones o champúes con esencias; hágalo con productos elaborados para mascotas o con jabón neutro. No le ponga los perfumes que usted utiliza. Existen perfumes especialmente elaborados para mascotas.
																 </br></br>
																 Mantenga aseada su boca mediante cepillado y aplicando productos veterinarios. La formación de sarro predispone a enfermedades bucales, lleva a la pérdida de dientes y al acúmulo de placa bacteriana (la cual puede afectar otros órganos: corazón, riñones, etc.).
																 </p>
															</div>
														</div>
													</div>
													<div class="panel panel-info">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_3">
															3. Vacunas </a>
															</h4>
														</div>
														<div id="accordion1_3" class="panel-collapse collapse">
															<div class="panel-body">
																 <p align="justify">
																 Vacúnelo según le indique su Veterinario. La vacunación, en cierto modo, depende de la incidencia de las enfermedades infecto-contagiosas en su área de residencia. Por el mismo motivo, si ud. piensa mudarse o transladar a su mascota a otro sitio (por ejemplo al ir de vacaciones), consulte a su Veterinario acerca de la necesidad de agregar alguna/s vacuna/s.
																 </br></br>
																 Tenga en cuenta que existen enfermedades que su mascota puede transmitirle (Zoonosis): Leptospirosis, Rabia, Salmonelosis, Colibacilosis, Tuberculosis, Tiña, Toxoplasmosis, Sarna Sarcóptica, Dipyllidium, etc.
																 </p>
															</div>
														</div>
													</div>
													<div class="panel panel-default">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_4">
															4. Visitas al veterinario </a>
															</h4>
														</div>
														<div id="accordion1_4" class="panel-collapse collapse">
															<div class="panel-body">
																 <p align="justify">
																 Visite al menos 2 veces al año a su Veterinario para realizarle un chequeo; muchas enfermedades, diagnosticadas a tiempo, tienen mejor pronóstico.
																 </br></br>
																 Realícele un coproparasitológico (análisis de materia fecal para comprobar la existencia y tipo de parásitos en el tracto gastrointestinal) cada 4 a 6 meses. Esto es mejor que desparasitar “porque sí”.
																 </p>
															</div>
														</div>
													</div>
													<div class="panel panel-info">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_5">
															5. Tratamientos y medicamentos </a>
															</h4>
														</div>
														<div id="accordion1_5" class="panel-collapse collapse">
															<div class="panel-body">
																 <p align="justify">
																 No medique a su mascota por su cuenta: muchos medicamentos que ud. usa pueden ser dañinos para su mascota.
																 </br></br>
																 Realice los tratamientos de la manera que son indicados por su veterinario: ignore los comentarios de sus vecinos, familiares, paseadores de perros, criadores, etc. Es el Veterinario quien está debidamente capacitado y posee la experiencia necesaria para cuidar la salud de su mascota.
																 </br></br>
																 Nunca termine un tratamiento antes de lo establecido: es el Veterinario quien da de alta a su mascota.
																 </p>
															</div>
														</div>
													</div>
													<div class="panel panel-default">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_6">
															6. Castrado </a>
															</h4>
														</div>
														<div id="accordion1_6" class="panel-collapse collapse">
															<div class="panel-body">
																<p align="justify">
																 Si no piensa cruzar a su mascota, lo mejor es castrarla a edad temprana. No es cierto que necesitan tener primero una cría. Esto evita problemas de comportamiento, preñeces indeseadas, transmisión de enfermedades venéreas y algunas patologías reproductivas (por ejemplo piómetra, quistes/tumores ováricos, etc.); también disminuye la incidencia de ciertas patologías relacionadas (por ej., tumor de mamas, problemas prostáticos, etc.).
																</p>
															</div>
														</div>
													</div>
													<div class="panel panel-info">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_7">
															7. Adopción </a>
															</h4>
														</div>
														<div id="accordion1_7" class="panel-collapse collapse">
															<div class="panel-body">
																 <p align="justify">
																 RECUERDE QUE ADOPTAR UNA MASCOTA IMPLICA UNA RESPONSABILIDAD DE POR VIDA, Y QUE ELLA NECESITARÁ DE CUIDADOS, ALIMENTACIÓN, ALOJO Y ATENCIÓN VETERINARIA.
																</p>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div id="tab_2" class="tab-pane">
												<div id="accordion2" class="panel-group">
													<div class="panel panel-warning">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_1">
															1. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>
															</h4>
														</div>
														<div id="accordion2_1" class="panel-collapse collapse in">
															<div class="panel-body">
																<p>
																	 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
																</p>
																<p>
																	 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
																</p>
															</div>
														</div>
													</div>
													<div class="panel panel-danger">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_2">
															2. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>
															</h4>
														</div>
														<div id="accordion2_2" class="panel-collapse collapse">
															<div class="panel-body">
																 Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
															</div>
														</div>
													</div>
											
												</div>
											</div>
											<div id="tab_3" class="tab-pane">
												<div class="portlet box red">
													<div class="portlet-title">
														<div class="caption">
															<i class="fa fa-medkit"></i>Prescripción
														</div>
														<div class="tools">
															<a href="javascript:;" class="collapse">
															</a>
														</div>
													</div>
													<div class="portlet-body form">
														<form id="cliente-form" action="#" class="horizontal-form">
															<div class="form-body">
																	<div class="alert alert-danger display-hide">
																	<button class="close" data-close="alert"></button>
																		Por favor revise los campos que tienen error.
																	</div>
																	<div class="alert alert-success display-hide">
																		<button class="close" data-close="alert"></button>
																		Your form validation is successful!
															</div>
															<div class="form-body">
																<h3 class="form-section">Patología y medicamentos.</h3>	
															<div id="div_info_medicamentos">										<!-- BEGIN-->
																<div class="row info_medicamentos">
																	<div class="col-md-6">
																		<div class="form-group">
																			<label class="control-label">Patología<span class="required"> * </span></label>
																			<div class="input-icon right">
																					<i class="fa"></i>
																					<input type="text" id="patologia" name="patologia" class="form-control" placeholder="Patología">
																				</div>
																			<span class="help-block">
																			 </span>
																		</div>
																	</div>
																	<!--/span-->
																	<div class="col-md-6">
																		<div class="form-group">
																			<label class="control-label">Medicamento<span class="required"> * </span></label>
																			<div class="input-icon right">
																					<i class="fa"></i>
																					<input type="text" id="medicamento" name="medicamento" class="form-control" placeholder="Medicamento">
																				</div>
																			<span class="help-block">
																			 </span>
																		</div>
																	</div>
																	<!--/span-->
																</div>									
																<div class="row info_medicamentos">
																	<div class="col-md-4">
																		<div class="form-group">
																			<label class="control-label">Frecuencia<span class="required"> * </span></label>
																			<select class="form-control sel_tipo_contacto">
																				<option value="1">1 vez al día.</option>
																				<option value="2">2 vez al día.</option>	
																				<option value="3">3 vez al día.</option>
																				<option value="4">4 vez al día.</option>
																				<option value="5">Cuando sea necesario.</option>
																			</select>
																			<span class="help-block">
																			 </span>
																		</div>
																	</div>
																	<div class="col-md-4">
																		<div class="form-group">
																			<label class="control-label">Dosis<span class="required"> * </span></label>
																			<div class="input-icon right">
																					<i class="fa"></i>
																					<input type="text" id="dosis" name="dosis" class="form-control" placeholder="Dosis">
																				</div>
																			<span class="help-block">
																			 </span>
																		</div>
																	</div>
																	<div class="col-md-4">
																		<div class="form-group">
																			<label class="control-label">Periodo<span class="required"> * </span></label>
																			<div class="input-icon right">
																					<i class="fa"></i>
																					<input type="text" id="periodo" name="periodo" class="form-control periodo" placeholder="Periodo">
																				</div>
																			<span class="help-block">
																			 </span>
																		</div>
																	</div>
																</div>
															</div>
												<div class="row">
													<div class="col-md-6">
														<button onclick="agregar_info_patologia_medicamentos();" type="button" class="btn green"><i class="fa fa-plus"></i> Agregar</button>
													</div>
												</div>	
											</div>
											<div class="form-actions right">

												<button type="button" id="btnRegistrarPatologiaMedicamentos" class="btn blue"><i class="fa fa-check"></i> Guardar</button>
											</div>
										</form>
										<!-- END FORM  CLIENTE-->
									
									</div>
								</div>
						
				</div>
												
												
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--end tab-pane-->
						</div>
					</div>
					<!--END TABS-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
	<!-- BEGIN QUICK SIDEBAR -->
	<a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-close"></i></a>
	<div class="page-quick-sidebar-wrapper">
		<div class="page-quick-sidebar">
			<div class="nav-justified">
				<ul class="nav nav-tabs nav-justified">
					<li class="active">
						<a href="#quick_sidebar_tab_1" data-toggle="tab">
						Users <span class="badge badge-danger">2</span>
						</a>
					</li>
					<li>
						<a href="#quick_sidebar_tab_2" data-toggle="tab">
						Alerts <span class="badge badge-success">7</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						More<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu pull-right" role="menu">
							<li>
								<a href="#quick_sidebar_tab_3" data-toggle="tab">
								<i class="icon-bell"></i> Alerts </a>
							</li>
							<li>
								<a href="#quick_sidebar_tab_3" data-toggle="tab">
								<i class="icon-info"></i> Notifications </a>
							</li>
							<li>
								<a href="#quick_sidebar_tab_3" data-toggle="tab">
								<i class="icon-speech"></i> Activities </a>
							</li>
							<li class="divider">
							</li>
							<li>
								<a href="#quick_sidebar_tab_3" data-toggle="tab">
								<i class="icon-settings"></i> Settings </a>
							</li>
						</ul>
					</li>
				</ul>
				
			</div>
		</div>
	</div>
	<!-- END QUICK SIDEBAR -->
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
<script type="text/javascript" src="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
    Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	QuickSidebar.init(); // init quick sidebar
	Demo.init(); // init demo features	
});
function agregar_info_patologia_medicamentos(){
		$('#div_info_medicamentos').append('<div class="row info_medicamentos">'
													+ '<div class="col-md-6 col-xs-12">'
													+ '		<div class="form-group">'
													+ '			<label class="control-label">Patología<span class="required"> * </span></label>'
													+ '			<input type="text" id="patologia" name="patologia" class="form-control" placeholder="Patología">'
													+ '		</div>'
												
													+ '	</div>'
													+ ' <div class="col-md-6 col-xs-12">'
													+ '		<div class="form-group">'
													+ '			<label class="control-label">Medicamento<span class="required"> * </span></label>'
													+ '			<input type="text" id="medicamento" name="medicamento" class="form-control" placeholder="Medicamento">'
													+ '		</div>'
													+ '	</div>'
													+ '		<div class="col-md-3 col-xs-12">'
													+ '			<div class="form-group">'
													+ '				<label class="control-label">Frecuencia<span class="required"> * </span></label>'
													+ '				<select class="form-control sel_tipo_contacto">'
													+ '					<option value="1">1 vez al día.</option>'
													+ '					<option value="2">2 vez al día.</option>'	
													+ '					<option value="3">3 vez al día.</option>'
													+ '					<option value="4">4 vez al día.</option>'
													+ '					<option value="5">Cuando sea necesario.</option>'
													+ '				</select>'
													+ '			</div>'
													+ '		</div>'
													
													+ '	<div class="col-md-3 col-xs-12">'
													+ '		<div class="form-group">'
													+ '			<label class="control-label">Dosis<span class="required"> * </span></label>'
													+ '			<input type="text" id="dosis" name="dosis" class="form-control dosis" placeholder="Dosis">'
													+ '		</div>'
													+ '	</div>'
								
													+ '		<div class="col-md-3 col-xs-9">'
													+ '			<div class="form-group">'
													+ '				<label class="control-label">Periodo<span class="required"> * </span></label>'
													+ '				<input type="text" id="periodo" name="periodo" class="form-control periodo" 		placeholder="Periodo">'
													+ '			</div>'
													+ '		</div>'
												
													
													+ '	<div class="col-md-2 col-xs-3">'
													+ '		<button style="margin-top:25px;" type="button" class="del_info_medicamentos btn red"><i class="fa fa-times"></i></button>'
													+ '	</div>'
													
										+ '	</div>'	);
											
		$('.del_info_medicamentos').click(function(){
			$(this).parent().parent().remove();
		});
	}
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>