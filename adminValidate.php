<?php

session_start();
require "PHP/config.php";

if(isset($_POST['submit']))
{
    $userid = $_POST['userid'];
    $pword = $_POST['password'];
    $query1 = "SELECT userID FROM admin WHERE userID = '$userid'";
    $query2 = "SELECT AdminPassword FROM admin WHERE  userID= '$userid' && AdminPassword = '$pword'";
    

    $total1 = $con->query($query1);
    $total2 = $con->query($query2);

    if(mysqli_num_rows($total1) == 1)
    {

        if($total2->num_rows  == 1)
        {
            $_SESSION['userName'] = $userid;
            header ("Location: admin.php");
        }
        else{
            echo "Wrong password";
        }

    }
}

$con ->close();

?>