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
<div class="row">
    <div class="col-xs-6 col-sm-3">  </div> 
    <div class="col-xs-6 col-sm-6">                                    

        <div class="card">
            <div class="card-header">
                <h1>Detalles de inventario</h1>
                <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>

                <div class="card-header-right">
                    <i class="icofont icofont-spinner-alt-5"></i>
                </div>

            </div>
            <div class="col-sm-12 mobile-inputs">
                <div class="card gallery-desc">
                    <div class="masonry-media">
                        <a class="media-middle" href="#!">
                            <img class="img-fluid" src="views/img/stock.png" alt="masonary">
                        </a>
                    </div>
                    <?php 
                        $det = new MvcController();
                        $res = $det -> getDetallesProductosController();
                    ?>
                    <div class="card-block">
                        <h6 class="job-card-desc">Producto: <?php echo $res["nombre"] ?></h6>
                        <h6 class="job-card-desc">Categoria: <?php echo $res["categoria"] ?></h6>
                        <h6 class="job-card-desc">Cantidad: <?php echo $res["stock"] ?></h6>
                        <p class="text-muted">Aumentar o disminuir cantidad a este producto del inventario.</p>
                        <form method="post">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Stock:</label>
                                <div class="col-sm-10">
                                    <input type="number" name="txtStock" class="form-control form-control-round  form-txt-danger" placeholder="Ingresa la cantidad" required>
                                </div>
                                <label class="col-sm-3 col-form-label">Referencia:</label>
                                <div class="col-sm-10">
                                    <input type="number" name="txtReferencia" class="form-control form-control-round  form-txt-danger" placeholder="Ingresa una referecia" required>
                                </div>
                                <label class="col-sm-3 col-form-label">Nota:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="txtNota" class="form-control form-control-round  form-txt-danger" placeholder="Ingresa una nota" required>
                                </div>
                            </div>
                            <input title="Aumentar" name="btnAumentar" type="submit" value="Aumentar" class=" form-control btn hor-grd btn-grd-primary">
                            <input title="Disminuir" name="btnDisminuir" type="submit" value="Disminuir" class=" form-control btn hor-grd btn-grd-danger">
                        </form>
                    </div>
                    <?php 
                        $aumentarDisminuir = new MvcController();
                        $aumentarDisminuir -> aumentar_disminuirStockController();
                    ?>
                </div>
            </div>
            <br><br>
        </div>
</div>
</div>

<div class="card">
                    <div class="card-header">
                        
                        <h1>Historial</h1>
                        <br>
                        <div class="card-header-right"> <i class="icofont icofont-spinner-alt-5"></i></div>
                    </div>
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <div id="simpletable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12">

                                        <table id="example1" class="table table-striped table-bordered nowrap dataTable" role="grid" aria-describedby="simpletable_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 149px;">id
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 106px;">Producto
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 49px;">Usuario
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 108px;">Referencia
                                    </th>
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 74px;">Nota
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 74px;">Fecha
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="simpletable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 74px;">Tipo
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $hist = new MvcController();
                                        $hist -> vistaHistorialController();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>  















 