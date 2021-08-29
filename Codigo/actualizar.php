<?php
include("conexion.php");
$db_conexionEEditar = mysqli_connect($db_host, $db_user, $db_pass, $db_nombre);
$idEdit = utf8_decode($_POST["id"]);
$txt_codigo = utf8_decode($_POST['txt_codigo']);
$txt_nombres = utf8_decode($_POST["txt_nombres"]);
$txt_apellidos = utf8_decode($_POST["txt_apellidos"]);
$txt_direccion = utf8_decode($_POST["txt_direccion"]);
$txt_telefono = utf8_decode($_POST["txt_telefono"]);
$drop_puesto = utf8_decode($_POST["drop_puesto"]);
$txt_fn = utf8_decode($_POST["txt_fn"]);
$sqlUpdate = "UPDATE empleados SET codigo='" . $txt_codigo . "', nombres='" . $txt_nombres . "', apellidos='" . $txt_apellidos . "', direccion='" . $txt_direccion . "', 
	telefono='" . $txt_telefono . "', fecha_nacimiento='" . $txt_fn . "', id_puesto=$drop_puesto WHERE id_empleado = $idEdit;";
echo "<br><br><br><br>";
if ($db_conexionEEditar->query($sqlUpdate) == true) {
	echo 'REGISTRO MODIFICADO';
} else {
	echo 'ERROR AL MODIFICAR REGISTRO';
}
echo "<br>SQL-->:  " . $sqlUpdate . "<br>";
$db_conexionEEditar->close();
header("Location: index.php");
