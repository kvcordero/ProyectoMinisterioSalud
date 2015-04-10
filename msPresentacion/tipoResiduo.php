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
                <li><span onclick="showRegisterSection()">Crear Tipo Residuo</span></li>
                <li><span onclick="showActualizeSection()">Actualizar Tipo Residuo</span></li>
                <li><span onclick="showDeleteSection()">Eliminar Tipo Residuo</span></li>
            </ul>
        </div>
        
         
         <div class="content">
             <!------------------------------------  register section  ----------------------------------------------->
             <div id="registerSection">
                 <div class="formContent">
                     <div class="form">
                         <form id="userForm" class="formoid-solid-blue" method="post">
                             <div class="title"><h2>Registrar Tipo Residuo</h2></div>                             
                             <div class="element-select">
                                 <label class="title"> Categoria Residuo</label>
                                 <div class="item-cont">
                                     <div class="large"><span>
                                             <select name="select" >
                                                 <option value="option 1">option 1</option>
                                                 <option value="option 2">option 2</option>
                                                 <option value="option 3">option 3</option>
                                             </select><i></i><span class="icon-place"></span></span>
                                     </div>
                                 </div>
                             </div>
                             <div class="element-separator"><hr></hr><h3 class="section-break-title">Elegir una Categoria Residuo</h3></div>
                             <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtCategoriaResiduo" placeholder="Tipo Residuo"/><span class="icon-place"></span></div></div>
                             <div class="submit"><input type="button" value="Registrar" onclick="crearUsuario();"/></div>
                         </form>
                     </div>
                 </div>
             </div>
             <!------------------------------------  actualize section  ----------------------------------------------->
             <div id="actualizeSection" style="display:none">
                 <div class="formContent">
                     <div class="form">
                         <!-- Start Formoid form-->
                         <form id="userForm" class="formoid-solid-blue" method="post">
                             <div class="title"><h2>Actualizar Categoria Residuo</h2></div>
                             <div class="element-select">
                                 <label class="title"> Categoria Residuo</label>
                                 <div class="item-cont">
                                     <div class="large"><span>
                                             <select name="select" >
                                                 <option value="option 1">option 1</option>
                                                 <option value="option 2">option 2</option>
                                                 <option value="option 3">option 3</option>
                                             </select><i></i><span class="icon-place"></span></span>
                                     </div>
                                 </div>
                             </div>
                             <div class="element-select">
                                 <label class="title"> Tipo Residuo</label>
                                 <div class="item-cont">
                                     <div class="large"><span>
                                             <select name="select" >
                                                 <option value="option 1">option 1</option>
                                                 <option value="option 2">option 2</option>
                                                 <option value="option 3">option 3</option>
                                             </select><i></i><span class="icon-place"></span></span>
                                     </div>
                                 </div>
                             </div>
                             <div class="element-separator"><hr></hr><h3 class="section-break-title">Buscar Tipo Residuo</h3></div>
                             <div class="element-input"><div class="item-cont"><input class="large" type="text" id="txtIdentificacion" placeholder="Nuevo Tipo Residuo"/><span class="icon-place"></span></div></div>
                             <div class="submit"><input type="button" value="Actualizar" onclick="crearUsuario();"/></div>
                         </form>
                     </div>
                 </div>
             </div>
             
             
             <!------------------------------------  delete section  ----------------------------------------------->
             <div id="deleteSection" style="display:none">
                 <div class="formContent">
                     <div class="form">
                         <!-- Start Formoid form-->
                         <form id="userForm" class="formoid-solid-blue" method="post">
                             <div class="title"><h2>Eliminar Categoria Residuo</h2></div>
                             <div class="element-select">
                                 <label class="title"> Categoria Residuo</label>
                                 <div class="item-cont">
                                     <div class="large"><span>
                                             <select name="select" >
                                                 <option value="option 1">option 1</option>
                                                 <option value="option 2">option 2</option>
                                                 <option value="option 3">option 3</option>
                                             </select><i></i><span class="icon-place"></span></span>
                                     </div>
                                 </div>
                             </div>
                             <div class="element-select">
                                 <label class="title"> Tipo Residuo</label>
                                 <div class="item-cont">
                                     <div class="large"><span>
                                             <select name="select" >
                                                 <option value="option 1">option 1</option>
                                                 <option value="option 2">option 2</option>
                                                 <option value="option 3">option 3</option>
                                             </select><i></i><span class="icon-place"></span></span>
                                     </div>
                                 </div>
                             </div>
                             <div class="submit"><input type="button" value="Eliminar" onclick="crearUsuario();"/></div>
                         </form>
                     </div>
                 </div>
             </div>             
         </div>
         
         <?php include './pageSections/Footer.php'; ?>

    </body>
</html>