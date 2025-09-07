<?php
namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Lokasi;
use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nilais    = Nilai::all();
        $lokasis   = Lokasi::all();
        $kriterias = Kriteria::all();
        return view('contents.nilai.index', compact('nilais', 'lokasis', 'kriterias'));
    }
    public function get_data()
    {
        $nilais    = Nilai::all();
        $lokasis   = Lokasi::all();
        $kriterias = Kriteria::all();
        return response()->json(
            [
                'status' => true,
                'data'   => [
                    'nilais'    => $nilais,
                    'lokasis'   => $lokasis,
                    'kriterias' => $kriterias,
                ]]);
    }
    public function update_data(Request $request)
    {
        $request->validate([
            'lokasi_id'   => 'required|exists:lokasis,id',
            'kriteria_id' => 'required|exists:kriterias,id',
            'nilai'       => 'required|numeric|min:0',
        ]);

        $nilai = Nilai::updateOrCreate(
            [
                'lokasi_id'   => $request->lokasi_id,
                'kriteria_id' => $request->kriteria_id,
            ],
            [
                'nilai' => $request->nilai,
            ]
        );

        return response()->json([
            'status'  => true,
            'message' => 'Nilai berhasil disimpan',
            'data'    => $nilai,
        ]);
    }
    // max admin kriteria

    public function min_max()
    {
        $kriterias = Kriteria::all();
        foreach ($kriterias as $key => $value) {
            $max      = Nilai::where('kriteria_id', $value->id)->max('nilai');
            $min      = Nilai::where('kriteria_id', $value->id)->min('nilai');
            $result[] = [
                'kriteria_id' => $value->id,
                'max'         => $max,
                'min'         => $min,
            ];
        }
        return response()->json([
            'status'  => true,
            'message' => 'Data berhasil ditemukan',
            'data'    => $result,
        ]);
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
        $request->validate([
            'lokasi_id'   => 'required|exists:lokasis,id',
            'kriteria_id' => 'required|exists:kriterias,id',
            'nilai'       => 'required|numeric|min:0|max:100',
        ]);
        $nilai = Nilai::create($request->all());
        return response()->json([
            'status'  => true,
            'message' => 'Nilai Berhasil Ditambahkan',
            'data'    => $nilai,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nilai $nilai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nilai $nilai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nilai $nilai)
    {
        //
    }
}
