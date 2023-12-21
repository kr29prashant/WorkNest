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
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	require_once ('process/dbh.php');
	$sql = "SELECT * FROM `project` where eid = '$id'";
	$result = mysqli_query($conn, $sql);
	
?>

<html>
<head>
	<title>Employee Panel | Employee Management System</title>
	<link rel="stylesheet" type="text/css" href="styleview.css">
	<link href="https://fonts.googleapis.com/css2?family=Dosis&display=swap" rel="stylesheet">
</head>
<body>
	
	<header>
		<nav>
		<img class="logoimg" src="./assets/Logo.png" alt="nbpdllogo">
			<h1>EMS-NBPDCL</h1>
			<ul id="navli">
				<li><a class="homeblack" href="eloginwel.php?id=<?php echo $id?>"">HOME</a></li>
				<li><a class="homeblack" href="myprofile.php?id=<?php echo $id?>"">My Profile</a></li>
				<li><a class="homered" href="empproject.php?id=<?php echo $id?>"">My Projects</a></li>
				<li><a class="homeblack" href="applyleave.php?id=<?php echo $id?>"">Apply Leave</a></li>
				<li><a class="homeblack" href="logout.php">Log Out</a></li>
			</ul>
		</nav>
	</header>
	<h2 style="font-family: 'Montserrat', sans-serif; font-size: 30px; text-align: center;color: rgb(105, 227, 40);letter-spacing:0.5;">My Projects </h2>
	<!-- <div class="divider"></div> -->
	<div class="beforeTable">


		<table>
			<tr>

				<th align = "center">Project ID</th>
				<th align = "center">Project Name</th>
				<th align = "center">Due Date</th>
				<th align = "center">Sub Date</th>
				<th align = "center">Mark</th>
				<th align = "center">Status</th>
				<th align = "center">Option</th>
			</tr>

			<?php
				while ($employee = mysqli_fetch_assoc($result)) {

					echo "<tr>";
					echo "<td>".$employee['pid']."</td>";
					echo "<td>".$employee['pname']."</td>";
					echo "<td>".$employee['duedate']."</td>";
					echo "<td>".$employee['subdate']."</td>";
					echo "<td>".$employee['mark']."</td>";
					echo "<td>".$employee['status']."</td>";
					

					 echo "<td><a class='tableBtn' href=\"psubmit.php?pid=$employee[pid]&id=$employee[eid]\">Submit</a>";

				}


			?>

		</table>
			</div>
		<footer class="foot">
			Copyright &copy; NBPDCL 2022 - all rights reserved
		</footer>

		</body>
</html>