<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('siswa')->insert([
            'nama_siswa'=>'muhammad',
            'nisn'=>'087654321',
            'username'=>'muhammad',
            'password'=>Hash::make('muhammad')
        ]);
    }
}
