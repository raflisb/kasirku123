<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Bangunan Saya</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <!--base css styles-->
        <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="assets/bootstrap/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/normalize/normalize.css">

        <!--page specific css styles-->

        <!--flaty css styles-->
        <link rel="stylesheet" href="css/flaty.css">
        <link rel="stylesheet" href="css/flaty-responsive.css">

        <link rel="shortcut icon" href="img/favicon.html">

        <script src="assets/modernizr/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->


        <!-- BEGIN Navbar -->
        <?php 
            include 'assets/navbar.php'; 
        ?> 

        <!-- END Navbar -->

        <!-- BEGIN Container -->
        <div class="container-fluid" id="main-container">
            <!-- BEGIN Sidebar -->
            <?php 
                include 'assets/sidebar.php';
                ?>
            <!-- END Sidebar -->

            <!-- BEGIN Content -->
            <div id="main-content">
                <!-- BEGIN Page Title -->
                <div class="page-title">
                    <div>
                       <center> <h1><i class="icon-laptop"></i> Transaksi Penjualan</h1>
                        <h4>Selamat Datang kembali</h4></center></center>
                    </div>
                </div>
                <!-- END Page Title -->

                <!-- BEGIN Main Content -->
              <div class="row-fluid">        
                    <div class="span12">
                        <div class="box">
                            <div class="box-title" style="background-color: #0090ff">
                                <h3><i class="icon-table"></i>Daftar Barang</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Barang</th>
                                            <th>Harga satuan</th>
                                            <th>Harga Total </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        include 'Database.php'; 
                                        include 'logic/oop.php'; 
                                        $oop=new oop(); 
                                        $nomor=1; 

                                        
                                        foreach ($oop->readTransaksiJual()as $isi)
                                        {
                                            ?>

                                        
                                
                                        <tr>
                                            
                                            <td><?php echo $nomor++; ?></td>
                                            <td><?php echo $isi['nama_brg']; ?></td>
                                            <td><?php echo $isi['stok']; ?></td>
                                            <td><?php echo $isi['harga_jual']; ?></td>
                                            <td><?php echo $isi['total_harga']; ?></td>


                                            </td>       
                                        </tr>

                                    <td></td>
                                    <?php 
                                } 
                                ?>

                                        
                                      </div>
                                      </div>
                                    </tbody>


                                </table>

                                <div class="controls">
                            
                           <span><a href="sementara.php"><button class="btn btn-primary">Tambah </button></a>
                                      </div>  
                            </div>
                        </div>
                    </div>
                </div>

        
    <div class="row-fluid">

                     <div class="span12">
                        <div class="box">
                            <div class="box-title" style="background-color: #0090ff">
                                <h3><i class="icon-reorder"></i> Transaksi</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                <form action="logic/Transaksi_Jual.php" class="form-horizontal " method="post">


                             <div class="control-group">
                                      <label class="control-label">Nama Pelanggan</label>
                                      <div class="controls">
                                         <input type="text" class="span9" name="nama_plgn" />  
                                      </div>
                            </div>

                             <div class="control-group">
                                      <label class="control-label">Jenis Pembayaran</label>
                                      <div class="controls">
                                         <select class="span9" name="jenis_bayar">
                                                <option value="cash">Cash</option>
                                                <option value="debit">Debit</option>
                                                <option value="bg">Bilyet Giro</option>
                                                <option value="transfer">Transfer</option>
                                            </select>
                                      </div>
                            </div>

                             <div class="control-group">
                                      <label class="control-label">Kredit</label>
                                      <div class="controls">
                                         <input type="text" class="span9" name="kredit" />  
                                      </div>
                            </div>

                             <div class="control-group">
                                      <label class="control-label">DP</label>
                                      <div class="controls">
                                         <input type="number" class="span9" name="dp" />  
                                      </div>
                            </div>

                            <div class="control-group">
                                      <label class="control-label">Total</label>
                                      <div class="controls">
                                         <input type="number" name="jmlh_harga_jual" value="<?php echo $isi['total_bayar']; ?>"> 
                                      </div>
                            </div>

                              <div class="control-group">
                                      <label class="control-label">Nominal Uang</label>
                                      <div class="controls">
                                         <input type="number" name="uang_bayar" />
                                      </div>
                            </div>
                            
                            <div class="control-group"> 
                                      <div class="controls">
                                         <button class="btn btn-primary" type="submit">Proses</button>  
                                      </div> 
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
                </div>


 <!--basic scripts-->
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>-->
        <script>window.jQuery || document.write('<script src="assets/jquery/jquery-1.10.1.min.js"><\/script>')</script>
        <script src="assets/bootstrap/bootstrap.min.js"></script>
        <script src="assets/nicescroll/jquery.nicescroll.min.js"></script>

        <!--page specific plugin scripts-->
        <script src="assets/flot/jquery.flot.js"></script>
        <script src="assets/flot/jquery.flot.resize.js"></script>
        <script src="assets/flot/jquery.flot.pie.js"></script>
        <script src="assets/flot/jquery.flot.stack.js"></script>
        <script src="assets/flot/jquery.flot.crosshair.js"></script>
        <script src="assets/flot/jquery.flot.tooltip.min.js"></script>
        <script src="assets/sparkline/jquery.sparkline.min.js"></script>

        <!--flaty scripts-->
        <script src="js/flaty.js"></script>

    </body>
</html>