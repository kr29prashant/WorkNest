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
$sql = "SELECT employee.id,employee.firstName,employee.lastName,salary.base,salary.bonus,salary.total from employee,`salary` where employee.id=salary.id";


$result = mysqli_query($conn, $sql);

?>

<html>
<head>
	<title>Salary Table | Employee Management System</title>
	<link rel="stylesheet" type="text/css" href="styleview.css">
</head>
<body>
	
	<header>
		<nav>
		<img class="logoimg" src="./assets/Logo.png" alt="nbpdllogo">
			<h1>EMS-NBPDCL</h1>
			<ul id="navli">
				<li><a class="homeblack" href="aloginwel.php">HOME</a></li>
				
				<li><a class="homeblack" href="addemp.php">Add Employee</a></li>
				<li><a class="homeblack" href="viewemp.php">View Employee</a></li>
				<li><a class="homeblack" href="assign.php">Assign Project</a></li>
				<li><a class="homeblack" href="assignproject.php">Project Status</a></li>
				<li><a class="homered" href="salaryemp.php">Salary Table</a></li>
				<li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
				<li><a class="homeblack" href="logout.php">Log Out</a></li>
			</ul>
		</nav>
	</header>
	 
	<h2 style="font-family: 'Montserrat', sans-serif; font-size: 30px; text-align: center;color: rgb(105, 227, 40);letter-spacing:0.5;">Salary Status </h2>

	<div class="beforeTable">

		
		<table>
			<tr>
				<th align = "center">Emp. ID</th>
				<th align = "center">Name</th>
				
				
				<th align = "center">Base Salary</th>
				<th align = "center">Bonus</th>
				<th align = "center">TotalSalary</th>
				
				
			</tr>
			
			<?php
				while ($employee = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$employee['id']."</td>";
					echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
					
					echo "<td>".$employee['base']."</td>";
					echo "<td>".$employee['bonus']." %</td>";
					echo "<td>".$employee['total']."</td>";
					
					
					
				}
				
				
				?>
			
		</table>
		
	</div>
		<footer class="foot">
			Copyright &copy; NBPDCL 2022 - all rights reserved
		</footer>
</body>
</html>