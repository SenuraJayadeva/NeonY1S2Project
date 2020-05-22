<!DOCTYPE html>
<html>

<head>
    <title>MESH | ABOUT US</title>
    <link rel="stylesheet" type="text/css" href="css/About.css">
    <link rel="icon" type="images" href="images/zq.png">
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
     <div>
        <div class="bodAbout1">
            <div>
                <img src="images/d.png" width="500px" class="center" alt="LOGO">
            </div>
            <div>
                <center>
                    <h1>WHO ARE WE?</h1>
                </center>
                <p>
                    We are a boutique digital transformation consultancy and software development company that provides cutting edge engineering solutions, helping Fortune 500 companies and enterprise clients untangle complex issues that always emerge during their digital
                    evolution journey. Since 2007 we have been a visionary and a reliable software engineering partner for world-class brands.
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae laboriosam, dicta ex sed perspiciatis nesciunt rem, soluta, quod debitis animi itaque fugiat placeat voluptate assumenda architecto minima aspernatur veritatis? Iusto!
                </p>
                <center>
                    <h1>WHY CHOOSE US?</h1>
                </center>
                <UL>
                    <li>We are a software operating since 2007</li>
                    <li>We offer a variaty of services from Web application development and software development to online marketing</li>
                    <li>We are a client forcused company with 100% user satisfaction</li>
                    <li>More than 50,000 companies use software sollutions made by us</li>
                </UL>
            </div>
        </div>
        <div class="bodAbout2">
            <div class="box3">
                <img src="images/login.png" alt="AVATAR" width="100px" style="margin-left:40px ">

                <h3 class="alignCenter">
                    Lasal.S.Hettiarachchi
                </h3>


                <p style="text-align: center">
                    <b>"The only thing worse than being blind , is having sight but no vision."</b>
                </p>

                <div>


                    <a href="https://www.facebook.com"><img id="fb" class="iconF" alt="Facebook" src="images/facebookA.png" onmouseout="this.src='images/facebookA.png'" onmouseover="this.src='images/facebookO.png'"></a>
                    <a href="https://www.youtube.com"><img id="yt" class="iconF" alt="YouTube" src="images/youtubeA.png" onmouseover="this.src='images/youtubeO.png'" onmouseout="this.src='images/youtubeA.png'"></a>
                    <a href="https://twitter.com"><img id="tw" class="iconF" alt="Twitter" src="images/twitterA.png" onmouseover="this.src='images/twitterO.png'" onmouseout="this.src='images/twitterA.png'"></a>
                    <a href="https://www.instagram.com"><img id="in" class="iconF" alt="Instagram" src="images/instagramA.png" onmouseover="this.src='images/instagramO.png'" onmouseout="this.src='images/instagramA.png'"></a>

                </div>

            </div>
            <div class="white box3">
                <img src="images/login.png" alt="AVATAR" width="100px" style="margin-left:40px ">

                <h3 class="alignCenter">
                    A.S.V.Jayadeva
                </h3>


                <p style="text-align: center">
                    <b>"Time is the scarest resource and unless it is managed, nothing else can be managed"</b>
                </p>

                <div>

                    <a href="https://www.facebook.com"><img id="fb" class="iconF" alt="Facebook" src="images/facebookA.png" onmouseout="this.src='images/facebookA.png'" onmouseover="this.src='images/facebookO.png'"></a>
                    <a href="https://www.youtube.com"><img id="yt" class="iconF" alt="YouTube" src="images/youtubeA.png" onmouseover="this.src='images/youtubeO.png'" onmouseout="this.src='images/youtubeA.png'"></a>
                    <a href="https://twitter.com"><img id="tw" class="iconF" alt="Twitter" src="images/twitterA.png" onmouseover="this.src='images/twitterO.png'" onmouseout="this.src='images/twitterA.png'"></a>
                    <a href="https://www.instagram.com"><img id="in" class="iconF" alt="Instagram" src="images/instagramA.png" onmouseover="this.src='images/instagramO.png'" onmouseout="this.src='images/instagramA.png'"></a>

                </div>
            </div>
            <div class="box3">
                <img src="images/login.png" alt="AVATAR" width="100px" style="margin-left:40px ">

                <h3 class="alignCenter">
                    W.G.Y. Randika
                </h3>


                <p style="text-align: center">
                    <b>"The Vision must be followed by the venture.It is not enough to stare up the steps"</b>
                </p>

                <div>


                    <a href="https://www.facebook.com"><img id="fb" class="iconF" alt="Facebook" src="images/facebookA.png" onmouseout="this.src='images/facebookA.png'" onmouseover="this.src='images/facebookO.png'"></a>
                    <a href="https://www.youtube.com"><img id="yt" class="iconF" alt="YouTube" src="images/youtubeA.png" onmouseover="this.src='images/youtubeO.png'" onmouseout="this.src='images/youtubeA.png'"></a>
                    <a href="https://twitter.com"><img id="tw" class="iconF" alt="Twitter" src="images/twitterA.png" onmouseover="this.src='images/twitterO.png'" onmouseout="this.src='images/twitterA.png'"></a>
                    <a href="https://www.instagram.com"><img id="in" class="iconF" alt="Instagram" src="images/instagramA.png" onmouseover="this.src='images/instagramO.png'" onmouseout="this.src='images/instagramA.png'"></a>

                </div>
            </div>

            <div class="white box3">
                <div>
                    <img src="images/login.png" alt="AVATAR" width="100px" style="margin-left:40px ">

                    <h3 class="alignCenter">
                        M.Prunthajini
                    </h3>


                    <p style="text-align: center">
                        <b>"Time is the scarcest resource and unless it is managed, nothing else can be managed"</b>
                    </p>

                </div>

                <div>

                    <a href="https://www.facebook.com"><img id="fb" class="iconF" alt="Facebook" src="images/facebookA.png" onmouseout="this.src='images/facebookA.png'" onmouseover="this.src='images/facebookO.png'"></a>
                    <a href="https://www.youtube.com"><img id="yt" class="iconF" alt="YouTube" src="images/youtubeA.png" onmouseover="this.src='images/youtubeO.png'" onmouseout="this.src='images/youtubeA.png'"></a>
                    <a href="https://twitter.com"><img id="tw" class="iconF" alt="Twitter" src="images/twitterA.png" onmouseover="this.src='images/twitterO.png'" onmouseout="this.src='images/twitterA.png'"></a>
                    <a href="https://www.instagram.com"><img id="in" class="iconF" alt="Instagram" src="images/instagramA.png" onmouseover="this.src='images/instagramO.png'" onmouseout="this.src='images/instagramA.png'"></a>

                </div>
            </div>
            <div class="box3">
                <div>
                    <img src="images/login.png" alt="AVATAR" width="100px" style="margin-left:40px ">

                    <h3 class="alignCenter">
                        Sudasinghe K.S.
                    </h3>

                </div>
                <p style="text-align: center">
                    <b>"You may delay buy time will not"</b>
                </p>

                <div>

                    <a href="https://www.facebook.com"><img id="fb" class="iconF" alt="Facebook" src="images/facebookA.png" onmouseout="this.src='images/facebookA.png'" onmouseover="this.src='images/facebookO.png'"></a>
                    <a href="https://www.youtube.com"><img id="yt" class="iconF" alt="YouTube" src="images/youtubeA.png" onmouseover="this.src='images/youtubeO.png'" onmouseout="this.src='images/youtubeA.png'"></a>
                    <a href="https://twitter.com"><img id="tw" class="iconF" alt="Twitter" src="images/twitterA.png" onmouseover="this.src='images/twitterO.png'" onmouseout="this.src='images/twitterA.png'"></a>
                    <a href="https://www.instagram.com"><img id="in" class="iconF" alt="Instagram" src="images/instagramA.png" onmouseover="this.src='images/instagramO.png'" onmouseout="this.src='images/instagramA.png'"></a>

                </div>
            </div>

        </div>
    </div>
    <div class="bodAbout3">
        <div>
            <h1>WHAT CLIENTS SAY...</h1>
            <br>
            <hr>
            <br>
            <img src="images/user1.jpg" class="user_pp">
            <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos nostrum culpa quasi, dicta veniam repellendus mollitia ex? Animi vel cum impedit maiores ex eligendi nulla quae, porro, qui error harum?"</p>
            <p>
                <b>
                Binara Navishka Devapura
                </b>
            </p>
            <br>
            <hr>
            <br>
            <img src="images/user2.jpg" class="user_pp">
            <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis in sed unde modi reprehenderit repellat perspiciatis quos neque, est hic nam culpa dolore eum, minima aperiam molestias dignissimos sapiente doloribus."</p>
            <p>
                <b>
                    Lasitha Samod
                </b>
            </p>
            <br>
            <hr>



        </div>
        <div>
            <img src="images/c.png" width="700px" class="center" alt="LOGO" style="margin-left:80px;margin-top: 40px;">
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