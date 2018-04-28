<?php 

	class oop
	{ 

		// Property 
		var $host ='localhost'; 
		var $username ='root';
		var $pass =''; 
		var $db ='sim'; 
		var $con; 

		//Method 

		public function __construct () 
		{
			$this->con = new mysqli($this->host, $this->username, $this->pass, $this->db); 

		}


		function readPelanggan () 
 
		{ 
			$query = "SELECT  * from pelanggan"; 
			$hasil = $this->con->query($query); 
			while($nilai = mysqli_fetch_array($hasil))
			{ 
				$value[] = $nilai; 
			}
			return $value;

		}

	function readSupplier ()

		{
			$query = "SELECT  * from supplier"; 
			$hasil = $this->con->query($query); 
			while($nilai = mysqli_fetch_array($hasil))
			{ 
				$value[] = $nilai; 
			}
			return $value;
		} 

	function readBarang () 
		{ 
			$query = "SELECT * from barang"; 
			$hasil = $this->con->query($query); 
			while($nilai  = mysqli_fetch_array($hasil))
			{
				$value[] = $nilai; 

			}
			return $value;
		}

	//function readBarangGet()
	//	{
	//		$kode_brg = $_GET('kode');
	//		query = "SELECT * from barang where kode_brg = '@kode_brg'"; 
	//		$hasil = $this->con->query($query); 
	//		while($nilai  = mysqli_fetch_array($hasil))
	//		{
	//			$value[] = $nilai; 

	//		}
	//		return $value;
	//	}


	function readKirim () 
		{ 
			$query ="select * from kirim"; 
			$hasil = $this->con->query($query); 
			while ($nilai = mysqli_fetch_array($hasil))
				{ 
					$value[] = $nilai; 

				}
				return $value ;
		}
	function readSementara()
	{
		$query = "SELECT * from brg_sementara"; 
		$hasil = $this->con->query($query); 
		while ($nilai = mysqli_fetch_array($hasil))
		{
			$value[] = $nilai; 
		} 
			return $value;
	}


	function insertSementara () 
	{ 

		$nama_brg = $_POST['nama_brg'];
		$jumlah = $_POST['jumlah'];

		 			$cekstok = "select stok_brg from barang where nama_brg ='$nama_brg'"; 
		 			$querycekstok = $this->con->query($cekstok);
		 			$hasilcekstok = mysqli_fetch_array($querycekstok); 
		 			if ($jumlah<=$hasilcekstok['stok_brg'])
		 			{ 
                    	$query="insert into brg_sementara values('$nama_brg',$jumlah) " ;
                    	$hasil=$this->con->query($query);
                    	header ("location:../sementara.php");
                    } 

                    else { 
                    	echo "Stok barang yang tersisa adalah ".$hasilcekstok['stok_brg'];
                    }

                  
                   
    }


	function insertSupplier() 
		{ 
			$id_supp = $_POST['id_supp']; 
			$nama_supp = $_POST['nama_supp']; 
			$alamat_supp = $_POST['alamat_supp']; 
			$no_hp_supp = $_POST['no_hp_supp'];

			$query ="Insert into supplier SET id_supp='$id_supp', nama_supp='$nama_supp', alamat_supp='$alamat_supp', no_hp_supp='$no_hp_supp'";
			$hasil= $this->con->query($query); 

			if ($hasil) 
				{ 
					header('location:../supplier.php');
				}


		}


	function updateSupplier()
		{
			$id_supp = $_POST['id_supp']; 
			$nama_supp = $_POST['nama_supp']; 
			$alamat_supp = $_POST['alamat_supp']; 
			$no_hp_supp = $_POST['no_hp_supp'];

			$query ="UPDATE supplier SET nama_supp='$nama_supp', alamat_supp='$alamat_supp', no_hp_supp='$no_hp_supp' WHERE id_supp='$id_supp'";

			$hasil=$this->con->query($query); 
			if ($hasil) 
				{ 
					header('location:../supplier.php'); 
				}

		}

	

	function insertPelanggan()
		{ 

				$id_plgn = $_POST['id_plgn'];
				$nama_plgn = $_POST['nama_plgn'];
				$no_hp_plgn = $_POST['no_hp_plgn'];
				$alamat_plgn =$_POST ['alamat_plgn'];
			$query = "Insert into pelanggan SET id_plgn='$id_plgn', nama_plgn='$nama_plgn', alamat_plgn='$alamat_plgn', no_hp_plgn='$no_hp_plgn'";
				$hasil= $this->con->query($query); 

				if($hasil) 
			{
				header('location:../pelanggan.php');
			}
		}	


	function updatePelanggan() 

		{ 
				$id_plgn = $_POST['id_plgn'];
				$nama_plgn = $_POST['nama_plgn'];
				$alamat_plgn = $_POST ['alamat_plgn'];
				$no_hp_plgn = $_POST['no_hp_plgn'];

			$query = "Update pelanggan SET nama_plgn='$nama_plgn', alamat_plgn='$alamat_plgn', no_hp_plgn='$no_hp_plgn' WHERE id_plgn ='$id_plgn'";
				$hasil= $this->con->query($query); 

		if($hasil) 
			{
				header('location:../pelanggan.php');
			}
		}	

	function updateBarang () 
		{

			$kode_brg = $_POST['kode_brg'];
			$nama_brg = $_POST['nama_brg'];
			$stok_brg = $_POST['stok_brg'];
			$harga_jual = $_POST['harga_jual'];
			$harga_beli = $_POST['harga_beli'];

			$query = "Update barang SET nama_brg='$nama_brg', stok_brg='$stok_brg', harga_jual='$harga_jual', harga_beli='$harga_beli' WHERE kode_brg='$kode_brg'";
			$hasil= $this->con->query($query); 

		if($hasil) 
			{
				header('location:../list_barang.php');  
			}
		}

	function updateBarangTest()
		{ 
			$kode_brg = $_GET['del'];
			$nama_brg = $_POST['nama_brg'];
			$stok_brg = $_POST['stok_brg'];
			$harga_jual = $_POST['harga_jual'];
			$harga_beli = $_POST['harga_beli'];

			$query = "Update barang SET nama_brg='$nama_brg', stok_brg='$stok_brg', harga_jual='$harga_jual', harga_beli='$harga_beli' WHERE kode_brg='$kode_brg'";
			$hasil= $this->con->query($query); 

		if($hasil) 
			{
				header('location:../list_barang.php');  
			}

		}

	function insertNotaCicilan()
		{ 
			$no_nota_ccl = $_POST['no_nota_ccl']; 
			$id_cicilan		= $_POST['id_cicilan']; 
			$tenor		= $_POST['tenor']; 
			$tgl_ccl	= $_POST['tgl_ccl']; 

			$query = "INSERT into nota_cicilan SET no_nota_ccl='$no_nota_ccl', id_cicilan='$id_cicilan', tenor='$tenor', tgl_ccl='$tgl_ccl'"; 
			$hasil = $this->con->query($query); 

			if($hasil)
				{ 
					header ('location:../nota_cicilan.php');
				}
		}

	function readTransaksiJual() 
	{
		$tampil_sementara = "SELECT * from brg_sementara"; 
		$hasil= $this->con->query($tampil_sementara); 

		if (mysqli_num_rows($hasil)>0)
		{
			while($data=mysqli_fetch_array($hasil))
			{
				$nama=$data['nama_brg']; 
				$cocokan_barang = "SELECT * from barang where nama_brg = '$nama'";
				$hasil_barang = $this->con->query($cocokan_barang); 
				$value_hasil_barang = mysqli_fetch_array($hasil_barang); 

				$value = $data; 
				$value['harga_jual'] = $value_hasil_barang ['harga_jual']; 
				$value['total_harga'] = $value['stok']*$value['harga_jual']; 
				$total_bayar[]= $value['total_harga']; 
				$value['total_bayar']= array_sum($total_bayar); 

				$ini[] = $value;

			}
		}

		return $ini; 
	}

	function insertTransaksiJual() 
	{
		$query_sementara = "SELECT * FROM brg_sementara"; 
		$hasil_sementara = $this->con->query($query_sementara);
		
		$query_id = "SELECT MAX(no_nota_jual) as last from transaksi_jual";

		$hasil_id = $this->con->query($query_id); 
		$isi_hasil_id = mysqli_fetch_array($hasil_id); 
		$id_terakhir = $isi_hasil_id['last']; 
		$terakhir
		/* $no_nota_jual = $_POST['no_nota_jual']; 
		$id_plgn = $_POST['id_plgn'];
		$jenis_bayar = $_POST ['jenis_bayar']; 
		$jmlh_harga_jual = $_POST ['jmlh_harga_jual']; */ 

	}
	function deletePelanggan()
		{	
			$id_plgn = $_GET['del'];
			$query= "Delete from pelanggan where id_plgn ='$id_plgn'";
			$hasil = $this->con->query($query); 

			if($hasil)
			{ 
				header('location:../pelanggan.php');
			}

		}

	function deleteBarang()
		{ 
			$kode_brg = $_GET['del']; 
			$query = "Delete from barang where kode_brg ='$kode_brg'"; 
			$hasil = $this->con->query($query); 

			if ($hasil) 
				{ 
					header ('location:../list_barang.php');
				}
		}
	function deleteSementara()
		{ 
			$nama_brg = $_GET['del']; 
			$query = "delete from brg_sementara where nama_brg ='$nama_brg'"; 
			$hasil = $this->con->query($query);
			if ($hasil)
				{
					header ('location:../sementara.php');
				}
		}

	function deleteSupplier()
		{ 
			$id_supp = $_GET['del']; 
			$query = "Delete from supplier where id_supp = '$id_supp'"; 
			$hasil = $this->con->query($query); 

			if($hasil)
				{ 
					header ('location:../supplier.php'); 
				}
		}

	}