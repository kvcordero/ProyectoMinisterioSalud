<?php

class Distrito {

    //Declaracion de variables de la clase distrito 
    public $idDistrito;
    public $nombreDistrito;
    public $idCanton;

    //Constructor sobrecargado
    public function Distrito($idDistrito, $nombreDistrito, $idCanton) {
        $this->idDistrito = $idDistrito;
        $this->nombreDistrito = $nombreDistrito;
        $this->idCanton = $idCanton;
    }//End constructor  
}

?>