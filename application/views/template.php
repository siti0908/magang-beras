<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>NIPOS</title>
  <!-- Favicons -->
  <link href="<?php echo base_url() ?>assets/img/pos123.png" rel="icon">
  <link href="<?php echo base_url() ?>assets/img/pos123.png" rel="icon">


  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">

 <!-- Morris charts -->
  <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/morris.js/morris.css"> -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- ChartJS -->
  <script src="<?php echo base_url() ?>assets/bower_components/chart.js/Chart.js"></script>
  <!-- link buat tabel -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-dark sidebar-mini">
  <div class="wrapper">

    <header class="main-header  fixed-top">
      <!-- Logo -->
      <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>POS</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>NI</b>POS</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu  fixed-top">
          <ul class="nav navbar-nav  fixed-top">
            
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs"><?= $_SESSION['nama'] ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"><br>
                  <?= $_SESSION['nama'] ?><br>
                  <span><?= $_SESSION['hak_akses'] ?></span>


                  </p>
                </li>

                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo site_url() ?>/Login/logout" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="<?php echo site_url() ?>/Login/logout"><i class="fa fa-sign-out"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?= $_SESSION['nama'] ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-primary"><i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
        <!-- /.search form -->

        <!-- menuuu -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MENU UTAMA</li>
          <li class="active">
            <a href="<?php echo site_url() ?>/dashboard">
              <i class="glyphicon glyphicon-home"></i> <span>Dashboard</span>
            </a>
          </li>

          <!-- Menu User-->

          <li>
            <!--   <li class="active"> -->
            <a href="<?php echo site_url() ?>/User">
              <i class="glyphicon glyphicon-user"></i>
              <span>DATA USER</span>
            </a>
          </li>

          <!-- DATA Stok -->
<!-- 
 <li>
            <a href="<?php echo site_url() ?>/grafik">
              <i class="fa fa-calendar"></i>
              <span>grafik</span>
            </a>
          </li> -->

          <!-- DATA Stok -->
          <!-- DATA Stok -->

          <!-- <li>
            <a href="<?php echo site_url() ?>/Sstock_brg">
              <i class="fa fa-inbox"></i>
              <span>Stok Beras</span>
            </a>
          </li>
 -->
          <!-- DATA Stok -->

        <!--   <li>
            <a href="<?php echo site_url() ?>/Sbrg_masuk">
              <i class="fa fa-list-alt"></i>
              <span>Barang Masuk</span>
            </a>
          </li>
        -->
           <!-- DATA Masuk -->
           <li>
        <!--     <a href="<?php echo site_url() ?>/Sbrg_keluar">
              <i class="fa  fa-list"></i>
              <span>Barang Keluar</span>
            </a>
          </li>  

<li> -->
            <a href="<?php echo site_url() ?>/Stok">
              <i class="fa  fa-list"></i>
              <span>Stok</span>
            </a>
          </li> 

<!-- buat tugas 2 -->
<li>
           <a href="<?php echo site_url() ?>/Bulog">
              <i class="fa  fa-list"></i>
              <span>Bulog Stok</span>
            </a>
          </li>
           
          <li>
            <a href="<?php echo site_url() ?>/Supply_point">
              <i class="fa  fa-list"></i>
              <span>Supply Point</span>
            </a>
          </li> 

          <li>
            <a href="<?php echo site_url() ?>/Kabupaten">
              <i class="fa  fa-list"></i>
              <span>Kabupaten</span>
            </a>
          </li> 
        

          <li>
            <a href="<?php echo site_url() ?>/Alokasi">
              <i class="fa  fa-list"></i>
              <span>Alokasi</span>
            </a>
          </li> 
        
    </aside>

    <!-- Buat Tmapil di Dashboard -->
    <div class="content-wrapper">
      <section class="content">
        <?php $this->load->view($page); ?>
      </section>
    </div>
      

    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.18
      </div>
      <strong>Copyright &copy; 2022-2023 <a href="#">Beras</a>.</strong>Bulog
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark" style="display: none;">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
     
      </div>
    </aside>
   
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo base_url() ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- Morris.js charts -->
 <!--  <script src="<?php echo base_url() ?>assets/bower_components/raphael/raphael.min.js"></script>
  <script src="<?php echo base_url() ?>assets/bower_components/morris.js/morris.min.js"></script> -->
  <!-- Sparkline -->
  <script src="<?php echo base_url() ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="<?php echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?php echo base_url() ?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?php echo base_url() ?>assets/bower_components/moment/min/moment.min.js"></script>
  <script src="<?php echo base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="<?php echo base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>

   <script src="<?php echo base_url() ?>assets/bower_components/chart.js/Chart.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>



 <!--  <script>
    $(document).ready(function(){
      $('.sidebar-menu').tree();

      donut = new Morris.Donut({
      element: 'sales-chart',
      data: [
        {label: "Januari", value: 10000},
        {label: "Februari", value: 30000},
        {label: "Maret", value: 20000}
      ]
      });
    })
  </script> -->
</body>

</html>