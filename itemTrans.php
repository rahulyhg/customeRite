<!-- transcations -->
<?php

	$mysqli = new mysqli('localhost','root','','thisDatabase');

	if ($_SERVER['REQUEST_METHOD'] =='POST') {
		if(isset($_POST['register'])){
			$errors = array();//sql and form input erros store

			$subject ;
			$description ;
			$dateReleased ;
			$img ;
			$imgTmp;

			$array = array('jpg','jpeg','png');
			
			$img=$_FILES["img"]["name"];//this is inserted into the img column of productimg table
			$imgTmp=$_FILES["img"]["tmp_name"];
			$ext = pathinfo($img,PATHINFO_EXTENSION);


			if(!isset($_POST['subjects']) || empty($_POST['subjects'])){
				$errors['subject1'] = 'subject cannot be empty';
			}
			if(!isset($_POST['description']) || empty($_POST['description'])){
				$errors['description1'] = 'description cannot be empty';
			}
			if(!isset($_POST['dateReleased']) || empty($_POST['dateReleased'])){
				$errors['dateReleased1'] = 'dateReleased cannot be empty';

			}
			// if(empty($img)){
			// 	$errors['img1'] = 'unsupported format';
			// }

			if(count($errors) == 0){
				$subject = addslashes($_POST['subjects']);
				$description = addslashes($_POST['description']);
				$dateReleased = $_POST['dateReleased'];

				//this uploads the provided file to the specified folder(second parameter)
				move_uploaded_file($imgTmp, "images/items/$img");

				global $mysqli;

				$mysqli -> autocommit(false);

				// creating a transaction for customer table insertion
				if(empty($img))
					$query = $mysqli -> query("INSERT IGNORE INTO Item (subjectID,descriptionID,dateReleased) VALUES ('$subject','$description','$dateReleased')");
				else
					$query = $mysqli -> query("INSERT IGNORE INTO Item (subjectID,descriptionID,iImage,dateReleased) VALUES ('$subject','$description','$img','$dateReleased')");

				if(!$query){
					$mysqli -> rollback();//reverting to it's initial state if any error exists
					
					// print_r('this is it');
					$errors['itemInsertion'] = 'Problem with inserting data into customer';
					$errors['registerError'] = 'Please fill up all fields and meet all conditions in order to register!';
				}

				$mysqli -> commit();//commiting the change to the database
			}
		}
		else{
				echo "<script>alert('Please fill all fields before clicking on register')</script>";
				$errors['registerError'] = 'Please fill up all fields and meet all conditions in item to register!';
		}

		echo "<script>window.open('item.php','_self')</script>";//makes the page reload to submitAd.php page
	}
?>

<?php
	$mysqli = new mysqli('localhost','root','','thisDatabase');

	//retrieving the list of subjects 
	function selectSubjects(){
		global $mysqli;

		$query = $mysqli -> query("SELECT subjectID, title FROM Subject");

		$rowCount = $query -> num_rows;
		 // data-tokens="ketchup mustard"

		if($rowCount > 0){
			while($row = $query -> fetch_assoc()){
				$rowId = $row['subjectID'];
				$rowtitle =  $row['title'];
		
				echo '<option value="'.$rowId.'" data-tokens="'.$rowtitle.'">';
					echo $rowtitle;
				echo '</ option>';
			}
		}
	}

	// retrieving list of descriptions
	function selectDescription(){
		global $mysqli;

		$query = $mysqli -> query("SELECT descriptionID, title FROM Description");

		$rowCount = $query -> num_rows;

		if($rowCount > 0){
			while($row = $query -> fetch_assoc()){
				$rowId = $row['descriptionID'];
				$rowtitle =  $row['title'];
		
				echo '<option value="'.$rowId.'" data-tokens="'.$rowtitle.'">';
					echo $rowtitle;
				echo '</ option>';
			}
		}
	}

	//read and display Items from database
	function loadItems(){
		global $mysqli;

		$query = $mysqli -> query("SELECT * FROM Item");

		$rowCount = $query -> num_rows;

		if($rowCount > 0){
			while($row = $query -> fetch_assoc()){
				$rowId = $row['itemID'];
				$rowSubId = $row['subjectID'];
				$rowDescId = $row['descriptionID'];
				$rowdateRel =  $row['dateReleased'];

				$rowtitleSub;
				$rowtitleDesc;

				// retrieving title from Subject table
				$query1 = $mysqli -> query("SELECT title FROM Subject WHERE subjectID = ".$rowSubId);
				$rowCount1 = $query1 -> num_rows;
				if($rowCount1 > 0){
					while($row1 = $query1 -> fetch_assoc()){
						$rowtitleSub = $row1['title'];
					}
				}

				// retrieving title from Description table 
				$query2 = $mysqli -> query("SELECT title FROM Description WHERE descriptionID = ".$rowDescId);
				$rowCount2 = $query2 -> num_rows;
				if($rowCount2 > 0){
					while($row2 = $query2 -> fetch_assoc()){
						$rowtitleDesc = $row2['title'];
					}
				}

				// you might remove the check boxes cos of complications, it's less complicated 
				echo '<tr>';
					echo '<td>'.$rowtitleSub.'</td>';
					echo '<td>'.$rowtitleDesc.'</td>';
					echo '<td>'.$rowdateRel.'</td>';
				echo '</ tr>';
			}
		}
	}
?>
