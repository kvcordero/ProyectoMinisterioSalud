<?php
include '../msAccesoDatos/EmpresaAccesoDatos.php';

class EmpresaReglasNegocios {
  //variables regarding composition
    private $empresaAccesoDatos;

    //create new object CommentData
    public function EmpresaReglasNegocios() {
        $this->empresaAccesoDatos = new EmpresaAccesoDatos();
    }
    
    //Insertar una empresa en la base de datos
    public function insertarEmpresa($empresa){
         $this->empresaAccesoDatos->conectar();
         $resultado = $this->empresaAccesoDatos->insertarEmpresa($empresa);
         $this->empresaAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Obtener las empresas de la base de datos
    public function obtenerEmpresas(){
        $this->empresaAccesoDatos->conectar();
        $resultado = $this->empresaAccesoDatos->obtenerEmpresas();
        $this->empresaAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Eliminar una empresa en la base de datos    
    public function eliminarEmpresa($idEmpresa){
        $this->empresaAccesoDatos->conectar();
        $resultado = $this->empresaAccesoDatos->eliminarEmpresa($idEmpresa);
        $this->empresaAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Obtener una empresa en la base de datos
    public function obtenerEmpresa($nombreEmpresa){      
        $this->empresaAccesoDatos->conectar();
        $resultado = $this->empresaAccesoDatos->obtenerEmpresa($nombreEmpresa);
        $this->empresaAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Actualzar una empresa en la base de datos
    public function actualizarEmpresa($empresa){
        //Insertar provincia se invoca al metodo en datos
        $this->empresaAccesoDatos->conectar();
        $resultado = $this->empresaAccesoDatos->actualizarEmpresa($empresa);
        $this->empresaAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Obtener el ultimo codigo de una empresa
    public function obtenerUltimoCodigoEmpresa(){
        //Insertar provincia se invoca al metodo en datos
        $this->empresaAccesoDatos->conectar();
        $resultado = $this->empresaAccesoDatos->obtenerUltimoCodigoEmpresa();
        $this->empresaAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Obtener empresas en la base de datos por su nombre
    public function autocompleteEmpresa($nombreEmpresa){      
        $this->empresaAccesoDatos->conectar();
        $resultado = $this->empresaAccesoDatos->autocompleteEmpresa($nombreEmpresa);
        $this->empresaAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
}
?>