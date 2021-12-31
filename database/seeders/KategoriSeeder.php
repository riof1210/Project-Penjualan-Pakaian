<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori1 = Kategori::create(['kategori_barang' => 'Baju']);
        $kategori2 = Kategori::create(['kategori_barang' => 'Celana']);
        $kategori3 = Kategori::create(['kategori_barang' => 'Jaket']);
        $kategori4 = Kategori::create(['kategori_barang' => 'Sepatu']);

    }
}
