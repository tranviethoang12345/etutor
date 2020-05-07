<?php
 $servername = "sql12.freesqldatabase.com";
    $database = "sql12338369";
    $username = "sql12338369";
    $password = "tTas7Lqynd";
    $conn = mysqli_connect($servername, $username, $password, $database);
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
if(isset($_POST['id'])&&isset($_POST['comment'])) {
$id = $_POST['id'];
$cmt= $_POST['comment'];

$updateQuery = " UPDATE files SET Comments='$cmt' WHERE id=$id ";
        mysqli_query($conn, $updateQuery);
  header('Location: uploadFile.php');
}



  ?>
