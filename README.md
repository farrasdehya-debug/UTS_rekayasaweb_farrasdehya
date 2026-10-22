# Lensa Alam - Galeri Fotografi Alam Indonesia
### Proyek Ujian Tengah Semester (UTS) Rekayasa Web

Aplikasi web frontend berbasis **Laravel** dan **Bootstrap** yang menyajikan galeri kurasi karya fotografi alam, lanskap megah nusantara, keanekaragaman flora & fauna, serta fenomena geologis Indonesia.

Proyek ini dikembangkan dengan arsitektur container **Laravel Sail & Docker** sesuai petunjuk dan ketentuan penugasan UTS Rekayasa Web.

---

## 📌 Ketentuan Penugasan (NIM Digit Terakhir: 1)

| Spesifikasi | Ketentuan Soal | Implementasi Proyek |
| :--- | :--- | :--- |
| **Tema** | Galeri Fotografi Alam (NIM 1) | Galeri Foto Lanskap & Alam Nusantara |
| **Nama Tabel** | `photos` | Tabel `photos` via Laravel Migration |
| **Kolom Tabel** | `id`, `title`, `location`, `photographer`, `image`, `category`, `description` | Sesuai dengan tipe data yang tepat dan timestamps |
| **Penyimpanan Gambar** | `public/assets/images/` | Tersimpan di `public/assets/images/` resolusi tinggi |
| **Sumber Data** | Wajib berasal dari Seeder | `database/seeders/PhotoSeeder.php` |
| **Styling & Framework** | Blade Template + Bootstrap | Blade layout inheritance & Bootstrap 5.3 + Bootstrap Icons |
| **Struktur Minimal** | Halaman daftar, halaman detail, navigasi | Lengkap + fitur pencarian & filter kategori dinamis |

---

## 🚀 Fitur Utama Aplikasi

1. **Struktur Layout Blade Terpusat (`layouts/app.blade.php`)**:
   - Struktur navbar responsif dengan link aktif dan brand logo bertema alam.
   - Menggunakan Bootstrap 5.3 CDN dan Bootstrap Icons.
   - Tipografi elegan kombinasi *Playfair Display* & *Plus Jakarta Sans*.
   - Footer informatif dengan metadata penugasan.

2. **Halaman Daftar / Galeri Foto (`photos/index.blade.php`)**:
   - Hero banner bertema fotografi alam.
   - Fitur pencarian langsung berdasarkan judul, lokasi, deskripsi, atau fotografer.
   - Filter pill kategori interaktif (*Semua, Lanskap Pegunungan, Bahari & Lautan, Satwa Liar, Fenomena Alam, dsb.*).
   - Kartu Bootstrap responsif (*cards & grid*) dengan efek zoom halus, tag kategori, nama fotografer, pin lokasi, dan tombol menuju detail.
   - *Empty state* yang ramah jika pencarian tidak menemukan hasil.

3. **Halaman Detail Foto (`photos/show.blade.php`)**:
   - Navigasi breadcrumbs dinamis (*Beranda > Kategori > Judul Foto*).
   - Tampilan foto beresolusi tinggi dengan informasi path aset `public/assets/images/`.
   - Kartu info fotografer dan lokasi pengambilan gambar.
   - Deskripsi naratif lengkap karya foto.
   - Tabel metadata teknis foto (ID, nama file, kategori, tanggal kurasi).
   - Tombol kembali ke galeri dan filter kategori langsung.
   - Bagian **Koleksi Foto Terkait** dalam kategori yang sama.

4. **Halaman Tentang Galeri (`about.blade.php`)**:
   - Dokumentasi proyek UTS Rekayasa Web, tema NIM 1, dan daftar pemenuhan kriteria penilaian.

---

## 🛠️ Panduan Menjalankan Proyek dengan Laravel Sail

### 1. Menjalankan Container Docker

Pastikan Docker Desktop aktif di komputer Anda, lalu jalankan perintah:

```bash
./vendor/bin/sail up -d
```

> **Catatan Port:**
> Aplikasi web berjalan di: **`http://localhost:8000`**  
> Database MySQL berjalan di port: **`3306`**

### 2. Menjalankan Migration & Seeder

Jalankan perintah berikut untuk mengeksekusi migration tabel `photos` dan mengisikan data seeder:

```bash
./vendor/bin/sail artisan migrate --seed
```

Atau jika ingin me-refresh dan mengisi ulang:

```bash
./vendor/bin/sail artisan migrate:fresh --seed
```

### 3. Mengakses Aplikasi Web

Buka browser dan kunjungi:
- **Halaman Galeri (Daftar Foto):** [http://localhost:8000/](http://localhost:8000/)
- **Halaman Detail Foto:** [http://localhost:8000/photos/1](http://localhost:8000/photos/1)
- **Halaman Tentang Galeri:** [http://localhost:8000/about](http://localhost:8000/about)

### 4. Menjalankan Automated Test (Pengujian)

Aplikasi telah dilengkapi unit & feature test otomatis (PHPUnit). Untuk mengujinya:

```bash
./vendor/bin/sail artisan test
```

### 5. Menghentikan Container

Jika selesai menggunakan:

```bash
./vendor/bin/sail down
```

---

## 📁 Struktur Direktori Penting

```text
├── app/
│   ├── Http/Controllers/
│   │   └── PhotoController.php          # Logika daftar, detail, filter, & search
│   └── Models/
│       └── Photo.php                    # Model Eloquent Photo
├── database/
│   ├── migrations/
│   │   └── 2026_10_22_000001_create_photos_table.php  # Definisi tabel photos
│   └── seeders/
│       ├── DatabaseSeeder.php           # Pemanggil seeder utama
│       └── PhotoSeeder.php              # Data dummy galeri fotografi alam
├── public/
│   └── assets/
│       └── images/                      # Lokasi wajib penyimpanan file gambar
│           ├── bromo-sunrise.jpg
│           ├── raja-ampat.jpg
│           ├── komodo-dragon.jpg
│           ├── tumpak-sewu.jpg
│           ├── orangutan-sumatra.jpg
│           ├── kawah-ijen.jpg
│           ├── danau-toba.jpg
│           ├── hutan-de-djawatan.jpg
│           └── labuan-bajo-sunset.jpg
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php            # Master Blade layout & Bootstrap
│       ├── photos/
│       │   ├── index.blade.php          # View daftar foto (grid, cards, filter)
│       │   └── show.blade.php           # View detail foto & foto terkait
│       └── about.blade.php              # View informasi proyek UTS
├── routes/
│   └── web.php                          # Rute aplikasi web
├── tests/
│   └── Feature/
│       └── PhotoGalleryTest.php         # Automated feature test
└── compose.yaml                         # Konfigurasi Docker / Laravel Sail
```
