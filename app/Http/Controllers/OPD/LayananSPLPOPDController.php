<?php

namespace App\Http\Controllers\OPD;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\LayananSPLP;
use App\Models\PerangkatDaerah;
use App\Models\StatusPermohonan;
use Illuminate\Http\Request;

class LayananSPLPOPDController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layananSPLPs = LayananSPLP::all(); // Ambil semua data dari tabel layanan_vpn
        return view('opd.layananSPLP.index', compact('layananSPLPs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        $perangkatDaerahs = PerangkatDaerah::all();
        
        return view('opd.layananSPLP.create', compact('kategoris', 'perangkatDaerahs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pemohon' => 'required|string|max:255',
            'nip_nik' => 'required|string|max:50',
            'nama_api' => 'required|string|max:255',
            'nama_aplikasi_website' => 'required|string|max:255',
            'unit_kerja' => 'required|string|max:255',
            'tanggal_permohonan' => 'required|date',
            'waktu_permohonan' => 'required|date_format:H:i',
            'kategori_id' => 'required|integer',
            'perangkat_daerah_id' => 'required|integer',
        ]);

        $layananSPLP = new LayananSPLP($validatedData);
        $layananSPLP->status_permohonan_id = StatusPermohonan::where('status', 'Pending')->first()->id; // Set default status
        $layananSPLP->save();

        return redirect()->route('opd.layananSPLP.create')->with('success', 'Permohonan berhasil dikirim, silahkan tunggu sampai konfirmasi lebih lanjut.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
