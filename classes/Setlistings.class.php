<?php

class Setlistings extends Database {

 		private $data; //post array data
		private $errors=[];
 		private $max_size=1024*5000;
		private $accepted = ['image/jpeg','image/jpg','image/png'];

	
	
	public function __construct($data) {
		$this->data=$data; 
	
		
	}
	
	//VALIDATE FORM AND RETURN ERRORS 
	public function validateForm() {
		
		//call the individual field validation methods to return their errors
		$this->coverphoto();
		$this->make();
		$this->model();
		$this->year();
		$this->price();
		$this->drive();
		$this->state();
		$this->mileage();
		$this->engine_capacity();
		$this->color();
		$this->interior();
		$this->description();
		return $this->errors;
	}
	
	
	private function coverphoto(){
 	$file_name= $this->data['coverphoto']=$_FILES['coverphoto']['name'];
	$file_path= $this->data['coverphoto']="uploads/".$_FILES['coverphoto']['name'];
	$type= $this->data['coverphoto']=$_FILES['coverphoto']['type'];
	$size= $this->data['coverphoto']=$_FILES['coverphoto']['size'];
	$tmp_name= $this->data['coverphoto']=$_FILES['coverphoto']['tmp_name'];
	$target="uploads/".basename($file_name);
	
	if(empty($file_name)){
	$this->addError('coverphotoerror','Please upload image');
	}elseif($size> $this->max_size) {
	$this->addError('coverphotoerror','Image is too large. Max is 5Mb');
	}elseif(!in_array($type,$this->accepted)){
		$this->addError('coverphotoerror','Unsupported image format.');
	}else{
//		echo $file_path;
		move_uploaded_file($tmp_name,$target);
	}
		
		
		
	}
		
		
	private function make(){
		if(empty($this->data['make'])){
			$this->addError('makeerror','Please specify vehicle make');
		}
	}
	private function model(){
			if(empty($this->data['model'])){
			$this->addError('modelerror','Please specify vehicle model');
		}
	}
	private function year(){
			if(empty($this->data['year'])){
			$this->addError('yearerror','Please specify year of manufacture');
		}
	}
	private function price(){
			if(empty($this->data['price'])){
			$this->addError('priceerror','Please specify vehicle price');
		}
	}
	private function drive(){
			if(empty($this->data['drive'])){
			$this->addError('driveerror','Please specify vehicle drive type');
		}
	}
	private function state(){
			if(empty($this->data['state'])){
			$this->addError('stateerror','Please specify vehicle condition');
		}
	}
	private function mileage(){
			if(empty($this->data['mileage'])){
			$this->addError('mileageerror','Please specify vehicle mileage');
		}
	}
	private function engine_capacity(){
			if(empty($this->data['engine_capacity'])){
			$this->addError('engine_capacity_error','Please specify vehicle engine capacity');
		}
	}
	private function color(){
			if(empty($this->data['color'])){
			$this->addError('colorerror','Please specify vehicle color');
		}
	}
	private function interior(){
			if(empty($this->data['interior'])){
			$this->addError('interiorerror','Please specify vehicle interior');
		}
	}
	private function description(){
			if(empty($this->data['description'])){
			$this->addError('descriptionerror','Please provide a short description of vehicle features');
		}
	}
	
	private function addError($key,$value){
		$this->errors[$key]=$value;
	}
	
	
	public function insertData() {
		if(!empty($this->errors)) {
			echo "<script>"."alert('Sorry..some information you entered is invalid, please check and try again')"."</script>";
		}else {
			
$image =$this->data['coverphoto']="uploads/".$_FILES['coverphoto']['name'] ;
$make=htmlspecialchars($this->data['make']);
$model=htmlspecialchars($this->data['model']);
$year=htmlspecialchars($this->data['year']);
$price=htmlspecialchars($this->data['price']);
$drive=htmlspecialchars($this->data['drive']);
$state=htmlspecialchars($this->data['state']);
$mileage=htmlspecialchars($this->data['mileage']);
$engine_capacity=htmlspecialchars($this->data['engine_capacity']);
$color=htmlspecialchars($this->data['color']);
$interior=htmlspecialchars($this->data['interior']);
$description=htmlspecialchars($this->data['description']);
			
$query="INSERT INTO car_listings(coverphoto,make,model,year,price,drive,mileage,state,engine_capacity,color,interior,description)VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
$statement=$this->connect()->prepare($query);
$statement->execute([$image,$make,$model,$year,$price,$drive,$mileage,$state,$engine_capacity,$color,$interior,$description]);

		

		header('location:addlisting.php');
			
			
			
			
		}
	}
	
}
