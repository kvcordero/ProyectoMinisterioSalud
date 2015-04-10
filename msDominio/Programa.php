<?php

class Programa {

    //Declaracion de variables de la clase programa
    public $idPrograma;
    public $fechaPrograma;
    public $idEmpresa;

    //Constructor sobrecargado de la clase programa
    public function Programa($idPrograma, $fechaPrograma, $idEmpresa) {
        $this->idPrograma= $idPrograma;
        $this->fechaPrograma = $fechaPrograma;
        $this->idEmpresa= $idEmpresa;
    }//End constructor     
}
