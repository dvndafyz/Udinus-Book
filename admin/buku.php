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
    <title>Udinus Book | Manajemen Buku - Sistem Penjualan Professional</title>
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
                                <h2 class="welcome-title">📚 Manajemen Buku</h2>
                                <p class="welcome-subtitle">Kelola koleksi buku toko Anda</p>
                            </div>
                        </div>
                    </div>

                    <!-- Main Panel -->
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <a class="btn btn-primary" href="tambah_buku.php" style="margin-bottom: 10px;">
                                        <i class="fa fa-plus-circle"></i> Tambah Buku Baru
                                    </a>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <form method="GET" action="buku.php">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="kata_cari" placeholder="Cari judul, pengarang, atau penerbit..." value="<?php echo isset($_GET['kata_cari']) ? htmlspecialchars($_GET['kata_cari']) : ''; ?>">
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Cari</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="20%">Judul Buku</th>
                                            <th width="15%">Pengarang</th>
                                            <th width="15%">Penerbit</th>
                                            <th width="8%">Tahun</th>
                                            <th width="12%">Harga</th>
                                            <th width="8%">Stok</th>
                                            <th width="10%" class="text-center">Gambar</th>
                                            <th width="12%" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Pagination setup
                                        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                        $limit = 10;
                                        $limitStart = ($page - 1) * $limit;
                                        $kata_cari = isset($_GET['kata_cari']) ? mysqli_real_escape_string($koneksi, $_GET['kata_cari']) : "";

                                        // Query with search
                                        if ($kata_cari != "") {
                                            $query = "SELECT b.*, p.nama_penerbit 
                                                     FROM buku b 
                                                     LEFT JOIN penerbit p ON b.id_penerbit = p.id 
                                                     WHERE b.judul LIKE '%$kata_cari%' 
                                                     OR b.pengarang LIKE '%$kata_cari%' 
                                                     OR p.nama_penerbit LIKE '%$kata_cari%' 
                                                     ORDER BY b.id DESC 
                                                     LIMIT $limitStart, $limit";
                                            
                                            $queryCount = "SELECT COUNT(*) as total 
                                                          FROM buku b 
                                                          LEFT JOIN penerbit p ON b.id_penerbit = p.id 
                                                          WHERE b.judul LIKE '%$kata_cari%' 
                                                          OR b.pengarang LIKE '%$kata_cari%' 
                                                          OR p.nama_penerbit LIKE '%$kata_cari%'";
                                        } else {
                                            $query = "SELECT b.*, p.nama_penerbit 
                                                     FROM buku b 
                                                     LEFT JOIN penerbit p ON b.id_penerbit = p.id 
                                                     ORDER BY b.id DESC 
                                                     LIMIT $limitStart, $limit";
                                            
                                            $queryCount = "SELECT COUNT(*) as total FROM buku";
                                        }

                                        $result = mysqli_query($koneksi, $query);
                                        $resultCount = mysqli_query($koneksi, $queryCount);
                                        $rowCount = mysqli_fetch_array($resultCount);
                                        $JumlahData = $rowCount['total'];
                                        
                                        $no = $limitStart + 1;

                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><strong><?php echo htmlspecialchars($row['judul']); ?></strong></td>
                                                    <td><?php echo htmlspecialchars($row['pengarang']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['nama_penerbit'] ?? '-'); ?></td>
                                                    <td><?php echo htmlspecialchars($row['tahun_terbit']); ?></td>
                                                    <td><strong>Rp <?php echo rupiah($row['harga']); ?></strong></td>
                                                    <td>
                                                        <span class="badge" style="background: <?php echo $row['stok'] > 10 ? 'var(--secondary-color)' : 'var(--danger-color)'; ?>; color: white; padding: 5px 10px; border-radius: 15px;">
                                                            <?php echo $row['stok']; ?> unit
                                                        </span>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php if (!empty($row['gambar']) && file_exists("../gambar/" . $row['gambar'])) { ?>
                                                            <img src="../gambar/<?php echo htmlspecialchars($row['gambar']); ?>" 
                                                                 style="width: 60px; height: 80px; object-fit: cover; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);" 
                                                                 alt="<?php echo htmlspecialchars($row['judul']); ?>">
                                                        <?php } else { ?>
                                                            <div style="width: 60px; height: 80px; background: #e2e8f0; border-radius: 8px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                                                <i class="fa fa-book" style="font-size: 24px; color: #94a3b8;"></i>
                                                            </div>
                                                        <?php } ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a class="btn btn-sm btn-warning" href="edit_buku.php?id=<?php echo $row['id']; ?>" title="Edit Buku">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a class="btn btn-sm btn-danger" href="proses_hapus.php?id=<?php echo $row['id']; ?>" 
                                                               onclick="return confirm('Apakah Anda yakin ingin menghapus buku \'<?php echo htmlspecialchars($row['judul']); ?>\'?')" 
                                                               title="Hapus Buku">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                        <?php
                                                $no++;
                                            }
                                        } else {
                                        ?>
                                            <tr>
                                                <td colspan="9" class="text-center" style="padding: 40px;">
                                                    <i class="fa fa-search" style="font-size: 48px; color: #cbd5e1; margin-bottom: 15px;"></i>
                                                    <p style="color: #64748b; font-size: 16px;">
                                                        <?php echo $kata_cari != "" ? "Tidak ada buku yang ditemukan dengan kata kunci \"<strong>$kata_cari</strong>\"" : "Belum ada data buku"; ?>
                                                    </p>
                                                    <?php if ($kata_cari == "") { ?>
                                                        <a href="tambah_buku.php" class="btn btn-primary" style="margin-top: 10px;">
                                                            <i class="fa fa-plus-circle"></i> Tambah Buku Pertama
                                                        </a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <?php if ($JumlahData > 0) { 
                                $jumlahPage = ceil($JumlahData / $limit);
                                if ($jumlahPage > 1) {
                            ?>
                            <div class="text-center" style="margin-top: 20px;">
                                <ul class="pagination">
                                    <?php
                                    // Previous button
                                    if ($page == 1) {
                                        echo '<li class="disabled"><a href="#">Previous</a></li>';
                                    } else {
                                        $LinkPrev = $page - 1;
                                        $url = $kata_cari != "" ? "buku.php?kata_cari=$kata_cari&page=$LinkPrev" : "buku.php?page=$LinkPrev";
                                        echo '<li><a href="' . $url . '">Previous</a></li>';
                                    }

                                    // Page numbers
                                    $jumlahNumber = 2;
                                    $startNumber = ($page > $jumlahNumber) ? $page - $jumlahNumber : 1;
                                    $endNumber = ($page < ($jumlahPage - $jumlahNumber)) ? $page + $jumlahNumber : $jumlahPage;

                                    for ($i = $startNumber; $i <= $endNumber; $i++) {
                                        $linkActive = ($page == $i) ? ' class="active"' : '';
                                        $url = $kata_cari != "" ? "buku.php?kata_cari=$kata_cari&page=$i" : "buku.php?page=$i";
                                        echo '<li' . $linkActive . '><a href="' . $url . '">' . $i . '</a></li>';
                                    }

                                    // Next button
                                    if ($page == $jumlahPage) {
                                        echo '<li class="disabled"><a href="#">Next</a></li>';
                                    } else {
                                        $linkNext = $page + 1;
                                        $url = $kata_cari != "" ? "buku.php?kata_cari=$kata_cari&page=$linkNext" : "buku.php?page=$linkNext";
                                        echo '<li><a href="' . $url . '">Next</a></li>';
                                    }
                                    ?>
                                </ul>
                                <p style="color: #64748b; margin-top: 10px;">
                                    Menampilkan <?php echo $limitStart + 1; ?> - <?php echo min($limitStart + $limit, $JumlahData); ?> dari <?php echo $JumlahData; ?> buku
                                </p>
                            </div>
                            <?php 
                                }
                            } 
                            ?>
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