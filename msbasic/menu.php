<?php
session_start();
echo '<p>MENU : <a href="./index.php">home</a>';
//if(!isset($_SESSION['login_user'])) {
//	if ( $_SESSION['level'] > 0) {
//		echo ' - <a href="./pages.php">pages</a>';
//		echo ' - <a href="./ocr.php">ocr</a>';
//	}
//	if ( $_SESSION['level']  > 9) {
//		echo ' - <a href="./admin.php">admin</a>';
//		}
	

	
//}
if(isset($_SESSION['level'])) {
  if ( $_SESSION['level'] > 0) {
    echo ' - <a href="./ocr.php">ocr</a>';
    echo ' - <a href="./pages.php">pages</a>';
  }
  if ( $_SESSION['level'] > 9) {
    echo ' - <a href="./admin.php">admin</a>';
  }
  
}


if(!isset($_SESSION['login_user'])) {
   echo ' - <a href = "./login.php">Sign In</a></p>';
  }
else {
  echo ' - <a href = "./logout.php">Sign Out</a></p>';
  }
  
//   }
?>
