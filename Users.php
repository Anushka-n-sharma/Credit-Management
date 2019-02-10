
<html>

	<head>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="jquery.js"></script>
	
		<title>Users</title>

	</head>
	<style>
		table {		    
		   margin-top: 3%;
		   overflow-x: hidden;
		}

</style>
	<body>
		
		<?php
			$con=mysqli_connect("localhost","root","","transfercredits");
			if (mysqli_connect_error())
			{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			$result = mysqli_query($con,"SELECT * FROM users");
			echo"<center ><h1>Users Details</h1></center>";
			echo "<center><table class='table table-bordered table-striped' width='100%'>
			<tr>
			<th>UserId</th>
			<th>UserName</th>
			<th>Email</th>
			<th>CurCredit</th>
			</tr>";

			while($row = mysqli_fetch_array($result))
			{
			echo "<tr>";
			echo "<td>" . $row['userid'] . "</td>";
			echo "<td>" . $row['username'] . "</td>";
			echo "<td>" . $row['email'] . "</td>";
			echo "<td>" . $row['curcredit'] . "</td>";
			echo "</tr>";
			}
			echo "</table></center>";

			mysqli_close($con);
		?>
		
</body>
</html>