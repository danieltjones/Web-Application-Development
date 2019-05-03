<!DOCTYPE html>
<html>
<head>
<title>Outstanding Orders</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<a href="index.php">Home</a> | 
<a href="library.php"> Music Library</a> |
<a href="additem.php"> Add Item</a> |
<a href="edititem.php"> Edit Item</a> |
<a href="deleteitem.php"> Delete Item</a> |
<a href="vieworders.php"> View Orders</a> |
<a href="deleteorder.php"> Delete Orders</a> |
<a href="signout.php"> Sign Out</a>
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
$result = $connection->query("SELECT orders.orderID, songs.Song, songs.Album, songs.Price, users.Forename, users.Surname, users.AddressLine1, users.AddressLine2, users.Town, Users.PostCode FROM orders INNER JOIN songs ON orders.songID=songs.songID INNER JOIN users on orders.userID=users.userID");


while($row = $result->fetch_array())
{

	echo "<h2>Order " . $row["orderID"] . "</h2>";
	echo "<strong>Song Name:</strong> " . $row["Song"] . "<br />";
	echo "<strong>Album:</strong> " . $row["Album"] . "<br />";
	echo "<strong>Price: </strong> &pound" . $row["Price"] . "<br />";


	echo "<h3>Send to:</h3>";
	echo "<strong>Forename: </strong> " . $row["Forename"] . "<br />";
	echo "<strong>Surname: </strong> " . $row["Surname"] . "<br />";
	echo "<strong>Address Line 1: </strong> " . $row["AddressLine1"] . "<br />";
	echo "<strong>Address Line 2: </strong> " . $row["AddressLine2"] . "<br />";
	echo "<strong>Town:</strong> " . $row["Town"] . "<br />";
	echo "<strong>Post Code:</strong> " . $row["PostCode"] . "<br />";
	echo "<br />";
	echo "<br />";
	
}
	
	}
	
	?>
</body>
</html>