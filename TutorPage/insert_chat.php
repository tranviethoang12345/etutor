
<?php

include '../Connection/Connection.php';

session_start();
$toid = $_POST['to_user_id'];
$id  = $_SESSION['id'];
$chat = $_POST['chat_message'];
$status = '1' ;


ConnectToDatabase("INSERT INTO chat_message(to_user_id, from_user_id, chat_message, status) VALUES ('".$toid."','".$id."', '".$chat."', '".$status."')" );

echo fetch_user_chat_history($_SESSION['id'], $_POST['to_user_id']) ;

?>