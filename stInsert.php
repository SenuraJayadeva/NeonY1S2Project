<?php


    include("php/config.php");

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'mesh';

  //Create Connection
  $conn = new mysqli ($servername,$username,$password,$database);

  //Check Connection
  if($conn->connect_error)
  {
      echo "MySQL Connection Error";
  }


    if(isset($_POST['submit']))
    {
        $ID = $_POST['ID'];
        $fname = $_POST['fName'];
        $mName = $_POST['mName'];
        $lName = $_POST['lName'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $faculty = $_POST['faculty'];
        $year = $_POST['Year'];
        $grp = $_POST['grp'];
        $mail = $_POST['mail'];
        $addrs1 = $_POST['addrs1'];
        $addrs2 = $_POST['addrs2'];
        $addrs3 = $_POST['addrs3'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $pNum = $_POST['pNum'];
        $pw = $_POST["password"];



    }

    $defaultimg = "images/user.png";

    $sql1 = "INSERT INTO student values ('$ID','$fname','$mName','$lName','$age','$gender','$faculty','$year','$grp','$mail','$addrs1','$addrs2','$addrs3','$city','$country','$pNum','$defaultimg')";
    $sql2 = "INSERT INTO pwd (stId,pwd) values ('$ID','$pw')";



  if($con->query($sql1)&&$con->query($sql2))
  {
      echo "Inserted successfully";
      header("location:student_insert.php");
  }
  else{
      echo "Error:".$con->error;

  }

$con ->close();

?>