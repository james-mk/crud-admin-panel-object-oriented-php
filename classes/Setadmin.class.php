<?php

class Setadmin extends Database {
	private $errors=[];
	private $data;
	
	public function __construct($data){
		$this->data=$data;
	}
	
	
	public function validate() {
		$this->user_name();
		$this->email();
		$this->password();
		$this->role();
		$this->checkname();
		$this->checkemail();
		
		return $this->errors;
		
	}
	
		
	private function user_name(){
		if(empty($this->data['user_name'])){
			$this->addError('user_name','Enter username');
		}
	}
	private function email(){
		if(empty($this->data['email'])){
			$this->addError('email','Enter email');
		}elseif(!filter_var($this->data['email'],FILTER_VALIDATE_EMAIL)){
				$this->addError('email','Invalid email');
		}
	}
	private function password(){
		if(empty($this->data['password'])){
			$this->addError('password','Enter password');
		}
	}
	private function role(){
		if(!isset($this->data['role'])){
			$this->addError('role','Specify role');
		}
	}
	
	private function checkname(){
		$name=$this->data['user_name'];
		$sql="SELECT * FROM users WHERE user_name=?";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$name]);
		if($stmt->rowCount()> 0){
			$this->addError('register','Username already taken');
		}
	}
	private function checkemail(){
		$email=$this->data['email'];
		$sql="SELECT * FROM users WHERE email=?";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$email]);
		if($stmt->rowCount()> 0){
			$this->addError('register','Email already in use');
		}
	}
	
	
	public function addError($key,$value){
	$this->errors[$key]=$value;
	}
	
	
	public function insertUser(){
		if(!empty($this->errors)) {
		//echo "<script>"."alert('Sorry..some information you entered is invalid, please check and try again')"."</script>";	
		}else{
			$user_name=$this->data['user_name'];
			$email=$this->data['email'];
			$password=password_hash($this->data['password'], PASSWORD_DEFAULT);
			$role=$this->data['role'];
			$sql="INSERT INTO users(user_name,email,password,role)VALUES(?,?,?,?)";
			$stmt=$this->connect()->prepare($sql);
			$stmt->execute([$user_name,$email,$password,$role]);
			
			header('location:admins.php');
		}
		
	}
	

	
	
}
	
