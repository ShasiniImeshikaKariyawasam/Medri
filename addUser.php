<?php require_once('include/connection.php'); ?>
<?php// require_once('include/session.php'); ?>
<?php 

	$errors = array('e_id'=>'','f_name'=>'', 'l_name'=>'', 'user_name'=>'', 'email'=>'', 'telephone'=>'', 'nic'=>'', 'password'=>'', 'type'=>'');

	if(isset($_POST['submit']))
	{ 
		$e_id=$_POST['e_id'];
		$f_name=$_POST['f_name'];
		$l_name=$_POST['l_name'];
		$user_name=$_POST['user_name'];
		$email=$_POST['email'];
		$telephone=$_POST['telephone'];
		$nic=$_POST['nic'];
		$password=$_POST['password'];
		$type=$_POST['type'];
		$passwordHash= md5($password);

		if (empty($_POST['e_id'])||empty($_POST['f_name'])||empty($_POST['l_name'])||empty($_POST['user_name'])||empty($_POST['email'])||empty($_POST['telephone'])||empty($_POST['nic'])||empty($_POST['password'])||empty($_POST['type']))
		{
			
			if (empty($_POST['e_id'])) 
			{
				$errors['e_id'] = 'Employee ID is Required';
			}

			//check first Name:
			if (empty($_POST['f_name'])) 
			{
				$errors['f_name'] = 'First Name is Required';
			}

			// check Last name:
			if (empty($_POST['l_name'])) 
			{
				$errors['l_name'] = 'Last Name is Required';
			}

			//check User name:
			if (empty($_POST['user_name'])) 
			{
				$errors['user_name'] = 'User Name is Required';
			}

			//check an email
			if (empty($_POST['email'])) 
			{
				$errors['email'] = 'An Email is Required';
			}
			else
			{
				if (!filter_var($email,FILTER_VALIDATE_EMAIL)) 
				{
					$errors['email'] = 'An Email Must Be Valid Email Address';
				}
			}

			//check telephone number:
			if (empty($_POST['telephone'])) 
			{
				$errors['telephone'] = 'Telephone number is Required';
			}

			//check nic
			if (empty($_POST['nic'])) 
			{
				$errors['nic'] = 'National Identity Number is Required';
			}

			//check password
			if (empty($_POST['password'])) 
			{
				$errors['password'] = 'Password is Required';
			}

			// check type:
			if (empty($_POST['type'])) 
			{
				$errors['type'] = 'Type is Required';
			}
		}

		else
		{
			//Insert Query of users add
			$sql = "INSERT INTO employee (e_id,f_name,l_name,user_name,email,nic,password,telephone,type) VALUES ('$e_id','$f_name','$l_name','$user_name','$email','$nic','$passwordHash','$telephone','$type')";

			$sqlResult = mysqli_query($db, $sql);
			//$massage = base64_encode(urlencode("Successfully Added"));
			//header('Location:addUser.php?msg=' .$massage);
			if ($sqlResult) 
			{
			echo "<script>alert('Successfuly Added...')</script>";
           	echo "<script>window.open('addUser.php','_self')</script>";
			}
			exit();
		}
		
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add User</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<form class="form-1" method="post">
		<h3 class="error-msg"><?php include('include/message.php'); ?></h3> 
		<h2>Add User</h2>
		<div class="input_field-5">
				<p>Employee ID</p>
				<input type="text" class="input-4" name="e_id" id="e_id" placeholder="Enter Employee ID" required>
				<div class="redText"> <?php echo $errors['e_id']; ?>	</div>
				<p>First Name</p>
				<input type="text" class="input-4" name="f_name" id="f_name" placeholder="Enter First Name" required>
				<div class="redText"> <?php echo $errors['f_name']; ?>	</div>
				<p>Last Name</p>
				<input type="text" class="input-4" name="l_name" id="l_name" placeholder="Enter Last Name" required>
				<div class="redText"> <?php echo $errors['l_name']; ?>	</div>
				<p>User Name</p>
				<input type="text" class="input-4" name="user_name" id="user_name" placeholder="Enter User Name" required>
				<div class="redText"> <?php echo $errors['user_name']; ?>	</div>
				<p>Email</p>
				<input type="email" class="input-4" name="email" id="email" placeholder="Enter Email" required>
				<div class="redText"> <?php echo $errors['email']; ?>	</div>
				<p>Telephone</p>
				<input type="number" class="input-4" name="telephone" id="telephone" placeholder="Enter Telephone Number" required>
				<div class="redText"> <?php echo $errors['telephone']; ?>	</div>
				<p>Nic</p>
				<input type="text" class="input-4" name="nic" id="nic" placeholder="Enter the Nic Number" required>
				<div class="redText"> <?php echo $errors['nic']; ?>	</div>
				<p>Password</p>
				<input type="password" class="input-4" name="password" id="password" placeholder="Enter Password" required>
				<div class="redText"> <?php echo $errors['password']; ?>	</div>
				<p>type</p>
				<input type="number" class="input-4" name="type" id="type" placeholder="Enter Type" required>
				<div class="redText"> <?php echo $errors['type']; ?>	</div>
		</div>
		<input type="submit" name="submit" value="Add User" class="btn-5">
	</form>
</body>
</html>