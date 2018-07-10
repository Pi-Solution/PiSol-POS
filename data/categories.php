<?php
	session_start();
	
	//provjera da li je logovan
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	} else {
    	header("Location: ../index.php?empty");
	}

	include '../include/db.inc.php';

		//with this we chose what information we want from table
	$sql = "SELECT type, category_name FROM categories";
	$result = mysqli_query($conn, $sql);

	if ($result->num_rows == 0) {
		echo "0 result";
	}
    // output data of each row
    // set array
	$array = array();

	// look through query
	while($row = mysqli_fetch_assoc($result)){

		// add each row returned into an array
		$array[] = $row;

		// OR just echo the data:
			
		//echo $row['a_name'] . '</br>'; // etc
		
		$myJSON = json_encode($array);

	}	
	echo $myJSON;
?>