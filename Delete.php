<?php
session_start();
error_reporting(0);
$uname = $_SESSION['email'];
if($uname==true)
{

	$conn = new mysqli('localhost','root','','phpb6');
	$ID = $_GET['id'];

	$query="Delete from person where Id='$ID'";
	if($conn->connect_error)
	{
		echo 'Connection Failed : '.$conn->connect_error;
	}
	if(mysqli_query($conn,$query))
	{
		echo 'Data successully deleted.';
		header("refresh:1;url=showData.php");
	}

	$conn->close();
}
else
{

	header('location:index.php');
}

?>