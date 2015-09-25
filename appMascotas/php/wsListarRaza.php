<?php
	session_start();
	require_once 'connectbd.php';
	$db = new DB_Connect();
	$conn = $db->connect();
		$query = "select id, nombre from raza where nombre like '%".$_GET['term']."%' and id_especie = ".$_GET['especie']." limit 15";
		$result = mysqli_query($conn,$query);
		$respuesta = array();
		$return_arr = array();
		while($row = mysqli_fetch_array($result)){
			$respuesta['id'] = $row['id'];
			$respuesta['text'] = $row['nombre'];
			array_push($return_arr,$respuesta);
		}
		if($result){
				$codigo = 1;//exito
				$mensaje = "Ok";
		}else{
			$codigo = 98;
			$mensaje = "Error".$query;
		}
	printf(json_encode(array("results" => $return_arr)));
	

?>