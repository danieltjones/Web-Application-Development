<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<?php 
if(isset($_GET['action'])=='itemadded') {
	$Song = $_POST["Song"];
	$Album = $_POST["Album"];
	$Price = $_POST["Price"];
	$Description = $_POST["Description"];
	
	if($Song == "" || $Album == "" || $Price == "" || $Description == "" )
	{
	echo '<script type="text/javascript">'; 
	echo 'alert("Please fill in all the fields");'; 
	echo 'window.location.href = "additem.php";';
	echo '</script>';
	}
else
{
	$connection = new mysqli("localhost", "dan", "password", "music");
	$connection->query("INSERT INTO songs(Song,Album, Price,Description) VALUES ('" . $Song . "','" . $Album . "','" . $Price . "','" . $Description ."')") OR die($connection->error);
	$connection->close();
	
	{
	echo '<script type="text/javascript">'; 
	echo 'alert("Item Added.");'; 
	echo 'window.location.href = "additem.php";';
	echo '</script>';
	}
	}
}
	
	?>
</head>
<body>
<h1>Add New Item</h1>
<?php 

session_start();
if( isset($_SESSION["userID"]))
{
$userid1 = $_SESSION["userID"];
}
else
	{
	echo '<script type="text/javascript">'; 
	echo 'alert("If you are the admin log in. If not go away.");'; 
	echo 'window.location.href = "index.php";';
	echo '</script>';
die();
}
if( $userid1 > 1)
	{
	echo '<script type="text/javascript">'; 
	echo 'alert("You should not be here...");'; 
	echo 'window.location.href = "index.php";';
	echo '</script>';
	}
else
{
	echo '<form method="post" action="?action=itemadded">';
	echo 'Name: <input type="text" name="Song"/> </br>';
	echo 'Album: <input type="text" name="Album"/> </br>';
	echo 'Price: <input type="text" name="Price"/> </br>';
	echo 'Description: <input type="text" name="Description"/> </br>';
	echo'<br>';
	echo'<input type="submit" value="Go" />';
	echo'</form>';
	
	echo '<form method="post" action="index.php">';
	echo '<input type="submit" value="Home">';
	echo '</form>';
}
	?>
</body>
</html>