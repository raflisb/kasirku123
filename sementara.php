
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
         <link rel="stylesheet" type="text/css" href="assets/chosen-bootstrap/chosen.min.css" />
        <link rel="stylesheet" type="text/css" href="assets/jquery-tags-input/jquery.tagsinput.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-fileupload/bootstrap-fileupload.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-colorpicker/css/colorpicker.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-timepicker/compiled/timepicker.css" />
        <link rel="stylesheet" type="text/css" href="assets/clockface/css/clockface.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-switch/static/stylesheets/bootstrap-switch.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
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
                       <center> <h1><i class="icon-archive"></i>Tambah / Hapus Barang</h1>
                      </center>
                    </div>
                </div>
                <!-- END Page Title -->

                <!-- BEGIN Main Content -->
                 <div class="row-fluid" >
                    <div class="span12">
                        <div class="box">
                            <div class="box-title" style="background-color: #0090ff">
                                <h3><i class="icon-reorder"></i> Pilih Barang</h3>
                                <div class="box-tool">
                                    <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                                    <a data-action="close" href="#"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                             <?php
                    include 'Database.php';  

                    $query = "SELECT nama_brg, stok_brg, harga_jual FROM barang order by nama_brg asc";
                                    $hasil = $connect->query($query);?>

                            <div class ="box-content"> 
                              <form action="logic/sementara.php" class="form-horizontal" method="post">
                           <div class="control-group">
                                <label class="control-label"><b>Nama Item</b></label>
                                      <div class="controls" onfocus ="autoload()">
                                         <select data-placeholder="Pilih Barang" class="chosen-with-diselect span6" tabindex="-1" id="autoload1" name="nama_brg">
                                            <option value=""> </option>
                                            <?php
                                            if (mysqli_num_rows($hasil)>0)
                                            {
                                            while ($row=mysqli_fetch_array($hasil))
                                            {
                                            ?>
                                            <option><?php echo $row['nama_brg']?></option>
                                           <?php  } 
                                         } ?>
                                            

                                         </select>
                                      </div>
                                    </div>
                             <div class="control-group">
                                      <label class="control-label">Jumlah Barang: </label>
                                      <div class="controls">
                                         <input type="number" class="span6" name="jumlah" />  
                                      </div>
                            </div>


                              <div class="control-group">
                     
                                      <div class="controls">
                                         <button class="btn btn-primary" type="submit">Tambah</button> &nbsp
                                         <a href="transaksi_jual.php"  class="btn btn-primary">Kembali </a>
                                      </div>       
                            </div>
                        </form>

                    </div>
                <!-- Table List pelanggan --> 
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <div class="box-title" style="background-color: #0090ff">
                                <h3><i class="icon-table"></i> List Barang Transaksi</h3>
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
      <th> Nama Barang </th>
      <th> Jumlah</th>  
            
        </tr>
    </thead>
    <tbody>
        <tr class="table-flag-blue">
      <?php 
      include 'logic/oop.php'; 
        $oop= new oop();
            $nomor=1; 
            
          foreach ($oop->readSementara() as $isi)
          {  ?>

          <td><?php echo $nomor++; ?></td> 
            <td><?php echo $isi['nama_brg']; ?></td>
            <td><?php echo $isi['stok']; ?></td>
          <td>
              <a href="logic/Delete_Sementara.php?del=<?php echo $isi['nama_brg']; ?>">Hapus</a></td>

             </tr>
    </tbody>
        <?php
      } 
      ?>

      </table>
    </div>
  </div>
</div>




<!-- Form  edit pelanggan -->

                   
                 

 <!-- Form  pelanggan Baru -->
                   
                </div> 
                <!-- END Main Content -->
                
               
             


    <!--basic scripts-->
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>-->
        <script>window.jQuery || document.write('<script src="assets/jquery/jquery-1.10.1.min.js"><\/script>')</script>
        <script src="assets/bootstrap/bootstrap.min.js"></script>
        <script src="assets/nicescroll/jquery.nicescroll.min.js"></script>


        <!--page specific plugin scripts-->
      <script type="text/javascript" src="assets/chosen-bootstrap/chosen.jquery.min.js"></script>
        <script type="text/javascript" src="assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
        <script type="text/javascript" src="assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
        <script type="text/javascript" src="assets/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
        <script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
        <script type="text/javascript" src="assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
        <script type="text/javascript" src="assets/clockface/js/clockface.js"></script>
        <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="assets/bootstrap-daterangepicker/date.js"></script>
        <script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script type="text/javascript" src="assets/bootstrap-switch/static/js/bootstrap-switch.js"></script>
        <script type="text/javascript" src="assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
        <script type="text/javascript" src="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
        <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script> 


        <!--flaty scripts-->
        <script src="js/flaty.js"></script>
    </body>
</html>

