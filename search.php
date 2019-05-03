<!DOCTYPE html>
<html>

<head>
<a href="index.php">Home</a> | 
<a href="library.php"> Music Library</a> |
<a href="search.php"> Search</a> |
<a href="signout.php"> Sign Out</a>
	<title>Search</title>

</head>
<body>
		<h1> Search</h1>
		<form method="post" action="?action=search">
			Search: <input type="text" name="search"/>
			<input type="submit" value="Submit"/>
		</form>

<?php

session_start();

	if(isset($_GET['action']) =='search')
	{
		$search = $_POST["search"];
		$count = 0;
		$connection = new mysqli("localhost", "dan", "password", "music"); 	
		$result = $connection->query("SELECT * FROM songs WHERE (`Song` LIKE '%".$search."%')");
		$connection->close();
		
		while($row = $result->fetch_array())
		{
			$itemID = $row["songID"];
			
			echo "<p>";
			echo "<strong>Song:</strong> " . $row["Song"] . "<br/>";
			echo "<strong>Album:</strong> " . $row["Album"] . "<br/>";
			echo "<strong>Price: &pound;</strong> " . $row["Price"] . "<br/>";
			echo "<strong>Description:</strong> " . $row["Description"] . "<br/>";
			echo "</p>";
			$count++;
		}
		
		echo '<form method="post" action="library.php">';
		echo '<input type="submit" value="View in Library">';
		echo '</form>';
		echo '</br>';
		echo '</br>';
		
		
		if($count == 0)
		{
			echo"<p>";
			echo "Sorry, no items were found!";
			echo"</p>";
		}
		
	}
	
?>


</body>
</html>
