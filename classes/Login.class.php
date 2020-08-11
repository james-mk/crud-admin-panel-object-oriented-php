<?php

class Login extends Database {
	
	private $errors=[];
	private $data;
	
	public function __construct($data) {
		$this->data= $data;
		
	}
	
	public function validate(){
		
		$this->username();
		$this->password();
	
		return $this->errors;
		
	}
	
	public function username() {
		if(empty($this->data['user_name'])){
			$this->addError('user_name','Enter Username or email');
		}
	}
	
	public function password() {
		if(empty($this->data['password'])){
			$this->addError('password','Enter password');
		}
	}
		
	
	public function addError($key,$value) {
		$this->errors[$key]=$value;
	}
	
	public function loginUser() {
		if(!empty($this->errors)){
			
		}else{
			
		$user_name=$this->data['user_name'];
		$password=$_POST['password'];
			
		$sql="SELECT * FROM users WHERE user_name=? || email=? LIMIT 1";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$user_name,$user_name]);
		$result=$stmt->fetch();
			
			if(password_verify($password, $result['password'])) {

			session_regenerate_id();
			$_SESSION['user_name']=$result['user_name'];
			$_SESSION['email']=$result['email'];
			$_SESSION['role']=$result['role'];
			session_write_close();

			if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){
				header('location:admins.php');
			}elseif(isset($_SESSION['role'])&& $_SESSION['role']=='editor'){
				header('location:index.php');
			}else{
				header('location:login.php');
			}


			}else {
		echo "
		<script>
		
		alert('username and password do not match');
		
		</script>
		
		
		";
			}
			
			
		}
		

	}
	
	
	
	
}
