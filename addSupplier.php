<?php include('include/connection.php'); ?><!-- include database connection -->
<?php //include('include/session.php'); ?><!-- include session -->
<?php 
	if(isset($_POST['submit']))
	{ 
		$s_name = $_POST['s_name'];
		$location = $_POST['location'];
		$email = $_POST['email'];
		$telephone = $_POST['telephone'];
		$credit_period = $_POST['credit_period'];

		if (empty($_POST['s_name'])||empty($_POST['location'])||empty($_POST['email'])||empty($_POST['telephone'])||empty($_POST['credit_period']))
		{
			
			//check supplier Name:
			if (empty($_POST['s_name'])) 
			{
				$errors['s_name'] = 'Supplier Name is Required';
			}

			
			//check User name:
			if (empty($_POST['location'])) 
			{
				$errors['location'] = 'Location is Required';
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
			if (empty($_POST['credit_period'])) 
			{
				$errors['credit_period'] = 'Credit Period is Required';
			}

		}

		else
		{
			//Insert Query of users add
			$sql = "INSERT INTO supplier (s_name,location,email,credit_period,telephone) VALUES ('$s_name','$location','$email','$credit_period','$telephone')";

			$sqlResult = mysqli_query($db, $sql);
			//$massage = base64_encode(urlencode("Successfully Added"));
			//header('Location:addUser.php?msg=' .$massage);
			if ($sqlResult) 
			{
			echo "<script>alert('Successfuly Added...')</script>";
           	echo "<script>window.open('addSupplier.php','_self')</script>";
			}
			exit();
		}
		

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Supplier</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="form-4">
	<form  method="post">
		<img src="../img/pharmacist.png">
		<h2>Add Supplier</h2>
		<div class="input_field-4">
				<p>Supplier Name</p>
				<input type="text" class="input-3" name="s_name" id="s_name" placeholder="Enter Supplier Name" required>
				<p>Location</p>
				<input type="text" class="input-3" name="location" id="location" placeholder="Enter  Location" required>
				<p>Email</p>
				<input type="email" class="input-3" name="email" id="email" placeholder="Enter the Email" required>
				<p>Contact No :</p>
				<input type="number" class="input-3" name="telephone" id="telephone" placeholder="Enter the Contact" title="The Valid Number" required>
				<p>Credit Period</p>
				<input type="number"  class="input-3" name="credit_period" id="credit_period" placeholder="Enter the credit Period" required>
		</div>
		<input type="submit" name="submit" value="Add Supplier" class="btn-5">
	</form>
</div>
</body>
</html>