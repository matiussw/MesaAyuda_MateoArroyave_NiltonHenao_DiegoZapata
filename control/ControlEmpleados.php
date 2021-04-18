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

		echo $nom." ".$hvs;
		
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");

		$comandoSql = "INSERT INTO empleado  values('".$ide."','".$nom."','".$fot."','".$hvs."','".$tel."','".$ema."','".$dir."','".$x."','".$y."','".$fke."','".$fki."')";
		
	    $sw2=$objControlConexion->ejecutarComandoSql($comandoSql);
		if ($sw2) {
            echo '<script>alert("Registro Exitoso")</script>';
        } else { 
            echo '<script>alert("Clave Primaria Repetida o Campos Vacios")</script>';
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
		
		}else {
			echo '<script>alert("Registro no encontrado")</script>';
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
		$comandoSql = "update empleado set NOMBRE = '".$nom."', FOTO = '".$fot."', HOJAVIDA = '".$hvs."', TELEFONO = '".$tel."', EMAIL = '".$ema."', DIRECCION = '".$dir."', X = '".$x."', Y = ".$y.", fkEMPLE_JEFE = '".$fke."' , fkAREA = '".$fki."' where IDEMPLEADO  = '".$ide."'";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();
	}

	function borrar()
	{
		$ide=$this->objEmpleados->getIdEmpleado();
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "delete from empleado where idEmpleado = '".$ide."'";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();
	}

	function comboBoxJefe(){

        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");

        $sql = "select * from area a INNER JOIN empleado b on a.FKEMPLE = b.IDEMPLEADO";
        $recordSet = $objControlConexion->ejecutarSelect($sql);
        $objControlConexion->cerrarBd();
        return $recordSet;
    }

	function comboBoxArea(){

        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");

        $sql = "SELECT IDAREA,  NOMBRE FROM area";
        $recordSet = $objControlConexion->ejecutarSelect($sql);
        $objControlConexion->cerrarBd();
        return $recordSet;
    }

	function comboBoxCargo(){

        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");

        $sql = "SELECT * FROM cargo";
        $recordSet = $objControlConexion->ejecutarSelect($sql);
        $objControlConexion->cerrarBd();
        return $recordSet;
    }
	

}
	
?>