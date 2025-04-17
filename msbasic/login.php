<?php
   session_start();
   include("./config.php");
   $error='';
   if($_SERVER["REQUEST_METHOD"] == "POST") {
   
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($con,$_POST['username']);
      $mypassword = mysqli_real_escape_string($con,$_POST['password'] );

      $sql = "SELECT * FROM users WHERE username = '".$myusername."'";
      

      $result = mysqli_query($con,$sql);      
      $count = mysqli_num_rows($result);

      if($count == 1) {
      	$lvl = 0;
      	$user_record = $result->fetch_assoc();
      	
      	$pass = $user_record['password'];
        
	//while ( $row = $result->fetch_assoc()) {
	//   $_SESSION['uid'] = $row['id'];
        //   $lvl = $row['lvl'];
        //   $pass = $row['password'];
        //}
        // session_register("myusername");
        if(password_verify($mypassword, $pass)) {
          $_SESSION['uid'] = $user_record['id'];
          $_SESSION['login_user'] = $user_record['username'];
          $_SESSION['level'] = $user_record['lvl'];
         
          header("location: ./ocr.php");
        }
        else {
           $error = "Your Login Name or Password is invalid";
	}
     }
  }
?>
<html>
<head>
   <title>Login Page</title>
   <style type = "text/css">
      body {
         font-family:Arial, Helvetica, sans-serif;
         font-size:16px;
      }
      label {
         font-weight:bold;
         width:100px;
         font-size:16px;
      }
      .box {
         border:#666666 solid 2px;
      }
   </style>
</head>
<body bgcolor = "#FFFFFF">
  <?php
  include './menu.php';
   include './header.php';
  ?>
   <div align = "center">
      <p><h2>You need to log in to access this site<h2></p>
      <div style = "width:300px; border: solid 1px #333333; " align = "left">
         <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
         <div style = "margin:30px">
            <form action = "" method = "post">
               <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
               <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
               <input type = "submit" value = " Submit "/><br />
            </form>
            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
         </div>
      </div>
   </div>
</body>
</html>

