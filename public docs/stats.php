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
<?php
    //connect to the database
require_once('../mysqli_connect.php');
date_default_timezone_set('America/New_York');
$date= date("Y-m-d");

//create a query
$query = "SELECT calories, protein, carbs, fat, sodium FROM user_data WHERE date='$date' AND username='$user';";

$response = @mysqli_query($dbc, $query);

if($response){
  echo '<h3><p style="font-size:40">';
  echo '<table align="center"
  cellspacing="10" cellpadding="10">

  <tr><th align="left"><b>Calories Today&nbsp;&nbsp;</b></th>
  <th align="left"><b>Protein Today&nbsp;&nbsp;</b></th>
  <th align="left"><b>Carbs Today&nbsp;&nbsp;</b></th>
  <th align="left"><b>Fat Today&nbsp;&nbsp;</b></th>
  <th align="left"><b>Sodium Today&nbsp;&nbsp;</b></th></tr>';

  while($row = mysqli_fetch_array($response)){

    echo '<tr><td align="left">' .
    $row['calories'] . '</td><td align="left"><br>&nbsp;&nbsp;' .
    $row['protein'] . '</td><td align="left"><br>&nbsp;&nbsp;' .
    $row['carbs'] . '</td><td align="left"><br>&nbsp;&nbsp;' .
    $row['fat'] . '</td><td align="left"><br>&nbsp;&nbsp;' .
    $row['sodium'] . '</td><td align="left"><br>&nbsp;&nbsp;';

    echo '</tr>';
  }

  echo '</table>';
  echo '</p></h2>';
}

else{
  echo "Couldn't issue database query";

  echo ("Error description: " . mysqli_error($dbc));
}

//mysqli_close($dbc);
?>

<?php
//create a query
$query = "SELECT SUM(calories) AS calories_sum, SUM(protein) AS protein_sum, SUM(carbs) AS carbs_sum, SUM(fat) AS fat_sum, SUM(sodium) AS sodium_sum FROM user_data WHERE username='$user';";

$response = @mysqli_query($dbc, $query);

if($response){
  echo '<h3><p style="font-size:40">';
  echo '<table align="center"
  cellspacing="10" cellpadding="10">

  <tr><th align="left"><b>Calories All Time&nbsp;&nbsp;</b></th>
  <th align="left"><b>Protein All Time&nbsp;&nbsp;</b></th>
  <th align="left"><b>Carbs All Time&nbsp;&nbsp;</b></th>
  <th align="left"><b>Fat All Time&nbsp;&nbsp;</b></th>
  <th align="left"><b>Sodium All Time&nbsp;&nbsp;</b></th></tr>';

  while($row = mysqli_fetch_array($response)){

    echo '<tr><td align="left">' .
    $row['calories_sum'] . '</td><td align="left"><br>&nbsp;&nbsp;' .
    $row['protein_sum'] . '</td><td align="left"><br>&nbsp;&nbsp;' .
    $row['carbs_sum'] . '</td><td align="left"><br>&nbsp;&nbsp;' .
    $row['fat_sum'] . '</td><td align="left"><br>&nbsp;&nbsp;' .
    $row['sodium_sum'] . '</td><td align="left"><br>&nbsp;&nbsp;';

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