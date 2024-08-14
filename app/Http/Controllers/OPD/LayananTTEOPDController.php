<?php

namespace App\Http\Controllers\OPD;

use App\Http\Controllers\Controller;
use App\Models\LayananTTE;
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
        //
    }
}
