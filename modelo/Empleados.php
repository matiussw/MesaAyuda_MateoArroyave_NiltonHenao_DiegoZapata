<?php
	
	class Empleados 
	{
		var $idEmpleado;
		var $nombre;
		var $telefono;
		var $cargo;
		var $email;
		var $fkIdArea;
		var $fkRmple;
		
		function __construct($idEmpleado, $nombre, $telefono, $cargo, $email, $fkIdArea, $fkRmple)
		{
			$this->idEmpleado=$idEmpleado;
			$this->nombre=$nombre;
			$this->telefono=$telefono;
			$this->cargo=$cargo;
			$this->email=$email;
			$this->fkIdArea=$fkIdArea;
			$this->fkRmple=$fkRmple;
			
		}

		function setIdAmpleado($idEmpleado){
			$this->idEmpleado=$idEmpleado;
		}
		function getIdEmpleado(){
			return $this->idEmpleado;
		}
		function setNombre($nombre){
			$this->nombre=$nombre;
		}
		function getNombre(){
			return $this->nombre;
		}
		function setTelefono($telefono){
			$this->telefono=$telefono;
		}
		function getTelefono(){
			return $this->telefono;
		}
		function setCargo($cargo){
			$this->cargo=$cargo;
		}
		function getCargo(){
			return $this->cargo;
		}
		function setEmail($email){
			$this->email=$email;
		}
		function getEmail(){
			return $this->email;
		}
		function setFkIdArea($fkIdArea){
			$this->fkIdArea=$fkIdArea;
		}
		function getFkIdArea(){
			return $this->fkIdArea;
		}
		function setFkRmple($fkRmple){
			$this->fkRmple=$fkRmple;
		}
		function getFkRmple(){
			return $this->fkRmple;
		}
		
	}

?>