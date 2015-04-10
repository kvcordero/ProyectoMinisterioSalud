
//-----------------------------------------------------------------------------------------------
//                      Metodo que crear el autocomplete
//------------------------------------------------------------------------------------------------
function autocompletarEmpresa(seccion) {
    
    var min_length = 4; // min caracters to display the autocomplete
    
    if (seccion == 1) {
        var keyword = $('#txtAutoCompletarAct').val();
    }
    
    if (seccion == 3) {
        var keyword = $('#txtAutoCompletarBus').val();
    }
    
    if (keyword.length >= min_length) {
        
        var parametros = {
            "keyword": keyword,
            "opcion": "autocomplete"
        };

        $.ajax({
            url: '../msReglasNegocioAccion/EmpresaReglasNegocioAccion.php',
            type: 'POST',
            data: parametros,
            success: function (data) {
                
                if(seccion == 1){
                    $('#listaEmpresasAct').show();
                    $('#listaEmpresasAct').html(data);
                    $('#hdAutoSeccionId').val(seccion);
                }
                
                if(seccion == 3){
                    $('#listaEmpresasBus').show();
                    $('#listaEmpresasBus').html(data);
                    $('#hdAutoSeccionId').val(seccion);
                }
                
            }
        });
    } else {
        $('#listaEmpresas').hide();
    }
}

//-----------------------------------------------------------------------------------------------
//              metodo para colocar el resultado del autocompletar en el txt
//------------------------------------------------------------------------------------------------
function set_item(item) {
    
    var seccion = $('#hdAutoSeccionId').val();
    
    if (seccion == 1) {
        $('#txtAutoCompletarAct').val(item);

        // hide proposition list
        $('#listaEmpresasAct').hide();
    }
    
    if (seccion == 3) {
        $('#txtAutoCompletarBus').val(item);

        // hide proposition list
        $('#listaEmpresasBus').hide();
    }

}

//------------------------------------------------------------------------------------------------
//                          Metodo que inserta una empresa
//------------------------------------------------------------------------------------------------
function crearEmpresa() {

    var nombre = $('#txtNombre').val();
    var provincia = $("#txtProvincia").val();
    var representante = $('#txtRepresentante').val();
    var canton = $('#txtCanton').val();
    var numeroPermiso = $('#txtNumeroPermiso').val();
    var distrito = $('#txtDistrito').val();
    var fechaVencimiento = $('#txtFechaVencimiento').val();
    var tipoRiesgo = $('#txtTipoRiesgo').val();
    var numeroTomo = $('#txtNumeroTomo').val();
    var CIIU = $('#txtCIIU').val();

    var parametros = {
        "nombre": nombre,
        "provincia": provincia,
        "representante": representante,
        "canton": canton,
        "numeroPermiso": numeroPermiso,
        "distrito": distrito,
        "fechaVencimiento": fechaVencimiento,
        "tipoRiesgo": tipoRiesgo,
        "numeroTomo": numeroTomo,
        "CIIU": CIIU
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

//------------------------------------------------------------------------------------------------
//                          Metodo que actualiza una empresa
//------------------------------------------------------------------------------------------------
function actualizarEmpresa() {
    
        var idEmpresa = $("#hdIdEmpresaAct").val();
        var nombreEmpresa = $("#txtNombreAct").val();
        var provincia = $("#txtProvinciaAct").val();
        var representanteLegal = $("#txtRepresentanteAct").val();
        var canton = $("#txtCantonAct").val();
        var numeroPermiso = $("#txtNumeroPermisoAct").val();
        var distrito = $("#txtDistritoAct").val();
        var fechaVencimiento = $("#txtFechaVencimientoAct").val();
        var tipoRiesgo = $("#txtTipoRiesgoAct").val();
        var numeroRegistro = $("#txtNumeroRegistroAct").val();
        var ciiu = $("#txtCIIUAct").val();
        
    var parametros = {
        "opcion": "actualizar",
        "idEmpresa": idEmpresa,
        "nombre": nombreEmpresa,
        "provincia": provincia,
        "representante": representanteLegal,
        "canton": canton,
        "numeroPermiso": numeroPermiso,
        "distrito": distrito,
        "fechaVencimiento": fechaVencimiento,
        "tipoRiesgo": tipoRiesgo,
        "numeroRegistro": numeroRegistro,
        "CIIU": ciiu
    };
    $.ajax({
        data: parametros,
        url: '../msReglasNegocioAccion/EmpresaReglasNegocioAccion.php',
        type: 'post',
        success: function (response) {
            alert(response);
        }
    });
}

//------------------------------------------------------------------------------------------------
//                   Metodo para obtener empresa por el nombre
//------------------------------------------------------------------------------------------------
function obtenerEmpresa() {
    
    var seccion = $('#hdAutoSeccionId').val();
    
    if (seccion == 1) {
        var nombre = $('#txtAutoCompletarAct').val();
    }
    
    if (seccion == 3) {
        var nombre = $('#txtAutoCompletarBus').val();
    }

    var parametros = {
        "opcion" : "obtener",
        "nombre": nombre        
    };
    
    $.ajax({
        data: parametros,
        url: '../msReglasNegocioAccion/EmpresaReglasNegocioAccion.php',
        type: 'post',
        success: function (response) {
            
            $("#informationDiv").css("display","none");
            $("#informationDiv").fadeIn("slow");
            
            if (seccion == 1) {
                $("#hdIdEmpresaAct").val(response.idEmpresa);
                $("#txtNombreAct").val(response.nombreEmpresa);
                $("#txtProvinciaAct").val(response.provincia);
                $("#txtRepresentanteAct").val(response.representanteLegal);
                $("#txtCantonAct").val(response.canton);
                $("#txtNumeroPermisoAct").val(response.numeroPermisoSanitario);
                $("#txtDistritoAct").val(response.distrito);
                $("#txtFechaVencimientoAct").val(response.vencimiento);
                $("#txtTipoRiesgoAct").val(response.tipoRiesgo);
                $("#txtNumeroRegistroAct").val(response.numeroRegistro);
                $("#txtCIIUAct").val(response.numeroCiiu);
            }
            
            if (seccion == 3) {
                                       
                $("#lblNombreBus").html(response.nombreEmpresa);
                $("#lblRepresentanteBus").text(response.representanteLegal);
                var direccion = "" + response.provincia + "," + response.canton + "," + response.distrito;   
                $("#lblDireccionBus").html(direccion);
                $("#lblNumeroPermisoBus").html(response.numeroPermisoSanitario);
                $("#lblFechaVencimientoBus").html(response.vencimiento);
                $("#lblNumeroRegistroBus").html(response.numeroRegistro);
                $("#lblTipoRiesgoBus").html(response.tipoRiesgo);
                $("#lblCIIUBus").html(response.numeroCiiu);
            }
        }
    });
}

