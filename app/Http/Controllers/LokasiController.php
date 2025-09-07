<?php
namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lokasis = Lokasi::all();
        return view('contents.lokasi.index', compact('lokasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contents.lokasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lokasi'   => 'required|string|max:255',
            'alamat'        => 'required',
            'nama_penyuluh' => 'required',
        ]);

        Lokasi::create($request->all());
        return response()->json([
            'status'  => true,
            'message' => 'Lokasi Berhasil Ditambahkan',
            'data'    => $request->all(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lokasi $lokasi)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lokasi = Lokasi::find($id);

        if (! $lokasi) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($lokasi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_lokasi' => 'required|string|max:255',
            'sifat'       => 'required|in:benefit,cost',
            'bobot'       => 'required|numeric|min:0',
            'deskripsi'   => 'nullable|string',
        ]);

        $lokasi = Lokasi::findOrFail($id);
        $lokasi->update($validated);

        return response()->json([
            'status'  => true,
            'message' => 'lokasi berhasil diperbarui',
            'data'    => $lokasi,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->delete();

        return response()->json([
            'status'  => true,
            'message' => 'lokasi berhasil dihapus',
        ]);
    }
}
