<?php
//llamar al archivo conexion a la base de datos para conectarla y poder operarla con las funciones de esta clase
require_once "conexion.php";

//Clase Datos que extiende del archivo conexion para poder usar la base de datos y realizar los CRUDs necesarios en ella
class Datos extends Conexion
{

	#Vista que permite traer todos los prodctos de la base de datos en un array asociativo
	#-------------------------------------
	public static function vistaProductosModel($tabla)
	{ 
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla"); 
		//Si la ejecucion de la consulta es exitosa se aocia el array conlos resultados
		if($stmt->execute())
		{
			return $stmt->fetchAll();
		}
		//Cerrar la conexion al final
		$stmt->close(); 
	}

	//Funcion que permite traer la cantidad de productos en la base dd datos para mostrarlo en el dashboard
	public static function getCantidadProductosModel($tabla)
	{ 
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) as cantidad FROM $tabla"); 
		//Si la ejecucion de la consulta es exitosa se aocia el array con la cantidad de productos de la base de datos
		if($stmt->execute())
		{
			return $stmt->fetch();
		}
		$stmt->close(); 
	}

	public static function getCantidadCategoriasModel($tabla)
	{ 
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) as cantidad FROM $tabla"); 
		//Si la ejecucion de la consulta es exitosa se aocia el array conlos resultados es decir la cantidad de categorias
		if($stmt->execute())
		{
			return $stmt->fetch();
		}
		$stmt->close(); 
	}

	public static function getCantidadUsuariosModel($tabla)
	{ 
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) as cantidad FROM $tabla"); 
		//Si la ejecucion de la consulta es exitosa se aocia el array conlos resultados, la cantidad de usuarios en la bd
		if($stmt->execute())
		{
			return $stmt->fetch();
		}
		$stmt->close(); 
	}


	public static function vistaCategoriasModel($tabla)
	{ 
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla"); 
		//Si la ejecucion de la consulta es exitosa se aocia el array conlos resultados para mostrar todas las categorias
		if($stmt->execute())
		{
			return $stmt->fetchAll();
		}
		$stmt->close(); 
	}

	public static function vistaUsuariosModel($tabla)
	{ 
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla"); 
		//Si la ejecucion de la consulta es exitosa se aocia el array conlos resultados para mostrar todos los usuarios
		if($stmt->execute())
		{
			return $stmt->fetchAll();
		}
		$stmt->close(); 
	}

	public static function getCategoriasModel($tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		//Ejecutar la sentencia la consulta para traer todos los datos de dicha tabla
		$stmt->execute();
		//Asciar un array con todos los registros de categorias y devolverla a l controller
		return $stmt->fetchAll();
		//Cerrar la conexion al final
		$stmt->close();
	}

	public static function getCantidadLibrosModel($tabla,$idUsuario)
	{ 
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) as cantidad FROM $tabla WHERE id_usuario = :id_usuario"); 
		//Definir parametros mediante bindParam idicando cual sera el id de usuario de tipo entero
		$stmt->bindParam(":id_usuario", $idUsuario, PDO::PARAM_INT);
		//Si la ejecucion de la consulta es exitosa se aocia el array conlos resultados osa la cantidad  
		if($stmt->execute())
		{
			return $stmt->fetch();
		}
		//Cerrar la conexion al final
		$stmt->close(); 
	}

	public static function getCategoriaByIdModel($tabla,$id)
	{ 
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_categoria = :id_categoria"); 
		//Definir el parametro id categoria tipo entero que llega como parametro a la funcion
		$stmt->bindParam(":id_categoria", $id, PDO::PARAM_INT);
		//Si la ejecucion de la consulta es exitosa se aocia el array conlos resultados,m es decir el registro de dicha categoria
		if($stmt->execute())
		{
			return $stmt->fetch();
		}
		//Cerrar la conexion al final
		$stmt->close(); 
	}

	public static function agregarProductosModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (codigo,nombre,categoria,precio,stock,foto) VALUES (:codigo, :nombre, :categoria, :precio, :stock, :foto)");	
		//Definicion de paametros para la consulta que vienen como array asociativo llegan a la funcion con nombre ""datosModel""
		$stmt->bindParam(":codigo", $datosModel["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":categoria", $datosModel["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datosModel["precio"]);
		$stmt->bindParam(":stock", $datosModel["stock"], PDO::PARAM_INT);
		$stmt->bindParam(":foto", $datosModel["foto"], PDO::PARAM_STR);
		//Si la ejecucion es exitosa se deevuelve un mensajende exito
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario se devuelve un mensaje de error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}

	public static function agregarCategoriasModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,descripcion,fecha_registrada) VALUES (:nombre, :descripcion, :fecha_registrada)");	
		//Definicion de parametros para el QUERY
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_registrada", $datosModel["fecha_registrada"]);
		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//si no se de vuelvemensaje de error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}

	public static function agregarUsuariosModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,apellido,username,email,password,fecha_registro) VALUES (:nombre, :apellido, :username, :email, :password, :fecha_registro)");	
		//Definicion de parametros para la isnercion a la base de datos
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_registro", $datosModel["fecha_registro"]);
		//Si la ejecucion de la consulta es exitosa se devuelve un mensaje de exito
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario se devuelve mensaje de error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}

	public static function actualizarProductosModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET codigo=:codigo, nombre=:nombre, categoria=:categoria, precio=:precio, stock=:stock, foto=:foto WHERE id_producto=:id_producto");	
		//Definicion de parametros para la actualizacion en la base de datos tabla productos
		$stmt->bindParam(":codigo", $datosModel["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":categoria", $datosModel["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datosModel["precio"]);
		$stmt->bindParam(":stock", $datosModel["stock"], PDO::PARAM_INT);
		$stmt->bindParam(":foto", $datosModel["foto"], PDO::PARAM_STR);
		$stmt->bindParam(":id_producto", $datosModel["id_producto"], PDO::PARAM_INT);
		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrarion se devuelve mensaje de error
			return "error";
		}
		//Cerrar la coneion al final
		$stmt->close();
	}

	public static function actualizarCategoriasModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, descripcion=:descripcion, fecha_registrada=:fecha_registrada WHERE id_categoria=:id_categoria");	
		//Definicion de parametros para la actualizacion en la base de datos tabla categorias
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_registrada", $datosModel["fecha_registrada"]);
		$stmt->bindParam(":id_categoria", $datosModel["id_categoria"], PDO::PARAM_INT);
		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito al controller
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario se devuelve mensaje nde error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}

	public static function actualizarUsuariosModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, apellido=:apellido, username=:username, email=:email, password=:password, fecha_registro=:fecha_registro WHERE id_usuario=:id_usuario");	
		//DEfinicion de para metros para la actualizacion ala base de datos tabla usuarios
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_registro", $datosModel["fecha_registro"]);
		$stmt->bindParam(":id_usuario", $datosModel["id_usuario"], PDO::PARAM_INT);
		//Si la ejecucion de la consulta es exitosa se devuelve mensaje de exito
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario se devuelve mensajed e error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	}

	public static function registroUsuariosModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,username,password) VALUES (:nombre, :username, :password)");	
		//Definicion de para metros para la insercion aen la base de datos tabla usuarios
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		//Si la ejecucion de la consulta es exitosa se devuelve mensajede exito al controller
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario se devuelve mensaje de error
			return "error";
		}
		//Cerrar la conexion al final
		$stmt->close();
	} 

	#LOGIN USUARIOS
	#-------------------------------------
	public static function ingresoUsuarioModel($datosModel, $table)
	{
		//preparar la consulta conectando a la base de datos
		$statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE username = :username and password = :password");	
		//Definicion de parametros para la consulta en la tabla suarios
		$statement->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$statement->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		//Ejecutar la sentencia
		$statement->execute();
		//Asociar los resultados y retornarlos a l controller
		return $statement->fetch();
		//Cerrar la conexion al final
		$statement->close();
	}

	public static function ifDuplicadoModel($datosModel, $table)
	{
		//preparar la consulta conectando a la base de datos
		$statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE username = :username");	
		//DEfinicion de para metro para la consulta en la tabla usuarios
		$statement->bindParam(":username", $datosModel, PDO::PARAM_STR);
		//Ejecutar la sentencia
		$statement->execute();
		//Asociar resiultados y eevolver el arraty al controller
		return $statement->fetch();
		//Cerrar conexion al final
		$statement->close();
	}

	public static function ifDuplicadoCategoriaModel($datosModel, $table)
	{
		//preparar la consulta conectando a la base de datos
		$statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE nombre = :nombre");	
		//DEfinicion de parametro para la consujlta en la tabla categorias
		$statement->bindParam(":nombre", $datosModel, PDO::PARAM_STR);
		//Ehjecutar la sentencia
		$statement->execute();
		//DEvolver los resultadoe n array
		return $statement->fetch();
		//Cerrar la conexion
		$statement->close();
	}

	public static function ifDuplicadoProductoModel($datosModel, $table)
	{
		//preparar la consulta conectando a la base de datos
		$statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE codigo = :codigo");	
		//Definicion de parametros a la consulta
		$statement->bindParam(":codigo", $datosModel, PDO::PARAM_STR);
		//Ejecutar sentencia
		$statement->execute();
		//Asociar resultados y devolverlos al controller
		return $statement->fetch();
		//Cerrar conexional final
		$statement->close();
	}
	
 	public static function editarProductosModel($id,$tabla)
 	{
 		//preparar la consulta conectando a la base de datos
 		$stm = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_producto = :id_producto");
 		//Definicion de parametros a la consulta
 		$stm->bindParam(":id_producto", $id, PDO::PARAM_INT);
 		//Ejecutar sentencia
 		$stm->execute();
 		//Asociar resultados y devolverlos al controller
 		return $stm->fetch();
 		//Cerrar conexional final
 		$stm->close();
 	}

 	public static function editarCategoriasModel($id,$tabla)
 	{
 		//preparar la consulta conectando a la base de datos
 		$stm = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_categoria = :id_categoria");
 		//Definicion de parametros a la consulta
 		$stm->bindParam(":id_categoria", $id, PDO::PARAM_INT);
 		//Ejecutar sentencia
 		$stm->execute();
 		//Asociar resultados y devolverlos al controller
 		return $stm->fetch();
 		//Cerrar conexional final
 		$stm->close();
 	}

 	public static function editarUsuariosModel($id,$tabla)
 	{
 		//preparar la consulta conectando a la base de datos
 		$stm = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_usuario = :id_usuario");
 		//Definicion de parametros a la consulta
 		$stm->bindParam(":id_usuario", $id, PDO::PARAM_INT);
 		//Ejecutar sentencia
 		$stm->execute();
 		//Asociar resultados y devolverlos al controller
 		return $stm->fetch();
 		//Cerrar conexional final
 		$stm->close();
 	}

 	public static function getDetallesProductosModel($id,$tabla)
 	{
 		//preparar la consulta conectando a la base de datos
 		$stm = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_producto = :id_producto");
 		//Definicion de parametros a la consulta
 		$stm->bindParam(":id_producto", $id, PDO::PARAM_INT);
 		//Ejecutar sentencia
 		$stm->execute();
 		//Asociar resultados y devolverlos al controller
 		return $stm->fetch();
 		//Cerrar conexional final
 		$stm->close();
 	}

	public static function getDatosUsuarioModel()
	{
		//preparar la consulta conectando a la base de datos
		$stm = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE id_usuario = :id_usuario");
		//Definicion de parametros a la consulta
 		$stm->bindParam(":id_usuario", $_SESSION["id"], PDO::PARAM_INT);
 		//Ejecutar sentencia
 		$stm->execute();
 		//Asociar resultados y devolverlos al controller
 		return $stm->fetch();
 		//Cerrar conexional final
 		$stm->close();
	} 	

	public static function disminuirStockModel($datosModel,$idProducto)
	{
		//preparar la consulta conectando a la base de datos
		$stm = Conexion::conectar()->prepare("SELECT stock FROM productos WHERE id_producto = :id_producto");
		//Definicion de parametros a la consulta
 		$stm->bindParam(":id_producto", $idProducto, PDO::PARAM_INT);
 		//Ejecutar sentencia
 		$stm->execute();
 		//ASociar resultado de la consulta
 		$res = $stm->fetch();
 		
 		//Validar si la cantidad de stock es mayor igual a la que el usuario quiere disminuir
 		if($datosModel["stock"]<=$res["stock"])
 		{
 			//Si se cumple la condicion entonces se resta la cantidad al stock
 			$cantidad = $res["stock"]-$datosModel["stock"];
 			//Se prepara la consulta para ctualizar los datos al producto
 			$stm2 = Conexion::conectar()->prepare("UPDATE productos SET stock=:stock WHERE id_producto = :id_producto");
 			//Se definen parametros para la actualizacion d la sentencia
	 		$stm2->bindParam(":stock", $cantidad, PDO::PARAM_INT);
	 		$stm2->bindParam(":id_producto", $idProducto, PDO::PARAM_INT);
	 		//Si s ejecuta sdevuelve mensaje de exito
	 		if($stm2->execute())
	 		{
	 			return "success";
	 		}
	 		else
	 		{
	 			//De lo contrario devuelve mensaje de error en sdisminucion
	 			return "error en la disminucion de stock";
	 		}
	 		//Cerrar conexion de esta conexion
	 		$stm2->close();
 		}
 		else
 		{
 			//Si la condicion no se cunmple devuelve mensajde de error ke no puede disminuir la cantidad
 			return "No puedes disminuir mas de lo que existe en el stock";
 		}

 		//Cerrar conexion
 		$stm->close();
	} 

	public static function registrarHistorialModel($id_producto,$usuario,$referencia,$nota,$tipo,$fecha)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("INSERT INTO historial (id_producto,usuario,referencia,nota,fecha,tipo) VALUES (:id_producto, :usuario, :referencia, :nota, :fecha, :tipo)");	
		//Definicion de parametros a la consulta
		$stmt->bindParam(":id_producto", $id_producto, PDO::PARAM_INT);
		$stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
		$stmt->bindParam(":referencia", $referencia, PDO::PARAM_STR);
		$stmt->bindParam(":nota", $nota, PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $fecha);
		$stmt->bindParam(":tipo", $tipo, PDO::PARAM_STR);
		//Si la ejecucion de la consulta es exitosa se devuelve mensajede exito al controller
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario se devuelve mensajed e error
			return "error";
		}
		$stmt->close();
	} 

	public static function vistaHistorialModel($tabla,$id)
	{ 
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_producto=:id_producto");
		//Definicion de parametros a la consulta
		$stmt->bindParam(":id_producto", $id, PDO::PARAM_INT); 
		//Si la ejecucion de la consulta es exitosa se asocian los resultados devuelven al controller
		if($stmt->execute())
		{
			return $stmt->fetchAll();
		}
		//Cerrar conexion al final
		$stmt->close(); 
	}

	public static function getNombreProductosByIdModel($tabla,$id)
	{
		//preparar la consulta conectando a la base de datos
		$stm = Conexion::conectar()->prepare("SELECT * FROM productos WHERE id_producto = :id_producto");
		//Definicion de parametros a la consulta
 		$stm->bindParam(":id_producto", $id, PDO::PARAM_INT);
 		//Ejecutar la sentencia
 		$stm->execute();
 		//Asociar los resultados y retornarlos al controller
 		return $stm->fetch();
 		//Cerrar conexion al final
 		$stm->close();
	} 

	public static function aumentarStockModel($datosModel,$idProducto)
	{
		//preparar la consulta conectando a la base de datos
		$stm = Conexion::conectar()->prepare("SELECT stock FROM productos WHERE id_producto = :id_producto");
		//Definicion de parametros a la consulta
 		$stm->bindParam(":id_producto", $idProducto, PDO::PARAM_INT);
 		$stm->execute();
 		$res = $stm->fetch();
 		
 		$cantidad = $res["stock"]+$datosModel["stock"];

 		$stm2 = Conexion::conectar()->prepare("UPDATE productos SET stock=:stock WHERE id_producto = :id_producto");
 		$stm2->bindParam(":stock", $cantidad, PDO::PARAM_INT);
 		$stm2->bindParam(":id_producto", $idProducto, PDO::PARAM_INT);
 		//Ejecutar la sentencia si es ecxitosa devulve mensajede exito
 		if($stm2->execute())
 		{
 			return "success";
 		}
 		//CErrar conexiones al final
 		$stm2->close();
 		$stm->close();
	} 	

	public static function getNombreCategoriaByIdModel($tabla,$idCate)
	{
		//preparar la consulta conectando a la base de datos
		$stm = Conexion::conectar()->prepare("SELECT * FROM categorias WHERE id_categoria = :id_categoria");
		//Definicion de parametros a la consulta
 		$stm->bindParam(":id_categoria", $idCate, PDO::PARAM_INT);
 		//Ejecutar la sentencia
 		$stm->execute();
 		//Retornar los resultados asociados
 		return $stm->fetch();
 		//Cerrar conexion al final
 		$stm->close();
	} 	

	public static function actualizarLibrosModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, autor = :autor, descripcion = :descripcion, id_usuario = :id_usuario WHERE id_libro = :id_libro");	
		//Definicion de parametros a la consulta
		$stmt->bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":autor", $datosModel["autor"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datosModel["id_usuario"], PDO::PARAM_INT);
		$stmt->bindParam(":id_libro", $datosModel["id_libro"], PDO::PARAM_INT);
		//Si la ejecucion es exitosa devuelve mensaje de exito
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario devuelve mensaje de error
			return "error";
		}
		//Cerrar conexion al final
		$stmt->close();
	}

	public static function actualizarPerfilModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, username = :username, password = :password WHERE id_usuario = :id_usuario");	
		//Definicion de parametros a la consulta
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datosModel["id_usuario"], PDO::PARAM_INT);
		//Si la ejecucion es exitosa devuelve mensaje de exito
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario devuelve mensaje de error
			return "error";
		}
		//Cerrar conexion al final
		$stmt->close();
	}

	public static function borrarProductosModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_producto = :id_producto");	
		//Definicion de parametros a la consulta
		$stmt->bindParam(":id_producto", $datosModel, PDO::PARAM_INT);
		//Si la ejecucion es exitosa devuelve mensaje de exito
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario devuelve mensaje de error
			return "error";
		}
		//Cerrar conexion al final
		$stmt->close();
	}

	public static function borrarCategoriasModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_categoria = :id_categoria");	
		//Definicion de parametros a la consulta
		$stmt->bindParam(":id_categoria", $datosModel, PDO::PARAM_INT);
		//Si la ejecucion es exitosa devuelve mensaje de exito
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario devuelve mensaje de error
			return "error";
		}
		//Cerrar conexion al final
		$stmt->close();
	}

	public static function borrarProdsCateModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE categoria = :categoria");	
		//Definicion de parametros a la consulta
		$stmt->bindParam(":categoria", $datosModel, PDO::PARAM_INT);
		//Si la ejecucion es exitosa devuelve mensaje de exito
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario devuelve mensaje de error
			return "error";
		}
		//Cerrar conexion al final
		$stmt->close();
	}

	public static function borrarUsuariosModel($datosModel, $tabla)
	{
		//preparar la consulta conectando a la base de datos
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_usuario = :id_usuario");	
		//Definicion de parametros a la consulta
		$stmt->bindParam(":id_usuario", $datosModel, PDO::PARAM_INT);
		//Si la ejecucion es exitosa devuelve mensaje de exito
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			//De lo contrario devuelve mensaje de error
			return "error";
		}
		//Cerrar conexion al final
		$stmt->close();
	}


	




}
?>