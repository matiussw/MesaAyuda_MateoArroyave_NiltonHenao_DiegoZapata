<?php

	error_reporting(E_ALL ^ E_NOTICE);
	include '../modelo/DetalleReq.php';
	include '../control/ControlDetalleReq.php';
	include '../control/ControlConexion.php';
	include '../modelo/Informes.php';
	include '../control/ControlInformes.php';
	include "../modelo/Empleados.php";
	include "../control/ControlEmpleados.php";

	$objinfo = new Informes("","","","","","","","","","","");
	$objControlInfo = new ControlInformes($objinfo);
	$matrizReque = $objControlInfo->requerimientosActivos();

	$objEmpleados = new Empleados("","","","","","","","","","","");
	$objControlEmpleados = new ControlEmpleados($objEmpleados);
	$matrizEmple = $objControlEmpleados->comboBoxEmplea();

	$ida = isset ($_POST['txtArea']) ? $_POST['txtArea']: null;
	$ide = isset ($_POST['txtIdEmpleado']) ? $_POST['txtIdEmpleado']: null;
	$req = isset ($_POST['txtRequerimiento']) ? $_POST['txtRequerimiento']: null;
    $empleasig = isset ($_POST['txtIdEmpleadoAsignado']) ? $_POST['txtIdEmpleadoAsignado']: null;
    $estado = isset ($_POST['txtEstado']) ? $_POST['txtEstado']: null;
	$fkReque= isset ($_POST['fkreque']) ? $_POST['fkreque']: null;
	$bot = isset ($_POST['btn']) ? $_POST['btn']: null;
 
	switch ($bot) {
		case 'Radicar':
	    
	
		date_default_timezone_set('America/Bogota');	
		$hoy = date('Y-m-d H:i:s');

	//	echo $fkReque.$ide ;

	  $obDetalleReq = new DetalleReq("",$hoy, $req,$fkReque,$estado,$ide,$empleasig);
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

		<style>
            table tr:not(:first-child){
                cursor: pointer;transition: all .25s ease-in-out;
            }
            table tr:not(:first-child):hover{background-color: #ddd;}
        </style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-6 col-md-6">
					<form method="POST">
					<table class="form-table"  style="margin: 50px auto;" id="table" >
						<thread class="thead-dark">
							<td colspan="2"><h1>Requerimientos radicados</h1></td>				
						</thread>							
							<tr>
								<th>ID Requerimiento</th>
								<th>Área</th>
								<th>Fecha</th>
								<th>Estado</th>									
							</tr>
							<?php foreach ($matrizReque as $row){?>
								<tr>
							<td><?php echo $row->getidDetalle() ?></td>
						    <td><?php echo $row->getNombre() ?></td>
						    <td><?php echo $row->getfecha() ?></td>	
							<td><?php echo $row->getestado() ?></td>	
							<td	hidden><?php echo $row->getemple() ?></td>	
							<td	hidden><?php echo $row->getIdArea() ?></td>	
							<td	hidden><?php echo $row->getobservacion() ?></td>	
							<td	hidden><?php echo $row->getfkReque() ?></td>	
							<td	hidden><?php echo $row->getfkEstado() ?></td>	
							<td	hidden><?php echo $row->getfkEmple() ?></td>	
							<td	hidden><?php echo $row->getfkEmpleAsignado() ?></td>
							</tr>
							<?php } ?> 
							</table>
						

					</form>
				</div>	
				<div class="col-6 col-md-6">
					<form method="POST">
					<table class="form-table"  style="margin: 50px auto;" >
						<thread class="thead-dark">
							<td colspan="2"><h1>REQUERIMIENTOS</h1></td>				
						</thread>
							<tr>
								<td><h4>Área Requerimiento</h4></td>
								<td><input class="form-control" name="txtArea" id="txtArea" readonly>
								
											
							</td>							
							</tr>

							<tr>
								<td><h4>Empleado Radicador</h4></td>
								<td><input class="form-control" type="text" id ="txtNombreEmple" name="txtNombreEmple" readonly/>
								</td>
							</tr>
							<input hidden id="fkreque" name ="fkreque" >	
							<input hidden id="txtIdEmpleado" name="txtIdEmpleado" >
							<tr>
								<td><h4>asignar Empleado</h4></td>
								<td><select class="form-control" name="txtIdEmpleadoAsignado">
				<?php
				foreach ($matrizEmple as $row){ 
					echo'
					
					<option value='.$row->getIdEmpleado().'>'.$row->getNombre().'</option>';

				}
				?>
							</tr>
							<tr>
								<td><h4>Asignar Estado</h4></td>
								<td><select class="form-control" name="txtEstado">
				
				
				<option value='2'>Asignado</option>
				<option value='3'>Solucionado parcialmente</option>
				<option value='4'>Solucionado Total</option>
				<option value='5'>Cancelado</option><td>

				
								</td>
							</tr>
							<tr>
								<td><h4>Observación</td>
								<td><textarea name="txtRequerimiento" id="txtRequerimiento" placeholder="Ingrese el requerimiento" rows="10"></textarea>
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
				</div>
				
			</div>
		</div>
	</body>

	<script>
    
	var table = document.getElementById('table');
	
	for(var i = 1; i < table.rows.length; i++)
	{
		table.rows[i].onclick = function()
		{
			 //rIndex = this.rowIndex;
			 document.getElementById("txtArea").value = this.cells[1].innerHTML;
			 document.getElementById("txtNombreEmple").value = this.cells[3].innerHTML;
			 document.getElementById("txtRequerimiento").value = this.cells[6].innerHTML;


			// document.getElementById("fkreque").value = this.cells[6].innerHTML;
			// document.getElementById("txtIdEmpleado").value = this.cells[8].innerHTML;

			 document.getElementById("fkreque").value = this.cells[7].innerHTML;
			 document.getElementById("txtIdEmpleado").value = this.cells[9].innerHTML;
		};
	}

</script>
</html>