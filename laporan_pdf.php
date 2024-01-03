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

<?php
require('library/fpdf.php');
include 'koneksi.php';

if($_SESSION['status']!="login"){
        header("location: index.php");
      }

      $level = $_SESSION['level'];
      
      $id=$_GET['id'];

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->SetMargins(10, 35, 10); 
$pdf->AddPage();
$pdf->SetAutoPageBreak(false);

$pdf->Image('./dist/img/logo_korps.jpeg', 5, 5, 20); 

$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(0, 1, 'LAPORAN MUTASI', 0, 1, 'C');
$pdf->Ln(15);

// Tabel Data Barang
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(10, 7, 'No', 1, 0, 'C');
$pdf->Cell(20, 7, 'ID Barang', 1, 0, 'C');
$pdf->Cell(40, 7, 'Nama Barang', 1, 0, 'C');
$pdf->Cell(40, 7, 'Jumlah Barang', 1, 0, 'C');
$pdf->Cell(40, 7, 'Kelengkapan', 1, 0, 'C');
$pdf->Cell(40, 7, 'Keterangan', 1, 1, 'C');

$pdf->SetFont('Times', '', 10);
$no = 1;
$queryBarang = mysqli_query($conn, "SELECT tb_detil_mutasi_barang.*, tb_barang.nama_barang, tb_barang.jml_barang
                                      FROM tb_detil_mutasi_barang, tb_barang
                                      WHERE tb_detil_mutasi_barang.id_barang=tb_barang.id_barang
                                      AND id_mutasi_jaga='$id'");
while ($dataBarang = mysqli_fetch_assoc($queryBarang)) {
    $pdf->Cell(10, 6, $no++, 1, 0, 'C');
    $pdf->Cell(20, 6, $dataBarang['id_barang'], 1, 0);
    $pdf->Cell(40, 6, $dataBarang['nama_barang'], 1, 0);
    $pdf->Cell(40, 6, $dataBarang['jml_barang'], 1, 0, 'C');
    $pdf->Cell(40, 6, $dataBarang['kelengkapan'], 1, 0);
    $pdf->Cell(40, 6, $dataBarang['keterangan'], 1, 1);
}

$pdf->Ln(10);

// Tabel Data Personil
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(10, 7, 'No', 1, 0, 'C');
$pdf->Cell(20, 7, 'ID Personil', 1, 0, 'C');
$pdf->Cell(40, 7, 'Nama Personil', 1, 0, 'C');
$pdf->Cell(40, 7, 'Pangkat', 1, 0, 'C');
$pdf->Cell(40, 7, 'No. NRP', 1, 0, 'C');
$pdf->Cell(40, 7, 'Keterangan', 1, 1, 'C');

$pdf->SetFont('Times', '', 10);
$no = 1;
$queryPersonil = mysqli_query($conn, "SELECT tb_detil_mutasi_personil.*, tb_personil.nama_personil, tb_personil.pangkat_personil, tb_personil.nrp_personil
                                        FROM tb_detil_mutasi_personil, tb_personil
                                        WHERE tb_detil_mutasi_personil.id_personil=tb_personil.id_personil
                                        AND id_mutasi_jaga='$id'");
while ($dataPersonil = mysqli_fetch_assoc($queryPersonil)) {
    $pdf->Cell(10, 6, $no++, 1, 0, 'C');
    $pdf->Cell(20, 6, $dataPersonil['id_personil'], 1, 0);
    $pdf->Cell(40, 6, $dataPersonil['nama_personil'], 1, 0);
    $pdf->Cell(40, 6, $dataPersonil['pangkat_personil'], 1, 0);
    $pdf->Cell(40, 6, $dataPersonil['nrp_personil'], 1, 0);
    $pdf->Cell(40, 6, $dataPersonil['keterangan'], 1, 1);
}

$pdf->Ln(10);

// Tabel Data Mutasi
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(10, 7, 'No', 1, 0, 'C');
$pdf->Cell(30, 7, 'Hari / Tanggal', 1, 0, 'C');
$pdf->Cell(150, 7, 'Keterangan', 1, 1, 'C');

$pdf->SetFont('Times', '', 10);
$no = 1;
$queryMutasi = mysqli_query($conn, "SELECT * FROM tb_list_mutasi WHERE id_mutasi_jaga='$id'");
while ($dataMutasi = mysqli_fetch_assoc($queryMutasi)) {
    $pdf->Cell(10, 6, $no++, 1, 0, 'C');
    $pdf->Cell(30, 6, $dataMutasi['waktu_mutasi'], 1, 0);
    $pdf->Cell(150, 6, $dataMutasi['keterangan_mutasi'], 1, 1);
}

$pdf->Ln(10);

// Tabel Data Analisis & Evaluasi
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(190, 7, 'Keterangan', 1, 1, 'C');

$pdf->SetFont('Times', '', 10);
$queryAnalisis = mysqli_query($conn, "SELECT * from tb_mutasi_jaga WHERE id_mutasi_jaga='$id'");
while ($dataAnalisis = mysqli_fetch_assoc($queryAnalisis)) {
    $analisisLines = explode("\n", $dataAnalisis['analisis']);
    $evaluasiLines = explode("\n", $dataAnalisis['evaluasi']);

    // Analisis
    $pdf->SetFont('Times', 'B', 11);
    $pdf->Cell(190, 6, 'Analisis:', 1, 1);
    $pdf->SetFont('Times', '', 11);
    foreach ($analisisLines as $line) {
        $pdf->Cell(190, 6, $line, 1, 1);
    }

    // Evaluasi
    if (!empty($dataAnalisis['evaluasi'])) {
        $pdf->SetFont('Times', 'B', 11);
        $pdf->Cell(190, 6, 'Evaluasi:', 1, 1);
        $pdf->SetFont('Times', '', 11);
        foreach ($evaluasiLines as $line) {
            $pdf->Cell(190, 6, $line, 1, 1);
        }
    }   

$pdf->SetY(-70);
$pdf->SetFont('Times', 'B', 11);
$pdf->Cell(95, 10, 'Yang Menyerahkan', 0, 0, 'C');
$pdf->Cell(95, 10, 'Yang Menerima', 0, 1, 'C');

$pdf->SetFont('Times', '', 11);
$pdf->Cell(95, 10, '___________________', 0, 0, 'C');
$pdf->Cell(95, 10, '___________________', 0, 1, 'C');

$queryUser = mysqli_query($conn, "SELECT * FROM tb_personil WHERE id_personil IN (SELECT id_personil FROM tb_user WHERE username='username')");
$dataUser = mysqli_fetch_assoc($queryUser);

$_SESSION['nrp_personil'] = $dataUser['nrp_personil'];
$_SESSION['nama_personil'] = $dataUser['nama_personil'];
$_SESSION['pangkat_personil'] = $dataUser['pangkat_personil'];
$pdf->Cell(95, 5, $_SESSION['nama_personil'], 0, 0, 'C');
$pdf->SetX(10);
$pdf->Cell(95, 15, $_SESSION['pangkat_personil'] . " NRP. " . $_SESSION['nrp_personil'], 0, 0, 'C');


$pdf->Ln(10);
$query = mysqli_query($conn, "SELECT * FROM setting WHERE status_pj = '1'");

$pdf->SetX(50);
$pdf->Cell(95, 10, 'Penanggung Jawab', 0, 1, 'C');
$pdf->Cell(180, 10, '___________________', 0, 0, 'C');
$pdf->Cell(180, 10, '___________________', 0, 1, 'C');
while ($data = mysqli_fetch_assoc($query)) {
    $pdf->Cell(180, 5, $data['perwira_penanggung_jawab'], 0, 1, 'C');
    $pdf->Cell(180, 5, $data['pangkat_pj'] . ' NRP. ' . $data['nrp_pj'], 0, 1, 'C');
}
} 
 
$pdf->Output();
?>
