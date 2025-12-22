<?php
include 'konfig.php';

$idtransaksi = isset($_POST['notransaksi']) ? trim($_POST['notransaksi']) : '';
$tanggal = isset($_POST['tanggal']) ? trim($_POST['tanggal']) : '';
$total = isset($_POST['total']) ? (float) $_POST['total'] : 0.0;

if($idtransaksi === "" || $tanggal === "" || $total <= 0){
    echo "<script> 
        alert('Lengkapi data');
    </script>";
} else {
    $stmt = mysqli_prepare($koneksi, "INSERT INTO head_transaksi (no_transaksi, tanggal, total) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssd", $idtransaksi, $tanggal, $total);
    mysqli_stmt_execute($stmt);
}
?>
