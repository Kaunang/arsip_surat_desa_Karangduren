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
<img width="1365" height="720" alt="arsip" src="https://github.com/user-attachments/assets/c9dd2390-30b5-4d8d-9c0a-3ba8b066301f" />

- **Tambah Arsip**
<img width="1365" height="716" alt="tambah arsip" src="https://github.com/user-attachments/assets/f57dd906-f54b-4681-b977-94a818cd2f79" />

- **Lihat Arsip**
<img width="1365" height="717" alt="lihat arsip" src="https://github.com/user-attachments/assets/c2f16d22-8375-4a99-8b73-221d995a6a62" />

- **Hapus Arsip**
<img width="1365" height="717" alt="hapus arsip" src="https://github.com/user-attachments/assets/a209e8b1-1d83-4d91-a4ba-3675c1d94e48" />

- **Cari Arsip**
<img width="1365" height="719" alt="cari arsip surat" src="https://github.com/user-attachments/assets/d005898d-7bed-421e-8a56-ab20966c06d0" />

---

### Kategori Surat
- **Halaman Kategori**
<img width="1365" height="720" alt="kategori" src="https://github.com/user-attachments/assets/8153da5f-e7ab-4f46-8aa9-487c53c84e8d" />

- **Tambah Kategori**
  <img width="1365" height="720" alt="tambah kategori" src="https://github.com/user-attachments/assets/9f2ef08e-76bb-415a-b58c-db3b4e5bc5db" />

- **Edit Kategori**
<img width="1365" height="717" alt="edit kategori" src="https://github.com/user-attachments/assets/45ea1689-1f09-4e75-9075-d4e73db6216a" />

- **Hapus Kategori**
<img width="1365" height="718" alt="hapus kategori" src="https://github.com/user-attachments/assets/d3d1c6a4-b3e9-4e4d-b434-f5123863a909" />

- **Cari Kategori**
<img width="1365" height="718" alt="cari kategori" src="https://github.com/user-attachments/assets/b86ee72d-8530-4635-b35c-54a8d4e9dbab" />

---

### About
- **Halaman About**
<img width="1365" height="720" alt="about" src="https://github.com/user-attachments/assets/a08a4e3d-75bc-4b6c-8621-795e9d3f5287" />
