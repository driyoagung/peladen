<?php

namespace App\Http\Controllers\OPD;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\LayananZoom;
use App\Models\PerangkatDaerah;
use App\Models\StatusPermohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LayananZoomOPDController extends Controller
{
    // Menampilkan daftar semua data LayananZoom
    public function index()
    {
        $layananZooms = LayananZoom::all(); // Ambil semua data dari tabel layanan_zoom
        return view('opd.layananZoom.index', compact('layananZooms'));
    }

    // Menampilkan data LayananZoom berdasarkan ID
    public function show($id)
    {
        $layananZoom = LayananZoom::find($id); // Temukan data berdasarkan ID
        if (!$layananZoom) {
            return redirect()->route('opd.layananZoom.index')->with('error', 'Data tidak ditemukan!');
        }
        return view('opd.layananZoom.show', compact('layananZoom'));
    }

    // Menampilkan form untuk mengedit data LayananZoom berdasarkan ID
    public function edit($id)
    {
        $layananZoom = LayananZoom::find($id); // Temukan data berdasarkan ID
        
        if (!$layananZoom) {
            return redirect()->route('opd.layananZoom.index')->with('error', 'Data tidak ditemukan!');
        }

        $kategoris = Kategori::all();
        $perangkatDaerahs = PerangkatDaerah::all();
        

        return view('opd.layananZoom.edit', compact('layananZoom', 'kategoris', 'perangkatDaerahs'));
    }

    // Memperbarui data LayananZoom berdasarkan ID
    public function update(Request $request, $id)
    {
        $layananZoom = LayananZoom::find($id);

        if (!$layananZoom) {
            return redirect()->route('opd.layananZoom.index')->with('error', 'Data tidak ditemukan!');
        }
        
        // Validasi data
        $validatedData = $request->validate([
            'nama_pemohon' => 'required|string|max:255',
            'nip_nik' => 'required|string|max:50',
            'lokasi' => 'required|string|max:255',
            'acara' => 'required|string|max:255',
            'unit_kerja' => 'required|string|max:255',
            'tanggal_permohonan' => 'required|date',
            'waktu_permohonan' => 'required|date_format:H:i:s',
            'kategori_id' => 'required|integer',
            'perangkat_daerah_id' => 'required|integer',
            
        ]);

        // Update data
        $layananZoom->update($validatedData);

        return redirect()->route('opd.layananZoom.index')->with('success', 'Data berhasil diupdate!');
    }

    public function create()
    {
        $perangkatDaerahs = PerangkatDaerah::all();
        $kategoris = Kategori::where('id', 2)->first();
        return view('opd.layananZoom.create', compact('kategoris', 'perangkatDaerahs'));
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'nama_pemohon' => 'required|string|max:255',
        'nip_nik' => 'required|string|max:50',
        'lokasi' => 'required|string|max:255',
        'acara' => 'required|string|max:255',
        'unit_kerja' => 'required|string|max:255',
        'tanggal_permohonan' => 'required|date',
        'waktu_permohonan' => 'required|date_format:H:i',
        'kategori_id' => 'required|integer',
        'perangkat_daerah_id' => 'required|integer',
        
    ]);

    $layananZoom = new LayananZoom ($validatedData);
    $layananZoom->status_permohonan_id = StatusPermohonan::where('status', 'Pending')->first()->id; // Set default status
    $layananZoom->save();

    return redirect()->route('opd.layananZoom.create')->with('success', 'Permohonan berhasil dikirim, silahkan tunggu sampai konfirmasi lebih lanjut.');
}
    // Menghapus data LayananZoom berdasarkan ID
    public function destroy($id)
    {
        $layananZoom = LayananZoom::find($id); // Temukan data berdasarkan ID
        if (!$layananZoom) {
            return redirect()->route('opd.layananZoom.index')->with('error', 'Data tidak ditemukan!');
        }
        $layananZoom->delete();
        return redirect()->route('opd.layananZoom.index')->with('success', 'Data berhasil dihapus!');
    }
}
