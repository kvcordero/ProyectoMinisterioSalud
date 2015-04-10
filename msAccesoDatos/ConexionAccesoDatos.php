<?php

/*clase adConfigBaseDatos
 *configuarcion para el acceso a la base de datos 
*/

class ConexionAccesoDatos{

	//variables
    public $server;
    public $user;
    public $password;
    public $dbName;
    public $connection;

    //constructor
    public function ConexionAccesoDatos() {
        $this->server = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->dbName = "bdministeriosalud";
        
//        $this->server = "163.178.107.130";
//        $this->user = "adm";
//        $this->password = "saucr.092";
//        $this->dbName = "bdministeriosalud";
    }

    //connection method
    public function conectar() {
        $this->connection = mysqli_connect($this->server, $this->user, $this->password, $this->dbName);
        return $this->connection;
    }

    // close the connection
    public function cerrarConexion() {
        mysqli_close($this->connection);
    }
}