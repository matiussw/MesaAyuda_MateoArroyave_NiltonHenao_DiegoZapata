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

		$fkre=$this->objDetalleReq->getfkReque();

        $fkes=$this->objDetalleReq->getfkEstado();
		$fkem=$this->objDetalleReq->getfkEmple();

		//$fkas=$this->objDetalleReq->getfkEmpleAsignado();
	
		
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "insert into detallereq values(NULL,'".$fec."','".$obs."','".$fkre."','". $fkes."','".$fkem."',NULL)";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();
		echo '<script> alert("Su solicitud se ha radicada exitosamente. Ahora Será redirigido al índice")</script>';
		echo"<script> window.location='../index.html';</script>";

	}

    
}

?>