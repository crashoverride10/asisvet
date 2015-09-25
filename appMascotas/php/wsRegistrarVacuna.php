<?php
	session_start();
	require_once 'connectbd.php';
	$db = new DB_Connect();
	$conn = $db->connect();
		$query = "insert into vacunas(id_mascota, enfermedad, lote, fecha_vacunacion)
		values(".$_POST["id_mascota"].",'".$_POST["enfermedad"]."','".$_POST["lote"]."','".$_POST["fecha_vacunacion"]."')";
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