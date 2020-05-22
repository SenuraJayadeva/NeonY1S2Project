

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




require 'PHP/config.php';

if (isset($_SESSION['userName'])) {
  $link = "userProfileStu.php";
  $userID = $_SESSION['userName'];
  if (strpos($userID, 'LEC') !== false) {
      $proTable = 'Lecturer';
  } else if (strpos($userID,'AD') !== false) {
      $proTable = 'Admin';
  } else if (strpos($userID,'IT') !== false) {
      $proTable = 'Student';
  }

  $userID = $_SESSION['userName'];
  $resultPic = $con -> query("SELECT * FROM $proTable WHERE userId='$userID'") OR die(mysqli_error());
if (mysqli_num_rows($resultPic) > 0) {
       while ($row2 = mysqli_fetch_array($resultPic)) {
          $avatar = $row2['ProfilePic'];
       }
   }
} else {
  $link = "log.php";
  $avatar = "images/user.png";
}

error_reporting(0);
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


$userprofile = $_SESSION['user_id'];
$query = "SELECT *FROM admin WHERE AdminID = '$userprofile' ";
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);


 ?> 
 
<!DOCTYPE html>
<html>

<head>
    <link rel="StyleSheet" type="text/css" href="css/styleSheet.css">
    <title>MESH | HOME</title>
    <link rel="icon" href="Images/zq.png">
</head>



<header>
    <div class="head">
        <div>
            <img src=" Images/logo.png" id="logo_timetable" width="200px" class="center" alt="LOGO">
        </div>

        <div>
            <h1 id="Header">MESH | TIME TABLE MANAGEMENT SYSTEM</h1>
        </div>

        <div class="header_box">

            <div id="box1">

                <a href="<?php echo $link?>"><img src="<?php echo $avatar ?>" alt="AVATAR" width="100px" id="Header_logo"></a>

            </div>
            <div id="box2">

                <h1><a href="" id="Login">LOGIN</a></h1>

            </div>`

        </div>

    </div>

</header>


<div id="navigation_bar">
    <div id="navi1" style="z-index: -1;"> </div>
    <div id="navi2">
        <ul class="nav">
            <a href="index.php">
                <li>HOME</li>
            </a>
            <a href="userProfileStu.php">
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
    <div id="navi3">
        <ul class="nav2">
            <?php
                if (isset($_SESSION['userName'])) {
                    echo "<a href='index.php'>
                    <li>    
  <div class='dropdown'>
  <button class='dropbtn'>".$_SESSION['userName']."</button>
  <div class='dropdown-content'>
    <a href='PHP/logout.php'>Log Out</a>
  </div>
</div>
                    </li>
                </a>";
                } else {
                    echo "<a href='Registration.php'><li id='regT'>Register</li></a>
                    <a href='log.php'><li id='logT'>Login</li>
                    </a>";
                }
                ?>


        </ul>
    </div>

</div>
    </div>


    <div class="background-body">


        <div class="home-section-1">

            <div class="wallpaper">
                <p id="welcome">WELCOME</p>
            </div>

            
            <?php
                if (!isset($_SESSION['userName'])) {
                    echo "<div class='home-btn'>
                <a href='log.php'><button id='home-btn-1'>Login</button></a>
                <a href='Registration.php'><button id='home-btn-2'>Register</button></a>
                </div>";
                }
                ?>

            


        </div>

    </div>

    <section class="home-section-2">

        <div class="home-grid">


            <div class="home-grid-box">
                <img src="SenuraImages/homeimg1.png">
            </div>

            <div class="home-grid-box">
                <h3>Perfect Scheduling</h3>

                <p> Provide your requirement, sit back & relax.Let Us your task by allowing our system provide you with fascinating solutions which will not only but also meet the appriciation of your Students & Colleagues as well </p>


            </div>

        </div>

        <div class="home-grid">


            <div class="home-grid-box">

                <h3>Fast & Efficient</h3>
                <p>
                    Majority Of people have kept their faith in us because we have provided them with more than they could ever hope for.MESH is realiable, Fast and Efficient

                </p>

            </div>

            <div class="home-grid-box">

                <img src="SenuraImages/homeimg4.png" style="width:400px">

            </div>

        </div>

        <div class="home-grid">

            <div class="home-grid-box">
                <img src="SenuraImages/homeimg6.png">
            </div>

            <div class="home-grid-box">
                <h3>Printing</h3>
                <p> We can garantee your satisfaction with MESH. Then starts the next phase. Print it for each Classroom, Labs, Lecturers. Customize the fonts, layout and logos and expect and share online
                </p>


            </div>

        </div>


        <div class="home-grid">

            <div class="home-grid-box">

                <h3>Advanced but Simple</h3>
                <p>
                    Courses, Schools... Our Web Application can enhance them all.Developed then tested and the final product is best you can ever expect. No task is Complex for MESH
                </p>

            </div>

            <div class="home-grid-box">

                <img src="SenuraImages/homeimage5.png">

            </div>

        </div>

    </section>

</body>


<footer>
    <div class="foot">
        <div>
            <div class="allrights">
                <h3 id="Foot_copyright" style="display: inline">Copyright 2019 @ MESH.All Rights Reserved.</h3>
                <img class="iconF1" src="Images/callBlue.png" style="display:inline">
                <p class="linkF" style="display:inline">01123423453</p>
                <img class="iconF1" src="Images/webBlue.png" style="display:inline">
                <p class="linkF" style="display:inline">www.mesh.lk</p>
                <img class="iconF1" src="Images/placeBlue.png" style="display:inline">
                <p class="linkF" style="display:inline">MESH,Kandy Road,Malabe</p>
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