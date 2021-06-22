<?php

include_once 'db.php';

class Restaurante extends DB{
	
	function obtenerRestaurantes(){
		$query = $this->connect()->query('SELECT * FROM restaurantes');
		return $query;
	}

}

?>