# Lensa Alam - Galeri Fotografi Alam Indonesia

Aplikasi web galeri fotografi alam yang menyajikan kurasi foto lanskap pegunungan, pesona bahari, satwa liar, dan fenomena geologis nusantara. Dibangun menggunakan **Laravel** dan **Bootstrap 5**, aplikasi ini mengedepankan desain visual modern yang responsif, bersih, dan berfokus pada pengalaman eksplorasi foto.

---

## 🎨 Fungsi & Tampilan Antarmuka (User Interface)

### 1. Struktur Layout & Navigasi Global (`layouts/app.blade.php`)
- **Responsive Sticky Navbar**: Navigasi atas yang melayang dengan efek *backdrop blur (glassmorphism)* bertema warna alam (*deep forest green*).
- **Indikator Halaman Aktif**: Menu yang sedang dikunjungi diberi sorotan (*highlight*) secara otomatis.
- **Identitas Visual Galeri**: Tipografi elegan menggunakan kombinasi font *Plus Jakarta Sans* untuk keterbacaan teks dan *Playfair Display* untuk judul editorial fotografi.
- **Footer Responsif**: Bagian bawah halaman memuat ringkasan identitas galeri dan hak cipta.

---

### 2. Halaman Galeri & Katalog Foto (`photos/index.blade.php`)
- **Hero Banner Imersif**: Bagian pembuka dengan latar belakang visual alam dan pengantar kurasi fotografi.
- **Pencarian Real-Time (Search Bar)**: Formulir pencarian cepat untuk memfilter foto berdasarkan:
  - Judul foto
  - Lokasi pengambilan gambar
  - Nama fotografer
  - Kata kunci dalam deskripsi
  - Dilengkapi tombol reset/clear instan.
- **Filter Kategori (Category Pills)**: Filter sekali klik untuk menyortir foto berdasarkan kategori:
  - *Semua*
  - *Lanskap Pegunungan*
  - *Bahari & Lautan*
  - *Satwa Liar*
  - *Lanskap Air*
  - *Hutan & Flora*
  - *Fenomena Alam*
- **Grid Kartu Foto Responsif (Cards Grid)**:
  - Tata letak kartu 3 kolom (desktop), 2 kolom (tablet), dan 1 kolom (mobile).
  - Efek hover interaktif dengan *smooth image zoom* dan bayangan elevasi (*card shadow*).
  - Badge kategori melayang (*floating badge*) di atas gambar.
  - Ringkasan informasi: judul, ikon penanda lokasi, fotografer, cuplikan deskripsi, dan tombol navigasi ke halaman detail.
- **Empty State**: Tampilan ilustrasi dan pesan informatif yang ramah jika pencarian atau filter kategori tidak menemukan hasil foto.

---

### 3. Halaman Detail Foto (`photos/show.blade.php`)
- **Navigasi Breadcrumbs**: Jalur navigasi terstruktur (*Beranda > Kategori > Judul Foto*) yang mempermudah pengguna kembali ke level halaman sebelumnya.
- **Tampilan Foto Resolusi Tinggi**: Preview foto berukuran besar dengan tombol aksi *"Buka Gambar Penuh"*.
- **Informasi Lokasi & Fotografer**: Kartu informasi terpisah dengan ikon visual untuk memperjelas lokasi pengambilan dan nama fotografer.
- **Deskripsi Naratif Karya**: Ulasan mendalam mengenai cerita dan latar belakang di balik momen pemotretan.
- **Tabel Metadata Teknis**: Rincian teknis meliputi:
  - ID Foto
  - Nama file aset gambar
  - Kategori alam
  - Waktu kurasi / unggah
- **Aksi Navigasi Cepat**: Tombol kembali ke galeri utama dan tombol untuk menjelajahi karya lain dalam kategori yang sama.
- **Koleksi Foto Terkait (Related Photos)**: Rekomendasi otomatis 3 foto lain yang berada dalam satu kategori dengan foto yang sedang dilihat.

---

### 4. Halaman Tentang Galeri (`about.blade.php`)
- **Ringkasan Profil**: Pengenalan mengenai tujuan kurasi fotografi Lensa Alam Indonesia.
- **Statistik Galeri**: Tiga kartu indikator statistik yang menampilkan:
  - Jumlah total foto terkurasi
  - Jumlah variasi kategori alam
  - Jumlah fotografer yang berkontribusi
- **Tombol Pintas**: Akses langsung kembali ke halaman galeri utama.

---

## 📁 Struktur Direktori & Folder

```text
UTS_rekayasaweb_farrasdehya/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── Controller.php
│   │       └── PhotoController.php          # Mengatur logika katalog, detail, pencarian, dan filter
│   └── Models/
│       └── Photo.php                        # Model Eloquent untuk data foto
│
├── database/
│   ├── migrations/
│   │   └── 2026_10_22_000001_create_photos_table.php  # Skema tabel foto (judul, lokasi, fotografer, gambar, dsb.)
│   └── seeders/
│       ├── DatabaseSeeder.php               # Pemanggil seeder utama
│       └── PhotoSeeder.php                  # Data awal (dummy) 9 koleksi foto alam lengkap dengan metadata
│
├── public/
│   ├── assets/
│   │   └── images/                          # Direktori penyimpanan file gambar aset foto alam
│   │       ├── bromo-sunrise.jpg            # Foto Lanskap Gunung Bromo
│   │       ├── raja-ampat.jpg               # Foto Bahari Kepulauan Misool Raja Ampat
│   │       ├── komodo-dragon.jpg            # Foto Satwa Liar Komodo
│   │       ├── tumpak-sewu.jpg              # Foto Lanskap Air Terjun Tumpak Sewu
│   │       ├── orangutan-sumatra.jpg        # Foto Satwa Liar Orangutan Sumatra
│   │       ├── kawah-ijen.jpg               # Foto Fenomena Alam Kawah Ijen
│   │       ├── danau-toba.jpg               # Foto Lanskap Danau Toba
│   │       ├── hutan-de-djawatan.jpg        # Foto Hutan Trembesi De Djawatan
│   │       └── labuan-bajo-sunset.jpg       # Foto Bahari Senja Labuan Bajo
│   └── index.php                            # Entry point aplikasi Laravel
│
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php                # Master template: Navbar Bootstrap, Head, Google Fonts, & Footer
│       ├── photos/
│       │   ├── index.blade.php              # View katalog: Hero section, search, filter pill, grid card
│       │   └── show.blade.php               # View detail foto: Breadcrumbs, preview besar, metadata, foto terkait
│       └── about.blade.php                  # View informasi tentang galeri & indikator statistik
│
├── routes/
│   └── web.php                              # Definisi routing web (/, /photos/{photo}, /about)
│
├── tests/
│   └── Feature/
│       └── PhotoGalleryTest.php             # Automated feature tests untuk validasi seluruh endpoint UI
│
├── compose.yaml                             # Konfigurasi container Docker & Laravel Sail (App + MySQL)
└── .env                                     # Konfigurasi environment (PORT, DB, APP_NAME)
```

---

## 🚀 Panduan Menjalankan Aplikasi

Aplikasi berjalan di lingkungan container menggunakan **Laravel Sail** (Docker).

### 1. Menyalakan Container
Pastikan Docker Desktop aktif di komputer Anda, kemudian jalankan:

```bash
./vendor/bin/sail up -d
```

Aplikasi dapat diakses melalui browser di:
- **Galeri Foto:** [http://localhost:8000](http://localhost:8000)
- **Detail Foto:** [http://localhost:8000/photos/1](http://localhost:8000/photos/1)
- **Tentang Galeri:** [http://localhost:8000/about](http://localhost:8000/about)

### 2. Migrasi Database & Seeder
Untuk membuat tabel dan menginjeksi data foto:

```bash
./vendor/bin/sail artisan migrate --seed
```

### 3. Pengujian Otomatis (Testing)
Untuk memastikan seluruh rute UI dan aset berjalan normal:

```bash
./vendor/bin/sail artisan test
```

### 4. Menghentikan Container
Jika selesai menggunakan aplikasi:

```bash
./vendor/bin/sail down
```
