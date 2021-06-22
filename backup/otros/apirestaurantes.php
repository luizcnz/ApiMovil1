<?php

include_once 'restaurante.php';

class ApiRestaurantes{



	function getAll(){
		$restaurante = new Restaurante();
		$locales = array();
		$locales["items"] = array();
		
		$res = $restaurante->obtenerRestaurantes();

		if($res->rowCount()){
			while ($row = $res->fetch(PDO::FETCH_ASSOC)){

				$item=array(
					'id'=>$row['id'],
					'nombre'=>$row['nombre'],
					'direccion'=>$row['direccion'],
					'foto'=>$row['foto'],
				);
				array_push($locales['items'], $item);
			}

			echo json_encode($locales);
		}
	}

}

?>