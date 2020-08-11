<?php 
include("header.php");

if(isset($_GET['edit_listing'])) {
	
$edit_id=$_GET['edit_listing'];
	
	$edit=new Editlisting();
	$records=$edit->getSingleRecord($edit_id);
	
	
}

if(isset($_POST['update'])) {
	
$update=new Updatelisting($_POST);
$update->update();
}

?>
<div class="container">

	<p class="flow-text amber-text center section">Edit Listing</p>

	<!-- BEGIN ADD LISTING FORM -->

	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="add_listing-form" enctype="multipart/form-data" class="white-text">
		<input type="hidden" name="id" value="<?=$records['id']; ?>">
		<div class="row">
			<div class="col s12 m4">
				<div class="input-field">
					<input type="hidden" name="oldimage" value="<?=$records['coverphoto']?>" id="oldimage">
					<p class="teal-text">Upload a cover photo</p>
					<input type="file" name="coverphoto" id="coverphoto">
					<img src="<?=$records['coverphoto']?>" width="170" name>

				</div>
			</div>
			<div class="col s12 m4">
				<div class="input-field">
					<input type="text" name="make" id="make" value="<?=$records['make']; ?>">
					<label for="make">Make</label>

				</div>

			</div>
			<div class="col s12 m4">
				<div class="input-field">
					<input type="text" name="model" id="model" value="<?=$records['model']; ?>">
					<label for="model">Model</label>

				</div>
			</div>

		</div>
		<div class="row">
			<div class="col s12 m4">

				<div class="input-field">
					<input type="number" name="year" id="year" value="<?=$records['year']; ?>">
					<label for="year">Year</label>

				</div>

			</div>
			<div class="col s12 m4">
				<div class="input-field">
					<input type="number" name="price" id="price" value="<?=$records['price']; ?>">
					<label for="price">Price</label>

				</div>
			</div>
			<div class="col s12 m4">
				<div class="input-field">

					<select class="" name="drive">
						<option value="" disabled selected>Select Drive</option>
						<option value="automatic">Automatic</option>
						<option value="manual">Manual</option>

					</select>

				</div>
			</div>
		</div>

		<div class="row">

			<div class="col s12 m4">
				<div class="input-field">

					<select class="" name="state">
						<option value="" disabled selected>Select Condition</option>
						<option value="new">New</option>
						<option value="used">Used</option>

					</select>

				</div>

			</div>
			<div class="col s12 m4">
				<div class="input-field">

					<input type="text" name="mileage" id="mileage" value="<?=$records['mileage']; ?>">
					<label for="mileage">Mileage</label>

				</div>
			</div>
			<div class="col s12 m4">
				<div class="input-field">
					<input type="number" name="engine_capacity" id="engine_capacity" value="<?=$records['engine_capacity']; ?>">
					<label for="engine_capacity">Engine Capacity</label>

				</div>
			</div>


		</div>

		<div class="row">
			<div class="col s12 m6">
				<div class="input-field">
					<input type="text" name="color" id="color" value="<?=$records['color']; ?>">
					<label for="color">Color</label>

				</div>
			</div>
			<div class="col s12 m6">
				<div class="input-field">

					<select class="" name="interior">
						<option value="" disabled selected>Interior</option>
						<option value="fabric">Fabric</option>
						<option value="leather">Leather</option>

					</select>

				</div>
			</div>


		</div>

		<div class="row">
			<div class="col s12 m12">
				<div class="input-field">
					<textarea name="description" id="description" class="materialize-textarea" value="<?=$records['description']; ?>"></textarea>
					<label for="description">Enter Vehicle Description/Features/Other Details</label>

				</div>
			</div>

		</div>


		<div class="center">
			<!-- DETERMINE WHICH BUTTON TO DISPLAY (ADD OR UPDATE BUTTON) BASED ON WHETHER EDIT BUTTON HAS BEEN PRESSED -->

			<input type="submit" name="update" value="Update Listing" class="btn green white-text">


		</div>


	</form>



</div>


<?php include('includes/footer.php'); ?>
