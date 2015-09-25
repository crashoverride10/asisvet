<?php
	session_start();
	require_once 'connectbd.php';
	$db = new DB_Connect();
	$conn = $db->connect();
		$query = "update usuario set nombre = '".$_POST["nombres"]."', apellido = '".$_POST["apellidos"]."', celular = '".$_POST["celular"]."', email = '".$_POST["email"]."', telefono = '".$_POST["telefono"]."', direccion = '".$_POST["direccion"]."' where id = ".$_SESSION['id'];
		$result = mysqli_query($conn,$query);
		if($result){
				$codigo = 1;//exito
				$mensaje = "Los datos fueron guardados correctamente.";
				
			$_SESSION['nombre'] = $_POST["nombres"];
			$_SESSION['apellido'] = $_POST["apellidos"];
			$_SESSION['email'] = $_POST["email"];
			$_SESSION['telefono'] = $_POST["telefono"];
			$_SESSION['direccion'] = $_POST["direccion"];
		}else{
			$codigo = 98;
			$mensaje = "Error de actualizacion. ".$query;
		}
	printf(json_encode(array("codigo" => $codigo,"mensaje" => $mensaje)));
	

?>