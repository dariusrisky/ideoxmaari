<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HTML & Tailwind CSS</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
  <!-- Header Image Section -->
  {{-- <div class="relative">
    <img src="https://order.burjongegas.com/assets/images/image_header_burjo-ucTwS2i6.jpg" alt="header" class="w-full">
  </div> --}}
  <div class="relative">
    <img src="{{ }}" alt="header" class="w-full">
  </div>


  <!-- Outlet Title Section -->
  <div class="bg-white rounded-t-2xl relative mt-[-20px] overflow-hidden">
    <div class="outlet py-4 text-center">
      <p class="font-normal text-lg mb-2">Burjo Ngegas</p>
      <div>
        <span class="text-sm font-light">Nomor Meja</span>
        <span class="text-green-500 ms-1 text-sm">{{$id}}</span>
      </div>
    </div>
  </div>

  <!-- Links Section -->
  <div class="py-2 bg-white px-2">
    <div class="grid grid-cols-3 lg:grid-cols-2 gap-3 px-2 font-normal text-sm">
      <div class="col-span-1">
        <a href="{{$externallink}}">
          <div class="flex justify-center bg-white shadow-gray-400 shadow-md rounded-2xl px-3 py-5">
            <img src="https://order.burjongegas.com/assets/images/icon_menu_burjo-KvCNgN0P.png" alt="icon" class="w-full">
          </div>
          <p class="text-center text-xs mt-2 xl:text-lg">Menu Order Ideo</p>
        </a>
      </div>
      {{-- loop card ideo --}}

      @foreach ($menu as $m )
        
      <div class="col-span-1">
        <a href="{{$m->link}}">
          <div class="flex justify-center bg-white shadow-gray-400 shadow-md rounded-2xl px-3 py-5">
            <img src="{{asset('storage/' . $m->path)}}" alt="{{$m->name}}" class="w-full">
          </div>
          <p class="text-center text-xs mt-2 xl:text-lg">{{$m->title}}</p>
        </a>
      </div>
      @endforeach


      {{-- <div class="col-span-1">
        <a href="#">
          <div class="flex justify-center bg-white shadow-gray-400 shadow-md rounded-2xl px-3 py-5">
            <img src="https://order.burjongegas.com/assets/images/icon_menu_iklan_kerjasama-WWwBnfdu.png" alt="icon" class="w-full">
          </div>
          <p class="text-center text-xs mt-2 xl:text-lg">Iklan Kerjasama</p>
        </a>
      </div> --}}
    </div>
  </div>

  <!-- Banner Section -->
  <div class="bg-[#F8F8F8] relative py-4 rounded-t-xl">
    <p class="font-normal mb-3 px-4">EVENT & PROMO</p>
    <!-- SwiperJS CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<!-- Slider Container -->
<div class="swiper mySwiper w-full">
    <div class="swiper-wrapper">
        @foreach ($slider as $d)
        <div class="swiper-slide w-full rounded-lg px-4">
            
        <a href="{{$d->link}}" target="_blank" rel="noreferrer">
            <img src="{{ asset('storage/' . $d->path) }}" alt="{{$d->name}}" class="w-full h-auto rounded-xl shadow-md">
        </a>
    </div>
    @endforeach
</div>
    <!-- Navigasi dan Indikator -->
    <div class="swiper-pagination"></div>
</div>

<!-- SwiperJS JavaScript -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const swiper = new Swiper('.mySwiper', {
            loop: true, // Aktifkan loop
            pagination: {
                el: '.swiper-pagination',
                clickable: true, // Membuat indikator klik
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            slidesPerView: 1, // Tampilkan satu slide penuh
            spaceBetween: 10, // Jarak antar slide
        });
    });
</script>

  </div>

</body>
</html>
