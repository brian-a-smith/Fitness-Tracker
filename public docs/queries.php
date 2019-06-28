<!--Final Project-->
<?php

function addUser($mysqli, $username, $password) {
	$add = "INSERT INTO users (username, password) 
	VALUES ('$username', '$password');";
	return $mysqli->query($add);
}
 
function loginUser($mysqli, $username, $password) {
	$user_pass = "SELECT password FROM users WHERE username= '$username';";
	$pass_query = $mysqli->query($user_pass);
	$pass = $pass_query->fetch_object();
	//echo "    pass_query= '$pass_query'";
	//echo "    pass->password = '$pass->password'";
	//return password_verify($password, $pass->password);
	if($password==$pass->password)
		return 1;
	else
		return 0;
}
?>












