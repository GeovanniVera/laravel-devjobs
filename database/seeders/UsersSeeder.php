<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = [
            [
                'name' => 'Geovanni Vera',
                'email' => 'geovanni.vera23@gmail.com',
                'password' => bcrypt('Vera230901@'),
                'role' => '1', //developer
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Elizabeth Vera',
                'email' => 'elizabeth.vera23@gmail.com',
                'password' => bcrypt('Vera230901@'),
                'role' => '2',// recruiter
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];


        DB::table('users')->insert($users);
    }
}
