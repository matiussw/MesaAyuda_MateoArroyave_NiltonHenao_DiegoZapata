<?php
include 'control/ControlConexion.php';
class User
{
   // private $nombre;
    private $username;
    private $rolname;

    public function userExists($user, $pass){
       $objControlConexion = new ControlConexion();
       $objControlConexion->abrirBd("localhost","root","","mesa_ayuda");
       $comandoSqlValidacion = "select exists (select * from usuarios where username ='".$user."' and password ='".$pass."')";
       $rss = $objControlConexion->ejecutarSelect($comandoSqlValidacion);
       
       $registroo = $rss->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
       $dato = $registroo[0];

      if($dato>0){
            return true;
        }else{
            return false;
        }
        
    }

    public function setUser($user){
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $comandoSql = "select usuarios.username as username, roles.nombre as nombrerol from usuarios inner join roles on usuarios.idRol = roles.idRol where username ='".$user."'";
        $rs = $objControlConexion->ejecutarSelect($comandoSql);
        
        $registro = $rs->fetch_array(MYSQLI_BOTH); //Asigna los datos a la variable $registro
        
        $this->username = $registro["username"];
        $this->rolname = $registro["nombrerol"];	
       
       
    }

    public function getNombre(){
        return $this->username;
    }

    public function getNombreRol(){
        return $this->rolname;
    }
}

?>