<?php
include '../msAccesoDatos/TipoResiduoProgramaAccesoDatos.php';

class TipoResiduoProgramaReglasNegocios {
  //variables regarding composition
    private $tipoResiduoProgramaAccesoDatos;

    //create new object CommentData
    public function TipoResiduoProgramaReglasNegocios() {
        $this->tipoResiduoProgramaAccesoDatos = new TipoResiduoProgramaAccesoDatos();
    }
    
    //Insertar un tipo de residuo de un programa en la base de datos
    public function insertarTipoResiduoPrograma($tipoResiduoPrograma){
        //Insertar provincia se invoca al metodo en datos
         $this->tipoResiduoProgramaAccesoDatos->conectar();
         $resultado = $this->tipoResiduoProgramaAccesoDatos->insertarTipoResiduoPrograma($tipoResiduoPrograma);
         $this->tipoResiduoProgramaAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Obtener los tipos de residuos de un programa de la base de datos
    public function obteneTiposResiduosPorPrograma($idProgramaResiduo){
        $this->tipoResiduoProgramaAccesoDatos->conectar();
        $resultado = $this->tipoResiduoProgramaAccesoDatos->obteneTiposResiduosPorPrograma($idProgramaResiduo);
        $this->tipoResiduoProgramaAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Eliminar un tipo de residuo de un programa en la base de datos    
    public function obteneTiposResiduosPrograma($idTipoResiduo){
        $this->tipoResiduoProgramaAccesoDatos->conectar();
        $resultado = $this->tipoResiduoProgramaAccesoDatos->obteneTiposResiduosPrograma($idTipoResiduo);
        $this->tipoResiduoProgramaAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo
    
    //Obtener un tipo de residuo de un programa en la base de datos
    public function eliminarTipoResiduoPrograma($idTipoResiduo,$idProgramaResiduo){      
        $this->tipoResiduoProgramaAccesoDatos->conectar();
        $resultado = $this->tipoResiduoProgramaAccesoDatos->eliminarTipoResiduoPrograma($idTipoResiduo,$idProgramaResiduo);
        $this->tipoResiduoProgramaAccesoDatos->cerrarConexion();
        return $resultado;
    }//Fin de metodo  
     
}
?>