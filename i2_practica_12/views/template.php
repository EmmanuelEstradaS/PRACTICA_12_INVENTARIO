<!DOCTYPE html>
<html lang="es">
<head>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">

    <link rel="stylesheet" type="text/css" href="views/assets/pages/advance-elements/css/bootstrap-datetimepicker.css">

     <!-- Favicon icon -->
    <link rel="icon" href="views/img/logo.png" type="image/x-icon">
    
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="views/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="views/assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="views/assets/icon/icofont/css/icofont.css">
    <!-- Menu-Search css -->
    <link rel="stylesheet" type="text/css" href="views/assets/pages/menu-search/css/component.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="views/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="views/assets/css/jquery.mCustomScrollbar.css">

    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css"
          href="views/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="views/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
          href="views/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">



    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="views/sweetalert/dist/sweetalert.css">
    <script type="text/javascript" src="views/sweetalert/dist/sweetalert.js"></script>
    <script type="text/javascript" src="views/sweetalert/dist/sweetalert.min.js"></script>
    <script src="views/js/sweetalert.min.js"></script>

    
    
</head>
<body>
<!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->


    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <?php
            if(isset($_SESSION["id"]))
            {
                include 'views/modules/header.php';
            }
            ?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <?php
                        if(isset($_GET["action"]))
                        {
                          if($_GET["action"]!="registro")
                          {
                            include("modules/navegacion.php");
                          }
                        }
                      ?>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">

                                <div class="page-wrapper">
                                  
                                  <?php 
                                    $mvc = new MvcController();
                                    $mvc -> enlacesPaginasController();
                                  ?> 
                                </div>

                            </div>                        
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>


    <!-- Required Jquery -->
    <script type="text/javascript" src="views/bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="views/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="views/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="views/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="views/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="views/bower_components/modernizr/js/modernizr.js"></script>
    <!-- am chart -->
    <script src="views/assets/pages/widget/amchart/amcharts.min.js"></script>
    <script src="views/assets/pages/widget/amchart/serial.min.js"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="views/bower_components/chart.js/js/Chart.js"></script>
    <!-- Todo js -->
    <script type="text/javascript" src="views/assets/pages/todo/todo.js "></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="views/bower_components/i18next/js/i18next.min.js"></script>
    <script type="text/javascript" src="views/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="views/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="views/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="views/assets/pages/dashboard/custom-dashboard.min.js"></script>
    <script type="text/javascript" src="views/assets/js/SmoothScroll.js"></script>
    <script src="views/assets/js/pcoded.min.js"></script>
    <script src="views/assets/js/demo-12.js"></script>
    <script src="views/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="views/assets/js/script.min.js"></script>

    <!-- data-table js -->
    <script src="views/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="views/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="views/assets/pages/data-table/js/jszip.min.js"></script>
    <script src="views/assets/pages/data-table/js/pdfmake.min.js"></script>
    <script src="views/assets/pages/data-table/js/vfs_fonts.js"></script>
    <script src="views/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="views/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="views/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="views/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="views/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script type="text/javascript" src="views/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="views/assets/pages/advance-elements/bootstrap-datetimepicker.min.js"></script>

    <!-- page script -->
    <script>
    $(function () {

        //Inicializacion de Data-Table
        $('#example1').DataTable({
            "ordering": false,
            "info":     false,
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        })
    })

    </script>
</body>

</html>
