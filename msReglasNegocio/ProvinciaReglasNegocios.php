<?php
include '../msAccesoDatos/ProvinciaAccesoDatos.php';

class ProvinciaReglasNegocios {
  //variables regarding composition
    private $provinciaAccesoDatos;

    //create new object CommentData
    public function ProvinciaReglasNegocios() {
        $this->provinciaAccesoDatos = new ProvinciaAccesoDatos();
    }
    
    //Insertar una provincia en la base de datos
    public function insertarProvincia($provincia){
        //Insertar provincia se invoca al metodo en datos
         $this->provinciaAccesoDatos->conectar();
         $resultado = $this->provinciaAccesoDatos->insertarProvincia($provincia);
         $this->provinciaAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Obtener las provincias de la base de datos
    public function obtenerProvincias(){
        $this->provinciaAccesoDatos->conectar();
        $resultado = $this->provinciaAccesoDatos->obtenerProvincias();
        $this->provinciaAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Eliminar una provincia en la base de datos    
    public function eliminarProvincia($codigoProvincia){
        $this->provinciaAccesoDatos->conectar();
        $resultado = $this->provinciaAccesoDatos->eliminarProvincia($codigoProvincia);
        $this->provinciaAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Obtener una provincia en la base de datos
    public function obtenerProvincia($codigoProvincia){      
        $this->provinciaAccesoDatos->conectar();
        $resultado = $this->provinciaAccesoDatos->obtenerProvincia($codigoProvincia);
        $this->provinciaAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Actualzar una provincia en la base de datos
    public function actualizarProvincia($provincia){
        //Insertar provincia se invoca al metodo en datos
        $this->provinciaAccesoDatos->conectar();
        $resultado = $this->provinciaAccesoDatos->actualizarProvincia($provincia);
        $this->provinciaAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Obtener el ultimo codigo de una provincia
    public function obtenerUltimoCodigoProvincia(){
        //Insertar provincia se invoca al metodo en datos
        $this->provinciaAccesoDatos->conectar();
        $resultado = $this->provinciaAccesoDatos->obtenerUltimoCodigoProvincia();
        $this->provinciaAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
}
?>