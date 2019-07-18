
<?php
session_start();
if(isset($_POST['Login']))
{

	$conn = new mysqli('localhost','root','','phpb6');
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	if(isset($_POST['email']) && $_POST['email'] != '' )
	{
		$email = $_POST['email'];
	}
	else
	{
		$error[] = 'Email is missing';
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
			$password = md5($password);
			$query = "select * from person where Email='$email' AND Password='$password' limit 1";
			$data = mysqli_query($conn,$query);
			
			$countrow = mysqli_num_rows($data);
			if($countrow == 1)
			{
				$_SESSION['email'] = $email;
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

	Email :
	<input type = "text" name = "email" value = "<?php
	if(isset($_POST['email']) && $_POST['email'])
	{
		echo trim($_POST['email']);
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
