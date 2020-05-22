<?php
session_start();
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'mesh';

  //Create Connection
  $conn = new mysqli ($servername,$username,$password,$database);

  //Check Connection
  if($conn->connect_error)
  {
      echo "MySQL Connection Error";
  }

 ?>

<!DOCTYPE html>
<html>

<head>

    <title>MESH | ADMIN_LOG </title>
    <link rel="stylesheet" type="text/css" href="css/Admin_log.css">
    <link rel="icon" type="image" href="images/zq.png">
    <script src="JS/Admin_log.js"></script>


</head>


<header>
    <div class="head">
        <div>
            <img src="images/b.png" id="logo_timetable" width="200px" style="z-index: 10" alt="LOGO">
        </div>

        <div>
            <h1 id="Header">MESH | TIME TABLE MANAGEMENT SYSTEM</h1>
        </div>

        <div class="header_box">

            <div id="box1">

                <a href="log.php"><img src="images/login.png" alt="AVATAR" width="100px" id="Header_logo"></a>

            </div>

            <div id="box2">

                <h1><a href="log.php" id="Login">LOGIN</a></h1>

            </div>

        </div>

    </div>
</header>

<body>
    <div id="navigation_bar">
        <div id="navi1" style="z-index: -1;"> </div>
        <div id="navi2">
            <ul class="nav">
                <a href="index.php">
                    <li>HOME</li>
                </a>
                <a href="admin.php">
                    <li>MY PROFILE</li>
                </a>
                <a href="contact.php">
                    <li>CONTACT US</li>
                </a>
                <a href="About.php">
                    <li>ABOUT US</li>
                </a>
            </ul>
        </div>

    </div>
    <div class="Admin_log_bod">
        <div>
            <form method="post" action="" onsubmit="return validate()">
                <h1 style="color: white;margin-bottom: 50px ">ADMINISTRATOR LOGIN</h1>
                <form onsubmit="return validate()">
                    <input class="inputBox" type="text" placeholder="userid" name="userid" id="userid">
                    <br>
                    <input class="inputBox" type="password" placeholder="Password" name="password" id="password">
                    <br>
                    <input type="submit" class="btn" name="submit">
                    <br>
                </form>

                <?php

                if(isset($_POST['submit']))
                {
                    $userid = $_POST['userid'];
                    $pwd = $_POST['password'];
                    $query = "SELECT *FROM admin WHERE userID = '$userid' && AdminPassword ='$pwd' ";
                    $data = mysqli_query($conn,$query);
                    $total = mysqli_num_rows($data);
                    echo $total;

                    if($total == 1)                                        
                    {   
                        $_SESSION['userName'] = $userid;
                        header('location:admin.php');
                    }
                }

                ?>

        </div>
    </div>
</body>


<footer>
    <div class="foot">
        <div>
            <div class="allrights">
                <h3 id="Foot_copyright" style="display: inline">Copyright 2019 @ MESH. All Rights Reserved.</h3>
                <img class="iconF1" src="Images/callBlue.png" style="display:inline">
                <p class="linkF" style="display:inline">011 23423453</p>
                <img class="iconF1" src="Images/webBlue.png" style="display:inline">
                <p class="linkF" style="display:inline">www.mesh.lk</p>
                <img class="iconF1" src="Images/placeBlue.png" style="display:inline">
                <p class="linkF" style="display:inline">MESH, Kandy Road, Malabe</p>
            </div>

        </div>

        <div>

            <div>

                <a href="https://www.facebook.com"><img id="fb" class="iconF" alt="Facebook" src="Images/facebook.png" onmouseout="this.src='images/facebook.png'" onmouseover="this.src='images/facebookO.png'"></a>
                <a href="https://www.youtube.com"><img id="yt" class="iconF" alt="YouTube" src="Images/youtube.png" onmouseover="this.src='images/youtubeO.png'" onmouseout="this.src='images/youtube.png'"></a>
                <a href="https://twitter.com"><img id="tw" class="iconF" alt="Twitter" src="Images/twitter.png" onmouseover="this.src='images/twitterO.png'" onmouseout="this.src='images/twitter.png'"></a>
                <a href="https://www.instagram.com"><img id="in" class="iconF" alt="Instagram" src="Images/instagram.png" onmouseover="this.src='images/instagramO.png'" onmouseout="this.src='images/instagram.png'"></a>

            </div>

        </div>


    </div>
</footer>


</html>