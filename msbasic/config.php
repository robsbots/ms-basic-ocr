<?php
    
   $host_name = 'db.server.fqdm';
   $database = 'database';
   $user_name = 'db-user';
   $password = 'dB-pa55word#';

   $con = new mysqli($host_name, $user_name, $password, $database);
// check connection
   if (mysqli_connect_errno()) {
   exit('Connect failed: '. mysqli_connect_error());
   }
   
?>
