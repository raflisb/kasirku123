


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
                       <center> <h1><i class="icon-laptop"></i> Pengriman </h1>
                        <h4>Selamat Datang kembali</h4></center></center>
                    </div>
                </div>
                <!-- END Page Title -->

                <!-- BEGIN Main Content -->

         <!-- Chart Hasil Penjualan --> 
          
                <!-- Table history Penjualan -->     
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                           <div class="box-title" style="background-color: #0090ff">
                                <h3><i class="icon-table"></i> Detail Pengiriman</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                <div class="btn-toolbar pull-right clearfix">
                                    <div class="btn-group">
                                        <a class="btn btn-circle show-tooltip" title="Print" href="#"><i class="icon-print"></i></a>
                                        <a class="btn btn-circle show-tooltip" title="Export to PDF" href="#"><i class="icon-file-text-alt"></i></a>
                                        <a class="btn btn-circle show-tooltip" title="Export to Exel" href="#"><i class="icon-table"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a class="btn btn-circle show-tooltip" title="Refresh" href="#"><i class="icon-repeat"></i></a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
<table class="table table-advance" id="table1">
    <thead>
        <tr>
            
 			<th> NO</th>
            <th>No Surat Jalan</th>
            <th>Nomor Nota </th>
            <th>Nama pengirim</th>
          <th> Tgl Pengiriman <
        </tr>
    </thead>
    <tbody>
        <tr class="table-flag-blue">
        	<?php 
        		include 'logic/oop.php';
                $oop = new oop() ; 
                    $nomor=1; 
                foreach ($oop->readKirim() as $isi)
        		
        	{ echo "
        	<td> $nomor</td> 
            <td>".$isi['no_srt_jln']."</td>
            <td>".$isi['no_nota_jual']."</td>
            <td>".$isi['nama_kurir']."</td>
            <td>".$isi['tgl_kirim']."</td>
            
             </tr>";
                
             $nomor++; } ?> 
       
       
    </tbody>
</table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- END Main Content -->
                
                <footer>
                    <p>2013 © FLATY Admin Template.</p>
                </footer>

             


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

