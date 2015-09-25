<?php
	session_start();
	require_once 'connectbd.php';
	$db = new DB_Connect();
	$conn = $db->connect();
		$query = "insert into prescripciones(id_mascota, patologia, medicamento, frecuencia, dosis, periodo)
		values(".$_POST["id_mascota"].",'".$_POST["patologia"]."','".$_POST["medicamento"]."','".$_POST["txtFrecuencia"]."','".$_POST["dosis"]."','".$_POST["periodo"]."')";
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