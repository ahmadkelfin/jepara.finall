@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <!-- Hero / Judul -->
    <header class="text-center mb-16">
        <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 dark:text-gray-100">
            Visi &amp; Misi Pemerintah Kota Jepara
        </h1>
        <p class="mt-3 text-gray-600 dark:text-gray-300 max-w-2xl mx-auto text-lg sm:text-xl leading-relaxed">
            Arah pembangunan untuk meningkatkan kesejahteraan, menumbuhkan ekonomi kreatif, 
            dan menjaga budaya serta lingkungan berkelanjutan.
        </p>
    </header>

    @forelse ($visiMisis as $item)
        <!-- Visi (highlight box) -->
        <section class="mb-16">
            <div class="bg-gradient-to-r from-red-600 to-rose-500 text-white rounded-2xl p-8 shadow-xl">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                    <div>
                        <h2 class="text-2xl sm:text-3xl font-bold">Visi Kota Jepara</h2>
                        <p class="mt-3 text-lg sm:text-xl leading-relaxed whitespace-pre-line">
                            {{ $item->visi ?? '-' }}
                        </p>
                    </div>

                    <div class="text-sm md:text-base text-white/90 max-w-md">
                        <h3 class="font-semibold mt-2 md:mt-0">Makna Visi</h3>
                        <p class="mt-2 leading-relaxed">
                            {{ __('Visi ini menggambarkan arah pembangunan Jepara yang maju, sejahtera, dan berbudaya dengan mengoptimalkan potensi ekonomi kreatif serta pariwisata berkelanjutan.') }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Misi (grid cards) -->
        <section>
            <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800 dark:text-gray-100 mb-8">Misi Kota Jepara</h2>

            @php
                // Pisahkan misi berdasarkan baris (jika disimpan multiline di DB)
                $missions = $item->misi ? preg_split('/\r\n|\r|\n/', $item->misi) : [];
            @endphp

            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @forelse ($missions as $index => $misi)
                    @if (trim($misi) !== '')
                    <article class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm hover:shadow-lg transition transform hover:-translate-y-1">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 bg-red-50 dark:bg-red-900/20 rounded-lg p-4">
                                <svg class="w-6 h-6 text-red-600 dark:text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-800 dark:text-gray-100">Misi {{ $index+1 }}</h3>
                                <p class="mt-2 text-sm sm:text-base text-gray-600 dark:text-gray-300 leading-relaxed">
                                    {{ $misi }}
                                </p>
                            </div>
                        </div>
                    </article>
                    @endif
                @empty
                    <p class="text-gray-500 dark:text-gray-400">Belum ada misi yang ditambahkan.</p>
                @endforelse
            </div>

            <!-- Gambar jika ada -->
            @if ($item->gambar)
                <div class="mt-10 text-center">
                    <img src="{{ asset('storage/'.$item->gambar) }}" 
                         alt="Gambar Visi Misi"
                         class="mx-auto rounded-xl shadow-lg max-h-96 object-contain">
                </div>
            @endif

            <!-- Penutup / Call to Action -->
            <div class="mt-16 text-center">
                <p class="text-gray-700 dark:text-gray-300 max-w-2xl mx-auto leading-relaxed text-lg sm:text-xl">
                    Visi dan misi ini menjadi pedoman bersama — pemerintah, pelaku usaha, dan masyarakat — 
                    untuk membangun Jepara yang lebih maju, sejahtera, dan berbudaya. 
                    Mari bersinergi mewujudkannya.
                </p>
            </div>
        </section>
    @empty
        <p class="text-center text-gray-500 dark:text-gray-400">Belum ada data visi & misi.</p>
    @endforelse
</div>
@endsection
