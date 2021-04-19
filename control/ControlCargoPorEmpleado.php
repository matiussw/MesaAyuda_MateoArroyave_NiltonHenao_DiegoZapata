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
        $fechaFin=$this->objCargoPorEmpleado->getFechaFin();
echo $fechaIni;
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "INSERT INTO cargo_por_empleado values('.$idCargo.','".$idEmple."','2021-04-12', NULL)";
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
		$ida=$this->objCargoPorEmpleado->getIdArea();
		$nom=$this->objCargoPorEmpleado->getNombre();
		$fke=$this->objCargoPorEmpleado->getFkEmple_Jefe();		
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "update area set NOMBRE = '".$nom."', FKEMPLE = '".$fke."' where idArea = '".$ida."'";
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