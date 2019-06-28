<?php 
	session_start();
	$user=$_SESSION['user'];
?>
<html>
<body>
<!--Final Project-->
<div class="login">
<?php
	include 'vars.php';
	include 'queries.php';
	$username = $_POST["username"];
	$password = $_POST["auth"];
	//echo "'$username' and '$password'";
    //$hash_password = password_hash($password, PASSWORD_DEFAULT)
	$db = new mysqli($HOST, $USER, $PASSWORD, $DATABASE);
	$login=loginUser($db, $username, $password);
	//echo "login= '$login'";
	if ($login==1) {
		$_SESSION["user"] = $username;
		echo "<br>Login successful!<br>";
        echo "<br>Loading homepage";
        header("Refresh: 3;url=mydiary.php");
	 ?>
	 <form action="mydiary.php">
		<br><input type="submit" value="Enter">
	 </form>
	 
	 <?php
	}
    else{
        echo "<br>ERROR: INCORRECT USERNAME AND PASSWORD<br>";
        ?>
        <form action="landing.html">
			<input type="submit" value="Try again?">
		 </form>
		 <?php
    }
?>
</body>
</div>
</html>