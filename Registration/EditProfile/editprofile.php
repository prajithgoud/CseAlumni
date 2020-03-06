<?php
session_start();
$_SESSION['message'] = '';
$name=$_SESSION['username'];
$mysqli = new mysqli("localhost", "root", "", "login");

$email=$_SESSION['email'];
$sql="SELECT * FROM alumni WHERE email='$email'";

$s=$mysqli->query($sql);
$row=$s->fetch_assoc();
$name=$row['username'];

if(isset($_POST['register']))
{   
    if($_POST['firstname']!=NULL)
    $firstname = $_POST['firstname'];
    else
    $firstname=$row['username'];

    if($_POST['lastname']!=NULL)
    $lastname = $_POST['lastname'];
    else
    $lastname=$row['lastName'];

    if($_POST['bday']!=NULL)
    $DOB = $_POST['bday'];
    else
    $DOB = $row['bday'];

    if($_POST['gender']!=NULL)
    $gender = $_POST['gender'];
    else
    $gender=$row['gender'];

    if($_POST['Course']!=NULL)
    $course = $_POST['Course'];
    else
    $course = $row['course'];

    if($_POST['roll']!=NULL)
    $rollNo = $_POST['roll'];
    else
    $rollNo= $row['rollno'];
    
    if($_POST['grad']!=NULL)
    $yearofGrad = $_POST['grad'];
    else 
    $yearofGrad = $row['grad'];
    
    if($_POST['ra']!=NULL)
    $add  = $_POST['ra'];
    else
    $add = $row['Address'];
    
    if($_POST['acheivements']!=NULL)
    $achievements = $_POST['acheivements'];
    else
    $achievements = $row['achievements'];

    if($_POST['studies']!=NULL)
    $higherStudies = $_POST['studies'];
    else
    $higherStudies = $row['higherStudies'];

    if($_POST['app']!=NULL)
    $job = $_POST['app'];
    else
    $job = $row['job'];


    $gender=$_POST['gender'];

    if($_SESSION['username']==$row['username'])
    {
                //insert user data into database
        $sql = "UPDATE `alumni` SET `username`='$firstname',`lastName`='$lastname',`gender`='$gender',`rollno`='$rollNo',`bday`='$DOB',`grad`='$yearofGrad',`course`='$course',`Address`='$add',`achievements`='$achievements',`job`='$job',`higherStudies`='$higherStudies' WHERE email='$email'";        
        //if the query is successsful, redirect to welcome.php page, done!
        if ($mysqli->query($sql)==true){
             $_SESSION['message'] = "Data Updated Successfully";              
        }
        else {
            $_SESSION['message'] = $sql;
        }
        $mysqli->close();          
    }
    else {
        $_SESSION['message'] = 'Please login to update your details';
    }

    header('Location: ../Profile/profile.php');
}
?>
