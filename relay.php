<?php

	// Connect to database
	$con = mysqli_connect("localhost","pasindu","1234","eleccare");

	// Get all the courses from courses table
	// execute the query
	// Store the result
	$sql = "SELECT * FROM `relay`";
	$Sql_query = mysqli_query($con,$sql);
	$All_relay = mysqli_fetch_all($Sql_query,MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0">
	
	<!-- Using internal/embedded css -->
	<style>
		.btn{
			background-color: red;
			border: none;
			color: white;
			padding: 5px 5px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 20px;
			margin: 4px 2px;
			cursor: pointer;
			border-radius: 20px;
		}
		.green{
			background-color: #199319;
		}
		.red{
			background-color: red;
		}
		table,th{
			border-style : solid;
			border-width : 1;
			text-align :center;
		}
		td{
			text-align :center;
		}
	</style>	
</head>

<body>
	<h2>Relay Table</h2>
	<table>
		<!-- TABLE TOP ROW HEADINGS-->
		<tr>
			<th>Relay Id</th>
			<th>Device Name</th>
			<th>Status</th>
            <th>Contol</th>
		</tr>
		<?php

			// Use foreach to access all the courses data
			foreach ($All_relay as $relay) { ?>
			<tr>
                <td><?php echo $relay['Relay_ID']; ?></td>
				<td><?php echo $relay['Relay_Type']; ?></td>
				<td><?php
						if($relay['Status']=="1")
							echo "Active";
						else
							echo "Inactive";
					?>						
				</td>
				<td>
					<?php
					if($relay['Status']=="1")
						echo "<a href=deactivate.php?Relay_ID=".$relay['Relay_ID']." class='btn red'>Ativate</a>";
					else
						echo "<a href=activate.php?Relay_ID=".$relay['Relay_ID']." class='btn green'>Deactivate</a>";
					?>
			</tr>
		<?php
				}
				// End the foreach loop
		?>
	</table>
</body>

</html>
