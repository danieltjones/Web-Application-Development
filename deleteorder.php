<!DOCTYPE html>
<html>
<head>
<title>Delete Order</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<?php 
if(isset($_GET['action'])=='orderdeleted') {
	$UserID = $_POST["UserID"];
		
	if($UserID == "")
	{
	echo '<script type="text/javascript">'; 
	echo 'alert("Please enter the Customer Number.");'; 
	echo 'window.location.href = "deleteorder.php";';
	echo '</script>';
	}
else
{
	$connection = new mysqli("localhost", "dan", "password", "music");
	$connection->query("DELETE FROM orders WHERE UserID='$UserID'");
	$connection->close(); 
	
	{
	echo '<script type="text/javascript">'; 
	echo 'alert("Order Deleted.");'; 
	echo 'window.location.href = "deleteorder.php";';
	echo '</script>';
	}
	
	echo '<form method="post" action="index.php">';
	echo '<input type="submit" value="Home">';
	echo "</form>";
	}
}
	?>
</head>
<body>
<h1>Delete Order</h1>
<?php 
session_start();
if( isset($_SESSION["userID"]))
{
$userid1 = $_SESSION["userID"];
}
else
	{
	echo '<script type="text/javascript">'; 
	echo 'alert("Sorry, Nothing here.");'; 
	echo 'window.location.href = "index.php";';
	echo '</script>';
die();
}

if( $userid1 > 1)
	{
	echo '<script type="text/javascript">'; 
	echo 'alert("Sorry, Nothing here.");'; 
	echo 'window.location.href = "index.php";';
	echo '</script>';
	}
else
{
echo '<form method="post" action="?action=orderdeleted">';
	echo 'Customer No.: <input type="text" name="UserID"/> </br>';
	echo '<input type="submit" value="Go" />';
	echo '</form>';

	echo '<form method="post" action="index.php">';
	echo '<input type="submit" value="Home">';
	echo '</form>';
	}
	?>
</body>
</html>