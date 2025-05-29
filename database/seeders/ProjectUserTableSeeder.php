<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('project_user')->delete();
        
        DB::table('project_user')->insert(array (
            0 => 
            array (
                'id' => 7,
                'project_id' => 4,
                'user_id' => 4,
                'role' => 'Developer',
                'created_at' => '2025-05-29 15:29:30',
                'updated_at' => '2025-05-29 22:38:10',
            ),
            1 => 
            array (
                'id' => 8,
                'project_id' => 1,
                'user_id' => 6,
                'role' => 'PM',
                'created_at' => '2025-05-29 22:32:44',
                'updated_at' => '2025-05-29 22:32:44',
            ),
            2 => 
            array (
                'id' => 9,
                'project_id' => 1,
                'user_id' => 5,
                'role' => 'Developer',
                'created_at' => '2025-05-29 22:32:44',
                'updated_at' => '2025-05-29 22:32:44',
            ),
            3 => 
            array (
                'id' => 10,
                'project_id' => 4,
                'user_id' => 6,
                'role' => 'PM',
                'created_at' => '2025-05-29 22:33:53',
                'updated_at' => '2025-05-29 22:38:10',
            ),
            4 => 
            array (
                'id' => 11,
                'project_id' => 4,
                'user_id' => 5,
                'role' => 'QA',
                'created_at' => '2025-05-29 22:33:53',
                'updated_at' => '2025-05-29 22:38:10',
            ),
            5 => 
            array (
                'id' => 12,
                'project_id' => 5,
                'user_id' => 2,
                'role' => 'PM',
                'created_at' => '2025-05-29 22:48:21',
                'updated_at' => '2025-05-29 22:48:21',
            ),
            6 => 
            array (
                'id' => 13,
                'project_id' => 5,
                'user_id' => 4,
                'role' => 'Developer',
                'created_at' => '2025-05-29 22:48:21',
                'updated_at' => '2025-05-29 22:48:21',
            ),
        ));
        
        
    }
}