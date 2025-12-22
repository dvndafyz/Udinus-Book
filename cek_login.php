<?php
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'admin/konfig.php';

$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

if ($username === '' || $password === '') {
    header("location:index.php?pesan=Gagal");
    exit;
}

$stmt = mysqli_prepare($koneksi, "SELECT username, password, nama FROM user WHERE username = ? AND password = ?");
mysqli_stmt_bind_param($stmt, "ss", $username, $password);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$cek = $result ? mysqli_num_rows($result) : 0;

if($cek > 0) {
    $data = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $username;
    $_SESSION['nama'] = $data['nama'];
    header("location:admin/index.php");
} else {
    header("location:index.php?pesan=Gagal");
}
?>
