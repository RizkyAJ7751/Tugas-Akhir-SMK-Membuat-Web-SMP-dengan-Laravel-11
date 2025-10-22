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

## 📁 Struktur Project (Kurang Lebih)

```
Tugas-Akhir-SMK-Membuat-Web-SMP-dengan-Laravel-11/
├── app/
│   ├── Models/
│   │   ├── User.php
│   │   ├── Berita.php
│   │   ├── Guru.php
│   │   ├── KepalaSekolah.php
│   │   ├── KontakMasuk.php
│   │   ├── Program.php
│   │   └── Stats.php
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Frontend/
│   │   │   │   └── HomeController.php
│   │   │   ├── Admin/
│   │   │   │   ├── BeritaController.php
│   │   │   │   ├── GuruController.php
│   │   │   │   ├── KepalaSekolahController.php
│   │   │   │   ├── KontakMasukController.php
│   │   │   │   ├── ProgramController.php
│   │   │   │   ├── StatsController.php
│   │   │   │   └── FakeLoginController.php
│   │   │   └── Auth/
│   │   └── Middleware/
│   └── Console/
├── database/
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 0001_01_01_000001_create_cache_table.php
│   │   ├── 0001_01_01_000002_create_jobs_table.php
│   │   ├── 2025_08_27_140503_create_stats_table.php
│   │   ├── 2025_08_27_140517_create_kepala_sekolah_table.php
│   │   ├── 2025_08_27_140533_create_guru_table.php
│   │   ├── 2025_08_27_140552_create_berita_table.php
│   │   ├── 2025_08_27_140612_create_kontak_masuk_table.php
│   │   ├── 2025_09_01_014202_remove_gelar_from_kepala_sekolah_table.php
│   │   ├── 2025_09_08_124102_create_fake_logins_table.php
│   │   └── 2025_09_16_110200_create_programs_table.php
│   ├── seeders/
│   └── database.sqlite
├── resources/
│   ├── views/
│   │   ├── components/
│   │   │   ├── navbar.blade.php
│   │   │   ├── hero.blade.php
│   │   │   ├── about.blade.php
│   │   │   ├── programs.blade.php
│   │   │   ├── blog.blade.php
│   │   │   ├── blog-index.blade.php
│   │   │   ├── blog-show.blade.php
│   │   │   ├── teachers.blade.php
│   │   │   ├── teacher-index.blade.php
│   │   │   ├── contact.blade.php
│   │   │   └── footer.blade.php
│   │   ├── layouts/
│   │   │   ├── app.blade.php
│   │   │   ├── admin.blade.php
│   │   │   ├── guest.blade.php
│   │   │   └── navigation.blade.php
│   │   ├── admin/
│   │   ├── auth/
│   │   ├── profile/
│   │   ├── dashboard.blade.php
│   │   └── welcome.blade.php
│   ├── css/
│   │   └── app.css
│   └── js/
│       └── app.js
├── routes/
│   ├── web.php
│   ├── auth.php
│   └── console.php
├── config/
├── storage/
├── public/
│   └── build/ (compiled assets)
├── tests/
├── .env
├── .env.example
├── composer.json
├── package.json
├── tailwind.config.js
├── vite.config.js
├── phpunit.xml
└── README.md

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
3. **README.md** - Dokumentasi project ini

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
   
   7. **Jalankan Seeder**
   ```bash
   php artisan db:seed
   ```

8. **Jalankan server**
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
- Halaman Login pada projek ini berada di /test

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

