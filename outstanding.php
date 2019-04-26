<!DOCTYPE html>
<html>
<head>
<title>Outstanding Orders</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<h1>Outstanding Orders</h1>
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
$connection = new mysqli("localhost", "dan", "password", "music");
$result = $connection->query("SELECT * FROM orders");

while($row = $result->fetch_array())
{
echo "<p>";
	echo "<strong>OrderID:</strong> " . $row["orderID"] . "<br />";
	echo "<strong>UserID: </strong> " . $row["userID"] . "<br />";
	echo "<strong>SongID:</strong> " . $row["songID"] . "<br />";
	echo "</p>";
}
	echo '<form method="post" action="index.php">';
	echo '<input type="submit" value="Home">';
	echo "</form>";
	}
	?>
</body>
</html>