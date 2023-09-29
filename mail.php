<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\SMTP;
  require 'PHPMailer-master/src/Exception.php';
  require 'PHPMailer-master/src/PHPMailer.php';
  require 'PHPMailer-master/src/SMTP.php';

function send_mail($recipient,$subject,$message)
{


$mail = new PHPMailer;

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output
   
         $mail->isSMTP();                                      // Set mailer to use SMTP
          $mail->Host = 'here host name';  // Specify main and backup SMTP servers
          $mail->SMTPAuth = true;                               // Enable SMTP authentication
          $mail->Username = 'username';                 // SMTP username
          $mail->Password = 'password';                           // SMTP password
          $mail->SMTPSecure = 'none';                            // Enable TLS encryption, `ssl` also accepted
          $mail->Port = port number;                                    // TCP port to connect to
   
          $mail->From = 'From mail id';
          $mail->FromName = 'from name';
          $mail->addAddress($recipient,$recipient);     // Add a recipient
          //$mail->addAddress('akashak.nandhainfotech@gmail.com');               // Name is optional
          //$mail->addReplyTo('brother@gmail.com', 'Brother');
          $mail->isHTML(true);
                                    //$mail->isHTML(false);                                  // Set email format to HTML
   
                                   $mail->Subject = $subject;
  $content = $message;

  $mail->MsgHTML($content); 

   if($mail->send()) {
    echo "Error while sending Email.";
    //echo "<pre>";
    //var_dump($mail);
    return false;
  } else {
    echo "Email sent successfully";
    return true;
  }

}

?>