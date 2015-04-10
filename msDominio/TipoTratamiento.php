<?php

//Clase Tipo Tratamiento
class TipoTratamiento{
    //Declaracion de variables
    public $idTipoTratamiento;
    public $tratamiento;
    
    //Constructor de la clase
    public function TipoTratamiento($idTipoTratamiento,$tratamiento){
        $this->idTipoTratamiento=$idTipoTratamiento;
        $this->tratamiento=$tratamiento;
    }
}

