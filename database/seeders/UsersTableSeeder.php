<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('users')->delete();
        
        DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Rega Dane',
                'email' => 'regadane@email.com',
                'email_verified_at' => NULL,
                'password' => Hash::make('rahasia123'),
                'remember_token' => NULL,
                'created_at' => '2025-05-27 23:57:19',
                'updated_at' => '2025-05-29 10:04:40',
                'department_id' => 2,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Lula Najwa Kamila',
                'email' => 'lulanajwa@email.com',
                'email_verified_at' => NULL,
                'password' => Hash::make('rahasia123'),
                'remember_token' => NULL,
                'created_at' => '2025-05-29 08:11:09',
                'updated_at' => '2025-05-29 20:31:48',
                'department_id' => 1,
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Azhar Ganendra',
                'email' => 'azharganendra@email.com',
                'email_verified_at' => NULL,
                'password' => Hash::make('rahasia123'),
                'remember_token' => NULL,
                'created_at' => '2025-05-29 10:56:34',
                'updated_at' => '2025-05-29 10:56:34',
                'department_id' => 1,
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'Aaron Heldian',
                'email' => 'aaronheldian@email.com',
                'email_verified_at' => NULL,
                'password' => Hash::make('rahasia123'),
                'remember_token' => NULL,
                'created_at' => '2025-05-29 22:21:04',
                'updated_at' => '2025-05-29 22:21:04',
                'department_id' => 1,
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'Enrico Lombardo',
                'email' => 'enricolombardo@email.com',
                'email_verified_at' => NULL,
                'password' => Hash::make('rahasia123'),
                'remember_token' => NULL,
                'created_at' => '2025-05-29 22:30:15',
                'updated_at' => '2025-05-29 22:30:15',
                'department_id' => 1,
            ),
        ));
        
        
    }
}