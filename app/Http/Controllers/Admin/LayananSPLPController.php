<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LayananSPLP;
use Illuminate\Http\Request;

class LayananSPLPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layananSPLPs = LayananSPLP::paginate(5); // Ambil semua data dari tabel layanan_zoom
        return view('admin.layananSPLP.index', compact('layananSPLPs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
    public function downloadPDF(){
        $mpdf = new \Mpdf\Mpdf();
        $layananSPLPs = LayananSPLP::all();
        $html = view('admin.layananSPLP.pdf', compact('layananSPLPs'))->render();
        $mpdf->WriteHTML($html);
        return $mpdf->Output('layanan_splp.pdf', 'D'); // 'D' untuk download, 'I' untuk inline view di browser
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
