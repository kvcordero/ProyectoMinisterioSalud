<?php

include '../msDominio/TipoResiduoPrograma.php';
include_once '../msAccesoDatos/ConexionAccesoDatos.php';

class TipoResiduoProgramaAccesoDatos extends ConexionAccesoDatos {

    //constructor de la clase tipo residuo programa acceso datos
    public function TipoResiduoProgramaAccesoDatos() {
        //Se establece la coneccion a la base de datos
        parent::ConexionAccesoDatos();
    }

    //Insertar los tipos de residuos que pertenecen a un programa en la base de datos
    public function insertarTipoResiduoPrograma($tipoResiduoPrograma) {
        $consulta = "insert into tbtiporesiduoprograma (idTipoResiduo,idProgramaResiduo,aproximado) values("
                . $tipoResiduoPrograma->idTipoResiduo . ", " . $tipoResiduoPrograma->idProgramaResiduo . ",".$tipoResiduoPrograma->aproximado.");";

        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin del metodo

    //Obtener los tipos de residuos de un programa de la base de datos
    public function obteneTiposResiduosPorPrograma($idProgramaResiduo) {
        $resultado = mysqli_query($this->connection, "select * from tbtiporesiduoprograma where idProgramaResiduo=".$idProgramaResiduo.";");
        $arregloTipoResiduosPrograma= [];

        while ($filaTemporal = mysqli_fetch_array($resultado)) {
            $tipoResiduoPrograma = new TipoResiduoPrograma($filaTemporal['idTipoResiduo'], $filaTemporal['idProgramaResiduo'],$filaTemporal['aproximado']);
            array_push($arregloTipoResiduosPrograma, $tipoResiduoPrograma);
        }
        return $arregloTipoResiduosPrograma;
    }//Fin del metodo

    
    //Obtener los tipos de residuos de un programa de la base de datos
    public function obteneTiposResiduosPrograma($idTipoResiduo) {
        $resultado = mysqli_query($this->connection, "select * from tbtiporesiduoprograma where idTipoResiduo=".$idTipoResiduo.";");
        $arregloTipoResiduosPrograma= [];

        while ($filaTemporal = mysqli_fetch_array($resultado)) {
            $tipoResiduoPrograma = new TipoResiduoPrograma($filaTemporal['idTipoResiduo'], $filaTemporal['idProgramaResiduo'],$filaTemporal['aproximado']);
            array_push($arregloTipoResiduosPrograma, $tipoResiduoPrograma);
        }
        return $arregloTipoResiduosPrograma;
    }//Fin del metodo


    
    //Eliminar un tipo de residuo de la base de datos
    public function eliminarTipoResiduoPrograma($idTipoResiduo,$idProgramaResiduo) {
        $consulta = "delete from tbtiporesiduoprograma where idTipoResiduo = " . $idTipoResiduo . " and idProgramaResiduo=".$idProgramaResiduo.";";
        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin del metodo
}
