<html>
<?php
session_start();
error_reporting(0);
$uname = $_SESSION['user_name'];
if($uname==true)
{
	if(isset($_POST['submit']))
	{

		$first_name = trim($_POST['name']);
		$last_name = trim($_POST['last_name']);
		$email = trim($_POST['email']);
		$address = trim($_POST['address']);
		$password = trim($_POST['pass']);
		$con_password = trim($_POST['con_pass']);

		if(isset($_POST['name']) && $_POST['name'] != '' )
		{
			$first_name = $_POST['name'];
		}
		else
		{
			$error[] = 'name is missing';
		}

		if(isset($_POST['last_name']) && $_POST['last_name'])
		{
			$last_name = $_POST['last_name'];
		}

		else
		{
			$error[] = 'last name is missing';
		}

		if(isset($_POST['email']) && $_POST['email'] != '')
		{
			$email = $_POST['email'];
		}
		else
		{
			$error[] = 'email is missing';
		}

		if(isset($_POST['address']) && $_POST['address'] != '')
		{
			$address = $_POST['address'];
		}
		else
		{
			$error[] = 'address is missing';
		}

		if(isset($_POST['pass']) && $_POST['pass'] != '')
		{
			$password = $_POST['pass'];
		}
		else
		{
			$error[] = 'password is missing';
		}
		if(isset($_POST['con_pass']) && $_POST['con_pass'] != '')
		{
			$con_password = $_POST['con_pass'];
		}
		else
		{
			$error[] = 'confirm password is missing';
		}

		if(($_POST['pass']) != ($_POST['con_pass']))
		{
			$error[] = 'password are not same';
		}

		if(isset($error) && count($error) > 0 )
		{

			foreach($error as $value)
			{
				echo $value;
				echo "<br>";
	
			}
		}	

		else
		{
			$conn = new mysqli('localhost','root','','phpb6');
			if($conn->connect_error)
			{
				echo 'Connection Failed : '. $conn->connect_error;
			}

			else
			{
				$stmt = $conn->prepare("insert into person(Id,First_Name,Last_Name,Email,Password,Address) values (null,?,?,?,?,?)");
				$stmt->bind_param("sssss",$first_name,$last_name,$email,$password,$address);
				$stmt->execute();
				echo 'Data successully added :)';
			
				$stmt->close();
				$conn->close();
				header("refresh:1;url=showData.php");

			}

		}	
	}
	
}
else
{

	header('location:index.php');
}
?>
<form  method = "POST">
	Name :
	<input type = "text" name = "name" value = "<?php
	if(isset($_POST['name']) && $_POST['name'])
	{
		echo trim($_POST['name']);
	}
	?>">
	
	<br>
	Last Name:
	<input type = "test" name = "last_name" value = "<?php
	if(isset($_POST['last_name']) && $_POST['last_name'])
	{
		echo trim($_POST['last_name']);
	}
	?>">
	<br>
	email :
	<input type = "text" name = "email" value = "<?php
	if(isset($_POST['email']) && $_POST['email'])
	{
		echo trim($_POST['email']);
	}
	?>">
	<br>
		Address :
	<input type = "text" name = "address" value = "<?php
	if(isset($_POST['address']) && $_POST['address'])
	{
		echo trim($_POST['address']);
	}
	?>"><br/>
	password :
	<input type = "password" name = "pass" value = "<?php
	if(isset($_POST['pass']) && $_POST['pass'])
	{
		echo trim($_POST['pass']);
	}
	?>"><br/>
	confirm password:
	<input type = "password" name = "con_pass" value = "<?php
	if(isset($_POST['con_pass']) && $_POST['con_pass'])
	{
		echo trim($_POST['con_pass']);
	}
	?>"><br/>
	
	<input type = "submit" name = "submit" value = "submit">
	<a  href = "logout.php" class = "btn btn-default"><button>Logout</button></a>

</form>
</html>
