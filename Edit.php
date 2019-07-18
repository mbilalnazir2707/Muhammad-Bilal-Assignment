<html>
<?php
session_start();
error_reporting(0);
$uname = $_SESSION['email'];
if($uname==true)
{
	$conn = new mysqli('localhost','root','','phpb6');
	if($conn->connect_error)	
	{
		echo 'Connection Failed'.$conn->connect_error;
	}
	else
	{
		$ID = $_GET['id'];
		$query = "select * from person where Id ='$ID'";
		$data = mysqli_query($conn,$query);
		while($result = mysqli_fetch_assoc($data))
		{
			$fName = $result['First_Name'];
			$lName = $result['Last_Name'];
			$email = $result['Email'];
			$address = $result['Address'];
			$password = $result['Password'];
		}
		$conn->close();
	}

	if(isset($_POST['Update']))	
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
				$password = md5($password);
				$query = "Update person SET First_Name='$first_name',Last_Name='$last_name',Email='$email',Password='$password',Address='$address' where Id='$ID'";
				if(mysqli_query($conn,$query))
				{
					echo 'Data Successfully Updated';
					header("refresh:1;url=showData.php");
				}
			
				$conn->close();

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
	<input type = "text" name = "name" value = "<?php echo $fName;
	?>">
	
	<br>
	Last Name:
	<input type = "test" name = "last_name" value = "<?php echo $lName;
	?>">
	<br>
	Email :
	<input type = "text" name = "email" value = "<?php echo $email;
	
	?>">
	<br>
	Address :
	<input type = "text" name = "address" value = "<?php echo $address;
	?>"><br/>
	Password :
	<input type = "password" name = "pass" value = "<?php echo $password;
	?>"><br/>
	Confirm password:
	<input type = "password" name = "con_pass" value = "<?php
	echo $password;
	?>"><br/>
	
	<input type = "submit" name = "Update" value = "Update">
	<a  href = "logout.php" class = "btn btn-default"><button>Logout</button></a>

</form>
</html>
