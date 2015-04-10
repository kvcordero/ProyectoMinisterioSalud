<?php

class Gestor {

    //Declaracion de variables de la clase gestor
    public $idGestor;
    public $nombreGestor;
    public $canton;
    public $permisoSanitarioFuncionamiento;
    public $areaRectora;
    public $correoGestor;
    public $representanteLegal;
    public $fechaVencimiento;
    public $numeroGestorAutorizado;

    //Constructor sobrecargado de la clase gestor
    public function Gestor($idGestor, $nombreGestor, $canton, $permisoSanitarioFuncionamiento, 
            $areaRectora, $correoGestor, $representanteLegal, $fechaVencimiento,
            $numeroGestorAutorizado) {

        $this->idGestor= $idGestor;
        $this->nombreGestor = $nombreGestor;
        $this->canton = $canton;
        $this->permisoSanitarioFuncionamiento= $permisoSanitarioFuncionamiento;
        $this->areaRectora = $areaRectora;
        $this->correoGestor = $correoGestor;
        $this->representanteLegal = $representanteLegal;
        $this->fechaVencimiento= $fechaVencimiento;
        $this->numeroGestorAutorizado= $numeroGestorAutorizado;
    }//End constructor     
}
