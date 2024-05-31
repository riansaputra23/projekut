<?php

namespace Database\Seeders;

use illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class user extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=> 'rian andi saputra',
            'email'=> 'rianandisaputra23@gmail',
            'password'=> '12345678',
        ]);
    }
}
