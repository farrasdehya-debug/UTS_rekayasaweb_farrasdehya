@extends('layouts.app')

@section('title', 'Tentang Galeri Fotografi Alam - UTS Rekayasa Web')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <!-- Header Card -->
            <div class="card border-0 rounded-4 shadow-sm bg-white p-4 p-md-5 mb-4 text-center">
                <span class="badge rounded-pill px-3 py-2 mx-auto mb-3" style="background-color: var(--primary-light); color: var(--primary-forest); font-weight: 600;">
                    UTS REKAYASA WEB
                </span>
                <h1 class="font-serif fw-bold text-dark display-6 mb-3">
                    Lensa Alam: Galeri Fotografi Alam Indonesia
                </h1>
                <p class="lead text-secondary mx-auto mb-4" style="max-width: 650px;">
                    Aplikasi web frontend berbasis Laravel dan Bootstrap yang menyajikan kurasi karya fotografi lanskap nusantara, keanekaragaman flora & fauna, serta fenomena geologis Indonesia.
                </p>

                <!-- Stats Counters -->
                <div class="row g-3 text-center pt-3 border-top">
                    <div class="col-4">
                        <div class="p-3 rounded-3 bg-light">
                            <h3 class="fw-bold text-success mb-0">{{ $totalPhotos }}</h3>
                            <small class="text-muted">Foto Terkurasi</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="p-3 rounded-3 bg-light">
                            <h3 class="fw-bold text-success mb-0">{{ $categoriesCount }}</h3>
                            <small class="text-muted">Kategori Alam</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="p-3 rounded-3 bg-light">
                            <h3 class="fw-bold text-success mb-0">{{ $photographersCount }}</h3>
                            <small class="text-muted">Fotografer</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail Spesifikasi Proyek -->
            <div class="card border-0 rounded-4 shadow-sm bg-white p-4 p-md-5 mb-4">
                <h4 class="font-serif fw-bold text-dark mb-4 pb-2 border-bottom">
                    <i class="bi bi-card-checklist text-success me-2"></i> Ketentuan & Pemenuhan Tugas UTS
                </h4>

                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <div class="border rounded-3 p-3 h-100 bg-light">
                            <h6 class="fw-bold text-dark mb-2">
                                <i class="bi bi-tag-fill text-success me-1"></i> Tema Penugasan (NIM 1)
                            </h6>
                            <ul class="list-unstyled small text-secondary mb-0">
                                <li><strong>Tema:</strong> Galeri Fotografi Alam</li>
                                <li><strong>Nama Tabel:</strong> <code>photos</code></li>
                                <li><strong>Kolom:</strong> <code>id</code>, <code>title</code>, <code>location</code>, <code>photographer</code>, <code>image</code>, <code>category</code>, <code>description</code>, <code>timestamps</code></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="border rounded-3 p-3 h-100 bg-light">
                            <h6 class="fw-bold text-dark mb-2">
                                <i class="bi bi-gear-fill text-success me-1"></i> Arsitektur & Teknologi
                            </h6>
                            <ul class="list-unstyled small text-secondary mb-0">
                                <li><strong>Framework:</strong> Laravel (PHP 8.4/8.5)</li>
                                <li><strong>Containerization:</strong> Docker & Laravel Sail</li>
                                <li><strong>Database:</strong> MySQL 8.4 Container</li>
                                <li><strong>Frontend:</strong> Blade Template Engine & Bootstrap 5</li>
                                <li><strong>Penyimpanan Foto:</strong> <code>public/assets/images/</code></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <h5 class="fw-bold text-dark mb-3">Fitur yang Disediakan</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-3">
                            <div class="p-2 rounded-circle bg-success-subtle text-success">
                                <i class="bi bi-check-lg"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Layout Template Bersarang</h6>
                                <p class="small text-muted mb-0">Menggunakan <code>layouts/app.blade.php</code> sebagai kerangka utama agar struktur navigasi dan footer tidak berulang.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-3">
                            <div class="p-2 rounded-circle bg-success-subtle text-success">
                                <i class="bi bi-check-lg"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Halaman Katalog & Filter</h6>
                                <p class="small text-muted mb-0">Tampilan grid cards Bootstrap responsif dilengkapi fitur pencarian dinamis dan filter kategori.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-3">
                            <div class="p-2 rounded-circle bg-success-subtle text-success">
                                <i class="bi bi-check-lg"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Halaman Detail Lengkap</h6>
                                <p class="small text-muted mb-0">Menampilkan foto ukuran penuh, informasi fotografer, lokasi, deskripsi naratif, dan rekomendasi foto sejenis.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-3">
                            <div class="p-2 rounded-circle bg-success-subtle text-success">
                                <i class="bi bi-check-lg"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Database Seeder Komprehensif</h6>
                                <p class="small text-muted mb-0">Data foto dan metadata diinjeksikan secara otomatis melalui <code>PhotoSeeder</code>.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center pt-4 mt-4 border-top">
                    <a href="{{ route('photos.index') }}" class="btn btn-forest px-4 py-2">
                        <i class="bi bi-arrow-left me-1"></i> Jelajahi Koleksi Galeri
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
