<?php

namespace App\Http\Controllers\OPD;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\LayananTTE;
use App\Models\PerangkatDaerah;
use App\Models\StatusPermohonan;
use Illuminate\Http\Request;

class LayananTTEOPDController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layananTTEs = LayananTTE::all(); // Ambil semua data dari tabel LayananTTE
        return view('opd.layananTTE.index', compact('layananTTEs'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $perangkatDaerahs = PerangkatDaerah::all();
        $kategoris = Kategori::where('id', 2)->first();
        return view('opd.layananTTE.create', compact('kategoris', 'perangkatDaerahs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'ktp' => 'required|string|max:50',
        'nama_lengkap' => 'required|string|max:255',
        'nik' => 'required|string|max:50',
        'nip' => 'required|string|max:50',
        'jabatan' => 'required|string|max:255',
        'no_hp' => 'required|string|max:50',
        'unit_kerja' => 'required|string|max:255',
        'tanggal_permohonan' => 'required|date',
        'waktu_permohonan' => 'required|date_format:H:i',
        'kategori_id' => 'required|integer',
        'perangkat_daerah_id' => 'required|integer',
        
    ]);
    $layananTTE = new LayananTTE($validatedData);
    $layananTTE->status_permohonan_id = StatusPermohonan::where('status', 'Pending')->first()->id; // Set default status
    $layananTTE->save();

    return redirect()->route('opd.layananTTE.create')->with('success', 'Permohonan berhasil dikirim, silahkan tunggu sampai konfirmasi lebih lanjut.');
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