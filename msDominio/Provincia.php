<?php

class Provincia {

    //Declaracion de variables de la clase provincia
    public $idProvincia;
    public $nombreProvincia;

    //Constructor sobrecargado de la clase provincia
    public function Provincia($idProvincia, $nombreProvincia) {
        $this->idProvincia = $idProvincia;
        $this->nombreProvincia = $nombreProvincia;
    }

}
