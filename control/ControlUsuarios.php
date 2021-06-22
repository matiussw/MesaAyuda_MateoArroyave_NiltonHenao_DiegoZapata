<?php
class ControlUsuarios{

	var $objUsuarios;

    // se crea el objeto de la clase clientes, para acceder a los atributos que hay en el
	function __construct($objUsuarios){

		$this->objUsuarios=$objUsuarios;
	}

    function guardar(){
        // se obtiene a traves del objeto cliente los valores de los atributos de la clase Clientes
        $id=$this->objUsuarios->getIdUsuario();
        $pass=$this->objUsuarios->getPassword();
        $rol=$this->objUsuarios->getRol();
        $est=$this->objUsuarios->getEstatus();

        $objControlConexion = new ControlConexion();
        //se abre la base de datos
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $cmdSql="INSERT INTO usuarios VALUES('".$id."','".$pass."',".$rol.",".$est.")";
        $objControlConexion->ejecutarComandoSql($cmdSql);
        $objControlConexion->cerrarBd();

    }

    function consultar(){

        $dato;
        $id=$this->objUsuarios->getIdUsuario();
        $pass=$this->objUsuarios->getPassword();
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");

        $sql = "SELECT * FROM usuarios WHERE username = '".$id."' and password = '".$pass."' and estatus = "."1"."";
        $recordSet = $objControlConexion->ejecutarSelect($sql);


        if($row=mysqli_fetch_array($recordSet)){
            $this->objUsuarios->setRol($row["idRol"]);
            $dato=$row["idRol"];
        }

        $cont=mysqli_num_rows($recordSet);


        if($cont==1){
            header("location: home.php");

        }

        $objControlConexion->cerrarBd();
        return $this->objUsuarios;
    }


    function consult(){

        $id=$this->objUsuarios->getIdUsuario();
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");

        $sql = "SELECT * FROM usuarios WHERE username = '".$id."' and estatus = "."1"."";
        $recordSet = $objControlConexion->ejecutarSelect($sql);

        if($row=mysqli_fetch_array($recordSet)){
            $this->objUsuarios->setPassword($row["password"]);
            $this->objUsuarios->setRol($row["idRol"]);
        }

        $objControlConexion->cerrarBd();
        return $this->objUsuarios;
    }

    function consultarRol(){
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");

        $sql = "SELECT * FROM roles ";
        $recordSet = $objControlConexion->ejecutarSelect($sql);

        if($row=mysqli_fetch_array($recordSet)){
            $this->objUsuarios->setRol($row["idRol"]);
        }
        
        $objControlConexion->cerrarBd();
        return $this->objUsuarios;
    }

    function listar(){

        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");

        $sql = "SELECT * FROM usuarios where estatus = "."1";
        $recordSet = $objControlConexion->ejecutarSelect($sql);
        $objControlConexion->cerrarBd();
        return $recordSet;

    }

    function modificar(){
        // se obtiene a traves del objeto cliente los valores de los atributos de la clase Clientes
        $id=$this->objUsuarios->getIdUsuario();
        $pass=$this->objUsuarios->getPassword();
        $rol=$this->objUsuarios->getRol();

        $objControlConexion = new ControlConexion();

        //se abre la base de datos
        $objControlConexion->abrirBd("localhost", "root", "", "mesa_ayuda");
        $cmdSql="UPDATE usuarios SET username='".$id."', password='".$pass."', idRol=".$rol." WHERE usuario='".$id."'";
        $objControlConexion->ejecutarComandoSql($cmdSql);
        $objControlConexion->cerrarBd();
    }

    function eliminar(){
        
        $id=$this->objUsuarios->getIdUsuario();
        $pass=$this->objUsuarios->getPassword();
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBD("localhost","root","","mesa_ayuda");
        $cmdSql="UPDATE usuarios set  estatus = 0 where username='".$id."'";
        $objControlConexion->ejecutarComandoSql($cmdSql);
        $objControlConexion->cerrarBD();
    }
}
?>