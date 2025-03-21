# Laravel Social API

## 📌 Deskripsi
Ini adalah proyek backend **Laravel 11** untuk aplikasi media sosial berbasis **REST API**. Proyek ini mencakup fitur CRUD untuk postingan, komentar, like, serta sistem autentikasi menggunakan **JWT (JSON Web Token)**.

---

## 🎯 Fitur Utama
- **CRUD Postingan**: Membuat, membaca, memperbarui, dan menghapus postingan.
- **Komentar**: Menambahkan dan menghapus komentar pada postingan.
- **Likes**: Memberikan dan menghapus like pada postingan.
- **Pesan**: Mengirim dan mengelola pesan antar pengguna.
- **Autentikasi JWT**: Sistem login & registrasi dengan keamanan berbasis token.
- **Relasi Data & Middleware**: Optimalisasi performa API dengan middleware.

---

## 🛠️ Teknologi yang Digunakan
- **Laravel 11** - Framework PHP untuk backend.
- **MySQL** - Database management.
- **JWT (JSON Web Token)** - Autentikasi API.
- **Postman** - Pengujian API.

---

## 📚 Struktur Proyek
```
laravel-social-api/
├── app/
├── bootstrap/
├── config/
├── database/
│   ├── migrations/
│   ├── seeders/
├── routes/
│   ├── api.php
│   ├── web.php
├── .env.example
├── composer.json
├── README.md
```

---

## 🚀 Instalasi & Menjalankan Proyek
### 1️⃣ **Clone Repository**
```bash
git clone https://github.com/username/laravel-social-api.git
cd laravel-social-api
```

### 2️⃣ **Install Dependency**
```bash
composer install
```

### 3️⃣ **Konfigurasi Environment**
Buat file `.env` berdasarkan `.env.example` dan sesuaikan konfigurasi database.
```bash
cp .env.example .env
```

### 4️⃣ **Generate Key & Jalankan Migration**
```bash
php artisan key:generate
php artisan migrate --seed
```

### 5️⃣ **Jalankan Server**
```bash
php artisan serve
```
Akses API di `http://127.0.0.1:8000/api`

---

## 📌 API Endpoints
Untuk melihat daftar lengkap endpoint API, silakan import file **Social Media API.postman_collection.json** ke Postman.

---

## 🤝 Kontribusi
Jika ingin berkontribusi, silakan buat **pull request** atau buka **issue** baru di repository ini.

---

## 🐝 Lisensi
Proyek ini menggunakan lisensi [lisensi MIT](https://opensource.org/licenses/MIT).

---

Terima kasih sudah mampir! 🚀
