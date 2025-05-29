<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('tasks')->delete();
        
        DB::table('tasks')->insert(array (
            0 => 
            array (
                'id' => 1,
                'project_id' => 1,
                'user_id' => 5,
                'title' => 'Testing modul pengguna',
                'description' => 'Lakukan manual testing untuk modul pengguna',
                'status' => 'Done',
                'deadline' => '2025-05-29',
                'created_at' => '2025-05-29 14:09:10',
                'updated_at' => '2025-05-29 23:06:07',
            ),
            1 => 
            array (
                'id' => 2,
                'project_id' => 1,
                'user_id' => 5,
                'title' => 'Develop Modul Produk',
                'description' => 'bikin modul produk CRUD',
                'status' => 'To Do',
                'deadline' => '2025-05-31',
                'created_at' => '2025-05-29 15:02:43',
                'updated_at' => '2025-05-29 23:04:42',
            ),
            2 => 
            array (
                'id' => 4,
                'project_id' => 4,
                'user_id' => 4,
                'title' => 'Develop Modul Pengguna',
                'description' => 'pastikan bisa CRUD',
                'status' => 'In Progress',
                'deadline' => '2025-05-30',
                'created_at' => '2025-05-29 18:40:47',
                'updated_at' => '2025-05-29 18:41:37',
            ),
            3 => 
            array (
                'id' => 5,
                'project_id' => 4,
                'user_id' => 6,
                'title' => 'Automated Testing API Pengguna',
                'description' => 'Automated testing API menggunakan Postman ',
                'status' => 'Done',
                'deadline' => '2025-05-30',
                'created_at' => '2025-05-29 23:09:36',
                'updated_at' => '2025-05-29 23:09:36',
            ),
            4 => 
            array (
                'id' => 6,
                'project_id' => 5,
                'user_id' => 4,
                'title' => 'Develop Modul Jurnal Umum',
                'description' => 'Pastikan dapat mencatat semua transaksi keuangan',
                'status' => 'To Do',
                'deadline' => '2025-05-31',
                'created_at' => '2025-05-29 23:12:59',
                'updated_at' => '2025-05-29 23:12:59',
            ),
            5 => 
            array (
                'id' => 7,
                'project_id' => 5,
                'user_id' => 2,
                'title' => 'Manual Testing Jurnal Umum',
                'description' => 'Memastikan perhitungan telah sesuai',
                'status' => 'To Do',
                'deadline' => '2025-06-01',
                'created_at' => '2025-05-29 23:14:35',
                'updated_at' => '2025-05-29 23:14:35',
            ),
            6 => 
            array (
                'id' => 8,
                'project_id' => 4,
                'user_id' => 5,
                'title' => 'Develop Modul Laporan Buku Besar',
                'description' => 'Pastikan mampu melaporkan seluruh transaksi keuangan',
                'status' => 'To Do',
                'deadline' => '2025-06-02',
                'created_at' => '2025-05-29 23:16:32',
                'updated_at' => '2025-05-29 23:16:32',
            ),
            7 => 
            array (
                'id' => 9,
                'project_id' => 5,
                'user_id' => 4,
                'title' => 'Bug Pengguna',
                'description' => 'Tombol hapus tidak berfungsi',
                'status' => 'Done',
                'deadline' => '2025-05-30',
                'created_at' => '2025-05-29 23:17:57',
                'updated_at' => '2025-05-29 23:17:57',
            ),
        ));
        
        
    }
}