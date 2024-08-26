<?php

namespace App\Http\Controllers\Verifikator;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\LayananTTE;
use App\Models\PerangkatDaerah;
use App\Models\StatusPermohonan;
use Illuminate\Http\Request;

class LayananTTEVerifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $layananTTEs = LayananTTE::paginate(5); // Ambil semua data dari tabel LayananTTE
        return view('verifikator.layananTTE.index', compact('layananTTEs'));
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
    public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|string|in:Pending,Approved,Rejected,In Progress,Completed',
    ]);

    // Find the LayananTTE instance
    $layananTTE = LayananTTE::findOrFail($id);

    // Find the status ID based on the status name
    $status = StatusPermohonan::where('status', $request->status)->first();

    if (!$status) {
        return redirect()->back()->with('error', 'Invalid status selected.');
    }

    // Update the status_permohonan_id
    $layananTTE->status_permohonan_id = $status->id;
    $layananTTE->save();

    return redirect()->back()->with('success', 'Status updated successfully.');
}
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $layananTTE = LayananTTE::find($id); // Temukan data berdasarkan ID
        
        if (!$layananTTE) {
            return redirect()->route('verifikator.layananTTE')->with('error', 'Data tidak ditemukan!');
        }

        $kategoris = Kategori::where('id', 3)->first();

        $perangkatDaerahs = PerangkatDaerah::all();
        $statusPermohonans = StatusPermohonan::all();

        return view('verifikator.layananTTE.edit', compact('layananTTE', 'kategoris', 'perangkatDaerahs', 'statusPermohonans'));
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
