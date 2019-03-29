<!DOCTYPE html>
<html>
<body>
<?php 
{
session_start();
if( isset($_SESSION["userID"]))
{

$id = $_GET["songid"];

$_SESSION["basket"][] = $id;        //Adds item to basket

header("Location: library.php");    //Moves user to page if logged in
}
else
header("Location: library.php");//Moves user to page if not logged in
}	
?>
</body>
</html>