
<?php
session_start();
if(isset($_POST['Login']))
{

	$conn = new mysqli('localhost','root','','phpb6');
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	if(isset($_POST['username']) && $_POST['username'] != '' )
	{
		$username = $_POST['username'];
	}
	else
	{
		$error[] = 'USer Name is missing';
	}
	if(isset($_POST['password']) && $_POST['password'] != '' )
	{
		$password = $_POST['password'];
	}
	else
	{
		$error[] = 'password is missing';
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

		if($conn->connect_error)
		{
			echo 'Connection failed : '.$conn->connect_error;
		}

		else
		{
			
			$query = "select * from login where UserName='$username' AND Password='$password' limit 1";
			$data = mysqli_query($conn,$query);
			
			$countrow = mysqli_num_rows($data);
			if($countrow == 1)
			{
				$_SESSION['user_name'] = $username;
				header('location:showData.php');
			}

			else
			{
				header("refresh:1; url=index.php");
			}
				

			$conn->close();
		}
	}
}
?>

<html>

<form method = "POST" >

	User Name :
	<input type = "text" name = "username" value = "<?php
	if(isset($_POST['username']) && $_POST['username'])
	{
		echo trim($_POST['username']);
	}
	?>"><br/>
	Password:
	<input type = "password" name = "password" value = "<?php
	if(isset($_POST['password']) && $_POST['password'])
	{
		echo trim($_POST['password']);
	}
	?>"><br/>
	
	<input type = "submit" name = "Login" value = "Login">

</form>
</html>
