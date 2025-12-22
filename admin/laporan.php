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
    <title>Udinus Book | Laporan & Analisis - Sistem Penjualan Professional</title>
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
                        <li><a href="laporan.php" class="active"><i class="lnr lnr-chart-bars"></i> <span>Laporan & Analisis</span></a></li>
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
                                <h2 class="welcome-title">📊 Laporan & Analisis Penjualan</h2>
                                <p class="welcome-subtitle">Analisis mendalam tentang performa penjualan buku</p>
                            </div>
                        </div>
                    </div>

                    <!-- Statistics Overview -->
                    <div class="row" style="margin-bottom: 30px;">
                        <?php
                        // Get statistics
                        $query_stats = "SELECT 
                            COUNT(*) as total_transaksi,
                            SUM(total) as total_pendapatan,
                            AVG(total) as rata_rata_transaksi,
                            MAX(total) as transaksi_tertinggi,
                            MIN(total) as transaksi_terendah
                            FROM head_transaksi";
                        $result_stats = mysqli_query($koneksi, $query_stats);
                        $stats = mysqli_fetch_array($result_stats);

                        $query_items = "SELECT SUM(jumlah_beli) as total_item FROM detail_transaksi";
                        $result_items = mysqli_query($koneksi, $query_items);
                        $items = mysqli_fetch_array($result_items);

                        // Get today's sales
                        $today = date('Y-m-d');
                        $query_today = "SELECT COUNT(*) as transaksi_hari_ini, COALESCE(SUM(total), 0) as pendapatan_hari_ini 
                                       FROM head_transaksi WHERE DATE(tanggal) = '$today'";
                        $result_today = mysqli_query($koneksi, $query_today);
                        $today_stats = mysqli_fetch_array($result_today);
                        ?>
                        
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-money"></i></span>
                                <p>
                                    <span class="number">Rp <?php echo rupiah($stats['total_pendapatan'] ?? 0); ?></span>
                                    <span class="title">Total Pendapatan</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-shopping-cart"></i></span>
                                <p>
                                    <span class="number"><?php echo $stats['total_transaksi'] ?? 0; ?></span>
                                    <span class="title">Total Transaksi</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-cubes"></i></span>
                                <p>
                                    <span class="number"><?php echo $items['total_item'] ?? 0; ?></span>
                                    <span class="title">Total Item Terjual</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-calendar-check-o"></i></span>
                                <p>
                                    <span class="number">Rp <?php echo rupiah($today_stats['pendapatan_hari_ini'] ?? 0); ?></span>
                                    <span class="title">Pendapatan Hari Ini</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Filter Section -->
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Filter Laporan</h3>
                                </div>
                                <div class="panel-body">
                                    <form method="GET" action="laporan.php" class="filter-form">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label><i class="fa fa-search"></i> Cari Transaksi</label>
                                                    <input type="text" class="form-control" name="kata_cari" 
                                                           placeholder="No. transaksi atau tanggal..." 
                                                           value="<?php echo isset($_GET['kata_cari']) ? htmlspecialchars($_GET['kata_cari']) : ''; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label><i class="fa fa-calendar"></i> Dari Tanggal</label>
                                                    <input type="date" class="form-control" name="tanggal_dari" 
                                                           value="<?php echo isset($_GET['tanggal_dari']) ? $_GET['tanggal_dari'] : ''; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label><i class="fa fa-calendar"></i> Sampai Tanggal</label>
                                                    <input type="date" class="form-control" name="tanggal_sampai" 
                                                           value="<?php echo isset($_GET['tanggal_sampai']) ? $_GET['tanggal_sampai'] : ''; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label style="opacity: 0;">Filter</label>
                                                    <div class="btn-group btn-block">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fa fa-filter"></i> Filter
                                                        </button>
                                                        <a href="laporan.php" class="btn btn-default">
                                                            <i class="fa fa-refresh"></i> Reset
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main Report Table -->
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="panel-title">Daftar Transaksi</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button class="btn btn-success" onclick="exportToExcel()">
                                        <i class="fa fa-file-excel-o"></i> Export Excel
                                    </button>
                                    <button class="btn btn-danger" onclick="printReport()">
                                        <i class="fa fa-print"></i> Print
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="reportTable">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="15%">No. Transaksi</th>
                                            <th width="15%">Tanggal</th>
                                            <th width="15%">Total Transaksi</th>
                                            <th width="10%">Jumlah Item</th>
                                            <th width="15%">Status</th>
                                            <th width="15%">Kasir</th>
                                            <th width="10%" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Pagination setup
                                        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                        $limit = 10;
                                        $limitStart = ($page - 1) * $limit;
                                        
                                        // Build query based on filters
                                        $where_conditions = [];
                                        $params = [];
                                        $types = "";

                                        if (isset($_GET['kata_cari']) && !empty($_GET['kata_cari'])) {
                                            $kata_cari = mysqli_real_escape_string($koneksi, $_GET['kata_cari']);
                                            $where_conditions[] = "(h.no_transaksi LIKE ? OR h.tanggal LIKE ?)";
                                            $params[] = "%$kata_cari%";
                                            $params[] = "%$kata_cari%";
                                            $types .= "ss";
                                        }

                                        if (isset($_GET['tanggal_dari']) && !empty($_GET['tanggal_dari'])) {
                                            $where_conditions[] = "h.tanggal >= ?";
                                            $params[] = $_GET['tanggal_dari'];
                                            $types .= "s";
                                        }

                                        if (isset($_GET['tanggal_sampai']) && !empty($_GET['tanggal_sampai'])) {
                                            $where_conditions[] = "h.tanggal <= ?";
                                            $params[] = $_GET['tanggal_sampai'];
                                            $types .= "s";
                                        }

                                        $where_clause = !empty($where_conditions) ? "WHERE " . implode(" AND ", $where_conditions) : "";

                                        // Main query with item count
                                        $query = "SELECT h.*, COUNT(d.ID) as jumlah_item 
                                                 FROM head_transaksi h 
                                                 LEFT JOIN detail_transaksi d ON h.no_transaksi = d.no_transaksi 
                                                 $where_clause 
                                                 GROUP BY h.no_transaksi 
                                                 ORDER BY h.tanggal DESC, h.no_transaksi DESC 
                                                 LIMIT $limitStart, $limit";

                                        $stmt = mysqli_prepare($koneksi, $query);
                                        if (!empty($params)) {
                                            mysqli_stmt_bind_param($stmt, $types, ...$params);
                                        }
                                        mysqli_stmt_execute($stmt);
                                        $result = mysqli_stmt_get_result($stmt);

                                        // Count query for pagination
                                        $count_query = "SELECT COUNT(DISTINCT h.no_transaksi) as total 
                                                       FROM head_transaksi h 
                                                       LEFT JOIN detail_transaksi d ON h.no_transaksi = d.no_transaksi 
                                                       $where_clause";
                                        
                                        $count_stmt = mysqli_prepare($koneksi, $count_query);
                                        if (!empty($params)) {
                                            mysqli_stmt_bind_param($count_stmt, $types, ...$params);
                                        }
                                        mysqli_stmt_execute($count_stmt);
                                        $count_result = mysqli_stmt_get_result($count_stmt);
                                        $count_row = mysqli_fetch_array($count_result);
                                        $JumlahData = $count_row['total'];
                                        
                                        $no = $limitStart + 1;

                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_array($result)) {
                                                $tanggal_formatted = date('d/m/Y', strtotime($row['tanggal']));
                                                $status_class = $row['total'] > 100000 ? 'status-success' : 'status-warning';
                                                $status_text = $row['total'] > 100000 ? 'Tinggi' : 'Normal';
                                        ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><strong><?php echo htmlspecialchars($row['no_transaksi']); ?></strong></td>
                                                    <td><?php echo $tanggal_formatted; ?></td>
                                                    <td><strong>Rp <?php echo rupiah($row['total']); ?></strong></td>
                                                    <td>
                                                        <span class="badge" style="background: var(--primary-color); color: white; padding: 5px 10px; border-radius: 15px;">
                                                            <?php echo $row['jumlah_item']; ?> item
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="status-badge <?php echo $status_class; ?>">
                                                            <?php echo $status_text; ?>
                                                        </span>
                                                    </td>
                                                    <td>Admin</td>
                                                    <td class="text-center">
                                                        <a class="btn btn-sm btn-info" href="detail_laporan.php?id=<?php echo $row['no_transaksi']; ?>" title="Lihat Detail">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                        <?php
                                                $no++;
                                            }
                                        } else {
                                        ?>
                                            <tr>
                                                <td colspan="8" class="text-center" style="padding: 40px;">
                                                    <i class="fa fa-search" style="font-size: 48px; color: #cbd5e1; margin-bottom: 15px;"></i>
                                                    <p style="color: #64748b; font-size: 16px;">
                                                        Tidak ada data transaksi yang ditemukan
                                                    </p>
                                                    <p style="color: #94a3b8; font-size: 14px;">
                                                        Coba ubah filter pencarian atau buat transaksi baru
                                                    </p>
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
                                    // Build URL parameters
                                    $url_params = [];
                                    if (isset($_GET['kata_cari']) && !empty($_GET['kata_cari'])) {
                                        $url_params[] = "kata_cari=" . urlencode($_GET['kata_cari']);
                                    }
                                    if (isset($_GET['tanggal_dari']) && !empty($_GET['tanggal_dari'])) {
                                        $url_params[] = "tanggal_dari=" . urlencode($_GET['tanggal_dari']);
                                    }
                                    if (isset($_GET['tanggal_sampai']) && !empty($_GET['tanggal_sampai'])) {
                                        $url_params[] = "tanggal_sampai=" . urlencode($_GET['tanggal_sampai']);
                                    }
                                    $base_url = "laporan.php?" . implode("&", $url_params);
                                    $separator = !empty($url_params) ? "&" : "";
                            ?>
                            <div class="text-center" style="margin-top: 20px;">
                                <ul class="pagination">
                                    <?php
                                    // Previous button
                                    if ($page == 1) {
                                        echo '<li class="disabled"><a href="#">Previous</a></li>';
                                    } else {
                                        $LinkPrev = $page - 1;
                                        echo '<li><a href="' . $base_url . $separator . 'page=' . $LinkPrev . '">Previous</a></li>';
                                    }

                                    // Page numbers
                                    $jumlahNumber = 2;
                                    $startNumber = ($page > $jumlahNumber) ? $page - $jumlahNumber : 1;
                                    $endNumber = ($page < ($jumlahPage - $jumlahNumber)) ? $page + $jumlahNumber : $jumlahPage;

                                    for ($i = $startNumber; $i <= $endNumber; $i++) {
                                        $linkActive = ($page == $i) ? ' class="active"' : '';
                                        echo '<li' . $linkActive . '><a href="' . $base_url . $separator . 'page=' . $i . '">' . $i . '</a></li>';
                                    }

                                    // Next button
                                    if ($page == $jumlahPage) {
                                        echo '<li class="disabled"><a href="#">Next</a></li>';
                                    } else {
                                        $linkNext = $page + 1;
                                        echo '<li><a href="' . $base_url . $separator . 'page=' . $linkNext . '">Next</a></li>';
                                    }
                                    ?>
                                </ul>
                                <p style="color: #64748b; margin-top: 10px;">
                                    Menampilkan <?php echo $limitStart + 1; ?> - <?php echo min($limitStart + $limit, $JumlahData); ?> dari <?php echo $JumlahData; ?> transaksi
                                </p>
                            </div>
                            <?php 
                                }
                            } 
                            ?>
                        </div>
                    </div>

                    <!-- Summary Statistics -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Ringkasan Statistik</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="stats-summary">
                                        <div class="stat-item">
                                            <span class="stat-label">Rata-rata per Transaksi:</span>
                                            <span class="stat-value">Rp <?php echo rupiah($stats['rata_rata_transaksi'] ?? 0); ?></span>
                                        </div>
                                        <div class="stat-item">
                                            <span class="stat-label">Transaksi Tertinggi:</span>
                                            <span class="stat-value">Rp <?php echo rupiah($stats['transaksi_tertinggi'] ?? 0); ?></span>
                                        </div>
                                        <div class="stat-item">
                                            <span class="stat-label">Transaksi Terendah:</span>
                                            <span class="stat-value">Rp <?php echo rupiah($stats['transaksi_terendah'] ?? 0); ?></span>
                                        </div>
                                        <div class="stat-item">
                                            <span class="stat-label">Transaksi Hari Ini:</span>
                                            <span class="stat-value"><?php echo $today_stats['transaksi_hari_ini'] ?? 0; ?> transaksi</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Buku Terlaris</h3>
                                </div>
                                <div class="panel-body">
                                    <?php
                                    $query_terlaris = "SELECT b.judul, SUM(d.jumlah_beli) as total_terjual 
                                                      FROM detail_transaksi d 
                                                      INNER JOIN buku b ON d.ID_buku = b.id 
                                                      GROUP BY d.ID_buku 
                                                      ORDER BY total_terjual DESC 
                                                      LIMIT 5";
                                    $result_terlaris = mysqli_query($koneksi, $query_terlaris);
                                    
                                    if (mysqli_num_rows($result_terlaris) > 0) {
                                        $rank = 1;
                                        while ($book = mysqli_fetch_array($result_terlaris)) {
                                    ?>
                                        <div class="bestseller-item">
                                            <span class="rank">#<?php echo $rank; ?></span>
                                            <div class="book-info">
                                                <strong><?php echo htmlspecialchars($book['judul']); ?></strong>
                                                <span class="sales-count"><?php echo $book['total_terjual']; ?> terjual</span>
                                            </div>
                                        </div>
                                    <?php 
                                            $rank++;
                                        }
                                    } else {
                                    ?>
                                        <p style="color: #64748b; text-align: center; padding: 20px;">
                                            Belum ada data penjualan buku
                                        </p>
                                    <?php } ?>
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
        function exportToExcel() {
            // Simple export functionality
            var table = document.getElementById('reportTable');
            var html = table.outerHTML;
            var url = 'data:application/vnd.ms-excel,' + encodeURIComponent(html);
            var downloadLink = document.createElement("a");
            document.body.appendChild(downloadLink);
            downloadLink.href = url;
            downloadLink.download = "laporan_penjualan_" + new Date().toISOString().slice(0,10) + ".xls";
            downloadLink.click();
            document.body.removeChild(downloadLink);
        }

        function printReport() {
            var printContent = document.getElementById('reportTable').outerHTML;
            var originalContent = document.body.innerHTML;
            
            document.body.innerHTML = `
                <div style="padding: 20px;">
                    <h2 style="text-align: center; margin-bottom: 20px;">Laporan Penjualan Udinus Book</h2>
                    <p style="text-align: center; margin-bottom: 30px;">Tanggal Cetak: ${new Date().toLocaleDateString('id-ID')}</p>
                    ${printContent}
                </div>
            `;
            
            window.print();
            document.body.innerHTML = originalContent;
            location.reload();
        }

        // Auto-submit form when date changes
        document.querySelector('input[name="tanggal_dari"]').addEventListener('change', function() {
            if (document.querySelector('input[name="tanggal_sampai"]').value) {
                document.querySelector('.filter-form').submit();
            }
        });

        document.querySelector('input[name="tanggal_sampai"]').addEventListener('change', function() {
            if (document.querySelector('input[name="tanggal_dari"]').value) {
                document.querySelector('.filter-form').submit();
            }
        });
    </script>
</body>
</html>