<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportHub - Booking Lapangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --gradient-bg: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }

        .hero-section {
            background: var(--gradient-bg);
            color: white;
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.3);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .search-box {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-top: 3rem;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 3rem;
            position: relative;
            text-align: center;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--secondary-color);
            border-radius: 2px;
        }

        .field-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .field-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }

        .field-card .card-img-top {
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .field-card:hover .card-img-top {
            transform: scale(1.05);
        }

        .field-card .card-body {
            padding: 1.5rem;
        }

        .field-card .card-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.8rem;
        }

        .field-card .card-text {
            color: #6c757d;
            line-height: 1.6;
        }

        .price-tag {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--accent-color);
            margin: 1rem 0;
        }

        .btn-detail {
            background: var(--secondary-color);
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-detail:hover {
            background: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
        }

        .stats-section {
            background: var(--primary-color);
            color: white;
            padding: 4rem 0;
            margin: 4rem 0;
        }

        .stat-item {
            text-align: center;
            padding: 1rem;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            display: block;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .features-section {
            padding: 4rem 0;
            background: white;
        }

        .feature-item {
            text-align: center;
            padding: 2rem 1rem;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .feature-item:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 3rem;
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color) !important;
        }

        .navbar {
            background: white !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .nav-link {
            font-weight: 500;
            margin: 0 1rem;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .search-box {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-running"></i> SportHub
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#fields">Lapangan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="hero-content text-center">
                <h1 class="hero-title">Booking Lapangan Olahraga</h1>
                <p class="hero-subtitle">Temukan dan pesan lapangan olahraga favorit Anda dengan mudah dan cepat</p>
                
                <div class="search-box">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <select class="form-select form-select-lg" id="category">
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control form-control-lg" id="date" placeholder="Tanggal">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-lg w-100" id="search-btn">
                                <i class="fas fa-search"></i> Cari Lapangan
                            </button>
                        </div>
                    </div>
                </div>

                <script>
                    const searchBtn = document.getElementById('search-btn');
                    searchBtn.addEventListener('click', (e) => {
                        e.preventDefault();
                        const category = document.getElementById('category').value;
                        const date = document.getElementById('date').value;
                        window.location.href = `/fields?category=${category}&date=${date}`;
                    });
                </script>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="stat-item">
                        <span class="stat-number">50+</span>
                        <span class="stat-label">Lapangan Tersedia</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-item">
                        <span class="stat-number">1000+</span>
                        <span class="stat-label">Pelanggan Puas</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-item">
                        <span class="stat-number">24/7</span>
                        <span class="stat-label">Layanan Online</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-item">
                        <span class="stat-number">5⭐</span>
                        <span class="stat-label">Rating Pengguna</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fields Section -->
    <section id="fields" class="py-5">
        <div class="container">
            <h2 class="section-title">Daftar Lapangan</h2>
            <div class="row">
                @foreach($fields as $field)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card field-card">
                        @if($field->images->first())
                            <img src="{{ asset('storage/' . $field->images->first()->image_path) }}" class="card-img-top" alt="{{ $field->name }}">
                        @else
                            <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=400&h=250&fit=crop" class="card-img-top" alt="{{ $field->name }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-running text-primary me-2"></i>
                                {{ $field->name }}

                                 <span class="badge bg-secondary ms-2">{{ $field->category->name }}</span>
                            </h5>
                            <p class="card-text">{{ Str::limit($field->description, 100) }}</p>
                            <p class="price-tag">
                                <i class="fas fa-money-bill-wave me-2"></i>
                                Rp {{ number_format($field->price_per_hour, 0, ',', '.') }}/jam
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('field.detail', $field->id) }}" class="btn btn-detail">
                                    <i class="fas fa-eye me-2"></i>Lihat Detail
                                </a>
                                <small class="text-muted">
                                    <i class="fas fa-star text-warning"></i> 4.8 ({{ rand(50, 200) }} review)
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <h2 class="section-title">Mengapa Memilih Kami?</h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="feature-item">
                        <i class="fas fa-clock feature-icon"></i>
                        <h5>Booking 24/7</h5>
                        <p>Pesan lapangan kapan saja, di mana saja dengan sistem online yang mudah.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-item">
                        <i class="fas fa-shield-alt feature-icon"></i>
                        <h5>Pembayaran Aman</h5>
                        <p>Sistem pembayaran yang aman dan terpercaya dengan berbagai metode.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-item">
                        <i class="fas fa-medal feature-icon"></i>
                        <h5>Kualitas Terjamin</h5>
                        <p>Semua lapangan telah melalui seleksi ketat untuk kualitas terbaik.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-item">
                        <i class="fas fa-headset feature-icon"></i>
                        <h5>Customer Support</h5>
                        <p>Tim customer service yang siap membantu Anda 24/7.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5><i class="fas fa-running"></i> SportHub</h5>
                    <p>Platform booking lapangan olahraga terpercaya di Indonesia.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p>&copy; 2024 SportHub. All rights reserved.</p>
                    <div class="social-links">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Navbar background change on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.95)';
            } else {
                navbar.style.backgroundColor = 'white';
            }
        });
    </script>
</body>
</html>