<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\LayananTTE;
use App\Models\PerangkatDaerah;
use App\Models\StatusPermohonan;
use Illuminate\Http\Request;

class LayananTTEController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $layananTTEs = LayananTTE::paginate(5); // Ambil semua data dari tabel LayananTTE
        return view('admin.layananTTE.index', compact('layananTTEs'));
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
        $layananTTE = LayananTTE::find($id); // Temukan data berdasarkan ID
        
        if (!$layananTTE) {
            return redirect()->route('admin.layananTTE')->with('error', 'Data tidak ditemukan!');
        }

        $kategoris = Kategori::where('id', 3)->first();

        $perangkatDaerahs = PerangkatDaerah::all();
        $statusPermohonans = StatusPermohonan::all();

        return view('admin.layananTTE.edit', compact('layananTTE', 'kategoris', 'perangkatDaerahs', 'statusPermohonans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $layananTTE = layananTTE::find($id);
    
        if (!$layananTTE) {
            return redirect()->route('admin.layananTTE')->with('error', 'Data tidak ditemukan!');
        }
    
        // Validasi data
        $validatedData = $request->validate([
            'ktp' => 'required|string|max:255',
            'nama_lengkap' => 'required|string|max:50',
            'nik' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'jabatan' => 'required|string',
            'no_hp' => 'required|string',
            'unit_kerja' => 'required|string',
            'tanggal_permohonan' => 'required|date',
            'waktu_permohonan' => 'required|date_format:H:i',
            'kategori_id' => 'required|integer',
            'perangkat_daerah_id' => 'required|integer',
            'status_permohonan_id' => 'required|integer',
        ]);
        
    
        // Update data
        $layananTTE->update($validatedData);
    
        return redirect()->route('admin.layananTTE')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $layananSPLP = LayananTTE::find($id); // Temukan data berdasarkan ID
        if (!$layananSPLP) {
            return redirect()->route('admin.layananTTE')->with('error', 'Data tidak ditemukan!');
        }
        $layananSPLP->delete();
        return redirect()->route('admin.layananTTE')->with('success', 'Data berhasil dihapus!');
    }
}
