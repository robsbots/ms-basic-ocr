<?php
  session_start();
  //include('./session.php');
?>
<!DOCTYPE html>
<html>
<head>
  <style>
    h1 {text-align: center;}
  </style>
  <title>Main page</title>
</head>
<body>
<?php
  include './menu.php';
  include './header.php';

  echo '<hr width="50%" />';
  echo '<center>';
     
    
  if(!isset($_SESSION['login_user'])) {
    echo '<p><a href="./login.php">Log in to take part</a></p>';
    echo '<hr width="50%">';
    echo '<p>If you have enough monkeys and enough typewriters etc etc.....</p>';
    echo '<p>Bill Gates released the source code for Micro-Soft Basic for the Altair 8080 ... as a pdf</p>';
    echo '<p>It would be great to have it as a real text document.</p>';
    echo '<p> If we can all copy a page or two into a text document and upload them, we can compare versions<br> ';
    echo 'of each page and create a checked copy that can be edited and maybe even compiled.</p>';
    echo '<p>Just like the good ol days with "type-ins", but crowd sourced :)</p>';
    echo '<p>If you would like to be part of "Monkey OCR" (Trade Mark Pending ;) ) email me <ahref="mailto:robsbots2021@gmail.com">here</a></p>';
    echo '<p><a href"./login.php">Log in here</a></p>';
    }
  else {
    echo '<p><a href="./ocr.php">OCR a file</a></p>';
    echo '<p><a href="./pages.php">View pages and text files</a></p>';
    }
 
  echo '</center>';
  include './footer.php';
?>
