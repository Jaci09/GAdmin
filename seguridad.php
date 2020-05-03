<?php
session_start();
include('db/dbconfig.php');

if($dbconfig) 
{
	// echo "Conexión a la base de datos";
}
else
{
	header("Location: db/dbconfig.php");
}

if(!$_SESSION['usuario']) 
{
	header('Location: login.php');
}
?>