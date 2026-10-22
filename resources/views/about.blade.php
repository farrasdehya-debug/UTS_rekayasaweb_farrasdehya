@extends('layouts.app')

@section('title', 'Tentang Galeri Fotografi Alam')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Header Card -->
            <div class="card border-0 rounded-4 shadow-sm bg-white p-4 p-md-5 text-center">
                <span class="badge rounded-pill px-3 py-2 mx-auto mb-3" style="background-color: var(--primary-light); color: var(--primary-forest); font-weight: 600;">
                    GALERI FOTOGRAFI ALAM
                </span>
                <h1 class="font-serif fw-bold text-dark display-6 mb-3">
                    Lensa Alam Indonesia
                </h1>
                <p class="lead text-secondary mx-auto mb-4" style="max-width: 600px;">
                    Aplikasi web kurasi karya fotografi lanskap nusantara, keindahan bahari, pesona pegunungan, dan keanekaragaman hayati Indonesia.
                </p>

                <!-- Stats Counters -->
                <div class="row g-3 text-center pt-3 border-top mb-4">
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

                <div class="pt-2">
                    <a href="{{ route('photos.index') }}" class="btn btn-forest px-4 py-2">
                        <i class="bi bi-arrow-left me-1"></i> Kembali ke Galeri Foto
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
