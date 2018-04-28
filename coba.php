$tampilSementara = "SELECT * from brg_sementara"; 
		$hasil = $this->con->query($tampilSementara); 
		$bayar=0; 

		if(mysqli_num_rows($hasil)>0)
		{
			while ($data = mysqli_fetch_array($hasil))
			{
				$nama = $data['nama_brg']; 
				$barang ="SELECT * from barang where nama_brg = '$nama'"; 
				$hasilBarang = $this->con->query($barang); 
				$valueHasilBarang = mysqli_fetch_array($hasilBarang); 

				$row=$data; 
				$row['harga_jual'] = $valueHasilBarang['harga_jual']; 
				$row['total_harga'] = $row['stok']*$row['harga_jual'];
				$total_bayar[] = $row['total_harga']; 
				$row['total_bayar']= array_sum($total_bayar); 

			 	$ini [] = $row;
			}
		}		return $ini ;