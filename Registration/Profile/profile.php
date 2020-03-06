<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "login");
$email=$_SESSION['email'];
$sql="SELECT * FROM alumni WHERE email='$email'";

$s=$mysqli->query($sql);
$row=$s->fetch_assoc();

$_SESSION['username']=$row['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>

   <link rel="stylesheet" type="text/css" href="bootstrap.css">
  <link rel="stylesheet" type="text/css" href="nav.css">
 <link rel="stylesheet" type="text/css" href="all.css">
  <script type="text/javascript" src="all.js"></script>

<title>User Profile</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}

body {
    font-family: rabelo;
    margin: 0;
    min-width:405px;
        min-height: 100vh;
        background-image: url("bnet-bg.jpg");
        background-size: cover; 
        overflow: 0px;
        padding-bottom: 1px;
        background-attachment: fixed;
        background-repeat: no-repeat;
}

/* Style the header */
.header {
    padding: 10px;
    text-align: center;
    background: #1abc9c;
    color: white;
}

/* Increase the font size of the h1 element */
.header h1 {
    font-size: 30px;
}

/* Style the top navigation bar */
.navbar {
    overflow: hidden;
    background-color: #333;
}

/* Style the navigation bar links */
.navbar a {
    float: left;
    display: block;
    color: white;
    text-align: center;
    padding: 14px 20px;
    text-decoration: none;
}

/* Right-aligned link */
.navbar a.right {
    float: right;
}

/* Change color on hover */
.navbar a:hover {
    background-color: #ddd;
    color: black;
}

/* Column container */
.row {  
    display: flex;
    flex-wrap: wrap;
}

/* Create two unequal columns that sits next to each other */
/* Sidebar/left column */
.side {
    flex: 22%;
    background-color: rgba(0, 0, 0, 0.25);
    padding: 71px;
}

/* Main column */
.main {   
    flex: 70%;
   background-color: rgba(0, 0, 0, 0.39);
    padding: 71px;
}

/* Fake image, just for this example */
.fakeimg {
    background-color: #aaa;
    width: 100%;
    padding: 20px;
}

/* Footer */
.footer {
    padding: 5px;
    text-align: center;
    background: #ddd;
}

/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 700px) {
    .row {   
        flex-direction: column;
    }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
    .navbar a {
        float: none;
        width:100%;
    }
}

.btn {
  float: right;
  background-color: black;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 1;
  transition: 0.3s;
  margin-right: 110px;
}

.btn:hover {opacity: 0.6}

.image{
    padding:20px;
}




</style>

<?php $imgsrc=$row['avatar'];?>

</head>
<body>
<nav id="nav" class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-nav-demo" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      <img class="navbar-brand text-center center-block" id="img" style="width: 110px" src="logo2.png">

    

        <a href="#" id="name1"  class="navbar-brannd"><font face="rabelo" size=6><b>OU CSE Alumni Association</b></font></a>
      </div>
      <div class="collapse navbar-collapse" id="bs-nav-demo">
        
        <ul id="ab" class="nav navbar-nav navbar-right">
          <li><a href="..\..\Home\home.html">Home &nbsp;<i class="fas fa-home"></i></a></li>
          <li><a href="..\..\AboutUs\aboutus.html">About  &nbsp;<i class="fas fa-info"></i></a></li>
          <li><a href="..\..\Login\login.html">Login  &nbsp;<i class="fas fa-sign-in-alt"></i></a></li>
          <li><a href="..\..\gallery\gallery.html">Gallery  &nbsp;<i class="far fa-images"></i></a></li>
          <li id="login"></li>
        </ul>
      </div>
    </div>
  </nav>


<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


<br> <br> <br> 
<br> <br> <br> 

<div class="row">
  <div class="side">
      <h2>Welcome <?php echo $row['username']; ?></h2> <br>
      <div class="image" style="height:200px; width:300px;" ><img  style="height:200px; width:200px;" src='<?php echo $imgsrc;?>'></div>
      <br>
      <p><b>Username: <?php echo $row['username'];?> </p>
      <p>Email id: <?php echo $row['email'];?> </p>
      <p>Year of Graduation:<?php echo $row['grad'];?></p>
      <p>Rool Number:<?php echo $row['rollno'];?></p>  
    </b>
    <br>
    <button class="btn"><a href="..\EditProfile\editprofile.html">Edit info</a></button>
    <button class="btn">Logout</button>
      
  </div>
  <div class="main">
      <h2>Messages</h2>
      <div class="fakeimg" style="height:200px;">
      <?php 
      if($_SESSION['message'] != NULL)
      echo $_SESSION['message'];
      ?>
      </div>
      <br>
      <br>
      
      <h2>News and Updates</h2>
      <div class="fakeimg" style="height:200px;">Image</div>


</div>
</div>

</body>
</html>
