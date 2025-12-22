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

// Get transaction ID
$no_transaksi = isset($_GET['id']) ? mysqli_real_escape_string($koneksi, $_GET['id']) : '';

if (empty($no_transaksi)) {
    header("Location: laporan.php");
    exit;
}

// Get transaction header
$query_header = "SELECT * FROM head_transaksi WHERE no_transaksi = ?";
$stmt_header = mysqli_prepare($koneksi, $query_header);
mysqli_stmt_bind_param($stmt_header, "s", $no_transaksi);
mysqli_stmt_execute($stmt_header);
$result_header = mysqli_stmt_get_result($stmt_header);
$header = mysqli_fetch_array($result_header);

if (!$header) {
    header("Location: laporan.php");
    exit;
}
?>

<head>
    <title>Udinus Book | Detail Transaksi <?php echo $no_transaksi; ?> - Sistem Penjualan Professional</title>
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
                                <h2 class="welcome-title">🧾 Detail Transaksi</h2>
                                <p class="welcome-subtitle">Informasi lengkap transaksi <?php echo $no_transaksi; ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Back Button -->
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-12">
                            <a href="laporan.php" class="btn btn-default">
                                <i class="fa fa-arrow-left"></i> Kembali ke Laporan
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Transaction Info -->
                        <div class="col-md-4">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Informasi Transaksi</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="transaction-info">
                                        <div class="info-item">
                                            <span class="info-label"><i class="fa fa-hashtag"></i> No. Transaksi:</span>
                                            <span class="info-value"><?php echo htmlspecialchars($header['no_transaksi']); ?></span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label"><i class="fa fa-calendar"></i> Tanggal:</span>
                                            <span class="info-value"><?php echo date('d/m/Y', strtotime($header['tanggal'])); ?></span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label"><i class="fa fa-clock-o"></i> Waktu:</span>
                                            <span class="info-value"><?php echo date('H:i:s', strtotime($header['tanggal'])); ?></span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label"><i class="fa fa-user"></i> Kasir:</span>
                                            <span class="info-value">Admin</span>
                                        </div>
                                        <div class="info-item total">
                                            <span class="info-label"><i class="fa fa-money"></i> Total:</span>
                                            <span class="info-value">Rp <?php echo rupiah($header['total']); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Transaction Summary -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Ringkasan</h3>
                                </div>
                                <div class="panel-body">
                                    <?php
                                    $query_summary = "SELECT 
                                        COUNT(*) as total_item,
                                        SUM(jumlah_beli) as total_qty,
                                        AVG(harga) as rata_harga
                                        FROM detail_transaksi 
                                        WHERE no_transaksi = ?";
                                    $stmt_summary = mysqli_prepare($koneksi, $query_summary);
                                    mysqli_stmt_bind_param($stmt_summary, "s", $no_transaksi);
                                    mysqli_stmt_execute($stmt_summary);
                                    $result_summary = mysqli_stmt_get_result($stmt_summary);
                                    $summary = mysqli_fetch_array($result_summary);
                                    ?>
                                    <div class="summary-stats">
                                        <div class="summary-item">
                                            <span class="summary-number"><?php echo $summary['total_item']; ?></span>
                                            <span class="summary-label">Jenis Buku</span>
                                        </div>
                                        <div class="summary-item">
                                            <span class="summary-number"><?php echo $summary['total_qty']; ?></span>
                                            <span class="summary-label">Total Quantity</span>
                                        </div>
                                        <div class="summary-item">
                                            <span class="summary-number">Rp <?php echo rupiah($summary['rata_harga']); ?></span>
                                            <span class="summary-label">Rata-rata Harga</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Transaction Details -->
                        <div class="col-md-8">
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3 class="panel-title">Detail Item Pembelian</h3>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <button class="btn btn-success btn-sm" onclick="printReceipt()">
                                                <i class="fa fa-print"></i> Print Struk
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="detailTable">
                                            <thead>
                                                <tr>
                                                    <th width="5%">#</th>
                                                    <th width="35%">Judul Buku</th>
                                                    <th width="20%">Pengarang</th>
                                                    <th width="15%">Harga Satuan</th>
                                                    <th width="10%">Qty</th>
                                                    <th width="15%">Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query_detail = "SELECT d.*, b.judul, b.pengarang 
                                                               FROM detail_transaksi d 
                                                               INNER JOIN buku b ON d.ID_buku = b.id 
                                                               WHERE d.no_transaksi = ? 
                                                               ORDER BY d.ID ASC";
                                                $stmt_detail = mysqli_prepare($koneksi, $query_detail);
                                                mysqli_stmt_bind_param($stmt_detail, "s", $no_transaksi);
                                                mysqli_stmt_execute($stmt_detail);
                                                $result_detail = mysqli_stmt_get_result($stmt_detail);
                                                
                                                $no = 1;
                                                $total_keseluruhan = 0;
                                                
                                                while ($detail = mysqli_fetch_array($result_detail)) {
                                                    $total_keseluruhan += $detail['subtotal'];
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no; ?></td>
                                                        <td>
                                                            <strong><?php echo htmlspecialchars($detail['judul']); ?></strong>
                                                        </td>
                                                        <td><?php echo htmlspecialchars($detail['pengarang']); ?></td>
                                                        <td>Rp <?php echo rupiah($detail['harga']); ?></td>
                                                        <td>
                                                            <span class="badge" style="background: var(--primary-color); color: white; padding: 5px 10px; border-radius: 15px;">
                                                                <?php echo $detail['jumlah_beli']; ?>
                                                            </span>
                                                        </td>
                                                        <td><strong>Rp <?php echo rupiah($detail['subtotal']); ?></strong></td>
                                                    </tr>
                                                <?php 
                                                    $no++;
                                                } 
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr style="background: var(--light-bg); font-weight: bold;">
                                                    <td colspan="5" class="text-right" style="padding: 15px;">
                                                        <strong>TOTAL KESELURUHAN:</strong>
                                                    </td>
                                                    <td style="padding: 15px;">
                                                        <strong style="color: var(--primary-color); font-size: 18px;">
                                                            Rp <?php echo rupiah($total_keseluruhan); ?>
                                                        </strong>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Receipt Preview -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Preview Struk</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="receipt-preview" id="receiptPreview">
                                        <div class="receipt-header">
                                            <h3>UDINUS BOOK</h3>
                                            <p>Sistem Manajemen Penjualan Buku</p>
                                            <p>Jl. Nakula I No. 5-11, Semarang</p>
                                            <p>Telp: (024) 3517261</p>
                                            <hr>
                                        </div>
                                        <div class="receipt-info">
                                            <p><strong>No. Transaksi:</strong> <?php echo $header['no_transaksi']; ?></p>
                                            <p><strong>Tanggal:</strong> <?php echo date('d/m/Y H:i:s', strtotime($header['tanggal'])); ?></p>
                                            <p><strong>Kasir:</strong> <?php echo $_SESSION['nama']; ?></p>
                                            <hr>
                                        </div>
                                        <div class="receipt-items">
                                            <?php
                                            // Reset query for receipt
                                            mysqli_stmt_execute($stmt_detail);
                                            $result_detail = mysqli_stmt_get_result($stmt_detail);
                                            
                                            while ($detail = mysqli_fetch_array($result_detail)) {
                                            ?>
                                                <div class="receipt-item">
                                                    <div class="item-name"><?php echo htmlspecialchars($detail['judul']); ?></div>
                                                    <div class="item-details">
                                                        <?php echo $detail['jumlah_beli']; ?> x Rp <?php echo rupiah($detail['harga']); ?> = Rp <?php echo rupiah($detail['subtotal']); ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <hr>
                                            <div class="receipt-total">
                                                <strong>TOTAL: Rp <?php echo rupiah($header['total']); ?></strong>
                                            </div>
                                        </div>
                                        <div class="receipt-footer">
                                            <hr>
                                            <p style="text-align: center;">Terima kasih atas kunjungan Anda!</p>
                                            <p style="text-align: center;">Selamat membaca!</p>
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
        function printReceipt() {
            var receiptContent = document.getElementById('receiptPreview').innerHTML;
            var originalContent = document.body.innerHTML;
            
            document.body.innerHTML = `
                <div style="width: 300px; margin: 0 auto; font-family: 'Courier New', monospace; font-size: 12px; line-height: 1.4;">
                    ${receiptContent}
                </div>
            `;
            
            window.print();
            document.body.innerHTML = originalContent;
            location.reload();
        }
    </script>
</body>
</html>