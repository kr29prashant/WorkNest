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


$sql = "Select employee.id, employee.firstName, employee.lastName, employee_leave.start, employee_leave.end, employee_leave.reason, employee_leave.status, employee_leave.token From employee, employee_leave Where employee.id = employee_leave.id order by employee_leave.token";


$result = mysqli_query($conn, $sql);

?>

<html>
<head>
	<title>Employee Leave | Admin Panel | Employee Management System</title>
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
				<li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>
				<li><a class="homered" href="empleave.php">Employee Leave</a></li>
				<li><a class="homeblack" href="logout.php">Log Out</a></li>
			</ul>
		</nav>
	</header>
	 


	<h2 style="font-family: 'Montserrat', sans-serif; font-size: 30px; text-align: center;color: rgb(105, 227, 40);letter-spacing:0.5;">Employee Leave </h2>


	<div class="beforeTable">

		<table>
			<tr>
				<th>Emp. ID</th>
				<th>Token</th>
				<th>Name</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Total Days</th>
				<th>Reason</th>
				<th>Status</th>
				<th>Options</th>
			</tr>

			<?php
				while ($employee = mysqli_fetch_assoc($result)) {

				$date1 = new DateTime($employee['start']);
				$date2 = new DateTime($employee['end']);
				$interval = $date1->diff($date2);
				$interval = $date1->diff($date2);
				//echo "difference " . $interval->days . " days ";

					echo "<tr>";
					echo "<td>".$employee['id']."</td>";
					echo "<td>".$employee['token']."</td>";
					echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
					
					echo "<td>".$employee['start']."</td>";
					echo "<td>".$employee['end']."</td>";
					echo "<td>".$interval->days."</td>";
					echo "<td>".$employee['reason']."</td>";
					echo "<td>".$employee['status']."</td>";
					echo "<td><a class='tableBtn' href=\"approve.php?id=$employee[id]&token=$employee[token]\"  onClick=\"return confirm('Are you sure you want to Approve the request?')\">Approve</a> | <a class='tableBtn' href=\"cancel.php?id=$employee[id]&token=$employee[token]\" onClick=\"return confirm('Are you sure you want to Canel the request?')\">Cancel</a></td>";

				}


			?>

		</table>
		
	</div>

	<footer class="foot">
			Copyright &copy; NBPDCL 2022 - all rights reserved
		</footer>
</body>
</html>