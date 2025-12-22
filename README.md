# 📚 Udinus Book - Sistem Manajemen Penjualan Buku Professional

![Version](https://img.shields.io/badge/version-2.0-blue.svg)
![PHP](https://img.shields.io/badge/PHP-7.4+-green.svg)
![Bootstrap](https://img.shields.io/badge/Bootstrap-4.x-purple.svg)
![License](https://img.shields.io/badge/license-MIT-orange.svg)

## 🌟 Tentang Aplikasi

**Udinus Book** adalah sistem manajemen penjualan buku yang modern dan professional, dikembangkan khusus untuk membantu pelaku bisnis dalam mengelola operasional toko buku dengan efisien. Aplikasi ini menggabungkan desain UI/UX yang menarik dengan fungsionalitas yang lengkap.

### ✨ Fitur Utama

- 🎨 **Desain Modern & Responsif** - Interface yang clean dan user-friendly
- 📊 **Dashboard Real-time** - Statistik penjualan yang update secara langsung
- 📚 **Manajemen Buku** - CRUD lengkap untuk data buku dengan upload gambar
- 🏢 **Manajemen Penerbit** - Kelola data penerbit dengan mudah
- 💰 **Sistem Transaksi** - Proses penjualan yang cepat dan akurat
- 📈 **Laporan & Analisis** - Laporan penjualan yang detail dan informatif
- 🔐 **Sistem Keamanan** - Login yang aman dengan session management
- 📱 **Mobile Friendly** - Dapat diakses dari berbagai perangkat

### 🎯 Keunggulan Versi Baru

1. **UI/UX Modern**: Desain yang fresh dengan gradient colors dan animasi smooth
2. **Typography Premium**: Menggunakan font Inter & Poppins untuk readability yang optimal
3. **Color Scheme Professional**: Palet warna yang konsisten dan eye-friendly
4. **Interactive Elements**: Hover effects dan micro-interactions yang engaging
5. **Responsive Design**: Perfect di desktop, tablet, dan mobile
6. **Performance Optimized**: Loading yang cepat dengan CSS yang efficient

## 🚀 Teknologi yang Digunakan

- **Backend**: PHP 7.4+ dengan MySQLi
- **Frontend**: HTML5, CSS3, JavaScript
- **Framework CSS**: Bootstrap 4.x + Custom Theme
- **Icons**: Font Awesome & Linearicons
- **Fonts**: Google Fonts (Inter & Poppins)
- **Database**: MySQL/MariaDB

## 📋 Persyaratan Sistem

- PHP 7.4 atau lebih tinggi
- MySQL 5.7+ atau MariaDB 10.2+
- Web Server (Apache/Nginx)
- Browser modern (Chrome, Firefox, Safari, Edge)

## 🛠️ Instalasi

1. **Clone atau Download** project ini
2. **Import Database** - Import file `penjualan_php.sql` ke MySQL
3. **Konfigurasi Database** - Edit file `admin/konfig.php` sesuai setting database Anda
4. **Upload ke Server** - Upload semua file ke web server
5. **Akses Aplikasi** - Buka browser dan akses aplikasi

### Login Default
**Tersedia 4 akun untuk login:**

- **Admin Utama**: Username: `admin` | Password: `admin`
- **Yudha**: Username: `yudha` | Password: `yudha`  
- **Ardy**: Username: `ardy` | Password: `ardy`
- **Devan**: Username: `devan` | Password: `devan`

*Semua akun memiliki hak akses administrator*

## 📁 Struktur Project

```
udinus-book/
├── admin/                  # Panel administrasi
│   ├── buku.php           # Manajemen buku
│   ├── penerbit.php       # Manajemen penerbit
│   ├── transaksi.php      # Sistem transaksi
│   ├── laporan.php        # Laporan penjualan
│   └── ...
├── assets/                # Asset statis
│   ├── css/
│   │   ├── main.css       # CSS utama
│   │   └── udinus-theme.css # Theme modern
│   ├── vendor/            # Library eksternal
│   └── ...
├── gambar/                # Upload gambar buku
├── index.php              # Halaman login
└── penjualan_php.sql      # Database schema
```

## 🎨 Customization

### Mengubah Warna Theme
Edit variabel CSS di `assets/css/udinus-theme.css`:

```css
:root {
    --primary-color: #2563eb;    /* Warna utama */
    --secondary-color: #10b981;  /* Warna sekunder */
    --accent-color: #f59e0b;     /* Warna aksen */
}
```

### Menambah Fitur Baru
1. Buat file PHP baru di folder `admin/`
2. Include file `konfig.php` dan `cek.php`
3. Gunakan template HTML yang sudah ada
4. Tambahkan menu di sidebar (`admin/index.php`)

## 📊 Database Schema

### Tabel Utama:
- `user` - Data pengguna sistem
- `buku` - Data buku dengan informasi lengkap
- `penerbit` - Data penerbit buku
- `head_transaksi` - Header transaksi penjualan
- `detail_transaksi` - Detail item dalam transaksi

## 🔧 Troubleshooting

### Masalah Umum:
1. **Error Database Connection**: Periksa konfigurasi di `admin/konfig.php`
2. **Gambar Tidak Muncul**: Pastikan folder `gambar/` memiliki permission write
3. **Session Error**: Pastikan PHP session sudah aktif di server

## 🤝 Kontribusi

Kami menerima kontribusi untuk pengembangan aplikasi ini:

1. Fork repository ini
2. Buat branch fitur baru (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

## 📝 Changelog

### Version 2.0 (Latest)
- ✅ Complete UI/UX redesign dengan modern theme
- ✅ Responsive design untuk semua perangkat
- ✅ Improved dashboard dengan statistik real-time
- ✅ Enhanced login page dengan animasi
- ✅ Better typography dan color scheme
- ✅ Optimized performance dan loading speed

### Version 1.0
- ✅ Basic CRUD operations
- ✅ Simple dashboard
- ✅ Basic reporting system

## 📞 Support

Jika Anda membutuhkan bantuan atau memiliki pertanyaan:

- 📧 Email: support@udinusbook.com
- 💬 WhatsApp: +62 xxx-xxxx-xxxx
- 🌐 Website: www.udinusbook.com

## 📄 License

Project ini dilisensikan under MIT License - lihat file [LICENSE](LICENSE) untuk detail.

---

<div align="center">

**Dibuat dengan ❤️ untuk kemudahan bisnis buku Anda**

[⭐ Star this repo](https://github.com/username/udinus-book) | [🐛 Report Bug](https://github.com/username/udinus-book/issues) | [💡 Request Feature](https://github.com/username/udinus-book/issues)

</div>