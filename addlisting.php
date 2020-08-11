<?php 
include("header.php");

if(isset($_POST['add_listing'])) {
	
	//instantiate class
	$validation=new setListings($_POST);
	//retrieve errors from the validation method which returns errors array
	$errors=$validation->validateForm();
	//if there are no errors, insert data into database
	$validation->insertData();
	
}

?>


<div class="container">
	<div class="section">
		<p class="flow-text amber-text center">Add Listing</p>
	</div>


	<!-- BEGIN ADD LISTING FORM -->

	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="add_listing-form" enctype="multipart/form-data">
		<input type="hidden" name="id" value="">
		<div class="row">
			<div class="col s12 m4">
				<div class="input-field">
					<input type="hidden" name="oldimage" value="" id="oldimage">
					<p class="white-text">Upload a cover photo</p>
					<input type="file" name="coverphoto" id="coverphoto" value="<?=$_POST['coverphoto'] ?? '' ?>">

					<p class="red-text"><?php echo $errors['coverphotoerror'] ?? '' ?></p>

				</div>
			</div>
			<div class="col s12 m4">
				<div class="input-field">
					<input type="text" name="make" id="make" value="<?=$_POST['make'] ?? '' ?>">
					<label for="make">Make</label>
					<p class="red-text"><?php echo $errors['makeerror'] ?? '' ?></p>
				</div>

			</div>
			<div class="col s12 m4">
				<div class="input-field">
					<input type="text" name="model" id="model" value="<?=$_POST['model'] ?? '' ?>">
					<label for="model">Model</label>
					<p class="red-text"><?php echo $errors['modelerror'] ?? '' ?></p>
				</div>
			</div>

		</div>
		<div class="row">
			<div class="col s12 m4">

				<div class="input-field">
					<input type="number" name="year" id="year" value="<?=$_POST['year'] ?? '' ?>">
					<label for="year">Year</label>
					<p class="red-text"><?php echo $errors['yearerror'] ?? '' ?></p>
				</div>

			</div>
			<div class="col s12 m4">
				<div class="input-field">
					<input type="number" name="price" id="price" value="<?=$_POST['price'] ?? '' ?>">
					<label for="price">Price</label>
					<p class="red-text"><?php echo $errors['priceerror'] ?? '' ?></p>
				</div>
			</div>
			<div class="col s12 m4">
				<div class="input-field">

					<select class="" name="drive">
						<option value="" disabled selected>Select Drive</option>
						<option value="automatic">Automatic</option>
						<option value="manual">Manual</option>

					</select>
					<p class="red-text"><?php echo $errors['driveerror'] ?? '' ?></p>
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
					<p class="red-text"><?php echo $errors['stateerror'] ?? '' ?></p>
				</div>

			</div>
			<div class="col s12 m4">
				<div class="input-field">

					<input type="text" name="mileage" id="mileage" value="<?=$_POST['mileage'] ?? '' ?>">
					<label for="mileage">Mileage</label>
					<p class="red-text"><?php echo $errors['mileageerror'] ?? '' ?></p>
				</div>
			</div>
			<div class="col s12 m4">
				<div class="input-field">
					<input type="number" name="engine_capacity" id="engine_capacity" value="<?=$_POST['engine_capacity'] ?? '' ?>">
					<label for="engine_capacity">Engine Capacity</label>
					<p class="red-text"><?php echo $errors['engine_capacity_error'] ?? '' ?></p>
				</div>
			</div>


		</div>

		<div class="row">
			<div class="col s12 m6">
				<div class="input-field">
					<input type="text" name="color" id="color" value="<?=$_POST['color'] ?? '' ?>">
					<label for="color">Color</label>
					<p class="red-text"><?php echo $errors['colorerror'] ?? '' ?></p>
				</div>
			</div>
			<div class="col s12 m6">
				<div class="input-field">

					<select class="" name="interior">
						<option value="" disabled selected>Interior</option>
						<option value="fabric">Fabric</option>
						<option value="leather">Leather</option>

					</select>
					<p class="red-text"><?php echo $errors['interiorerror'] ?? '' ?></p>
				</div>
			</div>


		</div>

		<div class="row">
			<div class="col s12 m12">
				<div class="input-field">
					<textarea name="description" id="description" class="materialize-textarea" value="<?=$_POST['description'] ?? '' ?>"></textarea>
					<label for="description">Enter Vehicle Description/Features/Other Details</label>
					<p class="red-text"><?php echo $errors['descriptionerror'] ?? '' ?></p>
				</div>
			</div>

		</div>


		<div class="center">
			<!-- DETERMINE WHICH BUTTON TO DISPLAY (ADD OR UPDATE BUTTON) BASED ON WHETHER EDIT BUTTON HAS BEEN PRESSED -->


			<input type="submit" value="Add Listing" class="btn btn-large orange white-text" name="add_listing">

		</div>


	</form>



</div>


<?php include('includes/footer.php'); ?>
