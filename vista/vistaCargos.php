<?php
	error_reporting(E_ALL ^ E_NOTICE);
	include "../modelo/Cargos.php";
	include "../control/ControlCargos.php";
	include "../control/ControlConexion.php";

	   
		

try{
	$idc = $_POST['txtIdCargo'];
	$nom = $_POST['txtNombre'];		
	$bot = $_POST['btn'];

	switch ($bot) {
		case 'Guardar':
		$objCargos = new Cargos("", $nom);
		$objControlCargos = new ControlCargos($objCargos);
		$objControlCargos->guardar();
		break;

		case 'Consultar':
		$objCargos = new Cargos($idc,"");
		$objControlCargos = new ControlCargos($objCargos);
		$objCargos = $objControlCargos->consultar();
		$nom=$objCargos->getNombre();		
		
			
		break;

		case 'Modificar':
		$objCargos = new Cargos($nom);
		$objControlCargos = new ControlCargos($objCargos);
		$objControlCargos->modificar();
		break;

		case 'Borrar':
		$objCargos = new Cargos($idc,"","");
		$objControlCargos = new ControlCargos($objCargos);
		$objControlCargos->borrar();
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
	<title>CRUD Cargos</title>
	<meta charset='UTF-8'>
	<link rel='stylesheet' type='text/css' href='../css/bootstrap.css'>
	

</head>
<body>

	<form method='post' action='vistaCargos.php'>		

		<table class='form-table'  style='margin: 50px auto;' >
			<thread class='thead-dark'>
				<td colspan='2'><h1>Cargos</h1></td>				
			</thread>
			<tr>
				<td><h4>id Cargo</h4></td>
				<td><input class='form-control' type='text' name='txtIdCargo' value='".$idc."'>
				</td>
			</tr>
			<tr>
				<td><h4>Nombre Cargo</h4></td>
				<td><input class='form-control' type='text' name='txtNombre' value='".$nom."' >
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

