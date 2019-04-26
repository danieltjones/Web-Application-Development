<!DOCTYPE html>
<html>

<head>
<title>Order Placed</title>
</head>
<body>
<h1>Order Placed</h1>
<?php

session_start();
$userid = $_SESSION["userID"];
$connection = new mysqli("localhost", "dan", "password", "music"); //Connection to the database


foreach ($_SESSION["basket"] as $id) //gets the songs that have been added into the basket
{
	$connection->query("INSERT INTO orders(userID,songID) VALUES (" . $userid . "," . $id . ")");	//inserts into orders table
}

$connection->close();
$count = 1;
$price = 0;

	if (count($_SESSION['basket'])==0) //if there is nothing in the basket run this script
	{
	echo '<script type="text/javascript">'; 
	echo 'alert("You have nothing in your basket.");'; 
	echo 'window.location.href = "index.php";';
	echo '</script>';
	
		die();
	}
	else                         //if there are items in the basket then run this script
		{
	$connection = new mysqli("localhost","dan","password","music");
		foreach ($_SESSION["basket"] as $songID)
		{
		$result = $connection->query("SELECT * FROM songs	 WHERE songID=$songID");  //displays all the songs that have been added into the basket
		$row = $result->fetch_array();
		echo "<p> Item " . $count . ": " . $row["Song"] . "<br/>";
		echo "Price: &pound;" . $row["Price"] . "</p>";
		$price = $row["Price"] + $price;	//adds the price into the variable
		$count++;
	}
	echo "Total Cost is: &pound;" . $price;	//displays the total price
	{
	echo '<form method="post" action="index.php">';
	echo '<input type="submit" value="Home">';
	echo "</form>";
	}
	$connection->close();
	}
unset($_SESSION['basket']); //clears items out of the basket once the order is placed



?>
</body>
</html>
