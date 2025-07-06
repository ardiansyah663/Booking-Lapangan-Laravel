<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Lapangan - SportHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --success-color: #27ae60;
            --warning-color: #f39c12;
            --gradient-bg: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            padding-top: 80px;
        }

        /* Navigation */
        .navbar {
            background: white !important;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            backdrop-filter: blur(10px);
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color) !important;
        }

        .nav-link {
            font-weight: 500;
            color: var(--primary-color) !important;
            margin: 0 0.5rem;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--secondary-color) !important;
        }

        /* Main Content */
        .field-header {
            background: linear-gradient(135deg, rgba(44, 62, 80, 0.9), rgba(52, 152, 219, 0.9));
            color: white;
            padding: 2rem 0;
            margin-bottom: 3rem;
            border-radius: 0 0 50px 50px;
        }

        .field-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .field-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 0;
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
            margin-bottom: 2rem;
        }

        .breadcrumb-item a {
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .breadcrumb-item.active {
            color: var(--primary-color);
            font-weight: 600;
        }

        /* Image Carousel */
        .carousel-container {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            margin-bottom: 2rem;
        }

        .carousel-item img {
            height: 400px;
            object-fit: cover;
            border-radius: 20px;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 8%;
            border-radius: 50%;
            background: rgba(0,0,0,0.5);
            margin: auto 15px;
            height: 50px;
            top: 50%;
            transform: translateY(-50%);
        }

        .carousel-indicators {
            margin-bottom: -30px;
        }

        .carousel-indicators button {
            background-color: var(--secondary-color);
            border-radius: 50%;
            width: 12px;
            height: 12px;
            margin: 0 5px;
        }

        /* Info Cards */
        .info-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
            border: none;
        }

        .info-card h3 {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-item {
            display: flex;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid #eee;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-icon {
            background: var(--secondary-color);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-size: 1rem;
        }

        .info-text {
            flex: 1;
        }

        .info-label {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.25rem;
        }

        .info-value {
            color: #666;
            font-size: 0.95rem;
        }

        .price-highlight {
            background: var(--accent-color);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            font-weight: 700;
            font-size: 1.1rem;
            display: inline-block;
            margin-top: 1rem;
        }

        /* Booking Form */
        .booking-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            border: none;
            position: sticky;
            top: 100px;
        }

        .booking-card h3 {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 2rem;
            text-align: center;
            font-size: 1.8rem;
        }

        .form-label {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }

        .btn-book {
            background: var(--gradient-bg);
            border: none;
            color: white;
            padding: 1rem 2rem;
            border-radius: 25px;
            font-weight: 700;
            font-size: 1.1rem;
            width: 100%;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-book:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
            color: white;
        }

        .btn-secondary {
            background: #6c757d;
            border: none;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }

        /* Features Section */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin: 2rem 0;
        }

        .feature-item {
            background: white;
            padding: 1.5rem;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s ease;
        }

        .feature-item:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            background: var(--secondary-color);
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
        }

        .feature-title {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .feature-desc {
            color: #666;
            font-size: 0.9rem;
        }

        /* Alert Styles */
        .alert {
            border: none;
            border-radius: 10px;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
        }

        .alert-info {
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            color: #1565c0;
        }

        /* Rating Section */
        .rating-section {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            margin-top: 2rem;
        }

        .rating-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .rating-score {
            font-size: 3rem;
            font-weight: 700;
            color: var(--warning-color);
        }

        .rating-stars {
            color: var(--warning-color);
            font-size: 1.5rem;
        }

        .rating-text {
            color: #666;
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .field-title {
                font-size: 2rem;
            }
            
            .booking-card {
                position: static;
                margin-top: 2rem;
            }
            
            .carousel-item img {
                height: 250px;
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
                        <a class="nav-link" href="#"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-list"></i> Daftar Lapangan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-phone"></i> Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid">
        <!-- Field Header -->
        <div class="field-header">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Lapangan</a></li>
                        <li class="breadcrumb-item active">{{ $field->name }}</li>
                    </ol>
                </nav>
                <h1 class="field-title">{{ $field->name }}</h1>
                <p class="field-subtitle">
                    <i class="fas fa-map-marker-alt"></i> {{ $field->location }}
                </p>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <!-- Left Column - Field Details -->
                <div class="col-lg-8">
                    <!-- Image Carousel -->
                    <div class="carousel-container">
                        <div id="carouselFieldImages" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                @foreach($field->images as $index => $image)
                                    <button type="button" data-bs-target="#carouselFieldImages" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></button>
                                @endforeach
                            </div>
                            <div class="carousel-inner">
                                @foreach($field->images as $index => $image)
                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $image->image_path) }}" class="d-block w-100" alt="Image {{ $index + 1 }}">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselFieldImages" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselFieldImages" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>

                    <!-- Field Information -->
                    <div class="info-card">
                        <h3><i class="fas fa-info-circle"></i> Informasi Lapangan</h3>
                        
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-align-left"></i>
                            </div>
                            <div class="info-text">
                                <div class="info-label">Deskripsi</div>
                                <div class="info-value">{{ $field->description }}</div>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <div class="info-text">
                                <div class="info-label">Harga Sewa</div>
                                <div class="info-value">
                                    <span class="price-highlight">
                                        <i class="fas fa-rupiah-sign"></i> {{ number_format($field->price_per_hour, 0, ',', '.') }}/jam
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="info-text">
                                <div class="info-label">Lokasi</div>
                                <div class="info-value">{{ $field->location }}</div>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="info-text">
                                <div class="info-label">Jam Operasional</div>
                                <div class="info-value">Senin - Minggu: 06:00 - 22:00 WIB</div>
                            </div>
                        </div>
                    </div>

                    <!-- Features -->
                    <div class="info-card">
                        <h3><i class="fas fa-star"></i> Fasilitas</h3>
                        <div class="features-grid">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-parking"></i>
                                </div>
                                <div class="feature-title">Parkir Luas</div>
                                <div class="feature-desc">Area parkir yang luas dan aman</div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-restroom"></i>
                                </div>
                                <div class="feature-title">Kamar Mandi</div>
                                <div class="feature-desc">Kamar mandi bersih dan lengkap</div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-tshirt"></i>
                                </div>
                                <div class="feature-title">Ruang Ganti</div>
                                <div class="feature-desc">Ruang ganti yang nyaman</div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-coffee"></i>
                                </div>
                                <div class="feature-title">Kantin</div>
                                <div class="feature-desc">Kantin dengan menu beragam</div>
                            </div>
                        </div>
                    </div>

                    <!-- Rating Section -->
                    <div class="rating-section">
                        <div class="rating-header">
                            <div class="rating-score">4.8</div>
                            <div>
                                <div class="rating-stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="rating-text">Berdasarkan 156 review</div>
                            </div>
                        </div>
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i>
                            <strong>Tips:</strong> Untuk mendapatkan harga terbaik, booking minimal 2 jam sebelum waktu bermain.
                        </div>
                    </div>
                </div>

                <!-- Right Column - Booking Form -->
                <div class="col-lg-4">
                    <div class="booking-card">
                        <h3><i class="fas fa-calendar-plus"></i> Form Booking</h3>
                        <form action="{{ route('booking.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="field_id" value="{{ $field->id }}">
                            
                            <div class="mb-3">
                                <label for="name" class="form-label">
                                    <i class="fas fa-user"></i> Nama Lengkap
                                </label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap" required>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">
                                    <i class="fas fa-home"></i> Alamat
                                </label>
                                <textarea class="form-control" id="address" name="address" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="whatsapp_number" class="form-label">
                                    <i class="fab fa-whatsapp"></i> Nomor WhatsApp
                                </label>
                                <input type="text" class="form-control" id="whatsapp_number" name="whatsapp_number" placeholder="08xxxxxxxxxx" required>
                            </div>

                            <div class="mb-4">
                                <label for="booking_time" class="form-label">
                                    <i class="fas fa-clock"></i> Waktu Booking
                                </label>
                                <input type="datetime-local" class="form-control" id="booking_time" name="booking_time" required>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-book">
                                    <i class="fas fa-calendar-check"></i> Book Sekarang
                                </button>

                                <div id="successModal" class="overlay" style="display: none;">
                                    <div class="success-notification">
                                        <div class="success-icon">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <h4>Booking Berhasil!</h4>
                                        <p>Booking Anda berhasil tersimpan. Admin akan segera menghubungi Anda melalui WhatsApp untuk konfirmasi lebih lanjut.</p>
                                        <div class="text-center">
                                            <small class="text-muted">Halaman akan kembali ke Home dalam <span id="countdown">3</span> detik...</small>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    $('form').submit(function() {
                                        $('#successModal').show();
                                        let countdown = 3;
                                        setInterval(function() {
                                            $('#countdown').text(countdown);
                                            if (countdown == 0) {
                                                window.location.href = "{{ route('home') }}";
                                            }
                                            countdown--;
                                        }, 1000);
                                    });
                                </script>
                                <a href="{{ route('home') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Kembali ke Home
                                </a>
                            </div>

                            <script>
                                $('form').submit(function() {
                                    $(this).find('button[type="submit"]').attr('disabled', true);
                                    $(this).find('.alert-success')
                                        .html('<strong>Booking Berhasil!</strong> Booking Anda berhasil tersimpan, admin akan segera menghubungi Anda.')
                                        .removeClass('d-none');
                                    setTimeout(function() {
                                        window.location.href = "{{ route('home') }}";
                                    }, 2000);
                                });
                            </script>
                        </form>

                        <div class="alert alert-info mt-3">
                            <small>
                                <i class="fas fa-shield-alt"></i>
                                <strong>Booking Aman:</strong> Pembayaran dapat dilakukan setelah konfirmasi booking.
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-advance carousel
        const carousel = new bootstrap.Carousel('#carouselFieldImages', {
            interval: 5000,
            ride: 'carousel'
        });

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const whatsappInput = document.getElementById('whatsapp_number');
            const whatsappValue = whatsappInput.value;
            
            // Basic WhatsApp number validation
            if (!whatsappValue.match(/^[0-9]{10,15}$/)) {
                e.preventDefault();
                alert('Nomor WhatsApp harus berupa angka dengan panjang 10-15 digit');
                whatsappInput.focus();
                return false;
            }
        });

        // Set minimum date to today
        const dateInput = document.getElementById('booking_time');
        const today = new Date();
        const tomorrow = new Date(today);
        tomorrow.setDate(tomorrow.getDate() + 1);
        dateInput.min = tomorrow.toISOString().slice(0, 16);
    </script>
</body>
</html>
