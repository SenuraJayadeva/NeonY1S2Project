<?php
require 'config.php';
if(isset($_POST['submit'])) {
    if($_POST['userName']=='IT19131184' && $_POST['password']=='123') {
        session_start();
        $_SESSION['userName'] = $_POST['userName'];
        header("location: ../userprofileStu.php");
    }
} else {
    header("location: ../Login.php");
}
?>