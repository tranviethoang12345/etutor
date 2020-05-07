<?php

//fetch_user.php

include '../Connection/Connection.php';

session_start();
$dataMess = ConnectToDatabase("SELECT * from Tutor_Information where id =(select tutor_id from Classrooms where student_id = '".$_SESSION['id']."'  order by id DESC limit 1)");
    $output = '
    <table class="table table-bordered table-striped">
     <tr>
      <td>Username</td>
     
      <td>Action</td>
     </tr>
    ';
        if ($dataMess->num_rows > 0) {
           $arr_Mess =  $dataMess->fetch_all(MYSQLI_ASSOC);
              foreach($arr_Mess as $row) {
                   $status = '';
                   $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
                   $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
                   $user_last_activity = fetch_user_last_activity($row['id']);
                   if($user_last_activity > $current_timestamp)
                   {
                    $status = '<span class="label label-success">Online</span>';
                   }
                   else
                   {
                    $status = '<span class="label label-danger">Offline</span>';
                   }
                   $output .= '
                   <tr>
                    <td>'.$row['fullname'].'</td>
                    <td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['id'].'" data-tousername="'.$row['fullname'].'">Start Chat</button></td>
                   </tr>
                   ';
                    }
              }

$output .= '</table>';

echo $output;

?>