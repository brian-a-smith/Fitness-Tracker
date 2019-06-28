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
   <head>
	  <title>Add Meal</title>
   </head>
   <body>
   <br>
		 
		 <?php
  
  $result = mysqli_query($db, "SELECT MAX(entry_ID) FROM user_data");
if (!$result) {
    printf("Error: %s\n", mysqli_error($db));
    exit();
}
else{
$row=mysqli_fetch_array($result);
$index=$row[0];
$index++;
}		



      $meal=$_POST['mealname'];
      $calories=$_POST['calories'];
      $protein=$_POST['protein'];
      $carbs=$_POST['carbs'];
      $fat=$_POST['fat'];
      $sodium=$_POST['sodium'];
      $date=$_POST['date'];

      echo "<br>";
       $sql = mysqli_query($db, "INSERT INTO user_data (meal, calories, protein, carbs, fat, sodium, date, username) VALUES ('$meal', '$calories', '$protein', '$carbs', '$fat', '$sodium', '$date', '$user')");

    


      if ($sql) {
         echo "Meal Added! Taking you to back to the home page<br>";
         header("Refresh: 3;url=mydiary.php");
      ?>
      <form action="mydiary.php">
         <input type="submit" value="Homepage">
      </form>
      <?php
      } else {
         echo 'Failed to add meal!<br>
          <form action="addentry.html">
         <input type="submit" value="Try again?">
      </form>';
      }
       
    ?>
   </body>
</html>   