<?php
	error_reporting(E_ALL ^ E_NOTICE);
	include "../modelo/Areas.php";
	include "../control/ControlAreas.php";
	include "../control/ControlConexion.php";

	    $objAreas = new Areas("","","","");
		$objControlAreas = new ControlAreas($objAreas);
		$objAreas = $objControlAreas->comboBox();

try{
	$ida = $_POST['txtIdArea'];
	$nom = $_POST['txtNombre'];
	$fke = $_POST['txtFkEmple_Jefe'];	
	$bot = $_POST['btn'];

	switch ($bot) {
		case 'Guardar':
		$objAreas = new Areas($ida, $nom, $fke);
		$objControlAreas = new ControlAreas($objAreas);
		$objControlAreas->guardar();
		break;

		case 'Consultar':
		$objAreas = new Areas($ida,"","");
		$objControlAreas = new ControlAreas($objAreas);
		$objAreas = $objControlAreas->consultar();
		$nom=$objAreas->getNombre();		
		$fke=$objAreas->getFkEmple_Jefe();
			
		break;

		case 'Modificar':
		$objAreas = new Areas($ida, $nom, $fke);
		$objControlAreas = new ControlAreas($objAreas);
		$objControlAreas->modificar();
		break;

		case 'Borrar':
		$objAreas = new Areas($ida,"","");
		$objControlAreas = new ControlAreas($objAreas);
		$objControlAreas->borrar();
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
	<title>CRUD Áreas</title>
	<meta charset='UTF-8'>
	<link rel='stylesheet' type='text/css' href='../css/bootstrap.css'>
	

</head>
<body>

	<form method='post' action='vistaAreas.php'>		

		<table class='form-table'  style='margin: 50px auto;' >
			<thread class='thead-dark'>
				<td colspan='2'><h1>Áreas</h1></td>				
			</thread>
			<tr>
				<td><h4>id Área</h4></td>
				<td><input class='form-control' type='text' name='txtIdArea' value='".$ida."'>
				</td>
			</tr>
			<tr>
				<td><h4>Nombre Área</h4></td>
				<td><input class='form-control' type='text' name='txtNombre' value='".$nom."' >
				</td>
			</tr>			
			<tr>
				<td><h4>Jefe De Area</h4></td>
				<td><select name='txtFkEmple_Jefe'>
				";
				while($row = $objAreas->fetch_assoc()){ 
					echo"
					
					<option value='".$row['IDEMPLEADO']."'>".$row['IDEMPLEADO']." ".$row['NOMBRE']."</option>";

				}
				echo"
			
			  </select>
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

