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
                <?php
                          $agregarP = new MvcController();
                          $agregarP -> agregarProductosController();
                        ?> 
                <h1>Agregar nuevo producto</h1>
                <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>

                <div class="card-header-right">
                    <i class="icofont icofont-spinner-alt-5"></i>
                </div>

            </div>
            <div class="col-sm-12 mobile-inputs">
                        <form method="post"> 
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Codigo:</label>
                                <div class="col-sm-10">
                                     <input type="text" name="txtCodigo" class="form-control form-control-round form-txt-danger" placeholder="Ingresa el codigo" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nombre:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="txtNombre" class="form-control form-control-round  form-txt-danger" placeholder="Ingresa el nombre" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Categoria</label>
                                <div class="col-sm-10">
                                    <select id="select_categorias" name="select_categorias" class="form-control form-control-round  form-txt-danger" required>
                                    <option value="">Selecciona una categoria</option> 
                                        <?php
                                          //cREAR un objeto MVC y accionar el controlador para traer todas las categorias y llenar el select
                                          $opciones = new MvcController();
                                          $opciones -> getCategoriasController();
                                        ?>  
                                  </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Precio:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="txtPrecio" class="form-control form-control-round  form-txt-danger" placeholder="Ingresa el precio" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Stock:</label>
                                <div class="col-sm-10">
                                    <input type="number" name="txtStock" class="form-control form-control-round  form-txt-danger" placeholder="Ingresa la cantidad" required>
                                </div>
                            </div>
                            <div class="form-group row">
                            <div class="col-sm-12">
                                <input title="Agregar" name="btnEnviar" type="submit" value="AGREGAR" class=" form-control btn hor-grd btn-grd-primary">
                            </div>    
                            </div>
                        </form>
                        
                    </div>
                    <br><br>
        </div>
</div>
</div>















