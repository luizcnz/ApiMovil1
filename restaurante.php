<?php

include_once 'db.php';

class Restaurante extends DB{
	
	function obtenerRestaurantes(){
		$query = $this->connect()->query('SELECT * FROM restaurantes');
		return $query;
	}

	function obtenerRestaurante($menuID){
		$query = $this->connect()->prepare('SELECT*FROM '.$menuID.'');

		$query->execute(['menuID' => $menuID]);

		return $query;
	}

}

?>