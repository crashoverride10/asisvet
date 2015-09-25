<?php
	session_start();
	require_once 'connectbd.php';
	$db = new DB_Connect();
	$conn = $db->connect();
	
	if($_POST["id_usuario"]){
		$query = "update usuario set primer_nombre = '".$_POST["primer_nombre"]."', segundo_nombre = '".$_POST["segundo_nombre"]."', primer_apellido = '".$_POST["primer_apellido"]."', segundo_apellido = '".$_POST["segundo_apellido"]."', id_tipo_documento = '".$_POST["tipoDeDocumento"]."', cedula = '".$_POST["numeroDeDocumento"]."', id_rol = '".$_POST["tipoDeUsuario"]."' where id = $_POST[id_usuario]";
		$result = mysqli_query($conn,$query);
		
		$i=-1;
			foreach($_POST['vec_tipo_con'] as $tipo_con){
				$i += 1;
				if($tipo_con != ""){
					if(isset($_POST['vec_id_con'][$i])){
						if($_POST['vec_info_con'][$i] != ''){
							$query_contactos = "update usuario_det_comunicacion set id_tipo_comunicacion = $tipo_con, valor = '".$_POST['vec_info_con'][$i]."'
							where id = ".$_POST['vec_id_con'][$i];
						}else{
							$query_contactos = "delete from usuario_det_comunicacion where id = ".$_POST['vec_id_con'][$i];
						}
					}else{
						$query_contactos = "insert into usuario_det_comunicacion(id_usuario, id_tipo_comunicacion, valor)
						values ( ".$_POST["id_usuario"].",'".$tipo_con."','".$_POST['vec_info_con'][$i]."')";
					}
					$result = mysqli_query($conn,$query_contactos);
				}
			}
	}else{
		$query = "insert into usuario(primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, nombre_usuario, password, cedula, estado, estado_password, id_empresa, id_tipo_documento, id_rol)
		values('".$_POST["primer_nombre"]."','".$_POST["segundo_nombre"]."','".$_POST["primer_apellido"]."','".$_POST["segundo_apellido"]."','".$_POST["nombre_usuario"]."','".md5($_POST["constrasena"])."','".$_POST["numeroDeDocumento"]."','A','A',".$_SESSION['id_empresa'].",".$_POST["tipoDeDocumento"].",".$_POST["tipoDeUsuario"].")";
		$result = mysqli_query($conn,$query);
		
//<!-- MYSQLI_INSERT_ID() entrega el autonumerico de la ultima inserción -->
		if($result){
			$query_max_id = "select max(id) as id_usuario from usuario";
			$result_max_id = mysqli_query($conn,$query_max_id); 
			$row = mysqli_fetch_array($result_max_id);
			$id_usuario = $row['id_usuario'];
			
			$i=-1;
			foreach($_POST['vec_tipo_con'] as $tipo_con){
				$i += 1;
				if($tipo_con != "" and $_POST['vec_info_con'][$i] != ""){
					$query_contactos = "insert into usuario_det_comunicacion(id_usuario, id_tipo_comunicacion, valor)
					values ( ".$row['id_usuario'].",'".$tipo_con."','".$_POST['vec_info_con'][$i]."')";
					$result = mysqli_query($conn,$query_contactos);
				}
			}
		}
	}
	
		
		
		

		if($result){
			$codigo = 1;//exito
			$mensaje = "Los datos fueron guardados correctamente.";
		}else{
			$codigo = 98;
			$mensaje = "Error de insercion. ".$query;//.$query;	
		}
	printf(json_encode(array("codigo" => $codigo,"mensaje" => $mensaje)));
	

?>