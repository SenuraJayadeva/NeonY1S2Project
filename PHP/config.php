<?php
global $con;
$con = new mysqli('localhost', 'root', '', 'mesh');

if ($con -> connect_error)
{
    die("Conccection failed : " . $con->connect_error);
}
?>