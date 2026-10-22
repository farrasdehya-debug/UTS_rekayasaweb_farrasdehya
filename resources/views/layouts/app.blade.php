<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Lensa Alam - Galeri Fotografi Alam Indonesia')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,600;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary-forest: #1b4332;
            --primary-deep: #081c15;
            --primary-emerald: #2d6a4f;
            --primary-sage: #52b788;
            --primary-light: #d8f3dc;
            --earth-sand: #f8f9fa;
            --text-dark: #1f2937;
            --text-muted: #6b7280;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-dark);
            background-color: #f4f7f5;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .font-serif {
            font-family: 'Playfair Display', serif;
        }

        /* Navbar Styling */
        .navbar-custom {
            background: rgba(8, 28, 21, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(82, 183, 136, 0.2);
            transition: all 0.3s ease;
        }

        .navbar-custom .navbar-brand {
            color: #ffffff;
            font-weight: 700;
            font-size: 1.35rem;
            letter-spacing: -0.5px;
        }

        .navbar-custom .navbar-brand i {
            color: var(--primary-sage);
        }

        .navbar-custom .nav-link {
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .navbar-custom .nav-link:hover,
        .navbar-custom .nav-link.active {
            color: #ffffff;
            background: rgba(82, 183, 136, 0.18);
        }

        /* Card Photo Styling */
        .photo-card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            background: #ffffff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .photo-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 32px rgba(27, 67, 50, 0.15);
        }

        .photo-card-img-wrapper {
            position: relative;
            overflow: hidden;
            height: 250px;
            background: #e5e7eb;
        }

        .photo-card-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .photo-card:hover .photo-card-img-wrapper img {
            transform: scale(1.06);
        }

        .category-badge {
            position: absolute;
            top: 14px;
            left: 14px;
            background: rgba(8, 28, 21, 0.85);
            backdrop-filter: blur(6px);
            color: var(--primary-light);
            font-size: 0.75rem;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 50px;
            border: 1px solid rgba(82, 183, 136, 0.3);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-forest {
            background-color: var(--primary-forest);
            color: #ffffff;
            font-weight: 600;
            border-radius: 10px;
            padding: 0.55rem 1.25rem;
            border: 1px solid var(--primary-forest);
            transition: all 0.2s ease;
        }

        .btn-forest:hover {
            background-color: var(--primary-emerald);
            color: #ffffff;
            border-color: var(--primary-emerald);
            box-shadow: 0 4px 12px rgba(45, 106, 79, 0.3);
        }

        .btn-outline-forest {
            border: 1.5px solid var(--primary-forest);
            color: var(--primary-forest);
            font-weight: 600;
            border-radius: 10px;
            padding: 0.55rem 1.25rem;
            transition: all 0.2s ease;
        }

        .btn-outline-forest:hover {
            background-color: var(--primary-forest);
            color: #ffffff;
        }

        /* Hero Banner */
        .hero-banner {
            background: linear-gradient(135deg, rgba(8, 28, 21, 0.92) 0%, rgba(27, 67, 50, 0.85) 100%),
                        url('{{ asset("assets/images/bromo-sunrise.jpg") }}') center/cover no-repeat;
            color: white;
            padding: 4.5rem 0 4rem;
            border-radius: 0 0 32px 32px;
            margin-bottom: 2.5rem;
            box-shadow: 0 10px 30px rgba(8, 28, 21, 0.2);
        }

        /* Filter Pills */
        .filter-pill {
            display: inline-block;
            padding: 8px 18px;
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--primary-forest);
            background: #ffffff;
            border: 1.5px solid #d1fae5;
            text-decoration: none;
            transition: all 0.2s ease;
            box-shadow: 0 2px 6px rgba(0,0,0,0.03);
        }

        .filter-pill:hover,
        .filter-pill.active {
            background: var(--primary-forest);
            color: #ffffff;
            border-color: var(--primary-forest);
            transform: translateY(-2px);
        }

        /* Footer */
        footer {
            margin-top: auto;
            background: #081c15;
            color: #d8f3dc;
            padding: 2.5rem 0 1.5rem;
            border-top: 2px solid rgba(82, 183, 136, 0.25);
        }
    </style>
    @yield('styles')
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('photos.index') }}">
                <i class="bi bi-camera2 fs-4"></i>
                <span>Lensa Alam <span class="badge text-bg-success rounded-pill px-2 py-1 fs-6" style="background-color: var(--primary-sage) !important; color: #081c15 !important;">Galeri</span></span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('photos.index') ? 'active' : '' }}" href="{{ route('photos.index') }}">
                            <i class="bi bi-grid-3x3-gap me-1"></i> Galeri Foto
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                            <i class="bi bi-info-circle me-1"></i> Tentang Galeri
                        </a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <a class="btn btn-sm btn-outline-light rounded-pill px-3" href="{{ route('photos.index') }}#katalog">
                            <i class="bi bi-compass me-1"></i> Eksplorasi
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <h5 class="font-serif mb-1 text-white d-flex align-items-center justify-content-center justify-content-md-start gap-2">
                        <i class="bi bi-tree-fill" style="color: var(--primary-sage)"></i> Lensa Alam Galeri
                    </h5>
                    <p class="small text-secondary mb-0">
                        Proyek Frontend Laravel & Bootstrap - Tema Galeri Fotografi Alam (NIM 1).
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="small mb-1 text-light">
                        <i class="bi bi-mortarboard-fill me-1"></i> UTS Rekayasa Web &bull; Laravel Sail & Docker
                    </p>
                    <p class="small text-secondary mb-0">
                        &copy; {{ date('Y') }} Hak Cipta Dilindungi. Dibuat dengan Blade & Bootstrap.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @yield('scripts')
</body>
</html>

