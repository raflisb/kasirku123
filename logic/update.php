<?php 
	
	include 'oop.php'; 

$oop=  new oop(); 
	
	$aksi= $_GET['aksi']; 

	if ($aksi == updatePelanggan)
	{
		$update_pelanggan = $oop->updatePelanggan(); 
		echo $update_pelanggan; 
	}
	elseif ($aksi == updateBarang)
	{
		$update_barang = $oop->updateBarang();
		echo $update_barang;
	}
	elseif ($aksi == updateSupplier)
	{
			$update_supplier = $oop->updateSupplier(); 
			echo $update_supplier;
	}
?> 