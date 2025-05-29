<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('projects')->delete();
        
        DB::table('projects')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'SP2025001',
                'name' => 'SIPASTI',
                'description' => 'Sistem informasi pencatatan pelatihan dan sertifikasi dosen JTI',
                'start_date' => '2025-05-29',
                'end_date' => '2025-08-29',
                'created_at' => '2025-05-29 11:06:51',
                'updated_at' => '2025-05-29 11:06:51',
            ),
            1 => 
            array (
                'id' => 4,
                'code' => 'SP2025002',
                'name' => 'SIPADI',
                'description' => 'Sistem informasi pencatatan administrasi desa Indonesia',
                'start_date' => '2025-05-30',
                'end_date' => '2025-05-31',
                'created_at' => '2025-05-29 15:29:30',
                'updated_at' => '2025-05-29 15:29:30',
            ),
            2 => 
            array (
                'id' => 5,
                'code' => 'ER2025003',
                'name' => 'ERTE',
                'description' => 'Electronic Resident Transaction Environment',
                'start_date' => '2025-05-29',
                'end_date' => NULL,
                'created_at' => '2025-05-29 22:48:21',
                'updated_at' => '2025-05-29 22:48:21',
            ),
        ));
        
        
    }
}