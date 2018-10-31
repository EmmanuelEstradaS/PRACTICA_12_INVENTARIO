<?php
class MvcController
{
	#LLAMADA A LA PLANTILLA
	#-------------------------------------
    private $_dato;

	public function pagina()
	{	
		 session_start();
        //Include se utiliza para invocar el arhivo que contiene el codigo HTML
        if( isset($_SESSION['id']) ){
            include "views/template.php";
        }else{
            include 'views/modules/ingresar.php';
        }
	}


	#ESTA FUNCION REGRESA LA CANTIDAD DE LOS PRODUCTOS DIFERENTES QUE HAY EN EXISTENCIA ACTUALMENTE
	public function getCantidadProductosController()
	{
		#EN LA VARIABLE $respuesta SE GUARDA EL TOTAL DE PRODUCTOS DIFERENTES QUE SE ENCUENTRAN REGISTRADOS EN EL SISTEMA, A ESTE MODELO (FUNCION) SE LE MANDA COMO PARAMETRO EL NOMBRE DE LA TABLA EN ESTE CASO SE QUIERE OBTENER CUANTOS PRODUCTOS DIFERENTES HAY.
		$respuesta = Datos::getCantidadProductosModel("productos");
		echo $respuesta["cantidad"];
	}
	#ESTA FUNCION REGRESA LA CANTIDAD DE LAS CATEGORIA DIFERENTES QUE HAY EN EXISTENCIA ACTUALMENTE

	public function getCantidadCategoriasController()
	{

		#EN LA VARIABLE $respuesta SE GUARDA EL TOTAL DE PRODUCTOS DIFERENTES QUE SE ENCUENTRAN REGISTRADOS EN EL SISTEMA, A ESTE MODELO (FUNCION) SE LE MANDA COMO PARAMETRO EL NOMBRE DE LA TABLA EN ESTE CASO SE QUIERE OBTENER CUANTAS CATEGORIA DIFERENTES HAY.
		$respuesta = Datos::getCantidadCategoriasModel("categorias");
		echo $respuesta["cantidad"];
	}
	
	#ESTA FUNCION REGRESA LA CANTIDAD DE LOS USUARIOS DIFERENTES QUE HAY EN EXISTENCIA ACTUALMENTE
	public function getCantidadUsuariosController()
	{

	#EN LA VARIABLE $respuesta SE GUARDA EL TOTAL DE LOS USUARIOS DIFERENTES QUE SE ENCUENTRAN REGISTRADOS EN EL SISTEMA, A ESTE MODELO (FUNCION) SE LE MANDA COMO PARAMETRO EL NOMBRE DE LA TABLA, EN ESTE CASO SE QUIERE OBTENER LA CANTIDAD DE USUARIOS QUE HAY REGISTRADOS.
		$respuesta = Datos::getCantidadUsuariosModel("usuarios");
		echo $respuesta["cantidad"];
	}

	#ENLACES
	#-------------------------------------
	#REDIRECCIONA A LAS DIFERENTES PAGINAS QUE EXISTEN EN EL SISTEMA
	public function enlacesPaginasController()
	{
		#VERIFICA SI ACTIVA EL action PARA REDIRECCIONAR A LA PAGINA DESEADA, ENCASO DE QUE ESTA SEA ACTIVADA, SI SE ACTIVO A LA VARIABLE $enlaces SE LE ACCINA EL ACTION QUE ES LA PAGINA A LA CUAL SE QUIRE INGRESAR.
		if(isset( $_GET['action']))
		{
			$enlaces = $_GET['action'];
		}
		else
		{
			$enlaces = "index";
		}
		#PARA PODER USAR MODEL SE LE MANDA COMO PARAMETRO LA VARIBLE $enlaces QUE ES LA QUE CONTIENE LA DIRECCIÓN DE LA PAGINA A LA CUAL QUE SE DESEA ACCEDER.
		$respuesta = Paginas::enlacesPaginasModel($enlaces);
		include $respuesta;
	}

	public function getCantidadLibrosController()
	{
		$respuesta = Datos::getCantidadLibrosModel("libros",$_SESSION["id"]);
		echo $respuesta["cantidad"];
	}

	public function getCategoriaByIdController($id)
	{
			$respuesta = Datos::getCategoriaByIdModel("categorias",$id);
			return $respuesta;
	}

	#ESTA FUNCION ES LLAMADA DESDE EL ARCHIVO 	listado_pruductos  PARA PODER VISULIZAR LOS PRODUCTOS QUE HAY EN LA BASE DE DATOS EN FORMA DE LISTDO.

	public function vistaProductosController()
	{
		#SI EL PRODUCTO SE GUARDA CORRECTAMNETE EN LA BASE DE DATOS MANDA UN MESAJE DE EXTITO QUE SE REFIERE QUE EL PRODUCTO SE AGREGO EXITOSAMENTE A LA BASE DE DATOS E INFORMA AL USUARIO 
		if (isset($_GET["ok"])) 
		{
			echo '<div class="alert alert-success background-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled text-white"></i>
                        </button>
                        <strong>Producto registrado exitosamente</strong>
                    </div>';
		}
		#MUESTRA MENSAJE EN CASO DE QUE EL USAUARIO HAYA ACTUALIZADO EL STOCK DEL PRODUTO EN ESTE CASO MUESTRA EL MENSAJE QUE SE HA DISMINUIDO LA CANTIDAD DEL ESTOCK DE UN PRODUCTO EN ESPECIFICO
		if (isset($_GET["disminuido"])) 
		{
			echo '<div class="alert alert-success background-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled text-white"></i>
                        </button>
                        <strong>Stock disminuido exitosamente</strong>
                    </div>';
		}

		#MUESTRA MENSAJE EN CASO DE QUE EL USAUARIO HAYA ACTUALIZADO EL STOCK DEL PRODUTO EN ESTE CASO MUESTRA EL MENSAJE QUE SE HA AUMENTADO LA CANTIDAD DEL ESTOCK DE UN PRODUCTO EN ESPECIFICO
		if (isset($_GET["aumentado"])) 
		{
			echo '<div class="alert alert-success background-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled text-white"></i>
                        </button>
                        <strong>Stock aumentado exitosamente</strong>
                    </div>';
		}

		#MUESTRA MENSAJE EN CASO DE QUE EL USAUARIO HAYA ACTUALIZADO EL STOCK DEL PRODUTO EN ESTE CASO MUESTRA EL MENSAJE QUE SE HA SIDO MODIFICADO ALGUN CAMPO EN ESPECIFICO DEL PRODUCTO
		if (isset($_GET["producto_editado"])) 
		{
			echo '<div class="alert alert-success background-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled text-white"></i>
                        </button>
                        <strong>Producto actalizado exitosamente</strong>
                    </div>';
		}
		#PARA PODER VISUALIZAR LOS PORDUCTOS QUE SE ENCUNTRAN EN LA BASE DE DATOS SE TIENE QUE LLAMAR EL MODELO (FUNCION" DE "vistaProductosModel" QUE SE ENCUENTRA ISNTANCIADO EN LA CLASE "crud", PARA PODER HACER LA CONSULT A LA BASE DE DATOS Y QUE REGRESE COMO PARAMETRO TODOS LO PRODUCTOS DISPONIBLES. 
		#EN LA VARIABLE "arrayRespuesta" SE GUARDAN TODOS LOS REGISTROS QUE SE OBTIENEN APARTIR DE DEL MODELO MENCIONADO
			$arrayRespuesta = Datos::vistaProductosModel("productos");
			foreach($arrayRespuesta as $row => $item)
			{
				# LOS PRODUCTOS ESTAN ASOCIADO CON LA TABLA CATEGORIAS, POR LO TANTO TAMBIEN SE DEBEN DE OBTENER LAS CATEGORIA PARA PODER MOSTRAR A QUE CATEGORIA PERTENCE CDA UNO DE LOS PRODUCTOS, QUE ESTA ASOCIADO POR EL ID DE CATEGORIAS 
				$nomCate = Datos::getNombreCategoriaByIdModel("categorias",$item["categoria"]);
				#SE IMPRIME EL LISTADO DE LOS PRODUCTOS CON CADA UNO DE SUS CAMPOS, ASI MISMO SE CREAN 3 IMPUTS (BOTONES) QUE AYUDAN A REDIRECCIONAR A OTRAS PAGINAS PARA REALIZAR OTRAS TAREAS QUE SON LOS BOTONES DE EDITAR, DETALLES Y ELIMINAR.
			echo'
					<tr>
						<td>'.$item["id_producto"].'</td>

						<td>'.$item["codigo"].'</td>
						<td>'.$item["nombre"].'</td>
						<td>'.$nomCate["nombre"].'</td>
						<td>'.$item["precio"].'</td>
						<td>'.$item["stock"].'</td>

						<td> <a title="Editar" href="index.php?action=editar_productos&id='.$item["id_producto"].'"> 
						    <button class="btn hor-grd btn-grd-warning "><i class="fa fa-edit"></i> Editar</button>
						     </a> 
						</td>
						<td> <a title="detalles" href="index.php?action=detalles_productos&id='.$item["id_producto"].'"> 
						    <button class="btn hor-grd btn-grd-primary "><i class="fa fa-search-plus"></i> Detalles</button>
						     </a> 
						</td>
						<td> <button title="Borrar" onClick="borrar('.$item["id_producto"].');" class="btn hor-grd btn-grd-danger " title= "Eliminar Libro"> 
						<i class="fa fa-trash"></i> Eliminar </button></center> </td>
					</tr> ';
			}
			#PARA LA ELIMINACION DE UN PRODUCTO ES NECESARIO INGRESAR LA CONTRASEÑA DEL USUARIO QUE ESTA EN SECION ES POR ESO QUE SE MUESTRA UNA VENTANA QUE SOLICITA LA CONTRASEÑA DEL USUARIO.
			echo '</tbody></table>';
			echo '<script type="text/javascript">
	        var password="'.$_SESSION["password"].'";
	        function borrar(id){
	          swal("Ingrese su contraseña:", {
	            content: "input",
		          })
		          .then((value) => 
		          {
		              if (value==password) 
		              {
		                swal("Contraseña correcta", "Libro eliminado", "success");
		                window.location.href = "index.php?action=listado_productos&idBorrar="+id;
		              }
		              else
		              {
		                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
		              }     
		          });
		        } 
		    </script>';
	} 

	#ESTA FUNCION ES LLAMADA DESDE EL ARCHIVO 	listado_categorias  PARA PODER VISULIZAR LAS DIFERENTES CATEGRIAS QUE HAY EN LA BASE DE DATOS EN FORMA DE LISTDO.

	public function vistaCategoriasController()
	{
		if (isset($_GET["ok"])) 
		{
			echo '<div class="alert alert-success background-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled text-white"></i>
                        </button>
                        <strong>Categoria registrada exitosamente</strong>
                    </div>';
		}
		#MUESTRA MENSAJE EN CASE DE QUE LA CATEGORIA HAYA SIDO EDITADA
		if (isset($_GET["categoria_editada"])) 
		{
			echo '<div class="alert alert-success background-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled text-white"></i>
                        </button>
                        <strong>Categoria actualizada exitosamente</strong>
                    </div>';
		}
		#PARA REALIZAR LA CONSULTA A LA BASE DE DATOS DE LA TABLA CATEGORIAS SE MANDA A LLAMAR LA FUNCION vistaCategoriasModel EL CUAL RECIBE COMO PARAMETRO EL NOMBRE DA LA TABLA QUE SE DESEA CONSULTAR EN ESTECASO SE DESEA CONSULTAR LA TABLA CATEGORIAS PARA MOSTRALE A USUARIO LAS DIFERENTES CATEGORIA QUE EXISTEN EN LA BASE DE DATOS EN FORMA DE LISTADO, EN LA BARIABLE $arrayRespuesta SE GUARDAN TODOS LOS REGISTROS, POSTERIORMENTE DICHO ARRAY SE RECORRE CON UN CICLO PARA IMPRIMIR LOS DATOS OBTENIDOS DE LA BASE DE DATOS ATRAVES DEL MODELO vistaCategoriasModel
			$arrayRespuesta = Datos::vistaCategoriasModel("categorias");
			foreach($arrayRespuesta as $row => $item)
			{
			#SE IMPRIME CADA UNO DE LOS CAMPOS DE LA TABLA PARA VISUALIZALOS EN FORMA DE LISTADO PARA PODER VISUALIZARLOS, TAMBIEN SE IMPRIME LOS BOTES DE EDITAR Y ELIMINAR PARA REALIZAR SUS RESPECTIVAS TAREAS
			echo'
					<tr>
						<td>'.$item["id_categoria"].'</td>
						<td>'.$item["nombre"].'</td>
						<td>'.$item["descripcion"].'</td>
						<td>'.$item["fecha_registrada"].'</td>
						<td> <a title="Editar" href="index.php?action=editar_categorias&id='.$item["id_categoria"].'"> 
						    <button class="btn hor-grd btn-grd-warning "><i class="fa fa-edit"></i> Editar</button>
						     </a> 
						</td>
						<td> <button title="Borrar" onClick="borrar('.$item["id_categoria"].');" class="btn hor-grd btn-grd-danger " title= "Eliminar Libro"> 
						<i class="fa fa-trash"></i> Eliminar </button></center> </td>
					</tr> ';
			}
			#PARA ELIMINAR UNA CATEGORIA ES NECESARIO INGRESAR LA CONTRASEÑA DEL USUARIO EN SESION
			echo '</tbody></table>';
			echo '<script type="text/javascript">
	        var password="'.$_SESSION["password"].'";
	        function borrar(id){
	          swal("Ingrese su contraseña:", {
	            content: "input",
		          })
		          .then((value) => 
		          {
		              if (value==password) 
		              {
		                swal("Contraseña correcta", "Categoria eliminada Exitosamente", "success");
		                window.location.href = "index.php?action=listado_categorias&idBorrar="+id;
		              }
		              else
		              {
		                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
		              }     
		          });
		        } 
		    </script>';
	} 

	#ESTA FUNCION ES LLAMADA DESDE EL ARCHIVO 	listado_categorias  PARA PODER VISULIZAR LAS DIFERENTES CATEGRIAS QUE HAY EN LA BASE DE DATOS EN FORMA DE LISTDO.

	public function vistaUsuariosController()
	{
		if (isset($_GET["ok"])) 
		{
			echo '<div class="alert alert-success background-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled text-white"></i>
                        </button>
                        <strong>Usuario registrado exitosamente</strong>
                    </div>';
		}
		if (isset($_GET["usuario_editado"])) 
		{
			echo '<div class="alert alert-success background-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled text-white"></i>
                        </button>
                        <strong>Usuario actualizado exitosamente</strong>
                    </div>';
		}
		#PARA REALIZAR LA CONSULTA A LA BASE DE DATOS DE LA TABLA CATEGORIAS SE MANDA A LLAMAR LA FUNCION vistaUsuariosModel EL CUAL RECIBE COMO PARAMETRO EL NOMBRE DA LA TABLA QUE SE DESEA CONSULTAR EN ESTECASO SE DESEA CONSULTAR LA TABLA USURIOS PARA MOSTRALE AL USUARIO LOS DIFERENTES USARIOS  QUE EXISTEN EN LA BASE DE DATOS EN FORMA DE LISTADO, EN LA BARIABLE $arrayRespuesta SE GUARDAN TODOS LOS REGISTROS, POSTERIORMENTE DICHO ARRAY SE RECORRE CON UN CICLO PARA IMPRIMIR LOS DATOS OBTENIDOS DE LA BASE DE DATOS ATRAVES DEL MODELO vistaUsuariosModel
			$arrayRespuesta = Datos::vistaUsuariosModel("usuarios");
			foreach($arrayRespuesta as $row => $item)
			{
			echo'
					<tr>
						<td>'.$item["id_usuario"].'</td>
						<td>'.$item["nombre"].'</td>
						<td>'.$item["apellido"].'</td>
						<td>'.$item["username"].'</td>
						<td>'.$item["email"].'</td>
						<td>'.$item["fecha_registro"].'</td>
						<td> <a title="Editar" href="index.php?action=editar_usuarios&id='.$item["id_usuario"].'"> 
						    <button class="btn hor-grd btn-grd-warning "><i class="fa fa-edit"></i> Editar</button>
						     </a> 
						</td>
						<td> <button title="Borrar" onClick="borrar('.$item["id_usuario"].');" class="btn hor-grd btn-grd-danger " title= "Eliminar Libro"> 
						<i class="fa fa-trash"></i> Eliminar </button></center> </td>
					</tr> ';
			}
			echo '</tbody></table>';
			echo '<script type="text/javascript">
	        var password="'.$_SESSION["password"].'";
	        function borrar(id){
	          swal("Ingrese su contraseña:", {
	            content: "input",
		          })
		          .then((value) => 
		          {
		              if (value==password) 
		              {
		                swal("Contraseña correcta", "Usuario eliminado Exitosamente", "success");
		                window.location.href = "index.php?action=listado_usuarios&idBorrar="+id;
		              }
		              else
		              {
		                swal("Contraseña Incorrecta", "Intente de nuevo", "error");
		              }     
		          });
		        } 
		    </script>';
	} 

	public function getCategoriasController()
	{
		$todasCarreras = Datos::getCategoriasModel("categorias");
		
		foreach($todasCarreras as $row => $item)
		{
		echo '
				<option value="'.$item["id_categoria"].'"> '.
					$item["nombre"].'
				</option> 
			';
		}
	}

	#ESTA FUNCION PERMITE REGISTRAR PRODUCTOS, ES MANDA LLAMAR DESDE EL ARCHIVO agregar_productos.php, LA FUCNCION OBTINE LOS DATOS APARTIR DE LOS INPUTS CREADOS EN EL ARCHIVO ANTES MENCIONADO PARA SER ALMACENADOS EN UN ARREGLO 
	#-------------------------------------
	public function agregarProductosController()
	{
		#VERIFICA SI EL USUARIO ACTIVO EL BOTON DE AGREGAR PARA GUARDAR LOS PARAMETROS EN A TRAVES DEL METODO POST EN UN ARRAY ($datosController).
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "codigo"=>$_POST["txtCodigo"],
									  "nombre"=>$_POST["txtNombre"],
									  "categoria"=>$_POST["select_categorias"],
									  "precio"=>$_POST["txtPrecio"],
									  "stock"=>$_POST["txtStock"]);

			#VERIFICA SI EL CODIGO QUE INGRESO NO SE REPITA, EN CASO DE QUE EL CODIGO ESTE REPETIDO SE LE INFORMARA AL USUARIO QUE EL CODIGO INGRESADO YA SE ENCUENTRA ALMACENADO EN LA BASE DE DATOS DE LO CONTRARIO PROCEDE A REALIZAR EL REGISTRO.
			$disponibilidad = Datos::ifDuplicadoProductoModel($_POST["txtCodigo"],"productos");
			if($disponibilidad["codigo"] != $_POST["txtCodigo"])
			{
				#PARA REALIZAR EL REGSTRO DEL PRODUCTO SE UTILIZA EL MODELO agregarProductosModel QUE TIENE COMO ENTRADA EL ARRAY (datosController) QUE ES DONDE SE ALMACENO LOS DATOS DEL NUEVO REGISTRO Y EL NOMBRE DE LA TABLA (productos).
				$respuesta = Datos::agregarProductosModel($datosController, "productos");
				# SI EL REGISTRO SE AGREGO CON EXITO  SE MESTRA UN MENSAJE AL USARIO QUE SE AGREGO, DE LO CONTRARIO SE MUESTRA EL MENSAJE DE ERRO DEL REGISTRO
				if($respuesta == "success")
				{ 	 
					echo '<script type="text/javascript">
							alert("Producto Agregado Exitosamente!");
						 </script>';

						 echo '<script type="text/javascript">
							window.location.href = "index.php?action=listado_productos&ok=1";
						</script>';	 
				}
				else
				{
					echo "Error";
				}
			}
			else
			{
				echo '<div class="alert alert-danger background-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled text-white"></i>
                        </button>
                        <strong>Producto repetido, ingresa un codigo diferente</strong>
                    </div>';
			}
		}
	}
	#ESTA FUNCION PERMITE REGISTRAR NUEVAS CATEGORIAS, SE MANDA LLAMAR DESDE EL ARCHIVO agregar_categorias.php, LA FUCNCION OBTINE LOS DATOS APARTIR DE LOS INPUTS CREADOS EN EL ARCHIVO ANTES MENCIONADO PARA SER ALMACENADOS EN UN ARREGLO 

	public function agregarCategoriasController()
	{
		#VERIFICA SI EL USUARIO ACTIVO EL BOTON DE AGREGAR PARA GUARDAR LOS PARAMETROS EN A TRAVES DEL METODO POST EN UN ARRAY ($datosController).
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"],
									  "descripcion"=>$_POST["txtDescripcion"],
									  "fecha_registrada"=>date('Y/m-d'));
			#VERIFICA SI EL NOMBRE DE LA CATEGORIA QUE INGRESO NO SE REPITA, EN CASO DE QUE EL NOMBRE SE REPITA SE LE INFORMARA AL USUARIO QUE EL NOMBRE INGRESADO YA SE ENCUENTRA ALMACENADO EN LA BASE DE DATOS DE LO CONTRARIO PROCEDE A REALIZAR EL REGISTRO.

			$disponibilidad = Datos::ifDuplicadoCategoriaModel($_POST["txtNombre"],"categorias");
			if($disponibilidad["nombre"] != $_POST["txtNombre"])
			{
				#PARA REALIZAR EL REGSTRO DE LA CATEGORIA SE UTILIZA EL MODELO agregarCategoriasModel QUE TIENE COMO ENTRADA EL ARRAY (datosController) QUE ES DONDE SE ALMACENO LOS DATOS DEL NUEVO REGISTRO Y EL NOMBRE DE LA TABLA (categorias), PARA ALMACENARLOS EN LA VARIABLE respuesta QUE ES LA QUE SE UTILIZA PARA MAOTRAR LOS MENSAJES EN CASO DE QUE SE AGREGO CON EXTIO, FALLE EL REGISTRO O SI YA ESTA REGISTRADO EL NOMBRE DE LACATEGORIA.
				$respuesta = Datos::agregarCategoriasModel($datosController, "categorias");
				if($respuesta == "success")
				{
					 
					echo '<script type="text/javascript">
							alert("Categoria Agregada Exitosamente!");
						 </script>';

						 echo '<script type="text/javascript">
							window.location.href = "index.php?action=listado_categorias&ok=1";
						</script>';	

				}
				else
				{
					echo "Error al agregar categoria";
				}
			}
			else
			{
				echo '<div class="alert alert-danger background-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled text-white"></i>
                        </button>
                        <strong>Categoria repetida, ingresa un nombre diferente</strong>
                    </div>';
			}
		}
	}

	#ESTA FUNCION PERMITE REGISTRAR NUEVOS USUARIOS, SE MANDA LLAMAR DESDE EL ARCHIVO agregar_usuarios.php, LA FUCNCION OBTINE LOS DATOS APARTIR DE LOS INPUTS CREADOS EN EL ARCHIVO ANTES MENCIONADO PARA SER ALMACENADOS EN UN ARREGLO 


	public function agregarUsuariosController()
	{
		#VERIFICA SI EL USUARIO ACTIVO EL BOTON DE AGREGAR PARA GUARDAR LOS PARAMETROS EN A TRAVES DEL METODO POST EN UN ARRAY ($datosController).
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"],
									  "apellido"=>$_POST["txtApellido"],
									  "username"=>$_POST["txtUsername"],
									  "email"=>$_POST["txtEmail"],
									  "password"=>$_POST["txtPassword"],
									  "fecha_registro"=>date('Y/m-d'));
			#VERIFICA SI EL NOMBRE DEL USUARIO  QUE INGRESO NO SE REPITA, EN CASO DE QUE EL USUARIO (USERNAME) SE REPITA SE LE INFORMARA AL USUARIO QUE INTENTAN AGREGAR UN NUEVO USUARIO QUE EL NOMBRE INGRESADO YA SE ENCUENTRA ALMACENADO EN LA BASE DE DATOS DE LO CONTRARIO PROCEDE A REALIZAR EL REGISTRO.

			$disponibilidad = Datos::ifDuplicadoModel($_POST["txtUsername"],"usuarios");
			if($disponibilidad["username"] != $_POST["txtUsername"])
			{
				#PARA REALIZAR EL REGSTRO DEL USUARIO SE UTILIZA EL MODELO agregarUsuariosModel QUE TIENE COMO ENTRADA EL ARRAY (datosController) QUE ES DONDE SE ALMACENO LOS DATOS DEL NUEVO REGISTRO Y EL NOMBRE DE LA TABLA (usuarios), PARA ALMACENARLOS EN LA VARIABLE respuesta QUE ES LA QUE SE UTILIZA PARA MOSTRAR LOS MENSAJES EN CASO DE QUE SE AGREGO CON EXTIO, FALLE EL REGISTRO O SI YA ESTA REGISTRADO EL NOMBRE DE USUARIO.
				$respuesta = Datos::agregarUsuariosModel($datosController, "usuarios");
				if($respuesta == "success")
				{
					echo '<script type="text/javascript">
							alert("Usuario Agregado Exitosamente!");
						 </script>';

						 echo '<script type="text/javascript">
							window.location.href = "index.php?action=listado_usuarios&ok=1";
						</script>';	
				}
				else
				{
					echo "Error en la agregacion de usuario";
				}
			}
			else
			{
				echo '<div class="alert alert-danger background-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled text-white"></i>
                        </button>
                        <strong>Usuario repetido, ingresa un nombre de usuario diferente</strong>
                    </div>';
			}
		}
	}
	#ESTA FUNCION PERMITE MODIFICAR EL STOCK DE UN PRODUCTO SELECCIONADO, YA SEA SI EL USUARIO QUIERE DISMINUIR LA CANTIDAD QUE SE ENCUENTRA REGISTRADO EN EL ISNTANTE

	public function aumentar_disminuirStockController()
	{
		#BERIFICA SI EL USURIO PRESIONO EL BOTON DE AUMENTAR O DISMINUIR
		if(isset($_POST["btnAumentar"]))
		{
			$datosController = array( "stock"=>$_POST["txtStock"]);
			$respuesta = Datos::aumentarStockModel($datosController,$_GET["id"]);
			if($respuesta == "success")
			{
				$historial = Datos::registrarHistorialModel($_GET["id"],$_SESSION["username"],$_POST["txtReferencia"],$_POST["txtNota"],"AUMENTO",date("Y/m-d"));

				echo '<script type="text/javascript">
						alert("Stock Aumentado Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=listado_productos&aumentado=1";
					</script>';	
			}
			else
			{
				echo "Error en el aumento de stock";
			}
		}
		else if(isset($_POST["btnDisminuir"]))
		{
			$datosController = array( "stock"=>$_POST["txtStock"]);
			$respuesta = Datos::disminuirStockModel($datosController,$_GET["id"]);
			if($respuesta == "success")
			{
				$historial = Datos::registrarHistorialModel($_GET["id"],$_SESSION["username"],$_POST["txtReferencia"],$_POST["txtNota"],"DISMINUCION",date("Y/m-d"));

				echo '<script type="text/javascript">
						alert("Stock Disminuido Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=listado_productos&disminuido=1";
					</script>';	
			}
			else
			{
				echo '<div class="alert alert-danger background-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled text-white"></i>
                        </button>
                        <strong>'.$respuesta.'</strong>
                    </div>';
			}

		}
	}

	#ESTA FUNCION PERMITE VISUALIZAR LOS CAMBIOS QUE SE HAN HECHO AL PRODUCTO, YA SEA SI SE AUMNTO O DISMINUYO EL STOCK DEL PRODUCTO SELECCIONADO 
	public function vistaHistorialController()
	{
			$arrayRespuesta = Datos::vistaHistorialModel("historial",$_GET["id"]);
			foreach($arrayRespuesta as $row => $item)
			{
				$nomProd = Datos::getNombreProductosByIdModel("productos",$item["id_producto"]);
			echo'
					<tr>
						<td>'.$item["id_historial"].'</td>
						<td>'.$nomProd["nombre"].'</td>
						<td>'.$item["usuario"].'</td>
						<td>'.$item["referencia"].'</td>
						<td>'.$item["nota"].'</td>
						<td>'.$item["fecha"].'</td>
						<td>'.$item["tipo"].'</td>
					</tr> ';
			}
			echo '</tbody></table>';
	} 

	#eSTA FUNCION REALIZA CAMBIOS EN EN LOS CAMPOS DEL PRODUCTO, PUDE ACTUALIZAR CADA UNO DE ELLOS SI ES NECESARIO
	public function actualizarProductosController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "codigo"=>$_POST["txtCodigo"],
									  "nombre"=>$_POST["txtNombre"],
									  "categoria"=>$_POST["select_categorias"],
									  "precio"=>$_POST["txtPrecio"],
									  "stock"=>$_POST["txtStock"],
									  "id_producto"=>$_GET["id"]);
			#PARA REALIZAR LOS CAMBIOS DE LOS CAMPOS DE LOS PRODUCTOS SE UTILIZA EL MODELO actualizarProductosModel QUE RECIBE COMO ENTRADA EN ARRAY DONDE SE ALMACENO LA INFORMACION DE LOS INPUT DEL ARCHIVO EDITAR USUARIO Y EL NOMBRE DE LA TABLA (productos)

			$respuesta = Datos::actualizarProductosModel($datosController, "productos");
			#muestra mensaje de error o que la actualizacion fue exitosa
			if($respuesta == "success")
			{

				 
				echo '<script type="text/javascript">
						alert("Producto Actualizado Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=listado_productos&producto_editado=1";
					</script>';	
			}
			else
			{
				echo "Error";
			}
		}
	}
	#ACTUALIZA CATEGORIAS
	public function actualizarCategoriasController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"],
									  "descripcion"=>$_POST["txtDescripcion"],
									  "fecha_registrada"=>$_POST["txtFecha"],
									  "id_categoria"=>$_GET["id"]);

			$respuesta = Datos::actualizarCategoriasModel($datosController, "categorias");
			if($respuesta == "success")
			{
				 
				echo '<script type="text/javascript">
						alert("Categoria Actualizada Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=listado_categorias&categoria_editada=1";
					</script>';	
			}
			else
			{
				echo "Error";
			}
		}
	}
	#ESTA FUNCION PERMITE EDITAR LOS CAMPOS DE LA TABLA USUARIOS
	public function actualizarUsuariosController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "nombre"=>$_POST["txtNombre"],
									  "apellido"=>$_POST["txtApellido"],
									  "username"=>$_POST["txtUsername"],
									  "email"=>$_POST["txtEmail"],
									  "password"=>$_POST["txtPassword"],
									  "fecha_registro"=>$_POST["txtFecha"],
									  "id_usuario"=>$_GET["id"]);

			$respuesta = Datos::actualizarUsuariosModel($datosController, "usuarios");
			if($respuesta == "success")
			{
				 
				echo '<script type="text/javascript">
						alert("Usuario Actualizado Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=listado_usuarios&usuario_editado=1";
					</script>';	
			}
			else
			{
				echo "Error";
			}
		}
	}

	public function registroUsuariosController()
	{
		if(isset($_POST["btnRegistrarse"]))
		{
			$datosController = array("nombre"=>$_POST['txtNombre'],
									"username"=>$_POST['txtUsername'],
								    "password"=>$_POST['txtPassword']);

			$ifDuplicado = Datos::ifDuplicadoModel($datosController, "usuarios");
			if($ifDuplicado["username"]!=$_POST["txtUsername"])
			{
				$respuesta = Datos::registroUsuariosModel($datosController, "usuarios");
				if($respuesta == "success")
				{
					echo '<script type="text/javascript">
							alert("Usuario Agregado Exitosamente!");
						 </script>';

						 echo '<script type="text/javascript">
							window.location.href = "index.php";
						</script>';	

				}
				else
				{
					echo "Error en registro de usuario";
				}
			}
			else
			{
				echo '<script type="text/javascript">
							alert("Este nombre de usuario ya existe!");
						 </script>';
			}
			
		}
	}


	#REALIZA LA CONSULTA A LA BASE DE DATOS PARA SABER QUE USRIO DESEA ENTRAR AL SISTEMA.

	public function ingresoUsuarioController()
	{
		#VERIFICA SI SE ACTIVO EL BOTON DEINGRESAR ATRAVES DEL METODO POST
		if(isset($_POST['btnIngresar']))
		{	#EL ARRAY $datosController ALMACENA LA INFORMACION QUE ES OBTENIDA ATRAVES DE LOS INPUTS DE ARCHIVO(ingresar.php)
			$datosController = array("username"=>$_POST['txtUsername'],
									"password"=>$_POST['txtPassword']);
			#PARA REALIZAR LA CONSULTA A LA BASE DE DATOS SE UTILIZA EL MODELO ingresoUsuarioModel Y CORROBORAR QUE USIARIO ESTA HACIENDO LA PETICION PARA INICIAR SESION AL SISTEMA
			$respuesta = Datos::ingresoUsuarioModel($datosController,"usuarios");
			if($respuesta["username"] == $_POST["txtUsername"] && $respuesta["password"] == $_POST["txtPassword"])
			{
				session_start();
				$_SESSION["id"] = $respuesta["id_usuario"];
				$_SESSION["nombre"] = $respuesta["nombre"];
				$_SESSION["apellido"] = $respuesta["apellido"];
				$_SESSION["username"] = $respuesta["username"];
				$_SESSION["email"] = $respuesta["email"];
				$_SESSION["password"] = $respuesta["password"];
				$_SESSION["fecha_registro"] = $respuesta["fecha_registro"];
				$_SESSION["foto"] = $respuesta["foto"];

				echo "<script>
						window.location='index.php?action=dashboard'
					</script>";
			}
			else
				#EN CASO QUE NO SE ENCUENTRE EL USUARIO SE REDIRECCIONA A LA MISMA LOCACION (INGRESAR)
			{
				echo "<script>
						window.location='index.php'
					</script>";
			}
		}
	}
	#EN CASO DE QUE SE QUIERA EDITAR CUALQUIER REGISTRO SE UTILIZAN LA SIGUIENTES FUNCIONES DEPENDIENDO DE LO QUE SE QUIERA AZTUALIZAR PARA OBTNER EL ID QUE SE DEA ACTUALIZAR , Y GURDARLO EN UNA VARIABLE PARA POSTERIORMENRE UTILIZARLO EN EL MODELO DE EDITAT
	public function editarProductosController()
	{
		if(isset($_GET["id"]))
		{
			$id = $_GET["id"];
			$respuesta = Datos::editarProductosModel($id,"productos");
			return $respuesta;
		}
	}

	public function editarCategoriasController()
	{
		if(isset($_GET["id"]))
		{
			$id = $_GET["id"];
			$respuesta = Datos::editarCategoriasModel($id,"categorias");
			return $respuesta;
		}
	}

	public function editarUsuariosController()
	{
		if(isset($_GET["id"]))
		{
			$id = $_GET["id"];
			$respuesta = Datos::editarUsuariosModel($id,"usuarios");
			return $respuesta;
		}
	}
	#MUESTRA LOS DETALLES DEL PRODUCTO A PARTIR DE SU ID
	public function getDetallesProductosController()
	{
		if(isset($_GET["id"]))
		{
			$id = $_GET["id"];
			$respuesta = Datos::getDetallesProductosModel($id,"productos");
			return $respuesta;
		}
	}

	public function actualizarLibrosController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array( "titulo"=>$_POST["txtTitulo"],
									  "autor"=>$_POST["txtAutor"],
									  "descripcion"=>$_POST["txtDescripcion"],
									  "id_usuario"=>$_SESSION["id_usuario"],
									  "id_libro"=>$_GET["id"]);

			$respuesta = Datos::actualizarLibrosModel($datosController, "libros");
			if($respuesta == "success")
			{
				 
				echo '<script type="text/javascript">
						alert("Libro Actualizado Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=libros";
					</script>';	

			}
			else
			{
				echo "Error";
			}
		}
	}

	public function actualizarPerfilController()
	{
		if(isset($_POST["btnEnviar"]))
		{
			$datosController = array("nombre"=>$_POST['txtNombre'],
									"username"=>$_POST['txtUsername'],
								    "password"=>$_POST['txtPassword'],
								    "id_usuario"=>$_SESSION["id"]);
			$respuesta = Datos::actualizarPerfilModel($datosController, "usuarios");
			if($respuesta == "success")
			{
				$datosActualizadosUsuario = Datos::getDatosUsuarioModel();
	 			$_SESSION["id"] = $datosActualizadosUsuario["id_usuario"];
				$_SESSION["nombre"] = $datosActualizadosUsuario["nombre"];
				$_SESSION["username"] = $datosActualizadosUsuario["username"];
				$_SESSION["password"] = $datosActualizadosUsuario["password"];
				$_SESSION["id_usuario"] = $datosActualizadosUsuario["id_usuario"];
				
				echo '<script type="text/javascript">
						alert("Perfil Actualizado Exitosamente!");
					 </script>';

					 echo '<script type="text/javascript">
						window.location.href = "index.php?action=perfil";
					</script>';	
			}
			else
			{
				echo "Error";
			}
		}
	}

	#EN LA FUNCIONES DE BORRAR (PRODUCTOS, CAEGORIAS Y USUARIOS) SE OBTINE EL ID DEL REGISTRO QUE SE DESEA ELIMINAR
	#------------------------------------
	public function borrarProductosController()
	{
		if(isset($_GET["idBorrar"]))
		{
			$respuesta = Datos::borrarProductosModel($_GET["idBorrar"],"productos");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=listado_productos'
					</script>";
			}
			else
			{
				echo "error";
			}
		}
	} 

	public function borrarCategoriasController()
	{
		if(isset($_GET["idBorrar"]))
		{
			$respuesta = Datos::borrarCategoriasModel($_GET["idBorrar"],"categorias");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=listado_categorias'
					</script>";
			}
			else
			{
				echo "error";
			}
		}
	} 

	public function borrarUsuariosController()
	{
		if(isset($_GET["idBorrar"]))
		{
			$respuesta = Datos::borrarUsuariosModel($_GET["idBorrar"],"usuarios");
			if($respuesta == "success")
			{
				echo "<script>
						window.location='index.php?action=listado_usuarios'
					</script>";
			}
			else
			{
				echo "error";
			}
		}
	} 



	


}
?>