<?php

	include_once 'apirestaurantes.php';

	$api = new ApiRestaurantes();

	if(isset($_GET['menuID'])){

		$menuID = $_GET['menuID'];

		if(is_string($menuID)){

			$api->getById($menuID);

		}else{
			$api->error('Los parametros son incorrectos');
		}

	}else{

		$api->getAll();
	}


?>