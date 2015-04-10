//-----------------------------------------------------------------------------------------------
//                      Metodo que muestra el formulario de crear usuario
//------------------------------------------------------------------------------------------------
function showRegisterSection (){
    
    $("#actualizeSection").css("display","none");
    $("#deleteSection").css("display","none");
    $("#searchSection").css("display","none");
    
    $("#registerSection").fadeIn("slow");
    
}

//-----------------------------------------------------------------------------------------------
//                      Metodo que muestra el formulario de actualizar usuario
//------------------------------------------------------------------------------------------------
function showActualizeSection (){
    
    $("#registerSection").css("display","none");
    $("#deleteSection").css("display","none");
    $("#searchSection").css("display","none");
    
    $("#actualizeSection").fadeIn("slow");
    
}

//-----------------------------------------------------------------------------------------------
//                      Metodo que muestra el formulario de borrar usuario
//------------------------------------------------------------------------------------------------
function showDeleteSection (){
    
    $("#registerSection").css("display","none");
    $("#actualizeSection").css("display","none");
    $("#searchSection").css("display","none");
    
    $("#deleteSection").fadeIn("slow");
    
}

//-----------------------------------------------------------------------------------------------
//                      Metodo que muestra el formulario de buscar usuario
//------------------------------------------------------------------------------------------------
function showSearchSection (){
    
    $("#registerSection").css("display","none");
    $("#actualizeSection").css("display","none");
    $("#deleteSection").css("display","none");

    $("#searchSection").fadeIn("slow");
    
}
