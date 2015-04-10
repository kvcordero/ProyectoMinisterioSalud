//------------------------------------------------------------------------------------------------
//                          Metodo que inserta un usuario
//------------------------------------------------------------------------------------------------
function crearPrograma() {

    var fechaInscripcion = $('#txtFechaInscripcion').val();
    var idEmpresa = $("#hdfIdEmpresa").val();
    

    alert(identificacion);

    var parametros = {
        "fechaInscripcion": fechaInscripcion,
        "idEmpresa": idEmpresa
    };
    $.ajax({
        data: parametros,
        url: '../sbcReglasNegocio/',
        type: 'post',
        success: function (response) {
            $("#mensaje").html(response);
            //limpiarCamposAdministrarCuentasAhorros();
        }
    });
}