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
    
    <h1>My Food Diary</h1>
    <div class="buttonholder">
        <button onclick="window.location.href = 'addentry.html';">Add Entry</button>
    </div>
    <?php
//connect to the database
require_once('../mysqli_connect.php');

//create a query
$query = "SELECT meal, calories, protein, carbs, fat, sodium, date FROM user_data WHERE username='$user'";

$response = @mysqli_query($dbc, $query);

if($response){
  echo '<h3><p style="font-size:40">';
  echo '<table align="center"
  cellspacing="10" cellpadding="10">

  <tr><th align="left"><b>Meal&nbsp;&nbsp;</b></th>
  <th align="left"><b>calories&nbsp;&nbsp;</b></th>
  <th align="left"><b>Protein&nbsp;&nbsp;</b></th>
  <th align="left"><b>Carbs&nbsp;&nbsp;</b></th>
  <th align="left"><b>Fat&nbsp;&nbsp;</b></th>
  <th align="left"><b>Sodium&nbsp;&nbsp;</b></th>
  <th align="left"><b>Date&nbsp;&nbsp;</b></th></tr>';

  while($row = mysqli_fetch_array($response)){

    echo '<tr><td align="left">' .
    $row['meal'] . '</td><td align="left"><br>&nbsp;&nbsp;' .
    $row['calories'] . '</td><td align="left"><br>&nbsp;&nbsp;' .
    $row['protein'] . '</td><td align="left"><br>&nbsp;&nbsp;' .
    $row['carbs'] . '</td><td align="left"><br>&nbsp;&nbsp;' .
    $row['fat'] . '</td><td align="left"><br>&nbsp;&nbsp;' .
    $row['sodium'] . '</td><td align="left"><br>&nbsp;&nbsp;' .
    $row['date'] . '</td><td align="left"><br>&nbsp;&nbsp;';

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

</body>

</html>