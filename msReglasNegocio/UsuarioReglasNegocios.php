<?php
include '../msAccesoDatos/UsuarioAccesoDatos.php';

class UsuarioReglasNegocios {
  //variables regarding composition
    private $usuarioAccesoDatos;

    //create new object CommentData
    public function UsuarioReglasNegocios() {
        $this->usuarioAccesoDatos = new UsuarioAccesoDatos();
    }
    
    //Insertar un usuario en la base de datos
    public function insertarUsuario($usuario){
         $this->usuarioAccesoDatos->conectar();
         $resultado = $this->usuarioAccesoDatos->insertarUsuario($usuario);
         $this->usuarioAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Obtener los usuarios de la base de datos
    public function obtenerUsuarios(){
        $this->usuarioAccesoDatos->conectar();
        $resultado = $this->usuarioAccesoDatos->obtenerUsuarios();
        $this->usuarioAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Eliminar un usuario en la base de datos    
    public function eliminarUsuario($idUsuario){
        $this->usuarioAccesoDatos->conectar();
        $resultado = $this->usuarioAccesoDatos->eliminarUsuario($idUsuario);
        $this->usuarioAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Obtener un usuario en la base de datos
    public function obtenerUsuario($idUsuario){      
        $this->usuarioAccesoDatos->conectar();
        $resultado = $this->usuarioAccesoDatos->obtenerUsuario($idUsuario);
        $this->usuarioAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Actualzar un usuario en la base de datos
    public function actualizarUsuario($usuario){
        //Insertar provincia se invoca al metodo en datos
        $this->usuarioAccesoDatos->conectar();
        $resultado = $this->usuarioAccesoDatos->actualizarUsuario($usuario);
        $this->usuarioAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Validar un usuario en la base de datos
    public function validarUsuario($usuario,$contraseña){
        //Insertar provincia se invoca al metodo en datos
        $this->usuarioAccesoDatos->conectar();
        $resultado = $this->usuarioAccesoDatos->validarUsuario($usuario,$contraseña);
        $this->usuarioAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Obtener el ultimo codigo del usuario
    public function obtenerUltimoCodigoUsuario(){
        //Insertar provincia se invoca al metodo en datos
        $this->usuarioAccesoDatos->conectar();
        $resultado = $this->usuarioAccesoDatos->obtenerUltimoCodigoUsuario();
        $this->usuarioAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Obtener usuarios por nombre
    public function autocompleteUsuario($busqueda,$opcion){
        //Insertar provincia se invoca al metodo en datos
        $this->usuarioAccesoDatos->conectar();
        $resultado = $this->usuarioAccesoDatos->autocompleteUsuario($busqueda,$opcion);
        $this->usuarioAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
}
?>