<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'studentName'=>'Eric',
            'phoneNumber'=>'0780989898',
            'course_id'=>1,
            'department_id'=>1,
            'created_by'=>'Abraham',
            
        ]);
    }
}
