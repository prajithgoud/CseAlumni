<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$email='aghamarsh8@gmail.com';
$hash='12345';
$username='Aghamarsh';
$password="11223344";

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'alumnicseuceou@gmail.com';                 // SMTP username
    $mail->Password = 'uceoucse';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('alumnicseuceou@gmail.com', 'UCEOU, CSE ALUMNI ASSOCIATION');
    $mail->addAddress('aghamarsh8@gmail.com','Aghamarsh');     // Add a recipient
   
   // $mail->addAddress('ellen@example.com');               // Name is optional
   // $mail->addReplyTo('info@example.com', 'Information');
   // $mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Email verification for CSE Alumni Association';
    $mail->Body    = '
    <style>
.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 25px;
    text-align: center;
    font-size: 16px;
    cursor: pointer;
}

.button:hover {
    background-color: green;
}
</style>
<body>
   <p> Thanks for signing up for CSE Alumni Association!
    Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
     </p>
<br>
     <b>Please click on the "Verify Email" button to activate your account:<b>

        <br><br>
        <div style="text-align:center;" class="wrap">
        <button class="button" name="btn" value="Verify Email" href="http://localhost/verify.php?email='.$email.'&hash='.$hash.'>Verify Email</button>
        </div>
            

     If the above link does not work click on this link :  http://localhost/verify.php?m='.$email.'&w='.$hash.'
     </body>
    ';

    $mail->AltBody = '
    Thanks for signing up for CSE Alumni Association!
    Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
     
    ------------------------
    Username: '.$username.'
    Password: '.$password.'
    ------------------------
     
    Please click this link to activate your account:
    http://localhost/verify.php?m='.$email.'&w='.$hash.'
     
    This is a computer auto-generated email, please donot reply.
    For any Issues please report it on the Contact Us section on the CSE Alumni Association Website ';

    $mail->send();
     echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>