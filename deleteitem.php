<!DOCTYPE html>
<html>
<head>
<title>Delete Item</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<?php 
if(isset($_GET['action'])=='itemdeleted') {
	$Song = $_POST["Song"];
		
	if($Song == "")
	{
	echo '<script type="text/javascript">'; 
	echo 'alert("Please fill the Song Name.");'; 
	echo 'window.location.href = "deleteitem.php";';
	echo '</script>';
	}
else
{
	$connection = new mysqli("localhost", "dan", "password", "music");
	$connection->query("DELETE FROM songs WHERE Song='$Song'");
	$connection->close(); 
	
	{
	echo '<script type="text/javascript">'; 
	echo 'alert("Item Deleted.");'; 
	echo 'window.location.href = "deleteitem.php";';
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
<h1>Delete Item</h1>
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
	echo '<form method="post" action="?action=itemdeleted">';
	echo 'Song: <input type="text" name="Song"/> </br>';
	echo '<input type="submit" value="Go" />';
	echo '</form>';
	echo '<form method="post" action="index.php">';
	echo '<input type="submit" value="Home">';
	echo '</form>';
	}
	?>
</body>
</html>