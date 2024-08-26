<?php

namespace App\Http\Controllers\Verifikator;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\LayananZoom;
use App\Models\PerangkatDaerah;
use App\Models\StatusPermohonan;
use Illuminate\Http\Request;

class LayananZoomVerifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layananZooms = LayananZoom::paginate(5);
        $statusOptions = ['Pending', 'Approved', 'Rejected', 'In Progress', 'Completed']; // Ambil semua data dari tabel layanan_zoom
        return view('verifikator.layananZoom.index', compact('layananZooms','statusOptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return ('verifikator berhasil wal');
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

    // Find the layananZoom instance
    $layananZoom = layananZoom::findOrFail($id);

    // Find the status ID based on the status name
    $status = StatusPermohonan::where('status', $request->status)->first();

    if (!$status) {
        return redirect()->back()->with('error', 'Invalid status selected.');
    }

    // Update the status_permohonan_id
    $layananZoom->status_permohonan_id = $status->id;
    $layananZoom->save();

    return redirect()->back()->with('success', 'Status updated successfully.');
}
    public function edit($id)
    {
        $layananZoom = LayananZoom::find($id); // Temukan data berdasarkan ID
        
        if (!$layananZoom) {
            return redirect()->route('verifikator.layananZoom')->with('error', 'Data tidak ditemukan!');
        }

        $kategoris = Kategori::where('id', 2)->first();

        $perangkatDaerahs = PerangkatDaerah::all();
        $statusPermohonans = StatusPermohonan::all();

        return view('verifikator.layananZoom.edit', compact('layananZoom', 'kategoris', 'perangkatDaerahs', 'statusPermohonans'));
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
