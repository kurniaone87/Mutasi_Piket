<?php 
include('../koneksi.php');

// user
function createUser($conn) {
  if ($_POST['personil'] == NULL){
      header('Location: ../index.php?pages=user');
    }else{
  if (isset($_POST['submit'])) {
    $personil = $_POST['personil'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $queryUser = "INSERT INTO tb_user (id_personil, username, password, level, status_user) VALUES ('$personil','$username','$password','$level','1')";
    $result = mysqli_query($conn, $queryUser);

    if ($result) {
      $_SESSION['success'] = "Data user berhasil ditambahkan.";
      header('Location: ../user.php');
    } else {
      $_SESSION['error'] = "Data user gagal ditambahkan.";
    }
  }
}
}

// settings
function createPJ($conn) {
  if (isset($_POST['submit'])) {
    $username = $_POST['nama_pj'];
    $pangkat = $_POST['pangkat'];
    $no_nrp = $_POST['no_nrp'];

    $queryPJ = "INSERT INTO setting (perwira_penanggung_jawab, pangkat_pj, nrp_pj, status_pj) VALUES ('$username','$pangkat','$no_nrp', '1')";
    $result = mysqli_query($conn, $queryPJ);

    if ($result) {
      $_SESSION['success'] = "Data user berhasil ditambahkan.";
      header('Location: ../setting.php');
    } else {
      $_SESSION['error'] = "Data user gagal ditambahkan.";
    }
  }
}
}
 
// personil
function createPersonil($conn) {
  if (isset($_POST['submit'])) {
    $id_personil = $_POST['id_personil'];
    $nama_personil = $_POST['nama_personil'];
    $pangkat_personil = $_POST['pangkat_personil'];
    $nrp_personil = $_POST['nrp_personil'];
    $status_personil = $_POST['status_personil'];

    $queryPersonil = "INSERT INTO tb_personil (id_personil, nama_personil, pangkat_personil, nrp_personil, status_personil ) VALUES ('$id_personil','$nama_personil', '$pangkat_personil','$nrp_personil','$status_personil')";
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
function createBarang($conn) {
  if (isset($_POST['submit'])) {
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
}

// mutasi_jaga
function createMutasiJaga($conn) {
  $tgl = date('Y-m-d H:i:s');
  if (isset($_POST['submit'])) {
    // cek di tabel mutasi
    $cekmutasi = mysqli_query($conn,"SELECT * from tb_mutasi_jaga WHERE status_mutasi='0'");
    $data = mysqli_num_rows($cekmutasi);
    if ($data>0){
      echo "Error";
    }else{
    $querymutasi = "INSERT INTO tb_mutasi_jaga (id_user,tgl_mutasi,analisis,evaluasi,status_mutasi) 
                    VALUES ('1','$tgl','','','0')";
    $result = mysqli_query($conn, $querymutasi);
    
    if ($result) {
      $_SESSION['success'] = "Data barang berhasil ditambahkan.";
      header('Location: ../trx_mutasijaga.php');
    } else {
      $_SESSION['error'] = "Data mutasi gagal ditambahkan.";
    }
  }
  }
}

// detail mutasi
function createMutasiJagaDetail($conn) {
    if (isset($_POST['submit'])) {
        $id_mutasi_jaga = $_POST['id_mutasi_jaga'];
        $id_barang = $_POST['barang'];
        $kelengkapan= $_POST['kelengkapan'];
        $keterangan = $_POST['keterangan'];

      $querybarang = "INSERT INTO tb_detil_mutasi_barang (id_mutasi_jaga, id_barang, kelengkapan, keterangan) 
                VALUES ('$id_mutasi_jaga', '$id_barang','$kelengkapan' ,'$keterangan')";
        $result = mysqli_query($conn, $querybarang);

        if ($result) {
            $_SESSION['success'] = "Data barang berhasil ditambahkan.";
            header('Location: ../detil_mutasijaga.php?id=' . $id_mutasi_jaga);
        } else {
            $_SESSION['error'] = "Data barang gagal ditambahkan.";
                echo "Error: " . mysqli_error($conn);

        }
    }
}

// detail personil
function createMutasiJagaPersonil($conn) {
    if (isset($_POST['submit'])) {
        $id_mutasi_jaga = $_POST['id_mutasi_jaga'];
        $personil = $_POST['personil'];
        $keterangan = $_POST['keterangan'];

      $querybarang = "INSERT INTO tb_detil_mutasi_personil (id_mutasi_jaga, id_personil, keterangan) 
                VALUES ('$id_mutasi_jaga', '$personil', '$keterangan')";
        $result = mysqli_query($conn, $querybarang);

        if ($result) {
            $_SESSION['success'] = "Data barang berhasil ditambahkan.";
            header('Location: ../detil_mutasijaga.php?id=' . $id_mutasi_jaga);
        } else {
            $_SESSION['error'] = "Data barang gagal ditambahkan.";
                echo "Error: " . mysqli_error($conn);

        }
    }
}

// Tambah aktivitas mutasi
function createAktivitasMutasi($conn) {
    if (isset($_POST['submit'])) {
        $id_mutasi_jaga = $_POST['id_mutasi_jaga'];
        $waktu_mutasi = $_POST['waktu_mutasi'];
        $keterangan_mutasi = $_POST['keterangan_mutasi'];

        $waktu_mutasi = date('Y-m-d H:i:s', strtotime($waktu_mutasi));

        $queryAktivitas = "INSERT INTO tb_list_mutasi (id_mutasi_jaga, waktu_mutasi, keterangan_mutasi) 
                          VALUES ('$id_mutasi_jaga', '$waktu_mutasi', '$keterangan_mutasi')";
        
        $result = mysqli_query($conn, $queryAktivitas);

        if ($result) {
            $_SESSION['success'] = "Data aktivitas mutasi berhasil ditambahkan.";
            header('Location: ../detil_mutasijaga.php?id=' . $id_mutasi_jaga);
        } else {
            $_SESSION['error'] = "Data aktivitas mutasi gagal ditambahkan.";
            echo "Error: " . mysqli_error($conn);
        }
    }
}


if ($_POST['action'] == 'createPersonil') {
  createPersonil($conn);
} elseif ($_POST['action'] == 'createUser') {
  createUser($conn);
} elseif ($_POST['action'] == 'createBarang') {
  createBarang($conn);
} elseif ($_POST['action'] == 'createMutasiJaga') {
  createMutasiJaga($conn);
} elseif ($_POST['action'] == 'createMutasiJagaDetail') {
  createMutasiJagaDetail($conn);
} elseif ($_POST['action'] == 'createMutasiJagaPersonil') {
  createMutasiJagaPersonil($conn);
} elseif ($_POST['action'] == 'createAktivitasMutasi') {
  createAktivitasMutasi($conn);
} elseif ($_POST['action'] == 'createPJ') {
  createPJ($conn);
}

 ?>
