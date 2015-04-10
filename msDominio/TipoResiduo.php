<?php

//Objeto Banco
class TipoResiduo{

	//Declaracion de variables de la clase tipoResiduo
	public $idTipoResiduo;
	public $tipoResiduo;
        public $idCategoria;

	public function TipoResiduo($idTipoResiduo,$tipoResiduo,$idCategoria)
	{
		$this->idTipoResiduo = $idTipoResiduo;
		$this->tipoResiduo = $tipoResiduo;
		$this->idCategoria = $idCategoria;
	}
}