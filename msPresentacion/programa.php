<!DOCTYPE HTML>
<html lang="es-es" dir="ltr"  data-config='{"twitter":0,"plusone":0,"facebook":0,"style":"ms"}'>

    <head>
        <?php include './pageSections/Head.php'; ?>
        <script>
            $(function() { 
                $( "#txtFechaRegistro" ).datepicker();
            });
        </script>
    </head> 

    <body>
        
        <?php include './pageSections/TopPageSideBar.php'; ?>
        
        <!------------------------------------  Side Bar section  ----------------------------------------------->
        <div class="sideBar">
            <div class="topSideBar"> Menu Principal  </div>
            <ul>
                <li><span onclick="showRegisterSection()">Crear Programa</span></li>
                <li><span onclick="showActualizeSection()">Actualizar Programa</span></li>
                <li><span onclick="showDeleteSection()">Eliminar Programa</span></li>
                <li><span onclick="showSearchSection()">Buscar Programa</span></li>
            </ul>
        </div>
        
        <!--  Content section  -->
        <div class="content">
            <div class="form" id="buscarDiv">
                <form id="buscarForm" class="formoid-solid-blue" method="post">
                    <div class="title"><h2>Registrar Programa de Manejo de Residuos Solidos</h2></div>
                    <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtAutoCompletar" placeholder="Buscar Empresa"/><input type="button" id="btnAutoComplete" value="Buscar" onclick="crearUsuario();"><span class="icon-place"></span></div></div>
                    <div class="element-separator"><h3 class="section-break-title"><div id="lblEmpresa" class="result">Trabajos Manuales Tencha</div></h3><hr></hr></div>
                    Fecha de Registro
                    <div class="element-date"><div class="item-cont"><input class="large" data-format="yyyy-mm-dd" type="date" id="txtFechaRegistro" placeholder="Fecha de Registro"/><span class="icon-place"></span></div></div>
                </form>

            </div>

            <div class="firstSelect">
                <div id="tipoTratamiento" class="formoid-solid-blue">
                    <div class="titleSelect">Tipo Tratamiento</div>
                    <div class="column column1">
                        <label><input type="checkbox" name="checkbox[]" value="option 1"/><span>option 1</span></label>
                        <label><input type="checkbox" name="checkbox[]" value="option 2"/><span>option 2</span></label>
                        <label><input type="checkbox" name="checkbox[]" value="option 3"/><span>option 3</span></label>
                    </div><span class="clearfix"></span>
                </div>
                <div id="seleccionGestor" class="formoid-solid-blue">
                    <div class="titleGestor">Buscar Gestor</div>
                    <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtAutoCompletar" placeholder="Buscar Gestor"/><input type="button" id="btnAutoComplete" value="Buscar" onclick="crearUsuario();"><span class="icon-place"></span></div></div>
                    <div class="element-separator"><h3 class="section-break-title"><div id="lblEmpresa" class="result"></div></h3><hr></hr></div>
                </div> 
            </div>   
            <div class="secondSelect">
                <div id="cateogriaResiduo" class="formoid-solid-blue">
                    <div class="titleGestor column">Categoria Residuo</div>
                    <div class="column column1">
                        <label><input type="radio" name="radio" value="option 1" /><span>option 1</span></label>
                        <label><input type="radio" name="radio" value="option 2" /><span>option 2</span></label>
                        <label><input type="radio" name="radio" value="option 3" /><span>option 3</span></label>
                        <label><input type="radio" name="radio" value="option 3" /><span>option 3</span></label>
                    </div><span class="clearfix"></span>
                </div>
                <div id="tipoResiduo" class="formoid-solid-blue">
                    <div class="titleGestor column">Tipo Residuo</div>
                    <div class="column column1">
                        <label><input type="radio" name="radio" value="option 1" /><span>option 1</span></label>
                        <label><input type="radio" name="radio" value="option 2" /><span>option 2</span></label>
                        <label><input type="radio" name="radio" value="option 3" /><span>option 3</span></label>
                        <label><input type="radio" name="radio" value="option 3" /><span>option 3</span></label>
                    </div><span class="clearfix"></span>
                </div>     
            </div>
            <div id="buttonRegister" class="formoid-solid-blue">
                <div class="submit"><input type="button" value="Registrar" onclick="crearUsuario();"/></div>
            </div>

        </div>
         
         <?php include './pageSections/Footer.php'; ?>

    </body>
</html>


