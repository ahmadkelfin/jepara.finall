@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 my-10 space-y-12">
    <!-- Judul Halaman -->
    <div class="text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-3">
            Sejarah Kota Jepara
        </h1>
        <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto leading-relaxed">
            Kota Jepara memiliki sejarah panjang yang kaya akan budaya, perjuangan, dan seni.
        </p>
    </div>

    @foreach($sejarah as $item)
        <div class="space-y-4">
            @if($item->gambar)
                <img src="{{ asset('storage/'.$item->gambar) }}" alt="{{ $item->judul }}"
                     class="w-full rounded-2xl shadow-lg object-cover">
            @endif

            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">
                {{ $item->judul }}
            </h2>

            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                {!! nl2br(e($item->isi)) !!}
            </p>
        </div>
    @endforeach
</div>
@endsection
