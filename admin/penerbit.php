<!doctype html>
<html lang="en">
<?php
session_start();
include 'konfig.php';
include 'cek.php';
?>

<head>
    <title>Udinus Book | Manajemen Penerbit - Sistem Penjualan Professional</title>
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
                                <h2 class="welcome-title">🏢 Manajemen Penerbit</h2>
                                <p class="welcome-subtitle">Kelola data penerbit buku</p>
                            </div>
                        </div>
                    </div>

                    <!-- Statistics Cards -->
                    <div class="row" style="margin-bottom: 30px;">
                        <div class="col-md-4">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-building"></i></span>
                                <p>
                                    <?php
                                    $query_count = "SELECT COUNT(*) as total FROM penerbit";
                                    $result_count = mysqli_query($koneksi, $query_count);
                                    $count = mysqli_fetch_array($result_count);
                                    ?>
                                    <span class="number"><?php echo $count['total']; ?></span>
                                    <span class="title">Total Penerbit</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-book"></i></span>
                                <p>
                                    <?php
                                    $query_books = "SELECT COUNT(*) as total FROM buku WHERE id_penerbit IS NOT NULL";
                                    $result_books = mysqli_query($koneksi, $query_books);
                                    $books_count = mysqli_fetch_array($result_books);
                                    ?>
                                    <span class="number"><?php echo $books_count['total']; ?></span>
                                    <span class="title">Buku Terdaftar</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-check-circle"></i></span>
                                <p>
                                    <span class="number"><?php echo $count['total']; ?></span>
                                    <span class="title">Penerbit Aktif</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Main Panel -->
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <a class="btn btn-primary" href="tambah_penerbit.php" style="margin-bottom: 10px;">
                                        <i class="fa fa-plus-circle"></i> Tambah Penerbit Baru
                                    </a>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <form method="GET" action="penerbit.php">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="kata_cari" placeholder="Cari nama penerbit..." value="<?php echo isset($_GET['kata_cari']) ? htmlspecialchars($_GET['kata_cari']) : ''; ?>">
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
                                            <th width="8%">#</th>
                                            <th width="40%">Nama Penerbit</th>
                                            <th width="20%">Jumlah Buku</th>
                                            <th width="20%">Status</th>
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

                                        // Query with search and book count
                                        if ($kata_cari != "") {
                                            $query = "SELECT p.*, COUNT(b.id) as jumlah_buku 
                                                     FROM penerbit p 
                                                     LEFT JOIN buku b ON p.id = b.id_penerbit 
                                                     WHERE p.nama_penerbit LIKE '%$kata_cari%' 
                                                     GROUP BY p.id 
                                                     ORDER BY p.id DESC 
                                                     LIMIT $limitStart, $limit";
                                            
                                            $queryCount = "SELECT COUNT(*) as total 
                                                          FROM penerbit 
                                                          WHERE nama_penerbit LIKE '%$kata_cari%'";
                                        } else {
                                            $query = "SELECT p.*, COUNT(b.id) as jumlah_buku 
                                                     FROM penerbit p 
                                                     LEFT JOIN buku b ON p.id = b.id_penerbit 
                                                     GROUP BY p.id 
                                                     ORDER BY p.id DESC 
                                                     LIMIT $limitStart, $limit";
                                            
                                            $queryCount = "SELECT COUNT(*) as total FROM penerbit";
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
                                                    <td>
                                                        <div class="publisher-info">
                                                            <i class="fa fa-building" style="color: var(--primary-color); margin-right: 8px;"></i>
                                                            <strong><?php echo htmlspecialchars($row['nama_penerbit']); ?></strong>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge" style="background: var(--secondary-color); color: white; padding: 5px 12px; border-radius: 15px;">
                                                            <i class="fa fa-book"></i> <?php echo $row['jumlah_buku']; ?> buku
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="badge" style="background: var(--secondary-color); color: white; padding: 5px 12px; border-radius: 15px;">
                                                            <i class="fa fa-check-circle"></i> Aktif
                                                        </span>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a class="btn btn-sm btn-warning" href="edit_penerbit.php?id=<?php echo $row['id']; ?>" title="Edit Penerbit">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a class="btn btn-sm btn-danger" href="proses_hapus_penerbit.php?id=<?php echo $row['id']; ?>" 
                                                               onclick="return confirm('Apakah Anda yakin ingin menghapus penerbit \'<?php echo htmlspecialchars($row['nama_penerbit']); ?>\'?\n\nPerhatian: Semua buku dari penerbit ini juga akan terpengaruh!')" 
                                                               title="Hapus Penerbit">
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
                                                <td colspan="5" class="text-center" style="padding: 40px;">
                                                    <i class="fa fa-search" style="font-size: 48px; color: #cbd5e1; margin-bottom: 15px;"></i>
                                                    <p style="color: #64748b; font-size: 16px;">
                                                        <?php echo $kata_cari != "" ? "Tidak ada penerbit yang ditemukan dengan kata kunci \"<strong>$kata_cari</strong>\"" : "Belum ada data penerbit"; ?>
                                                    </p>
                                                    <?php if ($kata_cari == "") { ?>
                                                        <a href="tambah_penerbit.php" class="btn btn-primary" style="margin-top: 10px;">
                                                            <i class="fa fa-plus-circle"></i> Tambah Penerbit Pertama
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
                                        $url = $kata_cari != "" ? "penerbit.php?kata_cari=$kata_cari&page=$LinkPrev" : "penerbit.php?page=$LinkPrev";
                                        echo '<li><a href="' . $url . '">Previous</a></li>';
                                    }

                                    // Page numbers
                                    $jumlahNumber = 2;
                                    $startNumber = ($page > $jumlahNumber) ? $page - $jumlahNumber : 1;
                                    $endNumber = ($page < ($jumlahPage - $jumlahNumber)) ? $page + $jumlahNumber : $jumlahPage;

                                    for ($i = $startNumber; $i <= $endNumber; $i++) {
                                        $linkActive = ($page == $i) ? ' class="active"' : '';
                                        $url = $kata_cari != "" ? "penerbit.php?kata_cari=$kata_cari&page=$i" : "penerbit.php?page=$i";
                                        echo '<li' . $linkActive . '><a href="' . $url . '">' . $i . '</a></li>';
                                    }

                                    // Next button
                                    if ($page == $jumlahPage) {
                                        echo '<li class="disabled"><a href="#">Next</a></li>';
                                    } else {
                                        $linkNext = $page + 1;
                                        $url = $kata_cari != "" ? "penerbit.php?kata_cari=$kata_cari&page=$linkNext" : "penerbit.php?page=$linkNext";
                                        echo '<li><a href="' . $url . '">Next</a></li>';
                                    }
                                    ?>
                                </ul>
                                <p style="color: #64748b; margin-top: 10px;">
                                    Menampilkan <?php echo $limitStart + 1; ?> - <?php echo min($limitStart + $limit, $JumlahData); ?> dari <?php echo $JumlahData; ?> penerbit
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