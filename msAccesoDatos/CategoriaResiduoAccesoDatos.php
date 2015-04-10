<?php

/* 
 *Clase que contiene el control de los datos.
 */
include '../msDominio/CategoriaResiduo.php';
include_once '../msAccesoDatos/ConexionAccesoDatos.php';

class CategoriaResiduoAccesoDatos extends ConexionAccesoDatos{
    
    //constructor
    public function CategoriaResiduoAccesoDatos(){
        //Se establece la coneccion a la base de datos
        parent::ConexionAccesoDatos();
    }
    
     //insertar una categoria en la base de datos
    public function insertarCategoriaResiduo($categoriaResiduo) {
        
        $consulta = "insert into tbcategoriaresiduo (idCategoriaResiduo,categoriaResiduo) values("
                .$categoriaResiduo->idCategoriaResiduo.",'".$categoriaResiduo->categoriaResiduo."');";

        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin del metodo

    //Obtener una categoria de la base de datpos
    public function obtenerCategoriaResiduo($idCategoriaResiduo) {
        $consulta = mysqli_query($this->connection, "select * from tbcategoriaresiduo where idCategoriaResiduo =".$idCategoriaResiduo.";");
        $resultado = $consulta->fetch_array();

        $categoriaResiduo = new categoriaResiduo($resultado['idCategoriaResiduo'], $resultado['categoriaResiduo']);
        return $categoriaResiduo;
    }//Fin del metodo
    
    //Obtener todas las categorias de la base de datpos
    public function obtenerCategorias() {
        $consulta = mysqli_query($this->connection, "select * from tbcategoriaresiduo");
        $arregloCategorias = [];

        while ($filaTemporal = mysqli_fetch_array($consulta)) {
            $categoriaResiduo = new categoriaResiduo($filaTemporal['idCategoriaResiduo'], $filaTemporal['categoriaResiduo']);
            array_push($arregloCategorias, $categoriaResiduo);
        }
        return $arregloCategorias;
    }//Fin del metodo

    
    //Actualizar una categoria de la base de datos
    public function actualizarCategoriaResiduo($categoriaResiduo) {
        $consulta = "Update tbcategoriaresiduo set categoriaResiduo = '" . $categoriaResiduo->categoriaResiduo ."'"
                . " where (idCategoriaResiduo=".$categoriaResiduo->idCategoriaResiduo.")";            

        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin de metodo

    //Eliminar una categoria de la base de datos
    public function eliminarCategoriaResiduo($idCategoriaResiduo) {
        $consulta = "delete from tbcategoriaresiduo where (idCategoriaResiduo = " . $idCategoriaResiduo . ");";
        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin de metodo
    
    //Obtener el ultimo codigo de una categoria
    public function obtenerUltimoCodigoCategoria() {

        $resultado = mysqli_query($this->connection, "select max(codigoCategoria) as ultimoCodigoCategoria from tbcategoriaresiduo ");
        $ultimoCodigoCategoria = 0;

        while ($filaTemporal = mysqli_fetch_array($resultado)) {
            $ultimoCodigoCategoria = $filaTemporal['ultimoCodigoCategoria'];
        }
        return $ultimoCodigoCategoria;
    }//Fin del metodo
}