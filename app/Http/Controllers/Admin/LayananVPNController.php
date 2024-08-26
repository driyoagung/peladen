<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\LayananVPN;
use App\Models\PerangkatDaerah;
use App\Models\StatusPermohonan;
use Illuminate\Http\Request;

class LayananVPNController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layananVPNs = LayananVPN::paginate(5); // Ambil semua data dari tabel layanan_zoom
        return view('admin.layananVPN.index', compact('layananVPNs'));
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
        $layananVPN = layananVPN::find($id); // Temukan data berdasarkan ID
        
        if (!$layananVPN) {
            return redirect()->route('admin.layananVPN')->with('error', 'Data tidak ditemukan!');
        }

        $kategoris = Kategori::where('id', 1)->first();

        $perangkatDaerahs = PerangkatDaerah::all();
        $statusPermohonans = StatusPermohonan::all();

        return view('admin.layananVPN.edit', compact('layananVPN', 'kategoris', 'perangkatDaerahs', 'statusPermohonans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $layananVPN = LayananVPN::find($id);
    
        if (!$layananVPN) {
            return redirect()->route('admin.layananVPN')->with('error', 'Data tidak ditemukan!');
        }
    
        // Validasi data
        $validatedData = $request->validate([
            'nama_pemohon' => 'required|string|max:255',
            'nip_nik' => 'required|string|max:50',
            'lokasi' => 'required|string|max:255',
            'unit_kerja' => 'required|string',
            'tanggal_permohonan' => 'required|date',
            'waktu_permohonan' => 'required|date_format:H:i',
            'kategori_id' => 'required|integer',
            'perangkat_daerah_id' => 'required|integer',
            'status_permohonan_id' => 'required|integer',
        ]);
        
    
        // Update data
        $layananVPN->update($validatedData);
    
        return redirect()->route('admin.layananVPN')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $layananVPN = layananVPN::find($id); // Temukan data berdasarkan ID
        if (!$layananVPN) {
            return redirect()->route('admin.layananVPN')->with('error', 'Data tidak ditemukan!');
        }
        $layananVPN->delete();
        return redirect()->route('admin.layananVPN')->with('success', 'Data berhasil dihapus!');
    }
}
