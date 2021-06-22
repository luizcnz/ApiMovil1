<?php

include_once 'promo.php';

class ApiPromociones{



	function getAll(){
		$promocion = new Promocion();
		$promociones = array();
		$promociones["items"] = array();
		
		$res = $promocion->obtenerPromociones();

		if($res->rowCount()){
			while ($row = $res->fetch(PDO::FETCH_ASSOC)){

				$item=array(
					'id'=>$row['id'],
					'nombre'=>$row['nombre'],
					'precio'=>$row['precio'],
					'descripcion'=>$row['descripcion'],
					'foto'=>$row['foto'],
				);
				array_push($promociones['items'], $item);
			}

			//echo json_encode($promociones);

			$this->printJSON($promociones);

		}else{

			$this->error('no hay elementos registrados');
		}
	}

	function getByID($id){
		$promocion = new Promocion();
		$promociones = array();
		$promociones["items"] = array();
		
		$res = $promocion->obtenerRestaurante($id);

		if($res->rowCount() == 1){

			$row = $res->fetch();


			$item=array(
				'id'=>$row['id'],
				'nombre'=>$row['nombre'],
				'precio'=>$row['precio'],
				'descripcion'=>$row['descripcion'],
				'foto'=>$row['foto'],
			);
			array_push($promociones['items'], $item);

			//echo json_encode($promociones);

			$this->printJSON($promociones);

		}else{
			
			$this->error('no hay elementos registrados');
		}
	}

	function printJSON($promociones){

		echo  json_encode($promociones) ;
	}

	function error($mensaje){
		echo '<code>' . json_encode(array('mensaje' => $mensaje)) . '</code>';
	}

}

?>