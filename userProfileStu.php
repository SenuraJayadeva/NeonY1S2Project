<!DOCTYPE html>
<html>

<?php
require 'PHP/config.php';
session_start();
$userID = $_SESSION['userName'];
if(!isset($_SESSION['userName'])) {
    header("location: Login.php");
} else if (strpos($userID, 'LEC') !== false) {
    header("location: userProfileLec.php");
} else if (strpos($userID,'AD') !== false) {
    header("location: admin.php");
}
?>

<head>
    <link rel="StyleSheet" type="text/css" href=" CSS/style.css">
    <title>MESH | USER PROFILE</title>
    <link rel="icon" href=" Images/mesh.png">
    <script src=" JS/myScript.js"></script>
</head>

<?php
   

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
?>


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
    <div class="UserLec_DetailsBackground">
        <div class="UserLec_Details">
            <div class="UserLec_UserImage">
                <?php
                $userID = $_SESSION['userName'];
                $result = $con -> query("SELECT * FROM student WHERE UserID='$userID'") OR die(mysqli_error());
                if(mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        $faculty = $row['faculty'];
                        $group = $row['grp'];
                echo"<img id='user' src=".$row['ProfilePic'].">
            </div>
            <div class='UserLec_UserDetails'>";
                
                        
                        echo "<p class=\"UserL_userDescription\">Full Name</p>
                        <p id=\"UserS_name\">".$row['fname']." ".$row['mname']."</p>
                        <p class=\"UserL_userDescription\">User ID</p>
                        <p id=\"UserS_id\">".$row['UserID']."</p>
                        <p class=\"UserL_userDescription\">Faculty</p>
                        <p id=\"UserS_faculty\">".$row['faculty']."</p>
                        <p class=\"UserL_userDescription\">Email</p>
                        <P id=\"UserS_email\">".$row['email']."</P>
                        <p class=\"UserL_userDescription\">Contact Number</p>
                        <p id=\"UserS_contactNum\">".$row['pnum']."</p>";
                    }
                } else {
                    echo "<p id=\"UserStu_Notice\">Sorry for the ERROR</p>";
                }
                
                ?>
            </div>
            <div class="UserLec_EditButton">
                <button type="button" class = "UserLec_editButton" id="UserLec_editButton" onclick="userProfileStu_edit()">Edit</button>
                <button type="button" class = "UserLec_editButton" id="UserLec_passwordUpdate" onclick="openPopPa()">Password</button>
            </div>
        </div>
        <div class="UserLec_Notice">
            <p id="UserLec_NocticeTitle">Notice</p>
            <?php
            $faculty = 'FOC';
            $result = $con -> query("SELECT * FROM notice WHERE GroupID='$group'AND Type = '$faculty' ") OR die(mysqli_error());
            if(mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                echo "<p id=\"UserStu_Notice\">".$row['Notice']."<br><br>"."</p>";
                }
            } else {
                echo "<p id=\"UserStu_Notice\">Currently you do not have any notice</p>";
            }
            ?>
            
        </div>
        <div class="UserLec_Timetable">
            <p id="UserLec_NocticeTitle">Timetable</p>
            <br/>
            <?php
            $time = array('8.30-10.30', '10.30-12.30', '1.30-3.30', '3.30-5.30');
            $group = "Y1S1 1";
            
            $day = array('Mon','TUE','WED','THU','FRI');
            echo "<table align-content='center' align='center' border='1' cellspacing='0' width='80%'>";
            echo "<tr><th id=\"dataTabl\"></th><th id=\"dataTabl\">Monday</th><th id=\"dataTabl\">Tuesday</th><th id=\"dataTabl\">Wednesday</th><th id=\"dataTabl\">Thursday</th><th id=\"dataTabl\">Friday</th></tr>";
            for ($i = 0; $i < 4; $i++) {
                echo "<tr>";
                echo "<td id=\"dataTabl\">".$time[$i]."</td>";
                for($j = 0; $j < 5; $j++){
                    $result = $con -> query("SELECT * FROM timeslots WHERE Day='$day[$j]' AND Time='$time[$i]' AND GroupID='$group' ") OR die(mysqli_error());
                    if(mysqli_num_rows($result) > 0){
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<td id=\"dataTabl\">".$row['module']."<br>".$row['hall']."</td>";
                    }
                } else {
                    echo "<td id=\"dataTabl\">-</td>";
                }
                    
                }
                echo "</tr>";
            }
            echo "</table>";
            ?>
            <br>
            <button type="button" class="UserLec_bnDownload" name="downTimeS" id="UserLec_btnDownload" onclick="download()">Download</button>
        </div>
    </div>

    <div class="bg-modalPa">
    <div class="modal-contentPa">
        <div class="close" id="closePopUp" onclick="closePopPa()">+</div>
        
    <p align= "center" id="EditUserStu_titleUChgPa">Change Password</p>
    <div class="boxUpdatePicPa">
    <div class="">
    <img id="updatePicPa" src = <?php echo "$avatar"?>>
</div>
<form  action="PHP/changePassword.php" method="post">
<div class="">
<input class="PasswordChg_inputBox" type="password" id="password1" placeholder="New Password" name="password">
</div>
<div class="">
<input class="PasswordChg_inputBox" type="password" id="password2" onkeyup= "setChange1()" placeholder="Confirm Password">
<p align= "center" id="EditUserStu_passwordMatch"></p>
    </div>
    <div>
    <button type="submit" class="passwordChg_button" id="editUserStu_bnUp" name = "submitUp" onclick="return setChange()">Change</button>
    </form>
    </div>

</div>

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