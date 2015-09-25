<?php
	session_start();
	require_once 'connectbd.php';
	$db = new DB_Connect();
	$conn = $db->connect();
		$query = "insert into proveedor(nombre)
		values('".$_POST["nombre"].")";
		$result = mysqli_query($conn,$query);
		
//<!-- MYSQLI_INSERT_ID() entrega el autonumerico de la ultima inserción -->

		$query_max_id = "select max(id) as id_proveedor from proveedor";
		$result_max_id = mysqli_query($conn,$query_max_id); 
		$row = mysqli_fetch_array($result_max_id);
		$id_usuario = $row['id_usuario'];
		
		$i=-1;
		foreach($_POST['vec_tipo_con'] as $tipo_con){
			$i += 1;
			if($tipo_con != "" and $_POST['vec_info_con'][$i] != ""){
				$query_contactos = "insert into proveedor_det_comunicacion(id_proveedor, id_tipo_comunicacion, valor)
				values ( ".$row['id_proveedor'].",'".$tipo_con."','".$_POST['vec_info_con'][$i]."')";
				$result_contactos = mysqli_query($conn,$query_contactos);
			}
		}
		
		

		if($result && $result_contactos){
				$codigo = 1;//exito
				$mensaje = "Los datos fueron guardados correctamente.";
		}else{
			$codigo = 98;
			$mensaje = "Error de insercion. ".$query;//.$query;	
		}
	printf(json_encode(array("codigo" => $codigo,"mensaje" => $mensaje)));
	

?>