<?php

include_once 'db.php';

class promocion extends DB{
	
	function obtenerPromociones(){
		$query = $this->connect()->query('SELECT * FROM promociones');
		return $query;
	}

	function obtenerPromocion($id){
		$query = $this->connect()->prepare('SELECT*FROM promociones WHERE id= :id');

		$query->execute(['id' => $id]);

		return $query;
	}

}

?>