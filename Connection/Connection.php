<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
function ConnectToDatabase($sqlCommand){
	
	$servername = "127.0.0.1";
	$database = "project";
	$username = "root";
	$password = "";
	
	$conn = mysqli_connect($servername, $username, $password, $database);
		
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$sql = $sqlCommand;
	$result = $conn->query($sql);
	echo $conn->error;
	$conn->close();
	return $result;
}
function fetch_user_last_activity($id)
{
 $data =ConnectToDatabase("SELECT * FROM login_details WHERE user_id = '$id' ORDER BY last_activity DESC LIMIT 1");
	if ($data->num_rows > 0) {
           $result =  $data->fetch_all(MYSQLI_ASSOC);
			 foreach($result as $row)
			 {
			  return $row['last_activity'];
 				}
}
}





function fetch_user_chat_history($from_user_id, $to_user_id)
{
 $data =ConnectToDatabase( "SELECT * FROM chat_message WHERE (from_user_id = '".$from_user_id."' AND to_user_id = '".$to_user_id."') OR (from_user_id = '".$to_user_id."' AND to_user_id = '".$from_user_id."') ORDER BY timestamp DESC
 ");
if ($data->num_rows > 0) {
           $result =  $data->fetch_all(MYSQLI_ASSOC);
 $output = '<ul class="list-unstyled">';
 foreach($result as $row)
 {
  $user_name = '';
  if($row["from_user_id"] == $from_user_id)
  {
   $user_name = '<b class="text-success">You</b>';
  }
  else
  {
   $user_name = '<b class="text-danger">'.get_user_name($row['from_user_id']).'</b>';
  }
  $output .= '
  <li style="border-bottom:1px dotted #ccc">
   <p>'.$user_name.' - '.$row["chat_message"].'
    <div align="right">
     - <small><em>'.$row['timestamp'].'</em></small>
    </div>
   </p>
  </li>
  ';
 }
 $output .= '</ul>';
ConnectToDatabase ("UPDATE chat_message SET status = '0' WHERE from_user_id = '".$to_user_id."' AND to_user_id = '".$from_user_id."' AND status = '1'");
 return $output;
}
}

function get_user_name($user_id)
{
$data =ConnectToDatabase( "SELECT username FROM Accounts WHERE id = '$user_id'");
	if ($data->num_rows > 0) {
           $result =  $data->fetch_all(MYSQLI_ASSOC);
		 foreach($result as $row)
		 {
		  return $row['username'];
		 }
		}
}

function count_unseen_message($from_user_id, $to_user_id )
{
 $sql=ConnectToDatabase("
 SELECT * FROM chat_message 
 WHERE from_user_id = '$from_user_id' 
 AND to_user_id = '$to_user_id' 
 AND status = '1'
 ");
 $output = '';

 //if($sql->num_rows > 0) {
 // $count = $sql->rowCount();
//	 if($count > 0)
	// {
	//  $output = '<span class="label label-success">'.$count.'</span>';
	// }
 return $output;
//}
}
?>

