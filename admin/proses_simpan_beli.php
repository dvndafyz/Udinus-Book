<?php
include 'konfig.php';

$idtransaksi = isset($_POST['notransaksi']) ? trim($_POST['notransaksi']) : '';
$idbuku = isset($_POST['id_buku']) ? (int) $_POST['id_buku'] : 0;
$harga = isset($_POST['harga']) ? (float) $_POST['harga'] : 0.0;
$qty = isset($_POST['qty']) ? (int) $_POST['qty'] : 0;
$subtotal = $harga > 0 && $qty > 0 ? ($harga * $qty) : 0.0;

if($idtransaksi === "" || $idbuku <= 0 || $harga <= 0 || $qty <= 0 || $subtotal <= 0){
    echo "<script> 
        alert('Lengkapi data');
    </script>";
} else {
    $stmt = mysqli_prepare($koneksi, "INSERT INTO detail_transaksi (no_transaksi, ID_buku, harga, jumlah_beli, subtotal) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sidid", $idtransaksi, $idbuku, $harga, $qty, $subtotal);
    mysqli_stmt_execute($stmt);
}
?>
