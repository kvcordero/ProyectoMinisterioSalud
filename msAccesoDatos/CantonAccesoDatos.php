<?php

include '../msDominio/Canton.php';
include_once '../msAccesoDatos/ConexionAccesoDatos.php';

class CantonAccesoDatos extends ConexionAccesoDatos {

    //Constructor de la clase canton acceso datos
    public function CantonAccesoDatos() {
        //Se establece la coneccion a la base de datos
        parent::ConexionAccesoDatos();
    }

    //insertar un canton en la base de datos
    public function insertarCanton($canton) {
        
        $consulta = "insert into tbcanton (idCanton,nombreCanton,idProvincia) values("
                .$canton->idCanton.",'".$canton->nombreCanton."',".$canton->idProvincia.");";

        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin del metodo

    //Obtener un canton de la base de datpos
    public function obtenerCanton($idCanton) {
        $consulta = mysqli_query($this->connection, "select * from tbcanton where idCanton =(" . $idCanton . ");");
        $resultado = $consulta->fetch_array();

        $canton = new Canton($resultado['idCanton'], $resultado['nombreCanton'], $resultado['idProvincia']);
        return $canton;
    }//Fin del metodo

    //Obtener los cantones de una provincia de la base de datos
    public function obtenerCantonProvincia($idProvincia) {

        $consulta = mysqli_query($this->connection, "select * from tbcanton where idProvincia =(" . $idProvincia . ");");
        $arregloCanton = [];

        while ($filaTemporal = mysqli_fetch_array($consulta)) {
            $canton = new Canton($filaTemporal['idCanton'], $filaTemporal['nombreCanton'], $filaTemporal['idProvincia']);
            array_push($arregloCanton, $canton);
        }
        return $arregloCanton;
    }//Fin del metodo

    //Actualizar un canton de la base de datos
    public function actualizarCanton($canton) {
        $consulta = "Update tbcanton set idProvincia = " . $canton->idProvincia . ",nombreCanton = '" . $canton->nombreCanton . "'"
                . " where (idCanton=".$canton->idCanton.")";            

        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin de metodo

    //Eliminar un canton de la base de datos
    public function eliminarCanton($idCanton) {
        $consulta = "delete from tbcanton where (idCanton = " . $idCanton . ");";
        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin de metodo
    
    //Obtener el ultimo codigo del canton
    public function obtenerUltimoCodigoCanton() {

        $resultado = mysqli_query($this->connection, "select max(codigoCanton) as ultimoCodigoCanton from tbcanton ");
        $ultimoCodigoCanton = 0;

        while ($filaTemporal = mysqli_fetch_array($resultado)) {
            $ultimoCodigoCanton = $filaTemporal['ultimoCodigoCanton'];
        }
        return $ultimoCodigoCanton;
    }//Fin del metodo

}
