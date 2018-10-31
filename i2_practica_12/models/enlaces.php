<?php 
	class Paginas
	{
		//Metodo para relacionar las paginas dependiendo del action que se coloque redirecciona a sia la pagina que es
		public static function enlacesPaginasModel($enlaces)
		{
			if($enlaces == "dashboard" || $enlaces == "salir" || $enlaces == "registro" || $enlaces == "listado_productos" || $enlaces == "agregar_productos" || $enlaces == "listado_categorias" || $enlaces == "listado_usuarios" || $enlaces == "agregar_categorias" || $enlaces == "agregar_usuarios" || $enlaces == "editar_productos" || $enlaces == "editar_categorias" || $enlaces == "editar_usuarios" || $enlaces == "detalles_productos")
			{
				$module =  "views/modules/".$enlaces.".php";
			}
		    else if($enlaces == "index")
		    {
		    	$module =  "views/modules/ingresar.php";	
		    }
			return $module;

			
		}
	}
?>