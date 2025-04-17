<?php
  include('session.php');
  include("config.php");
  include 'menu.php';
?>
<!DOCTYPE html>
<html>
<head>
  <style>
    h1 {text-align: center;}
  </style>
  <title>File upload</title>
</head>
<body>
<p><h1>MI - Monkey Intelegence (Beating AI)</h1></p>
<?php
$target_dir = "./pages/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

// Check file size
if ($_FILES["fileToUpload"]["size"] > 10000) {
  echo 'Sorry, your file is too large.';
  $uploadOk = 0;
}

// Allow certain file formats
//if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//&& $imageFileType != "gif" ) {
//  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//  $uploadOk = 0;
//}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo 'Sorry, your file was not uploaded.';
// if everything is ok, try to upload file
  }
else {
  $filetail = (string)date_timestamp_get(date_create());

  // Get file name -- Update : Add hidden field for picture id to input form and use that to create the file name
  $filename = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"] ) );
  // Get page number
  $page = (int)substr($filename, 1, -4);
  
  $outfile = './pages/p'.(string)$page .'-'.$filetail.'.txt';
  //echo '<p>Session id: '.(string)$_SESSION['uid'].'</p>';
  $user = $_SESSION['uid'];
  $sql = "INSERT INTO texts (filename,scan,user) VALUES ('".$outfile."',".$page.",".$user.");";
  //echo '<p>'.$sql.'</p>';
  // Move text file from tmp to ./pages folder
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $outfile)) {
    // Add to database
    if ( mysqli_query($con,$sql)) {
      echo '<p></p>';
    }
    else {
      // We failed to add the file to the database
      //echo '<p>Error executing sql: '. $conn->error.'</p>';
      echo 'Sorry, there was an error uploading your file.';
    }
    
    $sql = "UPDATE scans SET count = count + 1 WHERE id=".$page.";";

    if ( mysqli_query($con,$sql)) {
      echo '<p><center><h2>'.$filename.' ocr uploaded. Thank you.</h2><center></p>';
      
      echo '<p><a href="ocr.php">ocr another</a></p>';
    }
    else {
      // We failed to add the file to the database
      //echo '<p>Error executing sql: '. $conn->error.'</p>';
      echo 'Sorry, there was an error indexing your file.';
    }

    //echo '<p>The file '. $filename . ' has been uploaded.<p>';
    
  } else {
    // We failed to upload the file
    echo 'Sorry, there was an error uploading your file.';
    echo '<p><a href="index.php">home</a></p>';
  }
}

?>
