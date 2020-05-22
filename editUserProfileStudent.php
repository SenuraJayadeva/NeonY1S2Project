<!DOCTYPE html>
<html>
    
<head>
    <link rel="StyleSheet" type="text/css" href=" CSS/style.css">
    <title>MESH | EDIT USER PROFILE</title>
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

<?php
$result = $con -> query("SELECT * FROM student WHERE UserID='$userID'") OR die(mysqli_error());
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
           $fName = $row['fname'];
           $lName = $row['lname'];
           $mName = $row['mname'];
           $Age = $row['age'];
           $AL1 = $row['addrs1'];
           $AL2 = $row['addrs2'];
           $AL3 = $row['addrs3'];
           $city = $row['city'];
           $country = $row['country'];
           $email = $row['email'];
           $phone = $row['pnum'];
           $picture = $row['ProfilePic'];
        }
    } else {
        die(mysqli_error());
    }
    ?>


<body>

   
        <div class="EditUserStu">
            <div class="EditUserStu_titleForm">
                <p id="EditUserStu_title">Update User Information</p>
            </div>
            <div>

            <form id="EditUserStu_form" method="POST" action="PHP/updateStu.php">
                <fieldset class="EditUserStu_fieldSet">
                    <legend>
                        <p class="legend_title" id="legend_title1">First Name</p>
                    </legend>
                    <input class="EditUserStu_input" name="fName" id="EditUserStu_firstName" type="text"
                        value=<?php echo"$fName" ?> onclick="makeChangesIcon(this.id)"
                        onmouseover="makeChanges(this.id)" onmouseout="makeChangesA(this.id)" required>
                    <img class="EditUserStu_delete" id="delete_1" src=" Images/wrong.png" onclick="deleteData(this.id)">
                </fieldset><br>

                <fieldset class="EditUserStu_fieldSet">
                    <legend>
                        <p class="legend_title" id="legend_title2">Middle Name</p>
                    </legend>
                    <input class="EditUserStu_input" name="mName" id="EditUserStu_middleName" type="text"
                        value=<?php echo"$mName" ?> onclick="makeChangesIcon(this.id)"
                        onmouseover="makeChanges(this.id)" onmouseout="makeChangesA(this.id)" required>
                    <img class="EditUserStu_delete" id="delete_2" src=" Images/wrong.png" onclick="deleteData(this.id)">
                </fieldset><br>

                <fieldset class="EditUserStu_fieldSet">
                    <legend>
                        <p class="legend_title" id="legend_title3">Last Name</p>
                    </legend>
                    <input class="EditUserStu_input" name="lName" id="EditUserStu_lastName" type="text"
                        value=<?php echo"$lName" ?> onclick="makeChangesIcon(this.id)"
                        onmouseover="makeChanges(this.id)" onmouseout="makeChangesA(this.id)" required>
                    <img class="EditUserStu_delete" id="delete_3" src=" Images/wrong.png" onclick="deleteData(this.id)">
                </fieldset><br>

                <fieldset class="EditUserStu_fieldSet">
                    <legend>
                        <p class="legend_title" id="legend_title4">Age</p>
                    </legend>
                    <input class="EditUserStu_input" name="age" id="EditUserStu_Age" type="number"
                        value=<?php echo"$Age" ?> onclick="makeChangesIcon(this.id)" onmouseover="makeChanges(this.id)"
                        onmouseout="makeChangesA(this.id)" required>
                    <img class="EditUserStu_delete" id="delete_4" src=" Images/wrong.png" onclick="deleteData(this.id)">
                </fieldset><br>

            </div>
            <div>
                <fieldset class="EditUserStu_fieldSet">
                    <legend>
                        <p class="legend_title" id="legend_title5">Address Line 1 </p>
                    </legend>
                    <input class="EditUserStu_input" name="ad1" id="EditUserStu_address1" type="text"
                    value=<?php echo"$AL1" ?> onclick="makeChangesIcon(this.id)" onmouseover="makeChanges(this.id)"
                        onmouseout="makeChangesA(this.id)" required>
                    <img class="EditUserStu_delete" id="delete_5" src=" Images/wrong.png" onclick="deleteData(this.id)">
                </fieldset><br>

                <fieldset class="EditUserStu_fieldSet">
                    <legend>
                        <p class="legend_title" id="legend_title6">Address Line 2</p>
                    </legend>
                    <input class="EditUserStu_input" name="ad2" id="EditUserStu_address2" type="text"
                    value=<?php echo"$AL2"?> onclick="makeChangesIcon(this.id)" onmouseover="makeChanges(this.id)"
                        onmouseout="makeChangesA(this.id)" required>
                    <img class="EditUserStu_delete" id="delete_6" src=" Images/wrong.png" onclick="deleteData(this.id)">
                </fieldset><br>

                <fieldset class="EditUserStu_fieldSet">
                    <legend>
                        <p class="legend_title" id="legend_title7">Address Line 3 </p>
                    </legend>
                    <input class="EditUserStu_input" name="ad3" id="EditUserStu_address3" type="text"
                    value=<?php echo"$AL3" ?> onclick="makeChangesIcon(this.id)" onmouseover="makeChanges(this.id)"
                        onmouseout="makeChangesA(this.id)" required>
                    <img class="EditUserStu_delete" id="delete_7" src=" Images/wrong.png" onclick="deleteData(this.id)">
                </fieldset><br>

                <fieldset class="EditUserStu_fieldSet">
                    <legend>
                        <p class="legend_title" id="legend_title8">City</p>
                    </legend>
                    <input class="EditUserStu_input" name="city" id="EditUserStu_city" type="text"
                    value=<?php echo"$city" ?> onclick="makeChangesIcon(this.id)" onmouseover="makeChanges(this.id)"
                        onmouseout="makeChangesA(this.id)" required>
                    <img class="EditUserStu_delete" id="delete_8" src=" Images/wrong.png" onclick="deleteData(this.id)">
                </fieldset><br>

                <fieldset class="EditUserStu_fieldSet">
                    <legend>
                        <p class="legend_title" id="legend_title9">Country</p>
                    </legend>
                    <input class="EditUserStu_input" name="country" id="EditUserStu_country" type="text"
                    value=<?php echo"$country" ?> onclick="makeChangesIcon(this.id)" onmouseover="makeChanges(this.id)"
                        onmouseout="makeChangesA(this.id)" required>
                    <img class="EditUserStu_delete" id="delete_9" src=" Images/wrong.png" onclick="deleteData(this.id)">
                </fieldset><br>
            </div>

            <div>

                <fieldset class="EditUserStu_fieldSet">
                    <legend>
                        <p class="legend_title" id="legend_title10">Email</p>
                    </legend>
                    <input class="EditUserStu_input" name="email" id="EditUserStu_email" type="email"
                        value=<?php echo"$email" ?> onclick="makeChangesIcon(this.id)"
                        onmouseover="makeChanges(this.id)" onmouseout="makeChangesA(this.id)" required>
                    <img class="EditUserStu_delete" id="delete_10" src=" Images/wrong.png"
                        onclick="deleteData(this.id)">
                </fieldset><br>

                <fieldset class="EditUserStu_fieldSet">
                    <legend>
                        <p class="legend_title" id="legend_title11">Phone</p>
                    </legend>
                    <input class="EditUserStu_input" name="phone" id="EditUserStu_phone" type="tel"
                        value=<?php echo"$phone" ?> onclick="makeChangesIcon(this.id)" pattern="[0-9]{10}"
                        onmouseover="makeChanges(this.id)" onmouseout="makeChangesA(this.id)" required>
                    <img class="EditUserStu_delete" id="delete_11" src=" Images/wrong.png"
                        onclick="deleteData(this.id)">
                </fieldset><br>

                <div class="profilechange">
                    <img class="changeProfile" id="changePro" src=<?php echo "$picture"?> onhover=""
                        onclick="openPop()">
                </div>

            </div>

            <div>
                <button type="submit" class="editUserStu_button" name="save" id="editUserStu_bnSave">Save</button>
                <button type="reset" class="editUserStu_button" id="editUserStu_bnReset">Reset</button>
            </div>
            <div>
</div>
</form>
<div>
<button class="editUserStu_buttonDel" onclick="openPopDel()">Delete Account</button>
            </div>
<form id="EditUserStu_form" method="POST" action="PHP/deleteStu.php">
            <button type = "submit" class="editUserStu_buttonDel" name="save" id="editUserStu_bnDel" hidden>Delete Account</button>        
</form>
        </div>
  

        <div class="bg-modal">
        <div class="modal-content">
            <div class="close" id="closePopUp" onclick="closePop()">+</div>

            <p id="EditUserStu_titleUpdate">Update Profile Picture</p>
            <div class="boxUpdatePic">
                <div class="">
                    <img id="updatePicAni" src="images/updatePic.gif">
                </div>
                <div class="">
                    <button type="none" class="editUserStu_button" name="choose" id="editUserStu_bnCho"
                        onclick="uploadPic()">Choose</button>
                </div>
                <div class="">
                    <form target="_blank" action="PHP/upload.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="fileToUpload" id="fileToUpload" hidden>
                        <button type="submit" class="updateUserStu_button" id="editUserStu_bnUp" name="submitUp"
                            onclick="setUpadate()" disabled>Update</button>
                    </form>

                </div>

            </div>

        </div>
    </div>

    <div class="bg-modalDel">
        <div class="modal-content">

            <p id="EditUserStu_titleDel">Are you want to delete your account ?</p>
            <div class="boxUpdatePic">
                <div class="">
                    <img id="deletePicUser" src="images/deleteUser.png">
                </div>
                <div class="">
                    <button type="none" class="editUserStu_button" name="choose" id="editUserStu_bnCho"
                        onclick="closePopDel()">Cansel</button>
                </div>
                <div class="">
                        <button type="submit" class="updateUserStu_button" id="editUserStu_bnUp" name="submitUp"
                            onclick="setDelete()">Delete</button>
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