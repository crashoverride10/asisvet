<?php
	session_start();
	require_once 'connectbd.php';
	$db = new DB_Connect();
	$conn = $db->connect();
		$codigo = 1;//exito
		$mensaje = "Los datos fueron guardados correctamente.";
	if(isset($_POST['id_rol']) && isset($_POST['id_modulo']) && isset($_POST['evento'])){
		if($_POST["evento"] == "select_node"){
			//$query = "insert into rol_modulo(id_rol, id_modulo) values(".$_POST["id_rol"].",".$_POST["id_modulo"].")";
			$query ="CALL cambiar_permisos('insertar',".$_POST["id_rol"].",".$_POST["id_modulo"].");";
		}else if($_POST["evento"] == "deselect_node"){
			//$query = "delete from rol_modulo where id_rol = ".$_POST["id_rol"]." and id_modulo = ".$_POST["id_modulo"];
			$query ="CALL cambiar_permisos('borrar',".$_POST["id_rol"].",".$_POST["id_modulo"].");";
		}else{
			$codigo = 99;
			$mensaje = "Error desconocido.";
		}
		if($codigo == 1){
			$result = mysqli_query($conn,$query);
			if(!$result){
				$codigo = 98;
				$mensaje = "Error de insercion. ".$query;//.$query;	
			}
		}
	}else{
		$codigo = 97;
		$mensaje = "Error. Faltan parametros.";
	}
	printf(json_encode(array("codigo" => $codigo,"mensaje" => $mensaje)));
	

?>