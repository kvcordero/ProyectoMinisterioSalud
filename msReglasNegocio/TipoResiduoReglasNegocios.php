<?php
include '../msAccesoDatos/TipoResiduoAccesoDatos.php';

class TipoResiduoReglasNegocios {
  //variables regarding composition
    private $tipoResiduoAccesoDatos;

    //create new object CommentData
    public function TipoResiduoReglasNegocios() {
        $this->tipoResiduoAccesoDatos = new TipoResiduoAccesoDatos();
    }
    
    //Insertar un tipo de residuo en la base de datos
    public function insertarTipoResiduo($tipoResiduo){
        //Insertar provincia se invoca al metodo en datos
         $this->tipoResiduoAccesoDatos->conectar();
         $resultado = $this->tipoResiduoAccesoDatos->insertarTipoResiduo($tipoResiduo);
         $this->tipoResiduoAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Obtener los tipos de residuos de la base de datos
    public function obtenerTiposResiduos(){
        $this->tipoResiduoAccesoDatos->conectar();
        $resultado = $this->tipoResiduoAccesoDatos->obtenerTiposResiduos();
        $this->tipoResiduoAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Obtener los tipos de residuos de la base de datos
    public function obtenerTiposResiduosCategoria($idCategoria){
        $this->tipoResiduoAccesoDatos->conectar();
        $resultado = $this->tipoResiduoAccesoDatos->obtenerTiposResiduosCategoria($idCategoria);
        $this->tipoResiduoAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Eliminar un tipo de residuo en la base de datos    
    public function eliminarTipoResiduo($idTipoResiduo){
        $this->tipoResiduoAccesoDatos->conectar();
        $resultado = $this->tipoResiduoAccesoDatos->eliminarTipoResiduo($idTipoResiduo);
        $this->tipoResiduoAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Obtener un tipo de residuo en la base de datos
    public function obtenerTipoResiduo($idTipoResiduo){      
        $this->tipoResiduoAccesoDatos->conectar();
        $resultado = $this->tipoResiduoAccesoDatos->obtenerTipoResiduo($idTipoResiduo);
        $this->tipoResiduoAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Actualzar un tipo de residuo en  la base de datos
    public function actualizarTipoResiduo($tipoResiduo){
        //Insertar provincia se invoca al metodo en datos
        $this->tipoResiduoAccesoDatos->conectar();
        $resultado = $this->tipoResiduoAccesoDatos->actualizarTipoResiduo($tipoResiduo);
        $this->tipoResiduoAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Obtener el ultimo codigo del tipo residuo
    public function obtenerUltimoCodigoTipoResiduo(){
        //Insertar provincia se invoca al metodo en datos
        $this->tipoResiduoAccesoDatos->conectar();
        $resultado = $this->tipoResiduoAccesoDatos->obtenerUltimoCodigoTipoResiduo();
        $this->tipoResiduoAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
}
?>