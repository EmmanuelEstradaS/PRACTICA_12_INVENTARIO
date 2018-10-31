<?php
//iniciar la sesion y redireccionar al los productos
error_reporting(0);
    session_start();
  if(!$_SESSION['id']){
    echo "
    <script type='text/javascript'>
      window.location='index.php';
    </script>";
  } 
?>
 
<div class="card page-header p-0">
    <div class="card-block front-icon-breadcrumb row align-items-end">
        <div class="breadcrumb-header col">
            <div class="big-icon">
                <span class="pcoded-micon"><i class="ti-package text-danger"></i> </span>

            </div>
            <div class="d-inline-block">
                <h5>Productos</h5>
                <span> Cantidad de productos:  
                    <?php 
                    #SE INSTANCIA LA CLASE CONTROLLER 
                        $cantidadP = new MvcController(); 
                        #SE MANDA A LLAMAR ESTA FUNCION, QUE LO QUE HACE ES REGRESGRESAR LA CANTIDAD DE LOS PRODUCTOS DIFERENTE QUE HAY EN EXISTENCIA
                        $cantidadP -> getCantidadProductosController();
                    ?> 
                </span>
            </div>
        </div>
        <div class="col">
        <div class="page-header-breadcrumb">
            <ul class="breadcrumb-title">
                <li class="breadcrumb-item"><a href="index.php?action=dashboard">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="index.php?action=listado_productos">Productos</a>
                </li>
            </ul>
        </div>
        </div>
    </div>
</div>

<div class="card page-header p-0">
    <div class="card-block front-icon-breadcrumb row align-items-end">
        <div class="breadcrumb-header col">
            <div class="big-icon">
                <span class="pcoded-micon"><i class="ti-bookmark text-success"></i></span>
            </div>
            <div class="d-inline-block">
                <h5>Categorias</h5>
                <span> Cantidad de categorias: 
                    <?php 
                        #SE ESTANCIA LA CLASE MvcControler PARA PODER USAR LA FUNCION getCantidadCategoriasController QUE REGRESA LA CANTIDAD DE CATEGORIAS
                        $cantidadC = new MvcController(); 
                        $cantidadC -> getCantidadCategoriasController();
                    ?> 
                </span>
            </div>
        </div>
        <div class="col">
        <div class="page-header-breadcrumb">
            <ul class="breadcrumb-title">
                <li class="breadcrumb-item"><a href="index.php?action=dashboard">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="index.php?action=listado_categorias">Categorias</a>
                </li>
            </ul>
        </div>
        </div>
    </div>
</div>

<div class="card page-header p-0">
    <div class="card-block front-icon-breadcrumb row align-items-end">
        <div class="breadcrumb-header col">
            <div class="big-icon">
                <span class="pcoded-micon"><i class="ti-user text-warning"></i></span>
            </div>
            <div class="d-inline-block">
                <h5>Usuarios</h5>
                <span> Cantidad de usuarios:  
                    <?php 
                        #SE ESTANCIA LA CLASE MvcControler PARA PODER USAR LA FUNCION getCantidadUsuariosController QUE REGRESA LA CANTIDAD DE LOS USAURIOS QUE SE ENCUENTRAN REGISTRADOS

                        $cantidadU = new MvcController(); 
                        $cantidadU -> getCantidadUsuariosController();
                    ?> 
                </span>
            </div>
        </div>
        <div class="col">
        <div class="page-header-breadcrumb">
            <ul class="breadcrumb-title">
                <li class="breadcrumb-item"><a href="index.php?action=dashboard">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="index.php?action=listado_usuarios">Usuarios</a>
                </li>
            </ul>
        </div>
        </div>
    </div>
</div>
