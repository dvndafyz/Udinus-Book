<?php
	$host = "localhost";
	$user = "root";
	$pass = "Devanda16";
	$db = "penjualan_php";

	$koneksi = mysqli_connect($host, $user, $pass, $db);

	if(!$koneksi) {
		die("Koneksi gagal : ".mysqli_connect_error());
	}
?>