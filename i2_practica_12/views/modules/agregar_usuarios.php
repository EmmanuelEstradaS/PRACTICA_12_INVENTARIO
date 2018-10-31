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
  $agregarU = new MvcController();
  
?>
<div class="row">
    <div class="col-xs-6 col-sm-3">  </div> 
    <div class="col-xs-6 col-sm-6">                                    

        <div class="card">
            <div class="card-header">
                <?php
                    $agregarU -> agregarUsuariosController();
                ?>
                <h1>Agregar nuevo usuario</h1>
                <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>

                <div class="card-header-right">
                    <i class="icofont icofont-spinner-alt-5"></i>
                </div>

            </div>
            <div class="col-sm-12 mobile-inputs">
                        <form method="post">  
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nombre:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="txtNombre" class="form-control form-control-round  form-txt-warning" placeholder="Ingresa el nombre" required>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Apellido:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="txtApellido" class="form-control form-control-round  form-txt-warning" placeholder="Ingresa el apellido" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Username:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="txtUsername" class="form-control form-control-round  form-txt-warning" placeholder="Ingresa el nombre de usuario" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email:</label>
                                <div class="col-sm-10">
                                    <input type="email" name="txtEmail" class="form-control form-control-round  form-txt-warning" placeholder="Ingresa el email" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Password:</label>
                                <div class="col-sm-10">
                                    <input type="password" name="txtPassword" class="form-control form-control-round  form-txt-warning" placeholder="Ingresa la contraseña" required>
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















