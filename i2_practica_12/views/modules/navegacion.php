<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        
        <div class="">
            <div class="main-menu-header">
                <div class="user-details">
                    <span> <h3>  </h3> </span>
                    <span> Usuario: <?php echo $_SESSION["username"] ?> </span>
                </div>
            </div>
        </div>


        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Administracion</div>

        <ul class="pcoded-item pcoded-left-item">
        
            <li class="pcoded-hasmenu">
                <a href="index.php?action=dashboard">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                
            </li>


            <li class="pcoded-hasmenu">
                <a href="#">
                    <span class="pcoded-micon"><i class="ti-package"></i>  <b>W</b></span>
                    <span class="pcoded-mtext"  data-i18n="nav.widget.main">Inventario</span>
                    <span class="pcoded-mcaret"></span>
                </a>

                <!-- Lista desplegable -->
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="index.php?action=listado_productos">
                            <span class="pcoded-mtext" data-i18n="nav.dash.default"><i class="ti-agenda"></i> Listado de productos</span>
                        </a>
                    </li>
                </ul>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="index.php?action=agregar_productos">
                            <span class="pcoded-mtext" data-i18n="nav.dash.default"><i class="fa fa-plus-circle"></i> Agregar producto</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="pcoded-hasmenu">
                <a href="#">
                    <span class="pcoded-micon"><i class="ti-bookmark"></i><b>W</b></span>
                    <span class="pcoded-mtext"  data-i18n="nav.widget.main">Categorias</span>
                    <span class="pcoded-mcaret"></span>
                </a>

                <!-- Lista desplegable -->
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="index.php?action=listado_categorias">
                            <span class="pcoded-mtext" data-i18n="nav.dash.default"><i class="ti-agenda"></i> Listado de categorías</span>
                        </a>
                    </li>
                </ul>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="index.php?action=agregar_categorias">
                            <span class="pcoded-mtext" data-i18n="nav.dash.default"><i class="fa fa-plus-circle"></i> Agregar categoria</span>
                        </a>
                    </li>
                </ul>

            </li>

            <li class="pcoded-hasmenu">
                <a href="#">
                    <span class="pcoded-micon"><i class="ti-user"></i><b>W</b></span>
                    <span class="pcoded-mtext"  data-i18n="nav.widget.main">Usuarios</span>
                    <span class="pcoded-mcaret"></span>
                </a>

                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="index.php?action=listado_usuarios">
                            <span class="pcoded-mtext" data-i18n="nav.dash.default"><i class="ti-agenda"></i> Listado de usuarios</span>
                        </a>
                    </li>
                </ul>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="index.php?action=agregar_usuarios">
                            <span class="pcoded-mtext" data-i18n="nav.dash.default"><i class="fa fa-plus-circle"></i> Agregar usuario</span>
                        </a>
                    </li>
                </ul>

            </li>

        </ul>
        
    </div>
</nav>