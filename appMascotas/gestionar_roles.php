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
<title><?php echo TITULO_APP;?> | Gestionar roles</title>
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
<link rel="stylesheet" type="text/css" href="../assets/global/plugins/jstree/dist/themes/default/style.min.css"/>
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
			Gestión de roles
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.php">Inicio</a>
						<i class="fa fa-angle-right"></i>
					</li>
				</ul>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
							<div class="tabbable tabs-left">
								<ul class="nav nav-tabs">
								<?php
									$rol_items = Array();
									$query_rol = "select id, nombre from rol where id_empresa = ".$_SESSION['id_empresa'];
									$result_rol = mysqli_query($conn,$query_rol);
									while($row_rol = mysqli_fetch_array($result_rol)){
										echo '<li>
											<a href="#tab_'.$row_rol['id'].'" data-toggle="tab">
											'.$row_rol['nombre'].' </a>
										</li>';
										$rol_items[] = $row_rol;
									}
								
								echo '</ul>
								<div class="tab-content">';
								foreach($rol_items as $key => $r_item){
									echo '<div class="tab-pane fade" id="tab_'.$r_item['id'].'">
										<div class="col-md-9">
											<div id="tree_'.$r_item['id'].'" class="tree-demo"></div>
										</div>
									</div>';
								}
								?>
								</div>
							</div>
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
<script src="../assets/global/plugins/jstree/dist/jstree.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/demo.js" type="text/javascript"></script>

<?php
	function menu_item($padre,$menu_items,$lvl,$rol_id){
		$c = 0;
		foreach($menu_items as $m_item){
			if($m_item['id_padre'] == $padre and $m_item['id_rol'] == $rol_id){
			$c += 1;
						if($m_item['hijos']){
						if($c>=2){
								echo ",";
							}
						echo '{
						"id_modulo": "'.$m_item['id'].'",
						"id_rol": "'.$m_item['id_rol'].'",
                        "text": "'.$m_item['nombre'].'",
                        "children": [';
                            menu_item($m_item['id'],$menu_items,$lvl+1,$rol_id);
                        echo ']
                    }';
						}else{
							if($c>=2){
								echo ",";
							}
							echo '{"id_modulo": "'.$m_item['id'].'",
							"id_rol": "'.$m_item['id_rol'].'",
							"text": "'.$m_item['nombre'].'"';
							if($m_item['activo'] != '0'){
								echo ',
								"state": {
									"selected": true
								}
								';
							}
							echo '}';
						}
			}
		}
	}

?>

<script>
      jQuery(document).ready(function() {
         Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features

	<?php
		$menu_items = Array();
		$query = "select m.id, id_padre, m.nombre, ro.id as id_rol,
			(select count(*) from menu_item i
			where i.id_padre = m.id) as hijos,
            (select count(*) from rol_modulo
            where id_rol = ro.id and id_modulo = m.id) as activo
		from menu_item m
		cross join rol ro
		where ro.id_empresa = ".$_SESSION['id_empresa'];
		$result = mysqli_query($conn,$query);
		while($row = mysqli_fetch_array($result)){
			$menu_items[] = $row;
		}
		
		foreach($rol_items as $key => $r_item){
			echo '$("#tree_'.$r_item['id'].'").jstree({
				"plugins": ["wholerow", "checkbox", "types"],
				"core": {
					"themes" : {
						"responsive": false
					},    
					"data": [';
					
						menu_item('',$menu_items,1,$r_item['id']);
					
				echo ']
				},
				"types" : {
					"default" : {
						"icon" : "fa fa-folder icon-state-warning icon-lg"
					},
					"file" : {
						"icon" : "fa fa-file icon-state-warning icon-lg"
					}
				}
			});
			';
			//Manejar eventos de agregar/quitar permisos
			echo "$('#tree_".$r_item['id']."')
			  .on('changed.jstree', function (e, data) {
				cambiar_permisos(data.node.original.id_rol, data.node.original.id_modulo, data.action)
			  })
			  .jstree();";
		}
		?>
		
		function cambiar_permisos(id_rol, id_modulo, evento){
			$.ajax({
					type: "POST",
					url: 'php/wsCambiarPermisos.php',
					dataType: "json",
					data: {
						id_rol: id_rol,
						id_modulo: id_modulo,
						evento: evento
						}
					})
					.done(function(respuesta) {
						console.info(respuesta);
				});
		}
      });
   </script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>