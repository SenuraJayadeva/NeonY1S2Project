<?php
require 'config.php';
require '../FPDF/fpdf.php';
session_start();
$user = $_SESSION['userName'];

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../images/mesh.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(40);
    // Title
    $this->Cell(100,10,'MESH | Timetable Management System',0,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',12);
    // Page number
    //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    $this->Cell(0,10,'*This timetable was automatically generated via mesh.lk',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$time = array('8.30-10.30', '10.30-12.30', '1.30-3.30', '3.30-5.30');
$group = "Y1S1 1";
$day = array('Mon','TUE','WED','THU','FRI');

$details = $con -> query("SELECT * FROM student WHERE UserID='$user'") OR die(mysqli_error());
if(mysqli_num_rows($details) > 0) {
    while ($row = mysqli_fetch_array($details)) {
        $fname = $row['fname'];
        $lname = $row['lname'];
        $mName = $row['mname'];
        $faculty  =$row['faculty'];
        $group = $row['grp'];
    }
}

$pdf -> Ln();
$pdf -> cell(100,7,'STUDENT ID : '.$user, 0,1);
$pdf -> cell(100,7,'NAME : '.$fname." ".$mName." ".$lname,0,1);
$pdf -> cell(100,7,'FACULTY : '.$faculty, 0,1);
$pdf -> cell(100,7,'GROUP : '.$group, 0,1);

$pdf -> Ln();
$pdf -> cell(30,10,' ',1,0,'C');
$pdf -> cell(30,10,'Monday',1,0,'C');
$pdf -> cell(30,10,'Tuesday',1,0,'C');
$pdf -> cell(30,10,'Wednesday',1,0,'C');
$pdf -> cell(30,10,'Thursday',1,0,'C');
$pdf -> cell(30,10,'Friday',1,1,'C');

for ($i = 0; $i < 4; $i++) {
    $pdf -> cell(30,20,$time[$i],1,0,'C');
    for($j = 0; $j < 5; $j++){
        $result = $con -> query("SELECT * FROM timeslots WHERE Day='$day[$j]' AND Time='$time[$i]' AND GroupID='$group' ") OR die(mysqli_error());
        if(mysqli_num_rows($result) > 0 && $j == 4){
            while ($row = mysqli_fetch_array($result)) {
                $module = $row['module'];
                $hall = $row['hall'];
                $pdf -> cell(30,20,$module."\r\n".$hall,1,1,'C');
            }
        } else if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_array($result)) {
            $module = $row['module'];
            $hall = $row['hall'];
            $pdf -> cell(30,20,$module."\r\n".$hall,1,0,'C');
        }
    } else if($j == 4) {
        $pdf -> cell(30,20,'-',1,1,'C');
    } else {
        $pdf -> cell(30,20,'-',1,0,'C');
    }
    }
}
$pdf->Output();
?>