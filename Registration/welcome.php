<link rel="stylesheet" href="form.css">
<?php session_start();
 ?>
<div class="body content">
    <div class="welcome">
        <div class="alert alert-success"><?= $_SESSION['message'] ?>
        </div>  
        <div class="statusmsg"><?=$_SESSION['msgemail'];?>
        </div> 
        
         
        <img style="height:200px; width:200px;" src="<?= $_SESSION['avatar'] ?>"><br />
        Welcome <span class="user"><?= $_SESSION['username'] ?></span>
        <?php

        $mysqli = new mysqli("localhost", "root", "", "login");
        //Select queries return a resultset
        $sql = "SELECT username, avatar FROM alumni";
        $result = $mysqli->query($sql); //$result = mysqli_result object
        //var_dump($result);
        ?>
        &emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp; 
        <?php
        if($_SESSION['var'] == 1)
        {
            echo '<a href="..\Login\login.html">CLICK HERE</a> TO LOGIN TO YOUR ACCOUNT';
        }

        //echo $_SESSION['dispsql'];
        ?>
        
        <div id='registered'>
        <span>Alumni registered from your batch:</span>

        <?php
        while($row = $result->fetch_assoc()){ //returns associative array of fetched row
            //echo '<pre>';
            //print_r($row);
            //echo '</pre>';
            echo "<div class='userlist'><span>$row[username]</span><br />";
            echo "<img src='$row[avatar]'></div>";
        }
        ?>  
        </div>
    </div>
</div>
