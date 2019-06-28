<!DOCTYPE html>
<html>
   <head>
	  <title>Registration</title>
   </head>
   <body>
   <br><br><br><br>
	  <?php
		 include 'vars.php';
		 include 'queries.php';
		 $db = new mysqli($HOST, $USER, $PASSWORD, $DATABASE);
		 $username = $_POST["username"];
		 $password = $_POST["auth"];
		 $conf_password = $_POST["auth"];
		 
		 if ($password != $conf_password) {
			echo "Passwords do not match!<br>";
		 ?>
		 <form action="register.html">
			<input type="submit" value="Try again?">
		 </form>
		  <?php
		 }  else if ($password == "") {
			echo "Password may not be empty!<br>";
		 ?>
		 <form action="register.html">
			<input type="submit" value="Try again?">
		 </form>
		 <?php
		 }  else {
			//$hashed_password = password_hash($password, PASSWORD_DEFAULT);
			$added_user = addUser($db, $username, $password);
			if ($added_user) {
			   echo "User added! Taking you to the login page<br>";
			   header("Refresh: 5;url=landing.html");
			?>
			<form action="landing.html">
			   <input type="submit" value="Login?">
			</form>
			<?php
		    }  
		       else {
			   echo "Failed to add user!<br>";
			?>

			<form action="register.html">
			   <input type="submit" value="Try again?">
			</form>
			<?php
			}
			?>
			<?php
	     } ?>
	  
   </body>
</html> 