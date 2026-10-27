<?php

namespace App\Http\Controllers;

use App\Models\Biodata1145;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BiodataController extends Controller
{
    // 1. TAMPILKAN DATA
    public function index()
    {
        // Mengambil SEMUA data untuk dilempar ke view
        $biodatas = Biodata1145::all();
        return view('admin.biodata.index', compact('biodatas'));
    }

    // 2. TAMPILKAN FORM TAMBAH
    public function create()
    {
        return view('admin.biodata.create');
    }

    // 3. SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'profesi' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto_profil')) {
            $path = $request->file('foto_profil')->store('foto_profil', 'public');
            $data['foto_profil'] = $path;
        }

        Biodata1145::create($data);
        return redirect()->route('biodata.index')->with('success', 'Data CV berhasil ditambahkan!');
    }

    // 4. TAMPILKAN FORM EDIT
    public function edit($id)
    {
        $biodata = Biodata1145::findOrFail($id);
        return view('admin.biodata.edit', compact('biodata'));
    }

    // 5. UPDATE DATA
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'profesi' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $biodata = Biodata1145::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('foto_profil')) {
            if ($biodata->foto_profil && Storage::disk('public')->exists($biodata->foto_profil)) {
                Storage::disk('public')->delete($biodata->foto_profil);
            }
            $path = $request->file('foto_profil')->store('foto_profil', 'public');
            $data['foto_profil'] = $path;
        }

        $biodata->update($data);
        return redirect()->route('biodata.index')->with('success', 'Data CV berhasil diupdate!');
    }

    // 6. HAPUS DATA
    public function destroy($id)
    {
        $biodata = Biodata1145::findOrFail($id);

        if ($biodata->foto_profil && Storage::disk('public')->exists($biodata->foto_profil)) {
            Storage::disk('public')->delete($biodata->foto_profil);
        }

        $biodata->delete();
        return redirect()->route('biodata.index')->with('success', 'Data CV berhasil dihapus!');
    }
}
