<!--Final Project-->
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

<!--Final Project-->
<!DOCTYPE html>
<html>

<head>
    <title>Food Diary 3066</title>
    <link rel="stylesheet" type="text/css" href="style/preloginstyle.css">
</head>

<body>
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
            <h1>Change Account Information</h1>
            Current user is <?php echo "'$user'"; ?>
        </div>
    <form class="login" action="changeusername.php" method="POST">
        
        Current username:
        <input type="text" name="con_username">
        New username:
        <input type="text" name="new_username">
        <div class="buttonholder">
            <input type="submit" value="Change">
        </div>
    </form>

    <form class="login" action="changepass.php" method="POST">
        
        
        Current password:
        <input type="password" name="current_pass">
        New password:
        <input type="password" name="new_pass">
        Confirm new password:
        <input type="password" name="con_new_pass">
        <div class="buttonholder">
            <input type="submit" value="Change">
        </div>
    </form>

    <p><button onclick="window.location.href = 'landing.html';">Log Out</button></p>
</body>

</html>