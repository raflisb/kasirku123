<?php 

/*include 'Database.php'; 

	$query = "SELECT MAX(no_nota_jual) as last from transaksi_jual"; 
	$hasil = mysqli_query($connect, $query); 
	$isi = mysqli_fetch_array($hasil);
	$nomorterakhir = $isi['last'];

	$terakhir=substr($nomorterakhir, 3, 2);
	$selanjutnya = $terakhir+1; 

	$nj = 'NJ'; 
	$idbaru = $nj.sprintf('%02s', $selanjutnya) ; 
	echo $idbaru;


	include 'logic/oop.php'; 
	$oop = new oop(); 
	$baru = $oop->insertTransaksiJual(); 
	foreach ($baru as $isi) 
	{
		echo $isi['last'];
	}
	
?>

