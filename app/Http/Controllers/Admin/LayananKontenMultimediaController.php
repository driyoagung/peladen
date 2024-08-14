<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LayananKontenMultimedia;
use Illuminate\Http\Request;

class LayananKontenMultimediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layananKMs = LayananKontenMultimedia::all(); // Ambil semua data dari tabel layanan_zoom
        return view('admin.layananKM.index', compact('layananKMs'));
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
    public function edit(string $id)
    {
        return "mantap bang";
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
        $layananKM = LayananKontenMultimedia::find($id); // Temukan data berdasarkan ID
        if (!$layananKM) {
            return redirect()->route('admin.layananKM')->with('error', 'Data tidak ditemukan!');
        }
        $layananKM->delete();
        return redirect()->route('admin.layananKM')->with('success', 'Data berhasil dihapus!');
    }
}
