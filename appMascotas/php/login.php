<?php
session_start();
	require_once 'connectbd.php';
	$db = new DB_Connect();
	$conn = $db->connect();
	if(isset($_POST["usuario"])&&isset($_POST["password"])){
		$query = "select count(*) as cuenta,id, id_rol, primer_nombre, primer_apellido, id_empresa from usuario where nombre_usuario = '".$_POST["usuario"]."' and password = '".md5($_POST["password"])."'";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_array($result);
		$cuenta = $row['cuenta'];
		if($cuenta == 1){
			$_SESSION['user_authorized'] = true;
			$_SESSION['id'] = $row['id'];
			$_SESSION['rol'] = $row['id_rol'];
			$_SESSION['nombre'] = $row['primer_nombre'];
			$_SESSION['apellido'] = $row['primer_apellido'];
			$_SESSION['id_empresa'] = $row['id_empresa'];

			
			$cookie_name = "id";
			// Se borran cookies anteriores
			if(isset($_COOKIE[$cookie_name])) {
				setcookie($cookie_name, "", time() - 3600, "/"); 
			}
			$cookie_msg = "";
			$recor = 'false';
			if(isset($_POST["recuerdame"])){
			  if($_POST["recuerdame"] == "true"){
				$recor = 'true';
				$cookie_value = $row['id'];
				// Se crea Cookie que dure un mes.
				setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
				
				if(!count($_COOKIE) > 0) {
					$cookie_msg = ". Cookies are disabled.";
				}
			  }
			}
			
			
			
			$codigo = 1;
			$mensaje = "exito. Recordado: ".$recor.$cookie_msg;
		}else{
			$codigo = 98;
			$mensaje = "Usuario/Contrasena invalidos";
		}
	}else{
		$codigo = 99;
		$mensaje = "Error desconocido. ".$cookie_msg;
	}
	printf(json_encode(array("codigo" => $codigo,"mensaje" => $mensaje)));
?>