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
	$currpassword = $_POST["current_pass"];
	$newpass = $_POST["new_pass"];
	$connewpass = $_POST["con_new_pass"];

	$db = new mysqli($HOST, $USER, $PASSWORD, $DATABASE);

	$user_query = "SELECT * FROM users WHERE username= '$user';";
	$query = $db->query($user_query);
	$actual_name = $query->fetch_object();
	
	if ($currpassword==$actual_name->password && $newpass==$connewpass) {
		$sql = mysqli_query($db, "UPDATE users SET password='$newpass' WHERE users.username='$user'");
		echo "<br>Password change successful!<br>";
        echo "<br>Taking you back to settings";
        header("Refresh: 3;url=myaccount.php");
	 ?>
	 <form action="myaccount.php">
		<br><input type="submit" value="Enter">
	 </form>
	 
	 <?php
	}
    else{
        echo "<br>ERROR: INCORRECT PASSWORD <br>";
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