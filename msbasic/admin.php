<?php
    include 'session.php';
    include 'config.php';  
?>
<!DOCTYPE html>
<html>
<head>
  <style>
    h1 {text-align: center;}
  </style>
  <title>Admin</title>
</head>
<body>
<?php
    // include the menu and page header
    include './menu.php';
    include './header.php';
  
    // Are we high enough level ?
    if ( !isset($_SESSION['login_user']) ) {
      header("location: ./logout.php");
      echo '<p>Not logged in</p>';
    }
    
    else {
    	if ($_SESSION['level'] > 9) {
	    // Then show the forms
	    ?>
	    <br><br>
	    <p><form action="./adduser.php" method="post">
	      <center>
	        <h3>Create new user</h3>
	        <table>
	          <tr><td>email:</td><td><input type="text" name="emailaddr" required></td></tr>
	          <tr><td>password:</td><td><input type="password" name="password"  required></td></tr>
	        </table>
	        <input type="submit" value="submit" name="submit"><br>
	      </center>
	    </form></p>
	    <hr width="50%" />
	    
	    
	
	  <?php 
	    // List users
	
	    $sql = "SELECT * FROM users ORDER BY id;";
	
	    if ($result = mysqli_query($con,$sql)) {
	      echo '<center><p><h3>Edit user</h3></p><p><table><tr>';
	      echo '<th>id</th><th>username</th><th>password</th><th>level</th><th>delete</th><th>edit</th></tr><tr>';
	      while ( $row = $result->fetch_assoc()) {
	        echo '<tr><td align="right">';
	        echo $row['id'];
	        echo '</td><td>';
	        echo $row['username'];
	        echo '</td><td align="center">';
	        echo '<a href="">set</a>';
	        echo '</td><td align="right">';
	        echo $row['lvl'];
	        echo '</td><td align="center">';
	        echo '<a href="./deluser.php?val=';
	        //echo '"';
	        echo $row['id'];
	        //echo '"';
	        echo '">del</a>';
	        echo '</td><td align="center">';
	        echo '<a href="">ed</a>';
	        echo '</td></tr>';
	      }
     	 echo '</table><p></center>';
     	 }  
     }

  }
  
    
include 'footer.php';
?>

