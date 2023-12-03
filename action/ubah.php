<?php 
    include('../koneksi.php');

if (isset($_POST['submit'])) {
  $id_user = $_POST['id_user'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $level = $_POST['level'];
  $status = $_POST['status'];
  
  $query = "UPDATE tb_user SET `username`='$username', `password`='$password',`level`='$level',`status_user`='$status' WHERE `id_user`='$id_user'"; 
  $result = mysqli_query($conn, $query);
  
  if ($result) {
    header('Location: ../data.php');
  } else {
    header('Location: ../data.php');
  }
}
 ?>
