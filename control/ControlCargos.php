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
		$idCargo=$this->objCargos->getIdCargo();
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
		//Consulta primero si el dato existe
		$comandoSqlValidacion="select exists (select * from cargo where idCargo = '".$idc."')";
		$rss = $objControlConexion->ejecutarSelect($comandoSqlValidacion);
		$registroo = $rss->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
		$dato = $registroo[0];

		if(empty($idc)){
			echo '<script> alert("El campo no puede estar vacio")</script>';
			//echo "la consulta no devolvio nada "; 
		}elseif($dato==0){
			echo '<script>alert("Registro no encontrado en la base de datos")</script>';			
		}else{
			$nom = $registro["NOMBRE"];	
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
		//primero consulta si existe el registro
		$comandoSqlValidacion="select exists (select * from cargo where idCargo = '".$idc."')";
		$rss = $objControlConexion->ejecutarSelect($comandoSqlValidacion);
		$registro = $rss->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
		$dato = $registro[0];
		if(empty($idc)){
			echo '<script> alert("El campo no puede estar vacio")</script>';
		}elseif ($dato==0) {    
			echo '<script> alert("Registro no encontrado en la base de datos, por favor ingrese un registro valido")</script>';		
		}else{		
			$comandoSql = "update cargo set NOMBRE = '".$nom."' where idCargo = '".$idc."'";
			$rs =$objControlConexion->ejecutarComandoSql($comandoSql);             
			echo '<script> alert("Registro modificado con exito")</script>';		
		}	
		$objControlConexion->cerrarBd();	
	}

	function borrar()
	{
		$idc=$this->objCargos->getIdCargo();
		$objControlConexion = new ControlConexion();
		$objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
		$comandoSql = "delete from cargo where idCargo = '".$idc."'";
		//primero consulta si existe el registro
		$comandoSqlValidacion="select exists (select * from cargo where idCargo = '".$idc."')";
		$rss = $objControlConexion->ejecutarSelect($comandoSqlValidacion);
		$registro = $rss->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
		$dato = $registro[0];
		if(empty($idc)){
			echo '<script> alert("El campo no debe estar vacio")</script>';
		}elseif($dato==0){
			echo '<script> alert("El registro no se puede borrar por que no existe en la bdd")</script>';				
		
		}else {
		$objControlConexion->ejecutarComandoSql($comandoSql);
		echo '<script> alert("El Cargo ha sido borrado con exito")</script>';
		}
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