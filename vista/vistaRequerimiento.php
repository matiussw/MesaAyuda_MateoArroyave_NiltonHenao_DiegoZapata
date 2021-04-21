<?php

	error_reporting(E_ALL ^ E_NOTICE);
	include '../modelo/Requerimiento.php';
	include '../control/ControlRequerimiento.php';
	include '../modelo/DetalleReq.php';
	include '../control/ControlDetalleReq.php';
	include '../control/ControlConexion.php';
	include "../modelo/Areas.php";
	include "../control/ControlAreas.php";

	$objAreas = new Areas("","","");
	$objControlAreas = new ControlAreas($objAreas);
	$matrizArea = $objControlAreas->comboBoxAreaReque();

	$ida = isset ($_POST['txtArea']) ? $_POST['txtArea']: null;
	$ide = isset ($_POST['txtIdEmpleado']) ? $_POST['txtIdEmpleado']: null;
	$req = isset ($_POST['txtRequerimiento']) ? $_POST['txtRequerimiento']: null;
	$bot = isset ($_POST['btn']) ? $_POST['btn']: null;

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
	?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Formulario Requerimientos</title>
		
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	</head>
	<body>
		<form method="POST">		

		<table class="form-table"  style="margin: 50px auto;" >
			<thread class="thead-dark">
				<td colspan="2"><h1>REQUERIMIENTOS</h1></td>				
			</thread>
				<tr>
				<td><h4>Área Requerimiento</h4></td>
				<td><select class="form-control"name="txtArea">
				";<?php
				foreach ($matrizArea as $row) { 
					echo'
				
					<option value='.$row->getIdArea().'>'.$row->getNombre().'</option>';

				}
				?>
				
				</td>
				</tr>
				<tr>
				<td><h4>ID Empleado</h4></td>
				<td><input class="form-control" type="text" name="txtIdEmpleado" placeholder="Ingrese su ID de Empleado"/>
				</td>
				</tr>
				<tr>
				<td><h4>Observación</td>
				<td><textarea name="txtRequerimiento" placeholder="Ingrese el requerimiento" rows="10"></textarea>
				</td>
				</tr>
				</table>
				<table class="form-table" style="margin: 50px auto;">			
				<tr>							
				<td><input class="btn btn-success" align = "center" type="submit" name="btn" value="Radicar"/></td>
				</tr>
				</table>
				<table class="form-table" style="margin: 50px auto;">
				<tr>
				<td><a class="btn btn-primary" href="../index.php" role="button">Regresar</a></td>
				</tr>
				</table>

			</form>		
	</body>
</html>