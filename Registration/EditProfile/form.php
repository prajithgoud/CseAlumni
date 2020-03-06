<?php
session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli("localhost", "root", "", "login");



//the form has been submitted with post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
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

               
                //insert user data into database
                $sql = "INSERT INTO alumni VALUES ('$firstname', '$lastname','$gender','$roll', '$email', '$avatar_path','$bday','$grad', '$course','$password')";
                
                //if the query is successsful, redirect to welcome.php page, done!
                if ($mysqli->query($sql) === true){
                    $_SESSION['message'] = "Registration succesful! Added $firstname to the Alumni database!";
                  
                }
                else {
                    $_SESSION['message'] = 'User could not be added to the database!';
                }
                $mysqli->close();          
    }
    else {
        $_SESSION['message'] = 'Two passwords do not match!';
    }

    header('Location: welcome.php');
}
?>
