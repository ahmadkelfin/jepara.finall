@extends('layouts.app') 

@section('title', $title)

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-2xl md:text-3xl font-bold mb-6 text-gray-900 dark:text-gray-100">
        {{ $title }}
    </h1>

    <div class="bg-white dark:bg-gray-900 shadow-lg rounded-2xl overflow-hidden">
        <div class="p-4">
            <table id="dokumenTable" class="min-w-full text-left text-sm text-gray-400">
    <thead>
        <tr>
            <th class="px-6 py-3">Aksi</th>
            <th class="px-6 py-3">Nama Dokumen</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dokumens as $dok)
            <tr class="border-b border-gray-700">
                <td class="px-6 py-4">
                    <a href="{{ asset('storage/' . $dok->file) }}"
                       target="_blank"
                       download
                       class="inline-flex items-center justify-center px-3 py-2 bg-sky-500 text-white rounded-lg shadow hover:bg-sky-600 transition">
                        ⬇ Download
                    </a>
                </td>
                <td class="px-6 py-4">{{ $dok->judul }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

        </div>
    </div>
</div>

{{-- DataTables CDN --}}
@push('scripts')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#dokumenTable').DataTable({
            "pageLength": 10,
            "lengthMenu": [ [10, 20, 50, 100], [10, 20, 50, 100] ],
            "language": {
                "search": "Cari Dokumen:",
                "searchPlaceholder": "Ketik nama dokumen...",
                "lengthMenu": "Tampilkan _MENU_ dokumen per halaman",
                "zeroRecords": "Tidak ada dokumen ditemukan",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ dokumen",
                "infoEmpty": "Tidak ada dokumen tersedia",
                "infoFiltered": "(disaring dari total _MAX_ dokumen)",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Berikutnya",
                    "previous": "Sebelumnya"
                }
            }
        });
    });
</script>
@endpush
@endsection
