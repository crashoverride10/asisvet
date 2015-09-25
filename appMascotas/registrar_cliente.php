<?php
	session_start();
	require_once 'php/constantes.php';
   	require_once 'php/funciones.php';
	$func = new funciones();
	$func->seguridad();
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
<title><?php echo TITULO_APP;?> | Registrar cliente</title>
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
<link rel="stylesheet" type="text/css" href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="../assets/global/css/components.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="../assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="../assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
<link href="../assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->



<!-- BEGIN GLOBAL MANDATORY STYLES --
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES --
<link href="../assets/global/css/components.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="../assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="../assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
<link href="../assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<!-- BEGIN PAGE LEVEL STYLES --
<link href="../assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet"/>
<!-- END PAGE LEVEL STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>

<style type="text/css">
	textarea {
    resize: none;
} 
</style>

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
<body class="page-header-fixed page-quick-sidebar-over-content page-header-fixed-mobile page-footer-fixed1">
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
			Registrar cliente
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.php">Inicio</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Registrar cliente</a>
					</li>
				</ul>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
				
				<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-user"></i>Registrar cliente
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM CLIENTE-->
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
												<h3 class="form-section">Información personal</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Primer nombre<span class="required"> * </span></label>
															<div class="input-icon right">
																	<i class="fa"></i>
																	<input type="text" id="primer_nombre" name="primer_nombre" class="form-control" placeholder="Nombre">
																</div>
															<span class="help-block">
															 </span>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Segundo nombre</label>
															<input type="text" id="segundo_nombre" name="segundo_nombre" class="form-control" placeholder="Nombre">
															<span class="help-block">
															 </span>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Primer apellido<span class="required"> * </span></label>
															<div class="input-icon right">
																	<i class="fa"></i>
																	<input type="text" id="primer_apellido" name="primer_apellido" class="form-control" placeholder="Apellido">
																</div>
															<span class="help-block">
															 </span>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Segundo apellido<span class="required"> * </span></label>
															<div class="input-icon right">
																	<i class="fa"></i>
																	<input type="text" id="segundo_apellido" name="segundo_apellido" class="form-control" placeholder="Apellido">
																</div>
															<span class="help-block">
															 </span>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Documento de identidad<span class="required"> * </span></label>
															<select id="txtTipoDeDocumento" name="txtTipoDeDocumento" class="form-control">
																<option value="1">Cédula de ciudadanía</option>
																<option value="2">Tarjeta de identidad</option>
																<option value="3">NIT</option>
																<option value="4">RUT</option>
																<option value="5">Pasaporte </option>
																<option value="6">Cédula de extranjeria</option>
															</select>
															<span class="help-block">
															 </span>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Número de documento<span class="required"> * </span></label>
															<div class="input-icon right">
																	<i class="fa"></i>
																	<input type="text" id="numeroDeDocumento" name="numeroDeDocumento" class="form-control" placeholder="Número">
																</div>
															<span class="help-block">
															 </span>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Nombre de usuario<span class="required"> * </span></label>
															<div class="input-icon right">
																	<i class="fa"></i>
																	<input type="text" id="nombre_usuario" name="nombre_usuario" class="form-control" placeholder="Nombre de usuario">
																</div>
															<span class="help-block">
															 </span>
														</div>
													</div>
													<!--/span-->
													
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Contraseña<span class="required"> * </span></label>
															<div class="input-icon right">
																	<i class="fa"></i>
																	<input type="password" id="password" name="password" class="form-control" placeholder="Contraseña">
																</div>
															<span class="help-block">
															 </span>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Repetir contraseña<span class="required"> * </span></label>
															<div class="input-icon right">
																	<i class="fa"></i>
																	<input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Repetir contraseña">
																</div>
															<span class="help-block">
															 </span>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
				
												<!--/row-->
											<!--Información de contacto-->	
											<div id="div_info_contacto">
												<h3 class="form-section">Información de contacto</h3>											
												<div class="row info_contacto">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Tipo<span class="required"> * </span></label>
															<select class="form-control sel_tipo_contacto">
																<option value="1">Teléfono</option>
																<option value="2">Dirección</option>	
																<option value="3">Móvil</option>
																<option value="4">Email</option>
																<option value="5">Fax</option>
															</select>
															<span class="help-block">
															 </span>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Contacto<span class="required"> * </span></label>
															<div class="input-icon right">
																	<i class="fa"></i>
																	<input type="text" class="form-control txt_info_contacto" name="txt_info_contacto" placeholder="Contacto">
																</div>
															<span class="help-block">
															 </span>
														</div>
													</div>
												</div>
											</div>
												<div class="row">
													<div class="col-md-6">
														<button onclick="agregar_info_contacto();" type="button" class="btn green"><i class="fa fa-plus"></i> Agregar</button>
													</div>
												</div>
												<!--/row-->
												
												
												
												<!--/row-->
													
											</div>
											<div class="form-actions right">

												<button type="button" id="btnRegistrarCliente" class="btn blue"><i class="fa fa-check"></i> Guardar</button>
											</div>
										</form>
										<!-- END FORM  CLIENTE-->
									
										</div>
									</div>
						
				</div>
			</div>
				
									
			<!-- VENTANA MODAL-->
						<a hidden id="abrirModal2" data-toggle="modal" href="#stack2"></a>
							<div id="stack2" class="modal fade" tabindex="-1">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 id="titulo_resultado" class="modal-title"></h4>
										</div>
										<div class="modal-body">
											<div class="row">
												<div class="col-md-12">
													<h4 id="mensaje_resultado"></h4>
													<p id="codigo_resultado"></p>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button id="cerrarModal2" type="button" data-dismiss="modal" class="btn yellow">Ok</button>
										</div>
									</div>
								</div>
							</div>
			
			<!-- END VENTANA MODAL-->
			
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
<script type="text/javascript" src="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script type="text/javascript" src="../assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script><!-- new-->
<script type="text/javascript" src="../assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script><!-- new-->
<!-- END PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="../assets/global/plugins/select2/select2.min.js"></script>
<script src="../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<!-- <script src="../assets/admin/pages/scripts/calendar.js"></script> -->
<script src="../assets/admin/pages/scripts/form-validation-registrarCliente.js"></script>
<script>
      jQuery(document).ready(function() {    
         Metronic.init(); // init metronic core components
		 Layout.init(); // init current layout
		 QuickSidebar.init(); // init quick sidebar
		 Demo.init(); // init demo features
	//	 Calendar.init();
		 FormValidation.init();
      });
	  
	  function agregar_info_contacto(){
		$('#div_info_contacto').append('<div class="row info_contacto">'
													+ '<div class="col-md-6 col-xs-12">'
													+ '	<div class="form-group">'
													+ '		<label class="control-label">Tipo<span class="required"> * </span></label>'
													+ '		<select class="form-control sel_tipo_contacto">'
													+ '			<option value="1">Teléfono</option>'
													+ '			<option value="2">Dirección</option>	'
													+ '			<option value="3">Móvil</option>'
													+ '			<option value="4">Email</option>'
													+ '			<option value="5">Fax</option>'
													+ '		</select>'
													+ '	</div>'
													+ '	</div>'
													+ '	<div class="col-md-4 col-xs-9">'
													+ '		<div class="form-group">'
													+ '			<label class="control-label">Contacto<span class="required"> * </span></label>'
													+ '				<div class="input-icon right">'
													+ '					<i class="fa"></i>'
													+ '					<input type="text" class="form-control txt_info_contacto" placeholder="Contacto">'
													+ '				</div>'
													+ '		</div>'
													+ '	</div>'
													+ '	<div class="col-md-2 col-xs-3">'
													+ '		<button style="margin-top:25px;" type="button" class="del_info_contacto btn red"><i class="fa fa-times"></i></button>'
													+ '	</div>'
											        + '	</div>');
											
		$('.del_info_contacto').click(function(){
			$(this).parent().parent().remove();
		});
	  }
	  	  
	  
	  function ajaxRegistrarUsuario(){
				var i = 0;
				var vec_tipo_con = [];
				$('.sel_tipo_contacto').each(function(){
					vec_tipo_con[i++] = $(this).val();
				});
				
				i = 0;
				var vec_info_con = [];
				$('.txt_info_contacto').each(function(){
					vec_info_con[i++] = $(this).val();
				});
				
				$.ajax({
					type: "POST",
					url: 'php/wsRegistrarUsuario.php',
					dataType: "json",
					data: {
						primer_nombre: $('#primer_nombre').val(),
						segundo_nombre: $('#segundo_nombre').val(),
						primer_apellido: $('#primer_apellido').val(),
						segundo_apellido: $('#segundo_apellido').val(),			
						tipoDeDocumento: $('#txtTipoDeDocumento').val(),
						numeroDeDocumento: $('#numeroDeDocumento').val(),
						nombre_usuario: $('#nombre_usuario').val(),
						constrasena: $('#password').val(),
						tipoDeUsuario: 4,
						vec_tipo_con: vec_tipo_con,
						vec_info_con: vec_info_con
						}
					})
					.done(function(respuesta) {
						if(respuesta.codigo == 1){
							$("#titulo_resultado").html("Exito");
							$("#mensaje_resultado").html(respuesta.mensaje);
							$("#codigo_resultado").html("");
							$("#abrirModal2").trigger('click');
							$("#cerrarModal2").click(function(){
					//			location.reload();
							});
						}else{
							$("#titulo_resultado").html("Ha ocurrido un error");
							$("#mensaje_resultado").html(respuesta.mensaje);
							$("#codigo_resultado").html("Codigo del error: " + respuesta.codigo);
							$("#abrirModal2").trigger('click');
						}
				});
				}
				
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
				
	
				 function ajaxRegistrarMascota(){
			
				$.ajax({
					type: "POST",
					url: 'php/wsRegistrarMascota.php',
					dataType: "json",
					data: {
						usuario: $('#txtCedula').val,
						nombre: $('#nombre').val(),
						color: $('#color').val(),
						fechaDeNacimiento: $('#fechaDeNacimiento').val(),
						peso_kg: $('#peso_kg').val(),			
						especie: $('#txtEspecie').val(),
						numeroDeDocumento: $('#numeroDeDocumento').val(),
						raza: $('#raza').val(),	
						alergias: $('#alergias').val(),		
						observaciones: $('#observaciones').val(),						
						sexo: $('#txtSexo').val(),
						}
					})
					.done(function(respuesta) {
						if(respuesta.codigo == 1){
							$("#titulo_resultado").html("Exito");
							$("#mensaje_resultado").html(respuesta.mensaje);
							$("#codigo_resultado").html("");
							$("#abrirModal2").trigger('click');
							$("#cerrarModal2").click(function(){
					//			location.reload();
							});
						}else{
							$("#titulo_resultado").html("Ha ocurrido un error");
							$("#mensaje_resultado").html(respuesta.mensaje);
							$("#codigo_resultado").html("Codigo del error: " + respuesta.codigo);
							$("#abrirModal2").trigger('click');
						}
				});
				}
				
				$('#btnUploadFoto').click(function(){
					$('#inputUploadFoto').trigger('click');
				});
				
   </script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>