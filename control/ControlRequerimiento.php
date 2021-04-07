<?php


class ControlRequerimiento
{
	var $objRequerimiento;

	function __construct($objRequerimiento)
	{
		$this->objRequerimiento=$objRequerimiento;
	}

	function guardar()
	{
		$ida=$this->objRequerimiento->getidArea();
		$req=$this->objRequerimiento->getRequerimiento();

		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "insert into requerimiento values('".$ida."','".$nom."','".$fke."')";
		$comandoSql1 = "insert into detallereq values('".$ida."','".$nom."','".$fke."')";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->ejecutarComandoSql($comandoSql1);
		$objControlConexion->cerrarBd();
	}
}
	
?>