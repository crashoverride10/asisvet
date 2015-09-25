<?php
	session_start();
	require_once 'connectbd.php';
	$db = new DB_Connect();
	$conn = $db->connect();
		$query = "insert into desparacitacion(id_mascota, fecha_desparacitacion, producto, proxima_desparacitacion)
		values(".$_POST["id_mascota"].",'".$_POST["fecha"]."','".$_POST["producto"]."','".$_POST["proxima_fecha"]."')";
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