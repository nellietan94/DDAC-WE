<!DOCTYPE html>
<html>
<head>
	<title>Maersk Line - West Europe - Inbound Booking</title>
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
					<li class="active"><a href="inbound.php">Inbound Schedule</a></li>
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
		<h1>Inbound Booking</h1>
		
		<?php 
			require ('config/connection.php');
			$com_query = "SELECT * FROM company";
			$com_result = mysqli_query($connection, $com_query);
			$com_row = mysqli_fetch_array($com_result, MYSQLI_ASSOC);
			
			if(isset($_POST['submit'])){
				$mycompany_name = $_POST['company_name'];
				$myproduct_category = $_POST['product_category'];
				$mytransportation = $_POST['transportation'];
				$myshipping_from = $_POST['shipping_from_country'];
				$myshipping_from_address = $_POST['shipping_from_address'];
				$myshipping_to = $_POST['shipping_to_country'];
				$myshipping_to_address = $_POST['shipping_to_address'];
				$myship_date = $_POST['ship_date'];
				$myship_time_h = $_POST['ship_time_h'];
				$myship_time_m = $_POST['ship_time_m'];
				
				$myship_time = $myship_time_h.$myship_time_m;
				
				//Set Time Zone
				date_default_timezone_set('Asia/Kuala_Lumpur');
				//Get today date
				$mydate = date("Y-m-d");
				
				$mybook = 'BOOKED';
				
				require ('class/inbound-class.php');
				$inbound = new inbound();
				echo $inbound->bookInbound($mycompany_name,$myproduct_category,$mytransportation,$myshipping_from,$myshipping_from_address,$myshipping_to,$myshipping_to_address,$myship_date,$myship_time,$mybook,$mydate);
			}
		?>
		<form method="POST">
			<div class="form-group">
				<label>Company</label>
				<select class="form-control input-sm" name="company_name" required>
					<?php 
						foreach($com_result as $com_row){
							echo '<option value="'.$com_row['company_name'].'">'.$com_row['company_name'].'</option>';
						}
					?>
				</select>
			</div>
			
			<div class="form-group">
				<label>Product Category</label>
				<select class="form-control input-sm" name="product_category" required>
					<option value="Food">Food</option>
					<option value="Baverage">Baverage</option>
					<option value="Electronic">Electronic</option>
					<option value="Daily Essential">Daily Essential</option>
					<option value="Optical Glasses">Optical Glasses</option>
				</select>
			</div>
			
			<div class="form-group">
				<label>Transportation</label>
				<select class="form-control input-sm" name="transportation" required>
					<option>Lorry</option>
					<option>Ship</option>
					<option>Flight</option>
				</select>
			</div>
			
			<div class="form-group">
				<label>Shipping From</label>
				<select class="form-control input-sm" name="shipping_from_country" required>
					<option disabled>Country</option>
					<option value="Argentina">Argentina</option>
					<option value="Australia">Australia</option>
					<option value="Bangladesh">Bangladesh</option>
					<option value="China">China</option>
					<option value="Malaysia">Malaysia</option>
				</select><br>
				<input type="text" class="form-control input-sm" maxlength="100" name="shipping_from_address" placeholder="Address" required>
			</div>
			
			<div class="form-group">
				<label>Shipping To</label>
				<select class="form-control input-sm" name="shipping_to_country" required>
					<option disabled>Country</option>
					<option value="Argentina">Argentina</option>
					<option value="Australia">Australia</option>
					<option value="Bangladesh">Bangladesh</option>
					<option value="China">China</option>
					<option value="Malaysia">Malaysia</option>
				</select><br>
				<input type="text" class="form-control input-sm" maxlength="100" name="shipping_to_address" placeholder="Address" required>
			</div>
			
			<div class="form-group">
				<label>Date</label>
				<input type="date" class="form-control input-sm" min="<?php echo date("Y-m-d"); ?>" name="ship_date" required>
			</div>
			
			<div class="form-group">
				<label>Time</label> <br>
				<select class="input-sm" name="ship_time_h" required>
					<option disabled>Hour</option>
					<option value="01">01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05">06</option>
					<option value="07">07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<?php 
						for($a=10;$a<24;$a++){
							echo '<option value="'.$a.'">'.$a.'</option>';
						}
					?>
					<option value="00">00</option>
				</select>
				
				<select class="input-sm" name="ship_time_m" required>
					<option disabled>Minute</option>
					<option value="01">01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05">06</option>
					<option value="07">07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<?php
						for($b=10;$b<60;$b++){
							echo '<option value="'.$b.'">'.$b.'</option>';
						}
					?>
					<option value="00">00</option>
				</select>
			</div>
		
			<input type="submit" class="btn btn-primary pull-right margin-bottom-10" name="submit" value="Submit">
		</form>
	</div>
	
	<div class="footer">
		<img class="footer-brand" src="img/logo-colored.png"> THE MAERSK GROUP ALL RIGHTS RESERVED 2017 - WEST EUROPE
	</div>
</body>
</html>