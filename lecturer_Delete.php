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
            
        <div>
            <a href="admin.php"> <img src="SenuraImages/go-back-button.png" alt="go back" id="go-back-button" onmouseover="this.src='SenuraImages/go-back-button-hover.png'" onmouseout="this.src='SenuraImages/go-back-button.png'"> </a>
         </div>
     
    <section id="student-update-page">
    <br>
    <div class="page-topic">
        <h1 align = "center">Lecturer DATABASE</h1>
    </div>

    <br><br>    
    <section class="manage-table-grid">
        <table>

          <tr>
                <th>ID</th>
                <th>LecName</th>
                <th>Age</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Faculty</th>
            </tr>
            
            <?php
            
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
            
              $sql = "SELECT *FROM lecturer";
            
              $result = $conn->query($sql);
            
              $count = mysqli_num_rows($result);//OUTPUT BOOLEAN
            
              if($count == TRUE)
              {     
                    while($row = $result->fetch_assoc())
                    {
                        echo "<tr><td>".$row["userID"]."</td><td>".$row["LecturerName"]."</td><td>".$row["LecturerAge"]."</td><td>".$row["LecturerEmail"]."</td><td>".$row["LecturerContact"]."</td><td>".$row["LecturerFacluty"]."</td><td>"."<img height='50' width ='50' src=".$row['ProfilePic'].">"."</td><td><a  style='color:black; font-weight:bold;' href='delete_data_Lecturer.php?Lid=$row[userID]'><button id='lecturer-update-page-edit' >Delete</buttton></a></td></tr>";
                    }
                  
              }
              else
              {
                  echo "No data in the Database";
              }
            
              $conn->close();
            ?>
                       
            </table>
    </section>

    <br><br>


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