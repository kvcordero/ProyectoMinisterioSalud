<?php

include '../msDominio/Gestor.php';
include_once '../msAccesoDatos/ConexionAccesoDatos.php';

# clase para manejar los datos de un usuario

class GestorAccesoDatos extends ConexionAccesoDatos {

    //constructor de la clase gestor acceso datos
    public function GestorAccesoDatos() {
        parent::ConexionAccesoDatos();
    }

    //Insertar un gestor en la base de datos
    public function insertarGestor($gestor) {
        $consulta = "insert into tbgestor(idGestor,nombreGestor,canton,permisoSanitarioFuncionamiento,
            areaRectora,correoGestor,representanteLegal,fechaVencimiento,numeroGestorAutorizado) values("
                . $gestor->idGestor . ", '" . $gestor->nombreGestor . "', " .
                $gestor->canton . ",'" . $gestor->permisoSanitarioFuncionamiento . "','"
                . $gestor->areaRectora . "','" . $gestor->correoGestor . "',
            '" . $gestor->representanteLegal . "','" . $gestor->fechaVencimiento . "',".$gestor->numeroGestorAutorizado.");";

        $resultado = mysqli_query($this->connection, $consulta);
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin del metodo
    
    //Actualizar un usuario de la base de datos
    public function actualizarGestor($gestor) {
        $consulta = "Update tbgestor set nombreGestor='".$gestor->nombreGestor ."',
       canton=" . $gestor->canton . ",permisoSanitarioFuncionamiento='".$gestor->permisoSanitarioFuncionamiento."',areaRectora='" . $gestor->areaRectora . "',
       correoGestor='".$gestor->correoGestor."',representanteLegal='".$gestor->representanteLegal."',fechaVencimiento='".$gestor->fechaVencimiento ."',
       numeroGestorAutorizado=".$gestor->numeroGestorAutorizado." where (idGestor=" . $gestor->idGestor . ");";

        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin del metodo
        
    //obtener todos los gestores de la base de datos
    public function obtenerGestores() {
        $consulta = "select* from tbgestor";
        $resultado = mysqli_query($this->connection, $consulta);
        $arrayGestores = [];


        while ($fila = mysqli_fetch_array($resultado)) {
            $gestor = new Gestor($fila['idGestor'], $fila['nombreGestor'],
                    $fila['canton'], $fila['permisoSanitarioFuncionamiento'], 
                    $fila['areaRectora'], $fila['correoGestor'],
                    $fila['representanteLegal'], $fila['fechaVencimiento'],$fila['numeroGestorAutorizado']);
            array_push($arrayGestores, $gestor);
        }
        return $arrayGestores;
    }//Fin del metodo

    
    //obtener un gestor de la base de datos
        public function obtenerGestor($idGestor) {
        $consulta = mysqli_query($this->connection, "select* from tbgestor  where idGestor =" . $idGestor);
        $resultado = $consulta->fetch_array();

        $gestor = new Gestor($resultado['idGestor'], $resultado['nombreGestor'],
                    $resultado['canton'], $resultado['permisoSanitarioFuncionamiento'], 
                    $resultado['areaRectora'], $resultado['correoGestor'],
                    $resultado['representanteLegal'], $resultado['fechaVencimiento'],$resultado['numeroGestorAutorizado']);
        return $gestor;
    }//Fin del metodo

    //Eliminar un gestor de la base de datos
    public function eliminarGestor($idGestor) {
        $consulta = "delete from tbgestor where idGestor =" . $idGestor . ";";
        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin del metodo
    
     //Obtener el ultimo codigo del gestor
    public function obtenerUltimoCodigoGestor() {

        $resultado = mysqli_query($this->connection, "select max(idGestor) as ultimoCodigoGestor from tbgestor ");
        $ultimoCodigoGestor = 0;

        while ($filaTemporal = mysqli_fetch_array($resultado)) {
            $ultimoCodigoGestor = $filaTemporal['ultimoCodigoGestor'];
        }
        return $ultimoCodigoGestor;
    }//Fin del metodo
}
