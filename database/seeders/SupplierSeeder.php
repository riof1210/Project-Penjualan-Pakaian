<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supplier1 = Supplier::create(['nama' => 'Rio','alamat' => 'Bandung','no_telp' => '0891234567890']);
        $supplier2 = Supplier::create(['nama' => 'Fadli','alamat' => 'Bandung','no_telp' => '0891234567890']);

    }
}
