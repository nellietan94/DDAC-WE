<?php 
	class company{
		
		public function addCompany($com_name,$com_category,$country,$address_1,$address_2,$off_no,$or_per_name_1,$or_position_1,$or_per_name_2,$or_position_2,$c_date){
			//Db connection file included at add_company
			$connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
			
			$add_query = "INSERT INTO company (company_name, category, country, address_1, address_2, office_no, or_person_name_1, or_position_1, or_person_name_2, or_position_2, create_date) VALUES ('$com_name','$com_category','$country','$address_1','$address_2','$off_no','$or_per_name_1','$or_position_1','$or_per_name_2','$or_position_2','$c_date')";
			$add_result = mysqli_query($connection,$add_query);
			if($add_result){
				echo '<div class="alert alert-success"><strong>SUCCESS ! </strong> You have successfully added company.</div>';
				header('Refresh: 2; URL=customer.php');
			}else{
				echo '<div class="alert alert-danger"><strong>FAILED ! </strong> Sorry, failed to create. Please try again.</div>';
				header('Refresh: 2;');
			}
		}
		
		public function updateCompany($com_name,$com_category,$country,$address_1,$address_2,$off_no,$or_per_name_1,$or_position_1,$or_per_name_2,$or_position_2,$company_id){
			
			//Db connection file included at company_ve
			$connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
			
			$update_query = "UPDATE company SET company_name='$com_name', category='$com_category', country='$country', address_1='$address_1', address_2='$address_2', office_no='$off_no', or_person_name_1='$or_per_name_1', or_position_1='$or_position_1', or_person_name_2='$or_per_name_2', or_position_2='$or_position_2' WHERE id = '$company_id'";
			$update_result = mysqli_query($connection,$update_query);
			if($update_result){
				echo '<div class="alert alert-success"><strong>SUCCESS ! </strong> You have successfully edited company info.</div>';
				header('Refresh: 2; URL=customer.php');
			}else{
				echo '<div class="alert alert-danger"><strong>FAILED ! </strong> Sorry, failed to create. Please try again.</div>';
				header('Refresh: 2;');
			}
		}
	}
?>