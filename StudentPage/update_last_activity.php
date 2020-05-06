<?php

//update_last_activity.php

include '../Connection/Connection.php';

session_start();
ConnectToDatabase("UPDATE login_details SET last_activity = now() WHERE login_details_id = '".$_SESSION["login_details_id"]."'");

?>