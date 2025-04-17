<?php
  include "session.php";
  include "menu.php";
  include "header.php";
  include "config.php";	  
?>
<!DOCTYPE html>

<html>
<head>
  <style>
    h1 {text-align: center;}
  </style>
  <title>Page images and OCR Texts</title>
</head>
<body>
  <center><h3>Page images and OCR Texts</h3></center>
<?php
  
	
	echo '<center><table><tr>';
	$sqlString = "SELECT * FROM scans ORDER BY page";
	
	if ($result = mysqli_query($con,$sqlString)) {
		//$pages = $result;
		//echo '<p>'.$result.'</p>';
		while ( $row = $result->fetch_assoc()) {
        	
            
            echo'<td><center><p>'.$row['page'].'</center></p>';
            echo'<p><center><a href=./page.php?val="'.$row['id'].'"><img src="'.$row["thumbnail"].'" width=100,height=100></a></center></p>';
            //echo '<p>'.$row["filename"].'</p>';
            $sql = "SELECT * FROM texts ORDER BY scan";
	
			$found = 0;
			if ($tresult = mysqli_query($con,$sql)) {
           		while ( $trow = $tresult->fetch_assoc()) {
            		if ($row['page'] == $trow['scan']) {
						echo '<p><center><a href=./text.php?val="'.$trow["scan"].'">p'.$trow["scan"].'.txt</a></center></p>';
						$found=1;
            		}
        		}
        	}
        	if ($found==0) {
        		echo '<center><p>-----</center></p>';
        	}
            //echo $row['filename'];
            //echo $row['id'];
            echo '</td>';
        	
        	$Ccount += 1;
        	if ($Ccount == 8) {
        		$Ccount = 0;
        		echo'</tr><tr>';	
        	}
        }
    }
    echo '</tr></table></center>';	
include './footer.php';
