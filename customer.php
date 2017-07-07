<!DOCTYPE html>
<html>
<head>
	<title>Maersk Line - West Europe - Customer</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- ICON -->
	<link rel="icon" href="img/icon.png"/>
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<!-- Main Css -->
	<link rel="stylesheet" href="css/main.css">
	
	<!-- Script -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
			<a class="navbar-brand" href=""><img src="img/icon.png"></a>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			</div>
			
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="today.php">Today</a></li>
					<li><a href="inbound.php">Inbound Schedule</a></li>
					<li><a href="outbound.php">Outbound Schedule</a></li>
					<li class="active"><a href="customer.php">Customer</a></li>
				</ul>
				
				<ul class="nav navbar-nav navbar-right">
					<p class="navbar-text" style="color:#008eff;"><small>West Europe</small></p>
					<li><a href="/.auth/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
		<h1>Customer</h1>
		<a href="add_company.php"><button type="button" class="btn"><span class="glyphicon glyphicon-plus"></span> ADD</button></a>
		
		<hr>
		
		<table class="table table-bordered">
			<tr>
				<th>Company Name</th>
				<th>Category</th>
				<th>Office Number</th>
				<th>Country</th>
				<th>Address</th>
				<th>Action.</th>
			</tr>
			
			<?php 
				require ('config/connection.php');
				$query = "SELECT * FROM company ORDER BY id DESC";
				$result = mysqli_query($connection, $query);
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
				
				foreach($result as $row){
					echo '<tr>';
					echo '<td>'.$row['company_name'].'</td>';
					echo '<td>'.$row['category'].'</td>';
					echo '<td>'.$row['office_no'].'</td>';
					echo '<td>'.$row['country'].'</td>';
					echo '<td>'.$row['address_1'].'<br>'.$row['address_2'].'</td>';
					echo '<td><a href="company_ve.php?company='.$row['id'].'"><button class="btn btn-primary">View/Edit</button></a></td>';
					echo '</tr>';
				}
			?>
		</table>
	</div>
	
	<div class="footer">
		<img class="footer-brand" src="img/logo-colored.png"> THE MAERSK GROUP ALL RIGHTS RESERVED 2017 - WEST EUROPE
	</div>
</body>
</html>