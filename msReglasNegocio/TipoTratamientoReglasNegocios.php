<?php

/* 
 * Clase de acceso a la capa Acceso Datos
 */
include '../msAccesoDatos/TipoTratamientoAccesoDatos.php';

class TipoTratamientoReglasNegocio{
    
    //variables regarding composition
    private $TipoTratamientoAccesoDatos;
    
    //create new object CommentData
    public function TipoTratamientoReglasNegocio() {
        $this->TipoTratamientoAccesoDatos = new TipoTratamientoAccesoDatos();
    }

    //Insertar un TipoTratamiento en la base de datos
    public function insertarTipoTratamiento($tipoTratamiento) {
        $this->TipoTratamientoAccesoDatos->conectar();
        $resultado = $this->TipoTratamientoAccesoDatos->insertarTipoTratamiento($tipoTratamiento);
        $this->TipoTratamientoAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Actualizar un tipoTratamiento en la base de datos
    public function actualizarTipoTratamiento($tipoTratamiento) {     
        $this->TipoTratamientoAccesoDatos->conectar();
        $resultado = $this->TipoTratamientoAccesoDatos->actualizarTipoTratamiento($tipoTratamiento);
        $this->TipoTratamientoAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo

    //Obtener un tipoTratamiento en la base de datos
    public function obtenerTipoTratamiento($idTipoTratamiento) {
        $this->TipoTratamientoAccesoDatos->conectar();
        $resultado = $this->TipoTratamientoAccesoDatos->obtenerTipoTratamiento($idTipoTratamiento);
        $this->TipoTratamientoAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo

    
    //Eliminar un tipoTratamiento en la base de datos
    public function eliminarTipoTratamiento($idTipoTratamiento) {       
        $this->TipoTratamientoAccesoDatos->conectar();
        $resultado = $this->TipoTratamientoAccesoDatos->eliminarTipoTratamiento($idTipoTratamiento);
        $this->TipoTratamientoAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Obtener el ultimo codigo del tipo tratamiento
    public function obtenerUltimoCodigoTipoTratamiento() {       
        $this->TipoTratamientoAccesoDatos->conectar();
        $resultado = $this->TipoTratamientoAccesoDatos->obtenerUltimoCodigoTipoTratamiento();
        $this->TipoTratamientoAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
}

