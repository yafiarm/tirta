<?php

namespace App\Http\Controllers;
use App\Models\Warga;

use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index()
    {
        return response()->json(Warga::with('kategoriTarif')->get(), 200);
    }
 
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_tarif_id' => 'required|exists:kategori_tarifs,id',
            'nomor_rumah'       => 'required|string|unique:wargas,nomor_rumah',
            'nama_warga'        => 'required|string',
            'nomor_telepon'     => 'required|string',
        ]);
 
        $warga = Warga::create($validated);
        return response()->json($warga, 201);
    }

}
