
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
                       <center> <h1><i class="icon-archive"></i> Master Data barang</h1>
                        <h4>Tambah, Edit, Hapus Barang</h4></center></center>
                    </div>
                </div>
                <!-- END Page Title -->

                <!-- BEGIN Main Content -->
                <!-- Table List Barang --> 
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <div class="box-title" style="background-color: #0090ff">
                                <h3><i class="icon-table"></i> List Barang</h3>
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
            <th>Kode Barang</th>
           
            <th>Nama Barang</th>
            <th>Stok Barang</th>
            <th>Harga Jual</th>
            <th>Harga Beli</th>
          
            
        </tr>
    </thead>
    <tbody>
        <tr class="table-flag-blue">
        	 
           <?php 
            include 'logic/oop.php'; 
            $oop = new oop(); 
            $nomor=1;  
        	foreach ($oop->readBarang() as $isi)
        	{ ?>

        	<td><?php echo $nomor++?></td> 
            <td><?php echo $isi['kode_brg']; ?></td>
            <td><?php echo $isi['nama_brg']; ?></td>
            <td><?php echo $isi['stok_brg']; ?></td>
            <td><?php echo $isi['harga_jual']; ?> </td>
            <td><?php echo $isi['harga_beli']; ?></td>
            <td> 
              <a class="btn btn-circle show-tooltip" title="Update" href="#myModal<?php echo $nomor; ?>" role="button" data-toggle="modal"><i class="icon-edit"></i></a>
            </td>

            <td> 
              <a href="update.php?kode=<?php echo $isi['kode_brg']; ?>">Coba</a>
            </td>

            <td>
              <a href="logic/Delete_Barang.php?del=<?php echo $isi['kode_brg']; ?>">Hapus</a>
            </td>

             </tr>
    </tbody>

        <div id="myModal<?php echo $nomor; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
              <form action ="logic/update.php?aksi=updateBarang" method="post">
              <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Edit Data Barang</h3>
                </div>
               <div class="modal-body">
                    <label><b>kode Barang</b></label>
                    <input type="text" name="kode_brg" value="<?php echo $isi['kode_brg']; ?>" />
                    <br>
                    <label><b>Nama Barang</b></label>
                    <input type="text" name="nama_brg" value="<?php echo $isi['nama_brg']; ?>" />
                    <br>
                    <label><b>Stok Barang</b></label>
                    <input type="text" name="stok_brg" value="<?php echo $isi['stok_brg']; ?>" />
                    <br>
                    <label><b>Harga Jual</b></label>
                   <input type="text" name="harga_jual" value="<?php echo $isi['harga_jual']; ?>" />
                    <br>
                    <label><b>Harga Beli</b></label>
                   <input type="text" name="harga_beli" value="<?php echo $isi['harga_beli']; ?>" />
                    <br>      
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                    <!-- <input type="submit" value="Simpan"> -->
                   <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>              
                </div>
              </form>
             </div>
             <?php 
           } 
           ?>
        </table>
     </div>
    </div>
</div>
      
                 

 <!-- Form  Barang Baru -->
                    <div class="row-fluid" >
                    <div class="span12">
                        <div class="box">
                            <div class="box-title" style="background-color: #0090ff">
                                <h3><i class="icon-reorder"></i> Data Barang Baru </h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                <form action="logic/Tambah_Barang.php" class="form-horizontal" method="post">
                                   <div class="control-group">
                                      <label class="control-label">Kode Barang</label>
                                      <div class="controls">
                                         <input type="text" class="span6" name="kode_brg" />  
                                      </div>
                            </div>

                            <div class="control-group">
                                      <label class="control-label">Nama Barang</label>
                                      <div class="controls">
                                         <input type="text" class="span6" name="nama_brg" />  
                                      </div>
                            </div>

                             <div class="control-group">
                                      <label class="control-label">Stok Barang</label>
                                      <div class="controls">
                                         <input type="text" class="span6" name="stok_brg" />  
                                      </div>
                            </div>

                             <div class="control-group">
                                      <label class="control-label">Harga Jual</label>
                                      <div class="controls">
                                         <input type="text" class="span6" name="harga_jual"/>  
                                      </div>
                            </div>

                             <div class="control-group">
                                      <label class="control-label">Harga Beli</label>
                                      <div class="controls">
                                         <input type="text" class="span6" name="harga_beli" />  
                                      </div>
                            </div>

                              <div class="control-group">
                     
                                      <div class="controls">
                                         <button class="btn btn-primary" type="submit">Simpan</button>  
                                      </div>       
                            </div>
                        </form>
                    </div>
                </div> 
                <!-- END Main Content -->
                
               
             


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

