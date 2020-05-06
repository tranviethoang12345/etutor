<?php 
	session_start();
	include '../Connection/Connection.php';
	$username = $_POST['userNameToLogin'];
	$password = $_POST['passwordToLogin'];
	$isMatchedAccount = false;
	$databaseResponse = ConnectToDatabase("SELECT * FROM Accounts");
	if ($databaseResponse->num_rows > 0) {
		while($row = $databaseResponse->fetch_assoc()) {
			if ($username == $row["username"] && $password == $row["password"]){
				$_SESSION['id'] = $row['id'];
				$_SESSION["username"] = $row["username"];
				ConnectToDatabase("INSERT INTO login_details(user_id)VALUES ('".$row['id']."')");
				goToHomePage($row["permission_level"]);
				break;
			}else{
				$_SESSION["errorWhenLogin"] = "Wrong username or password";
				header('Location: Login.php');
			}
		}
	} else {
		echo "0 results";
	}
	function goToHomePage($role){
		if($role == "student"){
			header('Location: ../StudentPage/index.php');
		}
		elseif ($role == "staff") {
			header('Location: ../StaffPage/index.php');
		}
		elseif ($role == "tutor") {
			header('Location: ../tutorPage/index.php');
		}
		
	}
?>