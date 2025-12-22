<?php
include 'konfig.php';

$nama = isset($_POST['nama_penerbit']) ? trim($_POST['nama_penerbit']) : '';

if($nama === ""){
    echo "<script> 
        alert('Lengkapi data');
    </script>";
} else {
    $stmt = mysqli_prepare($koneksi, "INSERT INTO penerbit(nama_penerbit) VALUES (?)");
    mysqli_stmt_bind_param($stmt, "s", $nama);
    mysqli_stmt_execute($stmt);
    echo "<script>alert('Data berhasil ditambah.');
                    window.location='penerbit.php';
                </script>";
}
?>
