<?php   

class ControlDetalleReq
{
	var $objDetalleReq;

	function __construct($objDetalleReq)
	{
		$this->objDetalleReq=$objDetalleReq;
	}

	function guardar()
	{

		$ide=$this->objDetalleReq->getidDetalle();
		$fec=$this->objDetalleReq->getfecha();
		$obs=$this->objDetalleReq->getobservacion();

		$fkre=$this->Idreque();

        $fkes=$this->objDetalleReq->getfkEstado();
		$fkem=$this->objDetalleReq->getfkEmple();
		//$fkas=$this->objDetalleReq->getfkEmpleAsignado();
	
		
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "insert into detallereq values('".$fec."','".$obs."','.$fkre.','.$fkes.','".$fkem."')";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();
	}

    function Idreque(){

        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");

        $sql = "select IDREQ from requerimiento order by IDREQ desc limit 1";
        $recordSet = $objControlConexion->ejecutarSelect($sql);
        $objControlConexion->cerrarBd();
        return $recordSet;
    }
    
}

?>