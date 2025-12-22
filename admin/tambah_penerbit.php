<!doctype html>
<html lang="en">
<?php
session_start();
include 'konfig.php';
include 'cek.php';
?>

<head>
    <title>Udinus Book | Tambah Penerbit - Sistem Penjualan Professional</title>
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
                        <li><a href="penerbit.php" class="active"><i class="lnr lnr-apartment"></i> <span>Penerbit</span></a></li>
                        <li><a href="transaksi.php"><i class="lnr lnr-cart"></i> <span>Transaksi Penjualan</span></a></li>
                        <li><a href="laporan.php"><i class="lnr lnr-chart-bars"></i> <span>Laporan & Analisis</span></a></li>
                        <li><a href="user.php"><i class="lnr lnr-users"></i> <span>Manajemen User</span></a></li>
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
                                <h2 class="welcome-title">➕ Tambah Penerbit Baru</h2>
                                <p class="welcome-subtitle">Tambahkan penerbit buku ke dalam sistem</p>
                            </div>
                        </div>
                    </div>

                    <!-- Form Panel -->
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Informasi Penerbit</h3>
                                </div>
                                <div class="panel-body">
                                    <form method="post" action="proses_tambah_penerbit.php" class="publisher-form">
                                        <div class="form-group">
                                            <label><i class="fa fa-building"></i> Nama Penerbit</label>
                                            <input type="text" class="form-control" name="nama_penerbit" 
                                                   placeholder="Masukkan nama penerbit" required 
                                                   maxlength="50" autocomplete="off">
                                            <small class="form-text text-muted">
                                                <i class="fa fa-info-circle"></i> Nama penerbit akan digunakan untuk mengkategorikan buku
                                            </small>
                                        </div>

                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a href="penerbit.php" class="btn btn-default btn-lg btn-block">
                                                        <i class="fa fa-arrow-left"></i> Kembali
                                                    </a>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                        <i class="fa fa-save"></i> Simpan Penerbit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Info Panel -->
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Informasi Penting</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="info-grid">
                                        <div class="info-item">
                                            <div class="info-icon">
                                                <i class="fa fa-lightbulb-o"></i>
                                            </div>
                                            <div class="info-content">
                                                <h5>Tips Penamaan</h5>
                                                <p>Gunakan nama penerbit yang jelas dan mudah dikenali. Hindari singkatan yang membingungkan.</p>
                                            </div>
                                        </div>
                                        
                                        <div class="info-item">
                                            <div class="info-icon">
                                                <i class="fa fa-check-circle"></i>
                                            </div>
                                            <div class="info-content">
                                                <h5>Validasi Otomatis</h5>
                                                <p>Sistem akan memvalidasi nama penerbit untuk memastikan tidak ada duplikasi.</p>
                                            </div>
                                        </div>
                                        
                                        <div class="info-item">
                                            <div class="info-icon">
                                                <i class="fa fa-link"></i>
                                            </div>
                                            <div class="info-content">
                                                <h5>Integrasi Buku</h5>
                                                <p>Setelah ditambahkan, penerbit ini dapat dipilih saat menambah buku baru.</p>
                                            </div>
                                        </div>
                                        
                                        <div class="info-item">
                                            <div class="info-icon">
                                                <i class="fa fa-edit"></i>
                                            </div>
                                            <div class="info-content">
                                                <h5>Edit Kapan Saja</h5>
                                                <p>Data penerbit dapat diubah atau dihapus melalui halaman manajemen penerbit.</p>
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
        // Form validation and enhancement
        document.querySelector('.publisher-form').addEventListener('submit', function(e) {
            const namaPenerbit = document.querySelector('input[name="nama_penerbit"]').value.trim();
            
            if (namaPenerbit.length < 2) {
                alert('Nama penerbit harus minimal 2 karakter!');
                e.preventDefault();
                return;
            }
            
            if (namaPenerbit.length > 50) {
                alert('Nama penerbit maksimal 50 karakter!');
                e.preventDefault();
                return;
            }
            
            // Show loading state
            const submitBtn = document.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Menyimpan...';
            submitBtn.disabled = true;
            
            // Re-enable after 3 seconds if form doesn't submit
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 3000);
        });

        // Auto-capitalize first letter
        document.querySelector('input[name="nama_penerbit"]').addEventListener('input', function(e) {
            let value = e.target.value;
            if (value.length > 0) {
                e.target.value = value.charAt(0).toUpperCase() + value.slice(1);
            }
        });

        // Character counter
        const input = document.querySelector('input[name="nama_penerbit"]');
        const small = document.querySelector('.form-text');
        
        input.addEventListener('input', function() {
            const remaining = 50 - this.value.length;
            const color = remaining < 10 ? 'text-danger' : remaining < 20 ? 'text-warning' : 'text-muted';
            small.className = `form-text ${color}`;
            small.innerHTML = `<i class="fa fa-info-circle"></i> ${remaining} karakter tersisa`;
        });
    </script>
</body>
</html>