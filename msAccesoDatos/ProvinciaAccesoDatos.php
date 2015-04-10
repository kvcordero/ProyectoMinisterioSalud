<?php

include '../msDominio/Provincia.php';
include_once '../msAccesoDatos/ConexionAccesoDatos.php';

class ProvinciaAccesoDatos extends ConexionAccesoDatos {

    //constructor de la clase provincia acceso datos
    public function ProvinciaAccesoDatos() {
        //Se establece la coneccion a la base de datos
        parent::ConexionAccesoDatos();
    }

    //Insertar una provincia en la base de datos
    public function insertarProvincia($provincia) {
        $consulta = "insert into tbprovincia (idProvincia,nombreProvincia) values("
                . $provincia->idProvincia . ", '" . $provincia->nombreProvincia . "');";

        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin del metodo

    //Obtener todas las provincias de la base de datos
    public function obtenerProvincias() {
        $resultado = mysqli_query($this->connection, "select * from tbprovincia");
        $arregloProvincias = [];

        while ($filaTemporal = mysqli_fetch_array($resultado)) {
            $provincia = new Provincia($filaTemporal['idProvincia'], $filaTemporal['nombreProvincia']);
            array_push($arregloProvincias, $provincia);
        }
        return $arregloProvincias;
    }//Fin del metodo

    //Obtener una provincia de la base de datos
    public function obtenerProvincia($idProvincia) {

        $consulta = mysqli_query($this->connection, "select * from tbprovincia where idProvincia =(" . $idProvincia . ");");
        $resultado = $consulta->fetch_array();

        $provincia = new Provincia($resultado['idProvincia'], $resultado['nombreProvincia']);
        return $provincia;
    }//Fin del metodo
    
    //Eliminar una provincia de la base de datos
    public function eliminarProvincia($idProvincia) {
        $consulta = "delete from tbprovincia where idProvincia = " . $idProvincia . ";";
        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin del metodo
    
     //Actualizar una provincia de la base de datos
     public function actualizarProvincia($provincia) {    
        $consulta = "Update tbprovincia set nombreProvincia='".$provincia->nombreProvincia."' where (idProvincia=".$provincia->idProvincia.")";            
        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
     }//Fin del metodo
     
     //Obtener el ultimo codigo de una provincia
    public function obtenerUltimoCodigoProvincia() {

        $resultado = mysqli_query($this->connection, "select max(idProvincia) as ultimoCodigoProvincia from tbprovincia ");
        $ultimoCodigoProvincia = 0;

        while ($filaTemporal = mysqli_fetch_array($resultado)) {
            $ultimoCodigoProvincia = $filaTemporal['ultimoCodigoProvincia'];
        }
        return $ultimoCodigoProvincia;
    }//Fin del metodo
}
