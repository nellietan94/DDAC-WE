<!DOCTYPE html>
<html>
<head>
	<title>Maersk Line - West Europe - Today's Inbound and Outbound</title>
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
					<li class="active"><a href="today.php">Today</a></li>
					<li><a href="inbound.php">Inbound Schedule</a></li>
					<li><a href="outbound.php">Outbound Schedule</a></li>
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
		<h1>Today's</h1>
		<h2>Inbound</h2>
		
		<?php 
			require ('config/connection.php');
			//Set Time Zone
			date_default_timezone_set('Asia/Kuala_Lumpur');
			//Get today date
			$mydate = date("Y-m-d");
			
			$inbound_query = "SELECT * FROM inbound WHERE date='$mydate'";
			$inbound_result = mysqli_query($connection, $inbound_query);
			$inbound_row = mysqli_fetch_array($inbound_result, MYSQLI_ASSOC);
			
			$outbound_query = "SELECT * FROM outbound WHERE date='$mydate'";
			$outbound_result = mysqli_query($connection, $outbound_query);
			$outbound_row = mysqli_fetch_array($outbound_result, MYSQLI_ASSOC);
		?>
		
		<div class="overflow-box">
			<table class="table table-bordered">
				<tr>
					<th>Company</th>
					<th>Time</th>
					<th>Transportation</th>
					<th>Shipping From</th>
					<th>Shipping To</th>
					<th>Status</th>
				</tr>
				
				<?php
					if($inbound_row){
						foreach($inbound_result as $inbound_row){
							echo '<tr>';
							echo '<td>'.$inbound_row['company_name'].'</td>';
							echo '<td>'.$inbound_row['time'].'</td>';
							echo '<td>'.$inbound_row['transportation'].'</td>';
							echo '<td>'.$inbound_row['shipping_from'].'<br>'.$inbound_row['shipping_from_address'].'</td>';
							echo '<td>'.$inbound_row['shipping_to'].'<br>'.$inbound_row['shipping_to_address'].'</td>';
							echo '<td>'.$inbound_row['status'].'</td>';
							echo '</tr>';
						}
					}else{
						echo '<div class="alert alert-info">No Inbound Today</div>';
					}
					
				?>
			</table>
		</div>
		
		<h2>Outbound</h2>
		
		<div class="overflow-box">
			<table class="table table-bordered">
				<tr>
					<th>Company</th>
					<th>Time</th>
					<th>Transportation</th>
					<th>Shipping From</th>
					<th>Shipping To</th>
					<th>Status</th>
				</tr>
				
				<?php
					if($outbound_row){
						foreach($outbound_result as $outbound_row){
							echo '<tr>';
							echo '<td>'.$outbound_row['company_name'].'</td>';
							echo '<td>'.$outbound_row['time'].'</td>';
							echo '<td>'.$outbound_row['transportation'].'</td>';
							echo '<td>'.$outbound_row['shipping_from'].'<br>'.$outbound_row['shipping_from_address'].'</td>';
							echo '<td>'.$outbound_row['shipping_to'].'<br>'.$outbound_row['shipping_to_address'].'</td>';
							echo '<td>'.$outbound_row['status'].'</td>';
							echo '</tr>';
						}
					}else{
						echo '<div class="alert alert-info">No Outbound Today.</div>';
					}
					
				?>
			</table>
		</div>
	</div>
	
	<div class="footer">
		<img class="footer-brand" src="img/logo-colored.png"> THE MAERSK GROUP ALL RIGHTS RESERVED 2017 - WEST EUROPE
	</div>
</body>
</html>