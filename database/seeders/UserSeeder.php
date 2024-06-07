<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            'id'=> 1,
            'name'=> 'เริงชัย บุตรม้วย',
            'email'=> 'tegtvnaja@gmail.com',
            'password'=> bcrypt('0878395144'),
        ]);
    }
}
