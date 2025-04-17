<?php
    include('session.php');
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
  
  <title>Image file : <?php echo "./pic/SrcPage-".$val.".png";?></title>
</head>
<body>
<?php
    include("config.php");
    include 'menu.php';
    include 'header.php';
    


$val = $_GET["val"];
$sql = "SELECT * FROM scans WHERE page=".$val." ORDER BY page";

$result = mysqli_query($con,$sql);
$count = mysqli_num_rows($result);


//echo '<p>'.(string)$result.'</p>'; 
  if ($result = mysqli_query($con,$sql)) {
    $firstrow = $result->fetch_assoc();
    //$pages = $result;
    $fname = $firstrow['filename'];
    $page = $firstrow['page'];
    //foreach ($firstrow as $d) {
    //  echo '<p>'.$fname.'</p>';
    //}
  }
//    while ( $row = $result->fetch_assoc()) {
?>
  <p><h2>The original picture - Page <?php echo $page; ?> </h2></p>
  <p align='center'><a href='javascript:history.back(1);'>back</a></p>
  <p><?php echo '<img src="'. $fname .'"</p>';?></p>

<?php include 'footer.php';
