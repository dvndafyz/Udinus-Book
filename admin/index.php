<!doctype html>
<html lang="en">
<?php
session_start();
include 'konfig.php';
include 'cek.php';

function rupiah($nilai)
{
	return number_format($nilai, 0, ',', '.');
}
?>

<head>
    <title>Udinus Book | Dashboard - Sistem Manajemen Penjualan Buku</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="../assets/css/main.css">
	<link rel="stylesheet" href="../assets/css/udinus-theme.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top admin-navbar">
			<div class="brand">
				<div class="brand-logo">
					<i class="fa fa-book"></i>
					<span class="brand-text">Udinus Book</span>
				</div>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>

				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-user-circle"></i>
								<span><?php echo $_SESSION['nama']  ?></span> 
								<i class="icon-submenu lnr lnr-chevron-down"></i>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="lnr lnr-user"></i> <span>Profil Saya</span></a></li>
								<li><a href="#"><i class="lnr lnr-cog"></i> <span>Pengaturan</span></a></li>
								<li class="divider"></li>
								<li><a href="logout.php"><i class="lnr lnr-exit"></i> <span>Keluar</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar admin-sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="index.php" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="buku.php" class=""><i class="lnr lnr-book"></i> <span>Manajemen Buku</span></a></li>
						<li><a href="penerbit.php" class=""><i class="lnr lnr-apartment"></i> <span>Penerbit</span></a></li>
						<li><a href="transaksi.php" class=""><i class="lnr lnr-cart"></i> <span>Transaksi Penjualan</span></a></li>
                        <li><a href="laporan.php" class=""><i class="lnr lnr-chart-bars"></i> <span>Laporan & Analisis</span></a></li>
						<li><a href="user.php" class=""><i class="lnr lnr-users"></i> <span>Manajemen User</span></a></li>
						<li class="nav-divider"></li>
						<li><a href="logout.php" class=""><i class="lnr lnr-exit"></i> <span>Keluar</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- Welcome Section -->
					<div class="row" style="margin-bottom: 30px;">
						<div class="col-md-12">
							<div class="welcome-banner">
								<h2 class="welcome-title">Selamat Datang, <?php echo $_SESSION['nama']  ?>! 👋</h2>
								<p class="welcome-subtitle">Berikut adalah ringkasan penjualan buku hari ini</p>
							</div>
						</div>
					</div>

					<!-- Statistics Cards -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Statistik Penjualan</h3>
							<p class="panel-subtitle">Data real-time penjualan buku</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<?php
								$query = "SELECT SUM(total) as total from head_transaksi";
								$result = mysqli_query($koneksi, $query);

								while ($row = mysqli_fetch_array($result)) {
								?>
								<div class="col-md-4">
									<div class="metric">
										<span class="icon"><i class="fa fa-money"></i></span>
										<p>
											<span class="number"><?php echo "Rp " .rupiah($row['total']) ?></span>
											<span class="title">Total Pendapatan</span>
										</p>
									</div>
								</div>
								<?php } ?>
								<?php
								$query = "SELECT SUM(jumlah_beli) as total from detail_transaksi";
								$result = mysqli_query($koneksi, $query);

								while ($row = mysqli_fetch_array($result)) {
								?>
									<div class="col-md-4">
										<div class="metric">
											<span class="icon"><i class="fa fa-shopping-bag"></i></span>
											<p>
												<span class="number"><?php echo rupiah($row['total']) ?></span>
												<span class="title">Total Buku Terjual</span>
											</p>
										</div>
									</div>
								<?php } ?>
								<?php
								$query = "SELECT COUNT(*) as total from head_transaksi";
								$result = mysqli_query($koneksi, $query);
								while ($row = mysqli_fetch_array($result)) {
								?>
									<div class="col-md-4">
										<div class="metric">
											<span class="icon"><i class="fa fa-bar-chart"></i></span>
											<p>
												<span class="number"><?php echo rupiah($row['total']) ?></span>
												<span class="title">Jumlah Transaksi</span>
											</p>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>

					<!-- Quick Actions -->
					<div class="row">
						<div class="col-md-12">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Aksi Cepat</h3>
								</div>
								<div class="panel-body">
									<div class="quick-actions">
										<a href="transaksi.php" class="quick-action-btn">
											<i class="fa fa-plus-circle"></i>
											<span>Transaksi Baru</span>
										</a>
										<a href="buku.php" class="quick-action-btn">
											<i class="fa fa-book"></i>
											<span>Kelola Buku</span>
										</a>
										<a href="laporan.php" class="quick-action-btn">
											<i class="fa fa-file-text"></i>
											<span>Lihat Laporan</span>
										</a>
										<a href="user.php" class="quick-action-btn">
											<i class="fa fa-users"></i>
											<span>Kelola User</span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">
					© 2024 <strong>Udinus Book</strong> - Sistem Manajemen Penjualan Buku Professional
					<span class="float-right">
						<i class="fa fa-heart text-danger"></i> Dibuat dengan teknologi modern
					</span>
				</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="../assets/vendor/jquery/jquery.min.js"></script>
	<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../assets/scripts/klorofil-common.js"></script>
</body>

</html>