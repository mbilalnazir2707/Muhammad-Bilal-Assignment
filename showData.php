<html>
<?php
session_start();
error_reporting(0);
$uname = $_SESSION['email'];
if($uname==true)
{
	$conn = new mysqli('localhost','root','','phpb6');
	$query="select * from person";
	$data = mysqli_query($conn,$query);
	if($conn->connect_error)
	{
		echo 'connection failed : '.$conn->connect_error;
	}
	else
	{ ?>
		<table border = 1>
			<tr>
				<td><a  href = "showData.php" class = "btn btn-default"><button>Home</button></a></td>
				<th colspan = 5>Person Information</th>
				<td><a  href = "AddNewData.php" class = "btn btn-default"><button>New Data</button></a></td>
				<td><a  href = "logout.php" class = "btn btn-default"><button>Logout</button></a></td>
			</tr>
			<tr>
				<th>Id</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Address</th>
				<th>Password</th>
				<th colspan =2>Operations</th>
			</tr>
			<?php
		while($result = mysqli_fetch_assoc($data))
		{
			echo"<tr>
			<td>".$result['Id']."</td>
			<td>".$result['First_Name']."</td>
			<td>".$result['Last_Name']."</td>
			<td>".$result['Email']."</td>
			<td>".$result['Address']."</td>
			<td>".$result['Password']."</td>
			<td><a href = Edit.php?id=".$result['Id']."><button>Update</button></a></td>
			<td><a href = Delete.php?id=".$result['Id']."><button>Delete</button></a></td>
			</tr>";
			
		}
	}

	$conn->close();
}
else
{

	header('location:index.php');
}

?>
</table>
</html>