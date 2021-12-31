<?php

namespace Database\Seeders;

use App\Models\Merk;
use Illuminate\Database\Seeder;

class MerkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $merk1 = Merk::create(['merk_barang' => 'Gucci']);
        $merk2 = Merk::create(['merk_barang' => 'Supreme']);
        $merk1 = Merk::create(['merk_barang' => 'Channel']);
    }
}
