<?php
namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Lokasi;

class Dashboard extends Controller
{
    public function index()
    {
        return view('contents.dashboard');
    }
    public function get_data()
    {
        $kriterias = Kriteria::count();
        $lokasis   = Lokasi::count();
        return response()->json(['kriterias' => $kriterias, 'lokasis' => $lokasis]);
    }
}
