<?php
session_start();
include 'konfig.php';
include 'cek.php';

// mengecek apakah di url ada nilai GET id
if (isset($_GET['id'])) {
    $id = (int)$_GET["id"];

    // menampilkan data dari database yang mempunyai id=$id
    $stmt = mysqli_prepare($koneksi, "SELECT * FROM penerbit WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if(!$result){
        die ("Error: ".mysqli_error($koneksi));
    }
    
    $data = mysqli_fetch_assoc($result);
    if (!$data) {
        echo "<script>alert('Data tidak ditemukan pada database');
        window.location='penerbit.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('Masukkan data id.');
    window.location='penerbit.php';</script>";
    exit;
}         
?>

<!doctype html>
<html lang="en">

<head>
    <title>Udinus Book | Edit Penerbit - Sistem Penjualan Professional</title>
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
                                <h2 class="welcome-title">✏️ Edit Penerbit</h2>
                                <p class="welcome-subtitle">Perbarui informasi penerbit "<?php echo htmlspecialchars($data['nama_penerbit']); ?>"</p>
                            </div>
                        </div>
                    </div>

                    <!-- Form Panel -->
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Edit Informasi Penerbit</h3>
                                </div>
                                <div class="panel-body">
                                    <form method="post" action="proses_ubah_penerbit.php" class="publisher-form">
                                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                        
                                        <div class="form-group">
                                            <label><i class="fa fa-building"></i> Nama Penerbit</label>
                                            <input type="text" class="form-control" name="nama_penerbit" 
                                                   value="<?php echo htmlspecialchars($data['nama_penerbit']); ?>"
                                                   placeholder="Masukkan nama penerbit" required 
                                                   maxlength="50" autocomplete="off">
                                            <small class="form-text text-muted">
                                                <i class="fa fa-info-circle"></i> Perubahan akan mempengaruhi semua buku dari penerbit ini
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
                                                        <i class="fa fa-save"></i> Update Penerbit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Current Info Panel -->
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Informasi Saat Ini</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="current-info">
                                        <div class="info-row">
                                            <span class="info-label"><i class="fa fa-hashtag"></i> ID Penerbit:</span>
                                            <span class="info-value"><?php echo $data['id']; ?></span>
                                        </div>
                                        <div class="info-row">
                                            <span class="info-label"><i class="fa fa-building"></i> Nama Penerbit:</span>
                                            <span class="info-value"><?php echo htmlspecialchars($data['nama_penerbit']); ?></span>
                                        </div>
                                        <div class="info-row">
                                            <span class="info-label"><i class="fa fa-book"></i> Jumlah Buku:</span>
                                            <span class="info-value">
                                                <?php
                                                $stmt_count = mysqli_prepare($koneksi, "SELECT COUNT(*) as total FROM buku WHERE id_penerbit = ?");
                                                mysqli_stmt_bind_param($stmt_count, "i", $data['id']);
                                                mysqli_stmt_execute($stmt_count);
                                                $result_count = mysqli_stmt_get_result($stmt_count);
                                                $count_data = mysqli_fetch_assoc($result_count);
                                                echo $count_data['total'] . " buku";
                                                ?>
                                            </span>
                                        </div>
                                        <div class="info-row">
                                            <span class="info-label"><i class="fa fa-calendar"></i> Status:</span>
                                            <span class="info-value">
                                                <span class="badge" style="background: var(--secondary-color); color: white; padding: 5px 12px; border-radius: 15px;">
                                                    <i class="fa fa-check-circle"></i> Aktif
                                                </span>
                                            </span>
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
            
            // Confirm update
            if (!confirm('Apakah Anda yakin ingin mengubah data penerbit ini?')) {
                e.preventDefault();
                return;
            }
            
            // Show loading state
            const submitBtn = document.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Mengupdate...';
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

        // Highlight changes
        const originalValue = "<?php echo htmlspecialchars($data['nama_penerbit']); ?>";
        input.addEventListener('input', function() {
            if (this.value !== originalValue) {
                this.classList.add('form-success');
            } else {
                this.classList.remove('form-success');
            }
        });
    </script>
</body>
</html>