<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <style>
        header {
            background-color: #ff7d02;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        .card img {
            border-radius: 10px;
        }
        .slider img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }
        .dots {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }
        .dot {
            width: 8px;
            height: 8px;
            background: #ccc;
            border-radius: 50%;
            margin: 0 5px;
            cursor: pointer;
        }
        .dot.active {
            background: #ff7d02;
        }
    </style>
</head>
<body>
    <header>
        <h1>Selamat Datang</h1>
        <p>Burjo Ngegas</p>
    </header>

    <div class="container mt-3 ">
        <div class="text-center mb-3">
            <h3>Nomor Meja: <span class="text-success">INDOOR-A2</span></h3>
        </div>

        <!-- Card Section -->
        <div class="row text-center mb-3">
            <div class="col-4">
                <div class="card p-2 shadow-sm">
                    <img src="https://via.placeholder.com/100" class="card-img-top" alt="Menu Order">
                    <div class="card-body p-1">
                        <p class="card-text">Menu Order Burjo</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card p-2 shadow-sm">
                    <img src="https://via.placeholder.com/100" class="card-img-top" alt="Paket Data">
                    <div class="card-body p-1">
                        <p class="card-text">Paket Data & Voucher Game</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card p-2 shadow-sm">
                    <img src="https://via.placeholder.com/100" class="card-img-top" alt="Iklan Kerjasama">
                    <div class="card-body p-1">
                        <p class="card-text">Iklan Kerjasama</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- @foreach ($data as $d ) --}}
            
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($data as $d)
                    <div class="swiper-slide">
                        <div class="bg-white border border-gray-200 rounded-lg shadow p-4">
                            <a href="#">
                                <img class="rounded-lg w-full h-32 object-cover" src="{{ asset('storage/' . $d->path) }}" alt="{{ $d->title }}" />
                            </a>
                            <div class="mt-3">
                                <h5 class="text-lg font-bold text-gray-900 dark:text-white">{{ $d->title }}</h5>
                                <p class="text-sm text-gray-600 dark:text-gray-300">Hubungi: {{ $d->contact }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Navigasi -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <!-- Indikator -->
            <div class="swiper-pagination"></div>
        </div>
        
        
        
        {{-- @endforeach --}}

        <!-- Section Title -->
        <h4 class="fw-bold">EVENT & PROMO</h4>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const swiper = new Swiper('.mySwiper', {
            loop: true, // Aktifkan loop
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            slidesPerView: 1, // Jumlah slide per tampilan
            spaceBetween: 10, // Jarak antar slide
            breakpoints: {
                640: { slidesPerView: 1, spaceBetween: 10 },
                768: { slidesPerView: 2, spaceBetween: 20 },
                1024: { slidesPerView: 3, spaceBetween: 30 },
            },
        });
    });
</script>
