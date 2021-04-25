<?php

	error_reporting(E_ALL ^ E_NOTICE);
	include "../control/ControlConexion.php";
	include "../modelo/Empleados.php";
	include "../control/ControlEmpleados.php";
	include "../modelo/Areas.php";
	include "../control/ControlAreas.php";
	include "../modelo/Cargos.php";
	include "../control/ControlCargos.php";
	include "../modelo/CargoPorEmpleado.php";
	include "../control/ControlCargoPorEmpleado.php";
	
	
	$objEmpleados = new Empleados("","","","","","","","","","","","");
	$objControlEmpleados = new ControlEmpleados($objEmpleados);
	$matriz = $objControlEmpleados->comboBoxJefe();

	$objAreas = new Areas("","","");
	$objControlAreas = new ControlAreas($objAreas);
	$matrizArea = $objControlAreas->comboBoxArea();

	$objCargos = new Cargos("","");
	$objControlCargos = new ControlCargos($objCargos);
	$matrizCargo = $objControlCargos->comboBoxCargo();

	$ide = isset($_POST['txtIdEmpleado']) ? $_POST['txtIdEmpleado']: null;
	$nom = isset($_POST['txtNombre']) ? $_POST['txtNombre']: null;
	$fot = isset($_POST['txtFoto']) ? $_POST['txtFoto']: null;
	$hvs = isset($_POST['txtHojaVida']) ? $_POST['txtHojaVida']: null;
	$tel = isset($_POST['txtTelefono']) ? $_POST['txtTelefono']: null;
	$car = isset($_POST['txtCargo']) ? $_POST['txtCargo']: null;
	$ema = isset($_POST['txtEmail']) ? $_POST['txtEmail']: null;	
	$dir = isset($_POST['txtDireccion']) ? $_POST['txtDireccion']: null;
	$x = isset($_POST['txtX']) ? $_POST['txtX']: null;
	$y = isset($_POST['txtY']) ? $_POST['txtY']: null;
	$fke = isset($_POST['txtFkRmple']) ? $_POST['txtFkRmple']: null;
	$fki = isset($_POST['txtFkIdArea']) ? $_POST['txtFkIdArea']: null;
	$bot = isset($_POST['btn']) ? $_POST['btn']: null;
	
	switch ($bot) {
		case 'Guardar':
		$objEmpleados = new Empleados($ide, $nom, $fot, $hvs, $tel, $ema,$dir, $x, $y, $fke, $fki,1);
		$objControlEmpleados = new ControlEmpleados($objEmpleados);
		$objControlEmpleados->guardar();

		date_default_timezone_set('America/Bogota');	
		$hoy = date('Y-m-d H:i:s');
     
		$objCargoPorEmpleado= new CargoPorEmpleado($car,$ide,$hoy,""); 
        $objControlCargoPorEmpleado = new ControlCargoPorEmpleado($objCargoPorEmpleado);
		$objControlCargoPorEmpleado->guardar();
		break;

		case 'Consultar':
		$objEmpleados = new Empleados($ide,"","","","","","","","","","","");
		$objControlEmpleados = new ControlEmpleados($objEmpleados);
		$objEmpleados = $objControlEmpleados->consultar();
		$ide=$objEmpleados->getIdEmpleado();
		$nom=$objEmpleados->getNombre();
		$fot=$objEmpleados->getFoto();
		$hvs=$objEmpleados->getHojaVida();
		$tel=$objEmpleados->getTelefono();
		$ema=$objEmpleados->getEmail();
		$dir=$objEmpleados->getDireccion();
		$x=$objEmpleados->getX();
		$y=$objEmpleados->getY();
		$fki=$objEmpleados->getFkArea();
		$fke=$objEmpleados->getFkEmple_Jefe();
			
		break;

		case 'Modificar':
		$objEmpleados = new Empleados($ide, $nom, $fot, $hvs, $tel, $ema,$dir, $x, $y, $fke, $fki,"");
		$objControlEmpleados = new ControlEmpleados($objEmpleados);
		$objControlEmpleados->modificar();
		break;

		case 'Borrar':
		$objEmpleados = new Empleados($ide,"","","","","","","","","","","");
		$objControlEmpleados = new ControlEmpleados($objEmpleados);
		$objControlEmpleados->borrar();

		date_default_timezone_set('America/Bogota');	
		$hoy = date('Y-m-d H:i:s');

		$objCargoPorEmpleado= new CargoPorEmpleado($car,$ide,"",$hoy); 
        $objControlCargoPorEmpleado = new ControlCargoPorEmpleado($objCargoPorEmpleado);
		$objControlCargoPorEmpleado->modificar();

		break;
		
		default:
			# code...
			break;
	}
	
	?>
	
<!DOCTYPE html>
<html>
<head>
	<title>CRUD Empleados</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link href="../css/estilos2.css" type="text/css" rel="stylesheet">
	

</head>
<body>
	<div class="container">		   
		<header class="cabecera-principal">
			<div id=contenedor-cabecera>
				<img id="logo" src="../img/logo1.png" alt="Logo Responsive">
			</div>
			<nav class="nav-principal">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Equipo</a></li>
					<li><a href="#">Servicios</a></li>
					<li><a href="#">Organización</a></li>						
				</ul>
			</nav>
		</header>
	<form method="POST">		

		<table class="form-table"  style="margin: 50px auto;" >
			<thread class="thead-dark">
				<td colspan="2"><h1>EMPLEADOS</h1></td>				
			</thread>
			<tr>
				<td><h4>idEmpleado</h4></td>
				<td><input class="form-control" type="text" name="txtIdEmpleado" value="<?php  echo$ide ?>">
				</td>
			</tr>
			<tr>
				<td><h4>Nombre</h4></td>
				<td><input class="form-control" type="text" name="txtNombre" value="<?php  echo$nom?>" >
				</td>
			</tr>
			<tr>
				<td><h4>Foto</h4></td>
				<td><input class="form-control" type="file" name="txtFoto" value="<?php  echo$fot ?>" >
				</td>
			</tr>
			<tr>
				<td><h4>Hoja de vida</h4></td>
				<td><input class="form-control" type="file" name="txtHojaVida" value="<?php  echo$hvs?>" >
				</td>
			</tr>
			<tr>
				<td><h4>Teléfono</h4></td>
				<td><input class="form-control" type="text" name="txtTelefono" value="<?php   echo$tel ?>">
				</td>
			</tr>
			<tr>
				<td><h4>Cargo</h4></td>
				
				<td><select class="form-control" name="txtCargo">
				
				<?php

				foreach ($matrizCargo as $row){ 
					echo'
					
					<option value='.$row->getIdCargo().'>'.$row->getNombre().'</option>';

				}
				?>
				
				<option value="NULL">Sin asignar</option>
				</td>
			</tr>
			<tr>
				<td><h4>Email</h4></td>
				<td><input class="form-control" type="Email" name="txtEmail" value="<?php echo $ema  ?>" >
				</td>
			</tr>
			<tr>
				<td><h4>Dirección</h4></td>
				<td><input class="form-control" type="text" name="txtDireccion" value="<?php  echo$dir ?>" >
				</td>
			</tr>
			<tr>
				<td><h4>X</h4></td>
				<td><input class="form-control" type="text" name="txtX" value="<?php echo $x ?>" >
				</td>
			</tr>
			<tr>
				<td><h4>Y</h4></td>
				<td><input class="form-control" type="text" name="txtY" value="<?php echo $y ?>" >
				</td>
			</tr>
			<tr>
				<td><h4>Jefe inmediato</h4></td>
				
				<td><select class="form-control" name="txtFkRmple">
				<?php
				foreach ($matriz as $row){ 
					echo'
					
					<option value='.$row->getIdEmpleado().'>'.$row->getNombre().'</option>';

				}
				?>
				
				<option value=NULL>Sin asignar</option>
				</td>
			</tr>
			<tr>
				<td><h4>Área</h4></td>
				<td>
				<select class="form-control" name="txtFkIdArea">
				<?php
				foreach ($matrizArea as $row) { 
					echo'
				
					<option value='.$row->getIdArea().'>'.$row->getNombre().'</option>';

				}
				?>
				
				<option value="NULL">Sin asignar</option>
				</td>
			</tr>
							
		</table>

		<table class="form-table" style="margin: 50px auto;">
			<tr>
				<td><input class="btn btn-success" type="submit" name="btn" value="Guardar"></td>
				<td><input class="btn btn-info" type="submit" name="btn" value="Consultar"></td>
				<td><input class="btn btn-warning" type="submit" name="btn" value="Modificar"></td>
				<td><input class="btn btn-danger" type="submit" name="btn" value="Borrar"></td>
			</tr>			
		</table>
		<table class="form-table" style="margin: 50px auto;">
			<tr>
				<td><a class="btn btn-primary" href="../index.php" role="button">Regresar</a></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>

