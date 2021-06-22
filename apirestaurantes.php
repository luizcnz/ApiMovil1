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
					'ciudad'=>$row['ciudad'],
					'coordenadas'=>$row['coordenadas'],
					'telefono'=>$row['telefono'],
					'menuID'=>$row['menuID'],
				);
				array_push($locales['items'], $item);
			}

			//echo json_encode($locales);

			$this->printJSON($locales);

		}else{

			$this->error('no hay elementos registrados');
		}
	}

	function getByID($menuID){
		$restaurante = new Restaurante();
		$locales = array();
		$locales["items"] = array();
		
		$res = $restaurante->obtenerRestaurante($menuID);

		if($res->rowCount()){
			while ($row = $res->fetch(PDO::FETCH_ASSOC)){


			$item=array(
				'id'=>$row['id'],
				'nombre'=>$row['nombre'],
				'precio'=>$row['precio'],
				'imagen'=>$row['imagen'],
			);
			array_push($locales['items'], $item);
		}
			//echo json_encode($locales);

			$this->printJSON($locales);

		}else{
			
			$this->error('no hay elementos registrados');
		}
	}

	function printJSON($locales){

		echo  json_encode($locales) ;
	}

	function error($mensaje){
		echo '<code>' . json_encode(array('mensaje' => $mensaje)) . '</code>';
	}

}

?>