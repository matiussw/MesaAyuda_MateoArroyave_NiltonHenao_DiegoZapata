<?php
	
	class Areas 
	{
		var $idArea;
		var $nombreArea;
		var $fkRmple;
		
		function __construct($idArea, $nombreArea, $fkRmple)
		{
			$this->idArea=$idArea;
			$this->nombreArea=$nombreArea;
			$this->fkRmple=$fkRmple;		
		}

		function setIdArea($idArea){
			$this->idArea=$idArea;
		}
		function getIdArea(){
			return $this->idArea;
		}
		function setNombreArea($nombreArea){
			$this->nombreArea=$nombreArea;
		}
		function getNombreArea(){
			return $this->nombreArea;
		}
		function setFkRmple($fkRmple){
			$this->fkRmple=$fkRmple;
		}
		function getFkRmple(){
			return $this->fkRmple;
		}		
	}

?>