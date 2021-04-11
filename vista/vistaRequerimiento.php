<?php

	error_reporting(E_ALL ^ E_NOTICE);
	include '../modelo/Requerimiento.php';
	include '../control/ControlRequerimiento.php';
	include '../modelo/DetalleReq.php';
	include '../control/ControlDetalleReq.php';
	include '../control/ControlConexion.php';

	$objReque = new Requerimiento("","");
	$objControlReque = new ControlRequerimiento($objReque);
	$objReque = $objControlReque->comboBoxArea();

try{
	$ida = $_POST['txtArea'];
	$ide = $_POST['txtIdEmpleado'];
	$req = $_POST['txtRequerimiento'];
	$bot = $_POST['btn'];

	switch ($bot) {
		case 'Radicar':
	    

		$objReque = new Requerimiento("", $ida);
		$objControlReque = new ControlRequerimiento($objReque);
		$objControlReque->guardar();
		date_default_timezone_set('America/Bogota');	
		$hoy = date('Y-m-d H:i:s');
		
	  $fkReque=$objControlReque->Idreque();	
	// echo $fkReque ;

	  $obDetalleReq = new DetalleReq("",$hoy, $req,$fkReque,"1",$ide,"");
	  $objControlDetalleReq = new ControlDetalleReq($obDetalleReq);
	  $objControlDetalleReq->guardar();
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
		<link rel='stylesheet' type='text/css' href='../css/bootstrap.css'>
	</head>
	<body>
		<div id='contenedor'>
			<header>
				<h1>Formulario requerimiento</h1>
			</header>
		<div id='formulario'>
			<form method='POST' >
			<td><h4>Area Requerimiento</h4></td>
				<td><select name='txtArea'>
				";
				while($row = $objReque->fetch_assoc()){ 
					echo"
					
					<option value='".$row['IDAREA']."'>".$row['NOMBRE']."</option>";

				}
				echo"
				</td>
				<input type='text' name='txtIdEmpleado' placeholder='Ingrese su ID de Empleado'/>
				<br>
				<textarea name='txtRequerimiento' placeholder='Ingrese el requerimiento' rows='10'></textarea>
				<br>
				
				<td><a class='btn btn-primary' href='../index.html' role='button'>Regresar</a></td>
										
				<input class='boton-enviar' type='submit' name='btn' value='Radicar'/>
			</form>
		</div>
	</div>
	</body>
</html>";


?>