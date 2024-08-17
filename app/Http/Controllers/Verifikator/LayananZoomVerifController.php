<?php

namespace App\Http\Controllers\Verifikator;

use App\Http\Controllers\Controller;
use App\Models\LayananZoom;
use App\Models\StatusPermohonan;
use Illuminate\Http\Request;

class LayananZoomVerifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layananZooms = LayananZoom::all();
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
