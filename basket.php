<!DOCTYPE html>

<html>
	<head>
		<title>Shopping Basket</title>
	</head>

	<body>
		<h1>Shopping Basket</h1>
		
		<?php
	
session_start();

$count = 1;
$price = 0;

	if (count($_SESSION['basket'])==0)
		{
	echo '<script type="text/javascript">'; 
	echo 'alert("You Have no items in your basket.");'; 	//Run if basked is empty
	echo 'window.location.href = "library.php";';
	echo '</script>';
	}
	else
		{
	$connection = new mysqli("localhost","dan","password","music"); //Database Connection
	
		foreach ($_SESSION["basket"] as $songID)
		{
		$result = $connection->query("SELECT * FROM songs WHERE songID=$songID");	//Get songs from DB
		$row = $result->fetch_array();

		echo "<p> Item " . $count . ": " . $row["Song"] . "<br />";
		echo "Price: &pound;" . $row["Price"] . "</p>";				//Display songs from DB
		$price = $row["Price"] + $price;
		$count++;
	}
	
	echo "Total cost is: &pound;" . $price;		//Calculates total price
	$connection->close();
	}
	{	
	echo '<form method="post" action="library.php">';
	echo '<input type="submit" value="Library">';
	echo "</form>";
	}	
	echo '<form method="post" action="orderplaced.php">';
	echo '<input type="submit" value="Place Order">';
	echo "</form>";
		?>
	</body>
</html>