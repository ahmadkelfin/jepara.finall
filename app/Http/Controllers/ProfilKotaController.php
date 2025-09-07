<?php

namespace App\Http\Controllers;

use App\Models\Sambutan;
use App\Models\Sejarah;
use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ProfilKotaController extends Controller
{
    /**
     * Halaman Sambutan
     */
    public function sambutan()
    {
        $table = (new Sambutan)->getTable();
        if (! Schema::hasTable($table)) {
            return view('profil-kota.sambutan')
                ->with('error', "Tabel {$table} belum ada. Jalankan migrate terlebih dahulu.");
        }

        $sambutan = Sambutan::first();

        return view('profil-kota.sambutan', compact('sambutan'));
    }

    /**
     * Halaman Sejarah
     */
    public function sejarah()
    {
        $table = (new Sejarah)->getTable();
        if (! Schema::hasTable($table)) {
            return view('profil-kota.sejarah')
                ->with('error', "Tabel {$table} belum ada. Jalankan migrate terlebih dahulu.");
        }

        $sejarah = Sejarah::orderBy('urutan', 'asc')->get();

        return view('profil-kota.sejarah', compact('sejarah'));
    }

    /**
     * Halaman Visi & Misi
     */
    public function visiMisi()
    {
        $table = (new VisiMisi)->getTable();
        if (! Schema::hasTable($table)) {
            return view('profil-kota.visimisi')
                ->with('error', "Tabel {$table} belum ada. Jalankan migrate terlebih dahulu.");
        }

        // cek apakah ada kolom 'tipe'
        if (Schema::hasColumn($table, 'tipe')) {
            $visi = VisiMisi::where('tipe', 'visi')->orderBy('id')->get();
            $misi = VisiMisi::where('tipe', 'misi')->orderBy('id')->get();
            return view('profil-kota.visimisi', compact('visi', 'misi'));
        } else {
            $visiMisis = VisiMisi::all();
            return view('profil-kota.visimisi', compact('visiMisis'));
        }
    }

    /**
     * Form edit Visi & Misi
     */
    public function visiMisiEdit($id = null)
    {
        $table = (new VisiMisi)->getTable();
        if (! Schema::hasTable($table)) {
            return view('profil-kota.visimisi-edit')
                ->with('error', "Tabel {$table} belum ada. Jalankan migrate terlebih dahulu.");
        }

        $item = $id ? VisiMisi::findOrFail($id) : null;

        return view('profil-kota.visimisi-edit', compact('item'));
    }

    /**
     * Simpan / Update Visi & Misi
     */
    public function visiMisiUpdate(Request $request, $id = null)
    {
        $table = (new VisiMisi)->getTable();
        if (! Schema::hasTable($table)) {
            return back()->withInput()
                ->with('error', "Tabel {$table} belum ada. Jalankan migrate terlebih dahulu.");
        }

        if (Schema::hasColumn($table, 'tipe')) {
            // Mode baru (multi record)
            $rules = [
                'tipe' => 'required|in:visi,misi',
                'isi'  => 'required|string|max:500',
            ];
            $validated = $request->validate($rules);

            if ($id) {
                VisiMisi::findOrFail($id)->update($validated);
            } else {
                VisiMisi::create($validated);
            }
        } else {
            // Mode lama (satu record)
            $rules = [
                'visi' => 'nullable|string',
                'misi' => 'nullable|string',
            ];
            $validated = $request->validate($rules);

            VisiMisi::updateOrCreate(
                ['id' => VisiMisi::query()->first()?->id],
                $validated
            );
        }

        return redirect()->route('profil.visimisi')
            ->with('success', 'Visi & Misi berhasil disimpan ✅');
    }

    /**
     * Hapus data
     */
    public function visiMisiDestroy($id)
    {
        try {
            VisiMisi::findOrFail($id)->delete();
            return redirect()->route('profil.visimisi')
                ->with('success', 'Data berhasil dihapus 🗑️');
        } catch (\Throwable $e) {
            return back()->with('error', 'Gagal menghapus: ' . $e->getMessage());
        }
    }
}
