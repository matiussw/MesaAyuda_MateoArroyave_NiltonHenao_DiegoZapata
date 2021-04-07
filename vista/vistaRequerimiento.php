<?php

	error_reporting(E_ALL ^ E_NOTICE);
	include '../modelo/Requerimiento.php';
	include '../control/ControlEmpleados.php';
	include '../control/ControlConexion.php';


try{
	$ida = $_POST['txtIdArea'];
	$req = $_POST['txtRequerimiento'];
	$bot = $_POST['btn'];

	switch ($bot) {
		case 'Guardar':
		$objEmpleados = new Empleados($ida, $req);
		$objControlEmpleados = new ControlEmpleados($objEmpleados);
		$objControlEmpleados->guardar();
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
		<meta charset='utf-8'>
		<title>Formulario Requerimientos</title>
		<link rel='stylesheet' type='text/css' href='../css/estilos2.css'>
	</head>
	<body>
		<div id='contenedor'>
			<header>
				<h1>Formulario requerimiento</h1>
			</header>
		<div id='formulario'>
			<form method='POST'>
				<input type='text' name='txIdArea' placeholder='Ingrese el Area encargada'/>
				<br>
				<textarea name='txtRequerimiento' placeholder='Ingrese el requerimiento' rows='10'></textarea>
				<br>
											
				<input class='boton-enviar' type='submit' name='btn' value='Radicar'/>
			</form>
		</div>
	</div>
	</body>
</html>";


?>