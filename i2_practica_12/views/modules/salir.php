<?php
	//Destruir la sesion
	error_reporting(0);
	session_start();
	if(isset($_SESSION["id"])){
		session_destroy();	
	}
?>

<script type="text/javascript">
	window.location="index.php";
</script>