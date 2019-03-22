<!DOCTYPE html>
<html>

<head>
<title>Sign Up</title>
	<?php 
	if(isset($_GET['action'])=='register') {
		
	$Forename = $_POST["Forename"];
	$Surname = $_POST["Surname"];				//creating variables for each of the required fields
	$Email = $_POST["Email"];
	$Password = $_POST["Password"];
	$AddressLine1 = $_POST["AddressLine1"];
	$AddressLine2 = $_POST["AddressLine2"];
	$Town = $_POST["Town"];
	$PostCode = $_POST["PostCode"];

	if($Forename == "" || $Surname == "" || $Email == "" || $Password == "" || $AddressLine1 == ""  || $AddressLine2 == ""||  $Town == "" || $PostCode == "") //Checking if any fields are empty
	
		{

	}
else
{
	$connection = new mysqli("localhost", "username", "password", "music");
	$connection->query("INSERT INTO users(Forename,Surname,Email,Password,AddressLine1,AddressLine2,Town,PostCode) VALUES ('" . $Forename . "','" . $Surname . "','" . $Email . "','" . $Password . "','" . $AddressLine1 . "','" . $AddressLine2 . "','" . $Town . "','" . $PostCode . "')") OR die($connection->error);
	$connection->close(); //SQL insert statment inserting vairables into the database
			{
	echo '<script type="text/javascript">'; 
	echo 'alert("Registration Successful. Please Log in. ");'; 
	echo 'window.location.href = "login.php";';
	echo '</script>';
	}
	}
	}
	?>
</head>

<body>
<h1>Sign Up</h1>

	<form method="post" action="?action=register">
	Forename: <input type="text" name="Forename"/> <br />
	Surname: <input type="text" name="Surname"/> <br />
	Address 1: <input type="text" name="AddressLine1"> <br />
	Address 2: <input type="text" name="AddressLine2"> <br />
	Town: <input type="text" name="Town"/> <br />
	Postcode: <input type="text" name="PostCode"/> <br />
	Email: <input type="text" name="Email"/> <br />
	Password: <input type="Password" name="Password"/> <br /> <br />
	<input type="submit" value="Submit" />
	</form>
</body>

</html>
