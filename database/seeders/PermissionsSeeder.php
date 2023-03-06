<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert(
            [
                [
                    'name' => 'create_user'
                ],
                [
                    'name' => 'view_user'
                ],
                [
                    'name' => 'update_user'
                ],
                [
                    'name' => 'delete_user'
                ],
                [
                    'name' => 'create_course'
                ],
                [
                    'name' => 'view_course'
                ],
                [
                    'name' => 'update_course'
                ],
                [
                    'name' => 'delete_course'
                ]
            ]
        );
    }
}
