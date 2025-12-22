<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'konfig.php';

// membuat variabel untuk menampung data dari form
$id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
$nama   = isset($_POST['nama_penerbit']) ? trim($_POST['nama_penerbit']) : '';
if($nama === ""){
    echo"<script>
        alert('Data tidak boleh kosong');
        window.location = 'edit_penerbit.php?id=$id';
    </script>";
} else {
    $stmt = mysqli_prepare($koneksi, "UPDATE penerbit SET nama_penerbit = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "si", $nama, $id);
    mysqli_stmt_execute($stmt);
    echo "<script>alert('Data berhasil diubah.');
                    window.location='penerbit.php';
                </script>";
}
