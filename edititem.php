<!DOCTYPE html>
<html>
<head>
<title>Edit Item</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<?php 
if(isset($_GET['action'])=='itemedited') {
	$SongID = $_POST["SongID"];
	$Song = $_POST["Song"];
	$Album = $_POST["Album"];
	$Price = $_POST["Price"];
	
	if($SongID == "" || $Song == "" || $Album == "" || $Price == "" )
	{
	echo '<script type="text/javascript">'; 
	echo 'alert("Please Fill in all the Fields");'; 
	echo 'window.location.href = "edititem.php";';
	echo '</script>';
	}
else
	
{
	$connection = new mysqli("localhost", "dan", "password", "music");
	$connection->query("UPDATE songs SET SongID='$SongID', Song='$Song', Album='$Album', Price='$Price' WHERE SongID='$SongID'");
	$connection->close(); 
	
	echo '<script type="text/javascript">'; 
echo 'alert("Item Edited");'; 
echo 'window.location.href = "edititem.php";';
echo '</script>';

	}
}
	?>
</head>
<body>
<h1>Edit Item</h1>
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

	echo '<form method="post" action="?action=itemedited">';
	echo 'SongID: <input type="text" name="SongID"/> </br>';
	echo 'Song: <input type="text" name="Song"/> </br>';
	echo 'Album: <input type="text" name="Album"/> </br>';
	echo 'Price: <input type="text" name="Price"/> </br>';
	echo '<input type="submit" value="Go" />';
	echo '</form>';
	
	echo '<form method="post" action="index.php">';
	echo '<input type="submit" value="Home">';
	echo '</form>';
	}
	?>
	
</body>
</html>