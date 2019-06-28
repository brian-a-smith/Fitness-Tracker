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
    <form class="login" action="editmeal.php" method="POST">
        <div class="title">
            <br><br><br><br>
            <h1>Edit Entry</h1>
        </div>

<?php
//connect to the database
require_once('../mysqli_connect.php');

//create a query
$query = "SELECT entry_ID, date FROM user_data WHERE username='$user'";

$response = @mysqli_query($dbc, $query);

if($response){
  echo '<h3><p style="font-size:40">';
  echo '<table align="center"
  cellspacing="10" cellpadding="10">

  <tr><th align="left"><b>Date&nbsp;&nbsp;</b></th>
  <th align="left"><b>Entry ID&nbsp;&nbsp;</b></th></tr>';

  while($row = mysqli_fetch_array($response)){

    echo '<tr><td align="left">' .
    $row['date'] . '</td><td align="left"><br>&nbsp;&nbsp;' .
    $row['entry_ID'] . '</td><td align="left"><br>&nbsp;&nbsp;';

    echo '</tr>';
  }

  echo '</table>';
  echo '</p></h2>';
}

else{
  echo "Couldn't issue database query";

  echo ("Error description: " . mysqli_error($dbc));
}

mysqli_close($dbc);
?>

        <br>
        Entry ID:
        <input type="text" name="entry_ID">
        Meal Name:
        <input type="text" name="mealname">
        Calories:
        <input type="text" name="calories">
        Protein:
        <input type="text" name="protein">
        Carbs:
        <input type="text" name="carbs">
        Fat:
        <input type="text" name="fat">
        Sodium:
        <input type="text" name="sodium">
        Date:
        <input type="date" name="date">
        <div class="buttonholder">
            <input type="submit" value="Submit">
        </div>
    </form>
    </body>
    </html>