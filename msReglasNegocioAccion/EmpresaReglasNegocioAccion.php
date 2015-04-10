<?php

include '../msReglasNegocio/EmpresaReglasNegocios.php';

$empresaRN = new EmpresaReglasNegocios();

$opcion = $_POST['opcion'];

//-----------------------------------------------------------------------------------------------
//                      Seccion instertar empresa
//------------------------------------------------------------------------------------------------
if ($opcion == "insertar") {
    $nombre = $_POST['nombre'];
    $provincia = $_POST['provincia'];
    $representante = $_POST['representante'];
    $canton = $_POST['canton'];
    $numeroPermiso = $_POST['numeroPermiso'];
    $distrito = $_POST['distrito'];
    $fechaVencimiento = $_POST['fechaVencimiento'];
    $tipoRiesgo = $_POST['tipoRiesgo'];
    $numeroTomo = $_POST['numeroTomo'];
    $numeroCiiu = $_POST['CIIU'];

    $empresa = new Empresa(0, $nombre, $numeroPermiso, $fechaVencimiento, $numeroTomo, $provincia, $canton, $distrito, $tipoRiesgo, $numeroCiiu);

    $resultado = $empresaRN->insertarEmpresa($empresa);

    if ($resultado) {
        echo "Empresa Insertada";
    } else {
        echo "Error a Insertar empresa";
    }
}

//-----------------------------------------------------------------------------------------------
//                      Seccion instertar actualizar
//------------------------------------------------------------------------------------------------
if ($opcion == "actualizar") {
    
    $idEmpresa = $_POST['idEmpresa'];
    $nombre = $_POST['nombre'];
    $provincia = $_POST['provincia'];
    $representante = $_POST['representante'];
    $canton = $_POST['canton'];
    $numeroPermiso = $_POST['numeroPermiso'];
    $distrito = $_POST['distrito'];
    $fechaVencimiento = $_POST['fechaVencimiento'];
    $tipoRiesgo = $_POST['tipoRiesgo'];
    $numeroRegistro = $_POST['numeroRegistro'];
    $numeroCiiu = $_POST['CIIU'];

    $empresa = new Empresa($idEmpresa, $nombre, $numeroPermiso, $fechaVencimiento, $numeroRegistro, 
                            $provincia, $canton, $distrito, $tipoRiesgo, $numeroCiiu, $representante);

    $resultado = $empresaRN->actualizarEmpresa($empresa);

    if ($resultado) {
        echo "Empresa actualizada";
    } else {
        echo "Error a actualizar empresa";
    }

}

//-----------------------------------------------------------------------------------------------
//                      Seccion obtener empresa
//------------------------------------------------------------------------------------------------
if ($opcion == "obtener") {
    
    $nombre = $_POST['nombre'];    
    $resultado = $empresaRN->obtenerEmpresa($nombre);
    
    header("Content-type: text/x-json");
    $empresa = json_encode($resultado);

    echo $empresa;
}

//-----------------------------------------------------------------------------------------------
//                      Seccion autocompletar
//------------------------------------------------------------------------------------------------
if ($opcion == "autocomplete") {
    
    $nombreEmpresa = $_POST['keyword'];
    $resultado = $empresaRN->autocompleteEmpresa($nombreEmpresa);
    echo $resultado;
}