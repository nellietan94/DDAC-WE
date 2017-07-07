<?php 
	$myinbound_id = $_GET['inbound'];
	$mystatus = 'CANCELLED';
	
	require ('config/connection.php');
	require ('class/inbound-class.php');
	$inbound = new inbound();
	echo $update_inbound = $inbound->updateInboundStatus($myinbound_id,$mystatus);
?>