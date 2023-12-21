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
$sql = "SELECT * from `project` order by subdate desc";

$result = mysqli_query($conn, $sql);

?>

<html>
<head>
	<title>Project Status |  Admin Panel | Employee Management System</title>
	<link rel="stylesheet" type="text/css" href="styleview.css">
</head>
<body>
	<header>
		<nav>
		<nav>
		<img class="logoimg" src="./assets/Logo.png" alt="nbpdllogo">
			<h1>EMS-NBPDCL</h1>
			<ul id="navli">
				<li><a class="homeblack" href="aloginwel.php">HOME</a></li>
				<li><a class="homeblack" href="addemp.php">Add Employee</a></li>
				<li><a class="homeblack" href="viewemp.php">View Employee</a></li>
				<li><a class="homeblack" href="assign.php">Assign Project</a></li>
				<li><a class="homered" href="assignproject.php">Project Status</a></li>
				<li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>
				<li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
				<li><a class="homeblack" href="logout.php">Log Out</a></li>
			</ul>
		</nav>
</nav>
	</header>
	
	<h2 style="font-family: 'Montserrat', sans-serif; font-size: 30px; text-align: center;color: rgb(105, 227, 40);letter-spacing:0.5;">Project Status </h2>

	<div class="beforeTable">

		<table>
			<tr>
				
				<th align = "center">Project ID</th>
				<th align = "center">Emp. ID</th>
				<th align = "center">Project Name</th>
				<th align = "center">Due Date</th>
				<th align = "center">Submission Date</th>
				<th align = "center">Mark</th>
				<th align = "center">Status</th>
				<th align = "center">Option</th>
				
			</tr>
			
			<?php
				while ($employee = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$employee['pid']."</td>";
					echo "<td>".$employee['eid']."</td>";
					echo "<td>".$employee['pname']."</td>";
					echo "<td>".$employee['duedate']."</td>";
					echo "<td>".$employee['subdate']."</td>";
					echo "<td>".$employee['mark']."</td>";
					echo "<td>".$employee['status']."</td>";
					echo "<td><a class='tableBtn' href=\"mark.php?id=$employee[eid]&pid=$employee[pid]\">Mark</a>"; 
					
				}
				
				
				?>

</table>

</div>
		<footer class="foot">
			Copyright &copy; NBPDCL 2022 - all rights reserved
		</footer>
		
	
</body>
</html>