
<?php

class Usuario {

    //Declaracion de variables de la clase usuario
    public $idUsuario;
    public $identificacionUsuario;
    public $nombreUsuario;
    public $primerApellidoUsuario;
    public $segundoApellidoUsuario;
    public $correoUsuario;
    public $usuario;
    public $contrasenna;

    //Constructor sobrecargado de la clase Usuario
    public function Usuario($idUsuario, $identificacionUsuario, $nombreUsuario, $primerApellidoUsuario, $segundoApellidoUsuario, $correoUsuario, $usuario, $contrasenna) {

        $this->idUsuario = $idUsuario;
        $this->identificacionUsuario = $identificacionUsuario;
        $this->nombreUsuario = $nombreUsuario;
        $this->primerApellidoUsuario = $primerApellidoUsuario;
        $this->segundoApellidoUsuario = $segundoApellidoUsuario;
        $this->correoUsuario = $correoUsuario;
        $this->usuario = $usuario;
        $this->contrasenna = $contrasenna;
    }//End constructor     
}
