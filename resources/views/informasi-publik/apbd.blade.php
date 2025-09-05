@extends('layouts.app')

@section('title', 'APBD & Lampirannya')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold mb-6">Data APBD</h1>

    @if($apbdList->isEmpty())
        <p class="text-gray-500">Belum ada data APBD.</p>
    @else
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($apbdList as $apbd)
                <div class="bg-white rounded-xl shadow p-4">
                    <h2 class="text-lg font-semibold">{{ $apbd->title }}</h2>
                    <p class="text-sm text-gray-500">{{ $apbd->year }} - {{ $apbd->date }}</p>

                    @if($apbd->thumbnail)
                        <img src="{{ asset('storage/' . $apbd->thumbnail) }}" 
                             alt="{{ $apbd->title }}" 
                             class="mt-3 rounded-md">
                    @endif

                    @if($apbd->file)
                        <a href="{{ asset('storage/' . $apbd->file) }}" 
                           target="_blank" 
                           class="inline-block mt-3 text-blue-600 hover:underline">
                            Lihat File
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
