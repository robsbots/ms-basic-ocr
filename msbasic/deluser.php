<?php
   include('session.php');
   include('config.php');

   $val = $_GET["val"];
   $sql = "SELECT * FROM users WHERE id=".$val;

   if ($_SESSION['level'] > 9) {
    	
      $result = mysqli_query($con,$sql);
         $count = mysqli_num_rows($result);
	 if ($count = 1) {
            $sql = "DELETE FROM users WHERE id=".$val;
            $result = mysqli_query($con,$sql);
            header("location: admin.php");
         }
         else {
            echo '<p>Too many results</p>';
         }
   }

?>
