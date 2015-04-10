<?php

include '../msDominio/Distrito.php';
include_once '../msAccesoDatos/ConexionAccesoDatos.php';

class DistritoAccesoDatos extends ConexionAccesoDatos {

    //constructor de la clase distrio acceso datos
    public function DistritoAccesoDatos() {
        //Se establece la coneccion a la base de datos
        parent::ConexionAccesoDatos();
    }

    //Insertar un distrito en la base de datos
    public function insertarDistrito($distrito) {
        
        $consulta = "insert into tbdistrito (idDistrito,nombreDistrito,idCanton) values("
                .$distrito->idDistrito.",'".$distrito->nombreDistrito."',".$distrito->idCanton.");";

        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin del metodo

    //Obtene un distrito de la base de datos
    public function obtenerDistrito($idDistrito) {
        $consulta = mysqli_query($this->connection, "select * from tbdistrito where idDistrito =(" . $idDistrito . ");");
        $resultado = $consulta->fetch_array();

        $distrito = new Distrito($resultado['idDistrito'], $resultado['nombreDistrito'], $resultado['nombreDistrito']);
        return $distrito;
    }//Fin del metodo

    //Obtener los distritos de un canton de la base de datos
    public function obtenerDistritoPorCanton($codigoCanton) {

        $consulta = mysqli_query($this->connection, "select * from tbdistrito where codigoCanton =(" . $codigoCanton . ");");
        $arregloDistrito = [];

        while ($filaTemporal = mysqli_fetch_array($consulta)) {
            $distrito = new Distrito($filaTemporal['idDistrito'], $filaTemporal['nombreDistrito'], $filaTemporal['nombreDistrito']);
            array_push($arregloDistrito, $distrito);
        }
        return $arregloDistrito;
    }//Fin del metodo

    //Eliminar un distrito de la base de datos
    public function eliminarDistrito($idDistrito) {
        $consulta = "delete from tbdistrito where idDistrito = " . $idDistrito . ";";
        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin de metodo
     
     //Actualizar un distrito de la base de datos
     public function actualizarDistrito($distrito) {    
        $consulta = "Update tbdistrito set nombreDistrito='".$distrito->nombreDistrito."',idCanton=".$distrito->idCanton." where (idDistrito=".$distrito->idDistrito.")";            
        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
     }//Fin de metodo
     
     //Obtener el ultimo codigo del distrito
    public function obtenerUltimoCodigoDistrito() {

        $resultado = mysqli_query($this->connection, "select max(idDistrito) as ultimoCodigoDistrito from tbdistrito ");
        $ultimoCodigoDistrito = 0;

        while ($filaTemporal = mysqli_fetch_array($resultado)) {
            $ultimoCodigoDistrito = $filaTemporal['ultimoCodigoDistrito'];
        }
        return $ultimoCodigoDistrito;
    }//Fin del metodo
}

