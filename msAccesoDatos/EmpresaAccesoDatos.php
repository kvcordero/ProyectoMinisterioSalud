<?php

include '../msDominio/Empresa.php';
include_once '../msAccesoDatos/ConexionAccesoDatos.php';

# clase para manejar los datos de un usuario

class EmpresaAccesoDatos extends ConexionAccesoDatos {

    //constructor de la clase empresa acceso datos
    public function EmpresaAccesoDatos() {
        parent::ConexionAccesoDatos();
    }

    //Insertar una empresa en la base de datos
    public function insertarEmpresa($empresa) {            
         $consulta ="INSERT INTO `bdministeriosalud`.`tbempresa` (`idEmpresa`, `nombreEmpresa`, "
                 . "`numeroPermisoSanitario`, `vencimiento`, `numeroRegistro`, `provincia`, `canton`, `distrito`, "
                 . "`tipoRiesgo`, `numeroCiiu`, `representanteLegal`) VALUES (".$empresa->idEmpresa.", '".$empresa->nombreEmpresa."','".$empresa->numeroPermisoSanitario."', "
                 . "'".$empresa->vencimiento."',".$empresa->numeroRegistro.",".$empresa->provincia.",".$empresa->canton.","
                 . "".$empresa->distrito.",'".$empresa->tipoRiesgo."',".$empresa->numeroCiiu.",'".$empresa->representanteLegal."');";
         
        $resultado = mysqli_query($this->connection, $consulta);
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin del metodo
    
    //Actualizar un usuario de la base de datos
    public function actualizarEmpresa($empresa) {
        $consulta = "Update tbempresa set nombreEmpresa='".$empresa->nombreEmpresa ."',
       numeroPermisoSanitario='" . $empresa->numeroPermisoSanitario . "',vencimiento='".$empresa->vencimiento."',numeroRegistro=" . $empresa->numeroRegistro . ",
       provincia=".$empresa->provincia.",canton=".$empresa->canton.",distrito=".$empresa->distrito .",
       tipoRiesgo='".$empresa->tipoRiesgo."',numeroCiiu=".$empresa->numeroCiiu.",representanteLegal='".$empresa->representanteLegal."' where (idEmpresa=" . $empresa->idEmpresa . ")";

        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin del metodo
        
    //obtener todos los gestores de la base de datos
    public function obtenerEmpresas() {
        $consulta = "select* from tbempresa";
        $resultado = mysqli_query($this->connection, $consulta);
        $arrayEmpresas = [];


        while ($fila = mysqli_fetch_array($resultado)) {
            $empresa = new Empresa($fila['idEmpresa'], $fila['nombreEmpresa'],
                    $fila['numeroPermisoSanitario'], $fila['vencimiento'], 
                    $fila['numeroRegistro'], $fila['provincia'], $fila['canton'], 
                    $fila['distrito'],$fila['tipoRiesgo'],$fila['numeroCiiu'],
                    $fila['$empresa->representanteLegal']);
            array_push($arrayEmpresas, $empresa);
        }
        return $arrayEmpresas;
    }//Fin del metodo

    
    //obtener un gestor de la base de datos
        public function obtenerEmpresa($nombreEmpresa) {
        $consulta = mysqli_query($this->connection, "select* from tbempresa  where nombreEmpresa ='" 
                                                    . $nombreEmpresa . "'");
        $resultado = $consulta->fetch_array();

       $empresa = new Empresa($resultado['idEmpresa'], $resultado['nombreEmpresa'],
                    $resultado['numeroPermisoSanitario'], $resultado['vencimiento'], 
                    $resultado['numeroRegistro'], $resultado['provincia'], $resultado['canton'], 
                    $resultado['distrito'],$resultado['tipoRiesgo'],$resultado['numeroCiiu'],
                    $resultado['representanteLegal']);
       
        return $empresa;
    }//Fin del metodo

    //Eliminar una empresa de la base de datos
    public function eliminarEmpresa($idEmpresa) {
        $consulta = "delete from tbempresa where idEmpresa =" . $idEmpresa . ";";
        $resultado = mysqli_query($this->connection, $consulta);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }//Fin del metodo
    
     //Obtener el ultimo codigo de una empresa
    public function obtenerUltimoCodigoEmpresa() {

        $resultado = mysqli_query($this->connection, "select max(idEmpresa) as ultimoCodigoEmpresa from tbempresa ");
        $ultimoCodigoEmpresa = 0;

        while ($filaTemporal = mysqli_fetch_array($resultado)) {
            $ultimoCodigoEmpresa = $filaTemporal['ultimoCodigoEmpresa'];
        }
        return $ultimoCodigoEmpresa;
    }//Fin del metodo
    
    
    //obtener empresas para autocomplete
        public function autocompleteEmpresa($nombreEmpresa) {
            
        $busqueda = "select idEmpresa,nombreEmpresa from tbempresa  where nombreEmpresa like '%" . $nombreEmpresa ."%'";
        
        $consulta = mysqli_query($this->connection, $busqueda)or die("Error en: $busqueda: " . mysql_error());
        
        $empresas = "";

        while ($row = mysqli_fetch_array($consulta)) {

             $empresas = $empresas . '<li onclick="set_item(\'' . $row['nombreEmpresa'] . '\')">' 
                                   . $row['nombreEmpresa'] . '</li>';
        }
       
        return $empresas;
    }//Fin del metodo
}
