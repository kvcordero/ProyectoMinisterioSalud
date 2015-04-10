<?php

include '../msDominio/TipoResiduo.php';
include_once '../msAccesoDatos/ConexionAccesoDatos.php';

class TipoResiduoAccesoDatos extends ConexionAccesoDatos {

    //constructor de la clase tipo residuo acceso datos
    public function TipoResiduoAccesoDatos() {
        //Se establece la coneccion a la base de datos
        parent::ConexionAccesoDatos();
    }

    //Insertar un tipo de residuos en la base de datos
    public function insertarTipoResiduo($tipoResiduo) {
        $consulta = "insert into tbtiporesiduo (idTipoResiduo,tipoResiduo,idCategoria) values("
                . $tipoResiduo->idTipoResiduo . ", '" . $tipoResiduo->tipoResiduo."',".$tipoResiduo->idCategoria.");";

        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin del metodo

    //Obtener los tipos de residuos de la base de datos
    public function obtenerTiposResiduos() {
        $resultado = mysqli_query($this->connection, "select * from tbtiporesiduo");
        $arregloTipoResiduos= [];

        while ($filaTemporal = mysqli_fetch_array($resultado)) {
            $tipoResiduo = new TipoResiduo($filaTemporal['idTipoResiduo'], $filaTemporal['tipoResiduo'],$filaTemporal['idCategoria']);
            array_push($arregloTipoResiduos, $tipoResiduo);
        }
        return $arregloTipoResiduos;
    }//Fin del metodo
    
    //Obtener los tipos de residuos de la base de datos por categoria
    public function obtenerTiposResiduosCategoria($idCategoria) {
        $resultado = mysqli_query($this->connection, "select * from tbtiporesiduo where idCategoria=".$idCategoria."");
        $arregloTipoResiduos= [];

        while ($filaTemporal = mysqli_fetch_array($resultado)) {
            $tipoResiduo = new TipoResiduo($filaTemporal['idTipoResiduo'], $filaTemporal['tipoResiduo'],$filaTemporal['idCategoria']);
            array_push($arregloTipoResiduos, $tipoResiduo);
        }
        return $arregloTipoResiduos;
    }//Fin del metodo

    //Obtener un tipo de residuo de la base de datos
    public function obtenerTipoResiduo($idTipoResiduo) {

        $consulta = mysqli_query($this->connection, "select * from tbtiporesiduo where idTipoResiduo=(" . $idTipoResiduo . ");");
        $resultado = $consulta->fetch_array();

        $ocupacion = new Ocupacion($resultado['idTipoResiduo'], $resultado['tipoResiduo'],$resultado['idCategoria']);
        return $ocupacion;
    }//Fin del metodo
    
    //Eliminar un tipo de residuo de la base de datos
    public function eliminarTipoResiduo($idTipoResiduo) {
        $consulta = "delete from tbtiporesiduo where idTipoResiduo = " . $idTipoResiduo . ";";
        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin del metodo

    
     //actualizar un tipo de residuo de la base de datos
      public function actualizarTipoResiduo($tipoResiduo) {    
        $consulta = "Update tbtiporesiduo set tipoResiduo='".$tipoResiduo->tipoResiduo."',idCategoria=".$tipoResiduo->idCategoria." where (idTipoResiduo=".$tipoResiduo->idTipoResiduo.")";            
        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
     }//Fin del metodo
     
      //Obtener el ultimo codigo del tipo residuo
    public function obtenerUltimoCodigoTipoResiduo() {

        $resultado = mysqli_query($this->connection, "select max(idTipoResiduo) as ultimoCodigoTipoResiduo from tbtiporesiduo ");
        $ultimoCodigoTipoResiduo = 0;

        while ($filaTemporal = mysqli_fetch_array($resultado)) {
            $ultimoCodigoTipoResiduo = $filaTemporal['ultimoCodigoTipoResiduo'];
        }
        return $ultimoCodigoTipoResiduo;
    }//Fin del metodo

}
