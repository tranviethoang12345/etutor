<?php
include '../Connection/Connection.php';
if(isset($_GET['id'])){
$id=$_GET['id'];

ConnectToDatabase("DELETE FROM classrooms WHERE id = '".$id."' "); 
header('Location: Allocation.php');
}
?>