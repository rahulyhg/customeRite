<!-- transcations -->
<?php
	$mysqli = new mysqli('localhost','root','','thisDatabase');

	if ($_SERVER['REQUEST_METHOD'] =='POST') {
		if(isset($_POST['register'])){
			$errors = array();//sql and form input erros store

			$customer ;
			$item ;
			$itemDate ;
			$payment ;
			$totalPrice ;

			if(!isset($_POST['customer']) || empty($_POST['customer'])){
				$errors['customer1'] = 'customer cannot be empty';
			}
			if(!isset($_POST['item']) || empty($_POST['item'])){
				$errors['item1'] = 'item cannot be empty';
			}
			if(!isset($_POST['orderDate']) || empty($_POST['orderDate'])){
				$errors['orderDate1'] = 'orderDate cannot be empty';
			}
			if(!isset($_POST['payment']) || empty($_POST['payment'])){
				$errors['payment1'] = 'payment cannot be empty';
			}
			if(!isset($_POST['totalPrice']) || empty($_POST['totalPrice'])){
				$errors['totalPrice1'] = 'Total price cannot be empty';
			}

			if(count($errors) == 0){
				$customer = $_POST['customer'];
				$item = $_POST['item'];
				$orderDate = $_POST['orderDate'];
				$payment = $_POST['payment'];
				$totalPrice = $_POST['totalPrice'];

				global $mysqli;

				$mysqli -> autocommit(false);

				// creating a transaction for customer table insertion
				$query = $mysqli -> query("INSERT INTO Orders (customerID,itemID,Payments,dateOfOrder,totalPrice) VALUES ('$customer','$item','$payment','$orderDate','$totalPrice')");

				if(!$query){
					$errors['itemInsertion'] = 'Problem with inserting data into customer';
				}

				if(isset($errors['itemInsertion'])){
					$mysqli -> rollback();//reverting to it's initial state if any error exists
					$errors['registerError'] = 'Please fill up all fields and meet all conditions in item to register!';
				}

				$mysqli -> commit();//commiting the change to the database
			}
			else{
				echo "<script>alert('Please fill all fields before clicking on register')</script>";
				$errors['registerError'] = 'Please fill up all fields and meet all conditions in item to register!';
			}

			echo "<script>window.open('order.php','_self')</script>";//makes the page reload to submitAd.php page
		}
	}
?>

<?php
	$mysqli = new mysqli('localhost','root','','thisDatabase');

	//retrieving the list of customers 
	function selectCustomers(){
		global $mysqli;

		$query = $mysqli -> query("SELECT customerID, username, lastName FROM Customer");

		$rowCount = $query -> num_rows;

		if($rowCount > 0){
			while($row = $query -> fetch_assoc()){
				$rowId = $row['customerID'];
				$rowuser =  $row['username'];
				$rowlastName =  $row['lastName'];
		
				echo '<option value="'.$rowId.'" data-tokens="'.$rowuser.'">';
					echo $rowuser.' | Lastname: '.$rowlastName;
				echo '</ option>';
			}
		}
	}

	// retrieving list of items
	function selectItems(){
		global $mysqli;

		$query = $mysqli -> query("SELECT itemID, subjectID, descriptionID FROM Item");

		$rowCount = $query -> num_rows;

		if($rowCount > 0){
			while($row = $query -> fetch_assoc()){
				$colId = $row['itemID'];
				$colsubID =  $row['subjectID'];
				$coldescID =  $row['descriptionID'];
				$subjectTitle;
				$descTitle;

				// retrieving title from subject table 
				$query3 = $mysqli -> query("SELECT title FROM Subject WHERE subjectID = ".$colsubID);
				$rowCount3 = $query3 -> num_rows;
				if($rowCount3 > 0){
					while($row3 = $query3 -> fetch_assoc()){
						$subjectTitle = $row3['title'];
					}
				}

				// retrieving title from description table 
				$query4 = $mysqli -> query("SELECT title FROM Description WHERE descriptionID = ".$coldescID);
				$rowCount4 = $query4 -> num_rows;
				if($rowCount4 > 0){
					while($row4 = $query4 -> fetch_assoc()){
						$descTitle = $row4['title'];
					}
				}
		
				echo '<option value="'.$colId.'" data-tokens="'.$subjectTitle.'">';
					echo 'Description: '.$descTitle.' | Subject: '.$subjectTitle;
				echo '</ option>';
			}
		}
	}

	//read and display orders from database
	function loadOrders(){
		global $mysqli;
		
		$query = $mysqli -> query("SELECT * FROM Orders");

		$rowCount = $query -> num_rows;

		if($rowCount > 0){
			while($row = $query -> fetch_assoc()){
				$rowId = $row['orderID'];
				$colCustId = $row['customerID'];
				$colitemId = $row['itemID'];
				$colPayment =  $row['Payments'];
				$colOrderDate =  $row['dateOfOrder'];
				$coltotalPrice =  $row['totalPrice'];

				$username;
				$lastName;
				$initials;
				$subjectTitle;
				$descTitle;

				// retrieving columns from customer table
				$query1 = $mysqli -> query("SELECT username, lastName, initials FROM customer WHERE customerID = ".$colCustId);
				$rowCount1 = $query1 -> num_rows;
				if($rowCount1 > 0){
					while($row1 = $query1 -> fetch_assoc()){
						$username = $row1['username'];
						$lastName = $row1['lastName'];
						$initials = $row1['initials'];

						// retrieving columns from item table 
						$query2 = $mysqli -> query("SELECT subjectID, descriptionID FROM Item WHERE itemID = ".$colitemId);
						$rowCount2 = $query2 -> num_rows;
						if($rowCount2 > 0){
							while($row2 = $query2 -> fetch_assoc()){
								$subjectID = $row2['subjectID'];
								$descriptionID = $row2['descriptionID'];

								// retrieving title from subject table 
								$query3 = $mysqli -> query("SELECT title FROM Subject WHERE subjectID = ".$subjectID);
								$rowCount3 = $query3 -> num_rows;
								if($rowCount3 > 0){
									while($row3 = $query3 -> fetch_assoc()){
										$subjectTitle = $row3['title'];
									}
								}

								// retrieving title from description table 
								$query4 = $mysqli -> query("SELECT title FROM Description WHERE descriptionID = ".$descriptionID);
								$rowCount4 = $query4 -> num_rows;
								if($rowCount4 > 0){
									while($row4 = $query4 -> fetch_assoc()){
										$descTitle = $row4['title'];
									}
								}
							}
						}

						echo '<tr>';
							echo '<td>'.$colCustId.'</td>';
							echo '<td>'.$username.'</td>';
							echo '<td>'.$lastName.' '.$initials.'</td>';
							echo '<td> Subject: '.$subjectTitle.' | Description: '.$descTitle.'</td>';
							echo '<td>'.$colOrderDate.'</td>';
							echo '<td>'.$colPayment.'</td>';
							echo '<td>'.$coltotalPrice.'</td>';
							echo '<td>';
								echo '<a href=orderDetails.php?orderID="'.$rowId.'" class="btn btn-primary">Details</a>';
							echo '</td>';
						echo '</ tr>';
					}
				}
			}
		}
	}
?>
