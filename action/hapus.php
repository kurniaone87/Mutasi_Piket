<?php
include('../koneksi.php');

function deletePersonil($conn) {
  if (isset($_POST['submit'])) {
    $id_personil = $_POST['id_personil'];

    $query = "DELETE FROM tb_personil WHERE id_personil='$id_personil'";
    $result = mysqli_query($conn, $query);

    if ($result) {
      $_SESSION['success'] = "Data personil berhasil dihapus.";
      header('Location: ../personil.php');
    } else {
      $_SESSION['error'] = "Data personil gagal dihapus.";
    }
  }
}

function deleteUser($conn) {
  if (isset($_POST['submit'])) {
    $id_user = $_POST['id_user'];

    $queryCheckPersonil = "SELECT id_personil FROM tb_user WHERE id_user='$id_user'";
    $resultCheckPersonil = mysqli_query($conn, $queryCheckPersonil);
    $rowPersonil = mysqli_fetch_assoc($resultCheckPersonil);

    if ($rowPersonil) {
      $queryDeleteUser = "DELETE FROM tb_user WHERE id_user='$id_user'";
      $queryDeletePersonil = "DELETE FROM tb_personil WHERE id_personil='{$rowPersonil['id_personil']}'";

      $resultDeleteUser = mysqli_query($conn, $queryDeleteUser);
      $resultDeletePersonil = mysqli_query($conn, $queryDeletePersonil);

      if ($resultDeleteUser && $resultDeletePersonil) {
        $_SESSION['success'] = "Data user dan personil terkait berhasil dihapus.";
        header('Location: ../user.php');
      } else {
        $_SESSION['error'] = "Data user atau personil terkait gagal dihapus.";
      }
    } else {
      $queryDeleteUser = "DELETE FROM tb_user WHERE id_user='$id_user'";
      $resultDeleteUser = mysqli_query($conn, $queryDeleteUser);

      if ($resultDeleteUser) {
        $_SESSION['success'] = "Data user berhasil dihapus.";
        header('Location: ../user.php');
      } else {
        $_SESSION['error'] = "Data user gagal dihapus.";
      }
    }
  }
}

if ($_POST['action'] == 'deletePersonil') {
  deletePersonil($conn);
} elseif ($_POST['action'] == 'deleteUser') {
  deleteUser($conn);
}
?>
