<?php

class Editlisting extends Database {
	

	public function getSingleRecord($edit_id) {
		$sql="SELECT * FROM car_listings WHERE id = ?";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$edit_id]);
		$result=$stmt->fetch();
		return $result;
		
		
	}
	

}
