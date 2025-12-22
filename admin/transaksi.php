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
    <title>Udinus Book | Transaksi Penjualan - Sistem Penjualan Professional</title>
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
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                        <li><a href="transaksi.php" class="active"><i class="lnr lnr-cart"></i> <span>Transaksi Penjualan</span></a></li>
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
                                <h2 class="welcome-title">🛒 Transaksi Penjualan</h2>
                                <p class="welcome-subtitle">Proses penjualan buku dengan mudah dan cepat</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Form Transaksi -->
                        <div class="col-md-8">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Form Transaksi Baru</h3>
                                </div>
                                <div class="panel-body">
                                    <form class="transaction-form" method="post" id="transactionForm">
                                        <?php
                                        // Generate nomor transaksi
                                        $query = "SELECT max(no_transaksi) as maxKode FROM head_transaksi";
                                        $hasil = mysqli_query($koneksi, $query);
                                        $data = mysqli_fetch_array($hasil);
                                        $notrans = $data['maxKode'];
                                        $noUrut = (int) substr($notrans, 3, 3);
                                        $noUrut++;
                                        $char = "TRS";
                                        $noTransaksi = $char . sprintf("%03s", $noUrut);
                                        ?>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><i class="fa fa-hashtag"></i> No. Transaksi</label>
                                                    <input type="text" class="form-control" name="notransaksi" value="<?php echo $noTransaksi; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><i class="fa fa-calendar"></i> Tanggal</label>
                                                    <input type="date" class="form-control" name="tanggal" value="<?php echo date("Y-m-d"); ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><i class="fa fa-book"></i> Pilih Buku</label>
                                                    <select class="form-control" name="id_buku" id="id_buku" onchange="changeValue(this.value)" required>
                                                        <option value="">-- Pilih Buku --</option>
                                                        <?php
                                                        $queryJudul = "SELECT b.*, p.nama_penerbit 
                                                                      FROM buku b 
                                                                      INNER JOIN penerbit p ON b.id_penerbit = p.id 
                                                                      WHERE b.stok > 0 
                                                                      ORDER BY b.judul ASC";
                                                        $hasilJudul = mysqli_query($koneksi, $queryJudul);
                                                        $jsArray = "var dataBuku = new Array();\n";
                                                        
                                                        while ($data = mysqli_fetch_array($hasilJudul)) {
                                                            $jsArray .= "dataBuku['" . $data['id'] . "'] = {
                                                                pengarang:'" . addslashes($data['pengarang']) . "',
                                                                nama_penerbit:'" . addslashes($data['nama_penerbit']) . "',
                                                                harga:'" . addslashes($data['harga']) . "',
                                                                stok:'" . addslashes($data['stok']) . "',
                                                                id:'" . addslashes($data['id']) . "'
                                                            };\n";
                                                        ?>
                                                            <option value="<?php echo $data['id']; ?>">
                                                                <?php echo $data['judul'] . " (Stok: " . $data['stok'] . ")"; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><i class="fa fa-user"></i> Pengarang</label>
                                                    <input type="text" class="form-control" id="nama_pengarang" name="nama_pengarang" placeholder="Pilih buku terlebih dahulu" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><i class="fa fa-building"></i> Penerbit</label>
                                                    <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit" placeholder="Penerbit" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><i class="fa fa-money"></i> Harga Satuan</label>
                                                    <input type="text" id="harga" class="form-control" name="harga" placeholder="Rp 0" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><i class="fa fa-cubes"></i> Stok Tersedia</label>
                                                    <input type="text" id="stok_tersedia" class="form-control" placeholder="0" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><i class="fa fa-shopping-cart"></i> Jumlah Beli</label>
                                                    <input type="number" id="qty" class="form-control" name="qty" placeholder="Masukkan jumlah" min="1" onkeyup="sum();" onchange="sum();">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><i class="fa fa-calculator"></i> Subtotal</label>
                                                    <input type="text" class="form-control" id="subtotal" name="subtotal" placeholder="Rp 0" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button id="tambah" type="button" class="btn btn-primary btn-lg btn-block">
                                                <i class="fa fa-plus-circle"></i> Tambah ke Keranjang
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Summary -->
                        <div class="col-md-4">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Ringkasan Transaksi</h3>
                                </div>
                                <div class="panel-body">
                                    <?php 
                                    $query = "SELECT COUNT(*) as jumlah_item, SUM(subtotal) as total_harga 
                                             FROM detail_transaksi 
                                             WHERE no_transaksi='$noTransaksi'";
                                    $result = mysqli_query($koneksi, $query);
                                    $summary = mysqli_fetch_array($result);
                                    ?>
                                    
                                    <div class="transaction-summary">
                                        <div class="summary-item">
                                            <span class="summary-label">No. Transaksi:</span>
                                            <span class="summary-value"><?php echo $noTransaksi; ?></span>
                                        </div>
                                        <div class="summary-item">
                                            <span class="summary-label">Tanggal:</span>
                                            <span class="summary-value"><?php echo date("d/m/Y"); ?></span>
                                        </div>
                                        <div class="summary-item">
                                            <span class="summary-label">Kasir:</span>
                                            <span class="summary-value"><?php echo $_SESSION['nama']; ?></span>
                                        </div>
                                        <hr>
                                        <div class="summary-item">
                                            <span class="summary-label">Total Item:</span>
                                            <span class="summary-value" id="total-items"><?php echo $summary['jumlah_item'] ?? 0; ?></span>
                                        </div>
                                        <div class="summary-item total">
                                            <span class="summary-label">Total Bayar:</span>
                                            <span class="summary-value" id="total-price">Rp <?php echo rupiah($summary['total_harga'] ?? 0); ?></span>
                                        </div>
                                    </div>

                                    <form method="post" id="finalizeForm">
                                        <input type="hidden" name="notransaksi" value="<?php echo $noTransaksi; ?>">
                                        <input type="hidden" name="tanggal" value="<?php echo date("Y-m-d"); ?>">
                                        <input type="hidden" name="total" value="<?php echo $summary['total_harga'] ?? 0; ?>">
                                        
                                        <button id="simpan" type="button" class="btn btn-success btn-lg btn-block" style="margin-top: 20px;">
                                            <i class="fa fa-check-circle"></i> Selesaikan Transaksi
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Keranjang Belanja -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Keranjang Belanja</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="cart-table">
                                            <thead>
                                                <tr>
                                                    <th width="5%">#</th>
                                                    <th width="35%">Judul Buku</th>
                                                    <th width="15%">Harga Satuan</th>
                                                    <th width="10%">Jumlah</th>
                                                    <th width="20%">Subtotal</th>
                                                    <th width="15%" class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="cart-items">
                                                <?php
                                                $queryData = "SELECT dt.ID as id, b.judul as dataBuku, dt.harga as harga_satuan,
                                                             dt.jumlah_beli as dataQty, dt.subtotal as dataSubtotal 
                                                             FROM detail_transaksi dt 
                                                             INNER JOIN buku b ON dt.ID_buku = b.id 
                                                             WHERE dt.no_transaksi='$noTransaksi'";
                                                $resultData = mysqli_query($koneksi, $queryData);
                                                $no = 1;
                                                
                                                if (mysqli_num_rows($resultData) > 0) {
                                                    while ($baris = mysqli_fetch_array($resultData)) {
                                                ?>
                                                        <tr>
                                                            <td><?php echo $no++; ?></td>
                                                            <td><strong><?php echo htmlspecialchars($baris['dataBuku']); ?></strong></td>
                                                            <td>Rp <?php echo rupiah($baris['harga_satuan']); ?></td>
                                                            <td>
                                                                <span class="badge" style="background: var(--primary-color); color: white; padding: 5px 10px; border-radius: 15px;">
                                                                    <?php echo $baris['dataQty']; ?> unit
                                                                </span>
                                                            </td>
                                                            <td><strong>Rp <?php echo rupiah($baris['dataSubtotal']); ?></strong></td>
                                                            <td class="text-center">
                                                                <a class="btn btn-sm btn-danger" href="proses_hapus_beli.php?id=<?php echo $baris['id']; ?>" 
                                                                   onclick="return confirm('Hapus item ini dari keranjang?')" title="Hapus Item">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                <?php 
                                                    }
                                                } else {
                                                ?>
                                                    <tr id="empty-cart">
                                                        <td colspan="6" class="text-center" style="padding: 40px;">
                                                            <i class="fa fa-shopping-cart" style="font-size: 48px; color: #cbd5e1; margin-bottom: 15px;"></i>
                                                            <p style="color: #64748b; font-size: 16px;">Keranjang belanja masih kosong</p>
                                                            <p style="color: #94a3b8; font-size: 14px;">Pilih buku dan tambahkan ke keranjang untuk memulai transaksi</p>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
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
    
    <script type="text/javascript">
        <?php echo $jsArray; ?>

        function changeValue(ID) {
            if (ID) {
                document.getElementById('nama_pengarang').value = dataBuku[ID].pengarang;
                document.getElementById('nama_penerbit').value = dataBuku[ID].nama_penerbit;
                document.getElementById('harga').value = dataBuku[ID].harga;
                document.getElementById('stok_tersedia').value = dataBuku[ID].stok;
                document.getElementById('qty').max = dataBuku[ID].stok;
                document.getElementById('qty').value = '';
                document.getElementById('subtotal').value = '';
            } else {
                document.getElementById('nama_pengarang').value = '';
                document.getElementById('nama_penerbit').value = '';
                document.getElementById('harga').value = '';
                document.getElementById('stok_tersedia').value = '';
                document.getElementById('qty').value = '';
                document.getElementById('subtotal').value = '';
            }
        }

        function sum() {
            var dataQty = parseInt(document.getElementById('qty').value) || 0;
            var dataHarga = parseInt(document.getElementById('harga').value) || 0;
            var stokTersedia = parseInt(document.getElementById('stok_tersedia').value) || 0;
            
            if (dataQty > stokTersedia) {
                alert('Jumlah melebihi stok yang tersedia!');
                document.getElementById('qty').value = stokTersedia;
                dataQty = stokTersedia;
            }
            
            var result = dataQty * dataHarga;
            document.getElementById('subtotal').value = result > 0 ? 'Rp ' + result.toLocaleString('id-ID') : '';
        }

        $(document).ready(function() {
            $("#tambah").click(function() {
                var idBuku = $('#id_buku').val();
                var qty = $('#qty').val();
                
                if (!idBuku) {
                    alert('Pilih buku terlebih dahulu!');
                    return;
                }
                
                if (!qty || qty <= 0) {
                    alert('Masukkan jumlah yang valid!');
                    return;
                }
                
                var data = $('#transactionForm').serialize();
                $.ajax({
                    type: 'POST',
                    url: "proses_simpan_beli.php",
                    data: data,
                    success: function(response) {
                        location.reload();
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat menambah item!');
                    }
                });
            });
            
            $("#simpan").click(function() {
                if (confirm('Selesaikan transaksi ini?')) {
                    var data = $('#finalizeForm').serialize();
                    $.ajax({
                        type: 'POST',
                        url: "proses_simpan_data.php",
                        data: data,
                        success: function(response) {
                            alert('Transaksi berhasil disimpan!');
                            window.location.href = 'laporan.php';
                        },
                        error: function() {
                            alert('Terjadi kesalahan saat menyimpan transaksi!');
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>