<!DOCTYPE html>
<html>
<head>
<title>Library</title>
</head>

<body>
<h1>Library</h1>
<?php 
	{
	echo '<form method="post" action="index.php">';
	echo '<input type="submit" value="Home">';
	echo "</form>";
	}
$connection = new mysqli("localhost", "dan", "password", "music");		//Connection to database
$result = $connection->query("SELECT * FROM songs");			//All songs from the database are held in variable

session_start();
if( isset($_SESSION["userID"]))			//Run this code if there is a user logged in
{

while($row = $result->fetch_array())
{
$songID = $row["songID"];					//Grabs the song ID

echo "<p>";
	echo "<strong>Song:</strong> " . $row["Song"] . "<br />";
	echo "<strong>Album:</strong> " . $row["Album"] . "<br />";
	echo "<strong>Price: &pound;</strong> " . $row["Price"] . "<br />";
	echo "<strong>Description:</strong> " . $row["Description"] . "<br />";		//Displays song information for logged in user
	echo "<a href='add.php?songid=" . $songID . "'> Add To Basket </a>";
	echo "</p>";
}
}
else{
	while($row = $result->fetch_array())
{
$menuID = $row["songID"];

echo "<p>";
	echo "<strong>Song:</strong> " . $row["Song"] . "<br />";
	echo "<strong>Album:</strong> " . $row["Album"] . "<br />";				//Show this code if user is not logged in
	echo "<strong>Price: &pound;</strong> " . $row["Price"] . "<br />";
	echo "<strong>Description:</strong> " . $row["Description"] . "<br />";
	echo "</p>";
}
}
	if (empty($_SESSION["basket"]) )		//If basket is empty run this
	{
	}
	else
	{
	echo '<form method="post" action="basket.php">';		//If there is something in the basket run this
	echo '<input type="submit" value="Basket">';
	echo "</form>";
	}



	?>
	
</body>
</html>