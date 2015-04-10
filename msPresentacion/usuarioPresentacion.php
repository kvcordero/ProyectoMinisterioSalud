<!DOCTYPE HTML>
<html lang="es-es" dir="ltr"  data-config='{"twitter":0,"plusone":0,"facebook":0,"style":"ms"}'>

    <head>
        <?php include './pageSections/Head.php'; ?>
        <script src="../msJS/administrarUsuario.js"></script>
    </head> 

    <body>

        <?php include './pageSections/TopPageSideBar.php'; ?>

        <!------------------------------------  Side Bar section  ----------------------------------------------->
        <div class="sideBar">
            <div class="topSideBar"> Menu Principal  </div>
            <ul>
                <li><span onclick="showRegisterSection()">Crear Usuario</span></li>
                <li><span onclick="showActualizeSection()">Actualizar Usuario</span></li>
                <li><span onclick="showDeleteSection()">Eliminar Usuario</span></li>
                <li><span onclick="showSearchSection()">Buscar Usuario</span></li>
            </ul>
        </div>


        <div class="content">
            <!------------------------------------  register section  ----------------------------------------------->
            <div id="registerSection">
                <div class="formContent">
                    <div class="form">
                        <form id="userForm" class="formoid-solid-blue" method="post">
                            <div class="title"><h2>Registrar Usuario</h2></div>
                            <div class="element-input"><div class="titleImput">Correo Electronico:</div><div class="item-cont"><input class="large" type="text" id="txtIdentificacionReg" placeholder="Identificacion"/><span class="icon-place"></span></div></div>
                            <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtNombreReg" placeholder="Nombre"/><span class="icon-place"></span></div></div>
                            <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtPrimerApellidoReg" placeholder="Primer Apellido"/><span class="icon-place"></span></div></div>
                            <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtSegundoApellidoReg" placeholder="Segundo Apellido"/><span class="icon-place"></span></div></div>
                            <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtEmailReg" placeholder="Correo Electronico"/><span class="icon-place"></span></div></div>
                            <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtUsuarioReg" placeholder="Nombre de Usuario"/><span class="icon-place"></span></div></div>
                            <div class="element-password"><div class="item-cont"><input class="large" type="password" id="txtContraseñaReg" value="" placeholder="Contraseña"/><span class="icon-place"></span></div></div>
                            <div class="submit"><input type="button" value="Registrar" onclick="registrarUsuario();"/></div>
                        </form>
                    </div>
                </div>
            </div>
            <!------------------------------------  actualize section  ----------------------------------------------->
            <div id="actualizeSection" style="display:none">
                <div class="formContent">
                    <div class="form">
                        <form id="userForm" class="formoid-solid-blue" method="post">
                            <div class="title"><h2>Actualizar Usuario</h2></div>
                            <div class="input_container autocomplete">
                                <div class="element-input auto"><div class="item-cont"><input class="large" type="text" id="txtAutoCompletarAct" placeholder="Buscar Usuario" onkeyup="autocompletarUsuario(1);" onclick="limpiarCampo(1);"/>
                                        <input type="button" id="btnAutoComplete" value="Buscar" onclick="obtenerUsuario(1);"><span class="icon-place"></span></div></div>
                                <ul id="listaUsuarios"></ul>
                                <div class="element-separator"><hr></hr><h3 class="section-break-title">Buscar Usuario</h3></div>                              
                            </div>      
                            <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtIdentificacionAct" placeholder="Identificacion" disabled="disable"/><span class="icon-place"></span></div></div>
                            <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtNombreAct" placeholder="Nombre"/><span class="icon-place"></span></div></div>
                            <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtPrimerApellidoAct" placeholder="Primer Apellido"/><span class="icon-place"></span></div></div>
                            <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtSegundoApellidoAct" placeholder="Segundo Apellido"/><span class="icon-place"></span></div></div>
                            <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtEmailAct" placeholder="Correo Electronico"/><span class="icon-place"></span></div></div>
                            <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtUsuarioAct" placeholder="Nombre de Usuario"/><span class="icon-place"></span></div></div>
                            <div class="element-password"><div class="item-cont"><input class="large" type="password" id="txtContraseñaAct" txtContraseñavalue="" placeholder="Contraseña"/><span class="icon-place"></span></div></div>
                            <div class="submit"><input type="button" value="Actualizar" onclick="actualizarUsuario();"/></div>
                        </form> 
                    </div>
                </div>
            </div>

            <!------------------------------------  delete section  ----------------------------------------------->
            <div id="deleteSection" style="display:none">
                <div class="formContent">
                    <div class="form">
                        <form id="userForm" class="formoid-solid-blue" method="post">
                            <div class="title"><h2>Eliminar Usuario</h2></div>
                            <div class="input_container autocomplete">
                                <div class="element-input auto"><div class="item-cont"><input class="large" type="text" id="txtAutoCompletarElm" placeholder="Buscar Usuario" onkeyup="autocompletarUsuario(2);" onclick="limpiarCampo(2);"/>
                                        <input type="button" id="btnAutoComplete" value="Buscar" onclick="obtenerUsuario(2);"><span class="icon-place"></span></div></div>
                                <ul id="listaUsuariosEliminar"></ul>                               
                                <div class="element-separator"><hr></hr><h3 class="section-break-title">Buscar Usuario</h3></div>                              

                                <div id="informationDiv" style="display:none">
                                    <div class="form">
                                        <div class="formoid-solid-blue">
                                            <div class="title" id="tableTitle"><h2><div id="lblNombreElm"></div></h2></div>
                                            <span>Identificacion</span>
                                            <div class="element-separator"><h3 class="section-break-title"><div id="lblIdentificacionElm" class="result"></div></h3><hr></hr></div>                                        
                                            <span>Nombre de usuario</span>
                                            <div class="element-separator"><h3 class="section-break-title"><div id="lblNombreUsuarioElm" class="result"></div></h3><hr></hr></div>
                                            <span>Correo</span>
                                            <div class="element-separator"><h3 class="section-break-title"><div id="lblCorreoUsuarioElm" class="result"></div></h3><hr></hr></div>
                                        </div>
                                    </div>    
                                </div>

                            </div>   
                            <div class="submit"><input type="button" value="Eliminar" onclick="eliminarUsuario();"/></div>
                        </form>
                    </div>
                </div>
            </div>
            <!------------------------------------  search section  ----------------------------------------------->
            <div id="searchSection" style="display:none">
                <div class="formContent">
                    <div class="form">
                        <form id="userForm" class="formoid-solid-blue" method="post">
                            <div class="title"><h2>Buscar Usuario</h2></div>
                            <div class="input_container autocomplete">
                                <div class="element-input auto"><div class="item-cont"><input class="large" type="text" id="txtAutoCompletarBus" placeholder="Buscar Usuario" onkeyup="autocompletarUsuario(3);" onclick="limpiarCampo(3);"/>
                                        <input type="button" id="btnAutoComplete" value="Buscar" onclick="obtenerUsuario(3);"><span class="icon-place"></span></div></div>
                                <ul id="listaUsuariosBuscar"></ul>                               
                                <div class="element-separator"><hr></hr><h3 class="section-break-title">Buscar Usuario</h3></div>                              

                                <div id="informationDivBuscar" style="display:none">
                                    <div class="form">
                                        <div class="formoid-solid-blue">
                                            <div class="title" id="tableTitle"><h2><div id="lblNombreBus"></div></h2></div>
                                            <span>Identificacion</span>
                                            <div class="element-separator"><h3 class="section-break-title"><div id="lblIdentificacionBus" class="result"></div></h3><hr></hr></div>                                        
                                            <span>Nombre de usuario</span>
                                            <div class="element-separator"><h3 class="section-break-title"><div id="lblNombreUsuarioBus" class="result"></div></h3><hr></hr></div>
                                            <span>Correo</span>
                                            <div class="element-separator"><h3 class="section-break-title"><div id="lblCorreoUsuarioBus" class="result"></div></h3><hr></hr></div>
                                        </div>
                                    </div>    
                                </div>
                            </div>  
                        </form>
                    </div>
                </div>
            </div>
            <input type="hidden" id="hdfIdUsuario" />
        </div>
        <?php include './pageSections/Footer.php'; ?>
    </body>
</html>