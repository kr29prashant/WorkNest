<?php 
session_start();
require_once ('process/dbh.php');

    if(!isset($_SESSION["email"])){
        ?>
<script>
    alert('YOU ARE LOGGED OUT NOW!');
    location.href = '..//index.html';
</script>
<?php
    }

?>
<?php

require_once ('process/dbh.php');

$sql = "SELECT * from `employee` , `rank` WHERE employee.id = rank.eid";

$result = mysqli_query($conn, $sql);

?>


<html>
<head>
	<title>View Employee |  Admin Panel | Employee Management System</title>
	<link rel="stylesheet" type="text/css" href="styleview.css">
	<link href="https://fonts.googleapis.com/css2?family=Dosis&display=swap" rel="stylesheet">
</head>
<body>
	<header>
		<nav>
		<img class="logoimg" src="./assets/Logo.png" alt="nbpdllogo">
			<h1>EMS-NBPDCL</h1>
			<ul id="navli">
				<li><a class="homeblack" href="aloginwel.php">HOME</a></li>
				<li><a class="homeblack" href="addemp.php">Add Employee</a></li>
				<li><a class="homered" href="viewemp.php">View Employee</a></li>
				<li><a class="homeblack" href="assign.php">Assign Project</a></li>
				<li><a class="homeblack" href="assignproject.php">Project Status</a></li>
				<li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>
				<li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
				<li><a class="homeblack" href="logout.php">Log Out</a></li>
			</ul>
		</nav>
	</header>

	<h2 style="font-family: 'Montserrat', sans-serif; font-size: 30px; text-align: center;color: rgb(105, 227, 40);letter-spacing:0.5;">Employee Details </h2>

	<div class="beforeTable">

		<table>
			<tr>
				
				<th align = "center">Emp. ID</th>
				<th align = "center">Picture</th>
				<th align = "center">Name</th>
				<th align = "center">Email</th>
				<th align = "center">Birthday</th>
				<th align = "center">Gender</th>
				<th align = "center">Contact</th>
				<th align = "center">NID</th>
				<th align = "center">Address</th>
				<th align = "center">Department</th>
				<th align = "center">Degree</th>
				<th align = "center">Point</th>
				
				
				<th align = "center">Options</th>
			</tr>
			
			<?php
				while ($employee = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$employee['id']."</td>";
					echo "<td><img src='process/".$employee['pic']."' height = 60px width = 60px></td>";
					echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
					
					echo "<td>".$employee['email']."</td>";
					echo "<td>".$employee['birthday']."</td>";
					echo "<td>".$employee['gender']."</td>";
					echo "<td>".$employee['contact']."</td>";
					echo "<td>".$employee['nid']."</td>";
					echo "<td>".$employee['address']."</td>";
					echo "<td>".$employee['dept']."</td>";
					echo "<td>".$employee['degree']."</td>";
					echo "<td>".$employee['points']."</td>";
					
					echo "<td><a class='tableBtn' href=\"edit.php?id=$employee[id]\">Edit</a> | <a class='tableBtn' href=\"delete.php?id=$employee[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
					
				}
				
				
				?>

</table>

</div>
<footer class="foot">
	Copyright &copy; NBPDCL 2022 - all rights reserved
</footer>
</body>
</html>