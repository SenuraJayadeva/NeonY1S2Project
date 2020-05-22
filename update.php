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

  if (isset($_SESSION['userName'])) {
    $userID = $_SESSION['userName'];
    if (strpos($_SESSION['userName'], 'LEC') !== false) {
        $proTable = 'Lecturer';
    } else if (strpos($_SESSION['userName'],'AD') !== false) {
        $proTable = 'admin';
    } else if (strpos($_SESSION['userName'],'IT') !== false) {
        $proTable = 'studentreg';
    }

    $userID = $_SESSION['userName'];
    $resultPic = $conn -> query("SELECT * FROM $proTable WHERE userId='$userID'") OR die(mysqli_error());
if (mysqli_num_rows($resultPic) > 0) {
         while ($row2 = mysqli_fetch_array($resultPic)) {
            $avatar = $row2['ProfilePic'];
         }
     }
} else {
    $avatar = "images/user.png";
}


$userprofile = $_SESSION['userName'];
$query = "SELECT *FROM admin WHERE userID = '$userprofile' ";
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);


 ?> 

 
<!DOCTYPE html>
<html>

<head>
    <link rel="StyleSheet" type="text/css" href="css/styleSheet.css">
    <script src="JS/script.js"></script>
    <title>Lecturer | UpdateForm</title>
    <link rel="icon" href="SenuraImages/zq.png">
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

                <a href="log.php"><img src="<?php echo $avatar ?>" alt="AVATAR" width="100px" id="Header_logo"></a>

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
            
        <div>
            <a href="lecturer_Update.php"> <img src="SenuraImages/go-back-button.png" alt="go back" id="go-back-button" onmouseover="this.src='SenuraImages/go-back-button-hover.png'" onmouseout="this.src='SenuraImages/go-back-button.png'"> </a>
         </div>

         

<div class="Lecturerupdateform">
             
             <form id="lecturer_update-update-form" method="POST" action="updatenew.php" onsubmit="return validateLecturerInsertPage()">
                 <h2>Update Record</h2>
                 <input class="lecturer_update-form-inputs" type="text" name="LecID" id="LecID" value="<?php echo $_GET['Lid']; ?>" > <br>
                 <input class="lecturer_update-form-inputs" type="text" name="Lecfullname" id="Lecname" value="<?php echo $_GET['Lname']; ?>"><br>
                 <input class="lecturer_update-form-inputs" type="number" name="LecAge" id="LecAge" value="<?php echo $_GET['Lage']; ?>" ><br>
                 <input class="lecturer_update-form-inputs" type="email" name="LecEmail" id="LecEmail" value="<?php echo $_GET['Lemail']; ?>" ><br>
                 <input class="lecturer_update-form-inputs" type="text" name="LecPhoneNumber" id="LecPhoneNumber" value="<?php echo $_GET['Lcontact']; ?>" ><br>
                 <select class="lecturer_update-form-inputs" name = "LecFaculty" id="Faculty" >
                     <option><?php echo $_GET['Lfaculty']; ?> </option>
                     <option>Faculty Of Computing</option>
                     <option>Faculty Of Engineering</option>
                     <option>Faculty Of Business</option>
                     <option>Faculty Of Quantity Servey</option>
                 </select><br><br>
                 <br>
                 <input class="lecturer_update-form-inputs"  id="updateform-button" type="submit" name="submit" value="update">
     
                </form>   
</div>

</body>


<footer>
    <div class="foot">
        <div>
            <div class="allrights">
                <h3 id="Foot_copyright" style="display: inline">Copyright 2019 @ MESH. All Rights Reserved.</h3>
                <img class="iconF1" src="SenuraImages/callBlue.png" style="display:inline">
                <p class="linkF" style="display:inline">011 23423453</p>
                <img class="iconF1" src="SenuraImages/webBlue.png" style="display:inline">
                <p class="linkF" style="display:inline">www.mesh.lk</p>
                <img class="iconF1" src="SenuraImages/placeBlue.png" style="display:inline">
                <p class="linkF" style="display:inline">MESH, Kandy Road, Malabe</p>
            </div>

        </div>

        <div>

            <div>

                <a href=""><img id="fb" class="iconF" alt="Facebook" src="SenuraImages/facebook.png" onmouseout="this.src='SenuraImages/facebook.png'" onmouseover="this.src='SenuraImages/facebookO.png'"></a>
                <a href=""><img id="yt" class="iconF" alt="YouTube" src="SenuraImages/youtube.png" onmouseover="this.src='SenuraImages/youtubeO.png'" onmouseout="this.src='SenuraImages/youtube.png'"></a>
                <a href=""><img id="tw" class="iconF" alt="Twitter" src="SenuraImages/twitter.png" onmouseover="this.src='SenuraImages/twitterO.png'" onmouseout="this.src='SenuraImages/twitter.png'"></a>
                <a href=""><img id="in" class="iconF" alt="Instagram" src="SenuraImages/instagram.png" onmouseover="this.src='SenuraImages/instagramO.png'" onmouseout="this.src='SenuraImages/instagram.png'"></a>

            </div>

        </div>


    </div>
</footer>


</html>

