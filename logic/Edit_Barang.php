<?php 

	include '../Database.php'; 

	$kode_brg = $_POST['kode_brg'];
	$nama_brg = $_POST['nama_brg'];
	$stok_brg = $_POST['stok_brg'];
	$harga_jual = $_POST['harga_jual'];
	$harga_beli = $_POST['harga_beli'];

	$query = "Update barang SET nama_brg='$nama_brg', stok_brg='$stok_brg', harga_jual='$harga_jual', harga_beli='$harga_beli' WHERE kode_brg='$kode_brg'";
	$hasil= $connect->query($query); 

		if($hasil) 
			{
				header('location:../list_barang.php');  
			}