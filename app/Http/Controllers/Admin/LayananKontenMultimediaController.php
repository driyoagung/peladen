<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\LayananKontenMultimedia;
use App\Models\PerangkatDaerah;
use App\Models\StatusPermohonan;
use Illuminate\Http\Request;

class LayananKontenMultimediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layananKMs = LayananKontenMultimedia::paginate(5); // Ambil semua data dari tabel layanan_zoom
        return view('admin.layananKM.index', compact('layananKMs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $layananKM = LayananKontenMultimedia::find($id); // Temukan data berdasarkan ID
        
        if (!$layananKM) {
            return redirect()->route('admin.layananKM')->with('error', 'Data tidak ditemukan!');
        }

        $kategoris = Kategori::where('id', 5)->first();

        $perangkatDaerahs = PerangkatDaerah::all();
        $statusPermohonans = StatusPermohonan::all();

        return view('admin.layananKM.edit', compact('layananKM', 'kategoris', 'perangkatDaerahs', 'statusPermohonans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $layananKM = LayananKontenMultimedia::find($id);
    
        if (!$layananKM) {
            return redirect()->route('admin.layananKM')->with('error', 'Data tidak ditemukan!');
        }
    
        // Validasi data
        $validatedData = $request->validate([
            'nama_pemohon' => 'required|string|max:255',
            'nip_nik' => 'required|string|max:50',
            'peruntukan' => 'required|string|max:255',
            'unit_kerja' => 'required|string',
            'tanggal_permohonan' => 'required|date',
            'waktu_permohonan' => 'required|date_format:H:i',
            'kategori_id' => 'required|integer',
            'perangkat_daerah_id' => 'required|integer',
            'status_permohonan_id' => 'required|integer',
        ]);
        
    
        // Update data
        $layananKM->update($validatedData);
    
        return redirect()->route('admin.layananKM')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $layananKM = LayananKontenMultimedia::find($id); // Temukan data berdasarkan ID
        if (!$layananKM) {
            return redirect()->route('admin.layananKM')->with('error', 'Data tidak ditemukan!');
        }
        $layananKM->delete();
        return redirect()->route('admin.layananKM')->with('success', 'Data berhasil dihapus!');
    }
}
