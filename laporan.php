<?php
     session_start();
    include "koneksi.php";
    
      if($_SESSION['status']!="login"){
        header("location: index.php");
      }

      $level = $_SESSION['level'];

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SI Mutasi Command Center</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="dist/img/korps.jpeg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block"><strong>SICATAT</strong> | MUTASI</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>


          <?php
          if ($level == "admin") {
            ?>
         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="user.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="personil.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Personil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="barang.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Barang</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="settings.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penanggung Jawab</p>
                </a>
              </li>
            </ul>
          </li>
           
          <li class="nav-header">TRANSAKSI</li>
          <li class="nav-item">
            <a href="trx_mutasijaga.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Mutasi Piket
              </p>
            </a>
          </li>
            
          <?php
            } else {
              ?>
               <li class="nav-header">TRANSAKSI</li>
          <li class="nav-item">
            <a href="trx_mutasijaga.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Mutasi Piket
              </p>
            </a>
          </li>
              <?php 
            }

            ?>  

          <li class="nav-header">LAPORAN</li>
          <li class="nav-item">
            <a href="laporan.php" class="nav-link active">
              <i class="nav-icon fas fa-file"></i>
              <p>Laporan Mutasi Jaga</p>
            </a>
          </li>

          <li class="nav-header">KELUAR</li>
          <li class="nav-item">
            <a href="./action/logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Laporan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Laporan</a></li>
              <li class="breadcrumb-item active">Laporan Mutasi Jaga</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Laporan Mutasi Jaga</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">  
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Tanggal</th>
                  <th>Analisis</th>
                  <th>Evaluasi</th>
                  <th>Pelaksana</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
          <?php 
          $no=1;
          $query = mysqli_query($conn,"SELECT tb_mutasi_jaga.*, tb_user.id_personil, tb_personil.nama_personil 
          FROM tb_mutasi_jaga, tb_user, tb_personil 
          WHERE tb_mutasi_jaga.id_user=tb_user.id_user AND tb_user.id_personil=tb_personil.id_personil
          AND tb_mutasi_jaga.status_mutasi='1' ORDER BY id_mutasi_jaga DESC");
          while ($data = mysqli_fetch_assoc($query)) 
          {
          ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $data['tgl_mutasi']; ?></td>
              <td><?php echo $data['analisis']; ?></td>
              <td><?php echo $data['evaluasi']; ?></td>
              <td><?php echo $data['nama_personil']; ?></td>              
              <td>
                <a href="laporan_pdf.php?id=<?php echo $data['id_mutasi_jaga'];?>" type="button" class="btn btn-md btn-success" download>Cetak PDF</a>
              </td>
            </tr>
          <?php 
          $no++;            
          } 
          ?>
        </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>&copy; 2023</strong> Putu Gede Putra Jaya
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
