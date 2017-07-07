<!DOCTYPE html>
<html>
<head>
	<title>Maersk Line - West Europe - Add Company</title>
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

	<div class="container-fluid margin-bottom-10">
		<h1>Add Company</h1>
		
		<?php
			require ('config/connection.php');
			
			if(isset($_POST['submit'])){
				$mycompany_name = $_POST['company_name'];
				$mycompany_category = $_POST['company_category'];
				$mycountry = $_POST['country'];
				$myaddress_1 = $_POST['address_1'];
				$myaddress_2 = $_POST['address_2'];
				$myoffice_no = $_POST['office_no'];
				$myorper_name_1 = $_POST['orper_name_1'];
				$myorper_position_1 = $_POST['orper_position_1'];
				$myorper_name_2 = $_POST['orper_name_2'];
				$myorper_position_2 = $_POST['orper_position_2'];
				
				//Set Time Zone
				date_default_timezone_set('Asia/Kuala_Lumpur');
				//Get today date
				$mydate = date("Y-m-d");
				
				require ('class/company-class.php');
				$company = new company();
				echo $company->addCompany($mycompany_name,$mycompany_category,$mycountry,$myaddress_1,$myaddress_2,$myoffice_no,$myorper_name_1,$myorper_position_1,$myorper_name_2,$myorper_position_2,$mydate);
			}
		?>
		
		<form method="POST">
			<div class="form-group">
				<label>Company Name</label>
				<input type="text" class="form-control input-sm" name="company_name" maxlength="100" required> 
			</div>
			
			<div class="form-group">
				<label>Category</label>
				<select class="form-control input-sm" name="company_category" maxlength="100" required>
					<option value="Optical Industry">Optical Industry</option>
					<option value="Information Technology Industry">Information Technology Industry</option>
					<option value="Optical Industry">Food Industry</option>
					<option value="Optical Industry">Baverage Industry</option>
					<option value="Optical Industry">Fashion Industry</option>
				</select>
			</div>
			
			<div class="form-group">
				<label>Country</label>
				<select class="form-control input-sm" name="country" maxlength="50" required>
					<option value="Argentina">Argentina</option>
					<option value="Australia">Australia</option>
					<option value="Bangladesh">Bangladesh</option>
					<option value="China">China</option>
					<option value="Malaysia">Malaysia</option>
				</select>
			</div>
			
			<div class="form-group">
				<label>Address</label>
				<input type="text" class="form-control input-sm" name="address_1" maxlength="100" required><br>
				<input type="text" class="form-control input-sm" name="address_2" maxlength="100"> 
			</div>
			
			<div class="form-group">
				<label>Office Number</label>
				<input type="text" pattern="\d{10,14}" class="form-control input-sm" name="office_no" maxlength="14" title="number only" required>
			</div>
			
			<div class="form-group">
				<label>Organize Person Name 1</label>
				<input type="text" class="form-control input-sm" name="orper_name_1" maxlength="100" required>
			</div>
			
			<div class="form-group">
				<label>Position</label>
				<input type="text" class="form-control input-sm" name="orper_position_1" maxlength="100" required>
			</div>
			
			<div class="form-group">
				<label>Organize Person Name 2</label>
				<input type="text" class="form-control input-sm" name="orper_name_2" maxlength="100" required>
			</div>
			
			<div class="form-group">
				<label>Position</label>
				<input type="text" class="form-control input-sm" name="orper_position_2" maxlength="100" required>
			</div>		
			
			<input type="submit" class="btn btn-primary pull-right" name="submit" value="Submit">
		</form>
	</div>
	
	<div class="footer">
		<img class="footer-brand" src="img/logo-colored.png"> THE MAERSK GROUP ALL RIGHTS RESERVED 2017 - WEST EUROPE
	</div>
</body>
</html>