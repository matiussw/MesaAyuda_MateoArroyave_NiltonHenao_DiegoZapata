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
		
		$are=$this->objRequerimiento->getfkArea();

		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "INSERT INTO requerimiento VALUES (NULL,'".$are."')";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();
	}

		
    function Idreque(){

        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");

        $sql = "select IDREQ from requerimiento order by IDREQ desc limit 1";
        $recordSet = $objControlConexion->ejecutarSelect($sql);

		$idreque=$recordSet->fetch_assoc();
		$id=$idreque['IDREQ'];
        $objControlConexion->cerrarBd();
        return $id;
    }
}
	
?>