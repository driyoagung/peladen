<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LayananZoom;
use Illuminate\Http\Request;

class LayananZoomController extends Controller
{
    // Menampilkan daftar semua data LayananZoom
    public function index()
    {
        $layananZooms = LayananZoom::all(); // Ambil semua data dari tabel layanan_zoom
        return view('admin.layananZoom.index', compact('layananZooms'));
    }

    // Menampilkan data LayananZoom berdasarkan ID
    public function show($id)
    {
        $layananZoom = LayananZoom::find($id); // Temukan data berdasarkan ID
        if (!$layananZoom) {
            return redirect()->route('admin.layananZoom.index')->with('error', 'Data tidak ditemukan!');
        }
        return view('layanan_zoom.show', compact('layananZoom'));
    }

    // Menampilkan form untuk mengedit data LayananZoom berdasarkan ID
    public function edit($id)
    {
        $layananZoom = LayananZoom::find($id); // Temukan data berdasarkan ID
        if (!$layananZoom) {
            return redirect()->route('admin.layananZoom.index')->with('error', 'Data tidak ditemukan!');
        }
        return view('admin.layananZoom.edit', compact('layananZoom'));
    }
    public function update(Request $request, $id)
{
    $layananZoom = LayananZoom::find($id); // Temukan data berdasarkan ID
    if (!$layananZoom) {
        return redirect()->route('admin.layananZoom.index')->with('error', 'Data tidak ditemukan!');
    }

    // Validasi data
    $request->validate([
        'name' => 'required|string|max:255',
        // Tambahkan validasi lainnya sesuai kebutuhan
    ]);

    // Update data
    $layananZoom->name = $request->name;
    // Update field lainnya sesuai kebutuhan
    $layananZoom->save();

    return redirect()->route('admin.layananZoom.index')->with('success', 'Data berhasil diupdate!');
}


    // Menghapus data LayananZoom berdasarkan ID
    public function destroy($id)
    {
        $layananZoom = LayananZoom::find($id); // Temukan data berdasarkan ID
        if (!$layananZoom) {
            return redirect()->route('admin.layananZoom.index')->with('error', 'Data tidak ditemukan!');
        }
        $layananZoom->delete();
        return redirect()->route('admin.layananZoom')->with('success', 'Data berhasil dihapus!');
    }
}
