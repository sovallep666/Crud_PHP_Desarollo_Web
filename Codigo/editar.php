<?php
include("conexion.php");
$db_conexionEEditar = mysqli_connect($db_host, $db_user, $db_pass, $db_nombre);
$idEdit = utf8_decode($_GET["id"]);
$db_conexionEEditar->real_query("SELECT e.id_empleado as id, e.codigo, e.nombres, e.apellidos, e.direccion, e.telefono, e.fecha_nacimiento, p.puesto FROM db_empresa_2021.empleados AS e INNER JOIN db_empresa_2021.puestos AS p ON e.id_puesto = p.id_puesto WHERE id_empleado = $idEdit;");
$resultadoEEdit = $db_conexionEEditar->use_result();
$filaEmpleadoEdit = $resultadoEEdit->fetch_assoc();
$db_conexionP = mysqli_connect($db_host, $db_user, $db_pass, $db_nombre);
$db_conexionP->real_query("SELECT id_puesto as id, puesto as puesto FROM puestos;");
$resultadoP = $db_conexionP->use_result();
$idPuestoP = $resultadoP->fetch_assoc();
?>
<!doctype html>
<html lang="en">

<head>
	<title>Pagina PHP</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
	<div class="row" style="margin-top: 1em;">
		<div class="col-md-10" style="margin-left: 100px;">
			<div style="padding:10px; background-color: #001940; color:white;">
				<h3 class="text-center">Editar Empleado : <?php echo $filaEmpleadoEdit['nombres']; ?> <?php echo $filaEmpleadoEdit['apellidos']; ?> </h3>
			</div>
			<div style="padding:10px; background-color: white; width: 100%;">
				<div class="container">
					<form class="d-flex" action="" method="POST" autocomplete="off">
						<div class="col">
							<input name="id" id="id" value="<?php echo $filaEmpleadoEdit['id']; ?>" hidden>
							<div class="row">
								<div class="col-md-6">
									<label for="lbl_codigo" class="form-label"><b>Codigo</b></label>
									<input type="text" name="txt_codigo" id="txt_codigo" class="form-control" value="<?php echo $filaEmpleadoEdit['codigo']; ?>">
								</div>
								<div class="col-md-6">
									<label for="lbl_puesto" class="form-label"><b>Puesto</b></label>
									<select class="form-select" name="drop_puesto" id="drop_puesto" required>
										<option value="<?php echo $idPuestoP['id']; ?>"><?php echo $idPuestoP['puesto']; ?></option>
										<?php
										while ($filaPuesto = $resultadoP->fetch_assoc()) {
											echo "<option value=" . $filaPuesto['id'] . ">" . $filaPuesto['puesto'] . "</option>";
										}
										$db_conexionP->close();
										?>
									</select>
								</div>
							</div>
							<div class="row" style="margin-top: 1em;">
								<div class="col-md-6">
									<label for="lbl_nombres" class="form-label"><b>Nombres</b></label>
									<input type="text" name="txt_nombres" id="txt_nombres" class="form-control" value="<?php echo $filaEmpleadoEdit['nombres']; ?>">
								</div>
								<div class="col-md-6">
									<label for="lbl_apellidos" class="form-label"><b>Apellidos</b></label>
									<input type="text" name="txt_apellidos" id="txt_apellidos" class="form-control" value="<?php echo $filaEmpleadoEdit['apellidos']; ?>">
								</div>
							</div>
							<div class="row" style="margin-top: 1em;">
								<div class="col-md-6">
									<label for="lbl_telefono" class="form-label"><b>Telefono</b></label>
									<input type="number" name="txt_telefono" id="txt_telefono" class="form-control" value="<?php echo $filaEmpleadoEdit['telefono']; ?>">
								</div>
								<div class="col-md-6">
									<label for="lbl_fn" class="form-label"><b>Fecha de Nacimiento</b></label>
									<input type="date" name="txt_fn" id="txt_fn" class="form-control" value="<?php echo $filaEmpleadoEdit['fecha_nacimiento']; ?>">
								</div>
							</div>
							<div class="mb-3">
								<label for="lbl_direccion" class="form-label"><b>Direccion</b></label>
								<input type="text" name="txt_direccion" id="txt_direccion" class="form-control" value="<?php echo $filaEmpleadoEdit['direccion']; ?>">
							</div>
							<?php $db_conexionEEditar->close(); ?>
							<div class="text-center">
								<a href="index.php" class="btn btn-primary"> <img src="img/return.png" style='width: 25px; height:25px; color:white;'></img> Regresar</a> &nbsp;&nbsp;
								<button name="btn_editar" id="btn_editar" class="btn btn-success"><img src="img/save.png" style='width: 25px; height:25px; color:white;'></img> Guardar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php
	if (isset($_POST["btn_editar"])) {
		include 'actualizar.php';
	}
	?>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>