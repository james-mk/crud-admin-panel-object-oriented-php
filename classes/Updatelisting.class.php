<?php
class Updatelisting extends Database {
	
	private $data;
	
	public function __construct($data) {
		$this->data=$data;
	}
	
public function update() {
$id=$this->data['id'];	
$coverphoto =$this->data['coverphoto']="uploads/".$_FILES['coverphoto']['name'] ;
$make=$this->data['make'];
$model=$this->data['model'];
$year=$this->data['year'];
$price=$this->data['price'];
$drive=$this->data['drive'];
$state=$this->data['state'];
$mileage=$this->data['mileage'];
$engine_capacity=$this->data['engine_capacity'];
$color=$this->data['color'];
$interior=$this->data['interior'];
$description=$this->data['description'];
$oldimage = $this->data['oldimage'];
		
if(isset($_FILES['coverphoto']['name']) AND ($_FILES['coverphoto']['name']!="")) {
	$newimage ="uploads/".$_FILES['coverphoto']['name'];
	unlink($oldimage);
	move_uploaded_file($_FILES['coverphoto']['tmp_name'], $newimage);
} else {
$newimage=$oldimage;
}

	
$query = "UPDATE car_listings SET coverphoto=?,make=?,model=?,year=?,price=?,drive=?,state=?,mileage=?,engine_capacity=?,color=?,interior=?,description=? WHERE id=?";
$stmt=$this->connect()->prepare($query);
$stmt->execute([$newimage,$make,$model,$year,$price,$drive,$state,$mileage,$engine_capacity,$color,$interior,$description,$id]);

header('location:index.php');
		
		
	}
	
	
}
