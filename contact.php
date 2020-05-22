<!DOCTYPE html>
<html>

<head>
    <link rel="StyleSheet" type="text/css" href=" CSS/style.css">
    <title>MESH | CONTACT</title>
    <link rel="icon" href=" Images/mesh.png">
    <script src=" JS/myScript.js"></script>
</head>
<?php
    require 'PHP/config.php';
    session_start();
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
    <div class="Contact_contact">
        <div class="Contact_details">
            <table class="Contact_contactTable">
                <tr>
                    <td class="Contact_rowContact"><img class="icon" src=" Images/call.png"></td>
                    <td class="Contact_rowContact">
                        <p class="Contact_textC">011 23423453</p>
                    </td>
                </tr>
                <tr>
                    <td class="Contact_rowContact"><img class="icon" src=" Images/web.png"></td>
                    <td class="Contact_rowContact">
                        <p class="Contact_textC">www.mesh.lk</p>
                    </td>
                </tr>
                <tr>
                    <td class="Contact_rowContact"><img class="icon" src=" Images/email.png"></td>
                    <td class="Contact_rowContact">
                        <p class="Contact_textC">info@mesh.lk</p>
                    </td>
                </tr>
                <tr>
                    <td class="Contact_rowContact"><img class="icon" src=" Images/place.png"></td>
                    <td class="Contact_rowContact">
                        <p class="Contact_textC">MESH, New Kandy Road, Malabe</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <br>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7985117576864!2d79.9707558140206!3d6.914677495003818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae256db1a6771c5%3A0x2c63e344ab9a7536!2sSri+Lanka+Institute+of+Information+Technology!5e0!3m2!1sen!2slk!4v1564761755107!5m2!1sen!2slk"
                            width="350" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </td>
                </tr>
            </table>
        </div>

        <div class="Contact_formC">
            <p align="center" class="Contact_formTitle"><br>Contact Form</p>
            <form method="post" action="PHP\contactDB.php" onsubmit="return Contact_formValidateC()">
                <input class="Contact_inputBox" type="text" id="name" placeholder="Name" name="name">
                <p class="error"></p>
                <input class="Contact_inputBox" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.+[a-z].{2,}$" type="text"
                    id="email" placeholder="Email" name="email">
                <p class="error"></p>
                <textarea class="Contact_inputBox" id="textArea_Message" type="text" placeholder="Message"
                    name="message"></textarea>
                <p class="error"></p>

                <button class="Contact_bnSubmit" id="bnSubmit" type="submit" name="button">Submit</button>
            </form>
        </div>


        <div class="Contact_formRate">
            <p align="center" class="Contact_formTitle"><br>Feedback</p>
            <form method="post" action="PHP\feedback.php" onsubmit="return Contact_formValidateF()">
                <textarea class="Contact_inputBox" id="textArea_Feedback" type="text" placeholder="Feedback"
                    name="feedback"></textarea>
                <p class="error"></p>
                <button class="Contact_bnSubmit" id="bnSubmitF" type="submit" name="button">Submit</button>
            </form>
        </div>
    </div>

    <div class="Contact_many">
        <div class="Contact_tabs">
            <image id="img_centers" src=" Images/contactus.png"></image>
        </div>
        <div class="Contact_details_centres">
            <button id="Contact_many_bn1" class="Contact_many_bn" onclick="changeDetails('btn1')">Kandy</button>
            <button id="Contact_many_bn1" class="Contact_many_bn" onclick="changeDetails('btn2')">Kurunagala</button>
            <button id="Contact_many_bn1" class="Contact_many_bn" onclick="changeDetails('btn3')">Jaffna</button>
            <button id="Contact_many_bn1" class="Contact_many_bn" onclick="changeDetails('btn4')">Matara</button>
            <p id="Contact_details_centres_des">Now you can contact our centers in your home towns. You can get contact
                details of our centers from here.</p>
        </div>
    </div>

    <div class="Contact_FAQ">
        <div>
            <p align="left" class="Contact_faqTitle"><br>FAQ</p><br>
            <p class="Contact_faq">(1) How can I view the timetable ? <br>- You have to login to the system or you have
                to register to the system. <br><br> (2) How can I download the timetables ? <span
                    id="Contact_readMore"><br>-Go to the user profile and there you can find the download link.
                    <br><br> (3) Can the lectures register from the site? <br>-No, lectures have to contact the system
                    admin for register.
                    <br><br> (4) Can we update our details after regestering to the site ? <br>-Yes, you can update the
                    details from user profile.
                    <br><br> (5) Can we see other groups timetables ? <br>-No, you can only view and download your
                    group's timetable.</p></span>
            <button onclick="readMore()" id="Contact_bnFAQ">Read More</button>
        </div>
        <div>
            <image id="Contact_FAQ_img" src=" Images/faq.png"></image>
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
                <a href="https://www.facebook.com"><img id="fb" class="iconF" alt="Facebook" src="Images/facebook.png"
                        onmouseout="this.src='images/facebook.png'" onmouseover="this.src='images/facebookO.png'"></a>
                <a href="https://www.youtube.com"><img id="yt" class="iconF" alt="YouTube" src="Images/youtube.png"
                        onmouseover="this.src='images/youtubeO.png'" onmouseout="this.src='images/youtube.png'"></a>
                <a href="https://twitter.com"><img id="tw" class="iconF" alt="Twitter" src="Images/twitter.png"
                        onmouseover="this.src='images/twitterO.png'" onmouseout="this.src='images/twitter.png'"></a>
                <a href="https://www.instagram.com"><img id="in" class="iconF" alt="Instagram"
                        src="Images/instagram.png" onmouseover="this.src='images/instagramO.png'"
                        onmouseout="this.src='images/instagram.png'"></a>

            </div>

        </div>


    </div>
</footer>

</html>