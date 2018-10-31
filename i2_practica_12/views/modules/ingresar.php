<!DOCTYPE html>
<html lang="en">

<head>
    <title> Sistema de Control de Inventario </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->

    <link rel="icon" href="/img/logo.png" type="image/x-icon">
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="views/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="views/assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="views/assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="views/assets/css/style.css">


</head>

<body class="fix-menu">
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
        <div class='contain'>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
        </div>
    </div>
</div>

    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="login-card card-block auth-body mr-auto ml-auto">

                        <form method="POST" class="md-float-material">
                            
                            <div class="text-center">
                            </div>

                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">SISTEMA DE CONTROL DE INVENTARIO</h3>
                                        <img src="views/img/logo_nav.png" width="200" height="200">
                                        <h3 class="text-left txt-primary">Iniciar Sesion</h3>
                                    </div>
                                </div>
                                <hr/>
                                <div class="input-group">
                                    <input type="text" id="txtUsername" name="txtUsername" class="form-control" placeholder="Username">
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="password" id="txtPassword" name="txtPassword" class="form-control" placeholder="Password">
                                    <span class="md-line"></span>
                                </div>


                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" id="btnIngresar" name="btnIngresar" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20"> Entrar</button>
                                    </div>
                                </div>
                                <hr/>

                            </div>
                        </form>
                        <?php
                            $ingresar = new MvcController();
                            $ingresar -> ingresoUsuarioController();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Required Jquery -->
    <script type="text/javascript" src="views/bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="views/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="views/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="views/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="views/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="views/bower_components/modernizr/js/modernizr.js"></script>
    <script type="text/javascript" src="views/bower_components/modernizr/js/css-scrollbars.js"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="views/bower_components/i18next/js/i18next.min.js"></script>
    <script type="text/javascript" src="views/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="views/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="views/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
    <script type="text/javascript" src="views/assets/js/common-pages.js"></script>
</body>

</html>




