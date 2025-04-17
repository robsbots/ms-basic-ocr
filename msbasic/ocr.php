<?php
  include 'session.php';
  include "config.php";
  $sqlString = "SELECT page FROM scans WHERE count < 2 ORDER BY page";
  
  if ($result = mysqli_query($con,$sqlString)) {
    $page_idx = array();
    while ( $row = $result->fetch_assoc()) {
      $page_idx[] = $row['page'];
    }
  }

  //$x=rand(1,314);
  $y=rand( 1, count($page_idx) );
  $page = $page_idx[$y];

  $numString = $page;//sprintf('%03d', $page);
  $imgstring = "<br><center><img src='./pic/SrcPage-";
  $imgstring .= $numString;
  $imgstring .= ".png'></center><br>";
?>
<!DOCTYPE html>
<html>
<head>
  <style>
    h1 {text-align: center;}
  </style>
  <title>OCR-<?php echo $numString; ?></title>
</head>
<body>
  <?php
    include "menu.php";
    include "header.php";
  ?>
  <p><h3>Create your file</h3></p>
  <p>Create a new text file in your favorite text editor.</p>
  <p>Save it as <b>"p<?php echo $numString.'.txt'; ?>"</b><p>
  <p><h3>OCR your file</h3></p>
  <p>Copy out the page below into your new file.</p>
  <p>Save your updates, then select your file and upload it below.</p>
  <p><form action="upload.php" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload text" name="submit">
  </form></p>
<?php
  echo $imgstring;
  include 'footer.php';
