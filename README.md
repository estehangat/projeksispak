# Sistem Pakar Diagnosa Penyakit ISPA

Proyek ini merupakan implementasi **Sistem Pakar** untuk mendiagnosa penyakit **ISPA (Infeksi Saluran Pernapasan Akut)** menggunakan metode **Forward Chaining**. Sistem ini dikembangkan menggunakan framework **Laravel 12** dan didukung oleh antarmuka berbasis **Bootstrap**. Untuk kebutuhan server lokal, digunakan **XAMPP** sebagai server lokal (Apache & MySQL).

## 🔍 Deskripsi Singkat

Sistem ini bertujuan untuk membantu pengguna dalam mengenali gejala-gejala ISPA dan memberikan hasil diagnosis berdasarkan pengetahuan yang dimiliki sistem pakar. Metode **Forward Chaining** digunakan untuk menelusuri fakta-fakta dari gejala yang dipilih pengguna hingga menghasilkan suatu kesimpulan penyakit.

### ✨ Fitur Utama
- Input gejala-gejala ISPA.
- Proses inferensi menggunakan metode Forward Chaining.
- Hasil diagnosis dan saran penanganan awal.
- Manajemen data gejala, penyakit, dan basis aturan oleh admin.

---

## 🚀 Teknologi yang Digunakan

- **Laravel 12** – Backend dan routing sistem.
- **Bootstrap** – Desain antarmuka responsif.
- **XAMPP** – Server lokal (Apache dan MySQL).
- **PHP** dan **MySQL** – Pemrograman dan penyimpanan data.

---

## 💻 Cara Clone dan Menjalankan Proyek

1. **Clone Repository**
   ```bash
   git clone https://github.com/estehangat/projeksispak.git
   cd projeksispak
   ```

2. **Install Dependencies (PHP via Composer)**
   ```bash
   composer install
   ```

3. **Salin File .env**
   ```bash
   cp .env.example .env
   ```

4. **Generate App Key**
   ```bash
   php artisan key:generate
   ```

5. **Atur Konfigurasi Database**
   Edit file `.env` dan sesuaikan bagian berikut dengan setting database di XAMPP kamu:
   ```env
   DB_DATABASE=nama_database
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Jalankan Migrasi (Jika ada)**
   ```bash
   php artisan migrate
   ```

7. **Install Frontend Dependencies (Opsional jika menggunakan Vite, Bootstrap, dsb)**
   Pastikan kamu sudah menginstal **Node.js**, lalu jalankan:
   ```bash
   npm install
   npm run dev
   ```

8. **Jalankan Server Laravel**
   ```bash
   php artisan serve
   ```

9. **Akses Aplikasi**
   Buka browser dan kunjungi:
   ```
   http://localhost:8000
   ```

---

## 📂 Struktur Direktori Penting

- `app/` – Berisi logic dan model Laravel.
- `resources/views/` – Tampilan (UI) dengan Blade & Bootstrap.
- `routes/web.php` – Routing utama.
- `public/` – Folder yang diakses publik.

---

## 📬 Kontak

Untuk pertanyaan atau kontribusi, silakan hubungi melalui GitHub atau buat issue di repository ini.
