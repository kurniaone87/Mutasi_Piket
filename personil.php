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
                <a href="pj.php" class="nav-link">
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
            <a href="laporan.php" class="nav-link">
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
            <h1>Personil</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Master</a></li>
              <li class="breadcrumb-item active">Data Personil</li>
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
              <h3 class="card-title">Kelola Data Personil</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="button-table">
                <a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal">Tambah Personil</a>
              </div>
            </div>
            <div class="card-body">  
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name Personil</th>
                  <th>Pangkat</th>
                  <th>NRP</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
              
              <tbody>
    <?php 
      $query = mysqli_query($conn,"SELECT * FROM tb_personil");
      while ($data = mysqli_fetch_assoc($query)) 
      {
      ?>
        <tr>
          <td><?php echo $data['id_personil']; ?></td>
          <td><?php echo $data['nama_personil']; ?></td>
          <td><?php echo $data['pangkat_personil']; ?></td>
          <td><?php echo $data['nrp_personil']; ?></td>
          
          <?php 
                  if ($data['status_personil']==1){
                    echo "<td>Aktif</td>";
                  }else{
                    echo "<td>Tidak Aktif</td>";
                  }
                ?>

          <td>
          <a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal<?php echo $data['id_personil']; ?>">Edit</a>
           <!-- <a href="#" type="button" class="btn btn-md btn-danger" data-toggle="modal" data-target="#myModal<?php echo $data['id_personil']; ?>Delete">Delete</a> -->
          </td>
        </tr>

          <!-- Modal Edit User-->
          <div class="modal fade" id="myModal<?php echo $data['id_personil']; ?>" role="dialog">
              <div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Update Data Personil</h4>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="action/ubah.php" method="post">

                        <?php
                          $id = $data['id_personil']; 
                          // $query_edit = mysqli_query($conn,"SELECT tb_user.*, tb_personil.nama_personil FROM tb_user, tb_personil WHERE tb_user.id_personil=tb_personil.id_personil AND tb_user.id_user='$id'");
                          $query_edit = mysqli_query($conn,"SELECT * FROM tb_personil WHERE id_personil = '$id'");
                          while ($row = mysqli_fetch_array($query_edit)) {  
                        ?>

                        <input type="hidden" name="action" value="updatePersonil">
                        <input type="hidden" name="id_personil" value="<?php echo $row['id_personil']; ?>">

                        <div class="form-group">
                          <label>Nama Personil</label>
                          <input type="text" name="nama_personil" class="form-control" value="<?php echo $row['nama_personil']; ?>" disabled>      
                        </div>

                        <div class="form-group">
                          <label>Pangkat Personil</label>
                          <input type="text" name="pangkat_personil" class="form-control" value="<?php echo $row['pangkat_personil']; ?>">      
                        </div>

                        <div class="form-group">
                          <label>NRP Personil</label>
                          <input type="text" name="nrp_personil" class="form-control" value="<?php echo $row['nrp_personil']; ?>">      
                        </div>

                        <div class="form-group">
                          <label>Status</label>
                          <?php 
                            if ($row['status_personil']=='1'){
                              echo "<select name=\"status\" class=\"form-control\">
                                      <option value=\"1\">Aktif</option>
                                      <option value=\"0\">Tidak Aktif</option>      
                              </select>";
                            }else{
                              echo "<input type=\"text\" name=\"status\" class=\"form-control\" value=\"Tidak Aktif\" disabled>";
                            } ?>     
                        </div>

                        
                        <div class="modal-footer">  
                          <button type="submit" name="submit" class="btn btn-success">Simpan Perubahan Data</button>
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


               <!-- Modal Delete User-->
          <div class="modal fade" id="myModal<?php echo $data['id_personil']; ?>Delete" role="dialog">
              <div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Anda Yakin Ingin Menghapus Data Personil?</h4>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="action/hapus.php" method="post">

                        <?php
                          $id = $data['id_personil']; 
                          // $query_edit = mysqli_query($conn,"SELECT tb_user.*, tb_personil.nama_personil FROM tb_user, tb_personil WHERE tb_user.id_personil=tb_personil.id_personil AND tb_user.id_user='$id'");
                          $query_edit = mysqli_query($conn,"SELECT * FROM tb_personil WHERE id_personil = '$id'");
                          while ($row = mysqli_fetch_array($query_edit)) {  
                        ?>

                        <input type="hidden" name="action" value="deletePersonil">
                        <input type="hidden" name="id_personil" value="<?php echo $row['id_personil']; ?>">

                        <div class="form-group">
                          <label>Nama Personil</label>
                          <input type="text" name="nama_personil" class="form-control" value="<?php echo $row['nama_personil']; ?>" disabled>      
                        </div>

                        <div class="form-group">
                          <label>Pangkat Personil</label>
                          <input type="text" name="pangkat_personil" class="form-control" value="<?php echo $row['pangkat_personil']; ?>" disabled>      
                        </div>

                        <div class="form-group">
                          <label>NRP Personil</label>
                          <input type="text" name="nrp_personil" class="form-control" value="<?php echo $row['nrp_personil']; ?>" disabled>      
                        </div>

                          <div class="form-group">
                          <label>Status Personil</label>
                          <input type="text" name="status_personil" class="form-control" value="<?php echo $row['status_personil']; ?>" disabled>      
                        </div>

                        
                        <div class="modal-footer">  
                          <button type="submit" name="submit" class="btn btn-danger">Hapus Data Personil</button>
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
    </section>
    <!-- /.content -->
  </div>
          <!-- Modal Tambah -->
           <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Personil</h4>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="action/tambah.php" method="post">
                    <input type="hidden" name="action" value="createPersonil">
                        <div class="form-group">
                          <label>ID Personil</label>
                          <input type="text" name="id_personil" class="form-control" value="">   

                          <label>Nama Personil</label>
                          <input type="text" name="nama_personil" class="form-control" value="">   

                          <label>Pangkat Personil</label>
                          <input type="text" name="pangkat_personil" class="form-control" value="">   
                           
                          <label>NRP Personil</label>
                          <input type="text" name="nrp_personil" class="form-control" value="">   

                          <label>Status Personil</label>
                          <select name="status_personil" id="status_personil" class="form-control">
                            <option value="Pilih Status" disabled selected>Pilih Status</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                          </select>
                        </div>
                        
                        <div class="modal-footer">  
                          <button type="submit" name="submit" class="btn btn-success">Simpan Data Personil</button>
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
