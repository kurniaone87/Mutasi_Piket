<?php
    include "koneksi.php";
    $idmutasi=$_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | DataTables</title>
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
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="../gallery.html" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
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
            </ul>
          </li>
          <li class="nav-header">TRANSAKSI</li>
          <li class="nav-item">
            <a href="trx_mutasijaga.php" class="nav-link active">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Mutasi Piket
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>

          <li class="nav-header">LAPORAN</li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Documentation</p>
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
            <h1>Kelola Mutasi Piket</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
              <li class="breadcrumb-item active">Mutasi Piket</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Catat Barang</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
<!-- disini untuk tabel Catat Barang -->
                <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Barang</th>
                  <th>Nama Barang</th>
                  <th>Jumlah Barang</th>
                  <th>Keterangan</th>
                  
                </tr>
                </thead>
                <tbody>
          <?php 
          $query = mysqli_query($conn,"SELECT `tb_detil_mutasi_barang`.*, tb_barang.nama_barang, tb_barang.jml_barang
                                      FROM `tb_detil_mutasi_barang`,tb_barang
                                      WHERE `tb_detil_mutasi_barang`.id_barang=tb_barang.id_barang AND id_mutasi_jaga='$idmutasi'");
          while ($data = mysqli_fetch_assoc($query)) 
          {
          ?>
            <tr>
              <td><?php echo $data['id_barang']; ?></td>
              <td><?php echo $data['nama_barang']; ?></td>
              <td><?php echo $data['jml_barang']; ?></td>
              <td><?php echo $data['keterangan']; ?></td>
            </tr>
          <?php               
          } 
          ?>
        </tbody>

              </table>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Tambah Data Barang</button>
                </div>
            </div>
            <!-- /.card -->
          </div>
          <!--tutup kolom kiri -->
          <!-- kolom kanan -->
          <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Personil Piket</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

<!-- disini untuk tabel Persomnil Piket -->
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Personil</th>
                  <th>Nama Personil</th>
                  <th>Pangkat</th>
                  <th>No. NRP</th>
                  
                </tr>
                </thead>
                <tbody>
          <?php 
          $query = mysqli_query($conn,"SELECT tb_detil_mutasi_personil.*, tb_personil.nama_personil, tb_personil.pangkat_personil, tb_personil.nrp_personil
                                        FROM tb_detil_mutasi_personil, tb_personil
                                        WHERE tb_detil_mutasi_personil.id_personil=tb_personil.id_personil
                                        AND id_mutasi_jaga='$idmutasi'");
          while ($data = mysqli_fetch_assoc($query)) 
          {
          ?>
            <tr>
              <td><?php echo $data['id_personil']; ?></td>
              <td><?php echo $data['nama_personil']; ?></td>
              <td><?php echo $data['pangkat_personil']; ?></td>
              <td><?php echo $data['nrp_personil']; ?></td>
            </tr>
          <?php               
          } 
          ?>
        </tbody>

              </table>
              </div>
              <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Tambah Personil Piket</button>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--tutup kolom kanan -->

          <!-- TENGAH -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Catat Aktivitas Mutasi</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
<!-- disini untuk tabel List Mutasi -->
<table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Waktu Aktivitas</th>
                  <th>Keterangan</th>                  
                </tr>
                </thead>
                <tbody>
          <?php 
          $query = mysqli_query($conn,"SELECT * FROM tb_list_mutasi WHERE id_mutasi_jaga='$idmutasi'");
          while ($data = mysqli_fetch_assoc($query)) 
          {
          ?>
            <tr>
              <td><?php echo $data['waktu_mutasi']; ?></td>
              <td><?php echo $data['keterangan_mutasi']; ?></td>
            </tr>
          <?php               
          } 
          ?>
        </tbody>
              </table>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Tambah Aktivitas Mutasi</button>
                </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- TUTUP TENGAH -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.0
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
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
