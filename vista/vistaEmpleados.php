<?php
	error_reporting(E_ALL ^ E_NOTICE);
	include "../modelo/Empleados.php";
	include "../control/ControlEmpleados.php";
	include "../control/ControlConexion.php";


try{
	$ide = $_POST['txtIdEmpleado'];
	$nom = $_POST['txtNombre'];
	$tel = $_POST['txtTelefono'];
	$car = $_POST['txtCargo'];
	$ema = $_POST['txtEmail'];	
	$fki = $_POST['txtFkIdArea'];
	$fke = $_POST['txtFkRmple'];
	$bot = $_POST['btn'];

	switch ($bot) {
		case 'Guardar':
		$objEmpleados = new Empleados($ide, $nom, $tel, $car, $ema, $fki, $fke);
		$objControlEmpleados = new ControlEmpleados($objEmpleados);
		$objControlEmpleados->guardar();
		break;

		case 'Consultar':
		$objEmpleados = new Empleados($ide,"","","","",0,"");
		$objControlEmpleados = new ControlEmpleados($objEmpleados);
		$objEmpleados = $objControlEmpleados->consultar();
		$nom=$objEmpleados->getNombre();
		$tel=$objEmpleados->getTelefono();
		$car=$objEmpleados->getCargo();
		$ema=$objEmpleados->getEmail();
		$fki=$objEmpleados->getFkIdArea();
		$fke=$objEmpleados->getFkRmple();
			
		break;

		case 'Modificar':
		$objEmpleados = new Empleados($ide, $nom, $tel, $car, $ema, $fki, $fke);
		$objControlEmpleados = new ControlEmpleados($objEmpleados);
		$objControlEmpleados->modificar();
		break;

		case 'Borrar':
		$objEmpleados = new Empleados($ide,"","","","",0,"");
		$objControlEmpleados = new ControlEmpleados($objEmpleados);
		$objControlEmpleados->borrar();
		break;
		
		default:
			# code...
			break;
	}
	} catch (Exception $e){

	}

	echo "
	<!DOCTYPE html>
<html>
<head>
	<title>CRUD Empleados</title>
	<meta charset='UTF-8'>
	<link rel='stylesheet' type='text/css' href='../css/bootstrap.css'>
	

</head>
<body>

	<form method='post' action='vistaEmpleados.php'>		

		<table class='form-table'  style='margin: 50px auto;' >
			<thread class='thead-dark'>
				<td colspan='2'><h1>EMPLEADOS</h1></td>				
			</thread>
			<tr>
				<td><h4>idEmpleado</h4></td>
				<td><input class='form-control' type='text' name='txtIdEmpleado' value='".$ide."' >
				</td>
			</tr>
			<tr>
				<td><h4>Nombre</h4></td>
				<td><input class='form-control' type='text' name='txtNombre' value='".$nom."' >
				</td>
			</tr>
			<tr>
				<td><h4>Teléfono</h4></td>
				<td><input class='form-control' type='text' name='txtTelefono' value='" . $tel . "' >
				</td>
			</tr>
			<tr>
				<td><h4>Cargo</h4></td>
				<td><input class='form-control' type='text' name='txtCargo' value='" . $car . "' >
				</td>
			</tr>
			<tr>
				<td><h4>Email</h4></td>
				<td><input class='form-control' type='Email' name='txtEmail' value='" . $ema . "' >
				</td>
			</tr>
			<tr>
				<td><h4>Id Área</h4></td>
				<td><input class='form-control' type='text' name='txtFkIdArea' value='" . $fki . "' >
				</td>
			</tr>
			<tr>
				<td><h4>FK Emple</h4></td>
				<td><input class='form-control' type='text' name='txtFkRmple' value='" . $fke . "' >
				</td>
			</tr>				
		</table>
		<table class='form-table' style='margin: 50px auto;'>
			<tr>
				<td><input class='btn btn-success' type='submit' name='btn' value='Guardar'></td>
				<td><input class='btn btn-info' type='submit' name='btn' value='Consultar'></td>
				<td><input class='btn btn-warning' type='submit' name='btn' value='Modificar'></td>
				<td><input class='btn btn-danger' type='submit' name='btn' value='Borrar'></td>
			</tr>			
		</table>
		<table class='form-table' style='margin: 50px auto;'>
			<tr>
				<td><a class='btn btn-primary' href='../index.html' role='button'>Regresar</a></td>
			</tr>
		</table>
	</form>
</body>
</html>";
?>

