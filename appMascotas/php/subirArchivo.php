<?php
set_time_limit(0);
$rsp = array();
if(isset($_FILES)){
	foreach($_FILES as $archivo){
		
		$filename = fechaHora()."_".basename($archivo['name']);
		$error = true;

		$path = "../fotos/mascotas/".$filename;
		$error = !move_uploaded_file($archivo['tmp_name'], $path);

		$rsp = array(
			'error' => $error, 
			'filename' => $filename,
			'filepath' => $path
		);
	}
}else{
	$rsp = array(
        'error' => 'no file'
    );
}
echo json_encode($rsp);

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
	/*var_dump($_FILES);
	echo "<br>************************<br>";
	var_dump($_POST);*/
?>