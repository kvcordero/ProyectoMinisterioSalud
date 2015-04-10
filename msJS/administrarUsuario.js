
//-----------------------------------------------------------------------------------------------
//                      Metodo que crear el autocomplete
//------------------------------------------------------------------------------------------------
function autocompletarUsuario(opcion) {

    var min_length = 4; // min caracters to display the autocomplete
    var keyword;

    if (opcion == 1) {
        keyword = $('#txtAutoCompletarAct').val();
    } else if (opcion == 2) {
        keyword = $('#txtAutoCompletarElm').val();
    }else{
        keyword = $('#txtAutoCompletarBus').val();
    }
    
    if (keyword.length >= min_length) {

        var parametros = {
            "keyword": keyword,
            "opcion": "autocomplete",
            "opcionBusqueda": opcion
        };

        $.ajax({
            url: '../msReglasNegocioAccion/UsuarioReglasNegocioAccion.php',
            type: 'POST',
            data: parametros,
            success: function (data) {

                if (opcion == 1) {
                    $('#listaUsuarios').show();
                    $('#listaUsuarios').html(data);
                } else if (opcion == 2) {
                    $('#listaUsuariosEliminar').show();
                    $('#listaUsuariosEliminar').html(data);
                }else{
                    $('#listaUsuariosBuscar').show();
                    $('#listaUsuariosBuscar').html(data);
                }
            }
        });
    } else {
        
        if (opcion == 1) {
            $('#listaUsuarios').hide();
        }else if (opcion == 2) {
            $('#listaUsuariosEliminar').hide();
        }else{
            $('#listaUsuariosBuscar').hide(); 
        }
    }
}

//-----------------------------------------------------------------------------------------------
//              metodo para colocar el resultado del autocompletar en el txt
//------------------------------------------------------------------------------------------------
function set_item(item, idUsuario, opcion) {

    if (opcion == 1) {
        $('#txtAutoCompletarAct').val(item);
        $('#listaUsuarios').hide();
    } else if (opcion == 2) {
        $('#txtAutoCompletarElm').val(item);
        $('#listaUsuariosEliminar').hide();
    }else{
        $('#txtAutoCompletarBus').val(item);
        $('#listaUsuariosBuscar').hide();
    }
    
    $('#hdfIdUsuario').val(idUsuario);
}

//-----------------------------------------------------------------------------------------------
//              metodo para colocar el resultado del autocompletar en el txt
//------------------------------------------------------------------------------------------------
function mostrarDialog() {
    $("#dialog").dialog();
}

//-----------------------------------------------------------------------------------------------
//              metodo para limpiar el campo de autocompletado 
//------------------------------------------------------------------------------------------------
function limpiarCampo(opcion) {
    if (opcion == 1) {
        $("#txtAutoCompletar").val("");
    } else if (opcion == 2) {
        $("#txtAutoCompletar1").val("");
    }

}

//------------------------------------------------------------------------------------------------
//                          Metodo que inserta un usuario
//------------------------------------------------------------------------------------------------
function registrarUsuario() {

    var identificacion = $('#txtIdentificacionReg').val();
    var nombre = $("#txtNombreReg").val();
    var primerApellido = $('#txtPrimerApellidoReg').val();
    var segundoApellido = $('#txtSegundoApellidoReg').val();
    var email = $('#txtEmailReg').val();
    var usuario = $('#txtUsuarioReg').val();
    var contraseña = $('#txtContraseñaReg').val();

    var parametros = {
        "opcion": "insertar",
        "identificacion": identificacion,
        "nombre": nombre,
        "primerApellido": primerApellido,
        "segundoApellido": segundoApellido,
        "email": email,
        "usuario": usuario,
        "contraseña": contraseña
    };
    $.ajax({
        data: parametros,
        url: '../msReglasNegocioAccion/UsuarioReglasNegocioAccion.php',
        type: 'post',
        success: function (response) {
            alert(response);
        }
    });
}

//------------------------------------------------------------------------------------------------
//                          Metodo que actualiza un usuario
//------------------------------------------------------------------------------------------------
function actualizarUsuario() {

    var idUsuario = $('#hdfIdUsuario').val();
    var identificacion = $('#txtIdentificacionAct').val();
    var nombre = $("#txtNombreAct").val();
    var primerApellido = $('#txtPrimerApellidoAct').val();
    var segundoApellido = $('#txtSegundoApellidoAct').val();
    var email = $('#txtEmailAct').val();
    var usuario = $('#txtUsuarioAct').val();
    var contraseña = $('#txtContraseñaAct').val();

    var parametros = {
        "opcion": "actualizar",
        "identificacion": identificacion,
        "nombre": nombre,
        "primerApellido": primerApellido,
        "segundoApellido": segundoApellido,
        "email": email,
        "usuario": usuario,
        "contraseña": contraseña,
        "idUsuario": idUsuario
    };
    $.ajax({
        data: parametros,
        url: '../msReglasNegocioAccion/UsuarioReglasNegocioAccion.php',
        type: 'post',
        success: function (response) {
            alert(response);
        }
    });
}

//------------------------------------------------------------------------------------------------
//                   Metodo para obtener un usuario
//------------------------------------------------------------------------------------------------
function obtenerUsuario(opcion) {

    var idUsuario = $('#hdfIdUsuario').val();

    var parametros = {
        "opcion": "obtener",
        "idUsuario": idUsuario
    };

    $.ajax({
        data: parametros,
        url: '../msReglasNegocioAccion/UsuarioReglasNegocioAccion.php',
        type: 'post',
        success: function (response) {
            
            if (opcion == 1) {
                $("#txtIdentificacionAct").val(response.identificacionUsuario);
                $("#txtNombreAct").val(response.nombreUsuario);
                $("#txtPrimerApellidoAct").val(response.primerApellidoUsuario);
                $("#txtSegundoApellidoAct").val(response.segundoApellidoUsuario);
                $("#txtEmailAct").val(response.correoUsuario);
                $("#txtUsuarioAct").val(response.usuario);
                $("#txtContraseñaAct").val(response.contrasenna);
            }
            if (opcion == 2) {
                $("#lblNombreElm").text(response.nombreUsuario + " " + response.primerApellidoUsuario + " " + response.segundoApellidoUsuario);
                $("#lblIdentificacionElm").text(response.identificacionUsuario);
                $("#lblNombreUsuarioElm").text(response.nombreUsuario + " " + response.primerApellidoUsuario + " " + response.segundoApellidoUsuario);
                $("#lblCorreoUsuarioElm").text(response.correoUsuario);
                $("#informationDiv").show();
            }
            if (opcion == 3) {
                $("#lblNombreBus").text(response.nombreUsuario + " " + response.primerApellidoUsuario + " " + response.segundoApellidoUsuario);
                $("#lblIdentificacionBus").text(response.identificacionUsuario);
                $("#lblCorreoUsuarioBus").text(response.correoUsuario);
                $("#lblNombreUsuarioBus").text(response.usuario);
                $("#informationDivBuscar").show();
            }
        }
    });
}


//------------------------------------------------------------------------------------------------
//                   Metodo para obtener un usuario
//------------------------------------------------------------------------------------------------
function eliminarUsuario() {

    var idUsuario = $('#hdfIdUsuario').val();

    var parametros = {
        "opcion": "eliminar",
        "idUsuario": idUsuario
    };

    $.ajax({
        data: parametros,
        url: '../msReglasNegocioAccion/UsuarioReglasNegocioAccion.php',
        type: 'post',
        success: function (response) {
           alert(response);
        }
    });
}

