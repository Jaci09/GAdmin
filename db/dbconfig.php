<?php

$server_name = "34.71.227.1";
$db_usuario = "admin";
$db_password ="super-strong-password";
$db_name = "glicoapp";

$conexion = mysqli_connect($server_name,$db_usuario,$db_password);
$dbconfig = mysqli_select_db($conexion,$db_name);

if ($dbconfig) 
{
	//echo "Base de datos conectada";
}
else
{
	echo "La conexión con la Base de datos a fallado";
}

?>