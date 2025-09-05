@extends('layouts.app')

@section('title', $apbd->title)

@section('content')
<div class="max-w-4xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold mb-6">{{ $apbd->title }}</h1>
    <p class="text-gray-500 mb-4">Tahun: {{ $apbd->year }} | Tanggal: {{ $apbd->date }}</p>

    @if($apbd->file)
        <a href="{{ asset('storage/' . $apbd->file) }}" target="_blank" 
           class="btn btn-primary">Unduh File</a>
    @else
        <p class="text-red-500">File belum tersedia.</p>
    @endif
</div>
@endsection
