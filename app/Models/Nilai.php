<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    /** @use HasFactory<\Database\Factories\NilaiFactory> */
    use HasFactory;
    protected $fillable = [
        'lokasi_id',
        'kriteria_id',
        'nilai',
    ];
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
