<!-- to display the columns  in the Description table -->
<?php
	$mysqli = new mysqli('localhost','root','','thisDatabase');

	//read and display orders from database
	function loadDescription(){
		global $mysqli;
		
		$query = $mysqli -> query("SELECT * FROM Description");

		$rowCount = $query -> num_rows;

		if($rowCount > 0){
			while($row = $query -> fetch_assoc()){
				$rowId = $row['descriptionID'];
				$title = $row['title'];

				echo '<tr>';
					echo '<td colspan="4">'.$rowId.'</td>';
					echo '<td colspan="4">'.$title.'</td>';
					// echo '<td>'.$coltotalPrice.'</td>';
					echo '<td colspan="4">';
						echo "<a href='descriptionUpdate.php?descriptionID=$rowId' class='js-scroll-trigger btn btn-success updateDesc'>Update</a>";
					echo '</td>';
				echo '</ tr>';
			}
		}
	}
?>