<?php
   // Start the session
   session_start();

   if(!isset($_SESSION['login_user'])){
      header("location: index.php");
      die();
   }
   $login_session = $_SESSION['login_user'];
?>
