<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url();?>assets/icon.png">

    <title>Point Of Sales App</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">

  </head>

  <body>

    <!-- Header-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarToggler">
        <a class="navbar-brand" href="#">Point Of Sales</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
          <div class="nav-link"><?php echo anchor('auth/index','Home');?></div>
          </li>
          <li class="nav-item">
          <div class="nav-link"><?php echo anchor('users','Data Users');?></div>
          </li>
          <li class="nav-item">
            <div class="nav-link"><?php echo anchor('produk','Data Produk');?></div>
          </li>
          <!-- Dropdown -->
          <li class="nav-item dropdown">
            <div class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
              <?php echo anchor('laporan','Laporan');?>
            </div>
            <div class="dropdown-menu">
              <div class="nav-link"><?php echo anchor('laporan','Laporan Transaksi');?></div>
              <div class="nav-link"><?php echo anchor('laporan/cetakexcel','Laporan Excel');?></div>
            </div>
          </li>
        </ul>

        <?php
         echo anchor('auth/logout','Logout',array('class'=>'btn btn-danger btn-sm form-inline my-2 my-lg-0'))
         ?>
      </div>
    </nav>

    <br>

    <!-- Content -->
    <div class="container">

        <?php echo $contents; ?>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/popper.min.js"></script>
  </body>
</html>
