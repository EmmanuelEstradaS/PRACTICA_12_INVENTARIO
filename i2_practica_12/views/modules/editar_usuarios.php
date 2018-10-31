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
                <h1>Editar usuario</h1>
                <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>

                <div class="card-header-right">
                    <i class="icofont icofont-spinner-alt-5"></i>
                </div>

            </div>
            <div class="col-sm-12 mobile-inputs">
                <?php
                  $res = new MvcController();
                  $datos = $res -> editarUsuariosController();
                ?> 
                        <form method="post">  
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nombre:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="txtNombre" class="form-control form-control-round  form-txt-warning"  value="<?php echo $datos["nombre"] ?>" required>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Apellido:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="txtApellido" class="form-control form-control-round  form-txt-warning"  value="<?php echo $datos["apellido"] ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Username:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="txtUsername" class="form-control form-control-round  form-txt-warning"  value="<?php echo $datos["username"] ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="txtEmail" class="form-control form-control-round  form-txt-warning"  value="<?php echo $datos["email"] ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Password:</label>
                                <div class="col-sm-10">
                                    <input type="password" name="txtPassword" class="form-control form-control-round  form-txt-warning" value="<?php echo $datos["password"] ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Fecha registrada:</label>
                                <div class="col-sm-10">
                                    <input type="date" name="txtFecha" class="form-control form-control-round  form-txt-warning" value="<?php echo $datos["fecha_registro"] ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                            <div class="col-sm-12">
                                <input title="Agregar" name="btnEnviar" type="submit" value="GUARDAR" class=" form-control btn hor-grd btn-grd-primary">
                            </div>    
                            </div>
                        </form>
                        <?php
                          $editarU = new MvcController();
                          $editarU -> actualizarUsuariosController();
                        ?> 
                    </div>
                    <br><br>
        </div>
</div>
</div>
