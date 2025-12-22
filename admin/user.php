<!doctype html>
<html lang="en">
<?php
session_start();
include 'konfig.php';
include 'cek.php';
?>

<head>
    <title>Udinus Book | Manajemen User - Sistem Penjualan Professional</title>
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
						<li><a href="index.php"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="buku.php"><i class="lnr lnr-book"></i> <span>Manajemen Buku</span></a></li>
						<li><a href="penerbit.php"><i class="lnr lnr-apartment"></i> <span>Penerbit</span></a></li>
						<li><a href="transaksi.php"><i class="lnr lnr-cart"></i> <span>Transaksi Penjualan</span></a></li>
                        <li><a href="laporan.php"><i class="lnr lnr-chart-bars"></i> <span>Laporan & Analisis</span></a></li>
						<li><a href="user.php" class="active"><i class="lnr lnr-users"></i> <span>Manajemen User</span></a></li>
						<li class="nav-divider"></li>
						<li><a href="logout.php"><i class="lnr lnr-exit"></i> <span>Keluar</span></a></li>
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
					<!-- Page Header -->
					<div class="row" style="margin-bottom: 30px;">
						<div class="col-md-12">
							<div class="welcome-banner">
								<h2 class="welcome-title">👥 Manajemen User</h2>
								<p class="welcome-subtitle">Kelola pengguna sistem Udinus Book</p>
							</div>
						</div>
					</div>

					<!-- User List -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Daftar Pengguna Sistem</h3>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>No</th>
											<th>Username</th>
											<th>Nama Lengkap</th>
											<th>Hak Akses</th>
											<th>Status</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$query = "SELECT * FROM user ORDER BY nama ASC";
										$result = mysqli_query($koneksi, $query);
										$no = 1;
										
										while ($row = mysqli_fetch_array($result)) {
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td>
												<div class="user-info">
													<i class="fa fa-user-circle" style="color: var(--primary-color); margin-right: 8px;"></i>
													<strong><?php echo $row['username']; ?></strong>
												</div>
											</td>
											<td><?php echo $row['nama']; ?></td>
											<td>
												<span class="badge" style="background: var(--primary-color); color: white; padding: 5px 10px; border-radius: 15px;">
													<?php echo ucfirst($row['hak_akses']); ?>
												</span>
											</td>
											<td>
												<span class="badge" style="background: var(--secondary-color); color: white; padding: 5px 10px; border-radius: 15px;">
													<i class="fa fa-check-circle"></i> Aktif
												</span>
											</td>
											<td>
												<div class="btn-group">
													<button class="btn btn-sm btn-warning" title="Edit User">
														<i class="fa fa-edit"></i>
													</button>
													<?php if($row['username'] != 'admin') { ?>
													<button class="btn btn-sm btn-danger" title="Hapus User" onclick="confirmDelete('<?php echo $row['username']; ?>')">
														<i class="fa fa-trash"></i>
													</button>
													<?php } ?>
												</div>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<!-- User Statistics -->
					<div class="row">
						<div class="col-md-4">
							<div class="metric">
								<span class="icon"><i class="fa fa-users"></i></span>
								<p>
									<?php
									$query_count = "SELECT COUNT(*) as total FROM user";
									$result_count = mysqli_query($koneksi, $query_count);
									$count = mysqli_fetch_array($result_count);
									?>
									<span class="number"><?php echo $count['total']; ?></span>
									<span class="title">Total Pengguna</span>
								</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="metric">
								<span class="icon"><i class="fa fa-user-shield"></i></span>
								<p>
									<?php
									$query_admin = "SELECT COUNT(*) as total FROM user WHERE hak_akses = 'admin'";
									$result_admin = mysqli_query($koneksi, $query_admin);
									$admin_count = mysqli_fetch_array($result_admin);
									?>
									<span class="number"><?php echo $admin_count['total']; ?></span>
									<span class="title">Administrator</span>
								</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="metric">
								<span class="icon"><i class="fa fa-check-circle"></i></span>
								<p>
									<span class="number"><?php echo $count['total']; ?></span>
									<span class="title">User Aktif</span>
								</p>
							</div>
						</div>
					</div>

					<!-- Quick Info -->
					<div class="row mt-4">
						<div class="col-md-12">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Informasi Login</h3>
								</div>
								<div class="panel-body">
									<div class="alert alert-info">
										<h5><i class="fa fa-info-circle"></i> Kredensial Login Default:</h5>
										<div class="row">
											<div class="col-md-3">
												<strong>Admin:</strong><br>
												Username: <code>admin</code><br>
												Password: <code>admin</code>
											</div>
											<div class="col-md-3">
												<strong>Yudha:</strong><br>
												Username: <code>yudha</code><br>
												Password: <code>yudha</code>
											</div>
											<div class="col-md-3">
												<strong>Ardy:</strong><br>
												Username: <code>ardy</code><br>
												Password: <code>ardy</code>
											</div>
											<div class="col-md-3">
												<strong>Devan:</strong><br>
												Username: <code>devan</code><br>
												Password: <code>devan</code>
											</div>
										</div>
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
	
	<script>
	function confirmDelete(username) {
		if (confirm('Apakah Anda yakin ingin menghapus user "' + username + '"?')) {
			// Implementasi delete user
			alert('Fitur hapus user akan diimplementasikan');
		}
	}
	</script>
</body>
</html>