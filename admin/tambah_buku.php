<!doctype html>
<html lang="en">
<?php
session_start();
include 'konfig.php';
include 'cek.php';
?>

<head>
    <title>Udinus Book | Tambah Buku - Sistem Penjualan Professional</title>
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
                        <li><a href="buku.php" class="active"><i class="lnr lnr-book"></i> <span>Manajemen Buku</span></a></li>
                        <li><a href="penerbit.php"><i class="lnr lnr-apartment"></i> <span>Penerbit</span></a></li>
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
                                <h2 class="welcome-title">➕ Tambah Buku Baru</h2>
                                <p class="welcome-subtitle">Tambahkan buku baru ke dalam koleksi toko</p>
                            </div>
                        </div>
                    </div>

                    <!-- Form Panel -->
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Informasi Buku</h3>
                                </div>
                                <div class="panel-body">
                                    <form method="post" action="proses_tambah.php" enctype="multipart/form-data" class="book-form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><i class="fa fa-book"></i> Judul Buku</label>
                                                    <input type="text" class="form-control" name="judul" placeholder="Masukkan judul buku" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><i class="fa fa-user"></i> Pengarang</label>
                                                    <input type="text" class="form-control" name="pengarang" placeholder="Nama pengarang" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><i class="fa fa-building"></i> Penerbit</label>
                                                    <select class="form-control" name="id_penerbit" required>
                                                        <option value="">-- Pilih Penerbit --</option>
                                                        <?php
                                                        $query_penerbit = "SELECT * FROM penerbit ORDER BY nama_penerbit ASC";
                                                        $result_penerbit = mysqli_query($koneksi, $query_penerbit);
                                                        while ($row_penerbit = mysqli_fetch_array($result_penerbit)) {
                                                        ?>
                                                            <option value="<?php echo $row_penerbit['id']; ?>">
                                                                <?php echo htmlspecialchars($row_penerbit['nama_penerbit']); ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><i class="fa fa-calendar"></i> Tahun Terbit</label>
                                                    <input type="number" class="form-control" name="tahun_terbit" placeholder="2024" min="1900" max="<?php echo date('Y'); ?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><i class="fa fa-money"></i> Harga (Rp)</label>
                                                    <input type="number" class="form-control" name="harga" placeholder="50000" min="0" step="1000" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><i class="fa fa-cubes"></i> Stok</label>
                                                    <input type="number" class="form-control" name="stok" placeholder="100" min="0" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label><i class="fa fa-image"></i> Gambar Cover Buku</label>
                                            <div class="file-upload-wrapper">
                                                <input type="file" class="form-control" name="gambar" accept="image/*" id="imageInput">
                                                <div class="file-upload-info">
                                                    <i class="fa fa-cloud-upload"></i>
                                                    <p>Pilih file gambar (JPG, PNG, GIF) maksimal 2MB</p>
                                                </div>
                                            </div>
                                            <div class="image-preview" id="imagePreview" style="display: none;">
                                                <img id="previewImg" src="" alt="Preview" style="max-width: 200px; max-height: 250px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a href="buku.php" class="btn btn-default btn-lg btn-block">
                                                        <i class="fa fa-arrow-left"></i> Kembali
                                                    </a>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                        <i class="fa fa-save"></i> Simpan Buku
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
        // Image preview functionality
        document.getElementById('imageInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('previewImg').src = e.target.result;
                    document.getElementById('imagePreview').style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });

        // Form validation
        document.querySelector('.book-form').addEventListener('submit', function(e) {
            const harga = document.querySelector('input[name="harga"]').value;
            const stok = document.querySelector('input[name="stok"]').value;
            
            if (parseInt(harga) < 0) {
                alert('Harga tidak boleh negatif!');
                e.preventDefault();
                return;
            }
            
            if (parseInt(stok) < 0) {
                alert('Stok tidak boleh negatif!');
                e.preventDefault();
                return;
            }
        });
    </script>
</body>
</html>