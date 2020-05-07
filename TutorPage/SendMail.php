<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'D:\webphp\xampp\ComposerS\vendor\autoload.php';

$mail = new PHPMailer(TRUE);

try {
   $name=$_POST['student'];
   $date=$_POST['date'];
   $nameT =$_POST['tutor'];

   
   $mail->setFrom('dannmgch16151@fpt.edu.vn', $nameT);
   $mail->addAddress($name, 'Emperor');

   $mail->Subject = 'Force';
   $mail->Body = 'We will have a meeting on this day'.$date.' https://meet.google.com/wsi-ksfc-kgm' ;
   
   /* SMTP parameters. */
   $mail->isSMTP();
   $mail->Host = 'smtp.gmail.com';
   $mail->SMTPAuth = TRUE;
   $mail->SMTPSecure = 'tls';
   $mail->Username = 'dannmgch16151@fpt.edu.vn';
   $mail->Password = 'Manhdan15021998';
   $mail->Port = 587;
   
   /* Disable some SSL checks. */
   $mail->SMTPOptions = array(
      'ssl' => array(
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => true
      )
   );
   
   /* Finally send the mail. */
   $mail->send();
   header('Location: MeetingSchedule.php');
}
catch (Exception $e)
{
   echo $e->errorMessage();
}
catch (\Exception $e)
{
   echo $e->getMessage();
}