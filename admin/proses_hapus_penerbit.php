<?php
include 'konfig.php';
$id = isset($_GET["id"]) ? (int) $_GET["id"] : 0;

$stmt = mysqli_prepare($koneksi, "DELETE FROM penerbit WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
$result = mysqli_stmt_execute($stmt);

if(!$result){
    die("Gagal menghapus data buku ". mysqli_error($koneksi));
} else {
    echo "<script>
        alert('Berhasil dihapus');
        window.location= 'penerbit.php';
    </script>";
}

?>
