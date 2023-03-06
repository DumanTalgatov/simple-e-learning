<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::Table('roles')->insert(
            [
                [
                    'name' => 'Admin'
                ],
                [
                    'name' => 'Author'
                ],
                [
                    'name' => 'Student'
                ]
            ]
        );
    }
}
