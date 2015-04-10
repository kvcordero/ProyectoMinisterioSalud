<?php

include '../msAccesoDatos/CantonAccesoDatos.php';

class CantonReglasNegocios {

    //variables regarding composition
    private $cantonAccesoDatos;

    //create new object CommentData
    public function CantonReglasNegocios() {
        $this->cantonAccesoDatos = new CantonAccesoDatos();
    }

    //Insertar un canton en la base de datos
    public function insertarCanton($canton) {
        $this->cantonAccesoDatos->conectar();
        $resultado = $this->cantonAccesoDatos->insertarCanton($canton);
        $this->cantonAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Actualizar un canton en la base de datos
    public function actualizarCanton($canton) {     
        $this->cantonAccesoDatos->conectar();
        $resultado = $this->cantonAccesoDatos->actualizarCanton($canton);
        $this->cantonAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo

    //Obtener un canton en la base de datos
    public function obtenerCanton($codigoCanton) {
        $this->cantonAccesoDatos->conectar();
        $resultado = $this->cantonAccesoDatos->obtenerCanton($codigoCanton);
        $this->cantonAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo

    //Obtener los cantones de una provincia en la base de datos
    public function obtenerCantonProvincia($codigoProvincia) {      
        $this->cantonAccesoDatos->conectar();
        $resultado = $this->cantonAccesoDatos->obtenerCantonProvincia($codigoProvincia);
        $this->cantonAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo

    //Eliminar un canton en la base de datos
    public function eliminarCanton($codigoCanton) {       
        $this->cantonAccesoDatos->conectar();
        $resultado = $this->cantonAccesoDatos->eliminarCanton($codigoCanton);
        $this->cantonAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Obtener el ultimo codigo del canton
    public function obtenerUltimoCodigoCanton() {       
        $this->cantonAccesoDatos->conectar();
        $resultado = $this->cantonAccesoDatos->obtenerUltimoCodigoCanton();
        $this->cantonAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
}
?>

