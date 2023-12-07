<?php
     session_start();
     include "koneksi.php";
    
      if($_SESSION['status']!="login"){
        header("location: index.php");
      }

      $level = $_SESSION['level'];
      
      $id=$_GET['id'];
      // echo $id;
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

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
<body>
  
       <section class="content-header">
      <div class="row">
         <div class="col-12">
          <div class="card">
           <div class="card-header">
            <h3 class="card-title">Data Barang</h3>
          </div>
            <div class="card-body">  
              <table  class="table table-bordered table-striped">
                <thead>
                 <tr>
                  <th>ID Barang</th>
                  <th>Nama Barang</th>
                  <th>Jumlah Barang</th>
                  <th>Kelengkapan</th>
                  <th>Keterangan</th>
                </tr>
                </thead>
              
                <tbody>
                    <?php 
                        $query = mysqli_query($conn,"SELECT `tb_detil_mutasi_barang`.*, tb_barang.nama_barang, tb_barang.jml_barang
                                                    FROM `tb_detil_mutasi_barang`,tb_barang
                                                    WHERE `tb_detil_mutasi_barang`.id_barang=tb_barang.id_barang AND id_mutasi_jaga='$id'");
                        while ($data = mysqli_fetch_assoc($query)) 
                        {
                        ?>
                          <tr>
                            <td><?php echo $data['id_barang']; ?></td>
                            <td><?php echo $data['nama_barang']; ?></td>
                            <td><?php echo $data['jml_barang']; ?></td>
                            <td><?php echo $data['kelengkapan']; ?></td>
                            <td><?php echo $data['keterangan']; ?></td>
                          </tr>
                        <?php               
                        } 
                        ?>
                  </tbody>

              </table>
            </div>
          </div>

            <!-- /.card-body -->
          </div>
          </div>

          <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
            <h3 class="card-title">Data Personil</h3>
          </div> 
            <div class="card-body"> 
              <table  class="table table-bordered table-striped">
                <thead>
                 <tr>
                  <th>ID Personil</th>
                  <th>Nama Personil</th>
                  <th>Pangkat</th>
                  <th>No. NRP</th>
                  <th>Keterangan</th>
                </tr>
                </thead>
              
                <tbody>
                    <?php 
                          $query = mysqli_query($conn,"SELECT tb_detil_mutasi_personil.*, tb_personil.nama_personil, tb_personil.pangkat_personil, tb_personil.nrp_personil
                                                        FROM tb_detil_mutasi_personil, tb_personil
                                                        WHERE tb_detil_mutasi_personil.id_personil=tb_personil.id_personil
                                                        AND id_mutasi_jaga='$id'");
                          while ($data = mysqli_fetch_assoc($query)) 
                          {
                          ?>
                            <tr>
                              <td><?php echo $data['id_personil']; ?></td>
                              <td><?php echo $data['nama_personil']; ?></td>
                              <td><?php echo $data['pangkat_personil']; ?></td>
                              <td><?php echo $data['nrp_personil']; ?></td>
                              <td><?php echo $data['keterangan']; ?></td>
                            </tr>
                          <?php               
                          } 
                          ?>
                  </tbody>

              </table>
            </div>
            </div>
            <!-- /.card-body -->
          </div>
          </div>

          <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
          <h3 class="card-title">Data Mutasi</h3>
        </div>
            <div class="card-body">  
              <table  class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Hari / Tanggal</th>
                  <th>Keterangan</th>
                </tr>
                </thead>
              
                <tbody>
                    <?php 
                    $query = mysqli_query($conn,"SELECT * FROM tb_list_mutasi WHERE id_mutasi_jaga='$id'");
                    while ($data = mysqli_fetch_assoc($query)) 
                    {
                    ?>
                      <tr>
                        <td><?php echo $data['id_list_mutasi']; ?></td>
                        <td><?php echo $data['waktu_mutasi']; ?></td>
                        <td><?php echo $data['keterangan_mutasi']; ?></td>
                      </tr>
                    <?php               
                    } 
                    ?>
                  </tbody>

              </table>
          </div>
            </div>
            <!-- /.card-body -->
          </div>
          </div>

          <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
             <h3 class="card-title">Data Analisis & Evaluasi</h3>
           </div>
            <div class="card-body">  
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th colspan="6" style="text-align: center;">Keterangan</th>
                </tr>
                </thead>
                <tbody>
          <?php 
          $query = mysqli_query($conn,"SELECT * from tb_mutasi_jaga WHERE id_mutasi_jaga='$id'");
          while ($data = mysqli_fetch_assoc($query)) 
          {
          ?>
          <tr>
          <td>
              <?php 
              $analisisLines = explode("\n", $data['analisis']);
              $evaluasiLines = explode("\n", $data['evaluasi']);

              echo 'Analisis: ';
              foreach ($analisisLines as $line) {
                echo '<br>&emsp;&emsp;&emsp;&emsp;- ' . $line;
              }

              if (!empty($data['evaluasi'])) {
                echo '<br><br>Evaluasi: ';
                foreach ($evaluasiLines as $line) {
                  echo '<br>&emsp;&emsp;&emsp;&emsp;- ' . $line;
                }
              }
              ?>
            </td>
          </tr>
          <?php               
          } 
          ?>
        </tbody>

              </table>
            </div>
          </div>
          <!-- /.card -->
        </div>
          </div>

    </section>



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