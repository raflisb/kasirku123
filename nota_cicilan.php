
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
                       <center> <h1><i class="icon-archive"></i> Daftar Nota Cicilan</h1>
                        <h4>Cicilan disini</h4></center></center>
                    </div>
                </div>
                <!-- END Page Title -->

                <!-- BEGIN Main Content -->
                <!-- Table List Barang --> 
                <div class="row-fluid">
                    <div class="span7">
                        <div class="box">
                            <div class="box-title" style="background-color: #0090ff">
                                <h3><i class="icon-table"></i> Nota Cicilan</h3>
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
            <th>Nomor Nota Cicilan</th>
           
            <th>ID Cicilan</th>
            <th>Tenor Ke</th>
            <th>Tgl Pembayaran</th>
          
            
        </tr>
    </thead>
    <tbody>
        <tr class="table-flag-blue">
        	<?php 
        		include 'Database.php';
        		$sql = "SELECT * FROM nota_cicilan"; 
        		$hasil = $connect->query($sql); 
        		$nomor=1; 
        	while ($isi = $hasil->fetch_array())
        	{ ?> 

        	<td><?php echo $nomor; ?></td> 
            <td><?php echo $isi['no_nota_ccl']; ?></td>
            <td><?php echo $isi['id_cicilan']; ?> </td>
            <td><?php echo $isi['tenor']; ?></td>
            <td><?php echo $isi['tgl_ccl']; ?></td>
            <td><a href="logic/Delete_Nota_Cicilan.php?del=<?php echo $isi['no_nota_ccl']; ?>">Hapus</a></td>

             </tr>
            <?php     
             $nomor++; } ?> 
       
       
    </tbody>
</table>
                            </div>
                        </div>
                    </div>
              


<!-- Form  edit barang -->

                    <div class="span5">
                        <div class="box">
                            <div class="box-title" style="background-color: #0090ff">
                                <h3><i class="icon-reorder"></i> Bayar Cicilan</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                <form action="logic/Bayar_Cicilan.php" class="form-horizontal " method="post">
                                   <div class="control-group">
                                      <label class="control-label">Nomor Nota Cicilan : </label>
                                      <div class="controls">
                                         <input type="text" class="span9" name="no_nota_ccl"/>  
                                      </div>
                            </div>


                             <div class="control-group">
                                      <label class="control-label">ID cicilan :</label>
                                      <div class="controls">
                                         <input type="text" class="span9" name="id_cicilan" />  
                                      </div>
                            </div>

                             <div class="control-group">
                                      <label class="control-label">Tenor ke : </label>
                                      <div class="controls">
                                         <input type="text" class="span9" name="tenor"/>  
                                      </div>
                            </div>

                             <div class="control-group">
                                      <label class="control-label">Tgl Pembayaran : </label>
                                      <div class="controls">
                                         <input type="text" class="span9" name="tgl_ccl" />  
                                      </div>
                            </div>

                              <div class="control-group">
                     
                                      <div class="controls">
                                         <button class="btn btn-primary" type="submit">Bayar</button>  
                                      </div>       
                            </div>
                        </form>
                    </div>
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

