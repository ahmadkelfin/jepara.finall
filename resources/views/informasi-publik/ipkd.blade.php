{{-- resources/views/informasi-publik/ipkd.blade.php --}}
@extends('layouts.app')

@section('title', 'IPKD - Informasi Publik')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-8">📊 Informasi IPKD</h1>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($ipkdList as $item)
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-5 flex flex-col justify-between">
                <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-3">
                    {{ $item->judul ?? 'Dokumen IPKD' }}
                </h2>

                @if ($item->file)
                    <a href="{{ asset('storage/' . $item->file) }}"
                       target="_blank"
                       class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                       📄 Lihat Dokumen
                    </a>
                @else
                    <p class="text-sm text-gray-500">Belum ada file.</p>
                @endif
            </div>
        @empty
            <p class="text-gray-500 dark:text-gray-400">Belum ada data IPKD yang tersedia.</p>
        @endforelse
    </div>
</div>
@endsection
