<?php
include '../msAccesoDatos/GestorAccesoDatos.php';

class GestorReglasNegocios {
  //variables regarding composition
    private $gestorAccesoDatos;

    //create new object CommentData
    public function GestorReglasNegocios() {
        $this->gestorAccesoDatos = new GestorAccesoDatos();
    }
    
    //Insertar un gestor en la base de datos
    public function insertarGestor($gestor){
         $this->gestorAccesoDatos->conectar();
         $resultado = $this->gestorAccesoDatos->insertarGestor($gestor);
         $this->gestorAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Obtener los gestores de la base de datos
    public function obtenerGestores(){
        $this->gestorAccesoDatos->conectar();
        $resultado = $this->gestorAccesoDatos->obtenerUsuarios();
        $this->gestorAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Eliminar un gestor en la base de datos    
    public function eliminarGestor($idGestor){
        $this->gestorAccesoDatos->conectar();
        $resultado = $this->gestorAccesoDatos->eliminarGestor($idGestor);
        $this->gestorAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Obtener un gestor en la base de datos
    public function obtenerGestor($idGestor){      
        $this->gestorAccesoDatos->conectar();
        $resultado = $this->gestorAccesoDatos->obtenerGestor($idGestor);
        $this->gestorAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Actualzar un gestor en la base de datos
    public function actualizarGestor($gestor){
        //Insertar provincia se invoca al metodo en datos
        $this->gestorAccesoDatos->conectar();
        $resultado = $this->gestorAccesoDatos->actualizarGestor($gestor);
        $this->gestorAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    //
    //Obtener el ultimo codigo del gestor
    public function obtenerUltimoCodigoGestor(){
        //Insertar provincia se invoca al metodo en datos
        $this->gestorAccesoDatos->conectar();
        $resultado = $this->gestorAccesoDatos->obtenerUltimoCodigoGestor();
        $this->gestorAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
}
?>