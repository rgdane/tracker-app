<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('permissions')->delete();
        
        DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'view_department',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'view_any_department',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'create_department',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'update_department',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'restore_department',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'restore_any_department',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'replicate_department',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'reorder_department',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'delete_department',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'delete_any_department',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'force_delete_department',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'force_delete_any_department',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'view_project',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'view_any_project',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'create_project',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'update_project',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'restore_project',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'restore_any_project',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'replicate_project',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'reorder_project',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'delete_project',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'delete_any_project',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'force_delete_project',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'force_delete_any_project',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'view_role',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'view_any_role',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'create_role',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'update_role',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'delete_role',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'delete_any_role',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'view_task',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'view_any_task',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'create_task',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'update_task',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'restore_task',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'restore_any_task',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'replicate_task',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'reorder_task',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'delete_task',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'delete_any_task',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'force_delete_task',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'force_delete_any_task',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'view_user',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:18',
                'updated_at' => '2025-05-29 08:59:18',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'view_any_user',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:19',
                'updated_at' => '2025-05-29 08:59:19',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'create_user',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:19',
                'updated_at' => '2025-05-29 08:59:19',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'update_user',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:19',
                'updated_at' => '2025-05-29 08:59:19',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'restore_user',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:19',
                'updated_at' => '2025-05-29 08:59:19',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'restore_any_user',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:19',
                'updated_at' => '2025-05-29 08:59:19',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'replicate_user',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:19',
                'updated_at' => '2025-05-29 08:59:19',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'reorder_user',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:19',
                'updated_at' => '2025-05-29 08:59:19',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'delete_user',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:19',
                'updated_at' => '2025-05-29 08:59:19',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'delete_any_user',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:19',
                'updated_at' => '2025-05-29 08:59:19',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'force_delete_user',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:19',
                'updated_at' => '2025-05-29 08:59:19',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'force_delete_any_user',
                'guard_name' => 'web',
                'created_at' => '2025-05-29 08:59:19',
                'updated_at' => '2025-05-29 08:59:19',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'view_task::report',
                'guard_name' => 'web',
                'created_at' => '2025-05-30 03:33:24',
                'updated_at' => '2025-05-30 03:33:24',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'view_any_task::report',
                'guard_name' => 'web',
                'created_at' => '2025-05-30 03:33:24',
                'updated_at' => '2025-05-30 03:33:24',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'create_task::report',
                'guard_name' => 'web',
                'created_at' => '2025-05-30 03:33:24',
                'updated_at' => '2025-05-30 03:33:24',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'update_task::report',
                'guard_name' => 'web',
                'created_at' => '2025-05-30 03:33:24',
                'updated_at' => '2025-05-30 03:33:24',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'restore_task::report',
                'guard_name' => 'web',
                'created_at' => '2025-05-30 03:33:24',
                'updated_at' => '2025-05-30 03:33:24',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'restore_any_task::report',
                'guard_name' => 'web',
                'created_at' => '2025-05-30 03:33:24',
                'updated_at' => '2025-05-30 03:33:24',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'replicate_task::report',
                'guard_name' => 'web',
                'created_at' => '2025-05-30 03:33:24',
                'updated_at' => '2025-05-30 03:33:24',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'reorder_task::report',
                'guard_name' => 'web',
                'created_at' => '2025-05-30 03:33:24',
                'updated_at' => '2025-05-30 03:33:24',
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'delete_task::report',
                'guard_name' => 'web',
                'created_at' => '2025-05-30 03:33:24',
                'updated_at' => '2025-05-30 03:33:24',
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'delete_any_task::report',
                'guard_name' => 'web',
                'created_at' => '2025-05-30 03:33:24',
                'updated_at' => '2025-05-30 03:33:24',
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'force_delete_task::report',
                'guard_name' => 'web',
                'created_at' => '2025-05-30 03:33:24',
                'updated_at' => '2025-05-30 03:33:24',
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'force_delete_any_task::report',
                'guard_name' => 'web',
                'created_at' => '2025-05-30 03:33:24',
                'updated_at' => '2025-05-30 03:33:24',
            ),
        ));
        
        
    }
}