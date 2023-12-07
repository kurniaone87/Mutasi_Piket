<?php
include('../koneksi.php');

function updateUser($conn) {
  if (isset($_POST['submit'])) {
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $status = $_POST['status'];

    $query = "UPDATE tb_user SET `username`='$username', `password`='$password', `level`='$level', `status_user`='$status' WHERE `id_user`='$id_user'";
    $result = mysqli_query($conn, $query);

    if ($result) {
      $_SESSION['success'] = "Data user berhasil diupdate.";
      header('Location: ../user.php');
    } else {
      $_SESSION['error'] = "Data user gagal diupdate.";
    }
  }
}


function updatePersonil($conn) {
  if (isset($_POST['submit'])) {
    $id_personil = $_POST['id_personil'];
    $pangkat_personil = $_POST['pangkat_personil'];
    $nrp_personil = $_POST['nrp_personil'];
    $status_personil = $_POST['status_personil'];

    $query = "UPDATE tb_personil SET `pangkat_personil`='$pangkat_personil', `nrp_personil`='$nrp_personil', `status_personil`='$status_personil' WHERE `id_personil`='$id_personil'";
    $result = mysqli_query($conn, $query);

    if ($result) {
      $_SESSION['success'] = "Data personil berhasil diupdate.";
      header('Location: ../personil.php');
    } else {
      $_SESSION['error'] = "Data personil gagal diupdate.";
    }
  }
}

function updateBarang($conn) {
  if (isset($_POST['submit'])) {
    $id_barang = $_POST['id_barang'];
    $namabarang = $_POST['namabarang'];
    $jmlbarang = $_POST['jmlbarang'];
    $status_brg = $_POST['status_brg'];

    $query = "UPDATE tb_barang SET `nama_barang`='$namabarang', `jml_barang`='$jmlbarang', `status_brg`='$status_brg' WHERE `id_barang`='$id_barang'";
    $result = mysqli_query($conn, $query);

    if ($result) {
      $_SESSION['success'] = "Data personil berhasil diupdate.";
      header('Location: ../barang.php');
    } else {
      $_SESSION['error'] = "Data personil gagal diupdate.";
    }
  }
}

function updateMutasiJaga($conn) {
  if (isset($_POST['submit'])) {
    $id_mutasi_jaga = $_POST['id_mutasi_jaga'];
    $analisa = $_POST['analisa'];
    $evaluasi = $_POST['evaluasi'];

    $query = "UPDATE tb_mutasi_jaga SET `analisis`='$analisa', `evaluasi`='$evaluasi', `status_mutasi`='1' WHERE `id_mutasi_jaga`='$id_mutasi_jaga'";
    $result = mysqli_query($conn, $query);

    if ($result) {
      $_SESSION['success'] = "Data personil berhasil diupdate.";
      header('Location: ../trx_mutasijaga.php');
    } else {
      $_SESSION['error'] = "Data personil gagal diupdate.";
    }
  }
}

function updatePJ($conn) {
  if (isset($_POST['submit'])) {
    $id_pj = $_POST['id_pj'];
    $statuspj = $_POST['statuspj'];
    $query = "UPDATE setting SET status_pj='$statuspj' WHERE id_setting='$id_pj'";
    $result = mysqli_query($conn, $query);

    if ($result) {
      $_SESSION['success'] = "Data personil berhasil diupdate.";
      header('Location: ../pj.php');
    } else {
      $_SESSION['error'] = "Data personil gagal diupdate.";
    }
  }
}

if ($_POST['action'] == 'updatePersonil') {
  updatePersonil($conn);
} elseif ($_POST['action'] == 'updateUser') {
  updateUser($conn);
} elseif ($_POST['action'] == 'updateBarang') {
  updateBarang($conn);
} elseif ($_POST['action'] == 'updateMutasiJaga') {
  updateMutasiJaga($conn);
} elseif ($_POST['action'] == 'updatePJ') {
  updatePJ($conn);
}
?>