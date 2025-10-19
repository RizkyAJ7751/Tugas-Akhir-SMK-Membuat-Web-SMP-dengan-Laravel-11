# Website Company Profile SMP IT Bahrul Ulum Sahlaniyah

## 📋 Deskripsi Project

Website company profile untuk SMP IT Bahrul Ulum Sahlaniyah yang dibuat menggunakan Laravel 11 dan Tailwind CSS. Website ini menampilkan informasi lengkap tentang sekolah dengan desain yang clean, responsif, dan menggunakan tema warna putih sebagai warna utama dan hijau sebagai warna pendukung.

## 🚀 Fitur Utama

### Sections Website
- **Navbar**: Navigasi yang responsive dengan smooth scrolling
- **Hero Section**: Halaman pembuka dengan informasi utama sekolah
- **About Section**: Informasi tentang sekolah dengan statistik
- **Programs Section**: Program unggulan sekolah
- **Blog Section**: Area berita dan artikel sekolah
- **Contact Section**: Form kontak dan informasi kontak lengkap
- **Footer**: Informasi sekolah dan social media links

### Fitur Teknis
- ✅ Desain responsif (desktop, tablet, mobile)
- ✅ Smooth scrolling navigation
- ✅ Form kontak dengan validasi
- ✅ Scroll to top button
- ✅ Animasi CSS yang smooth
- ✅ SEO-friendly structure
- ✅ Fast loading dengan optimized assets

## 🛠️ Teknologi yang Digunakan

- **Backend**: Laravel 11.5.2
- **Frontend**: Tailwind CSS
- **Database**: MySQL/SQLite
- **Build Tool**: Vite
- **PHP Version**: 8.2+
- **Node.js**: 20.x

## 📁 Struktur Project

```
smpit-bahrul-ulum-sahlaniyah/
├── app/                          # Laravel application logic
├── bootstrap/                    # Laravel bootstrap files
├── config/                       # Configuration files
├── database/                     # Database migrations and seeders
├── public/                       # Public assets and entry point
│   ├── build/                   # Compiled assets (CSS, JS)
│   └── index.php               # Application entry point
├── resources/                    # Views, CSS, JS source files
│   ├── css/
│   │   └── app.css             # Main CSS file with Tailwind
│   ├── js/
│   │   └── app.js              # Main JavaScript file
│   └── views/
│       ├── components/          # Blade components (modular)
│       │   ├── navbar.blade.php
│       │   ├── hero.blade.php
│       │   ├── about.blade.php
│       │   ├── programs.blade.php
│       │   ├── blog.blade.php
│       │   ├── blog-index.blade.php
│       │   ├── blog-show.blade.php
│       │   ├── teachers.blade.php
│       │   ├── teachers-index.blade.php
│       │   ├── contact.blade.php
│       │   └── footer.blade.php
│       └── welcome.blade.php    # Main page template
├── routes/                       # Route definitions
├── storage/                      # Storage for logs, cache, etc.
├── tests/                        # Test files
├── .env                         # Environment configuration
├── composer.json                # PHP dependencies
├── package.json                 # Node.js dependencies
├── tailwind.config.js           # Tailwind CSS configuration
└── vite.config.js              # Vite build configuration
```

## 🎨 Desain dan Tema

### Warna
- **Primary**: Putih (#ffffff) - Warna utama untuk background
- **Secondary**: Hijau (#16a34a) - Warna pendukung untuk navbar, buttons, dan aksen
- **Text**: Abu-abu gelap untuk readability yang optimal

### Typography
- Font family: Inter (system font fallback)
- Responsive typography dengan Tailwind CSS
- Hierarchy yang jelas untuk heading dan body text

### Layout
- Mobile-first responsive design
- Grid system dengan Tailwind CSS
- Consistent spacing dan padding
- Clean dan minimalist design approach

## 📦 File Delivery

Package ini berisi:

1. **smpit-bahrul-ulum-sahlaniyah/** - Folder project Laravel lengkap
2. **tutorial_laragon_setup.md** - Tutorial lengkap konfigurasi dengan Laragon
3. **testing_results.md** - Hasil testing website
4. **todo.md** - Checklist development yang telah diselesaikan
5. **README.md** - Dokumentasi project ini

## 🚀 Cara Instalasi

### Prasyarat
- PHP 8.2 atau lebih tinggi
- Composer
- Node.js dan NPM
- MySQL atau SQLite
- Web server (Apache/Nginx) atau Laragon

### Langkah Instalasi

1. **Extract project**
   ```bash
   tar -xzf smpit-bahrul-ulum-sahlaniyah-complete.tar.gz
   cd smpit-bahrul-ulum-sahlaniyah
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Setup environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Konfigurasi database di .env**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=smpit_sahlaniyah
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Jalankan migrasi**
   ```bash
   php artisan migrate
   ```

6. **Build assets**
   ```bash
   npm run build
   ```

7. **Jalankan server**
   ```bash
   php artisan serve
   ```

### Instalasi dengan Laragon

Untuk instalasi dengan Laragon, ikuti tutorial lengkap di file `tutorial_laragon_setup.md` yang berisi:
- Instalasi dan konfigurasi Laragon
- Setup virtual host
- Konfigurasi database
- Deployment dan optimasi
- Troubleshooting dan maintenance

## 🧪 Testing

Website telah melalui testing komprehensif:

- ✅ **Functional Testing**: Semua fitur berfungsi dengan baik
- ✅ **Responsive Testing**: Tampil optimal di semua device
- ✅ **Performance Testing**: Loading time optimal
- ✅ **Cross-browser Testing**: Compatible dengan browser modern
- ✅ **Form Testing**: Form kontak berfungsi dengan validasi

Detail hasil testing dapat dilihat di file `testing_results.md`.

## 📱 Responsive Design

Website telah dioptimasi untuk berbagai ukuran layar:

- **Desktop**: 1200px ke atas
- **Tablet**: 768px - 1199px
- **Mobile**: 320px - 767px

Semua komponen menggunakan Tailwind CSS responsive utilities untuk memastikan tampilan optimal di semua device.

## 🔧 Customization

### Mengubah Warna Tema
Edit file `tailwind.config.js`:
```javascript
theme: {
  extend: {
    colors: {
      'primary': '#ffffff',    // Warna utama
      'secondary': '#16a34a',  // Warna pendukung
    }
  },
}
```

### Menambah Section Baru
1. Buat file component baru di `resources/views/components/`
2. Include component di `resources/views/welcome.blade.php`
3. Rebuild assets dengan `npm run build`

### Mengubah Konten
- Edit file component yang sesuai di folder `resources/views/components/`
- Konten dapat diubah langsung di file Blade template
- Rebuild assets setelah perubahan

## 🛡️ Security Features

- CSRF protection untuk form
- XSS protection dengan Blade templating
- SQL injection protection dengan Eloquent ORM
- Security headers implementation
- File permission yang tepat
- Fake Login Page sebagai trap dan IP Finder dan Blocker

## 📈 Performance Optimization

- Asset minification dengan Vite
- CSS dan JavaScript optimization
- Image optimization ready
- Caching strategy implementation
- Database query optimization

## 🐛 Troubleshooting

### Masalah Umum

1. **Assets tidak load**
   ```bash
   npm run build
   php artisan view:clear
   ```

2. **Database connection error**
   - Cek konfigurasi .env
   - Pastikan database service berjalan
   - Verifikasi credentials database

3. **Permission error**
   - Set permission untuk folder storage/ dan bootstrap/cache/
   - Jalankan `php artisan storage:link`

### Support

Untuk troubleshooting lebih lanjut, lihat:
- File `tutorial_laragon_setup.md` section "Testing dan Troubleshooting"
- Laravel documentation: https://laravel.com/docs
- Tailwind CSS documentation: https://tailwindcss.com/docs

## 📞 Kontak

Website ini dibuat untuk SMP IT Bahrul Ulum Sahlaniyah dengan spesifikasi:
- Desain modular dan maintainable
- Tema warna putih dan hijau
- Fully responsive
- SEO-friendly
- Performance optimized

Untuk pertanyaan atau support lebih lanjut, silakan merujuk ke dokumentasi yang disediakan atau hubungi developer.

---

**Dibuat dengan ❤️ oleh Rizky menggunakan Laravel dan Tailwind CSS**

*Last updated: 13 Oktober 2025*

