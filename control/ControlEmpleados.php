<?php

class ControlEmpleados
{
	var $objEmpleados;

	function __construct($objEmpleados)
	{
		$this->objEmpleados=$objEmpleados;
	}

	function guardar()
	{
		$ide=$this->objEmpleados->getIdEmpleado();
		$nom=$this->objEmpleados->getNombre();
		$fot=$this->objEmpleados->getFoto();
		$hvs=$this->objEmpleados->getHojaVida();
		$tel=$this->objEmpleados->getTelefono();
		$ema=$this->objEmpleados->getEmail();
		$dir=$this->objEmpleados->getDireccion();
		$x=$this->objEmpleados->getX();
		$y=$this->objEmpleados->getY();
		$fki=$this->objEmpleados->getFkArea();
		$fke=$this->objEmpleados->getFkEmple_Jefe();
        $empleEstado=$this->objEmpleados->getempleActivo();
		
		//echo $nom." ".$hvs." ".$ide." ".$fot." ".$dir	;
		
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
if(empty($ide)){

echo '<script>alert("el campo no puede estar vacio")</script>';

}else{
	$comandoSql = "INSERT INTO empleado  values('".$ide."','".$nom."','".$fot."','".$hvs."','".$tel."','".$ema."','".$dir."','".$x."','".$y."','".$fke."','".$fki."','".$empleEstado."')";
	    
	$objControlConexion->ejecutarComandoSql($comandoSql);
}
		
		
		$objControlConexion->cerrarBd();
		
	}

	function consultar()
	{
		$ide=$this->objEmpleados->getIdEmpleado();		
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "select * from empleado where IDEMPLEADO ='".$ide."'";
		$rs = $objControlConexion->ejecutarSelect($comandoSql);
		//valida si existe el empleado
		$comandoSqlValidacion="select exists (select * from empleado where IDEMPLEADO = '".$ide."' AND EmpleActivo = '1')";
		$rss = $objControlConexion->ejecutarSelect($comandoSqlValidacion);
		$registroo = $rss->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
		$dato = $registroo[0];
		//si el campo está vacio muestra alerta
		if(empty($ide)){
			echo '<script>alert("el campo no puede estar vacio")</script>';
		}
		elseif ($dato==0) { // si el registro no está en la bdd muestra alerta
			echo '<script>alert("Registro no encontrado en la base de datos")</script>';
		}else{ 
				if ($rs){
				$registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
				$nom = $registro["NOMBRE"];
				$fot = $registro["FOTO"];
				$hvs = $registro["HOJAVIDA"];
				$tel = $registro["TELEFONO"];
				$ema = $registro["EMAIL"];
				$dir = $registro["DIRECCION"];
				$x = $registro["X"];
				$Y = $registro["Y"];
				$fke = $registro["fkEMPLE_JEFE"];
				$fki = $registro["fkAREA"];
				
				$this->objEmpleados->setNombre($nom);
				$this->objEmpleados->setFoto($fot);
				$this->objEmpleados->setHojaVida($hvs);
				$this->objEmpleados->setTelefono($tel);
				$this->objEmpleados->setEmail($ema);
				$this->objEmpleados->setDireccion($dir);
				$this->objEmpleados->setX($x);
				$this->objEmpleados->setY($Y);
				$this->objEmpleados->setFkArea($fki);
				$this->objEmpleados->setFkEmple_Jefe($fke);			
			}
		}
		$objControlConexion->cerrarBd();
		return $this->objEmpleados;
	}

	function modificar()
	{
		$ide=$this->objEmpleados->getIdEmpleado();
		$nom=$this->objEmpleados->getNombre();
		$fot=$this->objEmpleados->getFoto();
		$hvs=$this->objEmpleados->getHojaVida();
		$tel=$this->objEmpleados->getTelefono();
		$ema=$this->objEmpleados->getEmail();
		$dir=$this->objEmpleados->getDireccion();
		$x=$this->objEmpleados->getX();
		$y=$this->objEmpleados->getY();
		$fki=$this->objEmpleados->getFkArea();
		$fke=$this->objEmpleados->getFkEmple_Jefe();
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
			//valida si existe el empleado
			$comandoSqlValidacion="select exists (select * from empleado where IDEMPLEADO = '".$ide."')";
			$rss = $objControlConexion->ejecutarSelect($comandoSqlValidacion);
			$registroo = $rss->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
			$dato = $registroo[0];
			//Si el campo está vacio muestra alerta
			if(empty($ide)){
				echo '<script>alert("el campo no puede estar vacio")</script>';
			}
			elseif ($dato==0) {//si el campo no existe en la bdd muestra alerta
				echo '<script>alert("Registro no encontrado Ingrese un registro valido")</script>';
			}else{ 
				$comandoSql = "update empleado set NOMBRE = '".$nom."', FOTO = '".$fot."', HOJAVIDA = '".$hvs."', TELEFONO = '".$tel."', EMAIL = '".$ema."', DIRECCION = '".$dir."', X = '".$x."', Y = ".$y.", fkEMPLE_JEFE = '".$fke."' , fkAREA = '".$fki."' where IDEMPLEADO  = '".$ide."' AND EmpleActivo = '1'";
				$objControlConexion->ejecutarComandoSql($comandoSql);
				echo '<script> alert("Registro modificado con exito")</script>';					
			}
		$objControlConexion->cerrarBd();
	}

	function borrar()
	{
		$ide=$this->objEmpleados->getIdEmpleado();
		$nom=$this->objEmpleados->getNombre();
		$fot=$this->objEmpleados->getFoto();
		$hvs=$this->objEmpleados->getHojaVida();
		$tel=$this->objEmpleados->getTelefono();
		$ema=$this->objEmpleados->getEmail();
		$dir=$this->objEmpleados->getDireccion();
		$x=$this->objEmpleados->getX();
		$y=$this->objEmpleados->getY();
		$fki=$this->objEmpleados->getFkArea();
		$fke=$this->objEmpleados->getFkEmple_Jefe();
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
			//valida si existe el empleado
			$comandoSqlValidacion="select exists (select * from empleado where IDEMPLEADO = '".$ide."')";
			$rss = $objControlConexion->ejecutarSelect($comandoSqlValidacion);
			$registroo = $rss->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
			$dato = $registroo[0];
			//Si el campo está vacio muestra alerta
			if(empty($ide)){
				echo '<script>alert("el campo no puede estar vacio")</script>';
			}
			elseif ($dato==0) {//si el campo no existe en la bdd muestra alerta
				echo '<script>alert("Registro no encontrado Ingrese un registro valido")</script>';
			}else{ 
				$comandoSql = "update empleado set EmpleActivo = '0' where IDEMPLEADO  = '".$ide."'";
				$objControlConexion->ejecutarComandoSql($comandoSql);
				echo '<script> alert("Registro modificado con exito")</script>';					
			}
		$objControlConexion->cerrarBd();
	}

	function comboBoxJefe(){

        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");

        $sql = "select * from area a INNER JOIN empleado b on a.FKEMPLE = b.IDEMPLEADO where b.EmpleActivo = '1'";
        $recordSet = $objControlConexion->ejecutarSelect($sql);
		$matriz = array();
		$i = 0;
		while($row = $recordSet->fetch_assoc()){ 
		
			$nombre = $row['NOMBRE'];
			$idEmpleado = $row['IDEMPLEADO'];
			$objArea = new Empleados($idEmpleado, $nombre, "", "", "","", "", "", "", "", "","");
			$matriz[$i] = $objArea;
			$i++;
			}
        $objControlConexion->cerrarBd();
        return $matriz;
        }

		function comboBoxEmplea(){

			$objControlConexion = new ControlConexion();
			$objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
	
			$sql = "select * from empleado where EmpleActivo = '1'";
			$recordSet = $objControlConexion->ejecutarSelect($sql);
			$matriz = array();
			$i = 0;
			while($row = $recordSet->fetch_assoc()){ 
			
				$nombre = $row['NOMBRE'];
				$idEmpleado = $row['IDEMPLEADO'];
				$objArea = new Empleados($idEmpleado, $nombre, "", "", "","", "", "", "", "", "","");
				$matriz[$i] = $objArea;
				$i++;
				}
			$objControlConexion->cerrarBd();
			return $matriz;
			}
}
	
?>