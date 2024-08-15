<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::all();
        return view("admin.services.index", compact("kategoris"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'kategori_layanan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // Create a new category
        Kategori::create([
            'kategori_layanan' => $request->kategori_layanan,
            'deskripsi' => $request->deskripsi,
        ]);

        // Redirect with success message
        return redirect()->route('admin.service')->with('success', 'Layanan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.services.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.services.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'kategori_layanan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // Find the category and update it
        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'kategori_layanan' => $request->kategori_layanan,
            'deskripsi' => $request->deskripsi,
        ]);

        // Redirect with success message
        return redirect()->route('admin.service')->with('success', 'Layanan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the category and delete it
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        // Redirect with success message
        return redirect()->route('admin.service')->with('success', 'Kategori berhasil dihapus!');
    }
}
