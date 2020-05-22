<?php

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


$uploadOk = 1;
$imageFileType = strtolower(pathinfo($_FILES["profile_img"]["name"],PATHINFO_EXTENSION));
$fileDestination = 'images/uploads/'."A.jpg";
$fileDestinationP = 'images/uploads/'."A.jpg";

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["profile_img"]["tmp_name"]);
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


    if (move_uploaded_file($_FILES["profile_img"]["tmp_name"], $fileDestinationP)) {
        $res1 = $conn -> query("INSERT INTO images (image) VALUES  ('$fileDestinationP') ") OR die(mysqli_error());
        echo "<script>window.close();</script>";

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


?>
