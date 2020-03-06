<?php 

$con =mysqli_connect("localhost","root","") or die("Unnable to connect");
mysqli_select_db($con, 'login');
   
    session_start();   
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['email']) and isset($_POST['password'])){
//3.1.1 Assigning posted values to variables.
$email = $_POST['email'];
$pass = md5($_POST['password']);
//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM alumni WHERE email='$email' and passcode='$pass'";
 
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1 ){
    $row=mysqli_fetch_assoc($result);

    if($row['active']==1)
    {
$_SESSION['email'] = $email;

header('Location: ../Registration/Profile/profile.php');
    }
}else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
$fmsg = "Invalid Login Credentials.";
echo $fmsg;
echo "<a href='login.html'>EXIT</a>";
}
}
?>