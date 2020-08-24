<?php require_once('include/connection.php'); ?>
<?php //require_once('include/session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body> 
	<div class="container" style="margin-top: 50px;">
		<table class="table table-hover">
		<tr>
			<th>Supplier Id</th>
			<th>Supplier Name</th>
			<th>Location</th>
			<th>Email</th>
			<th>Contact No</th>
			<th>Credit Period</th>
		</tr>
		<?php
		// retrive all the data from supplier table
		$sql = "SELECT * FROM supplier";
		//Performs a query on Database
		$result = mysqli_query($db,$sql);

		if ($result -> num_rows > 0) {//Return the number of rows in result set
			while ($row = $result -> fetch_assoc()) {//Fetch a result row as an associative array
				echo "
			<tr>
				<td>".$row['s_id']."</td>
				<td>".$row['s_name']."</td>
				<td>".$row['location']."</td>
				<td>".$row['email']."</td>
				<td>".$row['telephone']."</td>
				<td>".$row['credit_period']."</td>
			</tr>	
			";
			}
		echo "</table";
		}
		else{
			echo "0 result";
		}
		$db ->close();
		?>
	</table>
	</div>

</body>
</html>