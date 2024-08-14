<?php

namespace App\Http\Controllers\OPD;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\LayananVPN;
use App\Models\PerangkatDaerah;
use App\Models\StatusPermohonan;
use Illuminate\Http\Request;

class LayananVPNOPDController extends Controller
{
    // Menampilkan daftar semua data LayananVPN
    public function index()
    {
        $layananVPNs = LayananVPN::all(); // Ambil semua data dari tabel layanan_vpn
        return view('opd.layananVPN.index', compact('layananVPNs'));
    }

    // Menampilkan data LayananVPN berdasarkan ID
    public function show($id)
    {
        $layananVPN = LayananVPN::find($id); // Temukan data berdasarkan ID
        if (!$layananVPN) {
            return redirect()->route('opd.layananVPN.index')->with('error', 'Data tidak ditemukan!');
        }
        return view('opd.layananVPN.show', compact('layananVPN'));
    }

    // Menampilkan form untuk mengedit data LayananVPN berdasarkan ID
    public function edit($id)
    {
        $layananVPN = LayananVPN::find($id); // Temukan data berdasarkan ID
        
        if (!$layananVPN) {
            return redirect()->route('opd.layananVPN.index')->with('error', 'Data tidak ditemukan!');
        }

        $kategoris = Kategori::all();
        $perangkatDaerahs = PerangkatDaerah::all();

        return view('opd.layananVPN.edit', compact('layananVPN', 'kategoris', 'perangkatDaerahs'));
    }

    // Memperbarui data LayananVPN berdasarkan ID
    public function update(Request $request, $id)
    {
        $layananVPN = LayananVPN::find($id);

        if (!$layananVPN) {
            return redirect()->route('opd.layananVPN.index')->with('error', 'Data tidak ditemukan!');
        }
        
        // Validasi data
        $validatedData = $request->validate([
            'nama_pemohon' => 'required|string|max:255',
            'nip_nik' => 'required|string|max:50',
            'lokasi' => 'required|string|max:255',
            'unit_kerja' => 'required|string|max:255',
            'tanggal_permohonan' => 'required|date',
            'waktu_permohonan' => 'required|date_format:H:i:s',
            'kategori_id' => 'required|integer',
            'perangkat_daerah_id' => 'required|integer',
        ]);

        // Update data
        $layananVPN->update($validatedData);

        return redirect()->route('opd.layananVPN.index')->with('success', 'Data berhasil diupdate!');
    }

    // Menampilkan form untuk membuat data LayananVPN baru
    public function create()
    {
        $kategoris = Kategori::where('id', 1)->first();

        $perangkatDaerahs = PerangkatDaerah::all();
        
        return view('opd.layananVPN.create', compact('kategoris', 'perangkatDaerahs'));
    }

    // Menyimpan data LayananVPN baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pemohon' => 'required|string|max:255',
            'nip_nik' => 'required|string|max:50',
            'lokasi' => 'required|string|max:255',
            'unit_kerja' => 'required|string|max:255',
            'tanggal_permohonan' => 'required|date',
            'waktu_permohonan' => 'required|date_format:H:i',
            'kategori_id' => 'required|integer',
            'perangkat_daerah_id' => 'required|integer',
        ]);

        $layananVPN = new LayananVPN($validatedData);
        $layananVPN->status_permohonan_id = StatusPermohonan::where('status', 'Pending')->first()->id; // Set default status
        $layananVPN->save();

        return redirect()->route('opd.layananVPN.create')->with('success', 'Permohonan berhasil dikirim, silahkan tunggu sampai konfirmasi lebih lanjut.');
    }

    // Menghapus data LayananVPN berdasarkan ID
    public function destroy($id)
    {
        $layananVPN = LayananVPN::find($id); // Temukan data berdasarkan ID
        if (!$layananVPN) {
            return redirect()->route('opd.layananVPN.index')->with('error', 'Data tidak ditemukan!');
        }
        $layananVPN->delete();
        return redirect()->route('opd.layananVPN.index')->with('success', 'Data berhasil dihapus!');
    }
}
