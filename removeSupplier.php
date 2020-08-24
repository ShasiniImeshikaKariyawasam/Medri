<?php include('include/connection.php'); ?><!-- Include database connection -->
<?php //include('include/session.php');
	//Unauthorized Access Check
    //checkSession();
    //if(!isset($_SESSION['type']) || $_SESSION['type'] != '2')
    //{
      // header("Location:login.php");
      // exit();
   // }
 ?><!-- Include session -->

<!DOCTYPE html>
<html>
<head>
	<title>Remove Supplier</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container" style="margin-top: 50px;">
		<div class="alert alert-info" role="alert" style="font-weight:bold;font-size: 24px;">
  		<center>List of Supplier</center>
		</div>
		<hr  style="margin-top:10px;">
		<a href="addSupplier.php"><button class="btn btn-success" style="margin-left:935px;">Add New Supplier</button></a>
		<hr  style="margin-top:10px;">
<table class="table">
	<tr>
		<th>Supplier Id</th>
		<th>Supplier Name</th>
		<th>Location</th>
		<th>Email</th>
		<th>Contact No</th>
		<th>Credit Period</th>
		<th>Edit</th>
		<th>Remove</th>
		
	</tr>
	<?php 
		//Retrive Data from supplier table
		$sql = "SELECT * FROM supplier";
		//Performs query on database
		$result = $db->query($sql);
		if($result-> num_rows > 0){//Return the number of rows in result set
			while ($row = $result-> fetch_assoc()) 
			{//Fetch a result row as an associative array
				//Show Supplier data as table with edit and delte button
				echo "<tr>
					<td>".$row['s_id']."</td>
					<td>".$row['s_name']."</td>
					<td>".$row['location']."</td>
					<td>".$row['email']."</td>
					<td>".$row['telephone']."</td>
					<td>".$row['credit_period']."</td>
					<td>
						<form method=\"post\" action=\"editSupplier.php\">
						<input type=\"hidden\" name=\"edit\" value=".$row['s_id'].">
						<input type=\"submit\" name=\"submit1\" class=\"btn btn-primary\" value=\"Edit\" style=\"width:100px;\">
						</form>
					</td>
					<td>
						<form method=\"post\">
						<input type=\"hidden\" name=\"delete\" value=".$row['s_id'].">
						<input type=\"submit\" name=\"submit2\" class=\"btn btn-danger\" value=\"Delete\">
						</form>
					</td>
				</tr>
				";
			}	
		} 
	
		echo "</table>";
		
		
	if (isset($_POST['submit2'])) 
	{
		$delete_id = $_POST['delete'];
		//Delete Data from employee table by id After clicking delete button
		$delete_query ="DELETE FROM supplier WHERE s_id = '$delete_id' ";
		$delete_result = mysqli_query($db,$delete_query);

		if ($delete_result) 
		{
			//after performs a query on database get alet 
			echo "<script>alert('Successfuly Removed...')</script>";
            echo "<script>window.open('removeSupplier.php','_self')</script>";
		}
	}
	mysqli_close($db);
	?>
	</div>
</body>
</html>