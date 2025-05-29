<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('roles')->delete();
        
        DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 5,
                'name' => 'super-admin',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 10:00:28',
                'updated_at' => '2025-05-29 10:00:28',
            ),
            1 => 
            array (
                'id' => 6,
                'name' => 'manager',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 10:00:42',
                'updated_at' => '2025-05-29 10:00:42',
            ),
            2 => 
            array (
                'id' => 7,
                'name' => 'staff',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 10:00:50',
                'updated_at' => '2025-05-29 10:00:50',
            ),
        ));
        
        
    }
}