<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LayananVPN;
use Illuminate\Http\Request;

class LayananVPNController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layananVPNs = LayananVPN::all(); // Ambil semua data dari tabel layanan_zoom
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
        $layananVPN = layananVPN::find($id); // Temukan data berdasarkan ID
        if (!$layananVPN) {
            return redirect()->route('admin.layananVPN')->with('error', 'Data tidak ditemukan!');
        }
        $layananVPN->delete();
        return redirect()->route('admin.layananVPN')->with('success', 'Data berhasil dihapus!');
    }
}
