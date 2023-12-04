<?php
    include "koneksi.php";
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
            <a href="dashboard.php" class="nav-link">
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
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Mutasi Piket Jaga</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="button-table">

                <a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal">Tambah Mutasi Piket Jaga</a>
              </div>
            </div>
            <div class="card-body">  

          <?php 
          $query = mysqli_query($conn,"SELECT * from tb_mutasi_jaga WHERE status_mutasi='0'");
          while ($data = mysqli_fetch_assoc($query)) 
          {
          ?>
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Tanggal</th>
                  <th>Analisis</th>
                  <th>Evaluasi</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
            <tr>
              <td><?php echo $data['id_mutasi_jaga']; ?></td>
              <td><?php echo $data['tgl_mutasi']; ?></td>
              <td><?php echo $data['analisis']; ?></td>
              <td><?php echo $data['evaluasi']; ?></td>
              
                <?php 
                  if ($data['status_mutasi']==1){
                    echo "<td>Approved</td>";
                  }else{
                    echo "<td>Pending</td>";
                  }
                ?>
              
              <td>
                <a href="detil_mutasijaga.php?id=<?php echo $data['id_mutasi_jaga'];?>" type="button" class="btn btn-md btn-warning">Detil</a>
                <a href="#" type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#myModal<?php echo $data['id_mutasi_jaga']; ?>">Mutasi Jaga</a>
              </td>
            </tr>
            <!-- Modal Edit User-->
            <div class="modal fade" id="myModal<?php echo $data['id_mutasi_jaga']; ?>" role="dialog">
              <div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Proses Mutasi Jaga</h4>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="action/ubah.php" method="post">

                        <?php
                          $id = $data['id_mutasi_jaga']; 
                          $query_edit = mysqli_query($conn,"SELECT * FROM tb_mutasi_jaga WHERE id_mutasi_jaga='$id'");
                          while ($row = mysqli_fetch_array($query_edit)) {  
                        ?>
                        <input type="hidden" name="action" value="updateMutasiJaga">
                        <input type="hidden" name="id_mutasi_jaga" value="<?php echo $row['id_mutasi_jaga']; ?>">

                        <div class="form-group">
                          <label>Tanggal</label>
                          <input type="text" name="tanggal" class="form-control" value="<?php echo $row['tgl_mutasi']; ?>" disabled>      
                        </div>

                        <div class="form-group">
                          <label>Analisa</label>
                          <textarea class="form-control" name="analisa" rows="6" placeholder="Analisa ..."></textarea>     
                        </div>

                        <div class="form-group">
                          <label>Evaluasi</label>
                          <textarea class="form-control" name="evaluasi" rows="6" placeholder="Evaluasi ..."></textarea>
                        </div>
                        
                        <div class="modal-footer">  
                          <button type="submit" name="submit" class="btn btn-success">Mutasi Jaga</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>

                        <?php 
                        }
                        ?>        
                      </form>
                  </div>
                </div>
                
              </div>
            </div>
          <?php               
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
      <!-- HISTORY MUTASI -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">History Mutasi Piket Jaga</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">  
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Tanggal</th>
                  <th>Analisis</th>
                  <th>Evaluasi</th>
                  <th>Status</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
          <?php 
          $query = mysqli_query($conn,"SELECT * from tb_mutasi_jaga WHERE status_mutasi='1'");
          while ($data = mysqli_fetch_assoc($query)) 
          {
          ?>
            <tr>
              <td><?php echo $data['id_mutasi_jaga']; ?></td>
              <td><?php echo $data['tgl_mutasi']; ?></td>
              <td><?php echo $data['analisis']; ?></td>
              <td><?php echo $data['evaluasi']; ?></td>
                <?php 
                  if ($data['status_mutasi']==1){
                    echo "<td>Approved</td>";
                  }
                ?>
              <td>
                  <a href="history_mutasijaga.php" type="button" class="btn btn-md btn-primary">Detil</a>
              </td>
            </tr>
          <?php               
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
          <!-- Modal Tambah -->
          <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
              
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Mutasi Jaga</h4>
                  </div>
                  <div class="modal-body">
                    
                    <form role="form" action="action/tambah.php" method="post">
                    <input type="hidden" name="action" value="createMutasiJaga">
                      
                        <div class="form-group">   
                          <label>Yakin menambah data Mutasi Jaga!</label>       
                        </div>
                        
                        <div class="modal-footer">  
                          <button type="submit" name="submit" class="btn btn-success">Yakin! Tambah Data</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>       
                      </form>
                  </div>
                </div>
                
              </div>
        </div>
        <!-- End of Modal Tambah -->
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
