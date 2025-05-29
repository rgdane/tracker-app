<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('departments')->delete();
        
        DB::table('departments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'IT',
                'name' => 'Information Technology',
                'description' => NULL,
                'created_at' => '2025-05-29 06:47:16',
                'updated_at' => '2025-05-29 06:47:16',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'HR',
                'name' => 'Human Resource',
                'description' => NULL,
                'created_at' => '2025-05-29 08:15:13',
                'updated_at' => '2025-05-29 08:15:13',
            ),
        ));
        
        
    }
}