<?php

class Getadmin extends Database {
	
	
		public function selectAdmins() {

		
		$sql="SELECT * FROM users WHERE role='admin' OR role='editor' ";
		$result = $this->connect()->query($sql);
		
		if($result->rowCount() > 0){
			
			while($row=$result->fetch()){
				$data[]=$row;
			}
			
			return $data;
		}
	


    
	}
	
	
	public function count() {
		$sql="SELECT * FROM users WHERE role='admin' OR role='editor' ";
		$result = $this->connect()->query($sql);
		echo $result->rowCount();
	}
	
	
	
	
	
	
	
}
