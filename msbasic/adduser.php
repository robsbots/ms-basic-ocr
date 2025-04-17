<?php
    include('./session.php');
    include('./config.php');
    if ($_SESSION['level'] > 9) {
      if (isset($_POST['submit'])){
        $username = $_POST['emailaddr'];
 
        // Normal Password
        $pass = $_POST['password']; 
 
        // Securing password using password_hash
        $secure_pass = password_hash($pass, PASSWORD_BCRYPT);
 
        $sql = "INSERT INTO users (username, password,lvl) VALUES('".$username."', '".$secure_pass."', 1);";
        //echo "<p>".$sql.'</p>';
        $result = mysqli_query($con, $sql);
        header("location: ./admin.php");
      }
      //else echo "Whoops";
    }
    else {
      header("location: ./logout.php");
    }
?>

  
<p><a href="./admin.php">Admin</a><p>
</body>
</html>
