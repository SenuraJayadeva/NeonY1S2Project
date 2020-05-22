<?php

session_start();
include("php/config.php");


if(isset($_POST['submit']))
{
    $userid = $_POST['userid'];
    $pword = $_POST['password'];
    $query1 = "SELECT stID FROM pwd WHERE stID = '$userid'";
    $query2 = "SELECT pwd FROM pwd WHERE  stID= '$userid' && pwd = '$pword'";
    $query3 = "SELECT userID FROM lecturer WHERE userID = '$userid'";
    $query4 = "SELECT pwd FROM lecturer WHERE  userID= '$userid' && pwd = '$pword'";

    /*$runq1 = mysqli_query($con,$query1);
    $total1 = mysqli_num_rows($runq1);

    $runq2 = mysqli_query($con,$query2);
    $total2 = mysqli_num_rows($runq2);
    */

    $total1 = $con->query($query1);
    $total2 = $con->query($query2);

    $total3 = $con->query($query3);
    $total4 = $con->query($query4);



    if(mysqli_num_rows($total1) == 1)
    {

        if($total2->num_rows  == 1)
        {

            $_SESSION['userName'] = $userid;
            header ("Location: userProfileStu.php");


        }
        else{
            echo "Wrong password";
        }

    }



    if(mysqli_num_rows($total3) == 1)
    {

        if($total4->num_rows  == 1)
        {

            $_SESSION['userName'] = $userid;
            header ("Location: userProfileLec.php");


        }
        else{
            echo "Wrong password";
        }

    }
    else{
        echo "User ID not found";
    }
}

$con ->close();

?>