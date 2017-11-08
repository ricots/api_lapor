<?php 

ini_set("display_errors", "on");
 session_start();
 $user_name = $_SESSION['user'];
 if(empty($user_name)){
   header("location:../gagal_login.php");
 }

include '../Config/koneksi.php';

// $result = $koneksi->query("SELECT * FROM tb_admin WHERE user='$user_name'");

?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Lapor Malang</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
  <!-- font awesome -->
  <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/bootstrap/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../assets/bootstrap/css/skins/_all-skins.min.css">
  <!-- jQuery 2.2.0 -->
  <script src="../assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>

<!-- Data Tables -->
<link rel="stylesheet" type="text/css" href="../assets/plugins/datatables/dataTables.bootstrap.css">
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Administrator</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
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
        <div class="text-center">
          <img src="../assets/img/ic_launcher.png" width="150px" height="150px" >
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i> <span>MASTER</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?master=member"><i class="fa fa-table"></i> Member </a></li>
            <li><a href="index.php?master=pelapor"><i class="fa fa-table"></i> Pelapor </a></li>
            <li><a href="index.php?master=maps"><i class="fa fa-table"></i> Maps </a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i> <span>SETTING</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="../logout.php"><i class="fa fa-sign-out"></i> Sign-out </a></li>
            <li><a href="#"><i class="fa fa-info-circle"></i> Info </a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <?php 

            if (@$_GET['master']=='member') {
                    include 'Member/tampil_member.php';
                }
            elseif (@$_GET['master']=='pelapor') {
                    include 'Pelaporan/tampil_pelapor.php';
                }
            elseif (@$_GET['master']=='maps') {
                    include 'Maps/tampil_maps.php';
                }                                                         
            else{
                    include 'beranda.php';   
                }
           ?>
        </div>
      </section>
      <!-- end content -->

  </div>
  <!-- content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> Alpha
    </div>
    <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="index.php">lapor malang</a>.</strong> All rights reserved.
  </footer>

</div>
<!-- ./wrapper -->
<!-- Bootstrap 3.3.6 -->
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/bootstrap/js/app.min.js"></script>
<!-- Dara tables -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="../assets/plugins/datatables/dataTables.rowReorder.min.js"></script>
<!-- CK editor -->
<!-- <script src="../assets/plugins/ckeditor/ckeditor.js"></script> -->
</body>
</html>