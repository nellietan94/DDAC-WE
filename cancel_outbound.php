<?php 
	$myoutbound_id = $_GET['outbound'];
	$mystatus = 'CANCELLED';
	
	require ('config/connection.php');
	require ('class/outbound-class.php');
	$outbound = new outbound();
	echo $update_outbound = $outbound->updateOutboundStatus($myoutbound_id,$mystatus);
?>