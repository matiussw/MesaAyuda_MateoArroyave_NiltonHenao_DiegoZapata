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
		$tel=$this->objEmpleados->getTelefono();
		$car=$this->objEmpleados->getCargo();
		$ema=$this->objEmpleados->getEmail();
		$fki=$this->objEmpleados->getFkIdArea();
		$fke=$this->objEmpleados->getFkRmple();
		
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "insert into empleados values('".$ide."','".$nom."','".$tel."','".$car."','".$ema."','".$fki."','".$fke."')";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();
	}

	function consultar()
	{
		$ide=$this->objEmpleados->getIdEmpleado();		
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "select * from empleados where idEmpleado = '".$ide."'";
		$rs = $objControlConexion->ejecutarSelect($comandoSql);
		$registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
		$nom = $registro["nombre"];
		$tel = $registro["telefono"];
		$car = $registro["cargo"];
		$ema = $registro["email"];
		$fki = $registro["fkIdArea"];
		$fke = $registro["fkRmple"];
		$this->objEmpleados->setNombre($nom);
		$this->objEmpleados->setTelefono($tel);
		$this->objEmpleados->setCargo($car);
		$this->objEmpleados->setEmail($ema);
		$this->objEmpleados->setFkIdArea($fki);
		$this->objEmpleados->setFkRmple($fke);
		$objControlConexion->cerrarBd();
		return $this->objEmpleados;
	}

	function modificar()
	{
		$ide=$this->objEmpleados->getIdEmpleado();
		$nom=$this->objEmpleados->getNombre();
		$tel=$this->objEmpleados->getTelefono();
		$car=$this->objEmpleados->getCargo();
		$ema=$this->objEmpleados->getEmail();
		$fki=$this->objEmpleados->getFkIdArea();
		$fke=$this->objEmpleados->getFkRmple();
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "update empleados set nombre = '".$nom."', telefono = '".$tel."', cargo = '".$car."', email = '".$ema."', fkIdArea = ".$fki.", fkRmple = '".$fke."' where idEmpleado = '".$ide."'";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();
	}

	function borrar()
	{
		$ide=$this->objEmpleados->getIdEmpleado();
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "delete from empleados where idEmpleado = '".$ide."'";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();
	}
}
	
?>