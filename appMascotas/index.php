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
<title><?php echo TITULO_APP;?> | Inicio</title>
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
<!-- BEGIN THEME STYLES -->
<link href="../assets/global/css/components.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="../assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="../assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
<link href="../assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="../assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet"/>
<!-- END PAGE LEVEL STYLES -->
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
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					  <div class="portlet box green-meadow calendar">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-calendar"></i>Calendario
							</div>
						</div>
						<div class="portlet-body">
							<div class="row">
								<div class="col-md-3 col-sm-12">
									<!-- BEGIN DRAGGABLE EVENTS PORTLET-->
									<h3 class="event-form-title">Eventos</h3>
									<div id="external-events">
										<form class="inline-form">
											<input type="text" value="" class="form-control" placeholder="Nombre del evento" id="event_title"/><br/>
											<select class="form-control" id="selTipoEvento">
											<?php
												$query = "select nombre, color from plantilla_evento";
												$result = mysqli_query($conn,$query);
												while($row = mysqli_fetch_array($result)){
													echo "<option value='".$row['color']."'>".$row['nombre']."</option>";
												}
											?>
											</select><br>
											<a href="javascript:;" id="event_add" class="btn btn-success">
											<i class="fa fa-plus"></i> Crear </a>
										</form>
										<hr/>
										<div id="event_box">
										</div>
										<label for="drop-remove">
										<hr class="visible-xs"/>
									</div>
									<!-- END DRAGGABLE EVENTS PORTLET-->
								</div>
								<div class="col-md-9 col-sm-12">
									<div id="calendar" class="has-toolbar">
									</div>
								</div>
							</div>
							<!-- END CALENDAR PORTLET-->
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
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="../assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="../assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="../assets/admin/pages/scripts/calendar.js"></script>

<?php
	$query = "select id, nombre, date_format(fecha_inicio,'%m/%d/%Y %h:%i:%s') as fecha_inicio, date_format(fecha_fin,'%m/%d/%Y %h:%i:%s') as fecha_fin, repite, todo_el_dia, color
		from evento
		where estado = 'A' and id_empresa = ".$_SESSION['id_empresa'];
		$result = mysqli_query($conn,$query);
?>

<script>
      jQuery(document).ready(function() {
         Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
	//Calendar.init();
	
	function ajaxEditarEvento(operacion,id,start,end,todoElDia){ // operacion:insert,update,resize
				var todo_el_dia = 'N';
				if(todoElDia){
					todo_el_dia = 'S';
				}
				$.ajax({
					type: "POST",
					url: 'php/wsRegistrarEvento.php',
					dataType: "json",
					data: {
						operacion: operacion,
						id: id,
						start: start,
						end: end,
						todo_el_dia:todo_el_dia
						}
					})
					.done(function(respuesta) {
						console.log(respuesta);
				});
				}
	
	function fecha_sql(fechaJs){
		if(fechaJs == null){
			return null;
		}else{
			return fechaJs.getFullYear()+'-'+(fechaJs.getMonth()+1)+'-'+fechaJs.getDate()+' '+fechaJs.getHours()+':'+fechaJs.getMinutes()+':'+fechaJs.getSeconds();
		}
	}
	
	if (!jQuery().fullCalendar) {
                return;
            }
			var h = {};
           
                 if ($('#calendar').parents(".portlet").width() <= 720) {
                    $('#calendar').addClass("mobile");
                    h = {
                        left: 'title, prev, next',
                        center: '',
                        right: 'today,month,agendaWeek,agendaDay'
                    };
                } else {
                    $('#calendar').removeClass("mobile");
                    h = {
                        left: 'title',
                        center: '',
                        right: 'prev,next,today,month,agendaWeek,agendaDay'
                    };
                }
            
            var initDrag = function (el) {
                // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim(el.text()) // use the element's text as the event title
                };
                // store the Event Object in the DOM element so we can get to it later
                el.data('eventObject', eventObject);
                // make the event draggable using jQuery UI
                el.draggable({
                    zIndex: 999,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0 //  original position after the drag
                });
            }

            var addEvent = function (title) {
                title = title.length == 0 ? "Evento sin título" : title;
                var html = $('<div c="' + $('#selTipoEvento').val() + '" class="external-event label label-default">' + title + '</div>');
                jQuery('#event_box').append(html);
                initDrag(html);
            }

            $('#external-events div.external-event').each(function () {
                initDrag($(this));
            });

            $('#event_add').unbind('click').click(function () {
                var title = $('#event_title').val();
                addEvent(title);
            });

            //predefined events
            $('#event_box').html("");

            $('#calendar').fullCalendar('destroy'); // destroy the calendar
			var x;
            $('#calendar').fullCalendar({ //re-initialize the calendar
                header: h,
                defaultView: 'month', // change default view with available options from http://arshaw.com/fullcalendar/docs/views/Available_Views/ 
                slotMinutes: 15,
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                drop: function (date, allDay) { // this function is called when something is dropped

                    // retrieve the dropped element's stored Event Object
                    var originalEventObject = $(this).data('eventObject');
                    // we need to copy it, so that multiple events don't have a reference to the same object
                    var copiedEventObject = $.extend({}, originalEventObject);
					
					copiedEventObject.start = date;
                    copiedEventObject.allDay = allDay;
					copiedEventObject.className = $(this).attr("data-class");
					var colorEvento = $(this).attr("c");
					copiedEventObject.backgroundColor = Metronic.getBrandColor(colorEvento);
					
					var todo_el_dia = 'N';
					if(allDay){
						todo_el_dia = 'S';
					}
					$.ajax({
					type: "POST",
					url: 'php/wsRegistrarEvento.php',
					dataType: "json",
					data: {
						operacion: 'insert',
						id: 0,
						nombre: copiedEventObject.title,
						start: fecha_sql(date),
						color: colorEvento,
						todo_el_dia: todo_el_dia
						}
					})
					.done(function(respuesta) {
					  if(respuesta.codigo == 1){
						copiedEventObject.id = respuesta.id;
						// render the event on the calendar
						$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
						console.log(respuesta);
					  }
					});

					$(this).remove();
					console.info("Drop de fuera " + copiedEventObject.id + ". fecha:" + copiedEventObject.start + ". fin:" + copiedEventObject.end);
                },
				  eventClick: function(calEvent, jsEvent, view) {
					console.info("Click - id:" + calEvent.id + ". fecha:" + calEvent.start + ". fin:" + calEvent.end);
				},
				  eventDrop: function(event, jsEvent, x, view) {
					ajaxEditarEvento('update',event.id,fecha_sql(event.start),fecha_sql(event.end),event.allDay);
					console.info("Drag - id:" + event.id + ". fecha:" + event.start);
				},
				  eventResize: function(event, delta, revertFunc) {
					ajaxEditarEvento('update',event.id,fecha_sql(event.start),fecha_sql(event.end),event.allDay);
					console.info("Resize - id:" + event.id + ". fecha:" + event.start + ". fin:" + event.end);
				},
                events: [
				<?php
					$i=0;
					while($row = mysqli_fetch_array($result)){
						$i += 1;
						if($i > 1){
						echo ",";
						}
						echo "{
							id: '".$row['id']."',
							title: '".$row['nombre']."',
							start: new Date('".$row['fecha_inicio']."'),
							end: new Date('".$row['fecha_fin']."'),
							backgroundColor: Metronic.getBrandColor('".$row['color']."')";
						if($row['todo_el_dia'] != "S"){
							echo ",allDay:false";
						}
						echo "}";
					}
				?>
                ]
            });
	
      });
   </script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>