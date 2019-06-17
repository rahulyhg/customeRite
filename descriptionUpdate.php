<!-- update for description -->
<?php
	$rowId ;
	$title ;

	if ($_SERVER['REQUEST_METHOD'] =='GET') {
		if(isset($_GET['descriptionID'])){

		include('html/header.html');
?>
	<div ng-app="mainApp" id="addDescription" class="center-container" style="height: inherit;" >
		<div class="main">
			<h1 class="w3layouts_head">Update Description</h1>
				<div class="w3layouts_main_grid" ng-controller="descriptionController">
					<!-- itemController -->
					<form action="" method="post" class="w3_form_post" name="descForm" enctype="multipart/form-data" novalidate>
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Title </label>

									<?php
										$mysqli = new mysqli('localhost','root','','thisDatabase');

										$mysqli -> autocommit(false);

										$descriptionID = $_GET['descriptionID'];

										// creating a transaction for customer row deletion
										$query = $mysqli -> query("SELECT * FROM Description WHERE descriptionID = ".$descriptionID);

										$rowCount = $query -> num_rows;

										if($rowCount > 0){
											while($row = $query -> fetch_assoc()){
												$rowId = $row['descriptionID'];
												$title = addslashes($row['title']);
											}
										}

										echo "<input type='text' value='$title' name='title' ng-model='title' placeholder='Include a title' maxlength='20' required>"
									?>
							</span>

							<span ng-show="descForm.title.$dirty && descForm.title.$invalid">
								<span class="lead text-danger" ng-show="descForm.title.$error.required">Title is required</span>
							</span>
						</div>
						<!-- <div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Phone number </label>
								<input type="tel" class="form-control" name="phoneNo" ng-model="phoneNo" placeholder="Include a phone number" minlength="12" maxlength="12" style="width: 330px;height: 40px;background-color: inherit;color: white;"  required>
							</span>

							<span ng-show="descForm.phoneNo.$dirty && descForm.phoneNo.$invalid">
								<span class="lead text-danger" ng-show="descForm.phoneNo.$error.required">Phone number is required</span>
								<span class="lead text-danger" ng-show="descForm.phoneNo.$error.minlength">Phone number should be equal to 12 characters</span>
								<span class="lead text-danger" ng-show="descForm.phoneNo.$error.tel">Phone number is invalid</span>
							</span>
						</div> -->
						<div class="w3_main_grid">
							<div class="w3_main_grid_right">
								<input type="submit" name="register" value="Register" ng-disabled="descForm.title.$dirty && descForm.title.$invalid" />
								<span class="text-danger lead"></span>
								<!-- <?php if(isset($errors['registerError'])) $errors['registerError']; ?> -->
							</div>
						</div>
				</form>
			</div>
		<!-- Calendar -->
		</div>
	</div>
<?php
		}
		else{
			// echo "<script>window.open('item.php','_self')</script>";//makes the page reload to item.php page
		}
		include('html/footer.html');
	}
?>

<?php
	$mysqli = new mysqli('localhost','root','','thisDatabase');

	if ($_SERVER['REQUEST_METHOD'] =='POST') {
		if(isset($_POST['register'])){
			$errors = array();//sql and form input erros store

			$title ;
			// $item ;

			if(!isset($_POST['title']) || empty($_POST['title'])){
				$errors['title1'] = 'title cannot be empty';
			}
			// if(!isset($_POST['item']) || empty($_POST['item'])){
			// 	$errors['item1'] = 'item cannot be empty';
			// }

			if(count($errors) == 0){
				$title = addslashes($_POST['title']);
				// $item = $_POST['item'];

				global $mysqli;

				$mysqli -> autocommit(false);

				// creating a transaction for title table insertion
				$query = $mysqli -> query("UPDATE Description SET title = '$title'");

				if(!$query){
					$mysqli -> rollback();//reverting to it's initial state if any error exists

					$errors['itemInsertion'] = 'Problem with updating data into title';
					$errors['registerError'] = 'Please fill up all fields and meet all conditions in item to register!';
				}
				
				$mysqli -> commit();//commiting the change to the database

				echo "<script>window.open('item.php','_self')</script>";//makes the page reload to submitAd.php page
			}
			else{
				$errors['registerError'] = 'Please fill up all fields and meet all conditions in item to register!';
			}
		}
	}
?>