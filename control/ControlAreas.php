<?php


class ControlAreas
{
	var $objAreas;

	function __construct($objAreas)
	{
		$this->objAreas=$objAreas;
	}

	function guardar()
	{
		$nom=$this->objAreas->getNombreArea();
		$fke=$this->objAreas->getFkRmple();

		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","bdmesaayuda");
		$comandoSql = "insert into areas values('".$ida."','".$nom."','".$fke."')";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();
	}

	function consultar()
	{
		$ida=$this->objAreas->getIdArea();		
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","bdmesaayuda");
		$comandoSql = "select * from areas where idArea = '".$ida."'";
		$rs = $objControlConexion->ejecutarSelect($comandoSql);
		$registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
		$nom = $registro["nombreArea"];
		$fke = $registro["fkRmple"];		
		$this->objAreas->setNombreArea($nom);
		$this->objAreas->setFkRmple($fke);		
		$objControlConexion->cerrarBd();
		return $this->objAreas;
	}

	function modificar()
	{	
		$ida=$this->objAreas->getIdArea();
		$nom=$this->objAreas->getNombreArea();
		$fke=$this->objAreas->getFkRmple();		
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","bdmesaayuda");
		$comandoSql = "update areas set nombreArea = '".$nom."', fkRmple = '".$fke."' where idArea = '".$ida."'";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();
	}

	function borrar()
	{
		$ida=$this->objAreas->getIdArea();
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","bdmesaayuda");
		$comandoSql = "delete from areas where idArea = '".$ida."'";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();
	}
}
	
?>