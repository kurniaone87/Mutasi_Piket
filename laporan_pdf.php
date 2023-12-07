<?php
     session_start();
     include "koneksi.php";
    
      if($_SESSION['status']!="login"){
        header("location: index.php");
      }

      $level = $_SESSION['level'];
      
      $id=$_GET['id'];
?>