<?php

class Canton {

    //Declaracion de variables de la clase canton
    public $idCanton;
    public $nombreCanton;
    public $idProvincia;

    //Constructor sobrecargado
    public function Canton($idCanton, $nombreCanton, $idProvincia) {
        $this->idCanton = $idCanton;
        $this->nombreCanton = $nombreCanton;
        $this->idProvincia = $idProvincia;
    }//End constructor     
}
