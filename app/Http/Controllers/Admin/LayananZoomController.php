<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\LayananZoom;
use App\Models\PerangkatDaerah;
use App\Models\StatusPermohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LayananZoomController extends Controller
{
    // Menampilkan daftar semua data LayananZoom
    public function index()
    {
        $layananZooms = LayananZoom::orderBy('created_at', 'desc')->paginate(5);        
        return view('admin.layananZoom.index', compact('layananZooms'));
    }

    // Menampilkan data LayananZoom berdasarkan ID
    public function show($id)
    {
        $layananZoom = LayananZoom::find($id); // Temukan data berdasarkan ID
        if (!$layananZoom) {
            return redirect()->route('admin.layananZoom')->with('error', 'Data tidak ditemukan!');
        }
        return view('layanan_zoom.show', compact('layananZoom'));
    }

    // Menampilkan form untuk mengedit data LayananZoom berdasarkan ID
    public function edit($id)
    {
        $layananZoom = LayananZoom::find($id); // Temukan data berdasarkan ID
        
        if (!$layananZoom) {
            return redirect()->route('admin.layananZoom')->with('error', 'Data tidak ditemukan!');
        }

        $kategoris = Kategori::all();
        $perangkatDaerahs = PerangkatDaerah::all();
        $statusPermohonans = StatusPermohonan::all();

        return view('admin.layananZoom.edit', compact('layananZoom', 'kategoris', 'perangkatDaerahs', 'statusPermohonans'));
    }

    // Memperbarui data LayananZoom berdasarkan ID
    public function update(Request $request, $id)
    {
        $layananZoom = LayananZoom::find($id);

        if (!$layananZoom) {
            return redirect()->route('admin.layananZoom')->with('error', 'Data tidak ditemukan!');
        }
        // Validasi data
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
            'status_permohonan_id' => 'required|integer',
        ]);

        // Update data
        $layananZoom->update($validatedData);

        return redirect()->route('admin.layananZoom')->with('success', 'Data berhasil diupdate!');
    }

    public function create()
    {
        $kategoris = Kategori::all();
        $perangkatDaerahs = PerangkatDaerah::all();
        $statusPermohonans = StatusPermohonan::all();
        
        return view('admin.layananZoom.create', compact('kategoris', 'perangkatDaerahs', 'statusPermohonans'));
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
            'status_permohonan_id' => 'required|integer',
        ]);

        $layananZoom = new LayananZoom($validatedData);
        $layananZoom->save();

        return redirect()->route('admin.layananZoom')->with('success', 'Layanan Zoom berhasil ditambahkan.');
    }

    // Menghapus data LayananZoom berdasarkan ID
    public function destroy($id)
    {
        $layananZoom = LayananZoom::find($id); // Temukan data berdasarkan ID
        if (!$layananZoom) {
            return redirect()->route('admin.layananZoom')->with('error', 'Data tidak ditemukan!');
        }
        $layananZoom->delete();
        return redirect()->route('admin.layananZoom')->with('success', 'Data berhasil dihapus!');
    }
}