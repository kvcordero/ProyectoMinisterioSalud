<?php

include '../msDominio/Usuario.php';
include_once '../msAccesoDatos/ConexionAccesoDatos.php';

# clase para manejar los datos de un usuario

class UsuarioAccesoDatos extends ConexionAccesoDatos {

    //constructor de la clase usuario acceso datos
    public function UsuarioAccesoDatos() {
        parent::ConexionAccesoDatos();
    }

    //Insertar un usuario en la base de datos
    public function insertarUsuario($usuario) {
        $consulta = "INSERT INTO tbusuario VALUES (".$usuario->idUsuario.",".$usuario->identificacionUsuario.","
                . "'".$usuario->nombreUsuario."','".$usuario->primerApellidoUsuario."','".$usuario->segundoApellidoUsuario."',"
                . "'".$usuario->correoUsuario."','".$usuario->usuario."','".$usuario->contrasenna."');";

     
       $resultado = mysqli_query($this->connection,$consulta);
        if ($resultado) {        
            return true;
        } else {
            return false;
        }
    }//Fin del metodo
    
    //Actualizar un usuario de la base de datos
    public function actualizarUsuario($usuario) {
       $consulta = "Update tbusuario set nombreUsuario='".$usuario->nombreUsuario."',primerApellidoUsuario='".$usuario->primerApellidoUsuario."',segundoApellidoUsuario='".$usuario->segundoApellidoUsuario."',
       correoUsuario='".$usuario->correoUsuario."',usuario='".$usuario->usuario."',contrasenna='".$usuario->contrasenna."'
       where (idUsuario=".$usuario->idUsuario.");";

        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin del metodo
        
    //obtener todos los usuarios de la base de datos
    public function obtenerUsuarios() {
        $consulta = "select* from tbusuario";
        $resultado = mysqli_query($this->connection, $consulta);
        $arrayUsuarios = [];


        while ($fila = mysqli_fetch_array($resultado)) {
            $usuario = new Usuario($fila['idUsuario'], $fila['identificacionUsuario'],
                    $fila['nombreUsuario'], $fila['primerApellidoUsuario'], 
                    $fila['segundoApellidoUsuario'], $fila['correoUsuario'],
                    $fila['usuario'], $fila['contrasenna']);
            array_push($arrayUsuarios, $usuario);
        }
        return $arrayUsuarios;
    }//Fin del metodo

    
    //obtener un usuario de la base de datos
    public function obtenerUsuario($idUsuario) {
        $consulta = mysqli_query($this->connection, "select * from tbusuario  where idUsuario =" . $idUsuario.";");
        $resultado = $consulta->fetch_array();

        $usuario = new Usuario($resultado['idUsuario'], $resultado['identificacionUsuario'],
                    $resultado['nombreUsuario'], $resultado['primerApellidoUsuario'], 
                    $resultado['segundoApellidoUsuario'], $resultado['correoUsuario'],
                    $resultado['usuario'], $resultado['contrasenna']);
        return $usuario;
    }//Fin del metodo

    //vaidar un usuario de la base de datos
    public function validarUsuario($usuario,$contrasenna) {
        $consulta = mysqli_query($this->connection, "SELECT count(*) as total FROM tbusuario " .
                "WHERE(usuario ='" . $usuario . "' and contrasenna='".$contrasenna."')");

        $array = mysqli_fetch_array($consulta);

        if ($array['total'] == 1) {
            return true;
        } else {
            return false;
        }
    }//Fin del metodo

    //Eliminar un usuario de la base de datos
    public function eliminarUsuario($idUsuario) {
        $consulta = "delete from tbusuario where idUsuario =" . $idUsuario . ";";
        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin del metodo
    
     //Obtener el ultimo codigo del usuario
    public function obtenerUltimoCodigoUsuario() {

        $resultado = mysqli_query($this->connection, "select max(idUsuario) as ultimoCodigoUsuario from tbusuario ");
        $ultimoCodigoUsuario = 0;

        while ($filaTemporal = mysqli_fetch_array($resultado)) {
            $ultimoCodigoUsuario = $filaTemporal['ultimoCodigoUsuario'];
        }
        return $ultimoCodigoUsuario;
    }//Fin del metodo
    
    //obtener usuarios para autocomplete
    public function autocompleteUsuario($busqueda,$opcion) {
            
        $busqueda = "select idUsuario,nombreUsuario,primerApellidoUsuario,segundoApellidoUsuario from tbusuario  where primerApellidoUsuario like '%" . $busqueda ."%'";
        
        $consulta = mysqli_query($this->connection, $busqueda)or die("Error en: $busqueda: " . mysql_error());
        
        $usuarios = "";

        while ($row = mysqli_fetch_array($consulta)) {

             $usuarios = $usuarios . '<li onclick="set_item(\''. $row['nombreUsuario']." ".$row['primerApellidoUsuario']." ".$row['segundoApellidoUsuario'].'\',\''. $row['idUsuario'].'\',\''. $opcion.'\')">' 
                                   . $row['nombreUsuario']." ".$row['primerApellidoUsuario']." ".$row['segundoApellidoUsuario'].'</li>';
        }
       
        return $usuarios;
    }//Fin del metodo
}
