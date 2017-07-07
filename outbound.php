<!DOCTYPE html>
<html>
<head>
	<title>Maersk Line - West Europe - Outbound</title>
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
			
			<div class="navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="today.php">Today</a></li>
					<li><a href="inbound.php">Inbound Schedule</a></li>
					<li class="active"><a href="outbound.php">Outbound Schedule</a></li>
					<li><a href="customer.php">Customer</a></li>
				</ul>
				
				<ul class="nav navbar-nav navbar-right">
					<p class="navbar-text" style="color:#008eff;"><small>West Europe</small></p>
					<li><a href="/.auth/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
		<h1>Outbound Schedule</h1>
		<a href="book_outbound.php"><button type="button" class="btn"><span class="glyphicon glyphicon-calendar"></span> BOOK</button></a>
		
		<hr>
		
		<table class="table table-bordered">
			<tr>
				<th>Date</th>
				<th>Time</th>
				<th>Company</th>
				<th>Job Category</th>
				<th>Transportation</th>
				<th>Shipping From</th>
				<th>Shipping To</th>
				<th>Status</th>
				<th>Action.</th>
			</tr>
			
			<?php 
				require ('config/connection.php');
				//get data from inbound table
				$query = "SELECT * FROM outbound ORDER BY id DESC";
				$result = mysqli_query($connection, $query);
				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				foreach($result as $row){
					echo '<tr>';
					echo '<td>'.$row['date'].'</td>';
					echo '<td>'.$row['time'].'</td>';
					echo '<td>'.$row['company_name'].'</td>';
					echo '<td>'.$row['product_category'].'</td>';
					echo '<td>'.$row['transportation'].'</td>';
					echo '<td>'.$row['shipping_from'].'<br>'.$row['shipping_from_address'].'</td>';
					echo '<td>'.$row['shipping_to'].'<br>'.$row['shipping_to_address'].'</td>';
					echo '<td>'.$row['status'].'</td>';
					echo '<td>';
					if($row['status'] != 'CONFIRMED' && $row['status'] != 'CANCELLED'){
						echo '<a href="confirm_outbound.php?outbound='.$row['id'].'" onclick="confirm(\'Confirm Outbound?\')"><button class="btn btn-info margin-bottom-10">Confirm</button></a><br>';
						echo '<a href="cancel_outbound.php?outbound='.$row['id'].'" onclick="confirm(\'Cancel Outbound?\')"><button class="btn btn-danger">Cancel</button></a>';
					}else{
						echo '<button class="btn btn-info disabled margin-bottom-10">Confirm</button><br>';
						echo '<button class="btn btn-danger disabled">Cancel</button>';
					}
					echo '</td>';
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