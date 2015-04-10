<?php

//Objeto Banco
class TipoResiduoPrograma{

	//Declaracion de variables de la clase tipoResiduo
	public $idTipoResiduo;
	public $idProgramaResiduo;
        public $aproximado;

	public function TipoResiduoPrograma($idTipoResiduo,$idProgramaResiduo,$aproximado)
	{
		$this->idTipoResiduo = $idTipoResiduo;
		$this->idProgramaResiduo = $idProgramaResiduo;
		$this->aproximado = $aproximado;
	}
}