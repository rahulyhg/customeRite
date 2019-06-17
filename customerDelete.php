<!-- transcations -->
<?php
	if ($_SERVER['REQUEST_METHOD'] =='GET') {
		if(isset($_GET['customerID'])){
			$mysqli = new mysqli('localhost','root','','thisDatabase');

			$mysqli -> autocommit(false);

			$customerID = $_GET['customerID'];

			$query = $mysqli -> query("SELECT * FROM Orders WHERE customerID = ".$customerID);

			$rowCount = $query -> num_rows;

			if($rowCount > 0){
				echo "<script>alert('Customer cannot be deleted, customer has an order!')</script>";
			}
			else{
				// creating a transaction for customer row deletion
				$query = $mysqli -> query("DELETE FROM Customer WHERE customerID = ".$customerID);

				if(!$query){
					$mysqli -> rollback();//reverting to it's initial state if any error exists
				}

				$mysqli -> commit();//commiting the change to the database
			}
			
			echo "<script>window.open('customer.php','_self')</script>";//makes the page reload to submitAd.php page
		}
		else{
			echo "<script>alert('No customer has been selected!')</script>";
		}
	}
?>