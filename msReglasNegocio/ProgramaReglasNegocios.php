<?php
include '../msAccesoDatos/ProgramaAccesoDatos.php';

class ProgramaReglasNegocios {
  //variables regarding composition
    private $programaAccesoDatos;

    //create new object CommentData
    public function ProgramaReglasNegocios() {
        $this->programaAccesoDatos = new ProgramaAccesoDatos();
    }
    
    //Insertar un programa en la base de datos
    public function insertarPrograma($programa){
        //Insertar provincia se invoca al metodo en datos
         $this->programaAccesoDatos->conectar();
         $resultado = $this->programaAccesoDatos->insertarPrograma($programa);
         $this->programaAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Obtener los programa de la base de datos
    public function obtenerProgramas(){
        $this->programaAccesoDatos->conectar();
        $resultado = $this->programaAccesoDatos->obtenerProgramas();
        $this->programaAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Eliminar un programa en la base de datos    
    public function eliminarPrograma($idPrograma){
        $this->programaAccesoDatos->conectar();
        $resultado = $this->programaAccesoDatos->eliminarPrograma($idPrograma);
        $this->programaAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Obtener un programa en la base de datos
    public function obtenerPrograma($idPrograma){      
        $this->programaAccesoDatos->conectar();
        $resultado = $this->programaAccesoDatos->obtenerPrograma($idPrograma);
        $this->programaAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Actualzar un programa en la base de datos
    public function actualizarPrograma($programa){
        //Insertar provincia se invoca al metodo en datos
        $this->programaAccesoDatos->conectar();
        $resultado = $this->programaAccesoDatos->actualizarPrograma($programa);
        $this->programaAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Obtener el ultimo codigo del programa
    public function obtenerUltimoCodigoPrograma(){
        //Insertar provincia se invoca al metodo en datos
        $this->programaAccesoDatos->conectar();
        $resultado = $this->programaAccesoDatos->obtenerUltimoCodigoPrograma();
        $this->programaAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
}
?>