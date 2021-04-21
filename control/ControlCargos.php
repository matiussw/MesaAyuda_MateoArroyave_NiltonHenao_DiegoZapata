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
		if (empty($nom)){
			echo '<script> alert("El campo nombre no debe ser vacio")</script>';
		}else {
			$comandoSql = "INSERT INTO cargo VALUES (NULL,'".$nom."')";
			$rs=$objControlConexion->ejecutarComandoSql($comandoSql);
			echo '<script> alert("Registro guardado exitosamente")</script>';
			}
		$objControlConexion->cerrarBd();
	}

		function consultar()
	{
		$idc=$this->objCargos->getIdCargo();		
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "select * from cargo where idCargo = '".$idc."'";
		$rs = $objControlConexion->ejecutarSelect($comandoSql);
		$registro = $rs->fetch_array(MYSQLI_BOTH);
		if(empty($registro)){
			echo '<script> alert("No se encontro ningun cargo con id '.$idc.'")</script>';
			//echo "la consulta no devolvio nada "; 
		}else{
			$nom = $registro['NOMBRE'];	
			$this->objCargos->setNombre($nom);	
		}
		$objControlConexion->cerrarBd();
		return $this->objCargos;
	}

	function modificar()
	{	
		$idc=$this->objCargos->getIdCargo();
		$nom=$this->objCargos->getNombre();				
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "update cargo set NOMBRE = '".$nom."' where idCargo = '".$idc."'";
		$rs =$objControlConexion->ejecutarComandoSql($comandoSql);
		if($rs){
			
		}else{
			echo '<script> alert("modificacion realizada con exito")</script>';
		}
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

	function comboBoxCargo(){

        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $sql = "SELECT * FROM cargo";
        $recordSet = $objControlConexion->ejecutarSelect($sql);
		$matriz = array();
		$i = 0;
		while($row = $recordSet->fetch_assoc()){ 
		
			$nombre = $row['NOMBRE'];
			$idCargo = $row['IDCARGO'];
			$objArea = new Cargos($idCargo, $nombre);
			$matriz[$i] = $objArea;
			$i++;
			}
        $objControlConexion->cerrarBd();
        return $matriz;
    }
}
	
?>