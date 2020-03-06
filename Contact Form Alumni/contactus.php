<?php
session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli("localhost", "root", "", "login");



//the form has been submitted with post
if (isset($_POST['submit'])) {
    
        
        //set all the post variables
        $name = $mysqli->real_escape_string($_POST['name']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $phone = $mysqli->real_escape_string($_POST['phone']);
        $message = $mysqli->real_escape_string($_POST['message']);

         //insert user data into database
                $sql = "INSERT INTO contactus (name, email, phone, message) "
                        . "VALUES ('$name', '$email', '$phone', '$message')";
                
                //if the query is successsful, redirect to welcome.php page, done!
                if ($mysqli->query($sql) === true){
                    $_SESSION['message'] = "Thank you for you information";
                   header("location: thankyou.php");
                   }
               }

        $mysqli->close();

        $my = new mysqli("localhost", "root", "", "login");

        if(isset($_POST['report']))
        {
                $name = ($_POST['name1']);
                $rollno = ($_POST['rollno1']);
                $message = ($_POST['message1']);        

                $s="INSERT INTO reportUser VALUES (null,'$name','$rollno','$message')";

                if($my->query($s)===true)
                {
                        $_SESSION['message'] = "Thank you for reporting the user, the user will be reviewed and appropriate action will be taken";
                       header("location: thankyou.php");  
                }

        }


?>