<?php
	if ($_SERVER['REQUEST_METHOD'] =='GET') {
		if(isset($_GET['orderID'])){

			include('html/header.html');
?>
	<div style="height: 30px"></div>
	<div class="container" style="height: inherit;">
		<div style="height: 440px;">
			<table class="table table-striped table-hover text-lowercase" style="word-spacing: 2px;letter-spacing: 2px;">
				<?php
					$mysqli = new mysqli('localhost','root','','thisDatabase');

					$orderID = $_GET['orderID'];

					$query = $mysqli -> query("SELECT * FROM Orders WHERE orderID = ".$orderID);

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
							$itemImage;

							// retrieving columns from customer table
							$query1 = $mysqli -> query("SELECT username, lastName, initials FROM customer WHERE customerID = ".$colCustId);
							$rowCount1 = $query1 -> num_rows;
							if($rowCount1 > 0){
								while($row1 = $query1 -> fetch_assoc()){
									$username = $row1['username'];
									$lastName = $row1['lastName'];
									$initials = $row1['initials'];

									if(!empty($username) || !isset($username)){
										// retrieving columns from item table 
										$query2 = $mysqli -> query("SELECT subjectID, descriptionID, iImage FROM Item WHERE itemID = ".$colitemId);
										$rowCount2 = $query2 -> num_rows;
										if($rowCount2 > 0){
											while($row2 = $query2 -> fetch_assoc()){
												$subjectID = $row2['subjectID'];
												$descriptionID = $row2['descriptionID'];
												$itemImage = $row2['iImage'];

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
											echo '<td colspan="4">';
												echo '<img src="images/items/"'.$itemImage.'" class="image-responsive" />';
											echo '</td>';
										echo '</tr>';

										// $arrayList = array(

										// );
										echo '<tr>';
											echo '<td class="text-left text-header" colspan="2" style="color: black;font-size: 25px;font-weight: bold;">';
												echo 'User name ';
											echo '</td>';
											echo '<td class="text-left lead" colspan="2" class="text-header" style="color: black;font-size: 23px;">';
												echo $username;
											echo '</td>';
										echo '</tr>';

										echo '<tr>';
											echo '<td class="text-left text-header" colspan="2" style="color: black;font-size: 25px;font-weight: bold;">';
												echo 'Name ';
											echo '</td>';
											echo '<td class="text-left lead" colspan="2" class="text-header" style="color: black;font-size: 23px;">';
												echo $lastName.'   '.$initials;
											echo '</td>';
										echo '</tr>';

										echo '<tr>';
											echo '<td class="text-left text-header" colspan="2" style="color: black;font-size: 25px;font-weight: bold;">';
												echo 'Item ';
											echo '</td>';
											echo '<td class="text-left lead" colspan="2" class="text-header" style="color: black;font-size: 23px;">';
												echo 'Subject: '.$subjectTitle.' | Description: '.$descTitle;
											echo '</td>';
										echo '</tr>';

										echo '<tr>';
											echo '<td class="text-left text-header" colspan="2" style="color: black;font-size: 25px;font-weight: bold;">';
												echo 'Date of order ';
											echo '</td>';
											echo '<td class="text-left lead" colspan="2" class="text-header" style="color: black;font-size: 23px;">';
												echo $colOrderDate;
											echo '</td>';
										echo '</tr>';

										echo '<tr>';
											echo '<td class="text-left text-header" colspan="2" style="color: black;font-size: 25px;font-weight: bold;">';
												echo 'Payment ';
											echo '</td>';
											echo '<td class="text-left lead" colspan="2" class="text-header" style="color: black;font-size: 23px;">';
												echo $colPayment;
											echo '</td>';
										echo '</tr>';

										echo '<tr>';
											echo '<td class="text-left text-header" colspan="2" style="color: black;font-size: 25px;font-weight: bold;">';
												echo 'Total price ';
											echo '</td>';
											echo '<td class="text-left lead" colspan="2" class="text-header" style="color: black;font-size: 23px;">';
												echo $coltotalPrice;
											echo '</td>';
										echo '</tr>';

										echo '<tr>';
											echo '<td class="text-left text-header" colspan="2" style="color: black;font-size: 25px;font-weight: bold;">';
											echo '</td>';
											echo '<td class="text-left lead" colspan="2" class="text-header" style="color: black;font-size: 23px;">';
												echo "<a href='order.php' class='btn btn-primary' style='width:inherit;'>Back To List</a>";
											echo '</td>';
										echo '</tr>';
									}
								}
							}
						}
					}
				?>
			</table>
		</div>
		<div style="height: 30px"></div>
	</div>

<?php
		include('html/footer.html');

		}
		else{
			echo "<script>window.open('order.php','_self')</script>";
		}
	}
?>
