<?php

/* 
 *Clase que contiene el control de los datos.
 */
include '../msDominio/TipoTratamientoPrograma.php';
include_once '../msAccesoDatos/ConexionAccesoDatos.php';

class TipoTratamientoProgramaAccesoDatos extends ConexionAccesoDatos{
    
    //constructor
    public function TipoTratamientoProgramaAccesoDatos(){
        //Se establece la coneccion a la base de datos
        parent::ConexionAccesoDatos();
    }
    
     //insertar un tipoTratamientoPrograma en la base de datos
    public function insertarTipoTratamientoPrograma($tipoTratamientoPrograma) {
        
        $consulta = "insert into tbtipotratamientoprograma (idTipoTratamiento,idPrograma) values("
                .$tipoTratamientoPrograma->idTipoTratamiento.",".$tipoTratamientoPrograma->idPrograma.");";

        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin del metodo

    
     //Obtener los tipos de tratamiento de un programa de la base de datos
    public function obteneTiposTratamientosPorPrograma($idPrograma) {
        $resultado = mysqli_query($this->connection, "select * from tbtipotratamientoprograma where idProgramaResiduo=".$idPrograma.";");
        $arregloTipoTratamientoPrograma= [];

        while ($filaTemporal = mysqli_fetch_array($resultado)) {
            $tipoTratamientoPrograma = new TipoTratamientoPrograma($filaTemporal['idTipoTratamiento'], $filaTemporal['idPrograma']);
            array_push($arregloTipoTratamientoPrograma, $tipoTratamientoPrograma);
        }
        return $arregloTipoTratamientoPrograma;
    }//Fin del metodo

    
    //Eliminar un tipo de tratamiento de la base de datos
    public function eliminarTipoTratamientoPrograma($idTipoTratamiento,$idPrograma) {
        $consulta = "delete from tbtipotratamientoprograma where idTipoTratamiento = " . $idTipoTratamiento . " and idPrograma=".$idPrograma.";";
        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin del metodo

    
   
}

