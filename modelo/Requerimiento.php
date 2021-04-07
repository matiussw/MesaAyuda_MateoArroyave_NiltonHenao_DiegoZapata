<?php
	
	class Empleados 
	{
		var $idDetalle;
		var $requerimiento;
				
		function __construct($idDetalle, $requerimiento)
		{
			$this->idDetalle=$idDetalle;
			$this->requerimiento=$requerimiento;			
			
		}

		function setIdidDetalle($idDetalle){
			$this->idDetalle=$idDetalle;
		}
		function getidDetalle(){
			return $this->idDetalle;
		}
		function setRequerimiento($requerimiento){
			$this->requerimiento=$requerimiento;
		}
		function getRequerimiento(){
			return $this->requerimiento;
		}		
	}

?>