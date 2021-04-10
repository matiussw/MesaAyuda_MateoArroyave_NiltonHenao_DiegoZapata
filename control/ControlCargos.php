<?php


class ControlCargos
{
	var $objCargos;

	function __construct($objCargos)
	{
		$this->objCargos=$objCargos;
	}

	function guardar()
	{
		$nom=$this->objCargos->getNombre();		

		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "INSERT INTO cargo VALUES (NULL,'".$nom."')";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();
	}

	function consultar()
	{
		$idc=$this->objCargos->getIdCargo();		
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "select * from cargo where idCargo = '".$idc."'";
		$rs = $objControlConexion->ejecutarSelect($comandoSql);
		$registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
		$nom = $registro["nombre"];				
		$this->objCargos->setNombre($nom);				
		$objControlConexion->cerrarBd();
		return $this->objCargos;
	}

	function modificar()
	{	
		$idc=$this->objCargos->getIdCargo();
		$nom=$this->objCargos->getNombre();				
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "update cargo set nombre = '".$nom."' where idCargo = '".$idc."'";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();
	}

	function borrar()
	{
		$idc=$this->objCargos->getIdCargo();
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "delete from cargo where idCargo = '".$idc."'";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();
	}	
}
	
?>