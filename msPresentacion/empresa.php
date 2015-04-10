<!DOCTYPE HTML>
<html lang="es-es" dir="ltr"  data-config='{"twitter":0,"plusone":0,"facebook":0,"style":"ms"}'>

    <head>
        <?php include './pageSections/Head.php'; ?>
        <script type="text/javascript" src="../msJS/administrarEmpresa.js"></script>
        <script>
            $(function() { 
                $( "#txtFechaVencimientoAct" ).datepicker();
                $( "#txtFechaVencimiento" ).datepicker();
            });
        </script>
    </head> 

    <body>
        
        <?php include './pageSections/TopPageSideBar.php'; ?>
        
        
        <!------------------------------------  Side Bar section  ----------------------------------------------->
        <div class="sideBar">
            <div class="topSideBar"> Menu Principal  </div>
            <ul>
                <li><span onclick="showRegisterSection()">Crear Empresa</span></li>
                <li><span onclick="showActualizeSection()">Actualizar Empresa</span></li>
                <li><span onclick="showDeleteSection()">Eliminar Empresa</span></li>
                <li><span onclick="showSearchSection()">Buscar Empresa</span></li>
            </ul>
        </div>
        
        
         <div class="content">
             <input type="hidden" id="hdAutoSeccionId" />
             <!------------------------------------  register section  ----------------------------------------------->
             <div id="registerSection">
                 <div class="formContent">
                     <div class="form">
                         <form id="companyForm" class="formoid-solid-blue" method="post">
                             <div class="title"><h2>Registrar Empresa</h2></div>
                             <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtNombre" placeholder="Nombre Empresa o Institución"/><span class="icon-place"></span></div></div>
                             <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtProvincia" placeholder="Provincia"/><span class="icon-place"></span></div></div>
                             <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtRepresentante" placeholder="Representante Legal"/><span class="icon-place"></span></div></div>
                             <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtCanton" placeholder="Canton"/><span class="icon-place"></span></div></div>
                             <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtNumeroPermiso" placeholder="N° PSF"/><span class="icon-place"></span></div></div>
                             <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtDistrito" placeholder="Distrito"/><span class="icon-place"></span></div></div>
                             <div class="element-date"><div class="item-cont"><input class="large" data-format="yyyy-mm-dd" type="date" id="txtFechaVencimiento" placeholder="Fecha Vencimiento PSF"/><span class="icon-place"></span></div></div>    
                             <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtTipoRiesgo" placeholder="Tipo Riesgo"/><span class="icon-place"></span></div></div>
                             <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtNumeroTomo" placeholder="Numero Tomo"/><span class="icon-place"></span></div></div>
                             <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtCIIU" placeholder="CIIU"/><span class="icon-place"></span></div></div>
                             <div class="submit"><input type="button" value="Registrar"/></div>
                         </form>                    
                     </div>
                 </div>   
             </div>
             <!------------------------------------  actualize section  ----------------------------------------------->
             <div id="actualizeSection" style="display:none">
                 <div class="formContent">
                     <div class="form">
                         <div id="companyForm" class="formoid-solid-blue" method="post">
                             <div class="title"><h2>Actualizar Empresa</h2></div>
                             
                             <form>                          
                                 <div class="input_container autocomplete">
                                     <div class="element-input auto"><div class="item-cont"><input class="large" type="text" id="txtAutoCompletarAct" placeholder="Buscar Empresa" onkeyup="autocompletarEmpresa(1);"/><input type="button" id="btnAutoComplete" value="Buscar" onclick="obtenerEmpresa();"><span class="icon-place"></span></div></div>
                                     <ul id="listaEmpresasAct"></ul>
                                     <div class="element-separator"><hr></hr><h3 class="section-break-title">Buscar Empresa</h3></div>
                                     <input type="hidden" id="hdIdEmpresaAct" />
                                 </div>
                             </form>
                             
                             <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtNombreAct" placeholder="Nombre Empresa o Institución"/><span class="icon-place"></span></div></div>
                             <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtProvinciaAct" placeholder="Provincia"/><span class="icon-place"></span></div></div>
                             <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtRepresentanteAct" placeholder="Representante Legal"/><span class="icon-place"></span></div></div>
                             <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtCantonAct" placeholder="Canton"/><span class="icon-place"></span></div></div>
                             <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtNumeroPermisoAct" placeholder="N° PSF"/><span class="icon-place"></span></div></div>
                             <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtDistritoAct" placeholder="Distrito"/><span class="icon-place"></span></div></div>
                             <div class="element-date"><div class="item-cont"><input class="large" data-format="yyyy-mm-dd" type="date" id="txtFechaVencimientoAct" placeholder="Fecha Vencimiento PSF"/><span class="icon-place"></span></div></div>    
                             <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtTipoRiesgoAct" placeholder="Tipo Riesgo"/><span class="icon-place"></span></div></div>
                             <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtNumeroRegistroAct" placeholder="Numero Tomo"/><span class="icon-place"></span></div></div>
                             <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtCIIUAct" placeholder="CIIU"/><span class="icon-place"></span></div></div>
                             <div class="submit"><input type="button" value="Actualizar" onclick="actualizarEmpresa()"/></div>
                         </div>                    
                     </div>
                 </div> 
             </div>
             <!------------------------------------  delete section  ----------------------------------------------->
             <div id="deleteSection" style="display:none">
                 <div class="formContent">
                     <div class="form">
                         <form id="companyForm" class="formoid-solid-blue" method="post">
                             <div class="title"><h2>Registrar Empresa</h2></div>
                             <div class="autocomplete">                                 
                                 <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtAutoCompletarAct" placeholder="Buscar Empresa"/><input type="button" id="btnAutoComplete" value="Buscar" onclick="crearUsuario();"><span class="icon-place"></span></div></div>
                                 <div class="element-separator"><hr></hr><h3 class="section-break-title">Buscar Empresa</h3></div>
                             </div>
                             <div id="informationDiv" style="display:none">
                                 <div class="form">
                                     <div class="formoid-solid-blue">
                                         <div class="title" id="tableTitle"><h2><div id="lblNombre"></div></h2></div>
                                         <span>Representante Legal</span>
                                         <div class="element-separator"><h3 class="section-break-title"><div id="lblRepresentante" class="result"></div></h3><hr></hr></div>
                                         <span>Numero de Permiso Sanitario </span>
                                         <div class="element-separator"><h3 class="section-break-title"><div id="lblNumeroPermiso" class="result"></div></h3><hr></hr></div>
                                         <span>Direccion </span>
                                         <div class="element-separator"><h3 class="section-break-title"><div id="lblDireccion" class="result"></div></h3><hr></hr></div>
                                     </div>
                                 </div>    
                             </div>
                             <div class="submit"><input type="button" value="Eliminar"/></div>
                         </form>                    
                     </div>
                 </div>
             </div>
             <!------------------------------------  search section  ----------------------------------------------->
             <div id="searchSection" style="display:none">
                 
                 <div class="form" id="buscarDiv">
                     <form id="buscarForm" class="formoid-solid-blue" method="post">
                         <div class="title"><h2>Ver Empresa</h2></div>
                         <div class="input_container autocomplete">
                             <div class="element-input auto"><div class="item-cont"><input class="large" type="text" id="txtAutoCompletarBus" placeholder="Buscar Empresa" onkeyup="autocompletarEmpresa(3);"/><input type="button" id="btnAutoComplete" value="Buscar" onclick="obtenerEmpresa();"><span class="icon-place"></span></div></div>
                             <ul id="listaEmpresasBus"></ul>
                             <div class="element-separator"><hr></hr><h3 class="section-break-title">Buscar Empresa</h3></div>
                             <input type="hidden" id="hdIdEmpresaAct" />
                         </div> 
                     </form>
                 </div>

                 <div id="informationDiv" >
                     <div class="form">
                         <div class="formoid-solid-blue">
                             <div class="title" id="tableTitle"><h2><div id="lblNombreBus"></div></h2></div>
                             <span>Representante</span>
                             <div class="element-separator"><h3 class="section-break-title"><div id="lblRepresentanteBus" class="result"></div></h3><hr></hr></div>
                             <span>Direccion</span>
                             <div class="element-separator"><h3 class="section-break-title"><div id="lblDireccionBus" class="result"></div></h3><hr></hr></div>
                             <span>Numero de Persimiso Sanitario</span>
                             <div class="element-separator"><h3 class="section-break-title"><div id="lblNumeroPermisoBus" class="result"></div></h3><hr></hr></div>
                             <span>Fecha de Vencimiento</span>
                             <div class="element-separator"><h3 class="section-break-title"><div id="lblFechaVencimientoBus" class="result"></div></h3><hr></hr></div>
                             <span>Numero de Registro</span>
                             <div class="element-separator"><h3 class="section-break-title"><div id="lblNumeroRegistroBus" class="result"></div></h3><hr></hr></div>
                             <span>Tipo de Riesgo</span>
                             <div class="element-separator"><h3 class="section-break-title"><div id="lblTipoRiesgoBus" class="result"></div></h3><hr></hr></div>
                             <span>Numero CIIU</span>
                             <div class="element-separator"><h3 class="section-break-title"><div id="lblCIIUBus" class="result"></div></h3><hr></hr></div>
                         </div>
                     </div>    
                 </div>
             </div>
         </div>
         
         <?php include './pageSections/Footer.php'; ?>

    </body>
</html>