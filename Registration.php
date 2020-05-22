<!DOCTYPE html>
<html>

<?php
    include ("php/config.php");
?>

    <head>

        <title>MESH | REGISTRATION</title>
        <link rel="stylesheet" type="text/css" href="css/Registration.css">
        <link rel="icon" type="images" href="images/zq.png">
        <script src="JS/registration.js"></script>



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
        <div class="bodRegistration">

            <div style="padding: 50px; margin-top:50px ">
                <h1 align="center">GENERAL INFORMATION</h1>

                <form method="POST" action="Reg.php" onsubmit="return checkPassword()" enctype="multipart/form-data">
                    <br>
                    <br>
                    <table>
                        <tr>
                            <td>
                                <div>
                                    <input class="inputBox" type="text" placeholder="First Name" name="fName" id="fName" onclick="active(this.id)" required>

                                    <br>
                                    <input class="inputBox" type="text" placeholder="Middle Name" name="mName" id="mName" onclick="active(this.id)" required>

                                    <br>
                                    <input class="inputBox" type="text" placeholder="Last Name" name="lName" id="lName" onclick="active(this.id)" required>
                                </div>
                            </td>
                            <td>
                                <div class="prof_container">

                                    <img src="images/Reg_prof.jpg" alt="AVATAR" width="150px" height="175px" style="margin-left : 10px;" onclick="openProf()" class="pp_image">


                                </div>
                                <div id="Prof" class="overlay">

                                    <a href="javascript:void(0)" class="closebtn" onclick="closeProf()">&times;</a>

                                    <div class="overlay-content">

                                        <div>
                                            <H1 style="color: #ffffff">UPLOAD THE PROFILE PICTURE</H1>

                                            <br>
                                            <br>
                                            <br>

                                            <img src="images/y.jpg" alt="AVATAR" width="150px" height="175px" style="border-radius: 10px; border: 10px solid grey">
                                            <br>
                                            <br>
                                            <br>
                                            <input type="file" name="fileToUpload" style="margin-left:13%" required>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <p style="color: white;">
                                                Upload a high resolution image with the resolution of 2000 x 1000. The image sgould be of the format jpg,jpeg,png or img.
                                            </p>

                                        </div>
                                    </div>
                                </div>


            </div>
            </td>
            </tr>
            </table>
            <br>
            <input class="inputBox" type="number" placeholder="Age" name="age" id="age" onclick="active(this.id)">
            <fieldset id="gender" style=" display: inline; height:  35px; margin-left: 50px; border-color: rgb(248, 248, 255); margin-top: 5px; ;" onmouseover="active(this.id)" onmouseout="inactive(this.id)">
                <legend>GENDER</legend>
                <input type="radio" name="gender" value="male">Male
                <input type="radio" name="gender" value="female">Female
            </fieldset>
            <br>
            <input class="inputBox" type="text" placeholder="Student ID/Employee ID" id="sID" name="ID" onclick="active(this.id)">
            <br>
            <select class="inputBox" onclick="active(this.id)" id="faculty" name = "faculty">
                        <option value="" >-SELECT FACULTY-</option>
                        <option value="FOC">FOC</option>
                        <option value="FOE">FOE</option>
                        <option value="FOB">FOB</option>
                    </select>

            <select class="inputBox" onclick="active(this.id)" id="year" style="margin-left : 0px;" name="Year">
                        <option value="" >-SELECT YEAR-</option>
                        <option value="YEAR 1">YEAR 1</option>
                        <option value="YEAR 2">YEAR 2</option>
                        <option value="YEAR 3">YEAR 3</option>
                        <option value="YEAR 4">YEAR 4</option>
                    </select>
            <select class="inputBox" onclick="active(this.id)" id="grp"  name = "grp">
                            <option value="" >-SELECT GROUP-</option>
                            <option value="Y1S1 1">1</option>
                            <option value="Y1S1 2">2</option>
                            <option value="Y1S1">3</option>
                        </select>
            <br/>

            <input class="inputBox" id="pw" type="password" placeholder="Enter Password" name="password" onclick="active(this.id)">
            <input class="inputBox" id="Rpw" type="password" placeholder="Re-Enter Password" name="rPassword" onclick="active(this.id)">
            <br>



        </div>

        <div style="padding: 50px; margin-top:50px ">
            <h1 align="center" style="color: #ffffff">CONTACT INFORMATION</h1>

                <br>
                <br>
                <input class="inputBox" id="eMail" type="email" placeholder="Email" name="mail" onclick="active(this.id)" pattern="[a-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,3}">
                <br>
                <input class="inputBox" id="addrL1" type="text" placeholder="Address Line 1" onclick="active(this.id)" name="addrs1">
                <br>
                <input class="inputBox" id="addrL2" type="text" placeholder="Address Line 2" onclick="active(this.id)" name="addrs2">
                <br>
                <input class="inputBox" id="addrL3" type="text" placeholder="Address Line 3" onclick="active(this.id)" name="addrs3">
                <br>
                <input class="inputBox" id="city" type="text" placeholder="City" onclick="active(this.id)" name="city" >
                <input class="inputBox" id="Country" type="text" placeholder="Country" onclick="active(this.id)" name="country">
                <br>
                <input class="inputBox" id="pNum" type="tel" placeholder="Phone number" onclick="active(this.id)" name="pNum" pattern="[0-9]{10}" required>
                <br>
                <br>
                <br>
                <label id="label_acceptConditions"> I do accept the terms and conditions</label>
                <input type="checkbox" id="checkBox" onclick="enableButton()">
                <br/>
                <br>
                <br>
                <input class="inputBox" type="submit" name="submit" id="btnSubmit"  disabled>




            </form>
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