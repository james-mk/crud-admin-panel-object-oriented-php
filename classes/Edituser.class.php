<?php

	class Edituser extends Database {
	

	public function getSingleUser($user_id) {
		$sql="SELECT * FROM users WHERE user_id = ?";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$user_id]);
		$result=$stmt->fetch();
		return $result;
		
		
	}
		
	public function update() {
		if(isset($_POST['update_user'])) {
			
			$user_id=$_POST['user_id'];
			$user_name=$_POST['user_name'];
			$email=filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
			$role=$_POST['role'];
			$password=$_POST['old_password'];
			
			if(empty($user_name) || empty($email) || !isset($role)){
				echo"<script> alert('please fill all fields'); </script>";
			}else {
				$query = "UPDATE users SET user_name=?,email=?,role=?,password=? WHERE user_id=?";
				$stmt=$this->connect()->prepare($query);
				$stmt->execute([$user_name,$email,$role,$password,$user_id]);
				
				header('location:admins.php');
			}
		}
	}
		
		
		
		public function delete(){
			
		}
		
	}
