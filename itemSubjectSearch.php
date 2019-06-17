<?php
	$mysqli = new mysqli('localhost','root','','thisDatabase');

	//read and display Items from database
	function loadItems(){
		global $mysqli;

		$rowtitleSub;
		$rowSubId ;

		// retrieving title from Subject table
		$query1 = $mysqli -> query("SELECT subjectID, title FROM Subject WHERE title LIKE '%".$_POST["search"]."%'");

		$rowCount1 = $query1 -> num_rows;

		if($rowCount1 > 0){
			while($row1 = $query1 -> fetch_assoc()){
				$rowSubId = $row1['subjectID'];
				$rowtitleSub = $row1['title'];

				$query = $mysqli -> query("SELECT * FROM Item WHERE SubjectID = ".$rowSubId);
				$rowCount = $query -> num_rows;
				if($rowCount > 0){
					while($row = $query -> fetch_assoc()){
						$rowId = $row['itemID'];
						$rowDescId = $row['descriptionID'];
						$rowdateRel =  $row['dateReleased'];

						$rowtitleDesc;

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
							// echo '<td>';
							// 	echo '<label class="checkbox"><input type="checkbox" name="checkBox" value="'.$rowId.'"></label>';
							// echo '</td>';
							echo '<td>'.$rowtitleSub.'</td>';
							echo '<td>'.$rowtitleDesc.'</td>';
							echo '<td>'.$rowdateRel.'</td>';
							// echo '<td>';
							// 	echo '<input type="submit" name="'.$rowId.'" value="Update" class="btn btn-success"/>';
							// echo '</td>';
							// echo '<td>';
							// 	echo '<input type="submit" name="'.$rowId.'" value="Delete" class="btn btn-danger"/>';
							// echo '</td>';
						echo '</ tr>';
					}
				}
			}
		}
		else{
			echo "Data Not Found";
		}
	}

	loadItems();
?>