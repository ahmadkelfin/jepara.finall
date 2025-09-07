<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class BeritaController extends Controller
{
    /**
     * Kategori yang diizinkan (sinkron dengan ENUM di DB)
     */
    private const KATEGORI = [
        'bencana', 'ekonomi', 'infrastruktur', 'kesehatan', 'pendidikan', 'teknologi',
    ];

    /**
     * LISTING PUBLIC
     */
    public function index(Request $request)
    {
        $query = Berita::query();

        // Filter kategori
        $kategori = $request->query('kategori', 'semua');
        if (in_array($kategori, self::KATEGORI, true)) {
            $query->where('kategori', $kategori);
        }

        // Search
        $search = trim((string) $request->query('search', ''));
        if ($search !== '') {
            $query->where('judul', 'like', "%{$search}%");
        }

        $beritas = $query->latest()
            ->paginate(9)
            ->appends($request->only('kategori', 'search'));

        return view('berita.index', compact('beritas'));
    }

    /**
     * DETAIL PUBLIC
     */
    public function show(Berita $berita)
    {
        $populer = Berita::latest()
            ->where('id', '!=', $berita->id)
            ->take(5)
            ->get();

        return view('berita.show', compact('berita', 'populer'));
    }

    /**
     * FORM CREATE (ADMIN)
     */
    public function create()
    {
        return view('admin.berita.create', [
            'kategoris' => self::KATEGORI,
        ]);
    }

    /**
     * SIMPAN DATA (ADMIN)
     */
    public function store(Request $request)
    {
        $validated = $this->validateData($request);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create($validated);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * FORM EDIT (ADMIN)
     */
    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', [
            'berita'    => $berita,
            'kategoris' => self::KATEGORI,
        ]);
    }

    /**
     * UPDATE DATA (ADMIN)
     */
    public function update(Request $request, Berita $berita)
    {
        $validated = $this->validateData($request);

        if ($request->hasFile('gambar')) {
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($validated);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * HAPUS DATA (ADMIN)
     */
    public function destroy(Berita $berita)
    {
        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return back()->with('success', 'Berita berhasil dihapus.');
    }

    /**
     * VALIDASI DATA REUSABLE
     */
    private function validateData(Request $request): array
    {
        return $request->validate([
            'judul'    => ['required', 'string', 'max:255'],
            'kategori' => ['required', Rule::in(self::KATEGORI)],
            'isi'      => ['required', 'string'], // konsisten sama DB
            'gambar'   => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:3072'],
        ]);
    }
}
