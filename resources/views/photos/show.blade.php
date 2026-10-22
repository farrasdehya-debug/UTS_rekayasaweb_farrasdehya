@extends('layouts.app')

@section('title', $photo->title . ' - Detail Galeri Fotografi Alam')

@section('content')
<div class="container py-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb py-2 px-3 bg-white rounded-3 shadow-sm border">
            <li class="breadcrumb-item">
                <a href="{{ route('photos.index') }}" class="text-decoration-none text-success">
                    <i class="bi bi-house-door me-1"></i> Beranda
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('photos.index', ['category' => $photo->category]) }}" class="text-decoration-none text-success">
                    {{ $photo->category }}
                </a>
            </li>
            <li class="breadcrumb-item active text-truncate" aria-current="page" style="max-width: 300px;">
                {{ $photo->title }}
            </li>
        </ol>
    </nav>

    <!-- Main Detail Section -->
    <div class="row g-4 mb-5">
        <!-- Photo Preview Column -->
        <div class="col-lg-7">
            <div class="card border-0 rounded-4 shadow-sm overflow-hidden bg-white">
                <div class="position-relative">
                    <img src="{{ asset('assets/images/' . $photo->image) }}" 
                         alt="{{ $photo->title }}" 
                         class="img-fluid w-100" 
                         style="max-height: 520px; object-fit: cover;">
                    <span class="category-badge">
                        <i class="bi bi-tag-fill me-1"></i> {{ $photo->category }}
                    </span>
                </div>
                <div class="card-footer bg-white border-0 py-3 px-4 d-flex align-items-center justify-content-between">
                    <span class="text-muted small">
                        <i class="bi bi-folder-check me-1 text-success"></i> Direktori: <code>public/assets/images/{{ $photo->image }}</code>
                    </span>
                    <a href="{{ asset('assets/images/' . $photo->image) }}" target="_blank" class="btn btn-sm btn-outline-forest">
                        <i class="bi bi-arrows-fullscreen me-1"></i> Buka Gambar Penuh
                    </a>
                </div>
            </div>
        </div>

        <!-- Photo Information Column -->
        <div class="col-lg-5">
            <div class="card border-0 rounded-4 shadow-sm bg-white p-4 h-100 d-flex flex-column">
                <div class="mb-3">
                    <span class="badge text-bg-success px-3 py-2 rounded-pill fw-semibold" style="background-color: var(--primary-forest) !important;">
                        {{ $photo->category }}
                    </span>
                </div>

                <h2 class="font-serif fw-bold text-dark mb-3" style="font-size: 1.85rem; line-height: 1.3;">
                    {{ $photo->title }}
                </h2>

                <!-- Location & Photographer Cards -->
                <div class="bg-light rounded-3 p-3 mb-3 border">
                    <div class="d-flex align-items-center mb-2 pb-2 border-bottom">
                        <div class="me-3 p-2 rounded-circle bg-white text-danger shadow-sm">
                            <i class="bi bi-geo-alt-fill fs-5"></i>
                        </div>
                        <div>
                            <small class="text-muted d-block">Lokasi Pengambilan</small>
                            <span class="fw-semibold text-dark">{{ $photo->location }}</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="me-3 p-2 rounded-circle bg-white shadow-sm" style="color: var(--primary-forest);">
                            <i class="bi bi-camera-fill fs-5"></i>
                        </div>
                        <div>
                            <small class="text-muted d-block">Fotografer</small>
                            <span class="fw-semibold text-dark">{{ $photo->photographer }}</span>
                        </div>
                    </div>
                </div>

                <!-- Narrative Description -->
                <div class="mb-4 flex-grow-1">
                    <h6 class="fw-bold text-dark text-uppercase small tracking-wide text-muted mb-2">
                        <i class="bi bi-card-text me-1"></i> Deskripsi Karya Foto
                    </h6>
                    <p class="text-secondary" style="line-height: 1.8;">
                        {{ $photo->description }}
                    </p>
                </div>

                <!-- Meta Table -->
                <div class="table-responsive mb-4">
                    <table class="table table-sm table-borderless text-muted small mb-0">
                        <tbody>
                            <tr>
                                <td class="fw-medium ps-0" style="width: 130px;">ID Foto</td>
                                <td class="text-dark fw-semibold">: #{{ str_pad($photo->id, 4, '0', STR_PAD_LEFT) }}</td>
                            </tr>
                            <tr>
                                <td class="fw-medium ps-0">File Gambar</td>
                                <td class="text-dark fw-semibold">: {{ $photo->image }}</td>
                            </tr>
                            <tr>
                                <td class="fw-medium ps-0">Kategori</td>
                                <td class="text-dark fw-semibold">: {{ $photo->category }}</td>
                            </tr>
                            <tr>
                                <td class="fw-medium ps-0">Tanggal Kurasi</td>
                                <td class="text-dark fw-semibold">: {{ $photo->created_at ? $photo->created_at->format('d M Y, H:i') : '-' }} WIB</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Navigation Action Buttons -->
                <div class="d-flex flex-wrap gap-2 pt-3 border-top mt-auto">
                    <a href="{{ route('photos.index') }}" class="btn btn-outline-forest flex-grow-1">
                        <i class="bi bi-arrow-left me-1"></i> Kembali ke Galeri
                    </a>
                    <a href="{{ route('photos.index', ['category' => $photo->category]) }}" class="btn btn-forest flex-grow-1">
                        <i class="bi bi-grid me-1"></i> Foto Kategori Ini
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Photos Section -->
    @if($relatedPhotos->count() > 0)
        <div class="pt-4 border-top">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="font-serif fw-bold text-dark mb-1">Karya Serupa dalam Kategori "{{ $photo->category }}"</h4>
                    <p class="text-muted small mb-0">Jelajahi keindahan lain dari sudut pandang yang senada</p>
                </div>
                <a href="{{ route('photos.index', ['category' => $photo->category]) }}" class="btn btn-sm btn-outline-forest rounded-pill">
                    Lihat Semua ({{ $photo->category }})
                </a>
            </div>

            <div class="row g-4">
                @foreach($relatedPhotos as $related)
                    <div class="col-12 col-md-4">
                        <div class="card photo-card h-100">
                            <div class="photo-card-img-wrapper" style="height: 200px;">
                                <img src="{{ asset('assets/images/' . $related->image) }}" alt="{{ $related->title }}">
                                <span class="category-badge">
                                    {{ $related->category }}
                                </span>
                            </div>
                            <div class="card-body p-3">
                                <h6 class="font-serif fw-bold mb-1">
                                    <a href="{{ route('photos.show', $related->id) }}" class="text-decoration-none text-dark stretched-link">
                                        {{ $related->title }}
                                    </a>
                                </h6>
                                <p class="text-muted small mb-2 text-truncate">
                                    <i class="bi bi-geo-alt me-1 text-danger"></i> {{ $related->location }}
                                </p>
                                <div class="d-flex justify-content-between align-items-center pt-2 border-top small text-muted">
                                    <span><i class="bi bi-camera me-1"></i> {{ $related->photographer }}</span>
                                    <span class="text-success fw-medium">Lihat &rarr;</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection

