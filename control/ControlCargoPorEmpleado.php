<?php

class ControlCargoPorEmpleado{


    var $objCargoPorEmpleado;

	function __construct($objCargoPorEmpleado)
	{
		$this->objCargoPorEmpleado=$objCargoPorEmpleado;
	}

	function guardar()
	{
		$idCargo=$this->objCargoPorEmpleado->getFkCargo();	
		$idEmple=$this->objCargoPorEmpleado->getFkEmple();
		$fechaIni=$this->objCargoPorEmpleado->getFechaIni();
    //    $fechaFin=$this->objCargoPorEmpleado->getFechaFin();
       
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "INSERT INTO cargo_por_empleado values('".$idCargo."','".$idEmple."','".$fechaIni."', NULL)";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();
	}

	function consultar()
	{
		$idCargo=$this->objCargoPorEmpleado->getFkCargo();		
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "select * from cargo_por_empleado where idArea = '".$ida."'";
		$rs = $objControlConexion->ejecutarSelect($comandoSql);
		$registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
		$nom = $registro["NOMBRE"];
		$fke = $registro["FKEMPLE"];		
		$this->objCargoPorEmpleado->setNombre($nom);
		$this->objCargoPorEmpleado->setFkEmple_Jefe($fke);		
		$objControlConexion->cerrarBd();
		return $this->objCargoPorEmpleado;
	}

	function modificar()
	{	


		$idCargo=$this->objCargoPorEmpleado->getFkCargo();	
		$idEmple=$this->objCargoPorEmpleado->getFkEmple();
		$fechaIni=$this->objCargoPorEmpleado->getFechaIni();
		$fechaFin=$this->objCargoPorEmpleado->getFechaFin();
         
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "UPDATE cargo_por_empleado SET FECHAFIN = '".$fechaFin."' where FKEMPLE ='".$idEmple."'";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();
	}

	function borrar()
	{
		$idCargo=$this->objCargoPorEmpleado->getFkCargo();	
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "delete from cargo_por_empleado where FKEMPLE = '".$idCargo."'";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();
	}



    
}


?>