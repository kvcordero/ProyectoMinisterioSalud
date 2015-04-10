<?php

class Empresa {

    //Declaracion de variables de la clase empresa
    public $idEmpresa;
    public $nombreEmpresa;
    public $numeroPermisoSanitario;
    public $vencimiento;
    public $numeroRegistro;
    public $provincia;
    public $canton;
    public $distrito;
    public $tipoRiesgo;
    public $numeroCiiu;
    public $representanteLegal;

    //Constructor sobrecargado de la clase empresa
    public function Empresa($idEmpresa, $nombreEmpresa, $numeroPersmisoSanitario, $vencimiento, 
            $numeroRegistro, $provincia, $canton, $distrito, $tipoRiesgo,$numeroCiiu,$representanteLegal) {

        $this->idEmpresa= $idEmpresa;
        $this->nombreEmpresa = $nombreEmpresa;
        $this->numeroPermisoSanitario = $numeroPersmisoSanitario;
        $this->vencimiento = $vencimiento;
        $this->numeroRegistro= $numeroRegistro;
        $this->provincia = $provincia;
        $this->canton = $canton;
        $this->distrito = $distrito;
        $this->tipoRiesgo= $tipoRiesgo;
        $this->numeroCiiu= $numeroCiiu;
        $this->representanteLegal=$representanteLegal;
    }//End constructor     
}
