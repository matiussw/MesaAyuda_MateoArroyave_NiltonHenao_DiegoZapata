<?php
	
	class Empleados 
	{
		var $idEmpleado;
		var $nombre;
		var $foto;
		var $hojaVida;
		var $telefono;
		var $email;
		var $direccion;
		var $x;
		var $y;
		var $fkArea;
		var $fkRmple;
		
		function __construct($idEmpleado, $nombre, $foto, $hojaVida, $telefono, $email, $direccion, $x, $y, $fkEmple_Jefe, $fkArea,)
		{
			$this->idEmpleado=$idEmpleado;
			$this->nombre=$nombre;
			$this->foto=$foto;
			$this->hojaVida=$nombre;
			$this->telefono=$telefono;
			$this->email=$email;
			$this->direccion=$direccion;
			$this->x=$x;
			$this->y=$y;
			$this->fkEmple_Jefe=$fkEmple_Jefe;
			$this->fkArea=$fkArea;
			
			
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
		function setFoto($foto){
			$this->foto=$foto;
		}
		function getFoto(){
			return $this->foto;
		}
		function setEmail($email){
			$this->email=$email;
		}
		function getEmail(){
			return $this->email;
		}
		function setFkArea($fkIdArea){
			$this->fkArea=$fkArea;
		}
		function getFkArea(){
			return $this->fkArea;
		}
		function setFkEmple_Jefe($fkEmple_Jefe){
			$this->fkEmple_Jefe=$fkEmple_Jefe;
		}
		function getFkEmple_Jefe(){
			return $this->fkEmple_Jefe;
		}
		function setDireccion($direccion){
			$this->direccion=$direccion;
		}
		function getDireccion(){
			return $this->direccion;
		}
		function setX($x){
			$this->x=$x;
		}
		function getX(){
			return $this->x;
		}
		function setY($y){
			$this->y=$y;
		}
		function getY(){
			return $this->y;
		}
		function setHojaVida($hojaVida){
			$this->hojaVida=$hojaVida;
		}
		function getHojaVida(){
			return $this->hojaVida;
		}
		
	}

?>