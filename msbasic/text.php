<?php
include('session.php');
include("config.php");
include 'menu.php';
include 'header.php';

$val = $_GET["val"];
$sql = "SELECT * FROM texts WHERE scan=".$val." ORDER BY scan";
$fname = "";

$result = mysqli_query($con,$sql);
$count = mysqli_num_rows($result);

if ($count = 1) {
  if ($result = mysqli_query($con,$sql)) {
    $firstrow = $result->fetch_assoc();
    $page = $firstrow['scan'];
    $fname = $firstrow['filename'];
  }
}


?>
<!DOCTYPE html>
<html>
<head>
  <style>
    h1 {text-align: center;}
  </style>
  <style>
    h2 {text-align: center;}
  </style>
  
  <title>Text file : </title>
</head>
<body>
  <p><h2>The OCR'd text file :- Page <?php echo $page; ?></h2></p>
  <p align='center'><a href='javascript:history.back(1);'>back</a></p>
  <p><center><table><tr><td><pre><?php echo nl2br(file_get_contents($fname)); ?></pre></td></tr></table></center></p>
<?php include 'footer.php';
