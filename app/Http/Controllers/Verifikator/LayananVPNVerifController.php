<?php

namespace App\Http\Controllers\Verifikator;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\LayananVPN;
use App\Models\PerangkatDaerah;
use App\Models\StatusPermohonan;
use Illuminate\Http\Request;

class LayananVPNVerifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layananVPNs = LayananVPN::orderBy('created_at', 'desc')->paginate(5);
        return view('verifikator.layananVPN.index', compact('layananVPNs'));
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
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:Pending,Approved,Rejected,In Progress,Completed',
        ]);
    
        // Find the layananVPN instance
        $layananVPN = layananVPN::findOrFail($id);
    
        // Find the status ID based on the status name
        $status = StatusPermohonan::where('status', $request->status)->first();
    
        if (!$status) {
            return redirect()->back()->with('error', 'Invalid status selected.');
        }
    
        // Update the status_permohonan_id
        $layananVPN->status_permohonan_id = $status->id;
        $layananVPN->save();
    
        return redirect()->back()->with('success', 'Status updated successfully.');
    }
        public function edit($id)
        {
            $layananVPN = layananVPN::find($id); // Temukan data berdasarkan ID
            
            if (!$layananVPN) {
                return redirect()->route('verifikator.layananVPN')->with('error', 'Data tidak ditemukan!');
            }
    
            $kategoris = Kategori::where('id', 1)->first();
    
            $perangkatDaerahs = PerangkatDaerah::all();
            $statusPermohonans = StatusPermohonan::all();
    
            return view('verifikator.layananVPN.edit', compact('layananVPN', 'kategoris', 'perangkatDaerahs', 'statusPermohonans'));
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
