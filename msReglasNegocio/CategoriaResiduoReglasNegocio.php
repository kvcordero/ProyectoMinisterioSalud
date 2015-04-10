<?php

/* 
 * Clase de acceso a la capa Acceso Datos
 */
include '../msAccesoDatos/CategoriaResiduoAccesoDatos.php';

class CategoriaResiduoReglasNegocio{
    
    //variables regarding composition
    private $categoriaResiduoAccesoDatos;
    
    //create new object CommentData
    public function CategoriaResiduoReglasNegocio() {
        $this->categoriaResiduoAccesoDatos = new CategoriaResiduoAccesoDatos();
    }

    //Insertar una categoria en la base de datos
    public function insertarCategoriaResiduo($categoriaResiduo) {
        $this->categoriaResiduoAccesoDatos->conectar();
        $resultado = $this->categoriaResiduoAccesoDatos->insertarCategoriaResiduo($categoriaResiduo);
        $this->categoriaResiduoAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Actualizar una categoria en la base de datos
    public function actualizarCategoriaResiduo($categoriaResiduo) {     
        $this->categoriaResiduoAccesoDatos->conectar();
        $resultado = $this->categoriaResiduoAccesoDatos->actualizarCategoriaResiduo($categoriaResiduo);
        $this->categoriaResiduoAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo

    //Obtener una categoria en la base de datos
    public function obtenerCategoriaResiduo($idCategoriaResiduo) {
        $this->cantonAccesoDatos->conectar();
        $resultado = $this->categoriaResiduoAccesoDatos->obtenerCategoriaResiduo($idCategoriaResiduo);
        $this->categoriaResiduoAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo

    
    //Eliminar una categoria en la base de datos
    public function eliminarCategoriaResiduo($idCategoriaResiduo) {       
        $this->categoriaResiduoAccesoDatos->conectar();
        $resultado = $this->categoriaResiduoAccesoDatos->eliminarCategoriaResiduo($idCategoriaResiduo);
        $this->categoriaResiduoAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Obtener el ultimo codigo de una categoria
    public function obtenerUltimoCodigoCategoria() {       
        $this->categoriaResiduoAccesoDatos->conectar();
        $resultado = $this->categoriaResiduoAccesoDatos->obtenerUltimoCodigoCategoria();
        $this->categoriaResiduoAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
}