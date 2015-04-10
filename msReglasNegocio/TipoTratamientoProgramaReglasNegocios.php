<?php

/* 
 * Clase de acceso a la capa Acceso Datos
 */
include '../msAccesoDatos/TipoTratamientoProgramaAccesoDatos.php';

class TipoTratamientoProgramaReglasNegocio{
    
    //variables regarding composition
    private $TipoTratamientoProgramaAccesoDatos;
    
    //create new object CommentData
    public function TipoTratamientoProgramaReglasNegocio() {
        $this->TipoTratamientoProgramaAccesoDatos = new TipoTratamientoProgramaAccesoDatos();
    }

    //Insertar un TipoTratamientoPrograma en la base de datos
    public function insertarTipoTratamientoPrograma($tipoTratamientoPrograma) {
        $this->TipoTratamientoProgramaAccesoDatos->conectar();
        $resultado = $this->TipoTratamientoProgramaAccesoDatos->insertarTipoTratamientoPrograma($tipoTratamientoPrograma);
        $this->TipoTratamientoProgramaAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
   
    //Obtener un TipoTratamientoPrograma en la base de datos
    public function obteneTiposTratamientosPorPrograma($idPrograma) {
        $this->TipoTratamientoProgramaAccesoDatos->conectar();
        $resultado = $this->TipoTratamientoProgramaAccesoDatos->obteneTiposTratamientosPorPrograma($idPrograma);
        $this->TipoTratamientoProgramaAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
     //Obtener un TipoTratamientoPrograma en la base de datos
    public function eliminarTipoTratamientoPrograma($idTipoTratamiento,$idPrograma) {
        $this->TipoTratamientoProgramaAccesoDatos->conectar();
        $resultado = $this->TipoTratamientoProgramaAccesoDatos->eliminarTipoTratamientoPrograma($idTipoTratamiento,$idPrograma);
        $this->TipoTratamientoProgramaAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo

}

