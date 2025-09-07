<?php
namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriterias = Kriteria::all();
        return view('contents.kriteria.index', compact('kriterias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contents.kriteria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'sifat'     => 'required|in:benefit,cost',
            'bobot'     => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
        ]);

        Kriteria::create($request->all());
        return response()->json([
            'status'  => true,
            'message' => 'Kriteria Berhasil Ditambahkan',
            'data'    => $request->all(),
        ]);
        // return redirect()->route('kriteria.index')->with('success', 'Kriteria created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kriteria $kriteria)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kriteria = Kriteria::find($id);

        if (! $kriteria) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($kriteria);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'sifat'     => 'required|in:benefit,cost',
            'bobot'     => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
        ]);

        $kriteria = Kriteria::findOrFail($id);
        $kriteria->update($validated);

        return response()->json([
            'status'  => true,
            'message' => 'Kriteria berhasil diperbarui',
            'data'    => $kriteria,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Kriteria berhasil dihapus',
        ]);
    }
    public function kriteria_code()
    {
        $last     = Kriteria::orderBy('id', 'desc')->first();
        $lastCode = $last ? intval(substr($last->code, 1)) : 0;
        // $newCode  = 'C' . str_pad($lastCode + 1, 2, '0', STR_PAD_LEFT);
        $newCode = ($lastCode + 1);
        return response()->json(
            [
                'status'  => 'success',
                'message' => 'Kode Kriteria Berhasil Ditambahkan',
                'data'    => $newCode,
            ]
        );
    }
}
