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


$userprofile = $_SESSION['userName'];
$query = "SELECT *FROM admin WHERE userID = '$userprofile' ";
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);


 ?> 



<!DOCTYPE html>
<html>

<head>
    <link rel="StyleSheet" type="text/css" href="css/styleSheet.css">
    <title>MESH | Admin</title>
    <script src="JS/script.js"></script>
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
    <a href='logout.php'>Log Out</a>
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



    <section>

        <div class="adminpage-grid">

            <div class="admin-box admin-box-1">
                <h3>Admin Details</h3>
               
               <?php  echo '<img height="300" width ="300" style="margin-left:220px;" src = " '.$result['ProfilePic'].' ">';     ?>

                <table id="tableAdminDetails">

                    <tr>
                        <td>Employee ID</td>
                        <td><?php echo $_SESSION['userName']; ?></td>
                    </tr>
                    <tr>
                        <td>Full Name</td>
                        <td><?php echo $result['AdminName']; ?></td>
                    </tr>
                    <tr>
                        <td>Age</td>
                        <td><?php echo $result['AdminAge']; ?></td>
                    </tr>
                    <tr>
                        <td>Contact No</td>
                        <td><?php echo $result['AdminContact']; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $result['AdminEmail']; ?></td>
                    </tr>

                </table>

                <a href="adminUpdate.php?Aid=<?php echo $_SESSION['userName']; ?>&Aname=<?php echo $result['AdminName']; ?>&Aage=<?php echo $result['AdminAge']; ?>&AContact=<?php echo $result['AdminContact']; ?>&Aemail=<?php echo $result['AdminEmail']; ?>" ><button type="button">Edit</button></a>
            </div>

            <div class="admin-box admin-box-2">
                <h3>Manage Lecturers <a href="lecturerDatabase.php"><button style="float: right; height:35px; background: rgb(214, 182, 2);"> View  </button></a> </h3>
                <table>
                    <tr>
                        <td> <img src="SenuraImages/lec.png"> </td>
                        <td>
                            <ul>

                                <li>
                                    <a href="lecturer_insert.php"> <button class="manage-buttons">Insert</button> </a>
                                </li>
                                <li>
                                    <a href="lecturer_Update.php"> <button class="manage-buttons">Update</button> </a>
                                </li>
                                <li>
                                    <a href="lecturer_Delete.php"> <button class="manage-buttons">Delete</button> </a>
                                </li>

                            </ul>

                        </td>
                    </tr>
                </table>

            </div>

            <div class="admin-box admin-box-3">

                <h3>Manage Students <a href="studentView.php"><button style="float: right; height:35px; background: rgb(214, 182, 2);"> View  </button></a> </h3>

                <table>
                    <tr>
                        <td> <img src="SenuraImages/stu.png"> </td>
                        <td>
                            <ul>

                                <li> <a href="student_insert.php"><button class="manage-buttons">Insert</button> </a></li>
                                <li> <a href="student_Delete.php"><button class="manage-buttons">Delete</button> </a></li>

                            </ul>

                        </td>
                    </tr>
                </table>

            </div>

            <div class="admin-box admin-box-4">

                <div class="timetable-header">

                    <div class="timetable-header-box t-box1">

                        <h3>Manage Time Tables</h3>
                    </div>

                  

                </div>





                <?php


            $time = array('8.30-10.30', '10.30-12.30', '1.30-3.30', '3.30-5.30');
          
            if(isset($_POST['group']))
            {
                $grpID = $_POST['group'];
                $fac = $_POST['fac'];
            }
            else
            {
                $grpID = '';
                $fac = '';
            }
                 
                   
       

            $day = array('Mon','TUE','WED','THU','FRI');
            echo "<table align-content='center' align='center' border='1' cellspacing='0' width='80%'>";
            echo "<tr><th id=\"dataTabl\"></th><th id=\"dataTabl\">Monday</th><th id=\"dataTabl\">Tuesday</th><th id=\"dataTabl\">Wednesday</th><th id=\"dataTabl\">Thursday</th><th id=\"dataTabl\">Friday</th></tr>";
            for ($i = 0; $i < 4; $i++) {
                echo "<tr>";
                echo "<td id=\"dataTabl\">".$time[$i]."</td>";
                for($j = 0; $j < 5; $j++){
                    $result = $conn -> query("SELECT * FROM timeslots WHERE Day='$day[$j]' AND Time='$time[$i]' AND faculty = '$fac' AND groupID='$grpID'") OR die(mysqli_error());
                    if(mysqli_num_rows($result) > 0){
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<td id=\"dataTabl\">".$row['module']."</td>";
                    }
                } else {
                    echo "<td id=\"dataTabl\">-</td>";
                }
                    
                }
                echo "</tr>";
            }
            echo "</table>";

            echo "$grpID"." "."$fac";
 
            ?>

                
                <br>
                <div class = "admin-timetable-button-area">
                <div class="admin-timetable-button-area-box">
                    <h2>Faculty Of Computing</h2>
                    <form action="" method="POST">
                    <input type="hidden" name="fac" value="FOC" >
                    <button type="submit" id="btn1" name="group" value="Y1S1 1">Y1S1 1</button><br><br>
                    <button type="submit" id="btn1" name="group" value="Y1S1 2">Y1S1 2</button>
                </form>
                </div>

                <div class="admin-timetable-button-area-box">
                <h2>Faculty Of Engineering</h2>
                    <form action="" method="POST">
                    <button type="submit" id="btn1" name="group" value="Y1S1 1">Y1S1 1</button><br><br>
                    <button type="submit" id="btn1" name="group" value="Y1S1 2">Y1S1 2</button>
                    <input type="hidden" name="fac" value="FOE" >
                </form>
                </div>

                <div class="admin-timetable-button-area-box">
                <h2>Faculty Of Business</h2>
                    <form action="" method="POST">
                    <button type="submit" id="btn1" name="group" value="Y1S1 1">Y1S1 1</button><br><br>
                    <button type="submit" id="btn1" name="group" value="Y1S1 2">Y1S1 2</button>
                    <input type="hidden" name="fac" value="FOB" >
                </form>
                </div>


                </div>
            </div>

        </div>

    </section>


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