# 📄 Aplikasi Arsip Surat Desa Karangduren

## 🎯 Tujuan
Aplikasi ini dibuat untuk membantu perangkat desa Karangduren dalam mengarsipkan surat-surat resmi yang pernah dibuat.  
Dengan adanya aplikasi ini, surat dapat dikelola dengan lebih rapi, mudah dicari, dan terdokumentasi dengan baik.

---

## ✨ Fitur
- CRUD **Kategori Surat** (Tambah, Edit, Hapus, Lihat)  
- CRUD **Arsip Surat** (Tambah, Edit, Hapus, Lihat)  
- Unggah file **PDF** untuk setiap surat  
---

## 🚀 Cara Menjalankan

### 1. Clone / Download Project
- **Clone via Git**
  ```bash
  git clone https://github.com/Kaunang/arsip_surat_desa_Karangduren.git
  cd arsip_surat_desa_Karangduren
  ```
- **Atau Download ZIP**
  - Download file ZIP dari repository.
  - Extract file hasil download.

### 2. Konfigurasi Database
- Import file `arsip_surat.sql` langsung ke MySQL/MariaDB:
  ```bash
  mysql -u root -p < arsip_surat.sql
- Atau gunakan aplikasi seperti SQLyog

### 3. Setup Environment
- Ubah nama file **.env.example** menjadi **.env**  
  (bisa menggunakan perintah berikut di terminal:)
  ```bash
  cp .env.example .env
- Ubah konfigurasi database di file `.env` sesuai pengaturan lokal:
  ```env
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=arsip_surat
  DB_USERNAME=root
  DB_PASSWORD=
  ```

### 4. Install Dependency
Jalankan perintah:
```bash
composer install
```

### 5. Storage & Key
```bash
php artisan storage:link
php artisan key:generate
```
Jika `storage:link` error, jalankan ulang:
```bash
composer install
php artisan storage:link
```

### 6. Menjalankan Aplikasi
```bash
php artisan serve
```

Akses aplikasi di browser:  
👉 [http://127.0.0.1:8000/arsip](http://127.0.0.1:8000/arsip)

---
## 📸 Screenshot Aplikasi

### Arsip Surat
- **Halaman Arsip**

- **Tambah Arsip**

- **Lihat Arsip**

- **Hapus Arsip**

- **Cari Arsip**

---

### Kategori Surat
- **Halaman Kategori**

- **Tambah Kategori**
- **Edit Kategori**

- **Hapus Kategori**

- **Cari Kategori**

---

### About
- **Halaman About**
