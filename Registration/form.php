<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli("localhost", "root", "", "login");

//the form has been submitted with post
if (isset($_POST['register'])) {
    
    //two passwords are equal to each other
    if ($_POST['password'] == $_POST['confirmpassword']) {
        
        //set all the post variables
        $firstname = $mysqli->real_escape_string($_POST['firstname']);
        $lastname = $mysqli->real_escape_string($_POST['lastname']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $bday = $mysqli->real_escape_string($_POST['bday']);
        $roll = $mysqli->real_escape_string($_POST['roll']);
        $grad = $mysqli->real_escape_string($_POST['grad']);
        $password = md5($_POST['password']); //md5 has password for security
       // $avatar_path = $mysqli->real_escape_string('images/'.$_FILES['avatar']['name']);
      /*  
        //make sure the file type is image
        if (preg_match("!image!",$_FILES['avatar']['type'])) {
            
            //copy image to images/ folder 
            if (copy($_FILES['avatar']['tmp_name'], $avatar_path)){
        */         
                //set session variables
                $avatar_path;
                $gender=$_POST['gender'];
                $course=$_POST['Course'];
                $hash=md5(rand(0,1000));

                if($gender=="M")
                {
                    $avatar_path="male.jpg";
                }
                else if($gender=="F"){
                    $avatar_path="female.jpg";
                }
                
                $_SESSION['username'] = $firstname;
                $_SESSION['avatar'] = $avatar_path;
                $gender=$_POST['gender'];
            
               $active=0;
                $address = '';
                $achieve='';
                $job='';
                $higher='';

                //insert user data into database
                $sql = "INSERT INTO alumni VALUES ('$firstname', '$lastname','$gender','$roll', '$email', '$avatar_path','$bday','$grad', '$course','$password','$hash','$active','$address','$achieve','$job','$higher')";
            
            //    $_SESSION['dispsql']=$sql;

                //if the query is successsful, redirect to welcome.php page, done!
                if ($mysqli->query($sql) === true){
                    $_SESSION['message'] = "Registration succesful! Added $firstname to the Alumni database!";
                    $_SESSION['msgemail']=$msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';
               
                $_SESSION['var']=0;
                
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'alumnicseuceou@gmail.com';                 // SMTP username
    $mail->Password = 'uceoucse';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('alumnicseuceou@gmail.com', 'UCEOU, CSE ALUMNI ASSOCIATION');
    $mail->addAddress($email,$firstname);     // Add a recipient
   
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
<body>
   <p> Thanks for signing up for CSE Alumni Association!
    Your account has been created, you can login with the following username after you have activated your account by pressing the url below.
     </p>            

     <p> Username: '.$firstname.'</p>

    <b> Click on this link to verify your email :</b>  http://localhost/Alumni/verify.php?m='.$email.'&w='.$hash.'
    
    This is a computer auto-generated email, please donot reply.
    For any Issues please report it on the Contact Us section on the CSE Alumni Association Website. 
</body>
    ';

    $mail->AltBody = '
    Thanks for signing up for CSE Alumni Association!
    Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
     
    ------------------------
    Username: '.$firstname.'
    Password: '.$password.'
    ------------------------
     
    Please click this link to activate your account:
    http://localhost/Alumni/verify.php?m='.$email.'&w='.$hash.'
     
    This is a computer auto-generated email, please donot reply.
    For any Issues please report it on the Contact Us section on the CSE Alumni Association Website ';

    $mail->send();
     echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
                }
                else {
                    $_SESSION['message'] = 'User could not be added to the database!';
                    $_SESSION['var']=0;
                    $_SESSION['msgemail']=$msg = '';
                }
                $mysqli->close();          
    }
    else {
        $_SESSION['message'] = 'Two passwords do not match!';
    }

    header('Location: welcome.php');
}
?>
