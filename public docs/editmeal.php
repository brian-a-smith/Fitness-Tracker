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
	  <title>Edit Meal</title>
   </head>
   <body>
   <br>
		 
		 <?php
     $result = mysqli_query($db, "SELECT MAX(entry_ID) FROM user_data");
    if (!$result) {
    printf("Error: %s\n", mysqli_error($db));
    exit();
    }
      $row=mysqli_fetch_array($result);
      $index=$row[0];
      $index++;	



      $meal=$_POST['mealname'];
      $calories=$_POST['calories'];
      $protein=$_POST['protein'];
      $carbs=$_POST['carbs'];
      $fat=$_POST['fat'];
      $sodium=$_POST['sodium'];
      $date=$_POST['date'];
      $entryid=$_POST['entry_ID'];

      echo "<br>";
       $sql = mysqli_query($db, "UPDATE user_data SET meal='$meal', calories='$calories', protein='$protein', carbs='$carbs', fat='$fat', sodium='$sodium', date='$date' WHERE user_data.entry_id='$entryid'");

    


      if ($sql) {
         echo "Meal edited! Taking you to back to the home page<br>";
         header("Refresh: 3;url=mydiary.php");
      ?>
      <form action="mydiary.php">
         <input type="submit" value="Homepage">
      </form>

      <?php
      } else {
         echo 'Failed to edit meal!<br>
          <form action="editentry.html">
         <input type="submit" value="Try again?">
      </form>';
      }
       
    ?>
   </body>
</html>   