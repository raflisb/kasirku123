<?php 

include 'logic/oop.php'; 
$oop = new oop(); 

$MethodShow = $oop->readBarangGet(); 

	
	$isi= mysqli_fetch_array ($MethodShow); 
	



