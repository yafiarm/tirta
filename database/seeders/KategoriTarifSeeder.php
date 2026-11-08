<?php

namespace Database\Seeders;
use App\Models\KategoriTarif;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriTarifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            ['nama_kategori' => 'Rumah Tangga', 'tarif_per_kubik' => 3000, 'biaya_pemeliharaan' => 10000],
            ['nama_kategori' => 'Ruko / Usaha',  'tarif_per_kubik' => 5000, 'biaya_pemeliharaan' => 20000],
            ['nama_kategori' => 'Sosial',        'tarif_per_kubik' => 1000, 'biaya_pemeliharaan' => 1],
        ];

        foreach ($kategori as $item) {
            KategoriTarif::updateOrCreate(
                ['nama_kategori' => $item['nama_kategori']],
                $item
            );
        }
    }

}
