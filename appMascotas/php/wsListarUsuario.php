<?php
	session_start();
	require_once 'connectbd.php';
	$db = new DB_Connect();
	$conn = $db->connect();
		$query = "select id, concat(cedula,' - ',primer_nombre,' ',primer_apellido) as cedula from usuario where cedula like '%".$_GET['term']."%' limit 10";
		$result = mysqli_query($conn,$query);
		$respuesta = array();
		$return_arr = array();
		while($row = mysqli_fetch_array($result)){
			$respuesta['id'] = $row['id'];
			$respuesta['text'] = $row['cedula'];
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