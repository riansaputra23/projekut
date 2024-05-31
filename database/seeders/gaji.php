<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class gaji extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gajis')->insert([
            'nama'=> 'Rian andi saputra',
            'umur'=> '23',
            'gaji'=> 'rp.10.000.000',
        ]);
    }
}
