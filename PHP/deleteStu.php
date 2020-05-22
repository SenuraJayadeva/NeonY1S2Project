<?php   
require 'config.php';
session_start();
$userID = $_SESSION['userName'];

$resultDel1 = ("DELETE FROM student WHERE UserId='$userID'");
$resultDel2 = ("DELETE FROM pwd WHERE stID='$userID'");
if ($con -> query($resultDel1) && $con -> query($resultDel2)) {
    session_destroy();
    header("location:../deleteStuSuccess.php"); 
    exit();
} else {
    header("location:../editUserProfileStudent.php");
    exit();
}
?>