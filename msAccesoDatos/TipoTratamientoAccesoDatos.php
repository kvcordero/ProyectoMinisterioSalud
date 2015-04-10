<?php

/* 
 *Clase que contiene el control de los datos.
 */
include '../msDominio/TipoTratamiento.php';
include_once '../msAccesoDatos/ConexionAccesoDatos.php';

class TipoTratamientoAccesoDatos extends ConexionAccesoDatos{
    
    //constructor
    public function TipoTratamientoAccesoDatos(){
        //Se establece la coneccion a la base de datos
        parent::ConexionAccesoDatos();
    }
    
     //insertar un tipoTratamiento en la base de datos
    public function insertarTipoTratamiento($tipoTratamiento) {
        
        $consulta = "insert into tbtipotratamiento (idTipoTratamiento,tratamiento) values("
                .$tipoTratamiento->idTipoTratamiento.",'".$tipoTratamiento->tratamiento."');";

        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin del metodo

    //Obtener un tipoTratamiento de la base de datpos
    public function obtenerTipoTratamiento($idTipoTratamiento) {
        $consulta = mysqli_query($this->connection, "select * from tbtipotratamiento where idTipoTratamiento =(" . $idTipoTratamiento . ");");
        $resultado = $consulta->fetch_array();

        $tipoTratamiento = new tipoTratamiento($resultado['idTipoTratamiento'], $resultado['tratamiento']);
        return $tipoTratamiento;
    }//Fin del metodo

    
    //Actualizar un tipoTratamiento de la base de datos
    public function actualizarTipoTratamiento($tipoTratamiento) {
        $consulta = "Update tbtipotratamiento set tratamiento = '" . $tipoTratamiento->tratamiento ."'"
                . " where (idTipoTratamiento=".$tipoTratamiento->idTipoTratamiento.")";            

        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin de metodo

    //Eliminar un tipoTratamiento de la base de datos
    public function eliminarTipoTratamiento($idTipoTratamiento) {
        $consulta = "delete from tbtipotratamiento where (idTipoTratamiento = " . $idTipoTratamiento . ");";
        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin de metodo
    
    //Obtener el ultimo codigo del tipo tratamiento
    public function obtenerUltimoCodigoTipoTratamiento() {

        $resultado = mysqli_query($this->connection, "select max(idTipoTratamiento) as ultimoCodigoTipoTratamiento from tbtipotratamiento ");
        $ultimoCodigoTipoTratamiento = 0;

        while ($filaTemporal = mysqli_fetch_array($resultado)) {
            $ultimoCodigoTipoTratamiento = $filaTemporal['ultimoCodigoTipoTratamiento'];
        }
        return $ultimoCodigoTipoTratamiento;
    }//Fin del metodo

}