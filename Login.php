<!DOCTYPE html>
<html>

<?php
    include("php/config.php");
?>

<head>
    <title>MESH | LOGIN</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="icon" type="images" href="images/zq.png">
    <script src="JS/login.js"></script>

</head>

<?php
if (isset($_SESSION['userName'])) {
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
    <div class="bodLogin">
        <div style="padding: 50px; margin-top:100px ">

            <img src="images/about.png" id="logoBody">

        </div>
        <div style="padding: 50px; margin-top:100px; padding-top: 10px ">

            <h1 align="center" class="formTitle"><br>LOGIN</h1>

            <form method="post" action = "logg.php" onsubmit="return validate()">

                <br>
                <br>

                <input class="inputBox" type="text" placeholder="Username" id="username" name = "userid">
                <input class="inputBox" type="password" placeholder="Password" id="password" name = "password">

                <br>
                <br>

                <div>
                    <label for="rememberMe" id="checkBoxLabel">     Remember Me</label>
                    <input class="" type="checkBox" name="rememberMe" id="rememberMe">
                </div>
                <br>
                <br>
                <br>
                <br>

                <input type="submit" class="btn" name="submit" value="SUBMIT">


                <br>
                <br>

                <a href="Registration.php"><button class="btn" type="button" name="Register">REGISTER</button></a>

            </form>

                <?php

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