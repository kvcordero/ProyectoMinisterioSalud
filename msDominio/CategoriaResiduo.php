<?php

/* 
 * Clase que contiene el objeto PHP de la categoria residuo.
 */

class CategoriaResiduo{
    
    /*Atributos*/
    
    public $idCategoriaResiduo;
    public $categoriaResiduo;
    
    /*funcion de constructor*/
    public function CategoriaResiduo($idCategoriaResiduo,$categoriaResiduo){
        
        $this->idCategoriaResiduo=$idCategoriaResiduo;
        $this->categoriaResiduo=$categoriaResiduo;
    }
    
    
}