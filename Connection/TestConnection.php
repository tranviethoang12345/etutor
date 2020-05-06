<?php 
	include 'Connection.php';
	$databaseResponse = ConnectToDatabase("SELECT username, password FROM Login");
	if ($databaseResponse->num_rows > 0) {
		while($row = $databaseResponse->fetch_assoc()) {

			echo "id: " . $row["username"]. " - Name: " . $row["password"]. " " . $row["username"]. "<br>";
		}
	} else {
		echo "0 results";
	}

	// $noDatabaseResponse = ConnectToDatabase("DELETE FROM Login WHERE username='longphan'");
	// if ($noDatabaseResponse == true){
	// 	echo "xong";
	// }else{
	// 	echo "deo xong";
	// }
 ?>