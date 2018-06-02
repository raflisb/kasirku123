<?php 

	class oop
	{ 

		// Property 
		const host ='localhost'; 
		const username ='root';
		const pass =''; 
		const db ='sim'; 
		var $con; 

		//Method 

		public function __construct () 
		{
			$this->con = new mysqli(self::host, self::username, self::pass, self::db); 

		}


		public	function readData ($table) 
 
		{ 
			$query = "SELECT  * from $table"; 
			$hasil = $this->con->query($query); 
			while($nilai = mysqli_fetch_array($hasil))
			{ 
				$value[] = $nilai; 
			}
			error_reporting(0);
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

		error_reporting(0);

		return $ini; 
	}	

	public function testing() 
	{ 
		$query_no= "SELECT MAX(no_nota_jual) as last from transaksi_jual";

		$hasil_no = $this->con->query($query_no); 
		$isi_hasil_no = mysqli_fetch_array($hasil_no); 
		$no_terakhir = $isi_hasil_no['last']; 
		
		
		$terakhir = substr($no_terakhir,2,2);
		$no_selanjutnya= $terakhir+1; 
		

		$nj= 'NJ';
		$no_baru = $nj.sprintf('%02s', $no_selanjutnya);
		return $no_baru; 
	}

	function insertTransaksiJual() 
	{
		
		//start auto increment untuk no_nota_jual
		
		 $query_no= "SELECT MAX(no_nota_jual) as last from transaksi_jual";

		$hasil_no = $this->con->query($query_no); 
		$isi_hasil_no = mysqli_fetch_array($hasil_no); 
		$no_terakhir = $isi_hasil_no['last']; 
		
		
		$terakhir = substr($no_terakhir,2,2);
		$no_selanjutnya= $terakhir+1; 
		

		$nj= 'NJ';
		$no_baru = $nj.sprintf('%02s', $no_selanjutnya);
		
		// end auto increment	
		
		// cicilan auto increment 

		$query_id_cicilan= "SELECT MAX(id_cicilan) as last from cicilan "; 
		$do_query_id_cicilan = $this->con->query($query_id_cicilan); 
		$isi_hasil_id=$do_query_id_cicilan->fetch_assoc(); 
		$id_terakhir=$isi_hasil_id['last']; 

		$no_id = substr($id_terakhir,1,2);
		$id_selanjutnya=$no_id+1; 

		$c="C"; 
		$id_cicilan_baru= $c.sprintf('%02s', $id_selanjutnya);
		
		// end cicilan auto increment

		$query_sementara = "SELECT * FROM brg_sementara"; 
		$hasil_sementara = $this->con->query($query_sementara);

		while($row = mysqli_fetch_array($hasil_sementara))
		{
			$nama_brg_sementara = $row['nama_brg'];	
			$stok_brg_sementara = $row['stok'];
			$jenis_bayar = $_POST ['jenis_bayar']; 
			$kredit = $_POST['kredit']; 
			$jmlh_harga_jual = $_POST ['jmlh_harga_jual'];
			$dp = $_POST['dp'];
			$tenor=$_POST['tenor']; 
			$tgl = date('y-m-d');
			$tgl_trsj = $tgl; 
			$id_plgn= $_POST['id_plgn'];
			


			if ($kredit == "N")
			{
				$query_insert_transaksi="insert into transaksi_jual values ('$no_baru', '$id_plgn','$jenis_bayar', '$kredit', '$jmlh_harga_jual', '$dp', '$tgl')"; 
				$insert_transaksi = $this->con->query($query_insert_transaksi);
	
	
				$kode_sementara = "select * from barang where nama_brg ='$nama_brg_sementara'";
				$query_kode= $this->con->query($kode_sementara);
				while ($isi_kode = mysqli_fetch_array($query_kode))
					{
						$kode_barang = $isi_kode['kode_brg'];
						$stok_brg= $isi_kode['stok_brg'];
						$stok_akhir = $stok_brg - $stok_brg_sementara; 
						$query_insert_detail = "insert into detail_transaksi_jual values ('$no_baru', '$kode_barang', '$stok_brg_sementara')"; 
						$insert_detail= $this->con->query($query_insert_detail); 
					
						$query_update_barang = "update barang set stok_brg = '$stok_akhir' where nama_brg ='$nama_brg_sementara'";
						$update_barang= $this->con->query($query_update_barang); 
	
						$query_hapus_sementara= "delete from brg_sementara";
						$hapus_sementara = $this->con->query($query_hapus_sementara); 
						header("location:../index.php"); 

					}
			}
			else if ($kredit =="Y")
			{
				$query_insert_transaksi="insert into transaksi_jual values ('$no_baru', '$id_plgn','$jenis_bayar', '$kredit', '$jmlh_harga_jual', '$dp', '$tgl')"; 
				$insert_transaksi = $this->con->query($query_insert_transaksi);
				$harga_ccl= $jmlh_harga_jual - $dp; 
				$harga_perccl = $harga_ccl / $tenor; 

				$query_insert_cicilan="insert into cicilan values ('$id_cicilan_baru','$no_baru', '$harga_perccl', '$dp', '$tgl','$tenor')"; 
				$do_query_insert_cicilan=$this->con->query($query_insert_cicilan); 
				
	
				$kode_sementara = "select * from barang where nama_brg ='$nama_brg_sementara'";
				$query_kode= $this->con->query($kode_sementara);
				while ($isi_kode = mysqli_fetch_array($query_kode))
					{
						$kode_barang = $isi_kode['kode_brg'];
						$stok_brg= $isi_kode['stok_brg'];
						$stok_akhir = $stok_brg - $stok_brg_sementara; 
						$query_insert_detail = "insert into detail_transaksi_jual values ('$no_baru', '$kode_barang', '$stok_brg_sementara')"; 
						$insert_detail= $this->con->query($query_insert_detail); 
					
						$query_update_barang = "update barang set stok_brg = '$stok_akhir' where nama_brg ='$nama_brg_sementara'";
						$update_barang= $this->con->query($query_update_barang); 
	
						$query_hapus_sementara= "delete from brg_sementara";
						$hapus_sementara = $this->con->query($query_hapus_sementara); 
						header("location:../daftar_cicilan.php"); 
					}
			}

		

		}	
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