<?php
include('header.php');

if(isset($_GET['edit_user'])){

$user_id=$_GET['edit_user'];

$edit=new Edituser();
$result=$edit->getSingleUser($user_id);
}
?>

<?php
$update=new Edituser();
$update->update();

?>


<div class="container">
	<div class="row">

		<div class="col s12 ">



			<h4 class="amber-text">Update User : <span class="white-text"> <?=$result['user_name'];?></span></h4>


			<div class="flow-text red-text"><?=$errors['register'] ?? '' ?></div>

			<form action="" method="POST" id="admin-registration-form">

				<input type="hidden" name="user_id" value="<?=$result['user_id'];?>">
				<div class="input-field">
					<input type="text" name="user_name" id="user_name" value="<?=$result['user_name']; ?>">
					<label for="name">Username</label>
					<p class="red-text"><?=$errors['user_name'] ?? '' ?></p>
				</div>

				<div class="input-field">
					<input type="email" name="email" id="email" value="<?=$result['email'] ?>">
					<label for="email">Email</label>
					<p class="red-text"><?=$errors['email'] ?? '' ?></p>
				</div>

				<div class="input-field">
					<input type="hidden" name="old_password" id="old_password" value="<?=$result['password'] ?>">


				</div>

				<div class="input-field">
					<select class="" name="role">
						<option value="" disabled selected>Select Role</option>
						<option value="admin">Admin</option>
						<option value="editor">Editor</option>
						<option value="user">User</option>

					</select>
					<p class="red-text"><?=$errors['role'] ?? '' ?></p>
				</div>


				<input type="submit" value="UPDATE USER" class="btn btn-large green white-text" name="update_user">


			</form>
		</div>
	</div>
</div>




<?php include('includes/footer.php');
