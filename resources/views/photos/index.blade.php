@extends('layouts.app')

@section('title', 'Lensa Alam - Eksplorasi Galeri Fotografi Alam Indonesia')

@section('content')
<!-- Hero Banner -->
<section class="hero-banner">
    <div class="container text-center py-4">
        <span class="badge rounded-pill px-3 py-2 mb-3" style="background: rgba(82, 183, 136, 0.25); color: #d8f3dc; border: 1px solid rgba(82, 183, 136, 0.4);">
            <i class="bi bi-camera me-1"></i> Galeri Fotografi Alam &bull; NIM 1
        </span>
        <h1 class="display-4 font-serif fw-bold mb-3">Keindahan Alam Terabadikan</h1>
        <p class="lead mx-auto mb-4" style="max-width: 680px; color: #d8f3dc; opacity: 0.95;">
            Koleksi karya fotografi lanskap megah, pesona bahari, fenomena vulkanik, dan keanekaragaman satwa liar nusantara melalui sudut pandang lensa para fotografer alam.
        </p>

        <!-- Search Bar -->
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <form action="{{ route('photos.index') }}" method="GET" class="d-flex shadow-lg rounded-pill bg-white p-2">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <div class="input-group">
                        <span class="input-group-text bg-transparent border-0 text-muted ps-3">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" name="search" class="form-control border-0 shadow-none" placeholder="Cari judul, lokasi, atau fotografer..." value="{{ $search ?? '' }}">
                        @if($search)
                            <a href="{{ route('photos.index', ['category' => request('category')]) }}" class="btn btn-link text-muted text-decoration-none d-flex align-items-center">
                                <i class="bi bi-x-circle-fill"></i>
                            </a>
                        @endif
                        <button class="btn btn-forest rounded-pill px-4" type="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="container pb-5" id="katalog">
    <!-- Category Filter Bar -->
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4 pb-2 border-bottom">
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('photos.index', array_filter(['search' => $search])) }}" 
               class="filter-pill {{ empty($category) || $category === 'all' ? 'active' : '' }}">
                <i class="bi bi-collection me-1"></i> Semua ({{ $totalPhotos }})
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('photos.index', array_filter(['category' => $cat, 'search' => $search])) }}" 
                   class="filter-pill {{ $category === $cat ? 'active' : '' }}">
                    {{ $cat }}
                </a>
            @endforeach
        </div>

        <div class="text-muted small">
            Menampilkan <strong>{{ $photos->count() }}</strong> foto
            @if($search)
                untuk pencarian "<em>{{ $search }}</em>"
            @endif
        </div>
    </div>

    <!-- Photos Grid -->
    @if($photos->count() > 0)
        <div class="row g-4">
            @foreach($photos as $photo)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card photo-card h-100">
                        <div class="photo-card-img-wrapper">
                            <img src="{{ asset('assets/images/' . $photo->image) }}" alt="{{ $photo->title }}" loading="lazy">
                            <span class="category-badge">
                                <i class="bi bi-tag-fill me-1"></i> {{ $photo->category }}
                            </span>
                        </div>
                        <div class="card-body d-flex flex-column p-4">
                            <h5 class="card-title font-serif fw-bold mb-2 text-dark" style="font-size: 1.2rem; line-height: 1.4;">
                                <a href="{{ route('photos.show', $photo->id) }}" class="text-decoration-none text-dark stretched-link">
                                    {{ $photo->title }}
                                </a>
                            </h5>

                            <div class="d-flex align-items-center text-muted small mb-2">
                                <i class="bi bi-geo-alt-fill text-danger me-1 flex-shrink-0"></i>
                                <span class="text-truncate">{{ $photo->location }}</span>
                            </div>

                            <div class="d-flex align-items-center text-muted small mb-3">
                                <i class="bi bi-camera me-1 flex-shrink-0" style="color: var(--primary-emerald)"></i>
                                <span class="fw-medium text-dark">{{ $photo->photographer }}</span>
                            </div>

                            <p class="card-text text-secondary small flex-grow-1" style="line-height: 1.6;">
                                {{ Str::limit($photo->description, 110, '...') }}
                            </p>

                            <div class="pt-3 border-top d-flex align-items-center justify-content-between mt-auto">
                                <span class="text-muted small">
                                    <i class="bi bi-image me-1"></i> Resolusi HD
                                </span>
                                <span class="fw-semibold text-success small d-flex align-items-center gap-1">
                                    Detail <i class="bi bi-arrow-right"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Empty State -->
        <div class="text-center py-5 my-5">
            <div class="mb-3">
                <i class="bi bi-camera-reels text-muted" style="font-size: 4rem;"></i>
            </div>
            <h4 class="fw-bold text-dark mb-2">Tidak Ada Foto Ditemukan</h4>
            <p class="text-muted mx-auto mb-4" style="max-width: 450px;">
                Maaf, tidak ada karya fotografi yang cocok dengan kata kunci atau kategori yang Anda pilih. Silakan coba pencarian lain.
            </p>
            <a href="{{ route('photos.index') }}" class="btn btn-forest">
                <i class="bi bi-arrow-repeat me-1"></i> Reset Pencarian
            </a>
        </div>
    @endif
</section>
@endsection

