<?php
	include("conexion.php");
	$db_conexionEEliminar = mysqli_connect($db_host,$db_user,$db_pass,$db_nombre);
	$id = utf8_decode($_GET["id"]);
	$sqlDelete = "DELETE FROM empleados WHERE id_empleado = '$id';";
	if($db_conexionEEliminar->query($sqlDelete)==true){
		echo 'REGISTRO ELIMINADO';
		} else {
		echo 'ERROR AL ELIMINAR REGISTRO';
	}
	$db_conexionEEliminar -> close();
	header("Location: index.php");
	die();
