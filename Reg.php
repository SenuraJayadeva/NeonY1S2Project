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

  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION));
  $fileDestination = 'images/uploads/';
  $fileDestinationP = 'images/uploads/'."$ID.jpg";

  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
          $uploadOk = 1;
      } else {
          echo "File is not an image.";
          $uploadOk = 0;
      }
  }

  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
  }

  if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
  } else {


      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fileDestinationP)) {
        $sql1 = "INSERT INTO student values ('$ID','$fname','$mName','$lName','$age','$gender','$faculty','$year','$grp','$mail','$addrs1','$addrs2','$addrs3','$city','$country','$pNum','$fileDestinationP')";
        $sql2 = "INSERT INTO pwd (stId,pwd) values ('$ID','$pw')";
      } else {
          echo "Sorry, there was an error uploading your file.";
      }
  }


  if($con->query($sql1)&&$con->query($sql2))
  {
      echo "Inserted successfully";
      header("location:Conformation.php");
  }
  else{
      echo "Error:".$con->error;

  }

$con ->close();

?>