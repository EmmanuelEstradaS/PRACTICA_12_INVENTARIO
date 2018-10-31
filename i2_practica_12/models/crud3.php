<?php
require_once "conexion.php";

class Datos extends Conexion
{

	#VISTA USUARIOS
	#-------------------------------------
	public static function vistaProductosModel($tabla)
	{ 
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla"); 
		if($stmt->execute())
		{
			return $stmt->fetchAll();
		}
		$stmt->close(); 
	}


	# EL MODELO RECIBE COMO PARAMETRO EL NOMBRE DE LA TABLA QUE SE ENCUENTRA EN LA BASE DE DATOS PARA HACER EL CONTEO DE CUANTOS PRODUCTOS HAY.
	public static function getCantidadProductosModel($tabla)
	{ #SE PREPARA LA CONEXION PARA HACER LA CONSULTA A LA TABLA "PRODUCTOS" EN LA BASE DE DATOS 
		$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) as cantidad FROM $tabla"); 
		if($stmt->execute())
		{
			return $stmt->fetch();
		}
		$stmt->close(); 
	}


	# EL MODELO RECIBE COMO PARAMETRO EL NOMBRE DE LA TABLA QUE SE ENCUENTRA EN LA BASE DE DATOS PARA HACER EL CONTEO DE CUANTAS CATEGORIA HAY.

	public static function getCantidadCategoriasModel($tabla)
	{ 
		#SE PREPARA LA CONEXION PARA HACER LA CONSULTA A LA TABLA (productos) EN LA BASE DE DATOS 
		$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) as cantidad FROM $tabla"); 
		if($stmt->execute())
		{
			return $stmt->fetch();
		}
		$stmt->close(); 
	}

	# EL MODELO RECIBE COMO PARAMETRO EL NOMBRE DE LA TABLA QUE SE ENCUENTRA EN LA BASE DE DATOS PARA HACER EL CONTEO DE CUANTOS USUARIOS HAY.
	public static function getCantidadUsuariosModel($tabla)
	{ 
		$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) as cantidad FROM $tabla"); 
		if($stmt->execute())
		{
			return $stmt->fetch();
		}
		$stmt->close(); 
	}


	public static function vistaCategoriasModel($tabla)
	{ 
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla"); 
		if($stmt->execute())
		{
			return $stmt->fetchAll();
		}
		$stmt->close(); 
	}

	public static function vistaUsuariosModel($tabla)
	{ 
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla"); 
		if($stmt->execute())
		{
			return $stmt->fetchAll();
		}
		$stmt->close(); 
	}

	public static function getCategoriasModel($tabla)
	{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}

	public static function getCantidadLibrosModel($tabla,$idUsuario)
	{ 
		$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) as cantidad FROM $tabla WHERE id_usuario = :id_usuario"); 
		$stmt->bindParam(":id_usuario", $idUsuario, PDO::PARAM_INT);
		if($stmt->execute())
		{
			return $stmt->fetch();
		}
		$stmt->close(); 
	}

	public static function getCategoriaByIdModel($tabla,$id)
	{ 
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_categoria = :id_categoria"); 
		$stmt->bindParam(":id_categoria", $id, PDO::PARAM_INT);
		if($stmt->execute())
		{
			return $stmt->fetch();
		}
		$stmt->close(); 
	}

	public static function agregarProductosModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (codigo,nombre,categoria,precio,stock) VALUES (:codigo, :nombre, :categoria, :precio, :stock)");	
		$stmt->bindParam(":codigo", $datosModel["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":categoria", $datosModel["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datosModel["precio"]);
		$stmt->bindParam(":stock", $datosModel["stock"], PDO::PARAM_INT);
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	}

	public static function agregarCategoriasModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,descripcion,fecha_registrada) VALUES (:nombre, :descripcion, :fecha_registrada)");	
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_registrada", $datosModel["fecha_registrada"]);
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	}

	public static function agregarUsuariosModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,apellido,username,email,password,fecha_registro) VALUES (:nombre, :apellido, :username, :email, :password, :fecha_registro)");	
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_registro", $datosModel["fecha_registro"]);
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	}

	public static function actualizarProductosModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET codigo=:codigo, nombre=:nombre, categoria=:categoria, precio=:precio, stock=:stock WHERE id_producto=:id_producto");	
		$stmt->bindParam(":codigo", $datosModel["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":categoria", $datosModel["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datosModel["precio"]);
		$stmt->bindParam(":stock", $datosModel["stock"], PDO::PARAM_INT);
		$stmt->bindParam(":id_producto", $datosModel["id_producto"], PDO::PARAM_INT);
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	}

	public static function actualizarCategoriasModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, descripcion=:descripcion, fecha_registrada=:fecha_registrada WHERE id_categoria=:id_categoria");	
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_registrada", $datosModel["fecha_registrada"]);
		$stmt->bindParam(":id_categoria", $datosModel["id_categoria"], PDO::PARAM_INT);
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	}

	public static function actualizarUsuariosModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, apellido=:apellido, username=:username, email=:email, password=:password, fecha_registro=:fecha_registro WHERE id_usuario=:id_usuario");	
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_registro", $datosModel["fecha_registro"]);
		$stmt->bindParam(":id_usuario", $datosModel["id_usuario"], PDO::PARAM_INT);
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	}

	public static function registroUsuariosModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,username,password) VALUES (:nombre, :username, :password)");	
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	} 

	#LOGIN USUARIOS
	#-------------------------------------
	public static function ingresoUsuarioModel($datosModel, $table)
	{
		$statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE username = :username and password = :password");	
		$statement->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$statement->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$statement->execute();
		return $statement->fetch();
		$statement->close();
	}

	public static function ifDuplicadoModel($datosModel, $table)
	{
		$statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE username = :username");	
		$statement->bindParam(":username", $datosModel, PDO::PARAM_STR);
		$statement->execute();
		return $statement->fetch();
		$statement->close();
	}

	public static function ifDuplicadoCategoriaModel($datosModel, $table)
	{
		$statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE nombre = :nombre");	
		$statement->bindParam(":nombre", $datosModel, PDO::PARAM_STR);
		$statement->execute();
		return $statement->fetch();
		$statement->close();
	}

	public static function ifDuplicadoProductoModel($datosModel, $table)
	{
		$statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE codigo = :codigo");	
		$statement->bindParam(":codigo", $datosModel, PDO::PARAM_STR);
		$statement->execute();
		return $statement->fetch();
		$statement->close();
	}
	
 	public static function editarProductosModel($id,$tabla)
 	{
 		$stm = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_producto = :id_producto");
 		$stm->bindParam(":id_producto", $id, PDO::PARAM_INT);
 		$stm->execute();
 		return $stm->fetch();
 		$stm->close();
 	}

 	public static function editarCategoriasModel($id,$tabla)
 	{
 		$stm = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_categoria = :id_categoria");
 		$stm->bindParam(":id_categoria", $id, PDO::PARAM_INT);
 		$stm->execute();
 		return $stm->fetch();
 		$stm->close();
 	}

 	public static function editarUsuariosModel($id,$tabla)
 	{
 		$stm = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_usuario = :id_usuario");
 		$stm->bindParam(":id_usuario", $id, PDO::PARAM_INT);
 		$stm->execute();
 		return $stm->fetch();
 		$stm->close();
 	}

 	public static function getDetallesProductosModel($id,$tabla)
 	{
 		$stm = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_producto = :id_producto");
 		$stm->bindParam(":id_producto", $id, PDO::PARAM_INT);
 		$stm->execute();
 		return $stm->fetch();
 		$stm->close();
 	}

	public static function getDatosUsuarioModel()
	{
		$stm = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE id_usuario = :id_usuario");
 		$stm->bindParam(":id_usuario", $_SESSION["id"], PDO::PARAM_INT);
 		$stm->execute();
 		return $stm->fetch();
 		$stm->close();
	} 	

	public static function disminuirStockModel($datosModel,$idProducto)
	{
		$stm = Conexion::conectar()->prepare("SELECT stock FROM productos WHERE id_producto = :id_producto");
 		$stm->bindParam(":id_producto", $idProducto, PDO::PARAM_INT);
 		$stm->execute();
 		$res = $stm->fetch();
 		
 		if($datosModel["stock"]<=$res["stock"])
 		{
 			$cantidad = $res["stock"]-$datosModel["stock"];
 			$stm2 = Conexion::conectar()->prepare("UPDATE productos SET stock=:stock WHERE id_producto = :id_producto");
	 		$stm2->bindParam(":stock", $cantidad, PDO::PARAM_INT);
	 		$stm2->bindParam(":id_producto", $idProducto, PDO::PARAM_INT);
	 		if($stm2->execute())
	 		{
	 			return "success";
	 		}
	 		else
	 		{
	 			return "error en la disminucion de stock";
	 		}
	 		$stm2->close();
 		}
 		else
 		{
 			return "No puedes disminuir mas de lo que existe en el stock";
 		}

 		
 		$stm->close();
	} 

	public static function registrarHistorialModel($id_producto,$usuario,$referencia,$nota,$tipo,$fecha)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO historial (id_producto,usuario,referencia,nota,fecha,tipo) VALUES (:id_producto, :usuario, :referencia, :nota, :fecha, :tipo)");	
		$stmt->bindParam(":id_producto", $id_producto, PDO::PARAM_INT);
		$stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
		$stmt->bindParam(":referencia", $referencia, PDO::PARAM_STR);
		$stmt->bindParam(":nota", $nota, PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $fecha);
		$stmt->bindParam(":tipo", $tipo, PDO::PARAM_STR);
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	} 

	public static function vistaHistorialModel($tabla,$id)
	{ 
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_producto=:id_producto");
		$stmt->bindParam(":id_producto", $id, PDO::PARAM_INT); 
		if($stmt->execute())
		{
			return $stmt->fetchAll();
		}
		$stmt->close(); 
	}

	public static function getNombreProductosByIdModel($tabla,$id)
	{
		$stm = Conexion::conectar()->prepare("SELECT * FROM productos WHERE id_producto = :id_producto");
 		$stm->bindParam(":id_producto", $id, PDO::PARAM_INT);
 		$stm->execute();
 		return $stm->fetch();
 		$stm->close();
	} 

	public static function aumentarStockModel($datosModel,$idProducto)
	{
		$stm = Conexion::conectar()->prepare("SELECT stock FROM productos WHERE id_producto = :id_producto");
 		$stm->bindParam(":id_producto", $idProducto, PDO::PARAM_INT);
 		$stm->execute();
 		$res = $stm->fetch();
 		
 		$cantidad = $res["stock"]+$datosModel["stock"];

 		$stm2 = Conexion::conectar()->prepare("UPDATE productos SET stock=:stock WHERE id_producto = :id_producto");
 		$stm2->bindParam(":stock", $cantidad, PDO::PARAM_INT);
 		$stm2->bindParam(":id_producto", $idProducto, PDO::PARAM_INT);
 		if($stm2->execute())
 		{
 			return "success";
 		}
 		$stm2->close();
 		$stm->close();
	} 	

	public static function getNombreCategoriaByIdModel($tabla,$idCate)
	{
		$stm = Conexion::conectar()->prepare("SELECT * FROM categorias WHERE id_categoria = :id_categoria");
 		$stm->bindParam(":id_categoria", $idCate, PDO::PARAM_INT);
 		$stm->execute();
 		return $stm->fetch();
 		$stm->close();
	} 	

	public static function actualizarLibrosModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, autor = :autor, descripcion = :descripcion, id_usuario = :id_usuario WHERE id_libro = :id_libro");	
		$stmt->bindParam(":titulo", $datosModel["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":autor", $datosModel["autor"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datosModel["id_usuario"], PDO::PARAM_INT);
		$stmt->bindParam(":id_libro", $datosModel["id_libro"], PDO::PARAM_INT);
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	}

	public static function actualizarPerfilModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, username = :username, password = :password WHERE id_usuario = :id_usuario");	
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datosModel["id_usuario"], PDO::PARAM_INT);
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	}

	public static function borrarProductosModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_producto = :id_producto");	
		$stmt->bindParam(":id_producto", $datosModel, PDO::PARAM_INT);
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	}

	public static function borrarCategoriasModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_categoria = :id_categoria");	
		$stmt->bindParam(":id_categoria", $datosModel, PDO::PARAM_INT);
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	}

	public static function borrarUsuariosModel($datosModel, $tabla)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_usuario = :id_usuario");	
		$stmt->bindParam(":id_usuario", $datosModel, PDO::PARAM_INT);
		if($stmt->execute())
		{
			return "success";
		}
		else
		{
			return "error";
		}
		$stmt->close();
	}


	




}
?>