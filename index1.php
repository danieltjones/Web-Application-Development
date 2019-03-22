<!DOCTYPE html>
<html>
<head>
<title>Music Library</title>
</head>
<body>
<h1>Music Library</h1>

<?php

session_start();

if( isset($_SESSION["userID"]))				//Checking for a user ID
{
$userid1 = $_SESSION["userID"];				//Checking if the first user is logged in, if so then it stores that user in the vairable.
}


if( isset($_SESSION["userID"]))
{
	echo "Hello " . $_SESSION["Forename"] . " add some more message";  //Uses the forename in the database to display
	echo '<form method="post" action="library.php">';
	echo '<input type="submit" value="Library">';	
	echo "</form>";
	

}
else  													//What appears when there is no user logged in
{
echo"Please Log in, Sign up Or View Library";
	echo '<form method="post" action="login.php">';
		echo '<input type="submit" value="Log In">';
	echo "</form>";
	
	echo '<form method="post" action="signup.php">';
		echo '<input type="submit" value="Sign Up">';
	echo "</form>";
	
	echo '<form method="post" action="library.php">';
		echo '<input type="submit" value="View Library">';
	echo "</form>";
	
 die();
}


}

if( isset($_SESSION["userID"]))
{
	echo '<form method="post" action="signout.php">';
	echo '<input type="submit" value="Logout" />';				//If there is a user logged in show the signout button
	echo '</form>';
	}
?>
</body>
</html>
