<?php

include '../msDominio/Programa.php';
include_once '../msAccesoDatos/ConexionAccesoDatos.php';

# clase para manejar los datos de un usuario

class ProgramaAccesoDatos extends ConexionAccesoDatos {

    //constructor de la clase usuario acceso datos
    public function ProgramaAccesoDatos() {
        parent::ConexionAccesoDatos();
    }

    //Insertar un programa en la base de datos
    public function insertarPrograma($programa) {
        $consulta = "insert into tbprograma(idPrograma,fechaPrograma,idEmpresa) 
                 values(".$programa->idPrograma . ", '" . $programa->fechaPrograma . "'," . $programa->idEmpresa.");";

        $resultado = mysqli_query($this->connection, $consulta);
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin del metodo
    
    //Actualizar un programa de la base de datos
    public function actualizarPrograma($programa) {
        $consulta = "Update tbprograma set fechaPrograma='" . $programa->fechaPrograma . "',
        idEmpresa=" . $programa->idEmpresa . "
       where (idPrograma=" . $programa->idPrograma . ")";

        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin del metodo
        
    //obtener todos los usuarios de la base de datos
    public function obtenerProgramas() {
        $consulta = "select * from tbprograma";
        $resultado = mysqli_query($this->connection, $consulta);
        $arrayProgramas = [];

        while ($fila = mysqli_fetch_array($resultado)) {
            $programa = new Programa($fila['idPrograma'], $fila['fechaPrograma'],
                  $fila['idEmpresa']);
            array_push($arrayProgramas, $programa);
        }
        return $arrayProgramas;
    }//Fin del metodo

    
    //obtener un programa de la base de datos
        public function obtenerPrograma($idPrograma) {
        $consulta = mysqli_query($this->connection, "select * from tbprograma where idPrograma ='$idPrograma';");
        $resultado = $consulta->fetch_array();

        $programa = new Programa($resultado['idPrograma'], $resultado['fechaPrograma'],
                    $resultado['idEmpresa']);
        return $programa;
    }//Fin del metodo

    
    //Eliminar un usuario de la base de datos
    public function eliminarPrograma($idPrograma) {
        $consulta = "delete from tbprograma where idPrograma =" . $idPrograma . ";";
        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin del metodo
    
    //Obtener el ultimo codigo del programa
    public function obtenerUltimoCodigoPrograma() {

        $resultado = mysqli_query($this->connection, "select max(idPrograma) as ultimoCodigoPrograma from tbprograma ");
        $ultimoCodigoPrograma = 0;

        while ($filaTemporal = mysqli_fetch_array($resultado)) {
            $ultimoCodigoPrograma = $filaTemporal['ultimoCodigoPrograma'];
        }
        return $ultimoCodigoPrograma;
    }//Fin del metodo
}
