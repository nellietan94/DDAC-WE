<?php 	
	class inbound{
		
		public function bookInbound($com_name,$pro_category,$transport,$from_country,$from_address,$to_country,$to_address,$ship_date,$ship_time,$status,$c_date)
		{
			//Db connection file included at book_inbound
			$connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   
			$add_query = "INSERT INTO inbound (company_name, product_category, transportation, shipping_from, shipping_from_address, shipping_to, shipping_to_address, date, time, status, create_date) VALUES ('$com_name','$pro_category','$transport','$from_country','$from_address','$to_country','$to_address','$ship_date','$ship_time','$status','$c_date')";
			$add_result = mysqli_query($connection, $add_query);
			if($add_result){
				echo '<div class="alert alert-success"><strong>SUCCESS ! </strong> You have successfully scheduled inbound.</div>';
				header('Refresh: 2');
			}else{
				echo '<div class="alert alert-danger"><strong>FAILED ! </strong> Sorry, please try again.</div>';
				header('Refresh: 2;');
			}
		}
		
		public function updateInboundStatus($inbound_id,$status){
			//Db connection file included at confirm_inbound/cancel_inbound
			$connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
			
			$update_query = "UPDATE inbound SET status='$status' WHERE id = '$inbound_id'";
			$update_result = mysqli_query($connection, $update_query);
			if($update_result){
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}else{
				echo 'Sorry, Please try again.';
				header('Refresh: 3; URL=inbound.php');
			}
		}
	}

?>