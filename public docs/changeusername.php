<?php   
session_start();

    include 'vars.php';
    $db = mysqli_connect($HOST, $USER, $PASSWORD, $DATABASE);

   
  $userinfo = array();
  if (!$db){
      die("Database Connection Failed" . mysqli_connect_error());
  }
  $user=$_SESSION['user'];
?>

<html>
<body>
<div class="login">
<?php
	include 'vars.php';
	include 'queries.php';
	$username = $_POST["con_username"];
	$newUser = $_POST["new_username"];

	$db = new mysqli($HOST, $USER, $PASSWORD, $DATABASE);

	$user_query = "SELECT * FROM users WHERE username= '$username';";
	$query = $db->query($user_query);
	$actual_name = $query->fetch_object();
	
	if ($username==$actual_name->username) {
		$_SESSION["user"] = $newUser;
		$sql = mysqli_query($db, "UPDATE users SET username='$newUser' WHERE users.username='$username'");
		echo "<br>Username change successful!<br>";
        echo "<br>Taking you back to settings";
        header("Refresh: 3;url=myaccount.php");
	 ?>
	 <form action="myaccount.php">
		<br><input type="submit" value="Enter">
	 </form>
	 
	 <?php
	}
    else{
        echo "<br>ERROR: INCORRECT USERNAME OR USERNAME IS ALREADY TAKEN<br>";
        ?>
        <form action="myaccount.php">
			<input type="submit" value="Try again?">
		 </form>
		 <?php $user=$_SESSION['user'];
    }
?>
</body>
</div>
</html>