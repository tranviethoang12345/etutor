<?php
session_start();
    $servername = "sql12.freemysqlhosting.net";
	$database = "sql12343107";
	$username = "sql12343107";
	$password = "ZZLeE1PWcd";
	
    $conn = mysqli_connect($servername, $username, $password, $database);



if (isset($_POST['save'])) { // if save button on the form is clicked
    $tutor = $_POST['idTutor'];
    $student = $_SESSION['id'];
    $description = $_POST['Description'];
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = '../uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 8196000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO files(idStudent,idtutor,Description,name, size, downloads) VALUES ('$student','$tutor','$description','$filename', $size, 0)";
         
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";
                header('Location: uploadFile.php');
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}
?>