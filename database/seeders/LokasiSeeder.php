<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lokasis')->insert([
            [
                'code'          => 1,
                'nama_penyuluh' => 'SUKURDI MINOSRA',
                'no_hp'         => '082310747271',
                'nama_lokasi'   => 'Bamil Nosar',
            ],
            [
                'code'          => 2,
                'nama_penyuluh' => 'KASIM MAHMUD',
                'no_hp'         => '081376065421',
                'nama_lokasi'   => 'Mude Nosar',
            ],
            [
                'code'          => 3,
                'nama_penyuluh' => 'KASIM MAHMUD',
                'no_hp'         => '081376065421',
                'nama_lokasi'   => 'Bale Nosar',
            ],
            [
                'code'          => 4,
                'nama_penyuluh' => 'WINAKU SETIADI',
                'no_hp'         => '085276382220',
                'nama_lokasi'   => 'Kejurun Syiah Utama',
            ],
            [
                'code'          => 5,
                'nama_penyuluh' => 'WINAKU SETIADI',
                'no_hp'         => '085276382220',
                'nama_lokasi'   => 'Mengaya',
            ],
            [
                'code'          => 6,
                'nama_penyuluh' => 'AGUSTINA LUBIS',
                'no_hp'         => '085260227027',
                'nama_lokasi'   => 'Bewang',
            ],
            [
                'code'          => 7,
                'nama_penyuluh' => 'SATRIANA',
                'no_hp'         => '082363294939',
                'nama_lokasi'   => 'Kala Bintang',
            ],
            [
                'code'          => 8,
                'nama_penyuluh' => 'ALBAR',
                'no_hp'         => '082361173837',
                'nama_lokasi'   => 'Linung Bulen I',
            ],
            [
                'code'          => 9,
                'nama_penyuluh' => 'ALBAR',
                'no_hp'         => '082361173837',
                'nama_lokasi'   => 'Wihlah Setie',
            ],
            [
                'code'          => 10,
                'nama_penyuluh' => 'MUHAMMAD TAUFIQ',
                'no_hp'         => '085358899490',
                'nama_lokasi'   => 'Linung Bulen II',
            ],
            [
                'code'          => 11,
                'nama_penyuluh' => 'SELAMAT PERWIRA',
                'no_hp'         => '085277341748',
                'nama_lokasi'   => 'Serule',
            ],
            [
                'code'          => 12,
                'nama_penyuluh' => 'SELAMAT PERWIRA',
                'no_hp'         => '085277341748',
                'nama_lokasi'   => 'Atu Payung',
            ],
            [
                'code'          => 13,
                'nama_penyuluh' => 'MUHAMMAD TAUFIQ',
                'no_hp'         => '085358899490',
                'nama_lokasi'   => 'Dedamar',
            ],
            [
                'code'          => 14,
                'nama_penyuluh' => 'ASRI codeRIS',
                'no_hp'         => '08529755123',
                'nama_lokasi'   => 'Kuala I',
            ],
            [
                'code'          => 15,
                'nama_penyuluh' => 'MAULANA',
                'no_hp'         => '085362223606',
                'nama_lokasi'   => 'Wakil Jalil',
            ],
            [
                'code'          => 16,
                'nama_penyuluh' => 'HASANAH BAKAR RAMSY',
                'no_hp'         => '085213366660',
                'nama_lokasi'   => 'Kuala II',
            ],
            [
                'code'          => 17,
                'nama_penyuluh' => 'WINAKU SETIADI',
                'no_hp'         => '085276382220',
                'nama_lokasi'   => 'Genuren',
            ],
            [
                'code'          => 18,
                'nama_penyuluh' => 'HASANAH BAKAR RAMSY',
                'no_hp'         => '085213366660',
                'nama_lokasi'   => 'Merodot',
            ],
        ]);
    }
}
