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
		$ida=$this->objAreas->getIdArea();	
		$nom=$this->objAreas->getNombre();
		$fke=$this->objAreas->getFkEmple_Jefe();

		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "insert into area values('".$ida."','".$nom."','".$fke."')";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();
	}

	function consultar()
	{
		$ida=$this->objAreas->getIdArea();		
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "select * from area where idArea = '".$ida."'";
		$rs = $objControlConexion->ejecutarSelect($comandoSql);
		$registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
		$nom = $registro["NOMBRE"];
		$fke = $registro["FKEMPLE"];		
		$this->objAreas->setNombre($nom);
		$this->objAreas->setFkEmple_Jefe($fke);		
		$objControlConexion->cerrarBd();
		return $this->objAreas;
	}

	function modificar()
	{	
		$ida=$this->objAreas->getIdArea();
		$nom=$this->objAreas->getNombre();
		$fke=$this->objAreas->getFkEmple_Jefe();		
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "update area set NOMBRE = '".$nom."', FKEMPLE = '".$fke."' where idArea = '".$ida."'";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();
	}

	function borrar()
	{
		$ida=$this->objAreas->getIdArea();
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "delete from area where idArea = '".$ida."'";
		$objControlConexion->ejecutarComandoSql($comandoSql);
		$objControlConexion->cerrarBd();
	}

	function comboBox(){

        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");

        $sql = "SELECT IDEMPLEADO , NOMBRE FROM empleado";
        $recordSet = $objControlConexion->ejecutarSelect($sql);
        $objControlConexion->cerrarBd();
        return $recordSet;
    }
}
	
?>