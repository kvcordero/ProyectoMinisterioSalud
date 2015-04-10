<?php

include '../msReglasNegocio/UsuarioReglasNegocios.php';

$usuarioRN = new UsuarioReglasNegocios();

//Opcion que se debe realizar en la base de datos
$opcion =$_POST['opcion'];

//------------------------------------------------------------------------------------------------------
//                                      Insertar un nuevo usuario
//------------------------------------------------------------------------------------------------------
if ($opcion == "insertar") {
    
    $identificacion = $_POST['identificacion'];
    $nombre = $_POST['nombre'];
    $primerApellido = $_POST['primerApellido'];
    $segundoApellido = $_POST['segundoApellido'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $idUsuario = $usuarioRN->obtenerUltimoCodigoUsuario() + 1;
    
    $nuevoUsuario = new Usuario($idUsuario, $identificacion, $nombre, $primerApellido, $segundoApellido, 
            $email , $usuario, $contraseña);

    $resultado = $usuarioRN->insertarUsuario($nuevoUsuario);

    if ($resultado) {
        echo "Usuario Insertado";
    } else {
        echo "Error al insertar el usuario";
    }
}//End if

//------------------------------------------------------------------------------------------------------
//                                      Actualizar un usuario
//------------------------------------------------------------------------------------------------------
if ($opcion == "actualizar") {
    
    $idUsuario = $_POST['idUsuario'];
    $identificacion = $_POST['identificacion'];
    $nombre = $_POST['nombre'];
    $primerApellido = $_POST['primerApellido'];
    $segundoApellido = $_POST['segundoApellido'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    
    $usuarioActualizar = new Usuario($idUsuario, $identificacion, $nombre, $primerApellido, $segundoApellido, 
            $email , $usuario, $contraseña);

    $resultado = $usuarioRN->actualizarUsuario($usuarioActualizar);

    if ($resultado) {
        echo "Usuario actualizado correctamente";
    } else {
        echo "Error al actualizar el usuario";
    }
}//End if

//------------------------------------------------------------------------------------------------------
//                                      Autocompletar por el apellido de un usuario
//------------------------------------------------------------------------------------------------------
if ($opcion == "autocomplete") {
    $opcionBusqueda = $_POST['opcionBusqueda'];
    $nombreUsuario = $_POST['keyword'];
    $resultado = $usuarioRN->autocompleteUsuario($nombreUsuario,$opcionBusqueda);
    echo $resultado;
}//End if


//------------------------------------------------------------------------------------------------------
//                                      Obtener un usuario
//------------------------------------------------------------------------------------------------------
if ($opcion == "obtener") {

    $idUsuario = $_POST['idUsuario'];
    $resultado = $usuarioRN->obtenerUsuario($idUsuario);

    header("Content-type: text/x-json");
    $usuario = json_encode($resultado);

    echo $usuario;
}//End if


//------------------------------------------------------------------------------------------------------
//                                      Eliminar un usuario
//------------------------------------------------------------------------------------------------------
if ($opcion == "eliminar") {

    $idUsuario = $_POST['idUsuario'];
    $resultado = $usuarioRN->eliminarUsuario($idUsuario);

    if ($resultado) {
        echo "Usuario eliminado correctamente";
    } else {
        echo "Error al eliminar el usuario";
    }
}//End if
