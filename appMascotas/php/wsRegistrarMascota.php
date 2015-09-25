<?php
set_time_limit(0);
session_start();
require_once 'constantes.php';
$campo_foto = "";
$valor_foto = "";
if(isset($_FILES)){
	foreach($_FILES as $archivo){
		
		$filename = fechaHora()."_".basename($archivo['name']);
		$error = true;

		$path = "../".RUTA_FOTOS_MASCOTAS."/".$filename;
		$error = !move_uploaded_file($archivo['tmp_name'], $path);
		
		if(!$error){
			$campo_foto = ",foto";
			$valor_foto = ",'".$filename."'";
		}
	}
}

	require_once 'connectbd.php';
	$db = new DB_Connect();
	$conn = $db->connect();
		$query = "insert into mascota(id_usuario, nombre".$campo_foto.", id_raza, color, fecha_nacimiento, sexo, castrado, alergias, observaciones, peso_kg)
		values('".$_POST["usuario"]."','".$_POST["nombre"]."'".$valor_foto.",'".$_POST["raza"]."','".$_POST["color"]."','".$_POST["fechaDeNacimiento"]."','".$_POST["sexo"]."','".$_POST["castrado"]."','".$_POST['alergias']."','".$_POST["observaciones"]."',".$_POST["peso_kg"].")";
		$result = mysqli_query($conn,$query);

		if($result){
				$codigo = 1;//exito
				$mensaje = "Los datos fueron guardados correctamente.";
		}else{
			$codigo = 98;
			$mensaje = "Error de insercion. ".$query;//.$query;	
		}
	printf(json_encode(array("codigo" => $codigo,"mensaje" => $mensaje)));
	
function fechaHora(){
	$info = getdate();
	$date = $info['mday'];
	$month = $info['mon'];
	$year = $info['year'];
	$hour = $info['hours'];
	$min = $info['minutes'];
	$sec = $info['seconds'];
	$current_date = $date.$month.$year."_".$hour.$min.$sec;
	return $current_date;
	}
?>