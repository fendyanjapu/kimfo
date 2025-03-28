<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nama' => 'admin',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'level' => 'Admin',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);
    }
}
