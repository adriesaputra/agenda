<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Bupati Rokan Hulu',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Wakil Bupati Rokan Hulu',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        Jabatan::insert($data);
    }
}
