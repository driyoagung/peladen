<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\LayananSPLP;
use App\Models\PerangkatDaerah;
use App\Models\StatusPermohonan;
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
    public function edit($id)
    {
        $layananSPLP = layananSPLP::find($id); // Temukan data berdasarkan ID
        
        if (!$layananSPLP) {
            return redirect()->route('admin.layananSPLP')->with('error', 'Data tidak ditemukan!');
        }

        $kategoris = Kategori::where('id', 4)->first();

        $perangkatDaerahs = PerangkatDaerah::all();
        $statusPermohonans = StatusPermohonan::all();

        return view('admin.layananSPLP.edit', compact('layananSPLP', 'kategoris', 'perangkatDaerahs', 'statusPermohonans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $layananSPLP = layananSPLP::find($id);
    
        if (!$layananSPLP) {
            return redirect()->route('admin.layananSPLP')->with('error', 'Data tidak ditemukan!');
        }
    
        // Validasi data
        $validatedData = $request->validate([
            'nama_pemohon' => 'required|string|max:255',
            'nip_nik' => 'required|string|max:50',
            'nama_api' => 'required|string|max:255',
            'nama_aplikasi_website' => 'required|string|max:255',
            'unit_kerja' => 'required|string',
            'tanggal_permohonan' => 'required|date',
            'waktu_permohonan' => 'required|date_format:H:i',
            'kategori_id' => 'required|integer',
            'perangkat_daerah_id' => 'required|integer',
            'status_permohonan_id' => 'required|integer',
        ]);
        
    
        // Update data
        $layananSPLP->update($validatedData);
    
        return redirect()->route('admin.layananSPLP')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $layananSPLP = layananSPLP::find($id); // Temukan data berdasarkan ID
        if (!$layananSPLP) {
            return redirect()->route('admin.layananSPLP')->with('error', 'Data tidak ditemukan!');
        }
        $layananSPLP->delete();
        return redirect()->route('admin.layananSPLP')->with('success', 'Data berhasil dihapus!');
    }
}
