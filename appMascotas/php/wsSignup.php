<?php
	require_once 'connectbd.php';
	require_once 'funciones.php';
	$func = new funciones();
	$db = new DB_Connect();
	$conn = $db->connect();
	if(isset($_POST["nombres"])&&isset($_POST["apellidos"])&&isset($_POST["email"])&&isset($_POST["pass"])&&isset($_POST["ref"])){
		$query_email = "select count(*) as cantidad from usuario where usuario = '".$_POST["email"]."'";
		$result_email= mysqli_query($conn,$query_email);
		$row_email = mysqli_fetch_array($result_email);
		if($row_email['cantidad'] == 0){
		$query = "INSERT INTO usuario (usuario,password,nombre,apellido,email,invito) values('".$_POST["email"]."','".$_POST["pass"]."','".$_POST["nombres"]."','".$_POST["apellidos"]."','".$_POST["email"]."',".$_POST["ref"].")";
		$result = mysqli_query($conn,$query);
		if($result){
				$codigo = 1;//exito
				$mensaje = "Su registro se ha completado de manera exitosa.<br>
							Verifique su correo para confirmar su registro.<br>
							(Si no le ha llegado, revise su bandeja de correo no deseado.)";
		}else{
			$codigo = 98;
			$mensaje = "Error de insercion. ".$query;
		}
	  }else{
		$codigo = 98;
		$mensaje = "El usuario ya existe";
	  }
	}else{
		$codigo = 99;
		$mensaje = "error desconocido";
	}
	printf(json_encode(array("codigo" => $codigo,"mensaje" => $mensaje)));
	

?>