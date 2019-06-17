<!-- transcations -->
<?php

	$errors = array();//sql and form input erros store

	if ($_SERVER['REQUEST_METHOD'] =='POST') {
		if(isset($_POST['register'])){
			$username ;
			$email ;
			$password ;
			$lastName ;
			$initials ;
			$phoneNo ;
			$address ;

			// (filter_var($_GET['email'],FILTER_VALIDATE_EMAIL)) use this part to validate if the input is in the proper format

			if(!isset($_POST['user']) || empty($_POST['user'])){
				$errors['user1'] = 'username cannot be empty';
			}
			if(!isset($_POST['email']) || empty($_POST['email'])){
				$errors['email1'] = 'email cannot be empty';
			}
			if(!isset($_POST['password']) || empty($_POST['password'])){
				$errors['password1'] = 'password cannot be empty';
			}
			if(!isset($_POST['lastname']) || empty($_POST['lastname'])){
				$errors['lastname1'] = 'lastname cannot be empty';
			}
			if(!isset($_POST['initials']) || empty($_POST['initials'])){
				$errors['initials1'] = 'initials cannot be empty';
			}
			if(!isset($_POST['phoneNo']) || empty($_POST['phoneNo'])){
				$errors['phoneNo1'] = 'phoneNo cannot be empty';
			}
			if(!isset($_POST['address']) || empty($_POST['address'])){
				$errors['address1'] = 'address cannot be empty';
			}

			if(count($errors) == 0){
				$username = $_POST['user'];
				$password = addslashes($_POST['password']);
				$phoneNo = $_POST['phoneNo'];

				if(strlen($username) > 7 && strlen($password) > 7 && strlen($phoneNo) > 11 ){
					$email = addslashes($_POST['email']);
					$lastName = addslashes($_POST['lastname']);
					$initials = addslashes($_POST['initials']);
					$address = addslashes($_POST['address']);

					$mysqli = new mysqli('localhost','root','','thisDatabase');

					$mysqli -> autocommit(false);

					// creating a transaction for customer table insertion
					$query = $mysqli -> query("INSERT IGNORE INTO Customer (username,email,password,lastName,initials,phoneNumber,address) VALUES ('$username','$email','$password','$lastName','$initials','$phoneNo','$address')");

					if(!$query){
						$errors['customerInsertion'] = 'Problem with inserting data into customer';
						$mysqli -> rollback();//reverting to it's initial state if any error exists
					}

					$committed = $mysqli -> commit();//commiting the change to the database

					if(isset($errors['customerInsertion'])){
						$errors['registerError'] = 'Please fill up all fields and meet all conditions in order to register!';
					}

				}
				else{
					echo "<script>alert('Please fill all fields correctly before clicking on register')</script>";
					$errors['registerError'] = 'Please fill up all fields and meet all conditions in item to register!';
				}
			}
			else{
				echo "<script>alert('Please fill all fields before clicking on register')</script>";
				$errors['registerError'] = 'Please fill up all fields and meet all conditions in item to register!';
			}

			echo "<script>window.open('customer.php','_self')</script>";//makes the page reload to submitAd.php page
		}
	}
?>

<?php
	$mysqli = new mysqli('localhost','root','','thisDatabase');

	function loadCustomers(){
		global $mysqli;

		$query = $mysqli -> query("SELECT * FROM Customer");

		$rowCount = $query -> num_rows;

		if($rowCount > 0){
			while($row = $query -> fetch_assoc()){
				$customerID = $row['customerID'];
				$username = $row['username'];
				$email = $row['email'];
				$password = $row['password'];
				$lastName = $row['lastName'];
				$initials = $row['initials'];
				$phoneNo = $row['phoneNumber'];
				$address = $row['address'];
				$dateCreated = $row['dateCreated'];

				echo '<tr>';
					echo '<td>'.$username.'</td>';
					echo '<td>'.$email.'</td>';
					echo '<td>'.$password.'</td>';
					echo '<td>'.$lastName.' '.$initials.'</td>';
					echo '<td>'.$phoneNo.'</td>';
					echo '<td>'.$address.'</td>';
					echo '<td>'.$dateCreated.'</td>';
					echo '<td>';
						echo "<a href='customerDelete.php?customerID=$customerID' class='btn btn-danger'>Delete</a>";
					echo '</td>';
				echo '</ tr>';
			}
		}
	}	
?>
