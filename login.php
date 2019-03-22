<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<?php  

{ 
session_start();
if(isset($_GET['action'])=='login') {


$a = $_POST["Email"];
$b = $_POST["Password"];

$connection = new mysqli("localhost","username","password","music");		//connection to database


$result = $connection->query("SELECT * FROM users WHERE Email='$a' AND Password ='$b'");		//SQL query for email and password
$row = $result->fetch_array();

if($result->num_rows == 0)
	{
	echo '<script type="text/javascript">'; 
	echo 'alert("Your Email or Password is incorrect, Please Try again.");'; 	//JS for incorrect email or password
	echo '</script>';
	}
else
{
	$_SESSION["userID"] = $row["userID"];
	$_SESSION["Forename"] = $row["Forename"];		//Starts session that holds userID, forename and creates shopping basket
	$_SESSION["basket"] = array();
	header("Location: index.php");
}
$connection->close();			//Close database connection
}
}
	?>
</head>

<body>
	<h1>Login</h1>

	<form method="post" action="?action=login">
	Email : <input type="text" name="Email"> <br />		
	Password: <input type="Password" name="Password"> <br />
	<input type="submit" value="Sign In" />
	</form> 
</body>
</html>
