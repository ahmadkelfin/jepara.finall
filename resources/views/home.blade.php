@extends('layouts.app')

@section('content')
<!-- Hero Section (Swiper) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<div class="swiper mySwiper w-full h-[500px] md:h-[600px] lg:h-[700px] relative">
    <div class="swiper-wrapper">
        @foreach($heroes as $hero)
            <div class="swiper-slide relative">
                <img src="{{ asset('storage/' . $hero->image) }}" 
                     class="w-full h-[500px] md:h-[600px] lg:h-[700px] object-cover"
                     alt="Hero {{ $loop->index + 1 }}">
            </div>
        @endforeach
    </div>

    <!-- overlay gelap -->
    <div class="absolute inset-0 bg-black/40"></div>

    <!-- teks statis + search bar -->
    <div class="absolute inset-0 flex flex-col justify-center items-center z-10 text-center text-white px-6 md:px-12">
        <h1 class="text-3xl md:text-5xl lg:text-6xl font-extrabold mb-4 drop-shadow-lg">
            Selamat Datang di Website Resmi Kabupaten Jepara
        </h1>
        <p class="text-md md:text-lg lg:text-xl max-w-3xl mb-8 drop-shadow-md">
            Jelajahi keindahan dan budaya Jepara, dari seni ukir khas hingga destinasi wisata memikat.
        </p>

        <!-- search box -->
        <form action="{{ route('search') }}" method="GET" 
              class="flex w-full max-w-2xl bg-white rounded-full shadow-lg overflow-hidden">
            <input 
                type="text" 
                name="q" 
                placeholder="Cari informasi tentang Jepara..." 
                class="flex-grow px-6 py-3 text-gray-700 focus:outline-none"
                required
            >
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-6 py-3">
                Cari
            </button>
        </form>
    </div>

    <!-- tombol navigasi -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper(".mySwiper", {
    loop: true,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>

<!-- Layanan Jepara Digital -->
<div class="max-w-7xl mx-auto px-6 py-12">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Layanan Jepara Digital</h2>
        <p class="text-gray-600 dark:text-gray-400 mt-2">
            Mewujudkan <span class="text-blue-600 dark:text-blue-400">#JeparaDalamGenggaman</span>
        </p>
    </div>

    <!-- Grid Layanan 3x3 -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @php
            $layanan = [
                ['img'=>'layanankependudukan.png','title'=>'Layanan Kependudukan','desc'=>'Pelayanan Administrasi Kependudukan di Kabupaten Jepara','bg'=>'bg-white dark:bg-gray-800','url'=>'https://pindangcemplung.jepara.go.id/'],
                ['img'=>'layananperizinan.png','title'=>'Layanan Perizinan','desc'=>'Pelayanan Perizinan Mandiri Yang Tidak Ada di OSS','bg'=>'bg-blue-50 dark:bg-gray-700','url'=>'https://joss.jepara.go.id/'],
                ['img'=>'layananak1.png','title'=>'Layanan AK1','desc'=>'Pelayanan Surat AK1 Bagi Pencari Kerja Secara Mandiri','bg'=>'bg-white dark:bg-gray-800','url'=>'https://yokerjo.jepara.go.id/'],
                ['img'=>'layananpengadaan.png','title'=>'Layanan Pengadaan','desc'=>'Portal Layanan Pengadaan di Kabupaten Jepara','bg'=>'bg-white dark:bg-gray-800','url'=>'https://lpse.jepara.go.id/'],
                ['img'=>'layananinformasidata.png','title'=>'Layanan Informasi Data','desc'=>'Portal Berbagai Informasi di Kabupaten Jepara','bg'=>'bg-white dark:bg-gray-800','url'=>'https://samudra.jepara.go.id/'],
                ['img'=>'layanankependudukan.png','title'=>'Layanan Pengaduan','desc'=>'Portal Pengaduan Masyarakat di Kabupaten Jepara','bg'=>'bg-white dark:bg-gray-800','url'=>'https://wadul.jepara.go.id/'],
                ['img'=>'layananjdih.png','title'=>'JDIH','desc'=>'Jaringan Dokumentasi dan Informasi Hukum di Kabupaten Jepara','bg'=>'bg-white dark:bg-gray-800','url'=>'https://jdih.jepara.go.id/'],
                ['img'=>'layanandokumen.png','title'=>'Dokumen','desc'=>'Publikasi Dokumen Pemerintah Kabupaten Jepara','bg'=>'bg-white dark:bg-gray-800','url'=>'#'],
                ['img'=>'layanantiketwisata.png','title'=>'Beli Tiket Wisata','desc'=>'Pembelian Tiket Wisata Milik Pemerintah Kabupaten Secara Online','bg'=>'bg-white dark:bg-gray-800','url'=>'https://jepara.go.id/tiket/']
            ];
        @endphp

        @foreach($layanan as $item)
        <a href="{{ $item['url'] }}" target="_blank" class="block">
            <div class="p-6 {{ $item['bg'] }} rounded-2xl shadow-md hover:shadow-xl transform hover:scale-105 transition duration-300 flex flex-col items-center text-center">
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('images/'.$item['img']) }}" 
                         alt="{{ $item['title'] }}" 
                         class="h-20 w-20"
                         onerror="this.src='{{ asset('images/default.png') }}'">
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">{{ $item['title'] }}</h3>
                <p class="text-gray-600 dark:text-gray-300 text-sm">{{ $item['desc'] }}</p>
            </div>
        </a>
        @endforeach
    </div>

    <!-- Tombol Lainnya -->
    <div class="text-center mt-12">
        <a href="{{ route('layanan') }}" class="inline-block px
