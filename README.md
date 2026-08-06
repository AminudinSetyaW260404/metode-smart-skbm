# 🎓 Sistem Pendukung Keputusan Penentuan Penerima Beasiswa Menggunakan Metode SMART

![Laravel](https://img.shields.io/badge/Laravel-12-red)
![PHP](https://img.shields.io/badge/PHP-8-blue)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-purple)
![MySQL](https://img.shields.io/badge/Database-MySQL-orange)
![License](https://img.shields.io/badge/License-Educational-green)

---

## 📖 Deskripsi

Sistem Pendukung Keputusan (SPK) Penentuan Penerima Beasiswa merupakan aplikasi berbasis web yang dirancang untuk membantu proses seleksi penerima beasiswa secara objektif, cepat, dan transparan menggunakan metode **SMART (Simple Multi Attribute Rating Technique)**.

Metode SMART digunakan untuk memberikan bobot pada setiap kriteria sehingga menghasilkan nilai akhir dan ranking calon penerima beasiswa berdasarkan hasil perhitungan.

---

# 👥 Anggota Kelompok

| NIM | Nama | Role |
|------|------|------|
|2200016151|Aminuddin Setya Wibawa|Project Manager & System Analyst|
|2200016152|Akbar Febrian Amar|UI/UX Designer|
|2200016148|Izzuddin Hammam Ulhaq|Front-End Developer|
|2200016025|M Subki|System & Database Designer|

---

# 🚀 Teknologi

- Laravel 12
- PHP 8
- Bootstrap 5
- MySQL
- HTML5
- CSS3
- JavaScript
- Visual Studio Code
- GitHub

---

# 📌 Metode SMART

Tahapan metode SMART yang digunakan pada sistem:

1. Menentukan alternatif (Mahasiswa)
2. Menentukan kriteria
3. Menentukan bobot
4. Normalisasi bobot
5. Menghitung nilai Utility
6. Menghitung nilai akhir
7. Menentukan ranking

### Rumus SMART

```
Vi = Σ (Wj × Uij)
```

Keterangan:

- **Vi** = Nilai Akhir
- **Wj** = Bobot Kriteria
- **Uij** = Nilai Utility

---

# 📋 Fitur Sistem

## Admin

- Login
- Dashboard
- Kelola Mahasiswa
- Kelola Kriteria
- Kelola Sub Kriteria
- Input Penilaian
- Perhitungan SMART
- Ranking Penerima Beasiswa
- Laporan

## Mahasiswa

- Login
- Mengisi Data Diri
- Upload Berkas
- Melihat Hasil Seleksi

---

# 📂 Struktur Project

```
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
tests/

artisan
composer.json
package.json
README.md
```

---

# 📊 Diagram Sistem

Project ini dilengkapi dengan:

- BPMN
- Use Case Diagram
- ERD
- Activity Diagram
- Flowchart
- Arsitektur Sistem

---

# 🖼 Screenshot Aplikasi

## Login

*(Tambahkan Screenshot Login)*

---

## Dashboard

*(Tambahkan Screenshot Dashboard)*

---

## Data Mahasiswa

*(Tambahkan Screenshot Data Mahasiswa)*

---

## Data Kriteria

*(Tambahkan Screenshot Data Kriteria)*

---

## Input Penilaian

*(Tambahkan Screenshot Penilaian)*

---

## Perhitungan SMART

*(Tambahkan Screenshot Perhitungan)*

---

## Ranking

*(Tambahkan Screenshot Ranking)*

---

# ⚙ Cara Instalasi

Clone Repository

```bash
git clone https://github.com/AminudinSetyaW260404/metode-smart-skbm.git
```

Masuk Folder

```bash
cd metode-smart-skbm
```

Install Dependency

```bash
composer install
```

Install Node

```bash
npm install
```

Copy File Environment

```bash
cp .env.example .env
```

Generate Key

```bash
php artisan key:generate
```

Migrasi Database

```bash
php artisan migrate
```

Jalankan Server

```bash
php artisan serve
```

Buka Browser

```
http://127.0.0.1:8000
```

---

# 📁 Dokumentasi

Folder **docs** berisi:

- Laporan Proyek
- PPT Presentasi
- BPMN
- Use Case
- ERD
- Activity Diagram
- Flowchart

---

# 📌 Tujuan Sistem

- Mempermudah proses seleksi beasiswa
- Mengurangi subjektivitas penilaian
- Menghasilkan keputusan yang cepat
- Memberikan hasil ranking berdasarkan metode SMART

---

# 📜 Lisensi

Project ini dibuat untuk memenuhi tugas mata kuliah **Sistem Pendukung Keputusan** Universitas Ahmad Dahlan.

---

## ⭐ Repository

Apabila repository ini bermanfaat, silakan berikan ⭐ pada repository GitHub ini.

---

**Universitas Ahmad Dahlan**  
Program Studi Sistem Informasi  
2026
