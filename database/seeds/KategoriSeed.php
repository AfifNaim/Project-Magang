<?php

use Illuminate\Database\Seeder;

class KategoriSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->insert([
            'id' => '1',
                'kategori' => 'Tidak Ada',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
