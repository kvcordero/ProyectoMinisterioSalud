<?php
include '../msAccesoDatos/DistritoAccesoDatos.php';

class DistritoReglasNegocios {

    //variables regarding composition
    private $distritoAccesoDatos;

    //create new object CommentData
    public function DistritoReglasNegocios() {
        $this->distritoAccesoDatos = new DistritoAccesoDatos();
    }

    //Insertar un distrito en la base de datos
    public function insertarDistrito($distrito) {
        $this->distritoAccesoDatos->conectar();
        $resultado = $this->distritoAccesoDatos->insertarDistrito($distrito);
        $this->distritoAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Actualizar un distrito en la base de datos
    public function actualizarDistrito($distrito) {
        $this->distritoAccesoDatos->conectar();
        $resultado = $this->distritoAccesoDatos->actualizarDistrito($distrito);
        $this->distritoAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo

    //Obtener un distrito en la base de datos
    public function obtenerDistrito($codigoDistrito) {
        $this->distritoAccesoDatos->conectar();
        $resultado = $this->distritoAccesoDatos->obtenerDistrito($codigoDistrito);
        $this->distritoAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo

    //Obtener un distrito por canton en la base de datos
    public function obtenerDistritoPorCanton($codigoCanton) {
        $this->distritoAccesoDatos->conectar();
        $resultado = $this->distritoAccesoDatos->obtenerDistritoPorCanton($codigoCanton);
        $this->distritoAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Eliminar un distrito por canton en la base de datos
    public function eliminarDistrito($codigoDistrito) {
        $this->distritoAccesoDatos->conectar();
        $resultado = $this->distritoAccesoDatos->eliminarDistrito($codigoDistrito);
        $this->distritoAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    //
    //Obtener el ultimo codigo del distrito
    public function obtenerUltimoCodigoDistrito() {
        $this->distritoAccesoDatos->conectar();
        $resultado = $this->distritoAccesoDatos->obtenerUltimoCodigoDistrito();
        $this->distritoAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
}  
?>

