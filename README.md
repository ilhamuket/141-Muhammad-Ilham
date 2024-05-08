## Aplikasi Web Berita Monolith Laravel


![Logo](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg)

### Pengenalan
Assalamualaikum, nama saya Muhammad Ilham, peserta nomor 141 dalam kelas Fullstack Developer, grup 6. Saya senang memperkenalkan kepada Anda proyek Aplikasi Web Berita Monolith Laravel yang telah saya buat. Proyek ini adalah aplikasi web berita full-stack yang dibangun menggunakan framework Laravel.

### Fitur-fitur
- **Autentikasi Pengguna**: Pengguna dapat mendaftar, masuk, dan mengelola profil mereka.
- **Manajemen Artikel**: Pengguna yang terautentikasi dapat membuat, mengedit, dan menghapus artikel.
- **Manajemen Kategori**: Artikel dikelompokkan untuk pengorganisasian yang lebih baik.
- **Panel Admin**: Administrator memiliki akses untuk mengelola pengguna, artikel, dan kategori.


## Installation

Kloning repositori ini ke mesin lokal Anda.

```bash
  git clone https://github.com/ilhamuket/141-Muhammad-Ilham.git
```

Masuk ke direktori proyek.

```bash
  cd 141-Muhammad-Ilham
```

Instal dependensi menggunakan Composer.

```bash
  composer install
```

Instal Laravel Breeze (saya butuh untuk auth).

```bash
  composer require laravel/breeze --dev

  php artisan breeze:install
```

Salin file `.env.example` menjadi `.env`.

```bash
  cp .env.example .env
```

Buatlah kunci aplikasi.

```bash
  php artisan key:generate
```
    
Konfigurasikan koneksi basis data Anda di file `.env`.

```bash
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=your_database
  DB_USERNAME=your_username
  DB_PASSWORD=your_password
```

Migrasikan basis data.


```bash
  php artisan migrate
```

Jalankan Aplikasi


```bash
  npm install
  npm run dev
  php artisan serve
```
### Penggunaan
    1. Buka browser Anda dan arahkan ke `http://localhost:8000`.
    2. Daftar akun baru atau masuk dengan kredensial yang sudah ada.
    3. Jelajahi artikel, kategori, admin.
    4. Jika Anda memiliki hak akses admin, akses panel admin untuk mengelola pengguna, artikel, dan kategori.

### Kontribusi
Kontribusi sangat dipersilakan! Jika Anda ingin berkontribusi pada proyek ini, silakan fork repositori dan buat pull request dengan perubahan Anda.

### Lisensi
Belum ada


## Authors

- [@ilhamuket](https://www.github.com/ilhamuket)

