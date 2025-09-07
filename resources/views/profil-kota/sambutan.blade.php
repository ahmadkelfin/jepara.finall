@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 my-10">
    <div class="grid md:grid-cols-3 gap-8 items-start">

        <!-- Foto Bupati -->
        <div class="flex flex-col items-center">
            <div class="relative group">
                <img src="{{ $sambutan && $sambutan->foto ? asset('storage/'.$sambutan->foto) : asset('images/bupati-jepara.png') }}" 
                     alt="{{ $sambutan->nama_bupati ?? 'Bupati Jepara' }}" 
                     class="rounded-2xl shadow-lg transform transition duration-300 group-hover:scale-105">
                <div class="absolute inset-0 rounded-2xl bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
            </div>
            <div class="bg-red-600 text-white text-center px-4 py-3 mt-4 rounded-lg shadow-md">
                <h2 class="text-lg font-bold">{{ $sambutan->nama_bupati ?? 'Nama Bupati' }}</h2>
                <p class="text-sm tracking-wide">{{ $sambutan->jabatan ?? 'BUPATI JEPARA' }}</p>
            </div>
        </div>

        <!-- Sambutan -->
        <div class="md:col-span-2 bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg space-y-5">
            {!! $sambutan->isi_sambutan ?? '<p class="text-gray-500">Belum ada sambutan.</p>' !!}
        </div>
    </div>
</div>
@endsection
