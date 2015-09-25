<?php
	session_start();
	$id_evento = 0;
	require_once 'connectbd.php';
	require_once 'funciones.php';
	$func = new funciones();
	$db = new DB_Connect();
	$conn = $db->connect();
	switch($_POST["operacion"]){
	  case 'insert':
		
		if($_POST["todo_el_dia"] == 'N'){
			$valor_fecha_fin = "DATE_ADD('".$_POST["start"]."', INTERVAL 2 HOUR)";
		}else{
			$valor_fecha_fin = "'".$_POST["start"]."'";
		}
		$query = "INSERT INTO evento (nombre,fecha_inicio,fecha_fin,todo_el_dia,color,solo_dias_habiles,repite,id_usuario, id_empresa) values('".$_POST["nombre"]."','".$_POST["start"]."',".$valor_fecha_fin.",'".$_POST["todo_el_dia"]."','".$_POST["color"]."','S','N',".$_SESSION['id'].",".$_SESSION['id_empresa'].")";
		$result = mysqli_query($conn,$query);
		if($result){
				$codigo = 1;//exito
				$mensaje = "OK";
				$id_evento = mysqli_insert_id($conn);
		}else{
			$codigo = 98;
			$mensaje = "Error de insercion.";
		}
	   break;
	   case 'update':	   
		if($_POST["todo_el_dia"] == 'N' and $_POST["end"] != ""){
			$valor_fecha_fin = $_POST["end"];
		}else{
			$valor_fecha_fin = $_POST["start"];
		}
		$query = "update evento set fecha_inicio = '".$_POST["start"]."', fecha_fin = '".$valor_fecha_fin."', todo_el_dia = '".$_POST["todo_el_dia"]."' where id = ".$_POST["id"];
		$result = mysqli_query($conn,$query);
		if($result){
				$codigo = 1;//exito
				$mensaje = "OK";
				$id_evento = mysqli_insert_id($conn);
		}else{
			$codigo = 98;
			$mensaje = "Error de actualizacion.";
		}
	   break;
	}
	printf(json_encode(array("codigo" => $codigo,"mensaje" => $mensaje, "id_evento" => $id_evento)));
?>