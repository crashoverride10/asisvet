<?php
	session_start();
	require_once 'connectbd.php';
	$db = new DB_Connect();
	$conn = $db->connect();
		$query = "insert into control_peso(id_mascota, fecha_control_peso, peso_kg)
		values(".$_POST["id_mascota"].",'".$_POST["fecha_control"]."','".$_POST["peso_kg"]."')";
		$result = mysqli_query($conn,$query);

		if($result){
				$codigo = 1;//exito
				$mensaje = "Los datos fueron guardados correctamente.";
		}else{
			$codigo = 98;
			$mensaje = "Error de insercion. ".$query;//.$query;	
		}
	printf(json_encode(array("codigo" => $codigo,"mensaje" => $mensaje)));
	

?>