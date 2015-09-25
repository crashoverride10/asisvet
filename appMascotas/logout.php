<?php
session_start();
require_once 'php/constantes.php';
$_SESSION['user_authorized'] = false;
$_SESSION['id'] = "";
$_SESSION['id_rol'] = "";
$_SESSION['nombre'] = "";
$_SESSION['apellido'] = "";
$_SESSION['id_empresa'] = "";

session_destroy();

$cookie_name = "id";
if(isset($_COOKIE[$cookie_name])) {
	setcookie($cookie_name, "", time() - 3600, "/"); 
}

header('location:login.php');

?>