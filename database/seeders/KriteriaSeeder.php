<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kriterias')->insert([
            [
                'nama'      => 'Jumlah individu hama per m2',
                'sifat'     => 'benefit',
                'bobot'     => 0.3, // 30%
                'deskripsi' => 'Hasil pengamatan langsung di lahan, semakin tinggi jumlahnya semakin berisiko',
                'code'      => '1',
            ],
            [
                'nama'      => 'Luas Area terdampak dalam m2',
                'sifat'     => 'ost',
                'bobot'     => 0.2, // 20%
                'deskripsi' => 'Semakin luas, semakin serius',
                'code'      => '2',
            ],
            [
                'nama'      => 'Tingkat kerusakan dalam persentase',
                'sifat'     => 'benefit',
                'bobot'     => 0.2, // 20%
                'deskripsi' => 'Semakin tinggi, semakin parah',
                'code'      => '3',
            ],
            [
                'nama'      => 'Jarak dari sumber air dalam meter',
                'sifat'     => 'benefit',
                'bobot'     => 0.15, // 15%
                'deskripsi' => 'Jarak dari sumber air membuat terjadi kerusakan',
                'code'      => '4',
            ],
            [
                'nama'      => 'Musim tanam',
                'sifat'     => 'benefit',
                'bobot'     => 0.15, // 15%
                'deskripsi' => 'Musim tanam membuat terjadi kerusakan',
                'code'      => '5',
            ],
        ]);
    }
}
