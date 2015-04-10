<?php
//Clase Tipo Tratamiento Programa
class TipoTratamientoPrograma{
    //Declaracion de variables
    public $idTipoTratamiento;
    public $idPrograma;
    
    //Constructor de la clase
    public function TipoTratamientoPrograma($idTipoTratamiento,$idPrograma){
        $this->idTipoTratamiento=$idTipoTratamiento;
        $this->idPrograma=$idPrograma;
    }
}

