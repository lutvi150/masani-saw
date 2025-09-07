<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    /** @use HasFactory<\Database\Factories\LokasiFactory> */
    use HasFactory;
    protected $fillable = [
        'alamat',
        'nama_penyuluh',
        'no_hp',
        'code',
    ];
}
