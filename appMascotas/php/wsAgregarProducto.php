<?php
	require_once 'connectbd.php';
	require_once 'constantes.php';
	$db = new DB_Connect();
	$conn = $db->connect();
if(isset($_FILES)){
	foreach($_FILES as $archivo){
		
	$filename = fechaHora()."_".basename($archivo['name']);
	$error = true;

	$path = "../".IMAGENES_PRODUCTOS."/".$filename;
	$error = !move_uploaded_file($archivo['tmp_name'], $path);

	
	}
}else{
    echo 'error: no file';
}
	if($_POST['sid'] == ""){
		$query = "INSERT INTO productos (nombre,valor,cantidad_disponible,imagen, descripcion, valor_anterior, descuento)
		values('".$_POST['txtNombre']."',".$_POST['txtValor'].",".$_POST['txtDisponible'].",'".$filename."','".$_POST['txtDescripcion']."',".$_POST['txtValorAnterior'].",'".$_POST['selDescuento']."')";
	}else{
		$query = "update productos set nombre = '".$_POST['txtNombre']."',valor = '".$_POST['txtValor']."',cantidad_disponible = '".$_POST['txtDisponible']."',descripcion = '".$_POST['txtDescripcion']."',valor_anterior = '".$_POST['txtValorAnterior']."',estado = '".$_POST['selEstado']."',descuento = '".$_POST['selDescuento']."' where id=".$_POST['sid'];
	}
	$result = mysqli_query($conn,$query);
	if($result){
		header('location:../gestionar_producto.php');
	}else{
		echo "Ha ocurrido un error<br>";
		echo $query."<br>";
		var_dump($_POST);
	}
	
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