<!-- My Account Page -->
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
<!DOCTYPE html>
<html>
<head>
	<title>My Account 3066</title>
	<link rel="stylesheet" type="text/css" href="style/preloginstyle.css"> <!--CSS stylesheet reference-->
	<link rel="stylesheet" type="text/css" href="style/myaccountstyle.css"> <!--CSS stylesheet reference-->
	<script rel="script" src="jsscripts/myaccount.js" defer></script> <!--javascript reference-->
</head>
<body>
	<!--links-->
    <ul class="landingtop">
        <li>
            <a href="mydiary.php">My Diary</a>
        </li>
        <li>
            <a href="stats.php">My Stats</a>
        </li>
        <li>
            <a href="editdiary.php">Edit Diary</a>
        </li>
        <li>
            <a href="calculator.html">Calculators</a>
        </li>
        <li>
            <a href="myaccount.php">My Account</a>
        </li>
    </ul>
	<div class="title">
		<!--account information-->
		<h1><b>My Account Information</b></h1>
		</div>
		<h1>Username:  <?php echo "'$user'"; ?> </h1>
		<!--change username option-->
		<form class="login" action="changeusername.php" method="post">
			
				<br> Change Username <br>
				Enter Current Username: 
				<input type="text" name="con_username">
			
			<p>
				Enter New Username:
				<input type="text" name="new_username">
			</p>
			<div class="buttonholder">
            	<input type="submit" value="Change Username">
        	</div>
        	</form>	
		<!--change password option-->
			<p class="body">
				<br> Change Password <br>
				Enter Current Password: 
				<input type="text" name="con_username">
			</p>
			<p>
				Enter New Password:
				<input type="text" name="new_username">
			</p>
			<p>
				Confirm New Password:
				<input type="text" name="con_new_username">
			</p>
			<button onclick="window.location.href = 'changepass.php';">Change Password </button>
		<p><button onclick="window.location.href = 'landing.html';">Log Out</button></p>
		
	
</body>
</html>