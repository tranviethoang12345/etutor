<?php 
	include '../Connection/Connection.php';
	session_start();
	$tutorId = $_POST["TutorId"];
	$studentId = $_POST["student"];
	echo $studentId;
	foreach ($_POST['student'] as $select)
	{
	ConnectToDatabase("INSERT INTO Classrooms(student_id,tutor_id) VALUES ('".$select."', '".$tutorId."')"); 
         header('Location: Allocation.php'); 
	}
	//ConnectToDatabase("INSERT INTO Classrooms(student_id,tutor_id) VALUES ('".$studentId."', '".$tutorId."')"); 
       //  header('Location: Allocation.php'); 
	// $className = $_SESSION["className"];'".$first_name."'
	// $subjectId = $_SESSION["subjectId"];
	
	// ConnectToDatabase("INSERT INTO Classrooms (name, subject_id, tutor_id) VALUES ('$className', $subjectId, $tutorId)");
?>