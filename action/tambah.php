<?php 
include('../koneksi.php');

// USER
if ($_POST['personil'] == NULL){
  header('Location: ../user.php');
}else{
if (isset($_POST['submit'])) {
  $personil = $_POST['personil'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $level = $_POST['level'];

  $query = "INSERT INTO tb_user (id_personil,username,password,level,status_user) 
            VALUES ('$personil','$username','$password','$level','1')";
  $result = mysqli_query($conn, $query);

  if ($result) {
    header('Location: ../user.php');
  } else {
    header('Location: ../user.php');
  }
}


// personil
if (isset($_POST['submitPersonil'])) {
  $id_personil = $_POST['id_personil'];
  $nama_personil = $_POST['nama_personil'];
  $pangkat_personil = $_POST['pangkat_personil'];
  $nrp_personil = $_POST['nrp_personil'];
  $status_personil = $_POST['status_personil'];

  $queryPersonil = "INSERT INTO tb_personil (id_personil, nama_personil, pangkat_personil, nrp_personil	, status_personil ) VALUES ('$id_personil','$nama_personil', '$pangkat_personil','$nrp_personil','$status_personil')";
  $result = mysqli_query($conn, $queryPersonil);

  if ($result) {
    $_SESSION['success'] = "Data personil berhasil ditambahkan.";
    header('Location: ../personil.php');
  } else {
    $_SESSION['error'] = "Data personil gagal ditambahkan.";
  }
}

}

// barang
if (isset($_POST['submitbarang'])) {
  $namabarang = $_POST['namabarang'];
  $jmlbarang = $_POST['jmlbarang'];

  $querybarang = "INSERT INTO tb_barang (nama_barang, jml_barang, status_brg) VALUES ('$namabarang','$jmlbarang', '1')";
  $result = mysqli_query($conn, $querybarang);

  if ($result) {
    $_SESSION['success'] = "Data barang berhasil ditambahkan.";
    header('Location: ../barang.php');
  } else {
    $_SESSION['error'] = "Data personil gagal ditambahkan.";
  }
}

 ?>
